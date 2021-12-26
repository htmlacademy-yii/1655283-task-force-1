<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "loggs".
 *
 * @property int $id
 * @property string|null $session_id
 * @property string|null $method
 * @property string|null $uri
 * @property string|null $ip
 * @property string|null $time
 * @property string|null $action
 */
class Loggs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'loggs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['time'], 'safe'],
            [['session_id', 'method', 'uri', 'ip', 'action'], 'string', 'max' => 255],
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
            'session_id' => 'Session ID',
            'method' => 'Method',
            'uri' => 'Uri',
            'ip' => 'Ip',
            'time' => 'Time',
            'action' => 'Action',
        ];
    }
}
