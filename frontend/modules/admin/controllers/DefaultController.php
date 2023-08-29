<?php

namespace frontend\modules\admin\controllers;

use common\models\Certificate;
use PhpOffice\PhpWord\Settings;
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
                if(!file_exists(Yii::$app->basePath.'/web/upload/'.$year.'/'.$month)){
                    mkdir(Yii::$app->basePath.'/web/upload/'.$year.'/'.$month, 0777, true);
                }
                $model->word->saveAs(Yii::$app->basePath.'/web/upload/'.$year.'/'.$month.'/'.$name.'.'.$ext);


                // generate word
                $domPdfPath = realpath(Yii::$app->vendorPath.'/mpdf/mpdf');

                Settings::setPdfRendererPath($domPdfPath);

                Settings::setPdfRendererName('MPDF');

                $content = \PhpOffice\PhpWord\IOFactory::load(Yii::$app->basePath.'/web/upload/'.$year.'/'.$month.'/'.$name.'.'.$ext);

                $PDFWriter = \PhpOffice\PhpWord\IOFactory::createWriter($content,'PDF');
                \PhpOffice\PhpWord\Settings::setOutputEscapingEnabled(false);
                $PDFWriter->save(Yii::$app->basePath.'/web/upload/'.$year.'/'.$month.'/'.$name.'.pdf');
                //            10.05sm x 15.61sm


//                Yii::$app->response->sendFile(Yii::$app->basePath.'/web/upload/'.$year.'/'.$month.'/'.$name.'.pdf');

//                $phpWord = \PhpOffice\PhpWord\IOFactory::load(Yii::$app->basePath.'/web/upload/'.$year.'/'.$month.'/'.$name.'.'.$ext);
//                $htmlWriter = new \PhpOffice\PhpWord\Writer\HTML($phpWord);
//                $htmlWriter->save(Yii::$app->basePath.'/web/upload/'.$year.'/'.$month.'/'.$name.'.html');


                $model->word = $year.'/'.$month.'/'.$name.'.'.$ext;
                $model->pdf = $year.'/'.$month.'/'.$name.'.pdf';
            }


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
}
