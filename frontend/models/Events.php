<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "events".
 *
 * @property int $id
 * @property int|null $user_id
 * @property string|null $name
 * @property string|null $inc_type
 * @property int|null $inc_id
 * @property string|null $time
 */
class Events extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'events';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'user_id', 'inc_id'], 'integer'],
            [['time'], 'safe'],
            [['name', 'inc_type'], 'string', 'max' => 255],
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
            'user_id' => 'User ID',
            'name' => 'Name',
            'inc_type' => 'Inc Type',
            'inc_id' => 'Inc ID',
            'time' => 'Time',
        ];
    }
}
