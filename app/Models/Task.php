<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    // Definisikan atribut yang bisa diisi secara massal
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'due_date',
        'status',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeStatus($query, $status)
    {
        return $query->where('status', $status);
    }
}