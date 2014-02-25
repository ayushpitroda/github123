<?php

abstract class ApiController extends AController {

    public function init() {
        parent::init();
        Yii::app()->errorHandler->errorAction='api/error';
    }

    /**
     * @param $array array
     */
    protected  function printResult($array) {
        header('Content-type: application/json');
        echo json_encode(['success' => $array,'error' => 'null']);
        return;
    }

} 