@extends('partials.dashboard')

@section('content')
<div class="container">
    <h2>Edit Bus</h2>

    <form action="{{ route('buses.update', $bus) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Nama Bus</label>
            <input type="text" name="nama_bus" class="form-control" value="{{ $bus->nama_bus }}" required>
        </div>
        <div class="mb-3">
            <label>Plat</label>
            <input type="text" name="plat" class="form-control" value="{{ $bus->plat }}" required>
        </div>
        <div class="mb-3">
            <label>Asal</label>
            <input type="text" name="asal" class="form-control" value="{{ $bus->asal }}" required>
        </div>
        <div class="mb-3">
            <label>Tujuan</label>
            <input type="text" name="tujuan" class="form-control" value="{{ $bus->tujuan }}" required>
        </div>
        <div class="mb-3">
            <label>Harga</label>
            <input type="number" name="harga" class="form-control" value="{{ $bus->harga }}" required>
        </div>
        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
