@extends('layouts.main')

@section('title', 'Daftar Tugas')

@section('content')
    <h1>Daftar Tugas</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-3 mt-4">
        <a href="{{ route('tasks.create') }}" class="btn btn-primary">Tambah Tugas Baru</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th class="text-center">ID</th>
                <th class="text-center">User ID</th>
                <th class="text-center">Judul</th>
                <th class="text-center">Deskripsi</th>
                <th class="text-center">Status</th>
                <th class="text-center">Tanggal Selesai</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
                <tr>
                    <td class="text-center">{{ $task->id }}</td>
                    <td class="text-center">{{ $task->user_id }}</td>
                    <td class="text-center">{{ $task->title }}</td>
                    <td class="text-center">{{ $task->description }}</td>
                    <td class="text-center">{{ $task->status }}</td>
                    <td class="text-center">{{ $task->due_date }}</td>
                    <td class="text-center">
                        <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-info">Detail</a>
                        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning mr-2 ml-2">Edit</a>
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection