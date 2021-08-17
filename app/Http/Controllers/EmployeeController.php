<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use Session;
use Carbon\Carbon;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $data = DB::table('employee')
                ->get();
        return view('pages.employee.index', ['data' => $data] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
    		'name' => 'required',
            'nik' => 'required|integer',
            'phone_number' => 'required|integer'
	    	
    	]);
               
            DB::table('employee')->insert(
                [
                    'name' => $request->name,
                    'nik' => $request->nik,
                    'phone_number' => $request->phone_number,
                    'created_at' => Carbon::now()
                ]
            );
 
            Session::flash('message_alert', 'Berhasil Disimpan');
            return redirect()->route('employee.index'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = DB::table('employee')
        ->where('id', $id)
        ->first();

        return view('pages.employee.edit')->with([
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $update = DB::table('employee')
            ->where('id', $id)
            ->update([
                'name' => $request->name,
                'nik' => $request->nik,
                'phone_number' => $request->phone_number,
                'updated_at' => Carbon::now()
        ]);

        Session::flash('message_alert', 'Berhasil Diupdate');
        return redirect()->route('employee.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = DB::table('employee')->delete($id);
        
        Session::flash('message_alert', 'Berhasil Diapus');
        return redirect()->route('employee.index'); 
    }
}
