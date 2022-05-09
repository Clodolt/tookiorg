<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class IslandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('islands')->insert(
            [
            'title' => 'Aiwana Island',
            'ilvl' => 250,
            'mokokosTotal' => 3,
            'soulType' => 'Quest',
            'islandType' => 'None']
        );

        DB::table('islands')->insert(
            [
                'title' => 'Alakkir',
                'ilvl' => 250,
                'mokokosTotal' => 1,
                'soulType' => 'RNG [Defeat Monsters]',
                'islandType' => 'Timed']
        );

        DB::table('islands')->insert(
            [
                'title' => 'Alteisen',
                'ilvl' => 302,
                'mokokosTotal' => 4,
                'soulType' => 'RNG [Defeat Monsters]',
                'islandType' => 'None']
        );

    }
}
