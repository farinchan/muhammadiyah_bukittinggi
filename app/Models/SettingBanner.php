<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingBanner extends Model
{
    use HasFactory;

    protected $table = 'setting_banner';
    protected $fillable = ['title', 'subtitle', 'image', 'url', 'status'];
    
}
