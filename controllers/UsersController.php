<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Users;
use Exception;
use yii\widgets\ActiveForm;
use yii\web\UploadedFile;


class UsersController extends Controller{


    public function actionViewRegister(){
        $model = new Users();

        $form = ActiveForm::begin([
            'action' => ['users/add'],
            'method' => 'post',
            'options' => ['enctype' => 'multipart/form-data']]);
        return $this->render('patient-registration', ["form" => $form, 'model' => $model]);
    }

    public function actionAdd(){
        try{
            $model = new Users();
            if ($model->load(Yii::$app->request->post())) {
                $photoDocumentFile = UploadedFile::getInstance($model, 'photo_document_file');

                $result = Users::create(
                    $model->first_name,
                    $model->last_name,
                    $model->email_address,
                    $model->phone,
                    $photoDocumentFile
                );

                if ($result === 'User created!') {
                    Yii::$app->session->setFlash('success', $result);
                    return $this->redirect(['users/view-register']);
                } else {
                    Yii::$app->session->setFlash('error', $result ?: 'An error occurred while creating the user.');
                }
            }
            return $this->redirect(['users/view-register']);
        }catch(Exception $ex){
            return $ex;
        }
        
    }
}