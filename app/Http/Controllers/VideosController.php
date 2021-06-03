<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\EquipmentDatas\DataSycsb;

class VideosController extends Controller
{
    //    萤石云对讲
    public function videodj($id)
    {
        $avideo = DB::table('videos')->find($id);
        return view('videodj', compact('avideo'));
    }
}
