<?php

namespace App\Http\Controllers;

use App\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class BeritaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login','me']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$data = Berita::all();

        $berita = Berita::with('kategori')->get();
        return response()->json($berita);
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
        $validate = Validator::make($request->all(), [
            'nama_presenter' => 'required',
            'judul_berita' => 'required',
            'isi_berita' => 'required',
            'narasumber' => 'required',
            'id_kategori' => 'required'
        ]);
        if ($validate->passes()){
             $berita = Berita::create($request->all());
             return response()->json([
                 'message' => 'data berhasil disimpan']);
        }
        return response()->json([
            'message' => 'Data gagal disimpan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function show( $berita)
    {
      $data = Berita::where('id', $berita)->first();
      if (!empty($data)){
          return $data;
      }    
      return response()->json(['message'=> "data tidak ditemukan"],404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function edit(Berita $berita)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$berita)
    {
        $data = Berita::where('id', $berita)->first();
        if (!empty($data)){
            $validate = Validator::make($request->all(), [
                'nama_presenter' => 'required',
                'judul_berita' => 'required',
                'isi_berita' => 'required',
                'narasumber' => 'required'
            ]);
            if ($validate->passes()) {
               $data->update($request->all());
                 return response()->json([
                     'message' => 'data berhasil diubah',
                     'data'=> $data
                     ]);
            }else{
        return response()->json([
            'message' => 'data gagal diubah',
            'data' => $validate->errors()->all()
            ]);
        }
    }
    return response()->json(['message'=> 'data tidak ditemukan'], 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function destroy( $berita)
    {
        $data = Berita::where('id', $berita)->first();
        if(empty($data)){
            return response()->json([
                'message' => 'Data tidak ditemukan'

            ]);
        }
            $data->delete();
            return response()->json([
                'message' => 'data berhasil dihapus'
            ]);
       
    }
}
