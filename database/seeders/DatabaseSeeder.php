<?php

namespace Database\Seeders;

use App\Models\Song;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Song::create([
            'title' => 'Kalapastangan',
            'artist' => 'fitterkarma',
            'lyrics' => "Oras nang sambahin ang ngalan Mo\nPara mabuhay habang-buhay sa puso't isipan Mo\nSino ba ako para mapansin Mo?\nMga dalangin ko sa 'Yo, sana'y pakinggan Mo\nPa'no ba ako magiging 'sang santo\nPara makasama Kita diyan sa tabi ng trono Mo?\n\nIlan pang pagsubok ang daraanan ko\nBago ako makaranas ng mga milagro Mo?\nOh, ang langit ay nandito lamang pala sa lupa\nAt ang impiyerno ay nasa isipan ko, at pinalimot ng 'Yong ganda\nUmaawit ang mga anghel, umaawit ang mga anghel\nNagdiriwang sila nang makasama Kita, huwag Ka sanang mawawala\nOh, oh, oh, oh\nOh, ooh\nMamamatay akong nakangiti\n\nKapag Ikaw ang nasa aking tabi\nMabubuhay akong nagsisisi\nKapag 'sang araw hindi Kita mapangiti\nKalapastangan ang 'di Ka ibigin\nKalokohan ang 'di Ka isipin\nKung ang mundo ay biglang gugunawin\nIkaw ang una kong hahanapin\nOoh\nOoh",
        ]);
    }
}
