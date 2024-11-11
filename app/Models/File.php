<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $table = 'file';

    protected $primaryKey = 'file_id';

    protected $fillable = [
        'file_name',
        'file_type',
        'file_path',
        'file_description'
    ];
}
