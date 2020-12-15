<?php

namespace App\Http\Controllers;

use App\Outlet;
use App\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if($request->ajax()) {
            $packages = new Package;
            if($request->q)
            {
                $packages = $packages->where('jenis', 'like', '%'.$request->q.'%')->orWhere('nama_paket', $request->q);
            }
            $packages = $packages->with('outlet')->paginate(config('stisla.perpage'))->appends(['q' => $request->q]);
            return response()->json($packages);
        }
        return view('admin.packages.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.packages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'outlet_id' => 'required',
            'jenis' => 'required',
            'nama_paket' => 'required|max:100',
            'harga' => 'required|numeric'
        ]);

        $package = Package::create([
            'outlet_id' => request('outlet_id'),
            'jenis' => request('jenis'),
            'nama_paket' => request('nama_paket'),
            'harga' => request('harga'),
        ]);

        return response()->json($package);
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
    public function edit(Package $package)
    {
        //
        return view('admin.packages.edit', compact('package'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Package $package)
    {
        //
        $request->validate([
            'outlet_id' => 'required',
            'jenis' => 'required',
            'nama_paket' => 'required|max:100',
            'harga' => 'required|numeric'
        ]);

        $package->update([
            'outlet_id' => request('outlet_id'),
            'jenis' => request('jenis'),
            'nama_paket' => request('nama_paket'),
            'harga' => request('harga'),
        ]);

        return response()->json($package);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Package $package)
    {
        //
        $package->delete();
    }
}
