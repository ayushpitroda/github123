<?php
Yii::import('application.controllers.api.ApiController');

/**
 * Submit For Approval
 */

class SubmitController extends ApiController {
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

    public function actionIndex()  {
        if (!isset($_POST['ETS_PROPERTY']) or empty($_POST['ETS_PROPERTY'])) {
            throw new CHttpException(400,'ETS_PROPERTY hasn\'t been provided.');
        }
        header('Content-type: text/plain');

        $transaction = Yii::app()->db->beginTransaction();
        $files = []; // let's keep file names to delete all if transaction fails

        try
        {
            /***        PROPERTY
             * @var $property ETSProperty
             ***/
            $property = ETSProperty::model()->findByPK($_POST['ETS_PROPERTY']['PROPERTY_ID']);
            if (!$property) {
                throw new CHttpException(404,'ETS_PROPERTY hasn\'t been found.');
            }
            if ($property->USER_ID != Yii::app()->user->id) {
                throw new CHttpException(403,'The ETS_PROPERTY does not belong to the current user.');
            }

            $property->attributes=$_POST['ETS_PROPERTY'];
            $property_image = CUploadedFile::getInstanceByName('ETS_PROPERTY[PHOTO]');
            if ($property_image) {
                $property->PHOTO_URL = Yii::app()->params['imagesDir'] . DIRECTORY_SEPARATOR . 'property' . DIRECTORY_SEPARATOR. uniqid().'.jpg';
            }
            if ($property->save()) {
                 if ($property_image) {
                     $property_image->saveAs( Yii::getPathOfAlias('webroot') . $property->PHOTO_URL);
                     $files[] = Yii::getPathOfAlias('webroot') . $property->PHOTO_URL;
                 }
            } else {
                throw new CException('ETS_PROPERTY hasn\'t been saved.');
            }

            /***        OBSERVATIONS            ***/
            if (isset($_POST['ETS_OBSERVATIONS']) and !empty($_POST['ETS_OBSERVATIONS'])) {
                foreach ($_POST['ETS_OBSERVATIONS'] as $post_item) {
                    $observation = ETSObservation::model()->findByAttributes([
                                    'PROPERTY_ID'   => $post_item['PROPERTY_ID'],
                                    'ROOM_ID'       => $post_item['ROOM_ID'],
                                    'OBSERV_ID'     => $post_item['OBSERV_ID']
                    ]);
                    if (!$observation) {
                        $observation = new ETSObservation();
                    }
                    $observation->attributes = $post_item;
                    if (!$observation->save()) {
                        throw new CException('Observation '.$post_item['OBSERV_ID'].' couldn\'t be saved');
                    }
                }
            }

            /***        OBSERVATIONS' PHOTOS         ***/
            if (isset($_POST['ETS_OBSERV_PHOTOS']) and !empty($_POST['ETS_OBSERV_PHOTOS'])) {
                foreach ($_POST['ETS_OBSERV_PHOTOS'] as $i => $post_item) {
                    $photo = ETSObsPhoto::model()->findByAttributes([
                        'PROPERTY_ID'   => $post_item['PROPERTY_ID'],
                        'ROOM_ID'       => $post_item['ROOM_ID'],
                        'OBSERV_ID'     => $post_item['OBSERV_ID'],
                        'PHOTO_ID'      => $post_item['PHOTO_ID']
                    ]);
                    if (!$photo) {
                        $photo = new ETSObsPhoto();
                    }
                    $photo->attributes = $post_item;
                    $photo_img = CUploadedFile::getInstanceByName('ETS_OBSERV_PHOTOS['.$i.'][PHOTO]');
                    if ($photo_img) {
                        $photo->PHOTO_URL = Yii::app()->params['imagesDir'] . DIRECTORY_SEPARATOR . 'observ' . DIRECTORY_SEPARATOR. uniqid().'.jpg';
                    }
                    if ($photo->save()) {
                        if ($photo_img) {
                            $photo_img->saveAs( Yii::getPathOfAlias('webroot') . $photo->PHOTO_URL);
                            $files[] = Yii::getPathOfAlias('webroot') . $photo->PHOTO_URL;
                        }
                    }
                    else {
                            throw new CException('Photo '.$post_item['PHOTO_ID'].' couldn\'t be saved');
                        }
                }
            }

            /***      ETS_COMMENTS              ***/

            if (isset($_POST['ETS_COMMENTS']) and !empty($_POST['ETS_COMMENTS'])) {
                foreach ($_POST['ETS_COMMENTS'] as $post_item) {
                    $model = ETSProComment::model()->findByAttributes([
                        'PROPERTY_ID'   => $post_item['PROPERTY_ID'],
                        'ROOM_ID'       => $post_item['ROOM_ID'],
                        'OBSERV_ID'     => $post_item['OBSERV_ID'],
                        'COMMENT_ID'     => $post_item['COMMENT_ID'],
                        'LOCATION_ID'     => $post_item['LOCATION_ID']
                    ]);
                    if (!$model) {
                        $model = new ETSProComment();
                    }
                    $model->attributes = $post_item;
                    if (!$model->save()) {
                        throw new CException('Comment '.$post_item['COMMENT_ID'].' couldn\'t be saved');
                    }
                }
            }

            /***    ETS_ROOM_TESTS **/

            if (isset($_POST['ETS_ROOM_TESTS']) and !empty($_POST['ETS_ROOM_TESTS'])) {
                foreach ($_POST['ETS_ROOM_TESTS'] as $post_item) {
                    $model = ETSRoomTest::model()->findByAttributes([
                        'PROPERTY_ID'   => $post_item['PROPERTY_ID'],
                        'ROOM_ID'       => $post_item['ROOM_ID'],
                        'OBSERV_ID'     => $post_item['OBSERV_ID'],
                        'TEST_COUNTER'     => $post_item['TEST_COUNTER'],
                        'TEST_ID'     => $post_item['TEST_ID']
                    ]);
                    if (!$model) {
                        $model = new ETSRoomTest();
                    }
                    $model->attributes = $post_item;
                    if (!$model->save()) {
                        throw new CException('Room test '.$post_item['TEST_ID'].' couldn\'t be saved');
                    }
                }
            }

            $transaction->commit();
        }
        catch (Exception $e)
        {
            $transaction->rollback();
            foreach ($files as $file) {
                @unlink($file);
            }
            throw new CHttpException(500,$e->getMessage());
        }
        $this->printResult($property->getEverythingAsArray());
    }


    public function actionTest()  {
        $this->render('test');
    }
}
