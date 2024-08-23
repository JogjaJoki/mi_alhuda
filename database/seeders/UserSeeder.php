<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\Kelas;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $kelas = [
        array(
            'id' => 1,
            'nama_kelas' => '1 A',
            'user_id' => 2
        ),
        array(
            'id' => 2,
            'nama_kelas' => '1 B',
            'user_id' => 3
        ),
        array(
            'id' => 3,
            'nama_kelas' => '1 C',
            'user_id' => 4
        ),
    ];
    private $admin = [
        array(
            'id' => 1,
            'name' => 'admin',
            'email' => 'admin@sia.id',
            'password' => '12345678'
        ),
    ];
    
    private $guru = [
        array(
            'id' => 2,
            'NIP' => '0021213245647',
            'name' => 'Mu\'awanah, S.Pd.SD',
            'email' => 'muawanan@sia.id',
            'password' => '12345678'
        ),
        array(
            'id' => 3,
            'NIP' => '0021213245648',
            'name' => 'Agus Santoso, S.Pd.I',
            'email' => 'agus_santoso@sia.id',
            'password' => '12345678'
        ),
        array(
            'id' => 4,
            'NIP' => '0021213245649',
            'name' => 'Hari Subagya, S.Pd',
            'email' => 'hari@sia.id',
            'password' => '12345678'
        ),
        array(
            'id' => 5,
            'NIP' => '0021213245650',
            'name' => 'Susanto, S.Pd.SD',
            'email' => 'susanto@sia.id',
            'password' => '12345678'
        ),
        array(
            'id' => 6,
            'NIP' => '0021213245651',
            'name' => 'Ety Kusuma, S.Pd',
            'email' => 'ety_kusuma@sia.id',
            'password' => '12345678'
        ),
        array(
            'id' => 7,
            'NIP' => '0021213245652',
            'name' => 'Elis Setyowati, S.Pd.SD',
            'email' => 'elis@sia.id',
            'password' => '12345678'
        ),
        array(
            'id' => 8,
            'NIP' => '0021213245653',
            'name' => 'Suripto, S.Pd.SD',
            'email' => 'suripto@sia.id',
            'password' => '12345678'
        ),
        array(
            'id' => 9,
            'NIP' => '0021213245654',
            'name' => 'Titi Suryati, S.Pd.SD',
            'email' => 'titi@sia.id',
            'password' => '12345678'
        ),
        array(
            'id' => 10,
            'NIP' => '0021213245655',
            'name' => 'Alif Supriyanto S.Pd',
            'email' => 'alif@sia.id',
            'password' => '12345678'
        ),
        array(
            'id' => 11,
            'NIP' => '0021213245656',
            'name' => 'Sri Mulyani, S.Pd',
            'email' => 'srimulyani@sia.id',
            'password' => '12345678'
        ),
        array(
            'id' => 12,
            'NIP' => '0021213245657',
            'name' => 'Anna Purwaningsih S.Pd.SD',
            'email' => 'anna_purwaningsih@sia.id',
            'password' => '12345678'
        ),
    ];

    public function run()
    {
        foreach($this->admin as $a){
            $admin = User::create([
                'name' => $a['name'],
                'email' => $a['email'],
                'password' => bcrypt($a['password']),
            ]);
    
            $admin->assignRole('admin');
        }
        foreach($this->guru as $a){
            $guru = User::create([
                'id' =>  $a['id'],
                'name' => $a['name'],
                'email' => $a['email'],
                'password' => bcrypt($a['password']),
            ]);
    
            $guru->assignRole('guru');

            UserDetail::create([
                'user_id' => $guru->id,
                'NIP' => $a['NIP'],
                'photo' => '',
                'address' => '',
                'phone' => ''
            ]);
        }
        foreach($this->kelas as $k){
            Kelas::create([
                'id' =>  $k['id'],
                'nama_kelas' => $k['nama_kelas'],
                'user_id' => $k['user_id']
            ]);
        }
    }
}
