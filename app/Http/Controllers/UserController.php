<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use App\Models\Task;

class UserController extends Controller
{
    public function tampil(): string
    {
    return "welcome";
    }

    public function show(string $id){
        $data = Task::find($id);
        return view('tasks.profil', ['dataku' => $data, 'data2' => 10]);
    }
}
