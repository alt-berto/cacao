<?php

use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(  )
    {
        //
        $current_timestamp = date('Y-m-d H:i:s');
        DB::table('types')->insert( [ // N.1
            'name' => 'Criollo',
            'note' => 'Pre-registro',
            'created_at' => $current_timestamp,
            'updated_at' => $current_timestamp
        ] );
    }
}
