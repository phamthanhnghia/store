<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of NghiaController
 *
 * @author spj1
 */
class NghiaController extends AdminController{
    
    public $pluralTitle = "demo table";
    public function actionIndex()
    {
        $this->pageTitle = 'Demo table test';
        try
        {
        $model=new Nghia('search');
        //$this->ImportProduct($model);
        //$model->unsetAttributes();  // clear any default values
//        if(isset($_GET['MuradProduct']))
//                $model->attributes=$_GET['Nghia'];
//        var_dump($model);
            $this->render('index',array(
                'model'=>$model,
            ));
        
        }catch (Exception $exc)
        {
            GasCheck::CatchAllExeptiong($exc);
        }
    }
   
}
