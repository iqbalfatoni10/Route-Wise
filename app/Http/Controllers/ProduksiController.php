<?php

namespace App\Http\Controllers;

use App\Models\Produksi;
use Illuminate\Http\Request;

class ProduksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $dtProduksi = Produksi::where('jenis_produksi', 'LIKE', '%' . $request->search . '%')->get();
        } else {
            $dtProduksi = Produksi::all();
        }
        // $dtPengguna = Pengguna::all();
        return view('Produksi.data_produksi', compact('dtProduksi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Produksi.create_produksi');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Produksi::create([
            'jenis_produksi' => $request->jenis_produksi,
            'jumlah_produksi' => $request->jumlah_produksi,
            'waktu_produksi' => $request->waktu_produksi
        ]);

        return redirect('data_produksi')->with('success', 'Data Berhasil Tersimpan!');
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
        $dtProduksi = Produksi::findorfail($id);
        return view('edit_produksi', compact('dtProduksi'));
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
        $dtProduksi = Produksi::findorfail($id);
        $dtProduksi->update($request->all());
        return redirect('data_produksi')->with('success', 'Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dtProduksi = Produksi::findorfail($id);
        $dtProduksi->delete();
        return back()->with('info', 'Data Berhasil Dihapus!');
    }
}
