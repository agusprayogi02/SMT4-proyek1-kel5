<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Http\Requests\Guru\StoreGuruRequest;
use App\Http\Requests\Guru\UpdateGuruRequest;
use App\Models\Guru;
use App\Models\Smk;
use App\Models\User;
use Hash;
use Illuminate\Support\Facades\DB;

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
        $guru = null;
        $user = auth()->user();
        if (strtolower($user->roles[0]->name) === "guru") {
            $guru = Guru::with('smk', 'user')->where('user_id', $user->id)->paginate(10);
        } else {
            $guru = Guru::with('smk', 'user')->paginate(10);
        }
        $data = [
            'guru' => $guru,
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
        $data = [
            'smk' => Smk::all()
        ];
        return view('users.guru.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGuruRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->validated();
            $guru = new Guru($data);

            $user = User::create([
                'name' => $guru->nama,
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);
            $guru->user()->associate($user);
            $guru->save();
            $user->assignRole('Guru');
            DB::commit();
            return redirect()->route('guru.index')->with('success', 'Berhasil menambahkan data Guru');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->route('guru.index')->with('error', 'Gagal menambahkan data Guru');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function edit($nip)
    {
        $data = [
            'guru' => Guru::find($nip),
            'smk' => Smk::all(),
        ];
        return view('users.guru.form', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function update(UpdateGuruRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $data = $request->validated();
            $guru = Guru::with('user')->where('nip', $id)->firstOrFail();
            $guru->update($data);
            $data['name'] = $data['nama'];
            $guru->user->update([
                'name' => $data['nama'],
                'email' => $data['email'],
            ]);
            DB::commit();
            return redirect()->route('guru.index')->with('success', 'Data Guru Berhasil Diedit');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('guru.index')->with('error', 'Data Guru gagal diedit');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function destroy($id)
    {
        try {
            DB::beginTransaction();
            $guru = Guru::with('user')->where('nip', $id)->firstOrFail();
            $guru->user->removeRole('Guru');
            $guru->delete();
            $guru->user->delete();
            DB::commit();
            return redirect()->route('guru.index')->with('success', 'Data Guru berhasil dihapus');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('guru.index')->with('error', 'Data Guru gagal dihapus');
        }
    }
}
