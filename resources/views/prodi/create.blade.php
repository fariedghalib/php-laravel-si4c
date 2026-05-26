@extends('main')

@section('title', 'Tambah Program Studi')

@section('content')
    <form action="{{ route('prodi.store') }}" method="post">
        <div class="form-group">
            <label for="nama_prodi">Nama Program Studi</label>
            <input type="text" name="nama_prodi" class="form-control" value="{{ old('nama_prodi') }}">
            @error('nama_prodi')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="singkatan">Singkatan</label>
            <input type="text" name="singkatan" class="form-control" value="{{ old('singkatan') }}">
            @error('singkatan')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="kaprodi">Nama Kaprodi</label>
            <input type="text" name="kaprodi" class="form-control" value="{{ old('kaprodi') }}">
            @error('kaprodi')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="fakultas_id">Fakultas</label>
            <select name="fakultas_id" class="form-control">
                <option value="">-- Pilih Fakultas --</option>
                @foreach($fakultas as $f)
                    <option value="{{ $f->id }}" {{ old('fakultas_id') == $f->id ? 'selected' : '' }}>{{ $f->nama_fakultas }}</option>
                @endforeach
            </select>
            @error('fakultas_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
    </form>
@endsection