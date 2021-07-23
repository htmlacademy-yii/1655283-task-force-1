<?php
require_once "classes/show_actions.php";

$object = new show_actions();

echo "status new:".$object->getStatus('new')."<br>";
echo "action response:".$object->getAction('response')."<br>";
echo "new-response:".$object->getNextStatus('new','response')."<br>";


?>
