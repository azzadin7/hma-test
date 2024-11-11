<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    protected $table = 'theme';

    protected $primaryKey = 'theme_id';

    protected $fillable = [
        'theme_name',
        'theme_code',
        'theme_direction',
        'theme_from',
        'theme_via',
        'theme_to',
        'theme_status'
    ];
}
