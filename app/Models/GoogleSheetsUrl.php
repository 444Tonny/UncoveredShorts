<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoogleSheetsUrl extends Model
{
    use HasFactory;

    protected $table = 'google_sheets_url';

    // Les attributs qui peuvent être assignés en masse
    protected $fillable = [
        'sheet_name',
        'sheet_url',
    ];

    // Si vous souhaitez activer la gestion automatique des timestamps
    public $timestamps = true;
}
