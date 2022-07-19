<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EvaluasiSp3 extends Model
{
    protected $table = 'public.trx_eval_sp3';
    protected $primaryKey = 'eval_sp3_id';
    protected $fillable = [
        'sp3_id',
        'item_cd',
        'item_value',
        'keterangan',
        'created_by',
        'updated_by'
    ];
}
