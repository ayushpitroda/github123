<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $fname
 * @property string $lname
 * @property string $company
 * @property string $website
 * @property string $email
 * @property string $mobile
 * @property string $offphone
 * @property string $resphone
 * @property string $faxphone
 * @property string $address
 * @property string $city
 * @property string $state
 * @property string $country
 * @property string $pincode
 * @property string $question
 * @property string $answer
 * @property integer $role
 * @property string $mroles
 * @property string $shoproles
 * @property string $mlanguages
 * @property integer $enabled
 * @property integer $customers_default_address_id
 * @property integer $news_letter
 * @property string $account_created
 * @property integer $status
 * @property integer $group_id
 * @property integer $createdby
 * @property integer $createtime
 * @property string $salt
 */
class Users extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password,fname,lname,company', 'required'),
            array('LASTUPDDTTM', 'safe'),

            array('role, enabled, customers_default_address_id, news_letter, status, group_id, createdby, createtime', 'numerical', 'integerOnly'=>true),
			array('username', 'length', 'max'=>30),
			array('password, fname, lname, company, website, email, address, question, answer, mroles,role,shoproles,mlanguages,reg_options','length', 'max'=>255),
			array('mobile, offphone, resphone, faxphone', 'length', 'max'=>15),
			array('city, state', 'length', 'max'=>50),
			array('country', 'length', 'max'=>2),
			array('pincode', 'length', 'max'=>10),
			array('salt', 'length', 'max'=>32),

			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, password, fname, lname, company, website, email, mobile, offphone, resphone, faxphone, address, city, state, country, pincode, question, answer, role, mroles, shoproles, mlanguages, enabled, customers_default_address_id, news_letter, account_created, status, group_id, createdby, createtime, salt,reg_options,newsletter', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		'reg_options' => array(self::BELONGS_TO, 'QRegOptions', 'auto_id'),
		 'q_reg_options' => array(self::BELONGS_TO, 'QRegOptions', 'auto_id'),

		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Username',
			'password' => 'Password',
			'fname' => 'Fname',
			'lname' => 'Lname',
			'company' => 'Company',
			'website' => 'Website',
			'email' => 'Email',
			'mobile' => 'Mobile',
			'offphone' => 'Offphone',
			'resphone' => 'Resphone',
			'faxphone' => 'Faxphone',
			'address' => 'Address',
			'city' => 'City',
			'state' => 'State',
			'country' => 'Country',
			'pincode' => 'Pincode',
			'question' => 'Question',
			'reg_options' => 'Options',
			'answer' => 'Answer',
			'role' => 'Role',
			'mroles' => 'Mroles',
			'shoproles' => 'Shoproles',
			'mlanguages' => 'Mlanguages',
			'enabled' => 'Enabled',
			'customers_default_address_id' => 'Customers Default Address',
			'news_letter' => 'News Letter',
			'account_created' => 'Account Created',
			'status' => 'Status',
			'group_id' => 'Group',
			'createdby' => 'Createdby',
			'createtime' => 'Createtime',
			'salt' => 'Salt',
		);
	}
	
	// hash password
public function hashPassword($password, $salt)
{
//    return md5($salt.$password);
	return md5($password);
}
        
// password validation
public function validatePassword($password)
{
    return $this->hashPassword($password,$this->salt)===$this->password;
}
        
//generate salt
public function generateSalt()
{
    return uniqid('',true);
}
        
public function beforeValidate()
{
    $this->salt = $this->generateSalt();
    return parent::beforeValidate();
}
        
