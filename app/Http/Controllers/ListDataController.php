<?php

namespace App\Http\Controllers;

use App\Models\ListData;
use Illuminate\Http\Request;

class ListDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listdata = ListData::all();
        // //render view with dataadmin
        return view('listdata.index', compact('listdata'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('listdata.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'status' => 'required',
        ]);

        ListData::create($request->all());

        return redirect()->route('listdata.index')
            ->with('success', 'listdata created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $listdata = ListData::findOrFail($id);
        return view('listdata.show', compact('listdata'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $listdata = ListData::findOrFail($id);
        return view('listdata.edit', compact('listdata'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'status' => 'required',
        ]);
        $listdata = ListData::findOrFail($id);

        $listdata->update($request->all());

        return redirect()->route('listdata.index')
            ->with('success', 'listdata updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $listdata = ListData::findOrFail($id);
        $listdata->delete();

        return redirect()->route('listdata.index')
            ->with('success', 'listdata deleted successfully');
    }
}
