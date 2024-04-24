<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Http\Requests\StoreFotoRequest;
use App\Http\Requests\UpdateFotoRequest;
use App\Models\Album;
use App\Models\KomentarFoto;
use App\Models\User;
use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request as HttpRequest;

;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request as FacadesRequest;

class FotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authenticatedUser = auth()->user()->id;
        $listFoto = DB::table('fotos')->where('fotos.user_id',$authenticatedUser)->get();
        
        toast('Succesfully fetched data foto.', 'info');
        return view('home.gallery.index', compact('listFoto'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    $currentUser = auth()->user()->id;
    $albumData = DB::table('albums')->where('albums.user_id', $currentUser)->get();
        return view('home.gallery.create', compact('albumData'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HttpRequest $request)
    {
        $request->validate(['judulFoto' => 'string|required', 'deskripsiFoto' => 'string|required', 'lokasiFile' => 'image|max:1000']);

        if($request->file('lokasiFile')) {
            $file = $request->file('lokasiFile');
            $extensionFile = $file->extension();
            $namaFile = date('ymdhis') . '.' . $extensionFile;
            $file->move(public_path('assets'), $namaFile);

            list($width, $height) = getimagesize(public_path('assets') . '/' . $namaFile);

            $maxHeight = 800;
            $maxWidth = 254;
            if($height > $maxHeight || $width < $maxWidth) {
                toast('Image height exceeds. Proceed with smaller picture.', 'info');
                return redirect()->back();
            }
            $currentUser = auth()->user();
            $album = $currentUser->albums;
            $albumIDs = $album->find('id', $request->albumID);

            $arrayFilledData = [
                'judulFoto' => $request->judulFoto,
                'deskripsiFoto' => $request->deskripsiFoto,
                'lokasiFile' => $namaFile,
                'tanggalDiunggah' => now(),
                'user_id' => $currentUser->id,
                'album_id' => $albumIDs
            ];

            $succesful = Foto::create($arrayFilledData);

            if($succesful) {
                toast('Succesfully uploaded the foto!', 'success');
                return redirect('gallery-foto');
            } else {
                toast('Failed to upload Foto, try again.', 'error');
                return redirect()->back();
            }
        } else {
            toast('File Tidak Disertakan.', 'error');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $selectedFoto = DB::table('fotos')->where('fotos.id', $id)->first();
        $amountOfLikes = DB::table('like_fotos')->where('like_fotos.foto_id', $id)->count();
        $isiKomentar = KomentarFoto::with(['fotos', 'users'])->where('foto_id', $id)->get();
        return view('home.gallery.show', compact('selectedFoto', 'amountOfLikes', 'isiKomentar'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $foto = DB::table('fotos')->where('fotos.id', $id)->first();
     return view('home.gallery.edit', compact('foto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HttpRequest $request, $id)
    {
        $request->validate(['judulFoto' => 'string|required', 'deskripsiFoto' => 'string|required']);

        $deskripsifoto = $request->deskripsiFoto;
        if($request->file('lokasiFile')) {
            $file = $request->file('lokasiFile');
            $extensionFile = $file->extension();
            $namaFile = date('ymdhis') . '.' . $extensionFile;
            $file->move(public_path('assets'), $namaFile);
if($deskripsifoto <= 254) {
    toast('Deskripsi Foto terlalu panjang (Maks 254)!', 'info');
    return redirect()->back();
}

            $arrayFilledData = [
                'judulFoto' => $request->judulFoto,
                'deskripsiFoto' => $deskripsifoto,
                'lokasiFile' => $namaFile,
                'tanggalDiunggah' => now(),
            ];
            $foto_find = Foto::findOrFail($id);
$succesful_save = $foto_find->update($arrayFilledData);

            if($succesful_save) {
                toast('Succesfully editted the foto!', 'success');
                return redirect('gallery-foto');
            } else {
                toast('Failed to upload Foto, try again.', 'error');
                return redirect()->back();
            }
        } else {
            toast('File Tidak Disertakan.', 'error');
            return redirect()->back();
        }

        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $deleteFoto = Foto::findOrFail($id);

        $deleteFoto->delete();

    }
}
