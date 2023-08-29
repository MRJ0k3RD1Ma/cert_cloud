<?php

namespace frontend\modules\admin\controllers;

use common\models\Certificate;
use PhpOffice\PhpWord\Settings;
use yii\web\Controller;
use yii\web\UploadedFile;
use Yii;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
use Endroid\QrCode\Label\Alignment\LabelAlignmentCenter;
use Endroid\QrCode\Label\Font\NotoSans;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;
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

        $model->pin = Certificate::find()->max('id');
        if(!$model->pin){
            $model->pin = 0;
        }
        $model->pin ++;
        if($model->load($this->request->post())){
            if($model->word = UploadedFile::getInstance($model,'word')){
                $name = microtime(true);
                $ext = $model->word->extension;
                $year = date('Y');
                $month = date('m');
                if(!file_exists(Yii::$app->basePath.'/web/upload/'.$year.'/'.$month)){
                    mkdir(Yii::$app->basePath.'/web/upload/'.$year.'/'.$month, 0777, true);
                }
                $model->word->saveAs(Yii::$app->basePath.'/web/upload/'.$year.'/'.$month.'/'.$name.'.'.$ext);

                $model->word = $year.'/'.$month.'/'.$name.'.'.$ext;
            }
            if($model->pdf = UploadedFile::getInstance($model,'pdf')){
                $name = microtime(true);
                $ext = $model->pdf->extension;
                $year = date('Y');
                $month = date('m');
                if(!file_exists(Yii::$app->basePath.'/web/upload/'.$year.'/'.$month)){
                    mkdir(Yii::$app->basePath.'/web/upload/'.$year.'/'.$month, 0777, true);
                }
                $model->pdf->saveAs(Yii::$app->basePath.'/web/upload/'.$year.'/'.$month.'/'.$name.'.'.$ext);

                $model->pdf = $year.'/'.$month.'/'.$name.'.'.$ext;
            }

            $model->url = Yii::$app->urlManager->createAbsoluteUrl(['/site/view','id'=>$model->pin]);
            $model->url_qr = Yii::$app->urlManager->createAbsoluteUrl(['/site/view','id'=>$model->pin]);

            if($model->save()){
                Yii::$app->session->setFlash('success','Fayl muvoffaqiyatli saqlandi');

                return $this->redirect(['/admin/certificate/view','id'=>$model->id]);
            }else{
                Yii::$app->session->setFlash('error','Faylni saqlashda xatolik');
                return $this->redirect(['index']);
            }

        }
        return $this->render('index',[
            'model'=>$model
        ]);
    }


    public function actionQr($pin,$down = false){

        $qr = function() use ($pin) {
            $data=Builder::create()
                ->writer(new PngWriter())
                ->writerOptions([])
                ->data(Yii::$app->urlManager->createAbsoluteUrl(['/site/view','id'=>$pin]))
                ->encoding(new Encoding('UTF-8'))
                ->errorCorrectionLevel(new ErrorCorrectionLevelHigh())
                ->size(200)
                ->margin(3)
                ->roundBlockSizeMode(new RoundBlockSizeModeMargin())
//        ->logoPath(Yii::$app->basePath."/web/favicon.png")
                ->labelText('')
                ->labelFont(new NotoSans(20))
                ->labelAlignment(new LabelAlignmentCenter())
                ->build();

            return $data->getDataUri();
        };
        $img = $qr();

        return $img;
    }
}
