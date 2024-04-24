<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Http\Requests\StoreAlbumRequest;
use App\Http\Requests\UpdateAlbumRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $display = DB::table('albums')->where('albums.user_id', auth()->user()->id)->get();
        return view('home.album.index', compact('display'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('home.album.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['namaAlbum' => 'string|required', 'deskripsi' => 'string|required']);

        $authenticatedUser = auth()->user()->id;
        $arrayData = [
            'namaAlbum' => $request->namaAlbum,
            'deskripsi' => $request->deskripsi,
            'tanggalDibuat' => now(),
            'user_id' => $authenticatedUser
        ];
        $album = new Album();
        $uploadAlbum = $album->create($arrayData);

        if($uploadAlbum) {
            toast('Succesfully created an Album!', 'success');
            return to_route('album-foto.index');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $castedAlbums = DB::table('albums')->where('albums.id', $id)->join('fotos', 'fotos.album_id', '=', 'albums.id')->leftJoin('users', 'users.id', '=', 'albums.user_id')->select('fotos.*', 'albums.*', 'users.*')->get();
        return view('home.album.show', compact('castedAlbums'));
    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Album $album)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAlbumRequest $request, Album $album)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Album $album)
    {
        //
    }
}
