<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject',
        'message',
        'subscriber_id',
        'subscriber_email',
        'sending_date',
        'status',
    ];
}
