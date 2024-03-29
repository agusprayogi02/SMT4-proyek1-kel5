<?php

namespace App\Http\Controllers\Dudi;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dudi\StoreDudiRequest;
use App\Http\Requests\Dudi\UpdateDudiRequest;
use App\Models\Dudi;
use App\Models\DudiKeahlian;
use App\Models\Keahlian;
use App\Models\User;
use Hash;
use Illuminate\Support\Facades\DB;

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
        $keahlian = Keahlian::all();
        return view('users.dudi.form', compact('keahlian'));
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
            DB::beginTransaction();
            $data = $request->validated();
            $dudi = new Dudi($data);
            $data['password'] = Hash::make($data['password']);
            $data['name'] = $data['nama'];
            $user = User::create($data);
            $dudi->user()->associate($user);
            $dudi->save();

            $dudi->keahlian()->attach($request->keahlian);
            $user->assignRole('DUDI');
            DB::commit();
            return redirect()->route('dudi.index')->with('success', 'Berhasil menambahkan data Dudi');
        } catch (\Throwable $th) {
            DB::rollBack();
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
                'dudi' => Dudi::with('user')->where('nib', $id)->firstOrFail(),
                'keahlian' => Keahlian::all(),
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
            DB::beginTransaction();
            $data = $request->validated();
            $dudi = Dudi::with('user')->where('nib', $id)->firstOrFail();
            $dudi->update($data);
            $dudi->user->update([
                'name' => $data['nama'],
                'email' => $data['email'],
            ]);
            DB::commit();
            return redirect()->route('dudi.index')->with('success', 'Berhasil mengubah data Dudi');
        } catch (\Throwable $th) {
            DB::rollBack();
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
            DB::beginTransaction();
            $dudi = Dudi::with('user')->where('nib', $id)->firstOrFail();
            $dudi->user->removeRole('DUDI');
            $dudi->delete();
            $dudi->user->delete();
            DB::commit();
            return redirect()->route('dudi.index')->with('success', 'Berhasil menghapus data Dudi');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('dudi.index')->with('error', 'Gagal menghapus data Dudi');
        }
    }
}
