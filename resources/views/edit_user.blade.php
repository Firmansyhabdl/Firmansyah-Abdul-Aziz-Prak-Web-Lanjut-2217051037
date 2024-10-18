@extends('layouts.app')
@section('content')
<div class="form-container">
        <h1>Form User</h1>
        <form action="{{ route('user.update',$user['id']) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3 form-group">
                <label for="nama" class="form-label">Nama:</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Masukkan Nama" value="{{ old('nama',$user->nama) }}" required>
                @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3 form-group">
                <label for="npm" class="form-label">NPM:</label>
                <input type="text" class="form-control @error('npm') is-invalid @enderror" id="npm" name="npm" placeholder="Masukkan NPM" value="{{ old('npm',$user->npm) }}" required>
                @error('npm')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3 form-group">
                <label for="id_kelas" class="form-label">Kelas:</label>
                <i class="bi bi-people"></i>
                <select name="kelas_id" id="kelas_id" class="form-control" required>
                    @foreach ($kelas as $kelasItem)
                        <option value="{{ $kelasItem->id }}"
                        {{$kelasItem->id == $user->kelas_id ? 'selected' : ''}}>
                        {{ $kelasItem->nama_kelas }}
                    </option>
                    @endforeach
                </select>
                @error('kelas_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="Form-group">
                <label for="foto">foto:</label><br>
                <input type="file" id="foto" name="foto"><br>
                @if($user->foto)
                <img src="{{asset($user->foto) }}" alt="User Pic" width = "100" class="mt-2">
                @endif
            </div>
            <button type="submit" class="btn btn-custom">Submit</button>
        </form>
    </div>
@endsection