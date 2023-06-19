<?php

namespace App\Http\Controllers;

use App\Http\Requests\laporan\harian\StoreLaporanRequest;
use App\Http\Requests\laporan\harian\UpdateLaporanRequest;
use App\Models\Dudi;
use App\Models\Guru;
use App\Models\LaporanHarian;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Storage;

class LaporanHarianController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:laporan-harian.index')->only('index');
        $this->middleware('permission:laporan-harian.create')->only('create', 'store');
        $this->middleware('permission:laporan-harian.edit')->only('edit', 'update');
        $this->middleware('permission:laporan-harian.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        if (strtolower($user->roles[0]->name) === "siswa") {
            $siswa = Siswa::where('user_id', $user->id)->first();
            $laporan = LaporanHarian::with('siswa')->where('siswa_id', '=', $siswa->nisn)->paginate(10);
            return view('laporan.harian.index', ['laporan' => $laporan]);
        } else if (strtolower($user->roles[0]->name) === "dudi") {
            $dudi = Dudi::where('user_id', $user->id)->first();
            $laporan = LaporanHarian::with('siswa')->paginate(10);
            return view('laporan.harian.index-dudi', ['laporan' => $laporan]);
        } else if (strtolower($user->roles[0]->name) === "guru") {
            $guru = Guru::where('user_id', $user->id)->first();
            $laporan = LaporanHarian::with('siswa')->paginate(10);
            return view('laporan.harian.index-dudi', ['laporan' => $laporan]);
        } else {
            $laporan = LaporanHarian::with('siswa')->paginate(10);
        }
        return view('laporan.harian.index', ['laporan' => $laporan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'siswa' => Siswa::all()
        ];
        return view('laporan.harian.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLaporanRequest $request)
    {
        try {
            $request->validated();
            if ($request->hasFile('photo')) {
                $image_name = $request->file('photo')->store('images', 'public');
                $request->merge([
                    'image' => $image_name,
                ]);
            }
            $laporan = LaporanHarian::create($request->except('photo'));
            $user = auth()->user();
            $siswa = Siswa::where('user_id', $user->id)->first();
            $laporan->siswa()->associate($siswa);
            $laporan->save();

            return redirect()->route('laporan.harian.index')->with('success', 'Laporan harian berhasil ditambahkan');
        } catch (\Throwable $th) {
            return redirect()->route('laporan.harian.index')->with('error', 'Laporan harian gagal ditambahkan');
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
        return view('laporan.harian.form', [
            'laporan' => LaporanHarian::where('id', $id)->first(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLaporanRequest $request, $id)
    {
        try {
            $request->validated();
            $laporan = LaporanHarian::where('id', $id)->first();

            if ($request->hasFile('photo')) {
                if ($laporan->image && file_exists(storage_path('app/public/' . $laporan->image))) {
                    Storage::delete('public/' . $laporan->image);
                }
                $image_name = $request->file('photo')->store('images', 'public');
                $request->merge([
                    'image' => $image_name,
                ]);
            }

            LaporanHarian::findOrFail($id)->update($request->all());
            return redirect()->route('laporan.harian.index')->with('success', 'Laporan harian berhasil diedit');
        } catch (\Throwable $th) {
            return redirect()->route('laporan.harian.index')->with('error', 'Laporan harian gagal diedit');
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
            LaporanHarian::findOrFail($id)->delete();
            return redirect()->route('laporan.harian.index')->with('success', 'Laporan harian berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->route('laporan.harian.index')->with('error', 'Laporan harian gagal dihapus');
        }
    }
}
