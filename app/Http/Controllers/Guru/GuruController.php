<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Http\Requests\Guru\StoreGuruRequest;
use App\Http\Requests\Guru\UpdateGuruRequest;
use App\Models\Guru;
use App\Models\Smk;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class GuruController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:guru.index')->only('index');
        $this->middleware('permission:guru.create')->only('create', 'store');
        $this->middleware('permission:guru.edit')->only('edit', 'update');
        $this->middleware('permission:guru.destroy')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'guru' => Guru::with('smk', 'user')->paginate(10)
        ];
        return view('users.guru.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $smk = Smk::pluck('nama', 'npsn')->toArray();
        return view('users.guru.form', compact('smk'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGuruRequest $request)
    {
        dd($request->validated());
        try {
            $data = $request->validated();
            $data['password'] = Hash::make($data['password']);
            $data['name'] = $data['nama'];
            $user = User::create($data);
            $data['user_id'] = $user->id;
            Guru::create($data);
            $user->assignRole('Guru');
            return redirect()->route('guru.index')->with('success', 'Berhasil menambahkan data Guru');
        } catch (\Throwable $th) {
            return redirect()->route('guru.index')->with('error', 'Gagal menambahkan data Guru');
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
    public function edit($nip)
    {
        $smk = Smk::pluck('nama', 'npsn')->toArray();
        $guru = Guru::find($nip);
        return view('users.guru.form', compact('smk'))->with('guru', $guru);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGuruRequest $request, $id)
    {
        try {
            $data = $request->validated();
            $guru = Guru::with('user')->where('nip', $id)->firstOrFail();
            $guru->update($data);
            $data['name'] = $data['nama'];
            $guru->user->update([
                'name' => $data['nama'],
                'email' => $data['email'],
            ]);
            return redirect()->route('guru.index')->with('success', 'Data Guru Berhasil Diedit');
        } catch (\Throwable $th) {
            return redirect()->route('guru.index')->with('error', 'Data Guru gagal diedit');
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
            $guru = Guru::with('user')->where('nip', $id)->firstOrFail();
            $guru->user->removeRole('Guru');
            $guru->delete();
            $guru->user->delete();
            return redirect()->route('guru.index')->with('success', 'Data Guru berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->route('guru.index')->with('error', 'Data Guru gagal dihapus');
        }
    }
}
