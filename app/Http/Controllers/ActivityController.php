<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Activity;

class ActivityController extends Controller
{
    public function index()
    {
        $activities = Activity::orderBy('date', 'desc')->paginate(12);
        return view('pages.activities.index', compact('activities'));
    }

    public function show($slug)
    {
        $activity = Activity::where('slug', $slug)->firstOrFail();
        return view('pages.activities.show', compact('activity'));
    }
}
