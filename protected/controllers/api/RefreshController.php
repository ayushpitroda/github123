<?php

Yii::import('application.controllers.api.ApiController');


class RefreshController extends ApiController {
    public function actionIndex($date) {
        $tableSchema = ETSProperty::model()->getTableSchema();
        $criteria = new CDbCriteria();
        $criteria->condition = '(`USER_ID`=:user) AND (`LASTUPDDTTM` > :modified)';
        $criteria->params = array(':modified' => $date, ':user' => Yii::app()->user->id);
        $command = ETSProperty::model()->getCommandBuilder()->createFindCommand($tableSchema, $criteria);
        $result = array();
        $result['LASTMDDTTM'] = date('Y-m-d H:i:s');

        $result['ETS_PROPERTY'] = $command->queryAll();

        if (!empty($result['ETS_PROPERTY'])) {
            $ids = [];
            foreach ($result['ETS_PROPERTY'] as $property) {
                $ids[] = $property->PROPERTY_ID;
            }

            $result['ETS_OBSERVATIONS'] = getAllAsArray('ETSObservation', ['PROPERTY_ID' => $ids]);

            $result['ETS_OBSERV_PHOTOS'] = getAllAsArray('ETSObsPhoto', ['PROPERTY_ID' => $ids]);

            $result['ETS_COMMENTS'] = getAllAsArray('ETSProComment', ['PROPERTY_ID' => $ids]);

            $result['ETS_ROOM_TESTS'] = getAllAsArray('ETSRoomTest', ['PROPERTY_ID' => $ids]);

            $result['ETS_ESTIMATE'] = getAllAsArray('ETSEstimate', ['PROPERTY_ID' => $ids]);

            $result['ETS_ESTIMATE_DTL'] = getAllAsArray('ETSEstimateDtl', ['PROPERTY_ID' => $ids]);
        }

        $result['REPORTS'] = getAllAsArray('ReportTemplate',[] , $date);
        $result['ETS_COMMENTS_CFG'] = getAllAsArray('COMMENTS',[] , $date);
        $result['ETS_ROOM_CFG'] = getAllAsArray('ETSROOMS',[] , $date);
        $result['ETS_TEST_CFG'] = getAllAsArray('TESTS',[] , $date);
        $result['ETS_USER'] = getAllAsArray('Users',['id' => Yii::app()->user->id] , $date);


        $this->printResult($result);
    }
} 