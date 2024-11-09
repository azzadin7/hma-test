<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu';

    protected $primaryKey = 'menu_id';

    protected $fillable = [
        'menu_name',
        'menu_code',
        'menu_order',
        'menu_description',
        'menu_link'
    ];
}
