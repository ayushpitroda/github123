<?php

Yii::import('application.controllers.api.ApiController');


class VersionController extends ApiController {
    public function actionIndex() {
        $this->printResult(['version'=>'1.0.0']);
    }
} 