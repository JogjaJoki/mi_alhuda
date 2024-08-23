<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pelajaran;
use App\Models\Siswa;
use App\Models\Nilai;

class PelajaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $siswa;

    public function __construct() {
        $this->siswa = [
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

    private $pelajaran = [
        array("name" => "Bahasa Jawa", 'bobot' => 0.2),
        array("name" => "Matematika", 'bobot' => 0.3),
        array("name" => "Bahasa Indonesia", 'bobot' => 0.2),
        array("name" => "Bahasa Inggris", 'bobot' => 0.1),
        array("name" => "IPA", 'bobot' => 0.1),
        array("name" => "IPS", 'bobot' => 0.1),        
    ];
    

    public function run()
    {
        foreach($this->pelajaran as $index => $d){
            Pelajaran::create([
                'kode_pelajaran' => 'MPL0' . (++$index),
                'nama' => $d["name"],
                'bobot' => $d["bobot"]
            ]);
        }
        foreach($this->siswa as $index => $d){
            $sis = Siswa::create([
                'NIS' => $d['NIS'],
                'id_kelas' => $d['id_kelas'],
                'nama' => $d['nama'],
                'gender' => $d['gender'],
                'tempat_lahir' => $d['tempat_lahir'],
                'tanggal_lahir' => $d['tanggal_lahir'],
                'alamat' => $d['alamat']
            ]);

            $pelajaran = Pelajaran::all();
            foreach($pelajaran as $pel){
                Nilai::create([
                    'kode_pelajaran' => $pel->kode_pelajaran,
                    'NIS' => $sis->NIS,
                    'nilai' => (rand(6,9) + (rand(0,10)/10))
                ]);
            }
        }
    }
}
