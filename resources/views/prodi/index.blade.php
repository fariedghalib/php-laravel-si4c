@extends('main')

@section('title', 'Program Studi')

@section('content')
    <a href="{{ route('prodi.create') }}" class="btn btn-primary mb-3">Tambah Program Studi</a>
    @session('success')
        <div class="alert alert-success">
            {{ $value }}
        </div>
    @endsession
    <table class="table table-bordered table-hover">
        <tr>
            <th>No</th>
            <th>Nama Prodi</th>
            <th>Singkatan</th>
            <th>Kaprodi</th>
            <th>Fakultas</th>
            <th>Aksi</th>
        </tr>

        @foreach ($prodis as $key => $prodi)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $prodi->nama_prodi }}</td>
                <td>{{ $prodi->singkatan }}</td>
                <td>{{ $prodi->kaprodi }}</td>
                <td>{{ $prodi->fakultas->nama_fakultas ?? '-' }}</td>
                <td>
                    <form method="POST" action="{{ route('prodi.destroy', $prodi->id) }}">
                        @csrf
                        <input name="_method" type="hidden" value="DELETE">
                        <button type="submit" class="btn btn-danger btn-rounded show_confirm" data-toggle="tooltip"
                            title='Delete' data-nama='{{ $prodi->nama_prodi }}'>Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach

    </table>
@endsection