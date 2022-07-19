<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function get_program(Request $request)
    {
        $realisasi = DB::table('trx_sp3 as a')
            ->join('trx_timeline as b','a.timeline_id','b.timeline_id')
            ->get();
    }
}
