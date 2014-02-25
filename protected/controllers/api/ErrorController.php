<?php
Yii::import('application.controllers.api.ApiController');


class ErrorController extends ApiController {
    public function actionIndex() {
        if($error=Yii::app()->errorHandler->error)  {
            echo json_encode(
                ['error' => [
                    'message' => $error['message'],
                    'code'    => $error['code']
                ]
            ]);
        }
    }
}