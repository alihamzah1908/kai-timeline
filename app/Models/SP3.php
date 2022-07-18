<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SP3 extends Model
{
    protected $table = 'public.trx_sp3';
    protected $primaryKey = 'sp3_id';
    protected $fillable = [
        'sp3_id',
        'timeline_id',
        'directorate_cd',
        'division_cd',
        'department_cd',
        'judul_pengadaan',
        'no_pengadaan',
        'sumber_dana',
        'jenis_kontrak',
        'beban_biaya',
        'pbj',
        'nilai_pr',
        'type_tax',
        'nilai_tax',
        'start_date_pengadaan',
        'end_date_pengadaan',
        'proses_st',
        'no_justifikasi',
        'tanggal_justifikasi',
        'no_mi',
        'tanggal_mi',
        'no_kak',
        'tanggal_kak',
        'no_rab',
        'tanggal_rab',
        'no_pr',
        'tanggal_pr',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at'
    ];
}
