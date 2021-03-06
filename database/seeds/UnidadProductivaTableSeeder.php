<?php

use Illuminate\Database\Seeder;

class UnidadProductivaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $current_timestamp = date('Y-m-d H:i:s');
        //
        DB::table('unidad_productivas')->insert( [ // N.1
            'name' => 'Buena Vista',
            'size' => 100,
            'note' => 'Pre-registro',
            'created_at' => $current_timestamp,
            'updated_at' => $current_timestamp
        ] );
        DB::table('unidad_productivas')->insert( [ // N.2
            'name' => 'Cosecha de Muestreo',
            'size' => 100,
            'note' => 'Pre-registro',
            'created_at' => $current_timestamp,
            'updated_at' => $current_timestamp
        ] );
        DB::table('unidad_productivas')->insert( [ // N.3
            'name' => 'El Comando',
            'size' => 100,
            'note' => 'Pre-registro',
            'created_at' => $current_timestamp,
            'updated_at' => $current_timestamp
        ] );
        DB::table('unidad_productivas')->insert( [ // N.4
            'name' => 'El Tigre',
            'size' => 100,
            'note' => 'Pre-registro',
            'created_at' => $current_timestamp,
            'updated_at' => $current_timestamp
        ] );
        DB::table('unidad_productivas')->insert( [ // N.5
            'name' => 'La Central',
            'size' => 100,
            'note' => 'Pre-registro',
            'created_at' => $current_timestamp,
            'updated_at' => $current_timestamp
        ] );
        DB::table('unidad_productivas')->insert( [ // N.6
            'name' => 'Los Andes',
            'size' => 100,
            'note' => 'Pre-registro',
            'created_at' => $current_timestamp,
            'updated_at' => $current_timestamp
        ] );
        DB::table('unidad_productivas')->insert( [ // N.7
            'name' => 'Vivero',
            'size' => 100,
            'note' => 'Pre-registro',
            'created_at' => $current_timestamp,
            'updated_at' => $current_timestamp
        ] );
        DB::table('unidad_productivas')->insert( [ // N.8
            'name' => 'Waspon',
            'size' => 100,
            'note' => 'Pre-registro',
            'created_at' => $current_timestamp,
            'updated_at' => $current_timestamp
        ] );
    }
}
