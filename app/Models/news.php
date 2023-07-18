<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Carbon\Carbon;
use Carbon\CarbonInterface;

class news extends Model
{
  use HasFactory, SoftDeletes, HasSlug;
  protected $table = 'news';
  protected $fillable = ['title', 'subject', 'user_id', 'source_news', 'image'];
  protected $appends = ['image_url', 'time_format'];
  public function user()
  {
    return $this->belongsTo(user::class, 'user_id')->withDefault([
      'title' => 'undefained',
      'subject' => 'undefained',
    ]);
  }

  public function reviews()
  {
    return $this->hasMany(Review::class, 'news_id' , 'id');
  }
  public static function booted()
  {
    static::addGlobalScope('owner', function (Builder $query) {
      $query->where('user_id', Auth::id());
    });
  }

  public function getSlugOptions(): SlugOptions
  {
    return SlugOptions::create()
      ->generateSlugsFrom('title')
      ->saveSlugsTo('slug');
  }
  public function getImageUrlAttribute()
  {
    $path = Storage::disk('public')->url($this->image);
    return  $path;
  }

  public function getTimeFormatAttribute()
  {

    return $this->updated_at->diffForHumans(null, true);
  }
}
