<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetType extends Model
{
    use HasFactory;

    protected $table = 'asset_type';
    protected $fillable = ['icon', 'name', 'slug', 'description', 'meta_title', 'meta_description', 'meta_keywords'];

    public function assets()
    {
        return $this->hasMany(Asset::class);
    }
}
