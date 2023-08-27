<?php

namespace frontend\modules\admin\controllers;

use common\models\Certificate;
use yii\web\Controller;
use yii\web\UploadedFile;
use Yii;
/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $model = new Certificate();
        if($model->load($this->request->post())){
            if($model->word = UploadedFile::getInstance($model,'word')){
                $name = microtime(true);
                $ext = $model->word->extension;
                $year = date('Y');
                $month = date('m');
                mkdir(Yii::$app->basePath.'/web/upload/'.$year.'/'.$month, 0777, true);
                $model->word->saveAs(Yii::$app->basePath.'/web/upload/'.$year.'/'.$month.'/'.$name.'.'.$ext);
                $model->word = $name.'.'.$ext;

                // generate word
                $phpWord = new \PhpOffice\PhpWord\PhpWord();

                $phpWord->save(Yii::$app->basePath.'/web/upload/'.$year.'/'.$month.'/'.$name.'.'.$ext,Yii::$app->basePath.'/web/upload/'.$year.'/'.$month.'/'.$name.'.pdf');

            }

        }
        return $this->render('index',[
            'model'=>$model
        ]);
    }
}
