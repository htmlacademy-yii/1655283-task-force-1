<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "responces".
 *
 * @property int $id
 * @property int|null $task_id
 * @property int|null $customer_id
 * @property int|null $performer_id
 * @property string|null $text
 * @property string|null $time
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'responces';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'task_id', 'customer_id', 'performer_id'], 'integer'],
            [['text'], 'string'],
            [['time'], 'safe'],
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
            'task_id' => 'Task ID',
            'customer_id' => 'Customer ID',
            'performer_id' => 'Performer ID',
            'text' => 'Text',
            'time' => 'Time',
        ];
    }
}
