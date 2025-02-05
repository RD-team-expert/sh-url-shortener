<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
   public function create(Request $request)
   {

  $posting=  Post::create(
        [
         'name' => $request['name'],
          'about_me' => $request['about_me']
        ]
    )

    }
}
