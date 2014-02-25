<?php

/**
 * This is the model class for table "q_roles_rights".
 *
 * The followings are the available columns in table 'q_roles_rights':
 * @property integer $rr_id
 * @property integer $right_id
 * @property integer $role_id
 * @property integer $user_id
 * @property string $date_added
 */
class QRolesRights extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return QRolesRights the static model class
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
		return 'q_roles_rights';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('right_id, role_id, user_id', 'numerical', 'integerOnly'=>true),
			array('date_added', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('rr_id, right_id, role_id, user_id, date_added', 'safe', 'on'=>'search'),
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
			'rr_id' => 'Rr',
			'right_id' => 'Right',
			'role_id' => 'Role',
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

		$criteria=new CDbCriteria;

		$criteria->compare('rr_id',$this->rr_id);
		$criteria->compare('right_id',$this->right_id);
		$criteria->compare('role_id',$this->role_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('date_added',$this->date_added,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}