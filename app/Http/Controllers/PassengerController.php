<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Http\Traits\getEmpresa;
use App\Passenger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PassengerController extends Controller
{

    use getEmpresa;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        // if(request()->expectjson){
          return response()->json(['passengers' => Passenger::where('empresa', $this->getEmpresa())->latest()->get()], 200);
        // }
        // return view('admin.passengers.index');
        
    }
    public function passengersapi()
    {
        
        if (request()->expectsJson()) {
            return datatables(Passenger::where('empresa', $this->getEmpresa())->latest()->get())
                ->addColumn('action', 'admin.passengers.actions')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->toJson();
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $passenger = Passenger::create(request()->all());
        $passenger->empresa = $this->getEmpresa();
        $passenger->save();
        
                if(request()->expectjson){
                    return response()->json(['passengers' => Passenger::where('empresa', $this->getEmpresa())->latest()->get()], 201);
                }
                
                return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Passenger  $passenger
     * @return \Illuminate\Http\Response
     */
    public function show(Passenger $passenger)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Passenger  $passenger
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // if(request()->expectjson){
            return response()->json(Passenger::findOrfail($id));
        // }
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Passenger  $passenger
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
            if ($request->expectsJson()) {
                    try {
                        $cliente = Passenger::findOrFail($request->id);
                        $cliente->update(request()->all());
                        if ($cliente) {
                            return response('Actualizado correctamente', 200);
                        }
                        return response('No hemos podido actualizar', 500);
                    } catch (\Throwable $th) {
                        return  response($th->getMessage());
                    }
                }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Passenger  $passenger
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $passenger = Passenger::findOrfail($id);
        $passenger->delete();
        return response()->json('Eliminado correctamente');
    }
}
