<?php

namespace App\Http\Controllers\Admin\Program;

use App\Http\Controllers\Controller;
use App\Models\Opportunity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OpportunityController extends Controller
{
    /**
     * Show the form for creating a new opportunity.
     */
    public function create()
    {
        return view('admin.program.opportunities.create');
    }

    /**
     * Store a newly created opportunity in storage.
     */
    public function store(Request $request)
    {
        \Log::info('Tentative de création d\'opportunité', ['data' => $request->except('image')]);

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
                'deadline' => 'nullable|date',
                'location' => 'nullable|string|max:255',
                'type' => 'required|string|max:255',
                'link' => 'nullable|url|max:255',
                'link_text' => 'nullable|string|max:255',
                'status' => 'required|in:open,closed,upcoming',
                'sort_order' => 'required|integer',
                'is_active' => 'boolean'
            ]);

            \Log::info('Validation réussie pour l\'opportunité');

            $data = $request->all();

            if ($request->hasFile('image')) {
                $data['image'] = $request->file('image')->store('opportunities', 'public');
                \Log::info('Image enregistrée pour l\'opportunité', ['path' => $data['image']]);
            }

            $data['is_active'] = $request->has('is_active');

            $opportunity = Opportunity::create($data);
            \Log::info('Opportunité créée avec succès', ['id' => $opportunity->id]);

            return redirect()->route('admin.programs.index', ['tab' => 'opportunities'])
                ->with('success', 'Appel/Opportunité créé avec succès.');

        } catch (\Illuminate\Validation\ValidationException $e) {
            \Log::error('Erreur de validation lors de la création de l\'opportunité', ['errors' => $e->errors()]);
            throw $e;
        } catch (\Exception $e) {
            \Log::error('Exception lors de la création de l\'opportunité', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return redirect()->back()
                ->withInput()
                ->with('error', 'Une erreur est survenue : ' . $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified opportunity.
     */
    public function edit(Opportunity $opportunity)
    {
        return view('admin.program.opportunities.edit', compact('opportunity'));
    }

    /**
     * Update the specified opportunity in storage.
     */
    public function update(Request $request, Opportunity $opportunity)
    {
        \Log::info('Tentative de mise à jour d\'opportunité', ['id' => $opportunity->id, 'data' => $request->except('image')]);

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
                'deadline' => 'nullable|date',
                'location' => 'nullable|string|max:255',
                'type' => 'required|string|max:255',
                'link' => 'nullable|url|max:255',
                'link_text' => 'nullable|string|max:255',
                'status' => 'required|in:open,closed,upcoming',
                'sort_order' => 'required|integer',
                'is_active' => 'boolean'
            ]);

            $data = $request->all();

            if ($request->hasFile('image')) {
                if ($opportunity->image && Storage::disk('public')->exists($opportunity->image)) {
                    Storage::disk('public')->delete($opportunity->image);
                }
                $data['image'] = $request->file('image')->store('opportunities', 'public');
                \Log::info('Nouvelle image enregistrée pour l\'opportunité', ['path' => $data['image']]);
            }

            $data['is_active'] = $request->has('is_active');

            $opportunity->update($data);
            \Log::info('Opportunité mise à jour avec succès', ['id' => $opportunity->id]);

            return redirect()->route('admin.programs.index', ['tab' => 'opportunities'])
                ->with('success', 'Appel/Opportunité mis à jour avec succès.');

        } catch (\Illuminate\Validation\ValidationException $e) {
            \Log::error('Erreur de validation lors de la mise à jour de l\'opportunité', ['errors' => $e->errors()]);
            throw $e;
        } catch (\Exception $e) {
            \Log::error('Exception lors de la mise à jour de l\'opportunité', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return redirect()->back()
                ->withInput()
                ->with('error', 'Une erreur est survenue : ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified opportunity from storage.
     */
    public function destroy(Opportunity $opportunity)
    {
        if ($opportunity->image && Storage::disk('public')->exists($opportunity->image)) {
            Storage::disk('public')->delete($opportunity->image);
        }

        $opportunity->delete();

        return redirect()->route('admin.programs.index', ['tab' => 'opportunities'])
            ->with('success', 'Appel/Opportunité supprimé avec succès.');
    }

    public function toggleStatus(Opportunity $opportunity)
    {
        $opportunity->update(['is_active' => !$opportunity->is_active]);
        return redirect()->back()->with('success', 'Statut de l\'opportunité mis à jour.');
    }
}
