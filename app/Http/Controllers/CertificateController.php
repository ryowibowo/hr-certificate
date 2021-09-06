<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use Session;
use Carbon\Carbon;

class CertificateController extends Controller
{
    public function index()
    {
        $data = DB::table('certificates as a')
                ->select('a.id','a.nik', 'a.training_name', 'a.training_date',
                        'b.name'
                    )
                ->join('employee as b', 'b.nik', '=', 'a.nik')
                ->get();
        // dd($data);
        return view('pages.certificate.index', ['data' => $data] );
    }
    
    public function create()
    {
        return view('pages.certificate.create');
    }
}
