<?php

namespace App\Http\Controllers;

use App\Models\Stories;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Events\StoriesCreated;
use App\Events\StoriesStatusUpdated;
use Illuminate\Support\Facades\Log;

class StoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $latestStories = Stories::where('status', 'Accept')->latest()->get();
        $topStories = Stories::where('status', 'Accept')->orderBy('views', 'desc')->get();
        $popularStories = Stories::where('status', 'Accept')
            ->withCount('likes')
            ->orderBy('likes_count', 'desc')
            ->get();
        $topCategory = Category::orderBy('views', 'desc')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('home', compact(
            'latestStories',
            'topStories',
            'popularStories',
            'topCategory',
        ));
    }

    public function manage()
    {
        $allStories = Stories::with('category')->get();
        return view('admin.stories.manage', compact('allStories'));
    }

    public function viewCategory(Category $categories)
    {
        $latestStories = $categories->stories()->where('status', 'Accept')->latest()->get();
        $topStories = $categories->stories()->where('status', 'Accept')->orderBy('views', 'desc')->get();
        $popularStories = $categories->stories()
            ->where('status', 'Accept')
            ->withCount('likes')
            ->orderBy('likes_count', 'desc')
            ->get();

        $categories->increment('views');

        return view('viewCategory', compact('categories', 'latestStories', 'topStories', 'popularStories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $allCategory = Category::all();
        return view('stories.create', compact('allCategory'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required|string|min:1',
                'content' => 'required|string|min:1',
                'image' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
                'category_id' => 'required|exists:category,id',
            ]);

            $imageHashName = null;

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageHashName = $image->hashName();
                $image->storeAs('public/images', $imageHashName);
            }

            $stories = Stories::create([
                'title' => $request->title,
                'content' => $request->content,
                'user_id' => Auth::id(),
                'category_id' => $request->category_id,
                'image' => $imageHashName,
            ]);

            event(new StoriesCreated($stories));

            return response()->json([
                'success' => true,
                'message' => 'Successfully saved the data.',
                'redirect_url' => route('dashboard')
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Stories $stories)
    {
        $randomStories = Stories::inRandomOrder()->take(2)->get();
        $stories->increment('views');

        return view('detail', compact('stories', 'randomStories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(Stories $stories)
    // {
    //     $allCategory = Category::all();

    //     if ($stories->status != 'Reject') {
    //         return redirect()->back()->with('error', 'Stories can only be edited if it is rejected.');
    //     }

    //     return view('stories.edit', compact('stories', 'allCategory'));
    // }

    public function edit($id)
    {
        $userId = Auth::id();
        $stories = Stories::where('user_id', $userId)->findOrFail($id);
        $allCategory = Category::all();

        Log::info('Story status check', [
            'story_id' => $stories->id,
            'user_id' => $userId,
            'status' => $stories->status,
            'status_comparison' => $stories->status === 'Reject'
        ]);

        // Jika status bukan Reject, redirect ke halaman draft dengan pesan error
        if ($stories->status !== 'Reject') {
            return redirect()->route('stories.draft')
                ->with('error', 'Stories can only be edited if it is rejected.');
        }

        return view('stories.edit', compact('stories', 'allCategory'));
    }


    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, Stories $stories)
    // {
    //     try {
    //         $request->validate([
    //             'title' => 'required|string|max:255',
    //             'content' => 'required|string|max:255',
    //             'image' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
    //             'category_id' => 'required|exists:category,id'
    //         ]);

    //         $data = [
    //             'title' => $request->title,
    //             'content' => $request->content,
    //             'user_id' => Auth::id(),
    //             'category_id' => $request->category_id,
    //         ];

    //         if ($request->hasFile('image')) {
    //             $image = $request->file('image');
    //             $image->storeAs('public/images/', $image->hashName());

    //             Storage::delete('public/images/' . $stories->image);

    //             $data['image'] = $image->hashName();
    //         }

    //         $stories->update($data);

    //         event(new StoriesCreated($stories));

    //         return response()->json([
    //             'success' => true,
    //             'message' => 'Successfully update the data.',
    //             'redirect_url' => route('dashboard')
    //         ]);
    //     } catch (\Exception $e) {
    //         return response()->json([
    //             'success' => false,
    //             'message' => $e->getMessage()
    //         ]);
    //     }
    // }
    public function update(Request $request, $id)
    {
        try {
            $stories = Stories::where('user_id', Auth::id())->findOrFail($id);

            Log::info('Update Story Request', [
                'story_id' => $id,
                'user_id' => Auth::id(),
                'current_status' => $stories->status,
                'request_data' => $request->all()
            ]);

            $request->validate([
                'title' => 'required|string|max:255',
                'content' => 'required|string',
                'image' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
                'category_id' => 'required|exists:category,id'
            ]);

            $data = [
                'title' => $request->title,
                'content' => $request->content,
                'category_id' => $request->category_id,
            ];

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageHashName = $image->hashName();

                $image->storeAs('public/images', $imageHashName);

                if ($stories->image) {
                    Storage::delete('public/images/' . $stories->image);
                }

                $data['image'] = $imageHashName;
            }

            $updated = $stories->update($data);

            Log::info('Story Update Result', [
                'story_id' => $id,
                'updated' => $updated,
                'new_data' => $data
            ]);

            if ($updated) {
                event(new StoriesCreated($stories->fresh()));

                return response()->json([
                    'success' => true,
                    'message' => 'Successfully updated the story.',
                    'redirect_url' => route('stories.draft')
                ]);
            }

            throw new \Exception('Failed to update story.');
        } catch (\Exception $e) {
            Log::error('Story Update Error', [
                'story_id' => $id,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Failed to update story: ' . $e->getMessage()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(Stories $stories)
    // {
    //     try {
    //         Storage::delete('public/images/' . $stories->image);
    //         $stories->delete();

    //         return response()->json([
    //             'success' => true,
    //             'message' => 'Successfully delete the data.',
    //             'redirect_url' => route('admin.stories.manage')
    //         ]);
    //     } catch (\Exception $e) {
    //         return response()->json([
    //             'success' => false,
    //             'message' => $e->getMessage()
    //         ]);
    //     }
    // }
    public function destroy(Stories $story)
    {
        try {
            Log::info('Attempting to delete story:', ['id' => $story->id]);

            if (!$story || !$story->id) {
                throw new \Exception('Story not found');
            }

            if ($story->image) {
                Storage::delete('public/images/' . $story->image);
            }

            $deleted = $story->delete();

            if (!$deleted) {
                throw new \Exception('Failed to delete story');
            }

            Log::info('Story deleted successfully:', ['id' => $story->id]);

            return response()->json([
                'success' => true,
                'message' => 'Successfully delete the data.',
                'redirect_url' => route('admin.stories.manage')
            ]);
        } catch (\Exception $e) {
            Log::error('Delete Error:', [
                'id' => $story->id ?? null,
                'message' => $e->getMessage()
            ]);

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }


    public function status(Request $request, Stories $stories)
    {
        $draftStories = Stories::with('category')
            ->whereIn('status', ['Pending', 'Reject'])
            ->get();

        return view('stories.status', compact('draftStories'));
    }

    public function view(Request $request, Stories $stories)
    {
        return view('stories.view', compact('stories'));
    }

    public function updateStatus(Request $request, Stories $stories)
    {
        try {
            $request->validate([
                'status' => 'required'
            ]);

            $stories->status = $request->status;
            $stories->save();

            event(new StoriesStatusUpdated($stories));

            return response()->json([
                'success' => true,
                'message' => 'Successfully updated status the stories.',
                'redirect_url' => route('stories.status')
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function draft()
    {
        $userId = Auth::id();

        $acceptedStories = Stories::with('category')
            ->where('status', 'Accept')
            ->where('user_id', $userId)
            ->get();

        $notAcceptedStories = Stories::with('category')
            ->whereIn('status', ['Pending', 'Reject'])
            ->where('user_id', $userId)
            ->get();

        return view('admin.users.draft', compact('acceptedStories', 'notAcceptedStories'));
    }
}
