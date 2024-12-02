<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTaskRequest;

class TaskController extends Controller
{
    // Menampilkan semua task
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    // Menampilkan form untuk membuat task baru
    public function create()
    {
        $category = Category::all();
        return view('tasks.create', compact('category'));
    }

    // Menyimpan task baru ke database
    public function store(StoreTaskRequest $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id', // user_id harus sesuai dengan id di tabel users
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'due_date' => 'required|date',
            'status' => 'required|in:pending,in_progress,completed', // sesuaikan dengan opsi status
        ]);
    
        // Simpan data ke dalam database
        Task::create($validatedData);
    
        return redirect()->route('tasks.index')->with('success', 'Tugas berhasil disimpan.');
    }

    // Menampilkan detail dari satu task
    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    // Menampilkan form untuk mengedit task
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    // Mengupdate task di database
    public function update(Request $request, Task $task)
    {
        // Validasi input
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id', // Memastikan user_id valid
            'title' => 'required|string|max:255',
            'description' => 'nullable|string', // Optional, bisa null
            'status' => 'required|in:pending,in_progress,completed',
            'due_date' => 'required|date',
        ]);

        // Update data task
        $task->update($validatedData);

        return redirect()->route('tasks.index')->with('success', 'Tugas berhasil diperbarui.');
    }

    // Menghapus task dari database
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Tugas berhasil dihapus.');
    }
}
