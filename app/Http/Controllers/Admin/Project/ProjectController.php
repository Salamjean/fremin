<?php

namespace App\Http\Controllers\Admin\Project;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('admin.project.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.project.create');
    }

    public function store(Request $request)
    {
        $request->merge([
            'is_active' => $request->has('is_active')
        ]);

        $validated = $request->validate([
            'title' => 'required|string|max:255|unique:projects,title',
            'type' => 'required|string|in:aed,zone,autre',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
            'is_active' => 'boolean',
        ], [
            'title.unique' => 'Ce titre est déjà utilisé par un autre projet.',
        ]);

        // Check for duplicates for unique types
        if (in_array($request->type, ['aed', 'zone'])) {
            $exists = Project::where('type', $request->type)->exists();
            if ($exists) {
                return redirect()->back()
                    ->withInput()
                    ->withErrors(['type' => "Un projet de type " . strtoupper($request->type === 'zone' ? 'Zone Industrielle' : $request->type) . " existe déjà. Veuillez modifier celui existant ou choisir le type 'Autre'."]);
            }
        }

        $data = $request->all();

        // Force slug for specific types to match navbar links
        if ($request->type === 'aed') {
            $data['slug'] = 'aed';
        } elseif ($request->type === 'zone') {
            $data['slug'] = 'zone-industrielle';
        } else {
            $data['slug'] = Str::slug($request->title);
        }

        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('projects', 'public');
        }

        Project::create($data);

        return redirect()->route('admin.projects.index')->with('success', 'Projet créé avec succès.');
    }

    public function edit(Project $project)
    {
        return view('admin.project.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $request->merge([
            'is_active' => $request->has('is_active')
        ]);

        $validated = $request->validate([
            'title' => 'required|string|max:255|unique:projects,title,' . $project->id,
            'type' => 'required|string|in:aed,zone,autre',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
            'is_active' => 'boolean',
        ], [
            'title.unique' => 'Ce titre est déjà utilisé par un autre projet.',
        ]);

        // Check for duplicates for unique types (excluding current project)
        if (in_array($request->type, ['aed', 'zone'])) {
            $exists = Project::where('type', $request->type)->where('id', '!=', $project->id)->exists();
            if ($exists) {
                return redirect()->back()
                    ->withInput()
                    ->withErrors(['type' => "Un autre projet de type " . strtoupper($request->type === 'zone' ? 'Zone Industrielle' : $request->type) . " existe déjà."]);
            }
        }

        $data = $request->all();

        // Force slug for specific types to match navbar links
        if ($request->type === 'aed') {
            $data['slug'] = 'aed';
        } elseif ($request->type === 'zone') {
            $data['slug'] = 'zone-industrielle';
        } else {
            $data['slug'] = Str::slug($request->title);
        }

        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            if ($project->image && Storage::disk('public')->exists($project->image)) {
                Storage::disk('public')->delete($project->image);
            }
            $data['image'] = $request->file('image')->store('projects', 'public');
        }

        $project->update($data);

        return redirect()->route('admin.projects.index')->with('success', 'Projet mis à jour avec succès.');
    }

    public function destroy(Project $project)
    {
        if ($project->image && Storage::disk('public')->exists($project->image)) {
            Storage::disk('public')->delete($project->image);
        }
        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'Projet supprimé avec succès.');
    }

    public function toggleStatus(Project $project)
    {
        $project->update(['is_active' => !$project->is_active]);
        return redirect()->back()->with('success', 'Statut mis à jour.');
    }
}
