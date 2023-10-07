<?php

namespace App\Http\Controllers;

use App\Models\Env;
use App\Models\Tipe;
use App\Models\Activity;
use Illuminate\Http\Request;
use App\Http\Requests\TipeStoreRequest;

class TipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $env = Env::serve();
        $data = Tipe::all();
        return view("tipe.index", compact("env", "data"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $env = Env::serve();
        return view("tipe.create", compact("env"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TipeStoreRequest $request)
    {
        Tipe::create($request->all());
        Activity::membuat("tipe", $request->name);
        return redirect()->back()->with("success", "Tipe berhasil disimpan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tipe  $tipe
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $env = Env::serve();
        $data = Tipe::whereId($id)->get()->last();
        return view("tipe.show", compact("env", "data"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tipe  $tipe
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $env = Env::serve();
        $data = Tipe::whereId($id)->get()->last();
        return view("tipe.edit", compact("env", "data"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tipe  $tipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Activity::mengubah("tipe", "name", "tipes", $id);
        Tipe::whereId($id)->update($request->except(["_token", "_method"]));
        return redirect()->route("tipe.index")->with("success", "Tipe berhasil diperbarui");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tipe  $tipe
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Activity::menghapus("tipe", "name", "tipes", $id);
        Tipe::whereId($id)->delete();
        return redirect()->route("tipe.index")->with("success", "Tipe berhasil dihapus");
    }
}
