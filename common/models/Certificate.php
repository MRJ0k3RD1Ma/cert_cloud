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
            [['pin', 'status'], 'integer'],
            [['created', 'updated'], 'safe'],
            [['word', 'pdf'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pin' => 'Pin',
            'word' => 'Word',
            'pdf' => 'Pdf',
            'created' => 'Created',
            'updated' => 'Updated',
            'status' => 'Status',
        ];
    }
}
