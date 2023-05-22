<?php

namespace App\Http\Controllers\Smk;

use App\Http\Controllers\Controller;
use App\Http\Requests\Smk\StoreSmkRequest;
use App\Http\Requests\Smk\UpdateSmkRequest;
use App\Models\Smk;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;

class SmkController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:smk.index')->only('index');
        $this->middleware('permission:smk.create')->only('create', 'store');
        $this->middleware('permission:smk.edit')->only('edit', 'update');
        $this->middleware('permission:smk.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'smk' => Smk::with('user', 'siswas', 'gurus')->paginate(10)
        ];
        return view('users.smk.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.smk.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSmkRequest $request)
    {
        try {
            $data = $request->validated();
            $data['password'] = Hash::make($data['password']);
            $data['name'] = $data['nama'];
            $user = User::create($data);
            $data['user_id'] = $user->id;
            Smk::create($data);
            $user->assignRole('SMK');
            return redirect()->route('smk.index')->with('success', 'Data SMK berhasil ditambahkan');
        } catch (\Throwable $th) {
            return redirect()->route('smk.index')->with('error', 'Data SMK gagal ditambahkan');
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
                'smk' => Smk::with('user')->where('npsn', $id)->firstOrFail()
            ];
            return view('users.smk.form', $data);
        } catch (\Throwable $th) {
            return redirect()->route('smk.index')->with('error', 'Data SMK gagal diedit');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSmkRequest $request, $id)
    {
        try {
            $data = $request->validated();
            $smk = Smk::with('user')->where('npsn', $id)->firstOrFail();
            $smk->update($data);
            $data['name'] = $data['nama'];
            $smk->user->update([
                'name' => $data['nama'],
                'email' => $data['email'],
            ]);

            return redirect()->route('smk.index')->with('success', 'Data SMK berhasil diedit');
        } catch (\Throwable $th) {
            return redirect()->route('smk.index')->with('error', 'Data SMK gagal diedit');
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
            $smk = Smk::with('user')->where('npsn', $id)->firstOrFail();
            $smk->user->removeRole('SMK');
            $smk->delete();
            $smk->user->delete();
            return redirect()->route('smk.index')->with('success', 'Data SMK berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->route('smk.index')->with('error', 'Data SMK gagal dihapus');
        }
    }
}
