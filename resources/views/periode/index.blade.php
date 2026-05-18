@extends('main')

@section('title', 'Periode')

@section('content')
    <a href="{{ route('periode.create') }}" class="btn btn-primary mb-3">Tambah Periode</a>
    <table class="table table-bordered table-hover">
        <tr>
            <th>Tahun Akademik</th>
            <th>Semester</th>
        </tr>

        @foreach ($result as $item)
            <tr>
                <td>{{ $item->tahun_akademik }}</td>
                <td>{{ $item->kode_smt }}</td>
            </tr>
        @endforeach

    </table>
@endsection
