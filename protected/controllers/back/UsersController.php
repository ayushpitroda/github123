<?php

class UsersController extends GxController {

    public $defaultAction = 'admin';

    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id, 'Users'),
        ));
    }

    public function actionCreate() {
        $model = new Users;


        if (isset($_POST['Users'])) {
            $model->setAttributes($_POST['Users']);

            if ($model->save()) {
                if (Yii::app()->getRequest()->getIsAjaxRequest())
                    Yii::app()->end();
                else
                    $this->redirect(array('view', 'id' => $model->id));
            }
        }

        $this->render('create', array('model' => $model));
    }

    public function actionUpdate($id) {
        $model = $this->loadModel($id, 'Users');


        if (isset($_POST['Users'])) {
            $model->setAttributes($_POST['Users']);

            if ($model->save()) {
                $this->redirect(array('view', 'id' => $model->id));
            }
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    public function actionDelete($id) {
        if (Yii::app()->getRequest()->getIsPostRequest()) {
            $this->loadModel($id, 'Users')->delete();

            if (!Yii::app()->getRequest()->getIsAjaxRequest())
                $this->redirect(array('admin'));
        } else
            throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
    }

  

    public function actionAdmin() {
        $model = new Users('search');
        $model->unsetAttributes();
        $data = Users::model()->getStatus();
        if (isset($_GET['Users']))
            $model->setAttributes($_GET['Users']);

        $this->render('admin', array(
            'model' => $model,
            'data' => $data,
        ));
    }

    public function actionUpdatestatus($id) {
        if (Yii::app()->getRequest()->getIsPostRequest()) {
            $model = $this->loadModel($id, 'Users');
            if (!empty($model) && sizeof($model) > 0) {
                if (!$model->password && $model->activation_status) {
                    $model->password = sha1(time() . mt_rand(1000, 9999) . $model->first_name);
                    
                    $to = $model->email_address;
                    $headers = 'MIME-Version: 1.0' . "\r\n";
                    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                    $headers .= 'From:iliyas' . "\r\n";

                    $subject2 = "Your Activation Link";

                    $message2 = "<html><body><h4>Hi, " . $_POST['Buyer']['first_name'] . "!</h4><br><h4>Welcome to New Loads Jobs!</h4><br><h5>To activate your account</h5><br>Please Login with<br />Username : " . $model->email_address . "<br>Password :" . $model->password . " </body></html>";

                    mail($to, $subject2, $message2, $headers);
                     
                } elseif ($model->password && $model->activation_status) {
                    $model->activation_status = 0;
                } else {
                    $model->activation_status = 1;
                }

                //echo $model->password;exit;

                $model->save();
            }

        if (!Yii::app()->getRequest()->getIsAjaxRequest())
            $this->redirect(array('admin'));
        else
            Yii::app()->end();
        } else
        throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
    }
    public function actionMcnumner($id) {
        if (Yii::app()->getRequest()->getIsPostRequest()) {
            $model = $this->loadModel($id, 'Users');

            
        if (!Yii::app()->getRequest()->getIsAjaxRequest())
            $this->redirect(array('admin'));
        else
            Yii::app()->end();
        } else
        throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
    }



}