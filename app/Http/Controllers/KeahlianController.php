<?php

namespace App\Http\Controllers;

use App\Models\Keahlian;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class KeahlianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'keahlian' => Keahlian::paginate(10)
        ];
        return view('keahlian.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('keahlian.form');
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
            'nama' => 'required',
            'bidang' => 'required',
            'deskripsi' => 'required',
        ]);
        Keahlian::create($request->except(['_token']));
        return redirect('/keahlian')
            ->with('success', 'Data Keahlian Berhasil Ditambahkan');
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
        $keahlian = Keahlian::find($id);
        return view('keahlian.form', ['urlform' => url("/keahlian/" . $id), 'keahlian' => $keahlian]);
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
        $request->validate([
            'nama' => 'required',
            'bidang' => 'required',
            'deskripsi' => 'required',
        ]);

        $requestData = $request->except(['_token', '_method']);
        $requestData['id'] = $id;

        $data = Keahlian::where('id', '=', $id)->update($requestData);
        return redirect('/keahlian')
            ->with('success', 'Data Keahlian Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $requestData['id'] = $id;

        Keahlian::where('id', '=', $id)->delete();
        return redirect('/keahlian')
            ->with('success', 'Data Keahlian Berhasil Dihapus');
    }
}
