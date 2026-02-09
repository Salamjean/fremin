<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use App\Models\MinisterInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MinisterInfoController extends Controller
{
    public function index()
    {
        $ministerInfo = MinisterInfo::first();
        return view('admin.accueil.minister.index', compact('ministerInfo'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'name_en' => 'nullable|string|max:255',
            'function' => 'required|string|max:255',
            'function_en' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'signature' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'message' => 'required|string',
            'message_en' => 'nullable|string',
        ]);

        $ministerInfo = MinisterInfo::first();
        if (!$ministerInfo) {
            $ministerInfo = new MinisterInfo();
        }

        $ministerInfo->name = $request->name;
        $ministerInfo->name_en = $request->name_en;
        $ministerInfo->function = $request->function;
        $ministerInfo->function_en = $request->function_en;
        $ministerInfo->message = $request->message;
        $ministerInfo->message_en = $request->message_en;

        if ($request->hasFile('image')) {
            if ($ministerInfo->image && Storage::disk('public')->exists($ministerInfo->image)) {
                Storage::disk('public')->delete($ministerInfo->image);
            }
            $ministerInfo->image = $request->file('image')->store('minister', 'public');
        }

        if ($request->hasFile('signature')) {
            if ($ministerInfo->signature && Storage::disk('public')->exists($ministerInfo->signature)) {
                Storage::disk('public')->delete($ministerInfo->signature);
            }
            $ministerInfo->signature = $request->file('signature')->store('minister', 'public');
        }

        $ministerInfo->save();

        return redirect()->route('admin.minister-infos.index')->with('success', 'Informations du ministre mises à jour avec succès.');
    }
}
