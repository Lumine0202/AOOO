<?php

namespace App\Http\Controllers;

use App\Models\Erettsegi;
use App\Models\Group;
use Illuminate\Http\Request;

class ErettsegiController extends Controller
{
    // List all items
    public function index()
    {
        // Fetch groups with their associated erettsegis
        $groups = Group::with('erettsegis')->get();
        return view('erettsegi.index', compact('groups'));
    }

    // Show content for a specific item
    public function show(Erettsegi $erettsegi)
    {
        return view('erettsegi.show', compact('erettsegi'));
    }

    // Add a new group
    public function storeGroup(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255']);
        Group::create($request->only('name'));
        return redirect()->route('erettsegi.index');
    }

    // Add a new item
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'group_id' => 'required|exists:groups,id',
        ]);

        Erettsegi::create($request->only('title', 'content', 'group_id'));

        return redirect()->route('erettsegi.index');
    }

    // Edit an item
    public function edit(Erettsegi $erettsegi)
    {
        $groups = Group::all(); // Fetch all groups for the dropdown
        return view('erettsegi.edit', compact('erettsegi', 'groups'));
    }

    // Update an item
    public function update(Request $request, Erettsegi $erettsegi)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'group_id' => 'required|exists:groups,id',
        ]);

        $erettsegi->update($request->only('title', 'content', 'group_id'));

        return redirect()->route('erettsegi.index')->with('success', 'Tétel sikeresen frissítve!');
    }

    // Remove an item
    public function destroy(Erettsegi $erettsegi)
    {
        $erettsegi->delete();

        return redirect()->route('erettsegi.index');
    }
}
