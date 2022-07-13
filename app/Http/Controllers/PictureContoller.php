<?php

namespace App\Http\Controllers;

class PictureContoller extends Controller
{
    public function renderPicture($id)
    {
        return view('picture', ['id' => $id]);
    }
}