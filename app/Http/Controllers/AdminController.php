<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Stories;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalUsers = User::count();
        $totalStories = Stories::count();
        $totalStoriesAccepted = Stories::where('status', '==', 'Accept')->count();
        $totalStoriesNotAccepted = Stories::where('status', '!=', 'Accept')->count();

        // Chart JS
        $usersPerMonth = [];
        $storiesPerMonth = [];

        for ($month = 1; $month <= 12; $month++) {
            $startOfMonth = Carbon::create(null, $month)->startOfMonth();
            $endOfMonth = Carbon::create(null, $month)->endOfMonth();

            $usersPerMonth[] = User::whereBetween('created_at', [$startOfMonth, $endOfMonth])->count();
            $storiesPerMonth[] = Stories::whereBetween('created_at', [$startOfMonth, $endOfMonth])->count();
        }

        $currentMonth = Carbon::now()->month;
        $totalUsersCurrentMonth = $usersPerMonth[$currentMonth - 1];
        $totalStoriesCurrentMonth = $storiesPerMonth[$currentMonth - 1];

        return view('dashboard', compact(
            'totalUsers',
            'totalStories',
            'totalStoriesNotAccepted',
            'totalStoriesAccepted',
            'currentMonth',
            'usersPerMonth',
            'storiesPerMonth',
            'totalUsersCurrentMonth',
            'totalStoriesCurrentMonth'
        ));
    }
}
