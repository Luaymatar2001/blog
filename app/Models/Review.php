<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $fillable = ['news_id', 'content', 'rate', 'subject', 'name', 'email'];
    protected $appends = ['time_format'];
    public function news()
    {
        return $this->belongsTo(news::class, 'news_id');
    }
    public function getTimeFormatAttribute()
    {

        return $this->updated_at->diffForHumans(null, true);
    }
}
