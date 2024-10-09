@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-xl font-bold mb-4">Daftar Pengguna</h1>
    <table class="table table-striped table-bordered">
        <thead class="thead-light">
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>NPM</th>
                <th>Kelas</th>
            </tr>
        </thead>
        <tbody>
            @if ($users->isEmpty())
                <tr>
                    <td colspan="5" class="text-center">Tidak ada pengguna ditemukan.</td>
                </tr>
            @else
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->nama }}</td>
                    <td>{{ $user->npm }}</td>
                    <td>{{ $user->kelas->nama_kelas ?? 'Tidak ada kelas' }}</td>
                </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>
@endsection
