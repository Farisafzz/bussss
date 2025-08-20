@extends('partials.dashboard')

@section('content')
<div class="container">
    <h2>Daftar Pemesanan</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Kode</th>
                <th>User</th>
                <th>Bus</th>
                <th>Tanggal</th>
                <th>Jumlah Tiket</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bookings as $booking)
                <tr>
                    <td>{{ $booking->kode_booking }}</td>
                    <td>{{ $booking->user->name }}</td>
                    <td>{{ $booking->schedule->bus->nama_bus }}</td>
                    <td>{{ $booking->schedule->tanggal }}</td>
                    <td>{{ $booking->jumlah_tiket }}</td>
                    <td>{{ ucfirst($booking->status) }}</td>
                    <td>
                        <a href="{{ route('bookings.show', $booking) }}" class="btn btn-info btn-sm">Detail</a>
                        <form action="{{ route('bookings.destroy', $booking) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus booking ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
