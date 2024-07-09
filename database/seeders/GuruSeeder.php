<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Guru;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $data = [
        array(
            'NIP' => '0021213245644',
            'name' => 'Budi Raharjo',
            'email' => 'budi@sia.id',
            'password' => '12345678'
        ),
        array(
            'NIP' => '0021213245645',
            'name' => 'I Made',
            'email' => 'made@sia.id',
            'password' => '12345678'
        ),
        array(
            'NIP' => '0021213245646',
            'name' => 'Onno W Purbo',
            'email' => 'onno@sia.id',
            'password' => '12345678'
        ),
    ];
    public function run()
    {
        foreach($this->data as $d){
            $guru = Guru::create([
                'NIP' => $d['NIP'],
                'name' => $d['name'],
                'email' => $d['email'],
                'password' => $d['password']
            ]);

            $guru->assignRole('guru');
        }
    }
}
