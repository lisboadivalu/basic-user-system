<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @return \Illuminate\View\View
     */
    public function allUsers()
    {
        return view('users.all-users', ['users' => User::paginate(15)]);
    }

    /**
     * @param int $id
     * @return void
     */
    public function delete(int $id)
    {
        $user = User::find($id);
        $user->delete();
        return back()->withStatus(__('User successfully created.'));
    }

    public function show()
    {
        return view('users.show');
    }

}
