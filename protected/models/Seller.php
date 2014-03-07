<?php

Yii::import('application.models._base.BaseUsers');

class Seller extends BaseUsers {

    //public $gov_auth_number;
    //public $rememberMe;
    //public $message;
    //public $test;
    public $type;
    public $message;
    public $email_address;
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    public function rules() {
        return array(
            // username and password are required
            array('email_address,first_name,mobile', 'required'),
            //array('password, password2', 'required', 'on' => 'insert'),
            //array('password', 'compare', 'compareAttribute' => 'password2', "on" => "insert" ),
            array('first_name','match','pattern'=>'/^[a-zA-Z\s]+$/','message'=>'Lastname should be charecter'),
            array('email_address','email','message'=>'Enter valid Email address'),
            array('fax,phone,zip', 'match', 'pattern'=>'/^[0-9-()\s+]{10}$/'),
            // rememberMe needs to be a boolean
            //array('rememberMe', 'boolean'),
            // password needs to be authenticated
            //array('password', 'authenticate'),

        );

    }

    public function attributeLabels() {
		return array(
			'email_address' => "Email Address",
			'first_name' => "Contact Name",
			'mobile' => "Mobile",
			'gov_auth_number' => "MC Number",
		);
	}

        public function getUser($email)
    {
        $criteria = new CDbCriteria();
        $criteria->condition = 'email_address=:email_address';
        $criteria->params = array(':email_address'=>$email);
        return Seller::model()->find($criteria);

    }

    public function checkMail($email_address)
    {
        $criteria = new CDbCriteria();
        $criteria->condition = 'email_address=:email_address';
        $criteria->params = array(':email_address'=>$email_address);
        return Buyer::model()->find($criteria);
    }
    /*
     *
     */
    /*public function getUser($email)
    {
        $criteria = new CDbCriteria();
        $criteria->condition = 'email_address=:email_address';
        $criteria->params = array(':email_address'=>$email);
        return Buyer::model()->find($criteria);

    }*/
}
