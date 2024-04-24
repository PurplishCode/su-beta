<?php

namespace App\Http\Controllers;

use App\Models\LikeFoto;
use App\Http\Requests\StoreLikeFotoRequest;
use App\Http\Requests\UpdateLikeFotoRequest;
use App\Models\Foto;
use Illuminate\Support\Facades\Request;

class LikeFotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,$foto_id)
    {
        
        $authenticated_user = auth()->user();
        $foto = Foto::findOrFail($foto_id);

        $existingLike = LikeFoto::where('user_id', $authenticated_user->id)->where('foto_id', $foto)->exists();

        $nextLikesReached = LikeFoto::where('foto_id', $foto_id)->count() >= 1;

        if($existingLike || $nextLikesReached) {
            toast('You cannot like this foto more than once.', 'info');
            return redirect()->back();
        }
        $fillData = [
            'user_id' => $authenticated_user->id,
            'foto_id' => $foto->id
        ];

        $save = LikeFoto::create($fillData);
        if($save) {
            toast('Succesfully liked this foto!', 'success');
            return redirect()->route('gallery-foto.show', $foto_id);
        } else {
            toast('Something went wrong.', 'info');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(LikeFoto $likeFoto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LikeFoto $likeFoto)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update()
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LikeFoto $likeFoto)
    {
        //
    }


}
