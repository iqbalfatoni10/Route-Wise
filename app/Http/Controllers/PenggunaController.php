<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $dtUser = User::where('nama_lengkap', 'LIKE', '%' . $request->search . '%')->get();
        } else {
            $dtUser = User::all();
        }

        return view('Pengguna.data_pengguna', compact('dtUser'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Pengguna.create_pengguna');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        User::create([
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'no_telp' => $request->no_telp,
            'jabatan' => $request->jabatan,
        ]);

        return redirect('data_pengguna')->with('success', 'Data Berhasil Tersimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dtUser = User::findorfail($id);
        return view('edit_pengguna', compact('dtUser'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dtUser = User::findorfail($id);
        $dtUser->update($request->all());
        return redirect('data_pengguna')->with('success', 'Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dtUser = User::findorfail($id);
        $dtUser->delete();
        return back()->with('info', 'Data Berhasil Dihapus!');
    }
}
