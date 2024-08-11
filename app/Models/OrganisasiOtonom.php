<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganisasiOtonom extends Model
{
    use HasFactory;

    protected $table = 'organisasi_otonom';
    protected $guarded = ['id', 'created_at', 'updated_at'];
}
