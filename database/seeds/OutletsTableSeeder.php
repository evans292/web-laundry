<?php

use App\Outlet;
use Illuminate\Database\Seeder;

class OutletsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $outlet = Outlet::create([
            'nama' => 'Rumah Laundry',
            'alamat' => 'Jl.Panteneun Gg.Jati No.55 Rt.01/07 Ds.Licin Kec.Cimalaka Kab.Sumedang',
            'tlp' => '085155156437',
        ]);
    }
}
