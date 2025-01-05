<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class income extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'title', 'income_type', 'date_from', 'date_to', 'total_amount'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
