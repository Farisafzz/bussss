<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Schedule;


class BoookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with('user', 'schedule.bus')->orderBy('created_at', 'desc')->get();
        return view('livewire.admin.bookings.index', compact('bookings'));
    }

    public function show(Booking $booking)
    {
        $booking->load('user', 'schedule.bus');
        return view('luvewire.admin.bookings.show', compact('booking'));
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();
        return back()->with('success', 'Pemesanan berhasil dihapus');
    }
}