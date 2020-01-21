<?php

use Illuminate\Database\Seeder;

class CostoTableSeeder extends Seeder
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
        DB::table('costos')->insert( [ // N.1
            'name' => 'Mano de Obra Directa',
            'note' => 'Pre-registro',
            'created_at' => $current_timestamp,
            'updated_at' => $current_timestamp
        ] );
        DB::table('costos')->insert( [ // N.2
            'name' => 'Mano de Obra Indirecta',
            'note' => 'Pre-registro',
            'created_at' => $current_timestamp,
            'updated_at' => $current_timestamp
        ] );
        DB::table('costos')->insert( [ // N.3
            'name' => 'Mano de Obra Sub Contratada',
            'note' => 'Pre-registro',
            'created_at' => $current_timestamp,
            'updated_at' => $current_timestamp
        ] );
        DB::table('costos')->insert( [ // N.4
            'name' => 'Alimentacion',
            'note' => 'Pre-registro',
            'created_at' => $current_timestamp,
            'updated_at' => $current_timestamp
        ] );
        DB::table('costos')->insert( [ // N.5
            'name' => 'Agroquimicos',
            'note' => 'Pre-registro',
            'created_at' => $current_timestamp,
            'updated_at' => $current_timestamp
        ] );
        DB::table('costos')->insert( [ // N.6
            'name' => 'Materiales Generales',
            'note' => 'Pre-registro',
            'created_at' => $current_timestamp,
            'updated_at' => $current_timestamp
        ] );
        DB::table('costos')->insert( [ // N.7
            'name' => 'Herramientas',
            'note' => 'Pre-registro',
            'created_at' => $current_timestamp,
            'updated_at' => $current_timestamp
        ] );
        DB::table('costos')->insert( [ // N.8
            'name' => 'Combustibles y Lubricantes',
            'note' => 'Pre-registro',
            'created_at' => $current_timestamp,
            'updated_at' => $current_timestamp
        ] );
        DB::table('costos')->insert( [ // N.9
            'name' => 'Mantenimiento de Equipos',
            'note' => 'Pre-registro',
            'created_at' => $current_timestamp,
            'updated_at' => $current_timestamp
        ] );
        DB::table('costos')->insert( [ // N.10
            'name' => 'Equipos de Proteccion',
            'note' => 'Pre-registro',
            'created_at' => $current_timestamp,
            'updated_at' => $current_timestamp
        ] );
        DB::table('costos')->insert( [ // N.11
            'name' => 'Depreciacion y Amortizacion',
            'note' => 'Pre-registro',
            'created_at' => $current_timestamp,
            'updated_at' => $current_timestamp
        ] );
        DB::table('costos')->insert( [ // N.12
            'name' => 'Mantenimiento de Maquinaria',
            'note' => 'Pre-registro',
            'created_at' => $current_timestamp,
            'updated_at' => $current_timestamp
        ] );
        DB::table('costos')->insert( [ // N.13
            'name' => 'Energia Electrica',
            'note' => 'Pre-registro',
            'created_at' => $current_timestamp,
            'updated_at' => $current_timestamp
        ] );
        DB::table('costos')->insert( [ // N.14
            'name' => 'Servicio de Beneficiado',
            'note' => 'Pre-registro',
            'created_at' => $current_timestamp,
            'updated_at' => $current_timestamp
        ] );
        DB::table('costos')->insert( [ // N.15
            'name' => 'Servicio de Hospedaje',
            'note' => 'Pre-registro',
            'created_at' => $current_timestamp,
            'updated_at' => $current_timestamp
        ] );
    }
}
