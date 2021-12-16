<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "messages".
 *
 * @property int $id
 * @property int|null $from
 * @property int|null $to
 * @property string|null $time
 * @property string|null $time_edit
 * @property string|null $text
 */
class Messages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'messages';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'from', 'to'], 'integer'],
            [['time', 'time_edit'], 'safe'],
            [['text'], 'string'],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'from' => 'From',
            'to' => 'To',
            'time' => 'Time',
            'time_edit' => 'Time Edit',
            'text' => 'Text',
        ];
    }
}
