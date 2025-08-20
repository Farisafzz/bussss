<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bus;

class BusController extends Controller
{
    public function index()
    {
        $buses = Bus::all();
        return view('livewire.admin.buses.index', compact('buses'));
    }

    public function create()
    {
        return view('livewire.admin.buses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_bus' => 'required',
            'plat' => 'required|unique:buses,plat',
            'asal' => 'required',
            'tujuan' => 'required',
            'harga' => 'required|integer'
        ]);

        Bus::create($request->all());

        return redirect()->route('buses.index')->with('success', 'Bus berhasil ditambahkan');
    }

    public function edit(Bus $bus)
    {
        return view('livewire.admin.buses.edit', compact('bus'));
    }

    public function update(Request $request, Bus $bus)
    {
        $request->validate([
            'nama_bus' => 'required',
            'plat' => 'required|unique:buses,plat,' . $bus->id,
            'asal' => 'required',
            'tujuan' => 'required',
            'harga' => 'required|integer'
        ]);

        $bus->update($request->all());

        return redirect()->route('buses.index')->with('success', 'Bus berhasil diperbarui');
    }

    public function destroy(Bus $bus)
    {
        $bus->delete();
        return back()->with('success', 'Bus berhasil dihapus');
    }
}
