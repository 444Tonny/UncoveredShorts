<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UniqueSubmitted extends Model
{
    use HasFactory;

    protected $table = 'unique_submitted';

    protected $fillable = [
        'question_id',
        'value',
    ];

    public $timestamps = true;
}
