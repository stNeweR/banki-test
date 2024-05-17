<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'date', 'time'
    ];

    protected static function boot() {
        static::creating(function (Image $image) {
            $image->date = now()->toDateString();
            $image->time = now()->format('H:i');
        });
        parent::boot();
    }
}
