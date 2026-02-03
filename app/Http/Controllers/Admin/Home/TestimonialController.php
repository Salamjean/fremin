<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::ordered()->get();
        return view('admin.accueil.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.accueil.testimonials.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'company_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'sector' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'quote' => 'required|string',
            'author_name' => 'required|string|max:255',
            'author_position' => 'required|string|max:255',
            'sort_order' => 'required|integer',
            'is_active' => 'boolean'
        ]);

        $data = $request->except(['company_logo', 'is_active']);

        if ($request->hasFile('company_logo')) {
            $data['company_logo'] = $request->file('company_logo')->store('testimonials', 'public');
        }

        $data['is_active'] = $request->has('is_active');

        Testimonial::create($data);

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Témoignage ajouté avec succès.');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.accueil.testimonials.create', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'company_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'sector' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'quote' => 'required|string',
            'author_name' => 'required|string|max:255',
            'author_position' => 'required|string|max:255',
            'sort_order' => 'required|integer',
            'is_active' => 'boolean'
        ]);

        $data = $request->except(['company_logo', 'is_active']);

        if ($request->hasFile('company_logo')) {
            if ($testimonial->company_logo && Storage::disk('public')->exists($testimonial->company_logo)) {
                Storage::disk('public')->delete($testimonial->company_logo);
            }
            $data['company_logo'] = $request->file('company_logo')->store('testimonials', 'public');
        }

        $data['is_active'] = $request->has('is_active');

        $testimonial->update($data);

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Témoignage mis à jour avec succès.');
    }

    public function destroy(Testimonial $testimonial)
    {
        if ($testimonial->company_logo && Storage::disk('public')->exists($testimonial->company_logo)) {
            Storage::disk('public')->delete($testimonial->company_logo);
        }
        $testimonial->delete();

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Témoignage supprimé avec succès.');
    }

    public function toggleStatus(Testimonial $testimonial)
    {
        $testimonial->is_active = !$testimonial->is_active;
        $testimonial->save();

        return response()->json(['success' => true, 'is_active' => $testimonial->is_active]);
    }
}
