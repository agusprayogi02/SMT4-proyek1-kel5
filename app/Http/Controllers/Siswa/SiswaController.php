<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Http\Requests\Siswa\UpdateSiswaRequest;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Smk;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $siswa = null;
        $user = auth()->user();
        if (strtolower($user->roles[0]->name) === "siswa") {
            $siswa = Siswa::with('smk', 'kelas', 'user')->where('user_id', $user->id)->paginate(10);
        } else {
            $siswa = Siswa::with('smk', 'kelas', 'user')->paginate(10);
        }
        $data = [
            'siswa' => $siswa,
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        try {
            DB::beginTransaction();
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
            $siswa = new Siswa($request->except(['_token']));
            $user = new User();
            $user->name = $request->nama;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();
            $siswa->user()->associate($user);
            $siswa->save();
            $siswa->user->assignRole('Siswa');

            DB::commit();
            return redirect('/siswa')
                ->with('success', 'Data Siswa Berhasil Ditambahkan');
        } catch (\Throwable $e) {
            DB::rollBack();
            return redirect('/siswa')
                ->with('error', 'Data Siswa Gagal Ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($nisn)
    {

        $data = [
            'agama' => ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha', 'Konghucu'],
            'smk' => Smk::all(),
            'kelas' => Kelas::all(),
            'siswa' => Siswa::with('smk', 'kelas', 'user')->find($nisn),
        ];
        return view('users.siswa.form', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSiswaRequest $request, $id)
    {
        try {
            $data = $request->validated();
            $guru = Siswa::with('user')->where('nisn', $id)->firstOrFail();
            $guru->update($data);
            $data['name'] = $data['nama'];
            $guru->user->update([
                'name' => $data['nama'],
                'email' => $data['email'],
            ]);
            return redirect()->route('siswa.index')->with('success', 'Data Siswa Berhasil Diedit');
        } catch (\Throwable $th) {
            return redirect()->route('siswa.index')->with('error', 'Data Siswa gagal diedit');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
