<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Model
{
  use HasFactory, SoftDeletes;

  protected $fillable = [
    'name',
    'stock',
    'slug',
    'type_id',
    'brand_id',
    'photos',
    'features',
    'price',
    'star',
    'review',
  ];

  protected $casts = [
    'photos' => 'array',
  ];

  public function getThumbnailAttribute()
  {
    if ($this->photos) {
      return Storage::url(json_decode($this->photos)[0]);
    }

    return asset('images/images-coming-soon.jpeg');
  }

  public function type()
  {
    return $this->belongsTo(Type::class);
  }

  public function brand()
  {
    return $this->belongsTo(Brand::class);
  }

  public function bookings()
  {
    return $this->hasMany(Booking::class);
  }
}
