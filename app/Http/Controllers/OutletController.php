<?php

namespace App\Http\Controllers;

use App\User;
use App\Outlet;
use Illuminate\Http\Request;
use App\Http\Requests\OutletAddRequest;
use App\Http\Requests\OutletUpdateRequest;

class OutletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $this->authorize(User::class, 'index');

        if($request->ajax()) {
            $outlets = new Outlet;
            if($request->q)
            {
                $outlets = $outlets->where('nama', 'like', '%'.$request->q.'%')->orWhere('alamat', $request->q);
            }
            $outlets = $outlets->paginate(config('stisla.perpage'))->appends(['q' => $request->q]);
            return response()->json($outlets);
        }
        return view('admin.outlets.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.outlets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OutletAddRequest $request)
    {
        //
        $outlet = Outlet::create([
            'nama' => request('nama'),
            'alamat' => request('alamat'),
            'tlp' => request('tlp'),
        ]);

        return response()->json($outlet);
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
    public function edit(Outlet $outlet)
    {
        //
        return view('admin.outlets.edit', compact('outlet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OutletUpdateRequest $request, Outlet $outlet)
    {
        //
        $outlet->update([
            'nama' => request('nama'),
            'alamat' => request('alamat'),
            'tlp' => request('tlp'),
        ]);

        return response()->json($outlet);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Outlet $outlet)
    {
        //
        $outlet->delete();
    }
}
