<?php

namespace App\Http\Controllers;

use App\Models\Stok;
use App\Models\Permintaan;
use App\Models\Produksi;
use Illuminate\Http\Request;

class StokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $dtStok = Stok::with('permintaan', 'produksi')
                ->whereHas('produksi', function ($query) use ($request) {
                    $query->where('jenis_produksi', 'LIKE', '%' . $request->search . '%');
                })
                ->get();
        } else {
            $dtStok = Stok::with('permintaan', 'produksi')->get();
        }

        return view('Stok.data_stok', compact('dtStok'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dtPermintaan = Permintaan::all();
        $dtProduksi = Produksi::all();
        return view('Stok.create_stok', compact('dtPermintaan', 'dtProduksi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Stok::create([
            'produksi_id' => $request->produksi_id,
            'jumlah_produksi' => $request->jumlah_produksi,
            'permintaan_id' => $request->permintaan_id,
            'stok' => $request->stok,
        ]);

        return redirect('data_stok')->with('success', 'Data Berhasil Tersimpan!');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dtStok = Stok::with('permintaan', 'produksi')->find($id);
        return view('edit_stok', compact('dtStok'));
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
        $dtStok = Stok::findorfail($id);
        $dtStok->update($request->all());
        return redirect('data_stok')->with('success', 'Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dtStok = Stok::findorfail($id);
        $dtStok->delete();
        return back()->with('info', 'Data Berhasil Dihapus!');
    }
}
