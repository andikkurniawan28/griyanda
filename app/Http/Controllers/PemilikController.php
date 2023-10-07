<?php

namespace App\Http\Controllers;

use App\Models\Env;
use App\Models\Pemilik;
use App\Models\Activity;
use Illuminate\Http\Request;
use App\Http\Requests\PemilikStoreRequest;

class PemilikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $env = Env::serve();
        $data = Pemilik::all();
        return view("pemilik.index", compact("env", "data"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $env = Env::serve();
        return view("pemilik.create", compact("env"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PemilikStoreRequest $request)
    {
        Pemilik::create($request->all());
        Activity::membuat("pemilik", $request->name);
        return redirect()->back()->with("success", "Pemilik berhasil disimpan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pemilik  $pemilik
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $env = Env::serve();
        $data = Pemilik::whereId($id)->get()->last();
        return view("pemilik.show", compact("env", "data"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pemilik  $pemilik
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $env = Env::serve();
        $data = Pemilik::whereId($id)->get()->last();
        return view("pemilik.edit", compact("env", "data"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pemilik  $pemilik
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Activity::mengubah("pemilik", "name", "pemiliks", $id);
        Pemilik::whereId($id)->update($request->except(["_token", "_method"]));
        return redirect()->route("pemilik.index")->with("success", "Pemilik berhasil diperbarui");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pemilik  $pemilik
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Activity::menghapus("pemilik", "name", "pemiliks", $id);
        Pemilik::whereId($id)->delete();
        return redirect()->route("pemilik.index")->with("success", "Pemilik berhasil dihapus");
    }
}
