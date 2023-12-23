<?php

namespace App\Http\Controllers;

use App\Models\Permintaan;
use Illuminate\Http\Request;

class PermintaanApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permintaan = Permintaan::with('produksi', 'alternatif')->get();
        return response()->json(['message' => 'Success', 'data' => $permintaan]);
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
        $permintaan = Permintaan::create($request->all());
        return response()->json(['message' => 'Success', 'data' => $permintaan]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $permintaan = Permintaan::find($id);
        return response()->json(['massage' => 'Success', 'data' => $permintaan]);
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
        $permintaan = Permintaan::find($id);
        $permintaan->update($request->all());
        return response()->json(['message', 'Success', 'data' => $permintaan]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permintaan  = Permintaan::findorfail($id);
        $permintaan->delete();
        return response()->json(['massage' => 'Success update', 'data' => $permintaan]);
    }
}
