<?php

namespace App\Http\Controllers;

use App\Models\Env;
use App\Models\Unit;
use App\Models\Skema;
use App\Models\Activity;
use Illuminate\Http\Request;
use App\Http\Requests\SkemaStoreRequest;

class SkemaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $env = Env::serve();
        $data = Skema::all();
        return view("skema.index", compact("env", "data"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $env = Env::serve();
        return view("skema.create", compact("env"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SkemaStoreRequest $request)
    {
        Skema::create($request->all());
        Activity::membuat("skema", $request->name);
        Unit::addColumn($request);
        return redirect()->back()->with("success", "Skema berhasil disimpan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Skema  $skema
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $env = Env::serve();
        $data = Skema::whereId($id)->get()->last();
        return view("skema.show", compact("env", "data"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Skema  $skema
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $env = Env::serve();
        $data = Skema::whereId($id)->get()->last();
        return view("skema.edit", compact("env", "data"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Skema  $skema
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Activity::mengubah("skema", "name", "skemas", $id);
        Skema::whereId($id)->update($request->except(["_token", "_method"]));
        return redirect()->route("skema.index")->with("success", "Skema berhasil diperbarui");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Skema  $skema
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $name = Skema::whereId($id)->get()->last()->name;
        Activity::menghapus("skema", "name", "skemas", $id);
        Skema::whereId($id)->delete();
        Unit::dropColumn($name);
        return redirect()->route("skema.index")->with("success", "Skema berhasil dihapus");
    }
}
