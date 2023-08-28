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
                $model->word = $name.'.'.$ext;

                // generate word
                $domPdfPath = realpath(Yii::$app->vendorPath.'/mpdf/mpdf');

                Settings::setPdfRendererPath($domPdfPath);

                Settings::setPdfRendererName('MPDF');

                $Content = \PhpOffice\PhpWord\IOFactory::load(Yii::$app->basePath.'/web/upload/'.$year.'/'.$month.'/'.$name.'.'.$ext);
//                $Content->setDefaultFontName('times new roman');
                //Save it into PDF
                $PDFWriter = \PhpOffice\PhpWord\IOFactory::createWriter($Content,'PDF');
                $PDFWriter->save(Yii::$app->basePath.'/web/upload/'.$year.'/'.$month.'/'.$name.'.pdf');

//                $Content =  new \PhpOffice\PhpWord\TemplateProcessor(Yii::$app->basePath.'/web/upload/'.$year.'/'.$month.'/'.$name.'.'.$ext);
//                $Content->saveAs(Yii::$app->basePath.'/web/upload/'.$year.'/'.$month.'/'.$name.'-1.'.$ext);

//                Yii::$app->response->sendFile(Yii::$app->basePath.'/web/upload/'.$year.'/'.$month.'/'.$name.'.pdf');
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
