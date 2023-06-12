<?php

namespace App\Http\Controllers\Nilai;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class NilaiKategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = Category::paginate(10);
        $data = [
            'kategori' => $kategori,
        ];
        return view('nilai.kategori.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('nilai.kategori.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $kategori = new Category();
            $kategori->name = $request->name;
            $kategori->save();
            return redirect()->route('nilai.kategori.index')->with('success', 'Kategori berhasil ditambahkan');
        } catch (\Throwable $th) {
            return redirect()->route('nilai.kategori.index')->with('error', 'Kategori gagal ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('nilai.kategori.form', ['kategori' => Category::find($id)]);
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
        try {
            $kategori = Category::find($id);
            $kategori->name = $request->name;
            $kategori->save();
            return redirect()->route('nilai.kategori.index')->with('success', 'Kategori berhasil diubah');
        } catch (\Throwable $th) {
            return redirect()->route('nilai.kategori.index')->with('error', 'Kategori gagal diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Category::find($id)->delete();
            return redirect()->route('nilai.kategori.index')->with('success', 'Kategori berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->route('nilai.kategori.index')->with('error', 'Kategori gagal dihapus');
        }
    }
}
