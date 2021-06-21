<?php

use Illuminate\Database\Seeder;

class DispatchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dispatch')->insert([
            'kurir' => 'Yogi',
            'nopol' => 'HT001',
            'tipe_mobil' => 'BV',
            'tanggal' => '2000-01-01',
            'minggu' => '1',
            'nopickup' => 'PU001',
            'taskid' => 'TI001',
            'awb_first_pickup' => 'AFU001',
            'berat_awb_first_pickup' => '10',
            'awb_handover_outbound' => 'AHO001',
            'berat_awb_handover_outbound' => '15',
            'awb_handover_inbound' => 'AHI001',
            'berat_awb_handover_inbound' => '20',
            'awb_delivery' => 'AD001',
            'berat_awb_delivery' => '25',
            'bensin' => '50000',
            'tol' => '40000',
            'parkir' => '10000',
            'lainlain' => '5000',
            'km_awal' => '12310',
            'km_isi' => '12340',
            'km_akhir' => '12390',
        ]);
        DB::table('dispatch')->insert([
            'kurir' => 'Adianta',
            'nopol' => 'HT002',
            'tipe_mobil' => 'BV',
            'tanggal' => '2000-01-02',
            'minggu' => '2',
            'nopickup' => 'PU002',
            'taskid' => 'TI002',
            'awb_first_pickup' => 'AFU002',
            'berat_awb_first_pickup' => '10',
            'awb_handover_outbound' => 'AHO002',
            'berat_awb_handover_outbound' => '15',
            'awb_handover_inbound' => 'AHI002',
            'berat_awb_handover_inbound' => '20',
            'awb_delivery' => 'AD002',
            'berat_awb_delivery' => '25',
            'bensin' => '30000',
            'tol' => '20000',
            'parkir' => '5000',
            'lainlain' => '1000',
            'km_awal' => '12315',
            'km_isi' => '12340',
            'km_akhir' => '12390',
        ]);
    }
}
