<?php

namespace App\Http\Controllers\Admin\Presentation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\StrategicAxis;
use Illuminate\Support\Facades\Storage;

class StrategicAxisController extends Controller
{
    public function index()
    {
        $axes = StrategicAxis::orderBy('axis_number', 'asc')->get();
        return view('admin.presentation.strategic-axes.index', compact('axes'));
    }

    public function create()
    {
        return view('admin.presentation.strategic-axes.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'axis_number' => 'required|integer',
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('strategic-axes', 'public');
            $data['image'] = 'storage/' . $imagePath;
        }

        StrategicAxis::create($data);

        return redirect()->route('admin.strategic-axes.index')
            ->with('success', 'Axe stratégique ajouté avec succès.');
    }

    public function edit(StrategicAxis $strategicAxis)
    {
        $axis = $strategicAxis;
        return view('admin.presentation.strategic-axes.form', compact('axis'));
    }

    public function update(Request $request, StrategicAxis $strategicAxis)
    {
        $request->validate([
            'axis_number' => 'required|integer',
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($strategicAxis->image && file_exists(public_path($strategicAxis->image))) {
                // Keep default assets
                if (strpos($strategicAxis->image, 'assets/img/') === false) {
                    @unlink(public_path($strategicAxis->image));
                }
            }
            $imagePath = $request->file('image')->store('strategic-axes', 'public');
            $data['image'] = 'storage/' . $imagePath;
        }

        $strategicAxis->update($data);

        return redirect()->route('admin.strategic-axes.index')
            ->with('success', 'Axe stratégique mis à jour avec succès.');
    }

    public function destroy(StrategicAxis $strategicAxis)
    {
        if ($strategicAxis->image && strpos($strategicAxis->image, 'assets/img/') === false) {
            @unlink(public_path($strategicAxis->image));
        }
        $strategicAxis->delete();
        return redirect()->route('admin.strategic-axes.index')
            ->with('success', 'Axe stratégique supprimé avec succès.');
    }

    public function toggleStatus(StrategicAxis $strategicAxis)
    {
        $strategicAxis->is_active = !$strategicAxis->is_active;
        $strategicAxis->save();
        return response()->json(['success' => true]);
    }
}
