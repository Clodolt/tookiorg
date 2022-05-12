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

        DB::table('islands')->insert(
            [
                'title' => 'Anguished Isle',
                'ilvl' => 1100,
                'mokokosTotal' => 3,
                'soulType' => 'RNG [Defeat Monsters]',
                'islandType' => 'None']
        );

        DB::table('islands')->insert(
            [
                'title' => 'Argon',
                'ilvl' => 460,
                'mokokosTotal' => 5,
                'soulType' => 'RNG [Non-Combat]',
                'islandType' => 'None']
        );

        DB::table('islands')->insert(
            [
                'title' => 'Asura Island',
                'ilvl' => 250,
                'mokokosTotal' => 2,
                'soulType' => 'Collection',
                'islandType' => 'Compass']
        );

        DB::table('islands')->insert(
            [
                'title' => 'Atlas',
                'ilvl' => 250,
                'mokokosTotal' => 4,
                'soulType' => 'Collection',
                'islandType' => 'None']
        );

        DB::table('islands')->insert(
            [
                'title' => 'Atropos',
                'ilvl' => 460,
                'mokokosTotal' => 4,
                'soulType' => 'RNG [Non-Combat]',
                'islandType' => 'None']
        );

        DB::table('islands')->insert(
            [
                'title' => 'Azure Wind Island',
                'ilvl' => 802,
                'mokokosTotal' => 5,
                'soulType' => 'Quest',
                'islandType' => 'None']
        );

        DB::table('islands')->insert(
            [
                'title' => 'Blackfang\'s Den',
                'ilvl' => 250,
                'mokokosTotal' => 4,
                'soulType' => 'Rapport',
                'islandType' => 'None']
        );

        DB::table('islands')->insert(
            [
                'title' => 'Boombling Island',
                'ilvl' => 250,
                'mokokosTotal' => 1,
                'soulType' => 'None',
                'islandType' => 'None']
        );

        DB::table('islands')->insert(
            [
                'title' => 'Cradle of the Sea Fermata',
                'ilvl' => 460,
                'mokokosTotal' => 3,
                'soulType' => 'RNG [Non-Combat]',
                'islandType' => 'None']
        );

        DB::table('islands')->insert(
            [
                'title' => 'Crescent Isle',
                'ilvl' => 250,
                'mokokosTotal' => 7,
                'soulType' => 'Collection',
                'islandType' => 'None']
        );

        DB::table('islands')->insert(
            [
                'title' => 'Death\'s Hold Island',
                'ilvl' => 250,
                'mokokosTotal' => 2,
                'soulType' => 'RNG [PvP Rewards]',
                'islandType' => 'Timed']
        );

        DB::table('islands')->insert(
            [
                'title' => 'Distorted Island',
                'ilvl' => 460,
                'mokokosTotal' => 3,
                'soulType' => 'Quest',
                'islandType' => 'None']
        );

        DB::table('islands')->insert(
            [
                'title' => 'Dreamgull Island',
                'ilvl' => 250,
                'mokokosTotal' => 3,
                'soulType' => 'Quest',
                'islandType' => 'None']
        );

        DB::table('islands')->insert(
            [
                'title' => 'Drumbeat Island',
                'ilvl' => 250,
                'mokokosTotal' => 0,
                'soulType' => 'RNG [Non-Combat]',
                'islandType' => 'Compass']
        );
        DB::table('islands')->insert(
            [
                'title' => 'Erasmo\'s Island',
                'ilvl' => 460,
                'mokokosTotal' => 2,
                'soulType' => 'RNG [Defeat Monsters]',
                'islandType' => 'Timed']
        );
        DB::table('islands')->insert(
            [
                'title' => 'Eternity Isle',
                'ilvl' => 802,
                'mokokosTotal' => 4,
                'soulType' => 'Rapport',
                'islandType' => 'None']
        );
        DB::table('islands')->insert(
            [
                'title' => 'Facility X-301',
                'ilvl' => 250,
                'mokokosTotal' => 5,
                'soulType' => 'RNG [Defeat Monsters]',
                'islandType' => 'None']
        );
        DB::table('islands')->insert(
            [
                'title' => 'Fantasm Island',
                'ilvl' => 600,
                'mokokosTotal' => 4,
                'soulType' => 'Una\'s Task',
                'islandType' => 'None']
        );
        DB::table('islands')->insert(
            [
                'title' => 'Foggy Ridge',
                'ilvl' => 600,
                'mokokosTotal' => 3,
                'soulType' => 'None',
                'islandType' => 'None']
        );
        DB::table('islands')->insert(
            [
                'title' => 'Famona Island',
                'ilvl' => 250,
                'mokokosTotal' => 5,
                'soulType' => 'None',
                'islandType' => 'None']
        );
        DB::table('islands')->insert(
            [
                'title' => 'Forpe',
                'ilvl' => 250,
                'mokokosTotal' => 6,
                'soulType' => 'RNG [Defeat Monsters]',
                'islandType' => 'Compass']
        );
        DB::table('islands')->insert(
            [
                'title' => 'Fortuna',
                'ilvl' => 460,
                'mokokosTotal' => 2,
                'soulType' => 'RNG [Non-Combat]',
                'islandType' => 'None']
        );
        DB::table('islands')->insert(
            [
                'title' => 'Freedom Isle',
                'ilvl' => 250,
                'mokokosTotal' => 3,
                'soulType' => 'Exchange',
                'islandType' => 'None']
        );
        DB::table('islands')->insert(
            [
                'title' => 'Frost Haven',
                'ilvl' => 250,
                'mokokosTotal' => 3,
                'soulType' => 'None',
                'islandType' => 'None']
        );
        DB::table('islands')->insert(
            [
                'title' => 'Frostfire Island',
                'ilvl' => 460,
                'mokokosTotal' => 3,
                'soulType' => 'RNG [Defeat Monsters]',
                'islandType' => 'None']
        );
        DB::table('islands')->insert(
            [
                'title' => 'Gesbroy',
                'ilvl' => 600,
                'mokokosTotal' => 9,
                'soulType' => 'Una\'s Task',
                'islandType' => 'None']
        );

        DB::table('islands')->insert(
            [
                'title' => 'Gesbroy',
                'ilvl' => 600,
                'mokokosTotal' => 9,
                'soulType' => 'Una\'s Task',
                'islandType' => 'None']
        );
        DB::table('islands')->insert(
            [
                'title' => 'Giant Mushroom Island',
                'ilvl' => 250,
                'mokokosTotal' => 4,
                'soulType' => 'RNG [Non-Combat]',
                'islandType' => 'None']
        );
        DB::table('islands')->insert(
            [
                'title' => 'Glacier Isle',
                'ilvl' => 250,
                'mokokosTotal' => 3,
                'soulType' => 'Quest',
                'islandType' => 'None']
        );
        DB::table('islands')->insert(
            [
                'title' => 'Goblin Island',
                'ilvl' => 460,
                'mokokosTotal' => 5,
                'soulType' => 'RNG [Non-Combat]',
                'islandType' => 'None']
        );
        DB::table('islands')->insert(
            [
                'title' => 'Golden Wave Island',
                'ilvl' => 250,
                'mokokosTotal' => 2,
                'soulType' => 'RNG [Non-Combat]',
                'islandType' => 'None']
        );
        DB::table('islands')->insert(
            [
                'title' => 'Gravis',
                'ilvl' => 460,
                'mokokosTotal' => 4,
                'soulType' => 'Quest',
                'islandType' => 'None']
        );
        DB::table('islands')->insert(
            [
                'title' => 'Harmony Island',
                'ilvl' => 250,
                'mokokosTotal' => 3,
                'soulType' => 'RNG [Non-Combat]',
                'islandType' => 'Compass']
        );
        DB::table('islands')->insert(
            [
                'title' => 'Hope Island',
                'ilvl' => 460,
                'mokokosTotal' => 3,
                'soulType' => 'Quest',
                'islandType' => 'None']
        );
        DB::table('islands')->insert(
            [
                'title' => 'Hypno\'s Eyes',
                'ilvl' => 460,
                'mokokosTotal' => 5,
                'soulType' => 'Rapport',
                'islandType' => 'None']
        );
    }
}
