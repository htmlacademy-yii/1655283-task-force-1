<?php
require_once "vendor/autoload.php";


use Classes\ContactsImporterSpl as CIS;

$filename = 'data/cities.csv';

$columns = array('city','lat','long');

try {

$object = new CIS($filename, $columns);

$array = $object->import();
echo "<PRE>";
print_r($array);
echo "</PRE>";

} catch(\Exception | \Error $error) {

            echo "<PRE>";
            print_r([
                'error_message' => $error->getMessage(),
                'error_file' => $error->getFile(),
                'error' => $error->getLine()
            ]);
            echo "</PRE>";

}


?>
