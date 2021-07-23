<?php

use Illuminate\Database\Seeder;

class BeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('beritas')->insert([
            [
                'nama_presenter' => 'herlina 2',
                'judul_berita' => 'kebakaran masal 2',
                'isi_berita' => 'telah terjadi kebakaran masal di mataram 2',
                'narasumber' => 'warga setempat 2'
            ],
            [
            'nama_presenter' => 'herlina 3',
            'judul_berita' => 'kebakaran masal 3',
            'isi_berita' => 'telah terjadi kebakaran masal di mataram 3',
            'narasumber' => 'warga setempat 3'
            ]
            ]);
    }
}
