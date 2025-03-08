<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Stories;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function likeStories(Request $request, Stories $stories)
    {
        if (!$request->session()->has('device_id')) {
            $deviceId = Str::uuid()->toString();
            $request->session()->put('device_id', $deviceId);
        } else {
            $deviceId = $request->session()->get('device_id');
        }

        $like = Like::where('device_id', $deviceId)->where('stories_id', $stories->id)->first();

        if ($like) {
            $like->delete();
        } else {
            Like::create([
                'device_id' => $deviceId,
                'stories_id' => $stories->id,
            ]);
        }

        return back();
    }
}
