<?php
namespace Classes;


abstract class ActionsControl {
    abstract protected function cancellation();
    abstract protected function finish();
    abstract protected function response();
    abstract protected function refusal();
}

