<?php
set_include_path('classes');
spl_autoload_register();

$object = new show_actions(10,20);

echo "status new:".$object->getStatus('new')."<br>";
echo "action response:".$object->getAction('response')."<br>";
echo "new-response:".$object->getNextStatus('new','response')."<br>";


?>
