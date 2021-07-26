<?php
class show_actions {

 const STATUS_NEW = 'new';
 const STATUS_PROCESS = 'process';
 const STATUS_CANCELED = 'canceled';
 const STATUS_COMPLETED = 'completed';
 const STATUS_FAILED = 'failed';

 const ACTION_CANC = 'cancellation';
 const ACTION_FINISH = 'finish';
 const ACTION_RESPONSE = 'response';
 const ACTION_REFUSAL = 'refusal';

 public function __construct() {
    $current_status = self::STATUS_NEW;
    $customerId = 0;
    $clientId = 0;
 }

  public function getStatus($status = 'all'){
    $array[self::STATUS_NEW] = "Новая заявка";
    $array[self::STATUS_PROCESS] = "В процессе";
    $array[self::STATUS_CANCELED] = "Отменена";
    $array[self::STATUS_COMPLETED] = "Выполнена";
    $array[self::STATUS_FAILED] = "Провалена";
    return $status === 'all' ? $array : $array[$status];
 }
 public function getAction($action = 'all'){
    $array[self::ACTION_CANC] = "Отменить заявку";
    $array[self::ACTION_FINISH] = "Завершить заявку";
    $array[self::ACTION_RESPONSE] = "Откликнуться";
    $array[self::ACTION_REFUSAL] = "Отказаться";
    return $action === 'all' ? $array : $array[$action];
 }

 public function getNextStatus($current_status, $action) {
    if($current_status === self::STATUS_NEW) {
        if($action === self::ACTION_CANC) {     return self::STATUS_CANCELED; }
        if($action === self::ACTION_RESPONSE) { return self::STATUS_PROCESS; }
    }
    if($current_status === self::STATUS_PROCESS) {
        if($action === self::ACTION_FINISH) {   return self::STATUS_COMPLETED; }
        if($action === self::ACTION_REFUSAL) {  return self::STATUS_FAILED; }
    }
 }

 public function getActions($current_status, $clicus = 'customer') {
    if($clicus === 'customer') {
    if($current_status === self::STATUS_NEW) {
        return array(self::STATUS_CANCELED);
     }
     if($current_status === self::STATUS_PROCESS) {
        return array(self::STATUS_COMPLETED);
     }
     if($current_status === self::STATUS_CANCELED) {
        return false;
     }
     if($current_status === self::STATUS_COMPLETED) {
        return false;
     }
     if($current_status === self::STATUS_FAILED) {
        return false;
     }
    }
    if($clicus == 'client') {
    if($current_status === self::STATUS_NEW) {
        return array(self::STATUS_PROCESS);
     }
     if($current_status === self::STATUS_PROCESS) {
        return array(self::STATUS_FAILED);
     }
     if($current_status === self::STATUS_CANCELED) {
        return false;
     }
     if($current_status === self::STATUS_COMPLETED) {
        return false;
     }
     if($current_status === self::STATUS_FAILED) {
        return false;
     }
    }
 }



}

?>
