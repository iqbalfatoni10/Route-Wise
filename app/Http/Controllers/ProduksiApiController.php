<?php

namespace App\Http\Controllers;

use App\Models\Produksi;
use Illuminate\Http\Request;

class ProduksiApiController extends Controller
{
    public function index()
    {
        $produksi = Produksi::all();
        return response()->json(['message' => 'Success', 'data' => $produksi]);
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
        $produksi = Produksi::create($request->all());
        return response()->json(['message' => 'Success', 'data' => $produksi]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produksi = Produksi::find($id);
        return response()->json(['massage' => 'Success', 'data' => $produksi]);
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
        $produksi = Produksi::find($id);
        $produksi->update($request->all());
        return response()->json(['message', 'Success', 'data' => $produksi]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produksi  = Produksi::findorfail($id);
        $produksi->delete();
        return response()->json(['massage' => 'Success update', 'data' => $produksi]);
    }
}
