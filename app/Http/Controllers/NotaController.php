<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class NotaController extends Controller
{
        public function index() {
            $datas = DB::select('select * from nota');
            return view('nota.index')->with('datas', $datas);
            }        
}
