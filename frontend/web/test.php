<?php
// ini_set('error_reporting', E_ALL);
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);

require_once "../../vendor/autoload.php";

use Classes\Exceptions\MyException;
use Classes\Actions;

$object = new Actions(10,10,20);


 try {

        //echo "status new:".$object->getStatus('new')."<br>";
        echo "action response:".$object->getAction('finish')."<br>";
        //echo "new-response:".$object->getNextStatus('process','new')."<br>";
        //echo "a-client:".$object->getActionsClient('new')."<br>";
        }
        catch(MyException $e) {
            echo "MyExc:".$e->getMessage();
        }
         catch (\Exception | \Error $error) {
            echo "<PRE>";
            print_r([
                'error_message' => $error->getMessage(),
                'error_file' => $error->getFile(),
                'error' => $error->getLine()
            ]);
            echo "</PRE>";
        }





?>
