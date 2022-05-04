<?php

namespace App\Http\Controllers;

use App\Http\Requests\Sector\CreateSectorRequest;
use App\Models\Agency;
use App\Models\Sector;
use Illuminate\Http\Request;

class SectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sectors = Sector::all();
        return view('admin.sector.index', compact('sectors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agencies = Agency::all();
        return view('admin.sector.create', compact('agencies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSectorRequest $request)
    {
        $data = $request->all();
        Sector::create($data);
        session()->flash('success');
        return redirect(route('sector.index'));
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
    public function edit(Sector $sector)
    {
        $agencies = Agency::all();
        return view('admin.sector.create', compact('sector', 'agencies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateSectorRequest $request, Sector $sector)
    {
        $data = $request->all();
        $sector->update($data);
        session()->flash('success');
        return redirect(route('sector.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sector $sector)
    {
        $sector->delete();
        session()->flash('success');
        return redirect(route('sector.index'));
    }
}
