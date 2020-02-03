<?php

use Illuminate\Database\Seeder;

class EtapasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //
        $current_timestamp = date('Y-m-d H:i:s');
        DB::table('etapas')->insert( [ // N.1
            'name' => 'Fermentado',
            'order' => 1,
            'note' => 'Pre-registro',
            'created_at' => $current_timestamp,
            'updated_at' => $current_timestamp
        ] );
        DB::table('etapas')->insert( [ // N.2
            'name' => 'Pre-Secado',
            'order' => 2,
            'note' => 'Pre-registro',
            'created_at' => $current_timestamp,
            'updated_at' => $current_timestamp
        ] );
        DB::table('etapas')->insert( [ // N.3
            'name' => 'Secado',
            'order' => 3,
            'note' => 'Pre-registro',
            'created_at' => $current_timestamp,
            'updated_at' => $current_timestamp
        ] );
        DB::table('etapas')->insert( [ // N.4
            'name' => 'Empaque',
            'order' => 4,
            'note' => 'Pre-registro',
            'created_at' => $current_timestamp,
            'updated_at' => $current_timestamp
        ] );
        DB::table('etapas')->insert( [ // N.4
            'order' => 5,
            'name' => 'Re-Proceso',
            'note' => 'Pre-registro',
            'created_at' => $current_timestamp,
            'updated_at' => $current_timestamp
        ] );
    }
}
