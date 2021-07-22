<?php
class show_actions {

 const STATUS_NEW = 'new';
 const STATUS_PROCESS = 'process';
 const STATUS_CANCELED = 'canceled';
 const STATUS_COMPLETED = 'completed';
 const STATUS_FAILED = 'failed';

 // const ACTION_CREATE = 'add';
 const ACTION_CANC = 'cancellation';
 const ACTION_FINISH = 'finish';
 const ACTION_RESPONSE = 'response';
 const ACTION_REFUSAL = 'refusal';
 // const ACTION_DEL = 'delete';
 // const ACTION_UPD = 'update';

 public current_status = false; // ???
 public customerId = 0; // ???
 public clientId = 0; // ???

 public function getNextStatus($current_status, $action) {
    if($current_status == STATUS_NEW) {
        if($action == ACTION_CANC) {     return STATUS_CANCELED; }
        if($action == ACTION_RESPONSE) { return STATUS_PROCESS; }
    }
    if($current_status == STATUS_PROCESS) {
        if($action == ACTION_FINISH) {   return STATUS_COMPLETED; }
        if($action == ACTION_REFUSAL) {  return STATUS_FAILED; }
    }
 }
 public function getActions($current_status, $clicus = 'customer') {
    if($clicus == 'customer') {
    if($current_status == STATUS_NEW) {
        return array(STATUS_CANCELED);
     }
     if($current_status == STATUS_PROCESS) {
        return array(STATUS_COMPLETED);
     }
     if($current_status == STATUS_CANCELED) {
        return false;
     }
     if($current_status == STATUS_COMPLETED) {
        return false;
     }
     if($current_status == STATUS_FAILED) {
        return false;
     }
    }
    if($clicus == 'client') {
    if($current_status == STATUS_NEW) {
        return array(STATUS_PROCESS);
     }
     if($current_status == STATUS_PROCESS) {
        return array(STATUS_FAILED); // STATUS_COMPLETE ???
     }
     if($current_status == STATUS_CANCELED) {
        return false;
     }
     if($current_status == STATUS_COMPLETED) {
        return false;
     }
     if($current_status == STATUS_FAILED) {
        return false;
     }
    }
 }




}

?>
