<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $auth = auth()->user();
        
        return view('home.profile.index', compact('auth'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $auth = User::findOrFail($id)->first();
     return view('home.profile.edit', ['profile' => $auth]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */public function update(Request $request, $profile)
{
    if($request->hasFile('gambar_profile')) {
        $file = $request->file('gambar_profile');
        $extensionFile = $file->extension();
        $namaFile = date('ymdhis') . '.' . $extensionFile;
        $file->move(public_path('assets'), $namaFile);

        $arrayFilledData = [
           'gambar_profile' => $namaFile,
           'nama' => $request->nama,
           'email' => $request->email,
           'alamat' => $request->alamat,
           'nomor_telepon' => $request->nomor_telepon
        ];

        $findUser = User::findOrFail($profile);
        $findUser->update($arrayFilledData);
        toast('Successfully updated your profile!', 'success');
        return redirect()->back();
    } else {
        toast('Please select an image file.', 'error');
        return redirect()->back();
    }
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
