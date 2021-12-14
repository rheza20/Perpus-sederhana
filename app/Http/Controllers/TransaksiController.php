<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("pages.transaksi.list",[
            "Transaksi" => transaksi::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pages.transaksi.form",[
            "book" => \App\Models\Book::all()
            
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "tag_id" => "required",
            "nama" => "required",
            "hp" => "required",
            "kode_buku" => "required",
            "jdl_buku" => "required",
            "pinjam" => "required",
            "kembali" => "required",
            "status" => "required"
        ]);

        Transaksi::create($request->except("_token"));

        return redirect()
                ->route("transaksi.index")
                ->with("info","Berhasil Buat Transaksi");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        return view("pages.transaksi.form",[
            "book" => \App\Models\Book::all(),
            "transaksi" => $transaksi
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        $transaksi->update($request->except("_token"));

        return redirect()
                ->route("transaksi.index")
                ->with("info","Berhasil Update");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();

        return redirect()
            ->route("transaksi.index")
            ->with("info","Berhasil Hapus");
        
    }
}
