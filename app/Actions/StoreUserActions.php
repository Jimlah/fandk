<?php

namespace App\Actions;

use App\Models\User;
use Illuminate\Http\Request;

class StoreUserActions
{
    public function execute(Request $request)
    {
        $user = User::create([
            'name' => $request->firstname . ' ' . $request->lastname,
            'email' => $request->email,
            'password' => bcrypt($request->lastname),
        ]);

        return $user;
    }
}
