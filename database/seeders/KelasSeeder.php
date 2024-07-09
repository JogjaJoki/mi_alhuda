<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kelas;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $data = [
        array(
            'id' => 1,
            'nama_kelas' => '1 A',
            'wali_kelas' => 'Budi Raharjo'
        ),
        array(
            'id' => 2,
            'nama_kelas' => '1 B',
            'wali_kelas' => 'I Made'
        ),
        array(
            'id' => 3,
            'nama_kelas' => '1 C',
            'wali_kelas' => 'Onno W Purbo'
        ),
    ];
    public function run()
    {
        foreach($this->data as $d){
            $kelas = Kelas::create([
                'id' => $d['id'],
                'nama_kelas' => $d['nama_kelas'],
                'wali_kelas' => $d['wali_kelas'],
            ]);
        }
    }
}
