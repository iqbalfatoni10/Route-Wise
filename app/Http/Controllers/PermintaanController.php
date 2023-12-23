<?php

namespace App\Http\Controllers;

use App\Models\Permintaan;
use App\Models\Alternatif;
use App\Models\Produksi;
use Illuminate\Http\Request;

class PermintaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $dtPermintaan = Permintaan::with('alternatif', 'produksi')
                ->whereHas('alternatif', function ($query) use ($request) {
                    $query->where('nama_alternatif', 'LIKE', '%' . $request->search . '%');
                })
                ->get();
        } else {
            $dtPermintaan = Permintaan::with('alternatif', 'produksi')->get();
        }

        return view('Permintaan.data_permintaan', compact('dtPermintaan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dtAlternatif = Alternatif::all();
        $dtProduksi = Produksi::all();
        return view('Permintaan.create_permintaan', compact('dtAlternatif', 'dtProduksi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Permintaan::create([
            'alternatif_id' => $request->alternatif_id,
            'produksi_id' => $request->produksi_id,
            'jumlah_permintaan' => $request->jumlah_permintaan,
            'jumlah_dikirim' => $request->jumlah_dikirim,
            'biaya' => $request->biaya,
        ]);

        return redirect('data_permintaan')->with('success', 'Data Berhasil Tersimpan!');
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
        $dtPermintaan = Permintaan::with('alternatif', 'produksi')->find($id);
        return view('edit_permintaan', compact('dtPermintaan'));
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
        $dtPermintaan = Permintaan::findorfail($id);
        $dtPermintaan->update($request->all());
        return redirect('data_permintaan')->with('success', 'Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dtPermintaan = Permintaan::findorfail($id);
        $dtPermintaan->delete();
        return back()->with('info', 'Data Berhasil Dihapus!');
    }
}
