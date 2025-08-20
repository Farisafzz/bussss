@extends('partials.dashboard')

@section('content')
<div class="container">
    <h2>Kelola Jadwal</h2>
    <a href="{{ route('schedules.create') }}" class="btn btn-primary mb-3">Tambah Jadwal</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Bus</th>
                <th>Tanggal</th>
                <th>Jam Berangkat</th>
                <th>Jam Tiba</th>
                <th>Kursi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($schedules as $s)
                <tr>
                    <td>{{ $s->bus->nama_bus }}</td>
                    <td>{{ $s->tanggal }}</td>
                    <td>{{ $s->jam_berangkat }}</td>
                    <td>{{ $s->jam_tiba ?? '-' }}</td>
                    <td>{{ $s->kursi_tersedia }} / {{ $s->total_kursi }}</td>
                    <td>
                        <a href="{{ route('schedules.edit', $s) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('schedules.destroy', $s) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
