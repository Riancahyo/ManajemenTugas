<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // Tambahkan SoftDeletes
use App\Models\Category;

class Task extends Model
{
    use HasFactory, SoftDeletes; // Gunakan SoftDeletes
    protected $hidden = [
        "id",
        "user_id",
    ];

    // Definisikan atribut yang bisa diisi secara massal
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'due_date',
        'status',
    ];

    // Tambahkan kolom tanggal yang mencakup soft delete
    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
