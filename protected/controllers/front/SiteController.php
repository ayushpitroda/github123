<?php

class SiteController extends Controller {

    /**
     * Declares class-based actions.
     */
    public $layout = 'column1';
    

    public function actions() {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex() {

        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        $this->render('index');
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    /**
     * Displays the contact page
     */
    public function actionContact() {
        $model = new ContactForm;
        if (isset($_POST['ContactForm'])) {
            $model->attributes = $_POST['ContactForm'];
            if ($model->validate()) {
                $name = '=?UTF-8?B?' . base64_encode($model->name) . '?=';
                $subject = '=?UTF-8?B?' . base64_encode($model->subject) . '?=';
                $headers = "From: $name <{$model->email}>\r\n" .
                        "Reply-To: {$model->email}\r\n" .
                        "MIME-Version: 1.0\r\n" .
                        "Content-Type: text/plain; charset=UTF-8";

                mail(Yii::app()->params['adminEmail'], $subject, $model->body, $headers);
                Yii::app()->user->setFlash('contact', 'Thank you for contacting us. We will respond to you as soon as possible.');
                $this->refresh();
            }
        }
        $this->render('contact', array('model' => $model));
    }

    /**
     * Displays the login page
     */
    public function actionLogin() {
        $model = new LoginForm;

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login())
                $this->redirect(Yii::app()->user->returnUrl);
        }
        // display the login form
        $this->render('login', array('model' => $model));
    }

    public function actionRegister() {

        //$this->layout = "login";
       if($_GET['type']=='Buyer')
       {
        $model = new Buyer;
        //$newUser = new User;
        $model->type = $_GET['type'];
        $model->activation_code = sha1(mt_rand(10000, 99999) . time() . $model->email_address);
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'register-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
          

        if (isset($_POST['Buyer'])) {
            $model->attributes = $_POST['Buyer'];
         
            // validate user input and redirect to the previous page if valid
            if ($model->validate()) {
               if(Buyer::model()->checkMail($_POST['Buyer']['email_address'])== null)
               {
                   $model->user_type="buyer";
                if ($model->save()) {
                    $activation_url = Yii::app()->createAbsoluteUrl('site/Activate', array('key' => $model->activation_code, 'email' => $model->email_address,'type'=>'buyer'));
               // echo $activation_url;exit;
                    $to = $model->email_address;
                    $headers = 'MIME-Version: 1.0' . "\r\n";
                    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                    $headers .= 'From:iliyas' . "\r\n";

                    $subject2 = "Your Activation Link";

                    $message2 = "<html><body><h4>Hi, ".$_POST['Buyer']['first_name']."!</h4><br><h4>Welcome to New Loads Jobs!</h4><br><h5>To activate your account</h5><br>Please click this below to activate your membership<br /><a href='".$activation_url."'>" .
                                $activation_url."
                               </a> </body></html>";
                    mail($to, $subject2, $message2, $headers);
                    Yii::app()->user->setFlash('success','Activation Link is send to your email id. Verify it to Activate your account');
                    $this->redirect(Yii::app()->homeUrl);
                }
               }
               else
               {
                    Yii::app()->user->setFlash('invalid','Email id is already registered');
                    $this->render('register', array('model' => $model));
               }
            }
        }
         $this->render('register', array('model' => $model));
       }
       elseif($_GET['type']=='Seller')
       {
       $model = new Seller;
       $model->type = $_GET['type'];
       
        $model->activation_code = sha1(mt_rand(10000, 99999) . time() . $model->email_address);
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'register-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
        
        if (isset($_POST['Seller'])) {
        
            $model->attributes = $_POST['Seller'];

            // validate user input and redirect to the previous page if valid
            if ($model->validate()) {
                $model->user_type="seller";
                 if(Seller::model()->checkMail($_POST['Seller']['email_address'])== null)
               {
                if ($model->save()) {
                    $activation_url = Yii::app()->createAbsoluteUrl('site/Activate', array('key' => $model->activation_code, 'email' => $model->email_address,'type'=>'seller'));
                   //echo $activation_url;exit;
                    $to = $model->email_address;
                    $headers = 'MIME-Version: 1.0' . "\r\n";
                    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                    $headers .= 'From:iliyas' . "\r\n";

                    $subject2 = "Your Activation Link";

                    $message2 = "<html><body><h4>Hi, ".$_POST['Seller']['first_name']."!</h4><br><h4>Welcome to New Loads Jobs!</h4><br><h5>To activate your account</h5><br>Please click this below link to activate your account<br /><a href='".$activation_url."'>" .
                                $activation_url."
                                </a></body></html>";
                    mail($to, $subject2, $message2, $headers);
                    Yii::app()->user->setFlash('success','Activation Link is send to your email id. Verify it to Activate your account');
                    $this->redirect(Yii::app()->homeUrl);
                }
               
            }
             else
               {
                    Yii::app()->user->setFlash('invalid','Email id is already registered');
                    $this->render('register', array('model' => $model));
               }
        }
       
       }
        $this->render('register', array('model' => $model));
       }
        else
        {
            $model = new LoginForm;
            $this->render('login', array('model' => $model));
        }
       
    }
    

    /*
      activation link Controller
     */

    public function actionActivate() {
        // $model = new Buyer;
        //$email_address = Yii::app()->request->getQuery('email');
        //$activation_code = Yii::app()->request->getQuery('key');
        if (isset($_GET['email']) && isset($_GET['key'])) {
            
            if($_GET['type']=="buyer")
            {
            $model = Buyer::model()->getUser($_GET['email']);
            $model->message = "Sucessfull! Your Email Id is now verified. Enjoy!";
            }
            elseif($_GET['type'] =="seller")
            {
               $model = Seller::model()->getUser($_GET['email']);
               $model->message = "Sucessfull! Your Email is now verified. You can login after admin activate you";
            }
            

            if (!empty($model)) {
                if ($model->activation_code === $_GET['key']) {
                    $model->activation_status = 1;
                    $model->validate();
                    $model->save();
                    Yii::app()->user->setFlash('success',$model->message);
                    $this->redirect(array('site/login'));
                }
            }
        
        $this->render('activate', array('model' => $model));
    }
    }
    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

}