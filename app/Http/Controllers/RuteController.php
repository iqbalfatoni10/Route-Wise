<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Rute;
use Illuminate\Http\Request;

class RuteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $dtRute = Rute::with('alternatif')
                ->whereHas('alternatif', function ($query) use ($request) {
                    $query->where('nama_alternatif', 'LIKE', '%' . $request->search . '%');
                })
                ->get();
        } else {
            $dtRute = Rute::with('alternatif')->get();
        }

        return view('Rute.data_rute', compact('dtRute'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dtAlternatif = Alternatif::all();
        return view('Rute.create_rute', compact('dtAlternatif'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Rute::create([
            'alternatif_id' => $request->alternatif_id,
            'waktu_tempuh' => $request->waktu_tempuh,
            'jumlah_permintaan' => $request->jumlah_permintaan,
            'biaya' => $request->biaya,
            'jarak_tempuh' => $request->jarak_tempuh,
        ]);

        return redirect('data_rute')->with('success', 'Data Berhasil Tersimpan!');
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
        $dtRute = Rute::with('alternatif')->find($id);
        return view('edit_rute', compact('dtRute'));
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
        $dtRute = Rute::findorfail($id);
        $dtRute->update($request->all());
        return redirect('data_rute')->with('success', 'Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dtRute = Rute::findorfail($id);
        $dtRute->delete();
        return back()->with('info', 'Data Berhasil Dihapus!');
    }

    public function wpm()
    {
        // Ambil data rute dan alternatif
        $rutes = Rute::with('alternatif')->get();

        // Lakukan perhitungan WPM di sini

        // Contoh perhitungan WPM (disesuaikan dengan logika bisnis Anda)
        $result = [];
        foreach ($rutes as $rute) {
            $score = ($rute->waktu_tempuh * 0.25) + ($rute->jumlah_permintaan * 0.25) + ($rute->biaya * 0.25) + ($rute->jarak_tempuh * 0.25);
            $result[] = [
                'alternatif' => $rute->alternatif->nama_alternatif,
                'score' => $score,
            ];
        }

        // Urutkan hasil dari tertinggi ke terendah
        usort($result, function ($a, $b) {
            return $b['score'] - $a['score'];
        });

        return view('SPK_WPM.wpm', ['result' => $result]);
    }
}
