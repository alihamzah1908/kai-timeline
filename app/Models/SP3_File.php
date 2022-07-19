<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use function PHPSTORM_META\map;

class SP3_File extends Model
{
    protected $table = 'public.sp3_file';
    protected $primaryKey = 'sp3_file_id';
    protected $fillable = [
        'sp3_file_id',
        'sp3_id',
        'file',
        'created_by',
        'updated_by'
    ];
}
