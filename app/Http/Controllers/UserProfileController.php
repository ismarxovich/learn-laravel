<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserProfileController extends Controller
{
    public function testHandler(User $user)
    {
        return $user->name . 'dataHandler!';
    }
}
