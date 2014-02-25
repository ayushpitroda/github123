<?php

Yii::import('application.controllers.api.ApiController');


class PropertyController extends ApiController {

    public function actionGet($id) {
        /**
         * @var $property ETSProperty
         */
        $property = ETSProperty::model()->findByPK($id);
        if (!$property or $property->USER_ID != Yii::app()->user->id) {
            throw new CHttpException(400,'ETS_PROPERTY hasn\'t been found.');
        }
        $result = $property->getEverythingAsArray();
        $this->printResult($result);
    }

    public function actionFind($query) {
        $tableSchema = ETSProperty::model()->getTableSchema();
        $criteria = new CDbCriteria();
        $criteria->condition = '(`USER_ID`=:user) AND (`PROP_STATUS` LIKE "C") AND (
            (`FIRST_NAME` LIKE :query) OR (`LAST_NAME` LIKE :query) OR (`CITY` LIKE  :query) OR (`ZIP` LIKE :query)
        ) ';
        $criteria->params = array(':query' => '%'.$query.'%', ':user' => Yii::app()->user->id);
        $command = ETSProperty::model()->getCommandBuilder()->createFindCommand($tableSchema, $criteria);

        $result = array('ETS_PROPERTY' => $command->queryAll());

        $this->printResult($result);

    }

    public function actionCreate() {

        if(isset($_POST['ETS_PROPERTY']))
        {
            unset($_POST['ETS_PROPERTY']['PROPERTY_ID']);

            $model = new ETSProperty();
            $model->attributes=$_POST['ETS_PROPERTY'];
            $model->USER_ID = Yii::app()->user->id;
            if ($model->save()) {
                $this->printResult(['ETS_PROPERTY' => ['PROPERTY_ID' => $model->PROPERTY_ID]]);
            } else {
                throw new CHttpException('400','Property cannot be saved.');
            }

        } else {
            throw new CHttpException('400','Input was not provided');
        }
    }

    public function actionCreateTest() {
        $this->render('test');
    }
}