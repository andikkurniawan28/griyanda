<?php

namespace App\Http\Controllers;

use App\Models\Env;
use App\Models\Fasilitas;
use App\Models\Activity;
use Illuminate\Http\Request;
use App\Http\Requests\FasilitasStoreRequest;

class FasilitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $env = Env::serve();
        $data = Fasilitas::all();
        return view("fasilitas.index", compact("env", "data"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $env = Env::serve();
        return view("fasilitas.create", compact("env"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FasilitasStoreRequest $request)
    {
        Fasilitas::create($request->all());
        Activity::membuat("fasilitas", $request->name);
        return redirect()->back()->with("success", "Fasilitas berhasil disimpan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fasilitas  $fasilitas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $env = Env::serve();
        $data = Fasilitas::whereId($id)->get()->last();
        return view("fasilitas.show", compact("env", "data"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fasilitas  $fasilitas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $env = Env::serve();
        $data = Fasilitas::whereId($id)->get()->last();
        return view("fasilitas.edit", compact("env", "data"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fasilitas  $fasilitas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Activity::mengubah("fasilitas", "name", "fasilitass", $id);
        Fasilitas::whereId($id)->update($request->except(["_token", "_method"]));
        return redirect()->route("fasilitas.index")->with("success", "Fasilitas berhasil diperbarui");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fasilitas  $fasilitas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Activity::menghapus("fasilitas", "name", "fasilitass", $id);
        Fasilitas::whereId($id)->delete();
        return redirect()->route("fasilitas.index")->with("success", "Fasilitas berhasil dihapus");
    }
}
