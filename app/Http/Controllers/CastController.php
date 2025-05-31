<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CastController extends Controller
{
    public function create()
    {
        return view('cast.tambah');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5',
            'age' => 'required|integer|min:1|max:120',
            'bio' => 'required|min:10',
        ]);
        DB::table('casts')->insert([
            'name' => $request->name,
            'age' => $request->age,
            'bio' => $request->bio,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        return redirect('/cast');
    }
    
    public function index()
    {
        $casts = DB::table('casts')->get();
        return view('cast.index', ['casts' => $casts]);
    }

    public function show($id)
    {
        $casts = DB::table('casts')->find($id);
        return view('cast.detail', ['casts' => $casts]);
    }

    public function edit($id)
    {
        $casts = DB::table('casts')->find($id);
        return view('cast.edit', ['casts' => $casts]);
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:5',
            'age' => 'required|integer|min:1|max:120',
            'bio' => 'required|min:10',
        ]);
        DB::table('casts')
                ->where('id', $id)
                ->update(
                    [
                        'name' => $request->input('name'),
                        'age' => $request->input('age'),
                        'bio' => $request->input('bio'),
                        'updated_at' => Carbon::now(),
                    ]);
                
        return redirect('/cast');
    }
    public function destroy($id)
    
    {
        DB::table('casts')->where('id', $id)->delete();
        return redirect('/cast');
    }
}
