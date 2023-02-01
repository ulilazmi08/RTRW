<?php

namespace Database\Seeders;
use Carbon\Carbon;
use App\Models\User;
use App\Models\RT;
use App\Models\Profil;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'role' => '1',
            'role_keluarga' => '1',
            'no_ktp' => '1111111111111113',
            'email' => 'admin@gmail.com',
            // 'email_verified_at' => now(),
            'password' => Hash::make('123456'), // password
            'remember_token' => Str::random(10),

        ]);
        RT::truncate();
        $rts =  [
            [
              'nama_rt' => '01',
              'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
              'updated_at' => Carbon::now()->format('Y-m-d H:i:s')          
            ],
            [
                'nama_rt' => '02',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
              'updated_at' => Carbon::now()->format('Y-m-d H:i:s')  
            ],
              [
                'nama_rt' => '03',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')  
              ],
              [
                'nama_rt' => '04',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
              'updated_at' => Carbon::now()->format('Y-m-d H:i:s')  
              ],
              [
                'nama_rt' => '05',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
              'updated_at' => Carbon::now()->format('Y-m-d H:i:s')  
              ],
              [
                'nama_rt' => '06',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
              'updated_at' => Carbon::now()->format('Y-m-d H:i:s')  
              ],
              [
                'nama_rt' => '07',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
              'updated_at' => Carbon::now()->format('Y-m-d H:i:s')  
              ],
              [
                'nama_rt' => '08',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
              'updated_at' => Carbon::now()->format('Y-m-d H:i:s')  
              ],
              [
                'nama_rt' => '09',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
              'updated_at' => Carbon::now()->format('Y-m-d H:i:s')  
              ],
              [
                'nama_rt' => '10',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
              'updated_at' => Carbon::now()->format('Y-m-d H:i:s')  
              ],
          ];
          RT::insert($rts);

    }
}
