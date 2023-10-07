<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use App\Http\Requests\UserStoreRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::all();
        return view("user.index", compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $role = Role::select(["id", "name"])->orderBy("id", "asc")->get();
        return view("user.create", compact("role"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserStoreRequest $request)
    {
        $request->request->add(["password" => bcrypt($request->password)]);
        User::create($request->all());
        ActivityLog::write("Create User", NULL);
        return redirect()->route("user.index")->with("success", "Data has been created !");
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = User::whereId($id)->get()->last();
        $role = Role::select(["id", "name"])->orderBy("id", "asc")->get();
        return view("user.edit", compact("data", "role"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        User::whereId($id)->update($request->except(["_token", "_method"]));
        ActivityLog::write("Update User", NULL);
        return redirect()->route("user.index")->with("success", "Data has been updated !");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        ActivityLog::write("Delete User", NULL);
        User::whereId($id)->delete();
        return redirect()->route("user.index")->with("success", "Data has been deleted !");
    }
}
