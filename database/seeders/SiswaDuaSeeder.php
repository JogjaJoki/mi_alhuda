<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Siswa;

class SiswaDuaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // date('2014-08-14')
    private $data;

    public function __construct() {
        $this->data = [
            [
                'NIS' => '141013792',
                'id_kelas' => 1,
                'nama' => 'Achmad Fathul Azzam',
                'gender' => 'pria',
                'tempat_lahir' => 'Pacitan',
                'tanggal_lahir' => date('Y-m-d', strtotime("2014-08-14")),
                'alamat' => 'RT.03/RW.09, Jaten, Pelem'
            ],
            [
                'NIS' => '141153292',
                'id_kelas' => 1,
                'nama' => 'Aditya Naufal Azka',
                'gender' => 'pria',
                'tempat_lahir' => 'Pacitan',
                'tanggal_lahir' => date('Y-m-d', strtotime("2014-10-06")),
                'alamat' => 'RT.04/RW.11, Bero, Pelem'
            ],
            [
                'NIS' => '158370195',
                'id_kelas' => 1,
                'nama' => 'Alif Khoirul Anwar',
                'gender' => 'pria',
                'tempat_lahir' => 'Pacitan',
                'tanggal_lahir' => date('Y-m-d', strtotime("2015-01-18")),
                'alamat' => 'RT.01/RW.09, Jaten, Pelem'
            ],
            [
                'NIS' => '149368717',
                'id_kelas' => 1,
                'nama' => 'Arya Adyatama Madani',
                'gender' => 'pria',
                'tempat_lahir' => 'Pacitan',
                'tanggal_lahir' => date('Y-m-d', strtotime("2014-05-04")),
                'alamat' => 'RT.01/RW.09, Jaten, Pelem'
            ],
            [
                'NIS' => '146855070',
                'id_kelas' => 1,
                'nama' => 'Bilqis Ariva Ramadhani',
                'gender' => 'wanita',
                'tempat_lahir' => 'Pacitan',
                'tanggal_lahir' => date('Y-m-d', strtotime("2014-07-08")),
                'alamat' => 'RT.01/RW.11, Pangkah, Mendolo'
            ],
            [
                'NIS' => '154785763',
                'id_kelas' => 1,
                'nama' => 'Cindy Andra Saputri',
                'gender' => 'wanita',
                'tempat_lahir' => 'Pacitan',
                'tanggal_lahir' => date('Y-m-d', strtotime("2015-02-21")),
                'alamat' => 'RT.03/RW.08, Biting, Pelem'
            ],
            [
                'NIS' => '148083934',
                'id_kelas' => 1,
                'nama' => 'Dava Aditya Prayoga',
                'gender' => 'pria',
                'tempat_lahir' => 'Pacitan',
                'tanggal_lahir' => date('Y-m-d', strtotime("2014-08-06")),
                'alamat' => 'RT.03/RW.09, Jaten, Pelem'
            ],
            [
                'NIS' => '145703624',
                'id_kelas' => 1,
                'nama' => 'Fathan Rafli Ardhani',
                'gender' => 'pria',
                'tempat_lahir' => 'Pacitan',
                'tanggal_lahir' => date('Y-m-d', strtotime("2014-12-06")),
                'alamat' => 'RT.02/RW.09, Jaten, Pelem'
            ],
            [
                'NIS' => '314262073',
                'id_kelas' => 1,
                'nama' => 'Naufal Hanif Arisky',
                'gender' => 'pria',
                'tempat_lahir' => 'Pacitan',
                'tanggal_lahir' => date('Y-m-d', strtotime("2014-08-30")),
                'alamat' => 'RT.02/RW.08, Biting, Pelem'
            ],
        ];
        
    }

    public function run()
    {
        foreach($this->data as $d){
            Siswa::create([
                'NIS' => $d['NIS'],
                'id_kelas' => $d['id_kelas'],
                'nama' => $d['nama'],
                'gender' => $d['gender'],
                'tempat_lahir' => $d['tempat_lahir'],
                'tanggal_lahir' => $d['tanggal_lahir'],
                'alamat' => $d['alamat']
            ]);
        }
    }
}
