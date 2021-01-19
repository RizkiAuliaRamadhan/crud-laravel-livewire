<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pemasukan extends Model
{
    use HasFactory;

    protected $fillable = ['nominal', 'keterangan', 'created_at', 'updated_at'];
}
