<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserAuthController extends Controller
{
    function login(Request $req)
    {
        $user = User::where('email', $req->email)->first();
        if (!$user || !Hash::check($req->password, $user->password)) {
            return ['result' => 'user not found', 'success' => false];
        }
        $success["token"] = $user->createToken("myapp")->plainTextToken;
        $user["name"] = $user->name;
        return ['success' => true, 'result' => $success, 'msg' => 'User login successfully.'];
    }

    function signUp(Request $req)
    {
        $input = $req->all();
        $input["password"] = bcrypt($input["password"]);
        $user = User::create($input);
        $success["token"] = $user->createToken("myapp")->plainTextToken;
        $user["name"] = $user->name;
        return ['success' => true, 'result' => $success, 'msg' => 'User register successfully.'];
    }
}
