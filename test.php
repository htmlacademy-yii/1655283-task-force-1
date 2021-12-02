<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require_once "vendor/autoload.php";

use Classes\Actions;

use Classes\tests\TestAutoload;

$object = new Actions(10,20);

$object2 = new testAutoload();

echo "testAutoload:".$object2->test();

$object2 = new testAutoload();

echo "testAutoload:".$object2->test();


 try {
        echo "status new:".$object->getStatus('new')."<br>";
        echo "action response:".$object->getAction('cancellation')."<br>";
        echo "new-response:".$object->getNextStatus('456','response2')."<br>";
        echo "a-client:".$object->getActionsClient('new46')."<br>";
        } catch (\Exception | \Error $error) {
            echo "<PRE>";
            print_r([
                'error_message' => $error->getMessage(),
                'error_file' => $error->getFile(),
                'error' => $error->getLine()
            ]);
            echo "</PRE>";
        }



?>
