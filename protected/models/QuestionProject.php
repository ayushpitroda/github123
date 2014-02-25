<?php

/**
 * This is the model class for table "question_project".
 *
 * The followings are the available columns in table 'question_project':
 * @property integer $project_id
 * @property string $project_name
 * @property integer $user_id
 * @property string $date_added
 */
class QuestionProject extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return QuestionProject the static model class
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
		return 'question_project';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id', 'numerical', 'integerOnly'=>true),
			array('project_name, date_added', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('project_id, project_name, user_id, date_added', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'project_id' => 'Project',
			'project_name' => 'Project Name',
			'user_id' => 'User',
			'date_added' => 'Date Added',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
        $uid=Yii::app()->user->id;
		
		
		$criteria=new CDbCriteria;
		/*if($uid!='1')
		{
         $criteria->addCondition("user_id='$uid'",'AND');
		}*/
		
		if(checkrightsfunc(1))
		{
	//	$criteria->compare('project_id',$this->project_id);
	//	$criteria->compare('project_name',$this->project_name,true);
	if($this->project_id!='') 
			 { 
			   $criteria->addInCondition('project_id', explode('|', $this->project_id));
			 } else
			 {
				$criteria->compare('project_id',$this->project_id);
			 }
			 
		 if($this->project_name!='')
		{
		
		      $request_project_name =  explode('|', $this->project_name);
	    	  foreach($request_project_name as $r_project_name) {
		      $criteria->compare('project_name', $r_project_name, true, 'OR');
	                                                  }
	    }else {	 
		
 	 	      $criteria->compare('project_name',$this->project_name,true);
	    }
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('date_added',$this->date_added,true);
		} else {
		
		$userdbsarray=userdetailsfetchfunc($uid);
	
/*	    $parent_user_id=$userdbsarray['parent_user_id'];
		
		if(($parent_user_id!='') &&  ($parent_user_id!='0'))
		{
		$criteria->addCondition("user_id in ('$uid',$parent_user_id)",'AND');
		} else
		{
		$criteria->addCondition("user_id='$uid'",'AND');
		}*/
		
		//$criteria->addCondition("invite_user_id like() ='$uid' ",'AND');
	//	$criteria->addCondition("invite_user_id like '%$uid%'",'OR');
		$criteria->addCondition("user_id='$uid' or  invite_user_id like '%$uid%' ",'AND');

		//$criteria->compare('project_id',$this->project_id);
		//$criteria->compare('project_name',$this->project_name,true);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('date_added',$this->date_added,true);
		
		if($this->project_id!='') 
			 { 
			   $criteria->addInCondition('project_id', explode('|', $this->project_id));
			 } else
			 {
				$criteria->compare('project_id',$this->project_id);
			 }
			 
		 if($this->project_name!='')
		{
		
		      $request_project_name =  explode('|', $this->project_name);
	    	  foreach($request_project_name as $r_project_name) {
		      $criteria->compare('project_name', $r_project_name, true, 'OR');
	                                                  }
	    }else {	 
		
 	 	      $criteria->compare('project_name',$this->project_name,true);
	    }
	
	
	
	
	
		}

	
		$sort = new CSort;
        $sort->defaultOrder = 'project_id  desc';

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