<?php
namespace Classes\Show;

require_once "vendor/autoload.php";

$object = new show_actions(10,20);

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
