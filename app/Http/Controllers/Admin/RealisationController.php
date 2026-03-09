<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Realisation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RealisationController extends Controller
{
    public function index()
    {
        $realisations = Realisation::orderBy('sort_order')->get();
        return view('admin.realisation.index', compact('realisations'));
    }

    public function create()
    {
        return view('admin.realisation.create');
    }

    public function store(Request $request)
    {
        $request->merge([
            'is_active' => $request->has('is_active')
        ]);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'sort_order' => 'nullable|integer',
            'image_main' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
            'image_sub' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
            'is_active' => 'boolean',
        ]);

        $data = $request->all();

        if ($request->hasFile('image_main')) {
            $data['image_main'] = $request->file('image_main')->store('realisations', 'public');
        }

        if ($request->hasFile('image_sub')) {
            $data['image_sub'] = $request->file('image_sub')->store('realisations', 'public');
        }

        Realisation::create($data);

        return redirect()->route('admin.realisations.index')->with('success', 'Réalisation créée avec succès.');
    }

    public function edit(Realisation $realisation)
    {
        return view('admin.realisation.edit', compact('realisation'));
    }

    public function update(Request $request, Realisation $realisation)
    {
        $request->merge([
            'is_active' => $request->has('is_active')
        ]);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'sort_order' => 'nullable|integer',
            'image_main' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
            'image_sub' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
            'is_active' => 'boolean',
        ]);

        $data = $request->all();

        if ($request->hasFile('image_main')) {
            if ($realisation->image_main && !str_starts_with($realisation->image_main, 'assets/') && Storage::disk('public')->exists($realisation->image_main)) {
                Storage::disk('public')->delete($realisation->image_main);
            }
            $data['image_main'] = $request->file('image_main')->store('realisations', 'public');
        }

        if ($request->hasFile('image_sub')) {
            if ($realisation->image_sub && !str_starts_with($realisation->image_sub, 'assets/') && Storage::disk('public')->exists($realisation->image_sub)) {
                Storage::disk('public')->delete($realisation->image_sub);
            }
            $data['image_sub'] = $request->file('image_sub')->store('realisations', 'public');
        }

        $realisation->update($data);

        return redirect()->route('admin.realisations.index')->with('success', 'Réalisation mise à jour avec succès.');
    }

    public function destroy(Realisation $realisation)
    {
        if ($realisation->image_main && !str_starts_with($realisation->image_main, 'assets/') && Storage::disk('public')->exists($realisation->image_main)) {
            Storage::disk('public')->delete($realisation->image_main);
        }
        if ($realisation->image_sub && !str_starts_with($realisation->image_sub, 'assets/') && Storage::disk('public')->exists($realisation->image_sub)) {
            Storage::disk('public')->delete($realisation->image_sub);
        }
        $realisation->delete();

        return redirect()->route('admin.realisations.index')->with('success', 'Réalisation supprimée avec succès.');
    }

    public function toggleStatus(Realisation $realisation)
    {
        $realisation->update(['is_active' => !$realisation->is_active]);
        return redirect()->back()->with('success', 'Statut mis à jour.');
    }
}
