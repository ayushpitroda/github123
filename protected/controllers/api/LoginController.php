<?php
Yii::import('application.controllers.api.ApiController');

/**
 * Dumps all the data for the user
 */
class LoginController extends ApiController
{
    public function filters() {
        return array('ApiAuth');
    }

    public function apiAuthRules() {
        return array(
            array( //make sure authentication is required on all other actions
                'authenticate',
            ),
        );
    }

    public function actionIndex()
	{
        $result = array();
        $result['ETS_PROPERTY'] = getAllAsArray('ETSProperty', ['USER_ID' => Yii::app()->user->id]);
        $result['ETS_ROOMS'] = getAllAsArray('ETSROOMS');
        $result['ETS_COMMENTS'] = getAllAsArray('COMMENTS');
        $result['TESTS'] = getAllAsArray('TESTS');
        $result['COMMENTS_LOC'] = getAllAsArray('COMMENTLOC');
        return $this->printResult($result);
	}


}