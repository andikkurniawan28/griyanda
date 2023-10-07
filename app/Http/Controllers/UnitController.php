<?php

namespace App\Http\Controllers;

use App\Models\Env;
use App\Models\Unit;
use App\Models\Activity;
use Illuminate\Http\Request;
use App\Http\Requests\UnitStoreRequest;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $env = Env::serve();
        $data = Unit::all();
        return view("unit.index", compact("env", "data"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $env = Env::serve();
        return view("unit.create", compact("env"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UnitStoreRequest $request)
    {
        Unit::create($request->all());
        Activity::membuat("unit", $request->name);
        return redirect()->back()->with("success", "Unit berhasil disimpan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $env = Env::serve();
        $data = Unit::whereId($id)->get()->last();
        return view("unit.show", compact("env", "data"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $env = Env::serve();
        $data = Unit::whereId($id)->get()->last();
        return view("unit.edit", compact("env", "data"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Activity::mengubah("unit", "name", "units", $id);
        Unit::whereId($id)->update($request->except(["_token", "_method"]));
        return redirect()->route("unit.index")->with("success", "Unit berhasil diperbarui");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Activity::menghapus("unit", "name", "units", $id);
        Unit::whereId($id)->delete();
        return redirect()->route("unit.index")->with("success", "Unit berhasil dihapus");
    }
}
