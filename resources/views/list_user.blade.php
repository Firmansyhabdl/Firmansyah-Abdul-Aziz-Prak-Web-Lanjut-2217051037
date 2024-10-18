@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-xl font-bold mb-4">Daftar Pengguna</h1>
    <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">Tambah Pengguna Baru</a>
    <table class="table table-striped table-bordered">
        <thead class="thead-light">
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>NPM</th>
                <th>Kelas</th>
                <th>Aksi</th>
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
                    <td>
                        <a href="{{ route('user.show', $user->id) }}" class="btn btn-info mb-3">View</a>
                        <a href="{{ route('user.edit', $user->id)}}" class="btn btn-warning mb-3">Edit</a>
                        <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger mb-3" onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>
@endsection
