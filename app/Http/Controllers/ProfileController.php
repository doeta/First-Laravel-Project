<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Tambahkan ini untuk Auth
use App\Models\Profile;

class ProfileController extends Controller
{
    public function index()
    {
        $iduser = Auth::id();
        $detailProfile = Profile::where('user_id', $iduser)->first();

        return view('profile.index', ['detailProfile' => $detailProfile]);
    }

    public function update(Request $request, $id){
        $request->validate([
            'age' => 'required|min:1',
            'bio' => 'required|min:1',
        ]);
          
            $profile = Profile::find($id);
            $profile->age = $request->age;
            $profile->bio = $request->bio;
            $profile->save();
            return redirect('/profile');
    
            }

}
