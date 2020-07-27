<?php

namespace App\Http\Controllers;

use App\laporanterverifikasi;
use Illuminate\Http\Request;
use PDF;
use App\Issue;

class LaporanterverifikasiController extends Controller
{
    public function laporanDitolak(){
        $this->middleware('CheckAdmin');
        $this->parseData['data'] = Issue::where("status","ditolak")->where("publish","false")->get();
        $this->parseData['page'] = 'cmslaporanDitolak';
          return view('content/cms/laporan/laporanDitolak', $this->parseData);
    }
    public function laporanVerifikasi(){
          $this->middleware('CheckAdmin');
          $this->parseData['data'] = Issue::where("status","diverifikasi")->where("publish","false")->get();
        $this->parseData['page'] = 'laporanVerifikasi';
        return view('content/cms/laporan/laporanVerifikasi', $this->parseData);
         
    } 
    public function laporanSelesai(){
           $this->middleware('CheckAdmin');
           $this->parseData['data'] = Issue::where("status","selesai")->where("publish","true")->get();
        $this->parseData['page'] = 'laporanSelesai';
        return view('content/cms/laporan/laporanSelesai', $this->parseData);
    } 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\laporanterverifikasi  $laporanterverifikasi
     * @return \Illuminate\Http\Response
     */
    public function show(laporanterverifikasi $laporanterverifikasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\laporanterverifikasi  $laporanterverifikasi
     * @return \Illuminate\Http\Response
     */
    public function edit(laporanterverifikasi $laporanterverifikasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\laporanterverifikasi  $laporanterverifikasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, laporanterverifikasi $laporanterverifikasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\laporanterverifikasi  $laporanterverifikasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(laporanterverifikasi $laporanterverifikasi)
    {
        //
    }
}
