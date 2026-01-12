<?php

namespace App\Http\Controllers\Admin\Program;

use App\Http\Controllers\Controller;
use App\Models\Program;
use App\Models\Opportunity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProgramController extends Controller
{
    /**
     * Display a listing of the programs and opportunities (Global view).
     */
    public function index()
    {
        $programs = Program::ordered()->get();
        $opportunities = Opportunity::ordered()->get();

        return view('admin.program.index', compact('programs', 'opportunities'));
    }

    /**
     * Show the form for creating a new program.
     */
    public function create()
    {
        return view('admin.program.create');
    }

    /**
     * Store a newly created program in storage.
     */
    public function store(Request $request)
    {
        \Log::info('Tentative de création de programme', ['data' => $request->except('image')]);

        $request->merge([
            'is_active' => $request->has('is_active')
        ]);

        try {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'subtitle' => 'nullable|string|max:255',
                'description' => 'required|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
                'image_alt' => 'nullable|string|max:255',
                'category' => 'nullable|string|max:255',
                'link' => 'nullable|url|max:255',
                'link_text' => 'nullable|string|max:255',
                'sort_order' => 'required|integer',
                'is_active' => 'boolean'
            ]);

            \Log::info('Validation réussie pour le programme');

            $data = $request->all();

            if ($request->hasFile('image')) {
                $data['image'] = $request->file('image')->store('programs', 'public');
                \Log::info('Image enregistrée', ['path' => $data['image']]);
            }

            $data['is_active'] = $request->has('is_active');

            $program = Program::create($data);
            \Log::info('Programme créé avec succès', ['id' => $program->id]);

            return redirect()->route('admin.programs.index', ['tab' => 'programs'])
                ->with('success', 'Programme créé avec succès.');

        } catch (\Illuminate\Validation\ValidationException $e) {
            \Log::error('Erreur de validation lors de la création du programme', ['errors' => $e->errors()]);
            throw $e;
        } catch (\Exception $e) {
            \Log::error('Exception lors de la création du programme', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return redirect()->back()
                ->withInput()
                ->with('error', 'Une erreur est survenue : ' . $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified program.
     */
    public function edit(Program $program)
    {
        return view('admin.program.edit', compact('program'));
    }

    /**
     * Update the specified program in storage.
     */
    public function update(Request $request, Program $program)
    {
        \Log::info('Tentative de mise à jour de programme', ['id' => $program->id, 'data' => $request->except('image')]);

        $request->merge([
            'is_active' => $request->has('is_active')
        ]);

        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'subtitle' => 'nullable|string|max:255',
                'description' => 'required|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
                'image_alt' => 'nullable|string|max:255',
                'category' => 'nullable|string|max:255',
                'link' => 'nullable|url|max:255',
                'link_text' => 'nullable|string|max:255',
                'sort_order' => 'required|integer',
                'is_active' => 'boolean'
            ]);

            $data = $request->all();

            if ($request->hasFile('image')) {
                if ($program->image && Storage::disk('public')->exists($program->image)) {
                    Storage::disk('public')->delete($program->image);
                }
                $data['image'] = $request->file('image')->store('programs', 'public');
                \Log::info('Nouvelle image enregistrée pour le programme', ['path' => $data['image']]);
            }

            $data['is_active'] = $request->has('is_active');

            $program->update($data);
            \Log::info('Programme mis à jour avec succès', ['id' => $program->id]);

            return redirect()->route('admin.programs.index', ['tab' => 'programs'])
                ->with('success', 'Programme mis à jour avec succès.');

        } catch (\Illuminate\Validation\ValidationException $e) {
            \Log::error('Erreur de validation lors de la mise à jour du programme', ['errors' => $e->errors()]);
            throw $e;
        } catch (\Exception $e) {
            \Log::error('Exception lors de la mise à jour du programme', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return redirect()->back()
                ->withInput()
                ->with('error', 'Une erreur est survenue : ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified program from storage.
     */
    public function destroy(Program $program)
    {
        if ($program->image && Storage::disk('public')->exists($program->image)) {
            Storage::disk('public')->delete($program->image);
        }

        $program->delete();

        return redirect()->route('admin.programs.index', ['tab' => 'programs'])
            ->with('success', 'Programme supprimé avec succès.');
    }

    public function toggleStatus(Program $program)
    {
        $program->update(['is_active' => !$program->is_active]);
        return redirect()->back()->with('success', 'Statut du programme mis à jour.');
    }
}
