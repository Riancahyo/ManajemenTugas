<?php

namespace App\Models;

use Database\Factories\CategoryFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Category extends Model
{
    protected $fillable = ['name', 'slug', 'description'];
    use HasFactory;
    protected static function newFactory()
    {
        return new CategoryFactory();
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}

