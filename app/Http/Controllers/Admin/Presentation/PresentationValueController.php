<?php

namespace App\Http\Controllers\Admin\Presentation;

use App\Http\Controllers\Controller;
use App\Models\PresentationValue;
use Illuminate\Http\Request;

class PresentationValueController extends Controller
{
    public function index()
    {
        $values = PresentationValue::orderBy('sort_order', 'asc')->get();
        return view('admin.presentation.values.index', compact('values'));
    }

    public function create()
    {
        return view('admin.presentation.values.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'sort_order' => 'required|integer',
            'is_active' => 'boolean'
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        PresentationValue::create($data);

        return redirect()->route('admin.presentation-values.index')
            ->with('success', 'Valeur ajoutée avec succès.');
    }

    public function edit(PresentationValue $presentationValue)
    {
        $value = $presentationValue;
        return view('admin.presentation.values.form', compact('value'));
    }

    public function update(Request $request, PresentationValue $presentationValue)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'sort_order' => 'required|integer',
            'is_active' => 'boolean'
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        $presentationValue->update($data);

        return redirect()->route('admin.presentation-values.index')
            ->with('success', 'Valeur mise à jour avec succès.');
    }

    public function destroy(PresentationValue $presentationValue)
    {
        $presentationValue->delete();
        return redirect()->route('admin.presentation-values.index')
            ->with('success', 'Valeur supprimée avec succès.');
    }

    public function toggleStatus(PresentationValue $presentationValue)
    {
        $presentationValue->is_active = !$presentationValue->is_active;
        $presentationValue->save();

        return response()->json(['success' => true]);
    }
}
