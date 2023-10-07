<?php

namespace App\Http\Controllers;

use App\Models\Env;
use App\Models\Role;
use App\Models\Activity;
use Illuminate\Http\Request;
use App\Http\Requests\RoleStoreRequest;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $env = Env::serve();
        $data = Role::all();
        return view("role.index", compact("env", "data"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $env = Env::serve();
        return view("role.create", compact("env"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleStoreRequest $request)
    {
        Role::create($request->all());
        Activity::membuat("role", $request->name);
        return redirect()->back()->with("success", "Role berhasil disimpan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $env = Env::serve();
        $data = Role::whereId($id)->get()->last();
        return view("role.show", compact("env", "data"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $env = Env::serve();
        $data = Role::whereId($id)->get()->last();
        return view("role.edit", compact("env", "data"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Activity::mengubah("role", "name", "roles", $id);
        Role::whereId($id)->update($request->except(["_token", "_method"]));
        return redirect()->route("role.index")->with("success", "Role berhasil diperbarui");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Activity::menghapus("role", "name", "roles", $id);
        Role::whereId($id)->delete();
        return redirect()->route("role.index")->with("success", "Role berhasil dihapus");
    }
}
