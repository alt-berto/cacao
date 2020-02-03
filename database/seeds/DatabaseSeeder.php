<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call( UsersTableSeeder::class );
        $this->call( UnidadProductivaTableSeeder::class );
        $this->call( TypesTableSeeder::class );
        $this->call( SectorTableSeeder::class );
        $this->call( CostoTableSeeder::class );
        $this->call( EtapasTableSeeder::class );
    }
}
