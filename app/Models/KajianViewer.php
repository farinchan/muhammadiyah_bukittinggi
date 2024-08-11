<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KajianViewer extends Model
{
    use HasFactory;

    protected $table = 'kajian_viewer';
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function kajian()
    {
        return $this->belongsTo(Kajian::class, 'kajian_id');
    }
}
