<?php

/**
 * This is the model base class for the table "users".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Users".
 *
 * Columns in table "users" available as properties of the model,
 * and there are no model relations.
 *
 * @property integer $id
 * @property string $email_address
 * @property string $password
 * @property string $first_name
 * @property string $last_name
 * @property string $address
 * @property string $city
 * @property string $state
 * @property string $country
 * @property integer $zip
 * @property integer $phone
 * @property integer $fax
 * @property integer $mobile
 * @property string $mobilecarrier
 * @property string $dot
 * @property string $user_type
 * @property string $last_login
 * @property string $updated
 * @property string $created
 * @property string $status
 * @property string $activation_code
 * @property integer $activation_status
 * @property integer $gov_auth_number
 *
 */
abstract class BaseUsers extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'users';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Users|Users', $n);
	}

	public static function representingColumn() {
		return 'email_address';
	}

	public function rules() {
		return array(
			array('gov_auth_number', 'required'),
			array('zip, phone, fax, mobile, activation_status, gov_auth_number', 'numerical', 'integerOnly'=>true),
			array('email_address, password, first_name, last_name, city, state, country, mobilecarrier, dot, status, activation_code', 'length', 'max'=>45),
			array('user_type', 'length', 'max'=>6),
			array('address, last_login, updated, created', 'safe'),
			array('email_address, password, first_name, last_name, address, city, state, country, zip, phone, fax, mobile, mobilecarrier, dot, user_type, last_login, updated, created, status, activation_code, activation_status', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, email_address, password, first_name, last_name, address, city, state, country, zip, phone, fax, mobile, mobilecarrier, dot, user_type, last_login, updated, created, status, activation_code, activation_status, gov_auth_number', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'email_address' => Yii::t('app', 'Email Address'),
			'password' => Yii::t('app', 'Password'),
			'first_name' => Yii::t('app', 'First Name'),
			'last_name' => Yii::t('app', 'Last Name'),
			'address' => Yii::t('app', 'Address'),
			'city' => Yii::t('app', 'City'),
			'state' => Yii::t('app', 'State'),
			'country' => Yii::t('app', 'Country'),
			'zip' => Yii::t('app', 'Zip'),
			'phone' => Yii::t('app', 'Phone'),
			'fax' => Yii::t('app', 'Fax'),
			'mobile' => Yii::t('app', 'Mobile'),
			'mobilecarrier' => Yii::t('app', 'Mobilecarrier'),
			'dot' => Yii::t('app', 'Dot'),
			'user_type' => Yii::t('app', 'User Type'),
			'last_login' => Yii::t('app', 'Last Login'),
			'updated' => Yii::t('app', 'Updated'),
			'created' => Yii::t('app', 'Created'),
			'status' => Yii::t('app', 'Status'),
			'activation_code' => Yii::t('app', 'Activation Code'),
			'activation_status' => Yii::t('app', 'Activation Status'),
			'gov_auth_number' => Yii::t('app', 'Gov Auth Number'),
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('email_address', $this->email_address, true);
		$criteria->compare('password', $this->password, true);
		$criteria->compare('first_name', $this->first_name, true);
		$criteria->compare('last_name', $this->last_name, true);
		$criteria->compare('address', $this->address, true);
		$criteria->compare('city', $this->city, true);
		$criteria->compare('state', $this->state, true);
		$criteria->compare('country', $this->country, true);
		$criteria->compare('zip', $this->zip);
		$criteria->compare('phone', $this->phone);
		$criteria->compare('fax', $this->fax);
		$criteria->compare('mobile', $this->mobile);
		$criteria->compare('mobilecarrier', $this->mobilecarrier, true);
		$criteria->compare('dot', $this->dot, true);
		$criteria->compare('user_type', $this->user_type, true);
		$criteria->compare('last_login', $this->last_login, true);
		$criteria->compare('updated', $this->updated, true);
		$criteria->compare('created', $this->created, true);
		$criteria->compare('status', $this->status, true);
		$criteria->compare('activation_code', $this->activation_code, true);
		$criteria->compare('activation_status', $this->activation_status);
		$criteria->compare('gov_auth_number', $this->gov_auth_number);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}