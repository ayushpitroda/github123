<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class RegisterForm extends CFormModel
{
	public $email_address;
	public $password;
	public $rememberMe;
        public $password2;
	private $_identity;
        
	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	 public function rules() {
        return array(
            // username and password are required
            array('email_address,password,password2,first_name,last_name,address,city,state,zip,mobile', 'required'),
            // rememberMe needs to be a boolean
            array('rememberMe', 'boolean'),
            // password needs to be authenticated
            //array('password', 'authenticate'),
            array('password', 'compare', 'compareAttribute' => 'password2'),
        );
    }

}