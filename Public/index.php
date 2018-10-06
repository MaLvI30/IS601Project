<?php
main:: start("csv_project.csv");
class main
{
    static public function start(){

    }
}
class csv{
    static public function getRecords(){

        $file = fopen($filename,"r");
        $fields = array();
        $count = 0;

        while(! feof($file))
        {
            $record = fgetcsv($file);
            if ($count == 0) {
                $fields = $record;
            }
            else
            {
                $records[] = RecordFactory::create($fields, $record);
            }
            $count++;
        }
        fclose($file);
        return $records;

    }
}
class record{
    public function __construct(Array $fields = null, Array $values = null)
    {
        $record = array_combine($fields,$values);

        foreach ($record as $property => $value)
        {
            $this->createProperty($property, $value);
        }
    }
    public function createProperty($property,$value)
    {
        $this->{$property} = $value;
        $property = '<th>' .$property.'</th>';
        $value = '<td>' .$value.'</td>';
    }
}
class recordFactory{
    public static function create(Array $fields = null,Array $values = null){
        {
            $record = new record($fields,$values);

            return $record;
        }

    }
}
class html{
    static public function generateTable(){

    }
}
class system{
    static public function printPage(){

    }
}