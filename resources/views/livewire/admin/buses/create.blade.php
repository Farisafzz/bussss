@extends('partials.dashboard')

@section('content')
<div class="container">
    <h2>Tambah Bus</h2>

    <form action="{{ route('buses.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nama Bus</label>
            <input type="text" name="nama_bus" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Plat</label>
            <input type="text" name="plat" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Asal</label>
            <input type="text" name="asal" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Tujuan</label>
            <input type="text" name="tujuan" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Harga</label>
            <input type="number" name="harga" class="form-control" required>
        </div>
        <button class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
