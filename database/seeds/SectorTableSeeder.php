<?php

use Illuminate\Database\Seeder;
use App\Models\Type;
use App\Models\UnidadProductiva;

class SectorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $sony = UnidadProductiva::where( 'name', 'Buena Vista' )->firstOrFail(  );
        $type = Type::where( 'name', 'Criollo' )->firstOrFail(  );
        $current_timestamp = date('Y-m-d H:i:s');
        //
        DB::table('sectores')->insert( [ // N.1
            'name' => 'Sector N. 1',
            'unidad_productiva_id' => $sony->id,
            'type_id' => $type->id,
            'size' => 10,
            'note' => 'Pre-registro',
            'created_at' => $current_timestamp,
            'updated_at' => $current_timestamp
        ] );
        DB::table('sectores')->insert( [ // N.2
            'name' => 'Sector N. 2',
            'unidad_productiva_id' => $sony->id,
            'type_id' => $type->id,
            'size' => 15,
            'note' => 'Pre-registro',
            'created_at' => $current_timestamp,
            'updated_at' => $current_timestamp
        ] );
        DB::table('sectores')->insert( [ // N.3
            'name' => 'Sector N. 3',
            'unidad_productiva_id' => $sony->id,
            'type_id' => $type->id,
            'size' => 20,
            'note' => 'Pre-registro',
            'created_at' => $current_timestamp,
            'updated_at' => $current_timestamp
        ] );
    }
}
