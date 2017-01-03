<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Models\UserReport;
use App\Http\Requests;
use App\Models\Role;
use App\Models\Test;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return view("user.index")->with('user', $user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::lists('role','id');
        return view("user.add")->with('role',$roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $rules = [
            'name' => 'required',
            'user_name' => 'required',
            'email'     => 'required|email|unique:users',
            'password'     => 'required',
            'age'       => 'required',
            'sex'       => 'required',
            'address'   => 'required'
        ];

        $this->validate($request, $rules);
        $userObject = new User();
        $userObject->name = $input['name'];
        $userObject->user_name = $input['user_name'];
        $userObject->email = $input['email'];
        $userObject->password = bcrypt($input['password']);
        $userObject->age = $input['age'];
        $userObject->status = $input['sex'];
        $userObject->address = $input['address'];
        $userObject->save();
        return redirect('/user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $user = User::findOrFail($id);
        }catch (ModelNotFoundException $e) {
            return response('Not Found', 404);
        }
        $userReports = UserReport::where('user_id',$id)->get();
        $test = Test::lists("test","id");
        return view("user.show")
            ->with("user",$user)
            ->with("user_reports", $userReports)
            ->with("test", $test);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $user = User::find($id);
        } catch (ModelNotFoundException $e) {
            return response(view('error.404'),404);
        }
        return view('user.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $user = User::find($id);
        } catch (ModelNotFoundException $e) {
            return response(view('error.404'),404);
        }

        $user->name = $request->get('name');
        $user->user_name = $request->get('user_name');
        $user->email = $request->get('email');
        $user->pass_code = $request->get('email');
        $user->age = $request->get('age');
        $user->sex = $request->get('sex');
        $user->address = $request->get('address');
        $user->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $user = User::find($id);
        } catch (ModelNotFoundException $e) {
            return response(view('error.404'),404);
        }
        $user->trash = 1;
        $user->save();
        return redirect()->back();
    }
}