@extends('partials.dashboard')

@section('content')
<div class="container">
    <h2>Tambah Jadwal</h2>

    <form action="{{ route('schedules.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Bus</label>
            <select name="bus_id" class="form-control" required>
                <option disabled selected>Pilih Bus</option>
                @foreach($buses as $bus)
                    <option value="{{ $bus->id }}">{{ $bus->nama_bus }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Jam Berangkat</label>
            <input type="time" name="jam_berangkat" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Jam Tiba (Opsional)</label>
            <input type="time" name="jam_tiba" class="form-control">
        </div>
        <div class="mb-3">
            <label>Total Kursi</label>
            <input type="number" name="total_kursi" class="form-control" required>
        </div>
        <button class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
