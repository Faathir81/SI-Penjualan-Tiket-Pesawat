@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Tambah Check-in</h3>
    <form action="{{ route('checkins.store', ['transaksi_id' => $transaksi_id]) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="checkin_status">Status Check-in</label>
            <input type="text" class="form-control" name="checkin_status" required>
        </div>
        <div class="form-group">
            <label for="checkin_time">Waktu Check-in</label>
            <input type="datetime-local" class="form-control" name="checkin_time">
        </div>
        <button type="submit" class="btn btn-primary">Simpan Check-in</button>
    </form>
</div>
@endsection