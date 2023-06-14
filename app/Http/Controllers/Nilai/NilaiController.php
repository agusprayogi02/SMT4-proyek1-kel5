<?php

namespace App\Http\Controllers\Nilai;

use App\Http\Controllers\Controller;
use App\Http\Requests\NilaiRequest;
use App\Models\Dudi;
use App\Models\Nilai;
use App\Models\Siswa;
use Auth;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
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
            $nilai = Nilai::where('siswa_id', $user->id)->paginate(10);
        } else if (strtolower($user->roles[0]->name) === "dudi") {
            $nilai = Nilai::where('dudi_id', $user->id)->paginate(10);
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
            'siswa' => Siswa::all(),
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
            $nilai = Nilai::create($data);
            $dudi = Dudi::where('user_id', Auth::user()->id)->first();
            $siswa = Siswa::find($request->siswa_id);

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
        $nilai = Nilai::find($id);
        return view('nilai.show', compact('nilai'));
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
        //
    }
}
