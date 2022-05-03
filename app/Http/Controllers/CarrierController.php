<?php

namespace App\Http\Controllers;

use App\Http\Requests\Carrier\CreateCarrierRequest;
use App\Models\Carrier;
use Illuminate\Http\Request;

class CarrierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carriers = Carrier::all();
        return view('admin.carrier.index', compact('carriers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.carrier.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCarrierRequest $request)
    {
        $data = $request->all();
        Carrier::create($data);
        session()->flash('success');
        return redirect(route('carrier.index'));
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
    public function edit(Carrier $carrier)
    {
        return view('admin.carrier.create', compact('carrier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateCarrierRequest $request, Carrier $carrier)
    {
        $data = $request->all();
        $carrier->update($data);
        session()->flash('success');
        return redirect(route('carrier.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carrier $carrier)
    {
        $carrier->delete();
        session()->flash('success');
        return redirect(route('carrier.index'));
    }
}
