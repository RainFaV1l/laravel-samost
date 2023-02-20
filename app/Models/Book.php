<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'author_id',
        'path',
    ];

    protected $hidden = [

    ];

    // Создаем связь
    public function author() {
        return $this->hasOne(User::class, 'id', 'author_id')->first();
    }

    // image_url
    public function getImageUrlAttribute() {
        return asset('public' . Storage::url($this->path));
    }

}
