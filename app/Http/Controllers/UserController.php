<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function all()
    {
        //Query
        $users = User::all();

        return view('users')
            ->with('users', $users);
    }

    public function store(Request $request)
    {

        $data = $request->validate([
            'name' => 'required',
            'age' => 'required',
        ]);

        // create user.
        User::create($data);
        session()->flash('user.created', 'Thanks! User was added to our record successfully!');

        // return back to users route.
        return back();
    }


    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('edit')
            ->with('user',$user);
    }

    public function update($id, Request $request)
    {

        $newData = $request->validate([
            'name' => 'required',
            'age' => 'required',
        ]);

        $user = User::find($id)
                ->update($newData);

        session()->flash('user.updated', 'Thanks! User data was updated to our record successfully!');

        return redirect()->route('user.all');
    }

    public function delete($id)
    {
        User::find($id)
            ->delete();

        session()->flash('user.deleted', 'Thanks! User data was deleted successfully!');

        return redirect()->route('user.all');
    }
}
