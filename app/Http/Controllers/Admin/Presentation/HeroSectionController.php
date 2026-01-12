<?php

namespace App\Http\Controllers\Admin\Presentation;

use App\Http\Controllers\Controller;
use App\Models\HeroSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeroSectionController extends Controller
{
    public function index()
    {
        $heroSections = HeroSection::orderBy('created_at', 'desc')->get();
        return view('admin.presentation.hero.index', compact('heroSections'));
    }

    public function create()
    {
        return view('admin.presentation.hero.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'main_title' => 'required|string|max:100',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'required|string|max:500',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120', // 5MB
            'image_alt' => 'nullable|string|max:255',
            'stat_number' => 'nullable|string|max:50',
            'stat_label' => 'nullable|string|max:100',
            'is_active' => 'boolean'
        ]);

        $data = $request->all();
        
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('hero', 'public');
            $data['image'] = $path;
        }

        $data['is_active'] = $request->has('is_active');

        HeroSection::create($data);

        return redirect()->route('admin.hero.index')
            ->with('success', 'Section Hero créée avec succès.');
    }

    public function edit(HeroSection $hero)
    {
        return view('admin.presentation.hero.edit', compact('hero'));
    }

    public function update(Request $request, HeroSection $hero)
    {
        $request->validate([
            'main_title' => 'required|string|max:100',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'required|string|max:500',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
            'image_alt' => 'nullable|string|max:255',
            'stat_number' => 'nullable|string|max:50',
            'stat_label' => 'nullable|string|max:100',
            'is_active' => 'boolean'
        ]);

        $data = $request->all();
        
        if ($request->hasFile('image')) {
            if ($hero->image && Storage::disk('public')->exists($hero->image)) {
                Storage::disk('public')->delete($hero->image);
            }
            
            $path = $request->file('image')->store('hero', 'public');
            $data['image'] = $path;
        }

        $data['is_active'] = $request->has('is_active');

        $hero->update($data);

        return redirect()->route('admin.hero.index')
            ->with('success', 'Section Hero mise à jour avec succès.');
    }

    public function destroy(HeroSection $hero)
    {
        if ($hero->image && Storage::disk('public')->exists($hero->image)) {
            Storage::disk('public')->delete($hero->image);
        }

        $hero->delete();

        return redirect()->route('admin.hero.index')
            ->with('success', 'Section Hero supprimée avec succès.');
    }

    public function toggleStatus(HeroSection $hero)
    {
        if ($hero->is_active) {
            $hero->update(['is_active' => false]);
            $message = 'Section Hero désactivée.';
        } else {
            HeroSection::where('is_active', true)->update(['is_active' => false]);
            $hero->update(['is_active' => true]);
            $message = 'Section Hero activée.';
        }

        return redirect()->route('admin.hero.index')
            ->with('success', $message);
    }
}