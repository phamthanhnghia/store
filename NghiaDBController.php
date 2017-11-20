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
class NghiaDBController extends AdminController{
    
    public $pluralTitle = "demo table";
    public $singleTitle = "bảng nghia";
    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    
    public function actionView($id)
    {
        $this->pageTitle = 'Xem table Nghia';
        try{
                $model = $this->loadModel($id);
                //$model->aModelDetail = $model->rDetail;
                //$model->mDetail = new Nghia();
            $this->render('view',array(
                    'model'=>$model, 'actions' => $this->listActionsCanAccess,
            ));
        }catch (Exception $exc)
        {
            GasCheck::CatchAllExeptiong($exc);
        }

    }
    
    public function actionCreate()
    {
        $this->pageTitle = 'Tạo Mới ';
            try
            {
            $model=new NghiaDB('create');

            if(isset($_POST['NghiaDB']))
            {
                $model->attributes=$_POST['NghiaDB'];
                $model->validate();
                if(!$model->hasErrors()){
                    $model->save();
                    Yii::app()->user->setFlash( MyFormat::SUCCESS_UPDATE, "Thêm mới thành công." );
                    $this->redirect(array('create'));
                }
            }

            $this->render('create',array(
                    'model'=>$model, 'actions' => $this->listActionsCanAccess,
            ));
            }
            catch (Exception $exc)
            {
                GasCheck::CatchAllExeptiong($exc);
            }
    }
    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id)
    {
        $this->pageTitle = 'Cập Nhật Nghia';
        try
        {
            $model=$this->loadModel($id);
            $model->scenario = 'update';
        if(isset($_POST['NghiaDB']))
        {
            $model->attributes=$_POST['NghiaDB'];
            $model->validate();
            if(!$model->hasErrors()){
                $model->update();
                Yii::app()->user->setFlash( MyFormat::SUCCESS_UPDATE, "Cập nhật thành công." );
                $this->redirect(array('update','id'=>$model->id));
            }							
        }

        $this->render('update',array(
                'model'=>$model, 'actions' => $this->listActionsCanAccess,
        ));
        }
        catch (Exception $exc)
        {
            GasCheck::CatchAllExeptiong($exc);
        }
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id)
    {
        try
        {
        if(Yii::app()->request->isPostRequest)
        {
                // we only allow deletion via POST request
                if($model = $this->loadModel($id))
                {
                    if($model->delete())
                        Yii::log("Uid: " .Yii::app()->user->id. " Delete record ".  print_r($model->attributes, true), 'info');
                }

                // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
                if(!isset($_GET['ajax']))
                        $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
        }
        else
        {
            Yii::log("Uid: " .Yii::app()->user->id. " Invalid request. Please do not repeat this request again.");
            throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
        }	
        }
        catch (Exception $exc)
        {
            GasCheck::CatchAllExeptiong($exc);
        }
    }

   public function actionIndex()
    {
        $this->pageTitle = 'Demo table nghia';
        try
        {
            $model=new NghiaDB('search');
            //$this->render('index');
            $this->render('index',array(
                'model'=>$model,'actions'=>$this->listActionsCanAccess,
            ));
        
        }catch (Exception $exc)
        {
            GasCheck::CatchAllExeptiong($exc);
        }
    }
    
    public function loadModel($id)
    {
        try
        {
            $model=NghiaDB::model()->findByPk($id);
        if($model===null)
        {
            Yii::log("The requested page does not exist.");
            throw new CHttpException(404,'The requested page does not exist.');
        }			
        return $model;
        }
        catch (Exception $exc)
        {
            GasCheck::CatchAllExeptiong($exc);
        }
    }
        /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        try
        {
        if(isset($_POST['ajax']) && $_POST['ajax']==='murad-banner-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
        }
        catch (Exception $exc)
        {
            GasCheck::CatchAllExeptiong($exc);
        }
    }

}
