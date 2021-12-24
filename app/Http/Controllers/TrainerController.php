<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use Session;
use Carbon\Carbon;


class TrainerController extends Controller
{
    public function index()
    {   
        $data = DB::table('trainers')
                ->select('trainers.*', 'trainer_details.training_name' )
                ->leftJoin('trainer_details','trainer_details.trainers_id','=','trainers.id')
                ->get();
        return view('pages.trainer.index', ['data' => $data] );
    }

    public function create()
    {
        return view('pages.trainer.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
    		'name' => 'required',
            'training_name' => 'required',
            'phone_number' => 'required'
	    	
    	]);

        DB::beginTransaction();
        try {

            $header = DB::table('trainers')
            ->insert([
                    'name' => $request->name,
                    'phone_number' => $request->phone_number,
                    'created_at' => Carbon::now()
                ]
            );
            $id = DB::getPdo()->lastInsertId();

            $detail = DB::table('trainer_details')
                ->insert([
                    'trainers_id' => $id,
                    'training_name' => $request->training_name,
                    'created_at' => Carbon::now()
                ]);
            DB::commit();

        } catch (Exception $e) {
            DB::rollback();
            $e->getMessage();
        }
       

        Session::flash('message_alert', 'Berhasil Disimpan');
        return redirect()->route('trainer'); 
    }
}
