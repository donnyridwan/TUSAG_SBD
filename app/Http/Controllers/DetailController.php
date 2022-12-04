<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use App\Models\Peminjam;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function create() {
        return view('Detail.add');
        }
        public function store(Request $request) {
            $request->validate([
                'id_detail' => 'required',
                'id_film' => 'required',
                'id_peminjam' => 'required',
                'id' => 'required',
                ]);
        
                // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
                DB::insert('INSERT INTO detail_peminjaman(id_detail, id_film, id_peminjam, id) VALUES(:id_detail, :id_film, :id_peminjam, :id)',
                    [
                    'id_detail' => $request->id_detail,
                    'id_film' => $request->id_film,
                    'id_peminjam' => $request->id_peminjam,
                    'id' => $request->id,
                    ]
                );
            return redirect()->route('detail.index')->with('success', 'Detail Peminjaman berhasil disimpan');
            }

        public function index() {
            $datas = DB::select('select * from detail_peminjaman');
            return view('detail.index')->with('datas', $datas);
            }
        
            public function edit($id) {
                $data = DB::table('detail_peminjaman')->where('id_detail',$id)->first();
                return view('detail.edit')->with('data', $data);
                }
                public function update($id_detail, Request $request) {
                    $request->validate([
                    'id_detail' => 'required',
                    'id_film' => 'required',
                    'id_peminjam' => 'required',
                    'id' => 'required',
                ]);
                // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
                // DB::update('UPDATE film SET id_film =:id_film, judul_film = :judul_peminjam, alamat_peminjam = :alamat_peminjam WHERE id_peminjam = :id',
                DB::update('UPDATE detail_peminjaman SET id_film = :id_film,  id = :id, id_peminjam = :id_peminjam WHERE id_detail = :id_detail',
                [
                    'id_detail' => $id_detail,
                    'id_film' => $request->id_film,
                    'id' => $request->id,
                    'id_peminjam' => $request->id_peminjam,
                ]
                );
                return redirect()->route('detail.index')->with('success', 'Data peminjam berhasil diubah');
                }
                // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        
        public function delete($id) {
            // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM detail_peminjaman WHERE id_detail = :id', ['id' => $id]);
        return redirect()->route('detail.index')->with('success', 'Detail berhasil dihapus');
        }
        
}
