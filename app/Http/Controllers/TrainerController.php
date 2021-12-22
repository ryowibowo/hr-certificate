<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use Session;

class TrainerController extends Controller
{
    public function index()
    {   
        $data = DB::table('trainers')
                ->get();
        return view('pages.trainer.index', ['data' => $data] );
    }
}
