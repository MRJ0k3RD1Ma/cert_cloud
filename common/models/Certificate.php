<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "certificate".
 *
 * @property int $id
 * @property int|null $pin
 * @property string|null $word
 * @property string|null $pdf
 * @property string|null $url
 * @property string|null $url_qr
 * @property string|null $created
 * @property string|null $updated
 * @property int|null $status
 */
class Certificate extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'certificate';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pin','pdf'],'required','on'=>'insert'],
            [['pin'],'required','on'=>'check'],
            [['pin', 'status'], 'integer'],
            [['created', 'updated'], 'safe'],
            ['url','url'],
            [['word', 'pdf','url','url_qr'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'PIN',
            'pin' => 'PIN',
            'word' => 'WORD',
            'pdf' => 'PDF',
            'url' => 'Certificate.standat.uz manzili',
            'url_qr' => 'QR kod',
            'created' => 'Kiritildi',
            'updated' => 'O`zgartirildi',
            'status' => 'Status',
        ];
    }
}
