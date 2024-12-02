<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tasks') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

{{-- @extends('layouts.main') --}}

{{-- @section('title', 'Daftar Tugas') --}}

{{-- @section('content') --}}
    <h1 class="mb-4">Daftar Tugas</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="{{ route('tasks.create') }}" class="btn btn-primary">Tambah Tugas Baru</a>
        
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">User ID</th>
                        <th class="text-center">Judul</th>
                        <th class="text-center">Deskripsi</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Tanggal Selesai</th>
                        <th class="text-center">Kategori</th>
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
                            <td class="text-center">{{ $task->category->name }}</td>
                            <td class="text-center">
                                <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-info btn-sm">Detail</a>
                                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning btn-sm mx-1 mr-2 ml-2">Edit</a>
                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
{{-- @endsection --}}

                </div>
            </div>
        </div>
    </div>
</x-app-layout>