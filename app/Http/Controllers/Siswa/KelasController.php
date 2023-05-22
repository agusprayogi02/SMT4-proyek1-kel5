<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Http\Requests\Siswa\StoreKelasRequest;
use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:kelas.index')->only('index');
        $this->middleware('permission:kelas.create')->only('create', 'store');
        $this->middleware('permission:kelas.edit')->only('edit', 'update');
        $this->middleware('permission:kelas.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'kelas' => Kelas::with('siswas')->paginate(10),
        ];
        return view('kelas.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kelas.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKelasRequest $request)
    {
        try {
            Kelas::create($request->validated());
            return redirect()->route('kelas.index')->with('success', 'Kelas berhasil ditambahkan');
        } catch (\Throwable $th) {
            return redirect()->route('kelas.index')->with('error', 'Kelas gagal ditambahkan');
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
        try {
            $data = [
                'kelas' => Kelas::findOrFail($id),
            ];
            return view('kelas.form', $data);
        } catch (\Throwable $th) {
            return redirect()->route('kelas.index')->with('error', 'Kelas gagal diedit');
        }
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
            Kelas::findOrFail($id)->update($request->all());
            return redirect()->route('kelas.index')->with('success', 'Kelas berhasil diedit');
        } catch (\Throwable $th) {
            return redirect()->route('kelas.index')->with('error', 'Kelas gagal diedit');
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
            Kelas::findOrFail($id)->delete();
            return redirect()->route('kelas.index')->with('success', 'Kelas berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->route('kelas.index')->with('error', 'Kelas gagal dihapus');
        }
    }
}
