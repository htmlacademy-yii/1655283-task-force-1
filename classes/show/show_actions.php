<?php


class show_actions {
 protected int $customerId;
 protected int $clientId;

 const STATUS_NEW = 'new';
 const STATUS_PROCESS = 'process';
 const STATUS_CANCELED = 'canceled';
 const STATUS_COMPLETED = 'completed';
 const STATUS_FAILED = 'failed';

 const ACTION_CANC = 'cancellation';
 const ACTION_FINISH = 'finish';
 const ACTION_RESPONSE = 'response';
 const ACTION_REFUSAL = 'refusal';

 public function __construct(int $customerId, int $clientId)
 {
     $this->customerId = $customerId;
     $this->clientId = $clientId;
 }

  public function getStatus($status = 'all'):string
  {
    $array[self::STATUS_NEW] = "Новая заявка";
    $array[self::STATUS_PROCESS] = "В процессе";
    $array[self::STATUS_CANCELED] = "Отменена";
    $array[self::STATUS_COMPLETED] = "Выполнена";
    $array[self::STATUS_FAILED] = "Провалена";
    return $array[$status];
 }
 public function getAction($action = 'all'):string
 {
    $array[self::ACTION_CANC] = "Отменить заявку";
    $array[self::ACTION_FINISH] = "Завершить заявку";
    $array[self::ACTION_RESPONSE] = "Откликнуться";
    $array[self::ACTION_REFUSAL] = "Отказаться";
    return $array[$action];
 }

 public function getNextStatus($current_status, $action):string
 {
    if($current_status === self::STATUS_NEW) {
        if($action === self::ACTION_CANC) {     return self::STATUS_CANCELED; }
        if($action === self::ACTION_RESPONSE) { return self::STATUS_PROCESS; }
    }
    if($current_status === self::STATUS_PROCESS) {
        if($action === self::ACTION_FINISH) {   return self::STATUS_COMPLETED; }
        if($action === self::ACTION_REFUSAL) {  return self::STATUS_FAILED; }
    }
 }

 public function getActionsCustomer($current_status):?string
 {
    if($current_status === self::STATUS_NEW) {
         return self::STATUS_CANCELED;
     }
     if($current_status === self::STATUS_PROCESS) {
         return self::STATUS_COMPLETED;
     }
     if($current_status === self::STATUS_CANCELED) {
        return null;
     }
     if($current_status === self::STATUS_COMPLETED) {
        return null;
     }
     if($current_status === self::STATUS_FAILED) {
        return null;
     }

}

public function getActionsClient($current_status):?string
{
    if($current_status === self::STATUS_NEW) {
         return self::STATUS_PROCESS;
     }
     if($current_status === self::STATUS_PROCESS) {
         return self::STATUS_FAILED;
     }
     if($current_status === self::STATUS_CANCELED) {
        return null;
     }
     if($current_status === self::STATUS_COMPLETED) {
        return null;
     }
     if($current_status === self::STATUS_FAILED) {
        return null;
     }

 }


}

?>