public function beforeSave()
{
    $this->password = $this->hashPassword($this->password, $this->salt);
    return parent::beforeSave();
}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		
		if($this->id!='') 
			 { 
			   $criteria->addInCondition('id', explode('|', $this->id));
			 } else
			 {
				$criteria->compare('id',$this->id);
			 } 
	  if($this->fname!='')
		{
		
		      $request_fname =  explode('|', $this->fname);
	    	  foreach($request_fname as $r_fname) {
		      $criteria->compare('fname', $r_fname, true, 'OR');
	                                                  }
	    }else {	 
		
 	 	      $criteria->compare('fname',$this->fname,true);
	    }		 
		
	if($this->lname!='')
		{
		
		      $request_lname =  explode('|', $this->lname);
	    	  foreach($request_lname as $r_lname) {
		      $criteria->compare('lname', $r_lname, true, 'OR');
	                                                  }
	    }else {	 
		
 	 	      $criteria->compare('lname',$this->lname,true);
	    }	
	if($this->company!='')
		{
		
		      $request_company =  explode('|', $this->company);
	    	  foreach($request_company as $r_company) {
		      $criteria->compare('company', $r_company, true, 'OR');
	                                                  }
	    }else {	 
		
 	 	      $criteria->compare('company',$this->company,true);
	    }	
	if($this->username!='')
		{
		
		      $request_username =  explode('|', $this->username);
	    	  foreach($request_username as $r_username) {
		      $criteria->compare('username', $r_username, true, 'OR');
	                                                  }
	    }else {	 
		
 	 	      $criteria->compare('username',$this->username,true);
	    }	
		
	if($this->email!='')
		{
		
		      $request_email =  explode('|', $this->email);
	    	  foreach($request_email as $r_email) {
		      $criteria->compare('email', $r_email, true, 'OR');
	                                                  }
	    }else {	 
		
 	 	      $criteria->compare('email',$this->email,true);
	    }					 
			
		

	//	$criteria->compare('id',$this->id);
	//	$criteria->compare('username',$this->username,true);
//		$criteria->compare('password',$this->password,true);
//		$criteria->compare('fname',$this->fname,true);
//		$criteria->compare('lname',$this->lname,true);
//		$criteria->compare('company',$this->company,true);
//		$criteria->compare('website',$this->website,true);
//		$criteria->compare('email',$this->email,true);
//		$criteria->compare('mobile',$this->mobile,true);
//		$criteria->compare('offphone',$this->offphone,true);
//		$criteria->compare('resphone',$this->resphone,true);
//		$criteria->compare('faxphone',$this->faxphone,true);
//		$criteria->compare('address',$this->address,true);
//		$criteria->compare('city',$this->city,true);
//		$criteria->compare('state',$this->state,true);
//		$criteria->compare('country',$this->country,true);
//		$criteria->compare('pincode',$this->pincode,true);
//		$criteria->compare('question',$this->question,true);
//		$criteria->compare('answer',$this->answer,true);
	//	$criteria->compare('role',$this->role);
		if($this->role!='')
		{
		$criteria->condition = "role like '%$this->role%'";
		}else {
		$criteria->compare('role',$this->role);
		}
	
		if($this->reg_options!='')
		{
		$criteria->condition = "reg_options like '%$this->reg_options%'";
		}else {
		$criteria->compare('reg_options',$this->reg_options);
		}
		
		//$criteria->compare('mroles',$this->mroles,true);
//		$criteria->compare('shoproles',$this->shoproles,true);
//		$criteria->compare('mlanguages',$this->mlanguages,true);
//		$criteria->compare('enabled',$this->enabled);
//		$criteria->compare('customers_default_address_id',$this->customers_default_address_id);
//		$criteria->compare('news_letter',$this->news_letter);
//		$criteria->compare('account_created',$this->account_created,true);
//		$criteria->compare('status',$this->status);
//		$criteria->compare('group_id',$this->group_id);
//		$criteria->compare('createdby',$this->createdby);
//		$criteria->compare('createtime',$this->createtime);
//		$criteria->compare('salt',$this->salt,true);

		$sort = new CSort;
        $sort->defaultOrder = 'id  desc';

		$data = new CActiveDataProvider(get_class($this), array(
                     'criteria'=>$criteria,
					 'pagination'=>array(
                     'pageSize'=> Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']),
            ),
						'sort' => $sort,
                ));
	
				
				
        return $data;
	}
}