<?php

namespace App\Http\Controllers;

use App\Models\DaftarMagang;
use App\Models\Dudi;
use App\Models\Guru;
use App\Models\Keahlian;
use App\Models\Siswa;
use Illuminate\Http\Request;

class DaftarMagangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $magang = DaftarMagang::with('siswa', 'dudi', 'guru', 'keahlian')->where('status', '!=', 'editing')->paginate(10);
        return view('magang.index-siswa', ['magang' => $magang]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = auth()->user()->id;
        $siswa = Siswa::with('smk')->where('user_id', '=', $user)->first();
        $data = [
            "siswa" => $siswa,
            "dudi" => Dudi::all(),
            "guru" => Guru::with('smk')->where('smk_id', '=', $siswa->smk->npsn)->get(),
            "keahlian" => Keahlian::all(),
            'magang' => DaftarMagang::with('siswa', 'dudi', 'guru', 'keahlian')->where('status', '!=', 'editing')->first()
        ];
        return view('magang.form', $data);
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
            'siswa_id' => 'required',
            'dudi_id' => 'required',
            'guru_id' => 'required',
            'keahlian_id' => 'required',
            'alasan' => 'required',
        ]);
        try {
            $magang = new DaftarMagang($request->all());
            $siswa = Siswa::find($request->siswa_id);
            $dudi = Dudi::find($request->dudi_id);
            $guru = Guru::find($request->guru_id);
            $keahlian = Keahlian::find($request->keahlian_id);
            $magang->alasan = $request->alasan;
            $magang->status = 'pending';
            $magang->rekomendasi = 1;
            $magang->keterangan = '';
            $magang->siswa()->associate($siswa);
            $magang->dudi()->associate($dudi);
            $magang->guru()->associate($guru);
            $magang->keahlian()->associate($keahlian);
            $magang->save();
            return redirect()->route('magang.index')->with('success', 'Data berhasil ditambahkan');
        } catch (\Throwable $th) {
            return redirect()->route('magang.index')->with('error', 'Data gagal ditambahkan');
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
        return view('magang.form', ['magang' => DaftarMagang::find($id)]);
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
        $request->validate([
            'siswa_id' => 'required',
            'dudi_id' => 'required',
            'guru_id' => 'required',
            'keahlian_id' => 'required',
            'alasan' => 'required',
        ]);
        try {
            $magang = new DaftarMagang($request->all());
            $siswa = Siswa::find($request->siswa_id);
            $dudi = Dudi::find($request->dudi_id);
            $guru = Guru::find($request->guru_id);
            $keahlian = Keahlian::find($request->keahlian_id);
            $magang->alasan = $request->alasan;
            $magang->siswa()->associate($siswa);
            $magang->dudi()->associate($dudi);
            $magang->guru()->associate($guru);
            $magang->keahlian()->associate($keahlian);
            $magang->save();
            return redirect()->route('magang.index')->with('success', 'Data berhasil Mengubah Data');
        } catch (\Throwable $th) {
            return redirect()->route('magang.index')->with('error', 'Data Gagal Mengubah Data');
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
        //
    }
}
