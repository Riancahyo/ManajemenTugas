@extends('layouts.main')

@section('title', 'Buat Tugas Baru')

@section('content')
    <div class="container mt-2 mb-5">
        <h1 class="text-center mb-4">Buat Tugas Baru</h1>
        <form action="{{ route('tasks.store') }}" method="POST" class="p-4 bg-light rounded shadow">
            @csrf
            <div class="form-group">
                <label for="title" class="font-weight-bold">User ID</label>
                <input type="text" name="user_id" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="title" class="font-weight-bold">Judul</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description" class="font-weight-bold">Deskripsi</label>
                <textarea name="description" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="due_date" class="font-weight-bold">Tanggal Selesai</label>
                <input type="date" name="due_date" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="status" class="font-weight-bold">Status</label>
                <select name="status" class="form-control">
                    <option value="pending">Pending</option>
                    <option value="in_progress">In Progress</option>
                    <option value="completed">Completed</option>
                </select>
            </div>
            </select>
            <button type="submit" class="btn btn-success mt-3">Simpan</button>
        </form>
    </div>
@endsection