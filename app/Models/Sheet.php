<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sheet extends Model
{
    use HasFactory;

    protected $table = 'sheets';

    protected $fillable = [
        'name',
        'sheet_url',
    ];

    public $timestamps = false;
}
