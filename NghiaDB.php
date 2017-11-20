<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Nghia
 *
 * @author spj1
 */
class NghiaDB extends  CActiveRecord 
{
    //on data demo_table
    public $id;
    public $name;
    public $phone;
    public $address;
    public $gender;
    public $dob; 
    
    const TYPE_HOME_TOP = 1;
    const TYPE_PRODUCT_LIST = 2;
    
    /**
     * @Author: ANH DUNG Feb 24, 2016
     * @Todo: get array dropdown
     */
    public function getArrayType() {
        return array(
            MuradBanner::TYPE_HOME_TOP => "Home Top",
            MuradBanner::TYPE_PRODUCT_LIST => "Product List",
        );
    }
        
    
    public function tableName()
    {
        return '{{_nghia}}';
    }
    
    public function rules()
    {
        return array(
            array('name,gender', 'required', 'on'=>'create,update'),
            array('id, name, phone, address, dob, gender', 'safe'),
            
        );
    }
    
    public function search()
    {
        $criteria=new CDbCriteria;
        $criteria->compare('t.id',$this->id);
        $criteria->compare('t.name',$this->name,true);
        $criteria->compare('t.phone',$this->phone,true);
        $criteria->compare('t.address',$this->address,true);
        $criteria->compare('t.dob',$this->dob,true);
        $criteria->compare('t.gender',$this->gender,true);
        $criteria->order = "t.id DESC";
        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
            'pagination'=>array(
                'pageSize'=> Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']),
            ),
        ));
    }
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
    
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'name' => 'ho ten',
            'phone' => 'dien thoai',
            'address'=>'dia chi',
            'dob'=>'day of birth',
            'gender'=>'gioi tinh',
        );
    }
    
    public function relations()
    {
        return array(
        );
    }
    
    public function defaultScope()
    {
        return array();
    }
    
    protected function beforeDelete() {
        return parent::beforeDelete();
    }
}
