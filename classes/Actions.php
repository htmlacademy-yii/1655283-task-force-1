<?php
namespace Classes;

final class Actions {
 private int $customerId;
 private int $clientId;

 const STATUS_NEW = 'new';
 const STATUS_PROCESS = 'process';
 const STATUS_CANCELED = 'canceled';
 const STATUS_COMPLETED = 'completed';
 const STATUS_FAILED = 'failed';

 const ACTION_CANC = 'cancellation';
 const ACTION_FINISH = 'finish';
 const ACTION_RESPONSE = 'response';
 const ACTION_REFUSAL = 'refusal';

 const STAT_TYPES = [
    self::STATUS_NEW,
    self::STATUS_PROCESS,
    self::STATUS_CANCELED,
    self::STATUS_COMPLETED,
    self::STATUS_FAILED
 ];
 const ACT_TYPES = [
    self::ACTION_CANC,
    self::ACTION_FINISH,
    self::ACTION_RESPONSE,
    self::ACTION_REFUSAL
 ];

 public function __construct(int $customerId, int $clientId)
 {
     $this->customerId = $customerId;
     $this->clientId = $clientId;
 }

  public function getStatus(string $status = 'all'):?string
  {
    if(!in_array($status, self::STAT_TYPES)) {
        throw new \Exception("UNKNOWN STATUS '$status'");
    }
    $array[self::STATUS_NEW] = "Новая заявка";
    $array[self::STATUS_PROCESS] = "В процессе";
    $array[self::STATUS_CANCELED] = "Отменена";
    $array[self::STATUS_COMPLETED] = "Выполнена";
    $array[self::STATUS_FAILED] = "Провалена";
    return $array[$status];
 }
 public function getAction(string $action = 'all'):?string
 {
    if(!in_array($action, self::ACT_TYPES)) {
        throw new \Exception("UNKNOWN Action '$action'");
    }
    $array[self::ACTION_CANC] = "Отменить заявку";
    $array[self::ACTION_FINISH] = "Завершить заявку";
    $array[self::ACTION_RESPONSE] = "Откликнуться";
    $array[self::ACTION_REFUSAL] = "Отказаться";
    return $array[$action];
 }

 public function getNextStatus(string $current_status, string $action):?string
 {
    if(!in_array($current_status, self::STAT_TYPES)) {
        throw new \Exception("UNKNOWN CURRENT STATUS '$current_status'");
    }
    if(!in_array($action, self::STAT_TYPES)) {
        throw new \Exception("UNKNOWN ACTION '$action'");
    }
    if($current_status === self::STATUS_NEW) {
        if($action === self::ACTION_CANC) {     return self::STATUS_CANCELED; }
        if($action === self::ACTION_RESPONSE) { return self::STATUS_PROCESS; }
    }
    if($current_status === self::STATUS_PROCESS) {
        if($action === self::ACTION_FINISH) {   return self::STATUS_COMPLETED; }
        if($action === self::ACTION_REFUSAL) {  return self::STATUS_FAILED; }
    }
    return null;
 }

 public function getActionsCustomer(string $current_status):?string
 {
    if(!in_array($current_status, self::STAT_TYPES)) {
        throw new \Exception("UNKNOWN CURRENT STATUS '$current_status'");
    }
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

public function getActionsClient(string $current_status):?string
{
    if(!in_array($current_status, self::STAT_TYPES)) {
        throw new \Exception("UNKNOWN CURRENT STATUS '$current_status'");
    }
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
     return null;
 }


}

?>
