<?php
main::start("mini_project.csv");

class main
{
    static public function start($filename)
    {

        $records = csv::getRecords($filename);

        $table = html::generateTable($records);


    }
}

class html{

    public static function generateTable($records)
    {

        $count = 0;

        foreach ($records as $record)
        {

            if($count == 0)
            {
                $array = $records->returnArray();
                $fields = array_keys($array);
                $value = array_values($array);
                print_r($fields);
                print_r($value);
            }
            else {

                $array = $records->returnArray();

                $value = array_values($array);

                print_r($value);
            }
            $count++;
        }

    }

}

class csv{

    static public function getRecords($filename){


        $file = fopen($filename,"r");

        $fieldName= array();
        $count =0;

        while(! feof($file))
        {
            $record = fgetcsv($file);

            if($count == 0){
                $fieldName = $record;
            }
            else {

                $records[] = recordFactory::create($fieldName, $record);

            }
            $count++;
        }

        fclose($file);

        return $records;



    }

}

 class record{

    public function __construct(Array $fieldName = null, Array $value = null){


        $record = array_combine($fieldName, $value);
        foreach ($record as $property => $value)
        {

            $this->createProperty($property,$value);

        }
        print_r($this);

    }

    public function createProperty($name, $value)
    {
        $this->{$name} = $value;
    }



 }

 class recordFactory{

    public static function create(Array $fieldName = null, Array $value = null){

        $record = new record($fieldName, $value);

        return $record;

    }

 }