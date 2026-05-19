@extends('main')

@section('title', 'Tambah Fakultas')

@section('content')
    <form action="{{ route('fakultas.update', $fakultas->id) }}" method="post">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="nama_fakultas">Nama Fakultas</label>
            <input type="text" name="nama_fakultas" class="form-control" value="{{ old('nama_fakultas', $fakultas->nama_fakultas) }}">
            @error('nama_fakultas')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="singkatan">Singkatan</label>
            <input type="text" name="singkatan" class="form-control" value="{{ old('singkatan', $fakultas->singkatan) }}">
            @error('singkatan')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="dekan">Nama Dekan</label>
            <input type="text" name="dekan" class="form-control" value="{{ old('dekan', $fakultas->dekan) }}">
            @error('dekan')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
    </form>
@endsection
