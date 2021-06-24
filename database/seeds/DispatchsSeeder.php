<?php

use Illuminate\Database\Seeder;

class DispatchsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dispatchs')->insert([
            'user_id' => '1',
            'location_id' => '1',
            'task_id' => 'TI001',
            'nama_kurir' => 'Yogi',
            'tipe_mobil_id' => '1',
            'tanggal' => '2021-06-21',
            'minggu' => '1',
            'flow' => 'Inbound',
            'no_awb' => 'AWB001',
            'berat_awb' => '5',
            'bensin' => '100000',
            'tol' => '15000',
            'parkir' => '10000',
            'lainlain' => '10000',
            'km_awal' => '12345',
            'km_isi' => '12346',
            'km_akhir' => '12390'
        ]);
        DB::table('dispatchs')->insert([
            'user_id' => '2',
            'location_id' => '2',
            'task_id' => 'TI002',
            'nama_kurir' => 'Adianta',
            'tipe_mobil_id' => '2',
            'tanggal' => '2021-06-21',
            'minggu' => '2',
            'flow' => 'Outbound',
            'no_awb' => 'AWB002',
            'berat_awb' => '5',
            'bensin' => '100000',
            'tol' => '15000',
            'parkir' => '10000',
            'lainlain' => '10000',
            'km_awal' => '12345',
            'km_isi' => '12346',
            'km_akhir' => '12390'
        ]);
    }
}
