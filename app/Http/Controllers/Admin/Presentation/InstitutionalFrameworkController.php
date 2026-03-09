<?php

namespace App\Http\Controllers\Admin\Presentation;

use App\Http\Controllers\Controller;
use App\Models\InstitutionalFramework;
use Illuminate\Http\Request;

class InstitutionalFrameworkController extends Controller
{
    public function index()
    {
        $frameworks = InstitutionalFramework::all();
        return view('admin.presentation.institutional.index', compact('frameworks'));
    }

    public function create()
    {
        return view('admin.presentation.institutional.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string'
        ]);

        InstitutionalFramework::create($request->all());

        return redirect()->route('admin.institutional-frameworks.index')
            ->with('success', 'Cadre institutionnel ajouté avec succès.');
    }

    public function edit(InstitutionalFramework $institutionalFramework)
    {
        $framework = $institutionalFramework;
        return view('admin.presentation.institutional.form', compact('framework'));
    }

    public function update(Request $request, InstitutionalFramework $institutionalFramework)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string'
        ]);

        $institutionalFramework->update($request->all());

        return redirect()->route('admin.institutional-frameworks.index')
            ->with('success', 'Cadre institutionnel mis à jour avec succès.');
    }

    public function destroy(InstitutionalFramework $institutionalFramework)
    {
        $institutionalFramework->delete();
        return redirect()->route('admin.institutional-frameworks.index')
            ->with('success', 'Cadre institutionnel supprimé avec succès.');
    }

    public function toggleStatus(InstitutionalFramework $institutionalFramework)
    {
        // Add status if needed, but for now we'll just keep it simple
        return response()->json(['success' => true]);
    }
}
