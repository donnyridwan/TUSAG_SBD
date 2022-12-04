<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PeminjamController extends Controller
{
    public function create() {
        return view('peminjam.add');
        }
        public function store(Request $request) {
        $request->validate([
        
        'id_peminjam' => 'required',
        'nama_peminjam' => 'required',
        'alamat_peminjam' => 'required',

        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert('INSERT INTO peminjam(id_peminjam, nama_peminjam, alamat_peminjam) VALUES(:id_peminjam, :nama_peminjam, :alamat_peminjam)',
            [
            'id_peminjam' => $request->id_peminjam,
            'nama_peminjam' => $request->nama_peminjam,
            'alamat_peminjam' => $request->alamat_peminjam,
            ]
        );
        return redirect()->route('peminjam.index')->with('success', 'Data Peminjam berhasil disimpan');
        }

        public function index() {
            $datas = DB::select('select * from peminjam where is_deleted = 0');
            return view('peminjam.index')->with('datas', $datas);
            }
        
        public function edit($id) {
            $data = DB::table('peminjam')->where('id_peminjam',$id)->first();
            return view('peminjam.edit')->with('data', $data);
        }
            public function update($id, Request $request) {
                $request->validate([
                'id_peminjam' => 'required',
                'nama_peminjam' => 'required',
                'alamat_peminjam' => 'required',
                ]);
                // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
                DB::update('UPDATE peminjam SET id_peminjam =:id_peminjam, nama_peminjam = :nama_peminjam, alamat_peminjam = :alamat_peminjam WHERE id_peminjam = :id',
                // DB::update('UPDATE peminjam SET id_peminjam = :id_peminjam, nama_peminjam = :nama_peminjam, alamat_peminjam = :alamat_peminjam WHERE id_peminjam = :id',
                [
                    'id' => $id,
                    'id_peminjam' => $request->id_peminjam,
                    'nama_peminjam' => $request->nama_peminjam,
                    'alamat_peminjam' => $request->alamat_peminjam,
                ]
                );
                return redirect()->route('peminjam.index')->with('success', 'Data peminjam berhasil diubah');
                }
                public function delete($id) {
                    // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
                    DB::delete('DELETE FROM peminjam WHERE id_peminjam =:id_peminjam', ['id_peminjam' => $id]);
                    return redirect()->route('peminjam.index')->with('success', 'Data peminjam berhasil dihapus');
                    }

                    public function softDelete($id)
                    {
                        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
                        DB::update('UPDATE peminjam SET is_deleted = 1
                        WHERE id_peminjam = :id_peminjam', ['id_peminjam' => $id]);
                        return redirect()->route('peminjam.index')->with('success', 'Data peminjam berhasil dihapus');
                    }
                
                    public function restore()
                    {
                        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
                        DB::table('peminjam')->update(['is_deleted' => 0]);
                        return redirect()->route('peminjam.index')->with('success', 'Data peminjam berhasil direstore');
                    }
        
}
