<?php

namespace App\Http\Controllers;

use App\Models\Env;
use App\Models\Wilayah;
use App\Models\Activity;
use Illuminate\Http\Request;

class WilayahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $env = Env::serve();
        $data = Wilayah::all();
        return view("wilayah.index", compact("env", "data"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $env = Env::serve();
        return view("wilayah.create", compact("env"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WilayahStoreRequest $request)
    {
        Wilayah::create($request->all);
        Activity::created("wilayah", $request->name);
        return redirect()->back()->with("success", "Wilayah berhasil disimpan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Wilayah  $wilayah
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $env = Env::serve();
        $data = Wilayah::whereId($id)->get()->last();
        return view("wilayah.show", compact("env", "data"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Wilayah  $wilayah
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $env = Env::serve();
        $data = Wilayah::whereId($id)->get()->last();
        return view("wilayah.edit", compact("env", "data"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Wilayah  $wilayah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Activity::updated("wilayah", "name", "wilayahs", $id);
        Wilayah::whereId($id)->update($request->except(["_token", "_method"]));
        return redirect()->route("wilayah.index")->with("success", "Wilayah berhasil diperbarui");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wilayah  $wilayah
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Activity::deleted("wilayah", "name", "wilayahs", $id);
        Wilayah::whereId($id)->delete();
        return redirect()->route("wilayah.index")->with("success", "Wilayah berhasil dihapus");
    }
}
