<?php

namespace App\Http\Controllers;

use App\Models\Env;
use App\Models\Area;
use App\Models\Activity;
use Illuminate\Http\Request;
use App\Http\Requests\AreaStoreRequest;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $env = Env::serve();
        $data = Area::all();
        return view("area.index", compact("env", "data"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $env = Env::serve();
        return view("area.create", compact("env"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AreaStoreRequest $request)
    {
        Area::create($request->all());
        Activity::membuat("area", $request->name);
        return redirect()->back()->with("success", "Area berhasil disimpan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $env = Env::serve();
        $data = Area::whereId($id)->get()->last();
        return view("area.show", compact("env", "data"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $env = Env::serve();
        $data = Area::whereId($id)->get()->last();
        return view("area.edit", compact("env", "data"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Activity::mengubah("area", "name", "areas", $id);
        Area::whereId($id)->update($request->except(["_token", "_method"]));
        return redirect()->route("area.index")->with("success", "Area berhasil diperbarui");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Activity::menghapus("area", "name", "areas", $id);
        Area::whereId($id)->delete();
        return redirect()->route("area.index")->with("success", "Area berhasil dihapus");
    }
}
