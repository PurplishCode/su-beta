<?php

namespace App\Http\Controllers;

use App\Models\KomentarFoto;
use App\Http\Requests\StoreKomentarFotoRequest;
use App\Http\Requests\UpdateKomentarFotoRequest;
use App\Models\Foto;
use Illuminate\Http\Client\Request;
use Illuminate\Http\Request as HttpRequest;

class KomentarFotoController extends Controller
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
    public function store(HttpRequest $request, $foto_id)
    {
        $currentAuth = auth()->user();
        $validatedFotoID = Foto::findOrFail($foto_id);
        $isiKomentar = $request->isiKomentar;
        $isiArray = [
            'isiKomentar' => $isiKomentar,
            'foto_id' => $validatedFotoID->id,
            'user_id' => $currentAuth->id
        ];

        if(!$isiKomentar) {
            toast('Your comments cannot be null.', 'error');
        }
        $save = KomentarFoto::create($isiArray);
        if($save) {
            toast('You commented on this foto!', 'info');
            return redirect()->back();
        } else {
            toast('Something went wrong. Try again.', 'info');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(KomentarFoto $komentarFoto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $komentarFoto = KomentarFoto::findOrFail($id)->first();
        return view('home.gallery.edit-komentar', compact('komentarFoto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HttpRequest $request, $id)
    {
        $komentarFotoFind = KomentarFoto::findOrFail($id)->first();
        $arrayFill = [
            'isiKomentar' => $request->isiKomentar,
            'user_id' => auth()->user()->id,
            'foto_id' => $komentarFotoFind->foto_id
        ];

        $success = $komentarFotoFind->update($arrayFill);
    
    if($success) {
        return redirect()->route('home.view');
    } else {
        toast('Failed!', 'error');
        return redirect()->back();
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $deleteKomentar = KomentarFoto::findOrFail($id);
        $deleteKomentar->delete();
        toast('Succesfully deleted this comment.', 'success');
        return redirect()->back();
    }
}
