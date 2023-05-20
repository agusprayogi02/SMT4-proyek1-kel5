<?php

namespace App\Http\Controllers\Dudi;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dudi\StoreDudiRequest;
use App\Http\Requests\Dudi\UpdateDudiRequest;
use App\Models\Dudi;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;

class DudiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:dudi.index')->only('index');
        $this->middleware('permission:dudi.create')->only('create', 'store');
        $this->middleware('permission:dudi.edit')->only('edit', 'update');
        $this->middleware('permission:dudi.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'dudi' => Dudi::with('user')->paginate(10)
        ];
        return view('users.dudi.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.dudi.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDudiRequest $request)
    {
        try {
            $data = $request->validated();
            $data['password'] = Hash::make($data['password']);
            $data['name'] = $data['nama'];
            $user = User::create($data);
            $data['user_id'] = $user->id;
            $dudi = Dudi::create($data);
            $dudi->user->assignRole('DUDI');
            return redirect()->route('dudi.index')->with('success', 'Berhasil menambahkan data Dudi');
        } catch (\Throwable $th) {
            return redirect()->route('dudi.index')->with('error', 'Gagal menambahkan data Dudi');
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
                'dudi' => Dudi::with('user')->where('nib', $id)->firstOrFail()
            ];
            return view('users.dudi.form', $data);
        } catch (\Throwable $th) {
            return redirect()->route('dudi.index')->with('error', 'Gagal mengambil data Dudi');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDudiRequest $request, $id)
    {
        try {
            $data = $request->validated();
            $dudi = Dudi::with('user')->where('nib', $id)->firstOrFail();
            $dudi->update($data);
            $dudi->user->update([
                'name' => $data['nama'],
                'email' => $data['email'],
            ]);
            return redirect()->route('dudi.index')->with('success', 'Berhasil mengubah data Dudi');
        } catch (\Throwable $th) {
            return redirect()->route('dudi.index')->with('error', 'Gagal mengubah data Dudi');
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
            $dudi = Dudi::with('user')->where('nib', $id)->firstOrFail();
            $dudi->user->removeRole('DUDI');
            $dudi->delete();
            $dudi->user->delete();
            return redirect()->route('dudi.index')->with('success', 'Berhasil menghapus data Dudi');
        } catch (\Throwable $th) {
            return redirect()->route('dudi.index')->with('error', 'Gagal menghapus data Dudi');
        }
    }
}
