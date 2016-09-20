<?php

namespace app\controllers;

use Yii;
use app\models\ChannelWindDeductible;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RatingController implements the CRUD actions for ChannelWindDeductible model.
 */
class RatingController extends Controller
{


    /**
     * Lists all ChannelWindDeductible models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => ChannelWindDeductible::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new ChannelWindDeductible model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionRate()
    {
        $model = new ChannelWindDeductible();
        $config=\app\models\Config::findOne(array("key"=>'deductible_variable_value'));
            
     
        return $this->render('rate', [
                'model' => $model,
                'config' =>$config
            ]);
       
    }

    /**
     * Finds the ChannelWindDeductible model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ChannelWindDeductible the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ChannelWindDeductible::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
