<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Guru;

class GuruDuaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $data = [
        array(
            'NIP' => '0021213245647',
            'name' => 'Mu\'awanah, S.Pd.SD',
            'email' => 'muawanan@sia.id',
            'password' => '12345678'
        ),
        array(
            'NIP' => '0021213245648',
            'name' => 'Agus Santoso, S.Pd.I',
            'email' => 'agus_santoso@sia.id',
            'password' => '12345678'
        ),
        array(
            'NIP' => '0021213245649',
            'name' => 'Hari Subagya, S.Pd',
            'email' => 'hari@sia.id',
            'password' => '12345678'
        ),
        array(
            'NIP' => '0021213245650',
            'name' => 'Susanto, S.Pd.SD',
            'email' => 'susanto@sia.id',
            'password' => '12345678'
        ),
        array(
            'NIP' => '0021213245651',
            'name' => 'Ety Kusuma, S.Pd',
            'email' => 'ety_kusuma@sia.id',
            'password' => '12345678'
        ),
        array(
            'NIP' => '0021213245652',
            'name' => 'Elis Setyowati, S.Pd.SD',
            'email' => 'elis@sia.id',
            'password' => '12345678'
        ),
        array(
            'NIP' => '0021213245653',
            'name' => 'Suripto, S.Pd.SD',
            'email' => 'suripto@sia.id',
            'password' => '12345678'
        ),
        array(
            'NIP' => '0021213245654',
            'name' => 'Titi Suryati, S.Pd.SD',
            'email' => 'titi@sia.id',
            'password' => '12345678'
        ),
        array(
            'NIP' => '0021213245655',
            'name' => 'Alif Supriyanto S.Pd',
            'email' => 'alif@sia.id',
            'password' => '12345678'
        ),
        array(
            'NIP' => '0021213245656',
            'name' => 'Sri Mulyani, S.Pd',
            'email' => 'srimulyani@sia.id',
            'password' => '12345678'
        ),
        array(
            'NIP' => '0021213245657',
            'name' => 'Anna Purwaningsih S.Pd.SD',
            'email' => 'anna_purwaningsih@sia.id',
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
