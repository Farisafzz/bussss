@extends('partials.dashboard')

@section('content')
<div class="container">
    <h2>Edit Jadwal</h2>

    <form action="{{ route('schedules.update', $schedule->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Bus</label>
            <select name="bus_id" class="form-control" required>
                @foreach($buses as $bus)
                    <option value="{{ $bus->id }}" {{ $schedule->bus_id == $bus->id ? 'selected' : '' }}>
                        {{ $bus->nama_bus }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="{{ $schedule->tanggal }}" required>
        </div>

        <div class="mb-3">
            <label>Jam Berangkat</label>
            <input type="time" name="jam_berangkat" class="form-control" value="{{ $schedule->jam_berangkat }}" required>
        </div>

        <div class="mb-3">
            <label>Jam Tiba (Opsional)</label>
            <input type="time" name="jam_tiba" class="form-control" value="{{ $schedule->jam_tiba }}">
        </div>

        <div class="mb-3">
            <label>Total Kursi</label>
            <input type="number" name="total_kursi" class="form-control" value="{{ $schedule->total_kursi }}" required>
        </div>

        <div class="mb-3">
            <label>Kursi Tersedia</label>
            <input type="number" name="kursi_tersedia" class="form-control" value="{{ $schedule->kursi_tersedia }}" required>
        </div>

        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
