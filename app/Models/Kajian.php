<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kajian extends Model
{
    use HasFactory;

    protected $table = 'kajian';
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function kajianViewer()
    {
        return $this->hasMany(KajianViewer::class, 'kajian_id');
    }

    public function kajianComment()
    {
        return $this->hasMany(KajianComment::class, 'kajian_id');
    }
}
