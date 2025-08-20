<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\Bus;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::with('bus')->get();
        return view('livewire.admin.schedules.index', compact('schedules'));
    }

    public function create()
    {
        $buses = Bus::all();
        return view('livewire.admin.schedules.create', compact('buses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'bus_id' => 'required|exists:buses,id',
            'tanggal' => 'required|date',
            'jam_berangkat' => 'required',
            'jam_tiba' => 'nullable',
            'total_kursi' => 'required|integer|min:1',
        ]);

        Schedule::create([
            'bus_id' => $request->bus_id,
            'tanggal' => $request->tanggal,
            'jam_berangkat' => $request->jam_berangkat,
            'jam_tiba' => $request->jam_tiba,
            'total_kursi' => $request->total_kursi,
            'kursi_tersedia' => $request->total_kursi,
        ]);

        return redirect()->route('schedules.index')->with('success', 'Jadwal berhasil ditambahkan');
    }

    public function edit(Schedule $schedule)
    {
        $buses = Bus::all();
        return view('livewire.admin.schedules.edit', compact('schedule', 'buses'));
    }

    public function update(Request $request, Schedule $schedule)
    {
        $request->validate([
            'bus_id' => 'required|exists:buses,id',
            'tanggal' => 'required|date',
            'jam_berangkat' => 'required',
            'jam_tiba' => 'nullable',
            'total_kursi' => 'required|integer|min:1',
        ]);

        $schedule->update([
            'bus_id' => $request->bus_id,
            'tanggal' => $request->tanggal,
            'jam_berangkat' => $request->jam_berangkat,
            'jam_tiba' => $request->jam_tiba,
            'total_kursi' => $request->total_kursi,
            'kursi_tersedia' => $request->kursi_tersedia ?? $schedule->kursi_tersedia,
        ]);

        return redirect()->route('schedules.index')->with('success', 'Jadwal berhasil diperbarui');
    }

    public function destroy(Schedule $schedule)
    {
        $schedule->delete();
        return back()->with('success', 'Jadwal berhasil dihapus');
    }
}