@extends('main')
@section('title', 'mahasiswa')
@section('content')
    <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary mb-3">Tambah Mahasiswa</a>
    @session('success')
        <div class="alert alert-success">
            {{ $value }}
        </div>
    @endsession
    <table class="table table-bordered table-hover">
        <tr>
            <th>Nama</th>
            <th>NPM</th>
            <th>Program Studi</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>

        @foreach ($result as $item)
            <tr>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->npm }}</td>
                <td>{{ $item->prodi->nama_prodi }}</td>
                <td>
                    @if ($item->foto)
                        <img src="{{ asset('storage/' . $item->foto) }}" alt="Foto" width="50">
                    @else
                        <p>Foto tidak tersedia</p>
                    @endif
                </td>
                <td>
                    <a href="{{ route('mahasiswa.edit', $item->id) }}" class="btn btn-warning btn-rounded">Edit</a>
                    <form method="POST" action="{{ route('mahasiswa.destroy', $item->id) }}">
                        @csrf
                        <input name="_method" type="hidden" value="DELETE">
                        <button type="submit" class="btn btn-danger btn-rounded show_confirm" data-toggle="tooltip"
                            title='Delete' data-nama='{{ $item->nama }}'>Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach

    </table>
@endsection