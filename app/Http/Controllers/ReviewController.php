<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth; 

class ReviewController extends Controller
{
    public function tambah(Request $request, $id)
    {
        $request->validate([
            'content' => 'required|min:1',

        ]);

        $review = new Review();
        
        $iduser = Auth::id();

        $review->user_id = $iduser;
        $review->content = $request->content;
        $review->film_id = $id;
        $review->save();

        return redirect('/film/' . $id);

    }
}
