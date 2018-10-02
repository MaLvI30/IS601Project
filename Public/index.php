<?php
main:: start();

class main {
    static public function start() {
        $records = csv::getRecords();
        $table = html::generateTable($records);
        system:: printPage($table);
    }
}
 class csv
 {
     static public function getRecords()
     {
         echo 'test';
     }
 }


 class html{

    static public function generateTable($records)
    {
        $table = $records;
        return $table;
    }

 }
 class system{
    
    static public function printPage($page)
    {
        echo $page;
    }

 }