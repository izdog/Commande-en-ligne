<?php

namespace App\Http\Controllers;

use App\Schelude;
use Illuminate\Http\Request;

class ScheludeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $scheludes = Schelude::all();
        return view('admin.schelude.index', compact('scheludes'));
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
        //
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
        $schelude = Schelude::findOrFail($id);
        return view('admin.schelude.edit', compact('schelude'));
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
        $schelude = Schelude::findOrFail($id);
        $this->validate($request, [
            'morning_start' => 'required',
            'morning_end' => 'required',
            'evening_start' => 'required',
            'evening_end' => 'required'
        ]);
        $schelude->update($request->all());
        return redirect(route('schelude.index'))->with('success', 'Les horaires de '.ucfirst($schelude->day).' ont bien été modifié');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
