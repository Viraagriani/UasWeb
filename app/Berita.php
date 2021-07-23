<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $table ='beritas';
    protected $fillable = ['nama_presenter','judul_berita','isi_berita','narasumber','id_kategori'];

    public function kategori()
    {
        return $this->belongsTo(kategori::class, 'id_kategori');
    }
}
