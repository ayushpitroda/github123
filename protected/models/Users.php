<?php

Yii::import('application.models._base.BaseUsers');

class Users extends BaseUsers {

    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    public function attributeLabels() {
		return array(
			'gov_auth_number' => "MC Number",
		);
	}

    
    public function getStatus() {
        $url = Yii::app()->createUrl('/users/updatestatus', array('id' => $this->id));
        $options = array();
        $text = $this->activation_status && !$this->password==NULL? '<span  class="label label-success">Active</span>' : '<span class="label label-danger">Deactive</span>';
        $options = array(
            'onclick' => 'ajaxSetStatus(this, "users-grid"); return false;',
            'title'=>$this->activation_status && !$this->password==NULL? 'Click to deactive' : 'Click to active',
        );

        return '<div align="center">' . CHtml::link($text, $url, $options) . '</div>';
    }
    

}