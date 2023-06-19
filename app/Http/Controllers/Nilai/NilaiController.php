<?php

namespace App\Http\Controllers\Nilai;

use App\Http\Controllers\Controller;
use App\Http\Requests\NilaiKategoriRequest;
use App\Http\Requests\NilaiRequest;
use App\Models\Category;
use App\Models\Dudi;
use App\Models\Nilai;
use App\Models\NilaiKategori;
use App\Models\Siswa;
use App\Traits\ApiResponse;
use Auth;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    use ApiResponse;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nilai = Nilai::paginate(10);
        $user = auth()->user();
        if (strtolower($user->roles[0]->name) === "siswa") {
            $siswa = Siswa::where('user_id', $user->id)->first();
            $nilai = Nilai::with('siswa')->where('siswa_id', $siswa->nisn)->paginate(10);
        } else if (strtolower($user->roles[0]->name) === "dudi") {
            $dudi = Dudi::where('user_id', $user->id)->first();
            $nilai = Nilai::with('siswa')->where('dudi_id', $dudi->nib)->paginate(10);
        }

        return view('nilai.index', compact('nilai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'siswa' => Siswa::whereDoesntHave('nilai', function ($query) {
                $dudi = Dudi::where('user_id', Auth::user()->id)->first();
                $query->where('dudi_id', $dudi->nib);
            })->whereHas('daftarMagang', function ($query) {
                $dudi = Dudi::where('user_id', Auth::user()->id)->first();
                $query->where('dudi_id', $dudi->nib);
                $query->where('status', 'diterima');
            })->get(),
        ];
        return view('nilai.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NilaiRequest $request)
    {
        try {
            $data = $request->validated();
            $nilai = Nilai::create([
                'siswa_id' => $data['siswa_id'],
                'applied_job' => '0',
            ]);
            $dudi = Dudi::where('user_id', Auth::user()->id)->first();
            $siswa = Siswa::find($request->siswa_id);
            // dd($dudi, $siswa);

            $nilai->dudi()->associate($dudi);
            $nilai->siswa()->associate($siswa);
            $nilai->save();
            return redirect()->route('nilai.index')->with('success', 'Nilai berhasil ditambahkan');
        } catch (\Throwable $th) {

            return redirect()->route('nilai.index')->with('error', 'Nilai gagal ditambahkan');
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
        $kategori = NilaiKategori::with('nilai', 'kategori')->where('nilai_id', $id)->paginate(10);
        $nilai = Nilai::find($id);
        return view('nilai.show', compact('kategori', 'nilai'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
            $nilai = Nilai::find($id);
            $nilai->delete();
            return redirect()->route('nilai.index')->with('success', 'Nilai berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->route('nilai.index')->with('error', 'Nilai gagal dihapus');
        }
    }

    function select2Categories($id)
    {
        $kategori = Category::whereDoesntHave('nilaiKategori', function ($query) use ($id) {
            $query->where('nilai_id', $id);
        })->get();
        return response()->json($kategori);
    }

    public function nilai($id, NilaiKategoriRequest $request)
    {
        $request->validated();
        $nilai = Nilai::find($id);
        $kategori = Category::find($request->category_id);
        $kategoriNilai = NilaiKategori::create([
            'kategori_id' => $kategori->id,
            'nilai_id' => $nilai->id,
            'keterangan' => $request->keterangan,
            'nilai' => $request->nilai,
        ]);
        $kategoriNilai->kategori()->associate($kategori);
        $kategoriNilai->nilai()->associate($nilai);
        $kategoriNilai->save();
        $nKat = NilaiKategori::where('nilai_id', $id)->get();
        $len = count($nKat);
        if ($len > 0) {
            $tot = 0;
            foreach ($nKat as $value) {
                $tot += $value->nilai;
            }

            $nilai->total = $tot;
            $nilai->avg = $tot / $len;
            $nilai->save();
        }

        return $this->apiSuccess($kategoriNilai, 200, "Nilai berhasil ditambahkan");
        // return $this->apiSuccess($kategoriNilai->load('kategori'));
    }

    public function deleteNilai($id)
    {
        $nilai = NilaiKategori::find($id);
        $nilai->delete();
        return redirect()->back()->with('success', 'Nilai berhasil dihapus');
    }
}
