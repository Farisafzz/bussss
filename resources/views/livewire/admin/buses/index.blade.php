@extends('partials.dashboard')

@section('content')
<div class="container">
    <h2>Kelola Bus</h2>
    <a href="{{ route('buses.create') }}" class="btn btn-primary mb-3">Tambah Bus</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Plat</th>
                <th>Asal</th>
                <th>Tujuan</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($buses as $bus)
                <tr>
                    <td>{{ $bus->nama_bus }}</td>
                    <td>{{ $bus->plat }}</td>
                    <td>{{ $bus->asal }}</td>
                    <td>{{ $bus->tujuan }}</td>
                    <td>{{ $bus->harga }}</td>
                    <td>
                        <a href="{{ route('buses.edit', $bus) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('buses.destroy', $bus) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
