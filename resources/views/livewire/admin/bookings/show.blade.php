@extends('partials.dashboard')

@section('content')
<div class="container">
    <h2>Detail Pemesanan</h2>

    <ul class="list-group">
        <li class="list-group-item"><strong>Kode:</strong> {{ $booking->kode_booking }}</li>
        <li class="list-group-item"><strong>Nama:</strong> {{ $booking->user->name }}</li>
        <li class="list-group-item"><strong>Bus:</strong> {{ $booking->schedule->bus->nama_bus }}</li>
        <li class="list-group-item"><strong>Jumlah Tiket:</strong> {{ $booking->jumlah_tiket }}</li>
        <li class="list-group-item"><strong>Status:</strong> {{ $booking->status }}</li>
    </ul>
</div>
@endsection
