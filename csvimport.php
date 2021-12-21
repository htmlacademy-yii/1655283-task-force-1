<?php
require_once "vendor/autoload.php";


use Classes\ContactsImporterSpl as CIS;

$filename = 'data/cities.csv';

$columns = array('city','lat','long');

$columnsDB = array('city','lat','long');

$tab = 'cities';

foreach($columnsDB As $k=>$v)
{
    $cols .= ",`$v`";
}


try {

$object = new CIS($filename, $columns);

foreach($object->import()->getData() As $id=>$terms)
{

$id++;

$sql .= "INSERT INTO `$tab` (`id`$cols) VALUES('$id'";

    foreach($terms As $iid=>$value)
    {
        if($columnsDB[$iid] == 'password') { $value = md5($value); }

        $sql .= ",'$value'";
    }

$sql .= ");<br>";

}

echo $sql;


} catch(\Exception | \Error $error) {

            echo "<PRE>";
            print_r([
                'error_message' => $error->getMessage(),
                'error_file' => $error->getFile(),
                'error' => $error->getLine()
            ]);
            echo "</PRE>";

} finally {

}


?>
