<?php

use Illuminate\Database\Seeder;

use XBase\Table;
use App\Models\SIM302;


class SIM302TableSeeder extends Seeder
{
    protected $simTable;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->simTable = new Table(resource_path("dbf/SIM302.DBF"));

        while ($record = $this->simTable->nextRecord()) {

            $data = [];

            foreach($this->simTable->getColumns() as $colum){
                $data[$colum->name] = $record->getChar($colum->name);
            }

            SIM302::create($data);

        }
    }
}