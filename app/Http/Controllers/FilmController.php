<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    public function create() {
        return view('film.add');}
        public function store(Request $request) {
        $request->validate([
        
        'id_film' => 'required',
        'judul_film' => 'required',
        'tahun_terbit' => 'required',
        'genre' => 'required',
        'produser' => 'required',

        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert('INSERT INTO film(id_film, judul_film, tahun_terbit, genre, produser) VALUES(:id_film, :judul_film, :tahun_terbit, :genre, :produser)',
            [
            'id_film' => $request->id_film,
            'judul_film' => $request->judul_film,
            'tahun_terbit' => $request->tahun_terbit,
            'genre' => $request->genre,
            'produser' => $request->produser,
            ]
        );
    
        return redirect()->route('film.index')->with('success', 'Data Peminjam berhasil disimpan');
        }

        public function index() {
            $datas = DB::select('select * from film');
            return view('film.index')->with('datas', $datas);
            }
        
            public function edit($id) {
                $data = DB::table('film')->where('id_film',$id)->first();
                return view('film.edit')->with('data', $data);
                }
                public function update($id, Request $request) {
                    $request->validate([
                    'id_film' => 'required',
                    'judul_film' => 'required',
                    'tahun_terbit' => 'required',
                    'genre' => 'required',
                    'produser' => 'required',
                ]);
                // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
                // DB::update('UPDATE film SET id_film =:id_film, judul_film = :judul_peminjam, alamat_peminjam = :alamat_peminjam WHERE id_peminjam = :id',
                DB::update('UPDATE film SET id_film = :id_film, judul_film = :judul_film, tahun_terbit = :tahun_terbit, genre = :genre, produser = :produser WHERE id_film = :id',
                [
                    'id' => $id,
                    'id_film' => $request->id_film,
                    'judul_film' => $request->judul_film,
                    'tahun_terbit' => $request->tahun_terbit,
                    'genre' => $request->genre,
                    'produser' => $request->produser,
                ]
                );
                return redirect()->route('film.index')->with('success', 'Data peminjam berhasil diubah');
                }

                public function delete($id) {
                    // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
                    DB::delete('DELETE FROM film WHERE id_film =:id_film', ['id_film' => $id]);
                    return redirect()->route('film.index')->with('success', 'Data peminjam berhasil dihapus');
                    }
        
}
