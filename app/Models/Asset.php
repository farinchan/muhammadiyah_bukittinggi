<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;

    protected $table = 'asset';
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function type()
    {
        return $this->belongsTo(AssetType::class, 'asset_type_id');
    }

}
