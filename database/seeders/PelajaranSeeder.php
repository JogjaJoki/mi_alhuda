<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pelajaran;

class PelajaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $data = [
        "Bahasa Jawa",
        "Matematika",
        "Bahasa Indonesia",
        "Bahasa Inggris",
        "IPA",
        "IPS"
    ];

    public function run()
    {
        foreach($this->data as $index => $d){
            Pelajaran::create([
                'kode_pelajaran' => 'MPL0' . (++$index),
                'nama' => $d
            ]);
        }
    }
}
