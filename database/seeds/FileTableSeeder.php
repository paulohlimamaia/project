<?php

use Illuminate\Database\Seeder;

use App\Models\Files;

class FileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Files::create([
            'pathfile' => resource_path("dbf/SIM302.DBF"),
            'filename' => "SIM302.DBF",
            'type' => "DBF"
        ]);
    }
}
