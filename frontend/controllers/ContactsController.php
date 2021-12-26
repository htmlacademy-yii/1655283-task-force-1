<?php
namespace frontend\controllers;

use yii\web\Controller;
use frontend\models\Contact;

class ContactsController extends Controller
{
    public function actionIndex()
    {


        return $this->render('index');
    }
}