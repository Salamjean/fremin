<?php

namespace App\Http\Controllers\Admin\Activity;

use App\Http\Controllers\Controller;
use App\Models\ActivityPage;
use Illuminate\Http\Request;

class ActivityPageController extends Controller
{
    public function index()
    {
        $pages = ActivityPage::orderBy('id')->get();
        return view('admin.activity.pages.index', compact('pages'));
    }

    public function edit(ActivityPage $activityPage)
    {
        return view('admin.activity.pages.form', compact('activityPage'));
    }

    public function update(Request $request, ActivityPage $activityPage)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'content' => 'nullable|string',
            'items' => 'nullable|array',
            'metadata' => 'nullable|array',
            'is_active' => 'boolean',
        ]);

        $activityPage->update($request->all());

        return redirect()->route('admin.activity-pages.index')
            ->with('success', 'Page mise à jour avec succès.');
    }
}
