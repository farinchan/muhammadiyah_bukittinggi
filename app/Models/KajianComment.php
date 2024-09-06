<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KajianComment extends Model
{
    use HasFactory;

    protected $table = 'kajian_comment';
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function kajian()
    {
        return $this->belongsTo(Kajian::class, 'kajian_id');
    }

    public function parent()
    {
        return $this->belongsTo(KajianComment::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(KajianComment::class, 'parent_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
