<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UniqueAnswer extends Model
{
    use HasFactory;

    protected $table = 'unique_answers';

    protected $fillable = [
        'question_id',
        'percentage',
        'value',
    ];

    public $timestamps = true;
}
