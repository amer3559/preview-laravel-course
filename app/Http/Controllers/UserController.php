<?php

namespace App\Http\Controllers;

use App\Enums\GenderEnum;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::get();
        return view('pages.users.index', compact('users'));
    }

    public function create()
    {
        return view('pages.users.create');
    }

    public function store(Request $request)
    {

        $user = new User([
            'name' => $request->name,
            'age_day' => $request->age_day,
            'age_month' => $request->age_month,
            'age_year' => $request->age_year,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'gender' => $request->gender,
            'role' => $request->role,
        ]);

       $r=  $user->save();

       if ($r) return back()->with('success', "Data:$user->name added Successfully");

        return  redirect()->back()->with('msg', 'fail');
    }

    public function show($id)
    {
        $response = User::where('id', $id)
            ->first();

        return response()->json(['response' => $response]);
    }
    public function edit($id)
    {
        $user = User::where('id', $id)
            ->first();

        return view('pages.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {


        $r= User::where('id', $id)
            ->update([
                'name' => $request->name,
                'age_day' => $request->age_day,
                'age_month' => $request->age_month,
                'age_year' => $request->age_year,
                'address' => $request->address,
                'phone_number' => $request->phone_number,
                'email' => $request->email,
                'gender' => $request->gender,
                'role' => $request->role,
            ]);
        if ($r) return redirect()->route('users.index')->with('success', "Data:$request->name updated Successfully");
    }

    public function destroy( $id)
    {
        $user = User::findOrfail($id);
        $user->delete();
        return redirect()->route('users.index')
            ->withSuccess(__('User delete successfully.'));
    }

}
