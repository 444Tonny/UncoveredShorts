<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RankedSubmitted extends Model
{
    use HasFactory;

    protected $table = 'ranked_submitted';

    protected $fillable = [
        'question_id',
        'value',
    ];

    public $timestamps = true;
}
