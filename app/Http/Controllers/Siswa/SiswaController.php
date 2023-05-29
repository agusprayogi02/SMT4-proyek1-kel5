<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Smk;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'siswa' => Siswa::with('smk', 'kelas', 'user')->paginate(10)
        ];
        return view('users.siswa.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'agama' => ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha', 'Konghucu'],
            'smk' => Smk::all(),
            'kelas' => Kelas::all(),
        ];
        return view('users.siswa.form', $data);
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
            'nisn' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'kelas_id' => 'required',
            'smk_id' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'gender' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'agama' => 'required',
        ]);
        $siswa = Siswa::with('user')->create($request->except(['_token']));
        $siswa->user = new User();
        $siswa->user->name = $request->nama;
        $siswa->user->email = $request->email;
        $siswa->user->password = Hash::make($request->password);
        $siswa->user->save();
        $siswa->user->assignRole('Siswa');
        return redirect('/siswa')
            ->with('success', 'Data Siswa Berhasil Ditambahkan');
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
        $data = [
            'agama' => ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha', 'Konghucu'],
            'smk' => Smk::all(),
            'kelas' => Kelas::all(),
            'siswa' => Siswa::where('nisn', $id)->first()
        ];
        return view('users.siswa.form', $data);
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
