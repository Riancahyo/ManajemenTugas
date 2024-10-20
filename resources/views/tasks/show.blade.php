@extends('layouts.main')

@section('content')
    <div class="container">
        <h1 class="text-center mb-4">{{ $task->title }}</h1>
        
        <div class="p-4 bg-light rounded shadow mb-5">
            <div class="card-body">
                <h5 class="card-title">ID</h5>
                <p class="card-text">{{ $task->id }}</p>

                <h5 class="card-title">User ID</h5>
                <p class="card-text">{{ $task->user_id }}</p>

                <h5 class="card-title">Judul</h5>
                <p class="card-text">{{ $task->title }}</p>

                <h5 class="card-title">Deskripsi</h5>
                <p class="card-text">{{ $task->description }}</p>
                
                <h5 class="card-title">Status</h5>
                <p class="card-text">{{ $task->status }}</p>
                
                <h5 class="card-title">Tanggal Selesai</h5>
                <p class="card-text">{{ $task->due_date }}</p>
                
                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary mt-3">Edit</a>
            </div>
        </div>
    </div>
@endsection
