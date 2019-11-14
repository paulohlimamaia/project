<?php

use Illuminate\Database\Seeder;

use App\Models\Siops;


class SiopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file = fopen(resource_path('docs/receitas.IMPT'), 'r');
        $arrFile = [];
        while (!feof($file)) {$arrFile[] = fgets($file);}
        fclose($file);

        foreach($arrFile as $line){
            $arrLine = explode(';', $line);

            if(!(sizeof($arrLine) > 1)){continue;}
            if($arrLine[1] === " "){continue;}

            Siops::create([
                'codigo' => $arrLine[1]
            ]);
            
        }
    }
}
