<?php

namespace App\Http\Controllers;

use App\Models\Env;
use App\Models\Role;
use App\Models\User;
use App\Models\Activity;
use Illuminate\Http\Request;
use App\Http\Requests\UserStoreRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $env = Env::serve();
        $data = User::all();
        return view("user.index", compact("env", "data"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $env = Env::serve();
        $role = Role::select(["id", "name"])->orderBy("id", "asc")->get();
        return view("user.create", compact("env", "role"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserStoreRequest $request)
    {
        $request->request->add(["password" => bcrypt($request->password)]);
        User::create($request->all());
        Activity::membuat("user", $request->name);
        return redirect()->route("user.index")->with("success", "User berhasil dibuat");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $env = Env::serve();
        $data = User::whereId($id)->get()->last();
        return view("user.show", compact("env", "data"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $env = Env::serve();
        $role = Role::select(["id", "name"])->orderBy("id", "asc")->get();
        $data = User::whereId($id)->get()->last();
        return view("user.show", compact("env", "role", "data"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        Activity::mengubah("user", "name", "users", $id);
        User::whereId($id)->update($request->except(["_token", "_method"]));
        return redirect()->route("user.index")->with("success", "User berhasil dirubah");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Activity::menghapus("user", "name", "users", $id);
        User::whereId($id)->delete();
        return redirect()->route("user.index")->with("success", "User berhasil dihapus");
    }
}
