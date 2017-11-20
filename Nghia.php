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
class Nghia extends CActiveRecord{
    //on data demo_table
    public $id;
    public $name;
    public $phone;
    public $address;
    public $gender;
    public $dob; 
    
        
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return '{{_nghia}}';
    }
    
    public function rules(){
        return array(
            array('name','required')
        );
    }
    
    public function search()
    {
        $criteria=new CDbCriteria;
//        $criteria->alias = 'nghia';
        $criteria->compare('t.id',$this->id);
        $criteria->compare('t.name',$this->name);
        $criteria->compare('t.phone',$this->phone);
        $criteria->compare('t.address',$this->address);
        $criteria->compare('t.dob',$this->dob);
        $criteria->compare('t.gender',$this->gender);
        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
            'pagination'=>array(
//                'pageSize'=> Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']),
                'pageSize'=> 50,
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
}
