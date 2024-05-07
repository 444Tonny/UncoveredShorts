<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColorGradient extends Model
{
    use CrudTrait;
    use HasFactory;

    protected $table = 'colors_gradient';

    protected $fillable = [
        'limit',
        'hex',
    ];

    public $timestamps = false;
}
