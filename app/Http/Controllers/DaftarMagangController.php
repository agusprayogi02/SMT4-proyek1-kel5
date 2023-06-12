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
        $user = auth()->user();
        if (strtolower($user->roles[0]->name) === "siswa") {
            $siswa = Siswa::where('user_id', auth()->user()->id)->first();
            $magang = DaftarMagang::with('siswa', 'dudi', 'guru', 'keahlian')->where('status', '!=', 'editing')->where('siswa_id', '=', $siswa->nisn)->paginate(10);
            return view('magang.index-siswa', ['magang' => $magang]);
        } else if (strtolower($user->roles[0]->name) === "dudi") {
            $dudi = Dudi::where('user_id', $user->id)->first();
            $magang = DaftarMagang::with('siswa', 'dudi', 'guru', 'keahlian')->where('dudi_id', '=', $dudi->nib)->paginate(10);
            return view('magang.index-dudi', ['magang' => $magang]);
        } else {
            $magang = DaftarMagang::with('siswa', 'dudi', 'guru', 'keahlian')->paginate(10);
        }
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
        $siswa = Siswa::where('user_id', '=', $user)->first();
        $data = [
            "siswa" => $siswa,
            "dudi" => Dudi::all(),
            "guru" => Guru::with('smk')->where('smk_id', '=', $siswa->smk_id)->get(),
            "keahlian" => Keahlian::all(),
            'magang' => DaftarMagang::with('siswa', 'dudi', 'guru', 'keahlian')->where('status', '!=', 'editing')->where('siswa_id', '=', $siswa->nisn)->first()
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
            // $magang = new DaftarMagang($request->all());
            // $siswa = Siswa::find($request->siswa_id);
            $magang = DaftarMagang::find($id);
            $magang->update($request->all());
            $dudi = Dudi::find($request->dudi_id);
            $guru = Guru::find($request->guru_id);
            $keahlian = Keahlian::find($request->keahlian_id);
            // $magang->alasan = $request->alasan;
            // $magang->id = $id;
            // $magang->status = $mg->status;
            // $magang->rekomendasi = $mg->rekomendasi;
            // $magang->keterangan = $mg->keterangan;
            // $magang->siswa()->associate($siswa);
            $magang->dudi()->associate($dudi);
            $magang->guru()->associate($guru);
            $magang->keahlian()->associate($keahlian);
            // dd($request->all(), $siswa, $dudi, $guru, $keahlian);
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

    public function accept($id)
    {
        try {
            $magang = DaftarMagang::find($id);
            $magang->status = 'diterima';
            $magang->save();
            return redirect()->route('magang.index')->with('success', 'Status berhasil diubah');
        } catch (\Throwable $th) {
            return redirect()->route('magang.index')->with('error', 'terjadi kesalahan');
        }
    }

    public function reject($id, Request $request)
    {
        try {
            $request->validate([
                'keterangan' => 'required'
            ]);
            $magang = DaftarMagang::find($id);
            $magang->keterangan = $request->keterangan;
            $magang->status = 'ditolak';
            $magang->update();
            return response()->json("Berhasil Mengubah data!!", 200);
        } catch (\Throwable $th) {
            return response()->json("Gagal mengubah data!!", 500);
        }
    }
}
