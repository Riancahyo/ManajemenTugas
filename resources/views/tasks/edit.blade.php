@extends('layouts.main')

@section('content')
    <div class="container mb-5">
        <h1 class="text-center mb-4">Edit Tugas</h1>

        <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="p-4 bg-light rounded shadow">
        @csrf
        @method('PUT')

            <div class="form-group">
                <label for="title" class="font-weight-bold">User ID</label>
                <input type="text" name="user_id" class="form-control" value="{{ $task->user_id }}" required>
            </div>

            <div class="form-group">
                <label for="title" class="font-weight-bold">Judul</label>
                <input type="text" name="title" class="form-control" value="{{ $task->title }}" required>
            </div>

            <div class="form-group">
                <label for="description" class="font-weight-bold">Deskripsi</label>
                <textarea name="description" class="form-control" required>{{ $task->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="status" class="font-weight-bold">Status</label>
                <select name="status" class="form-control" required>
                    <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="in_progress" {{ $task->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>Completed</option>
                </select>
            </div>

            <div class="form-group">
                <label for="due_date" class="font-weight-bold">Tanggal Selesai</label>
                <input type="date" name="due_date" class="form-control" value="{{ $task->due_date }}" required>
            </div>

            <button type="submit" class="btn btn-success mb-3 mt-2">Perbarui Tugas</button>
        </form>
    </div>
@endsection