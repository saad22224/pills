<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class expenses extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'title',
        'price',
        'date',
        'description',
        'expenses_image',
        'type',
        'provider',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
