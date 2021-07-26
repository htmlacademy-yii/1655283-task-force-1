<?php

require_once "classes/show/show_actions.php";

$object = new show_actions(10,20);

echo "status new:".$object->getStatus('new')."<br>";
echo "action response:".$object->getAction('response')."<br>";
echo "new-response:".$object->getNextStatus('new','response')."<br>";
echo "a-client:".$object->getActionsClient('new')."<br>";


?>
