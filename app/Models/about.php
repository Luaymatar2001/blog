<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class about extends Model
{
    use HasFactory;
    protected $table = 'abouts';
    protected $appends = ['image_url'];

    protected $fillable = ['logo', 'name'];

    public function getImageUrlAttribute()
    {
        $path = Storage::disk('public')->url($this->logo);
        return  $path;
    }
}
