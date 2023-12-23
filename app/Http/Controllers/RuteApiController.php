<?php

namespace App\Http\Controllers;

use App\Models\Rute;
use Illuminate\Http\Request;

class RuteApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rute = Rute::with('alternatif')->get();
        return response()->json(['message' => 'Success', 'data' => $rute]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rute = Rute::create($request->all());
        return response()->json(['message' => 'Success', 'data' => $rute]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rute = Rute::find($id);
        return response()->json(['massage' => 'Success', 'data' => $rute]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $rute = Rute::find($id);
        $rute->update($request->all());
        return response()->json(['message', 'Success', 'data' => $rute]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rute  = Rute::findorfail($id);
        $rute->delete();
        return response()->json(['massage' => 'Success update', 'data' => $rute]);
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

        // Ubah data menjadi format JSON
        $jsonData = json_encode(['result' => $result]);

        // Kembalikan response JSON
        return response()->json($jsonData);
    }
}
