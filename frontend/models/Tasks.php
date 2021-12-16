<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tasks".
 *
 * @property int $id
 * @property int $author_id
 * @property int|null $performer_id
 * @property int|null $cat_id
 * @property string|null $status
 * @property string|null $name
 * @property string|null $about
 * @property string|null $location
 * @property string|null $money
 * @property string|null $timeout
 * @property string|null $inc_files
 * @property string|null $time_add
 * @property string|null $time_close
 * @property string|null $time_start
 * @property string $time_expire
 * @property string $address
 * @property string $lat
 * @property string $long
 */
class Tasks extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tasks';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['author_id', 'address', 'lat', 'long'], 'required'],
            [['author_id', 'performer_id', 'cat_id'], 'integer'],
            [['about'], 'string'],
            [['timeout', 'time_add', 'time_close', 'time_start', 'time_expire'], 'safe'],
            [['status', 'name', 'location', 'inc_files', 'address'], 'string', 'max' => 255],
            [['money'], 'string', 'max' => 11],
            [['lat', 'long'], 'string', 'max' => 32],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'author_id' => 'Author ID',
            'performer_id' => 'Performer ID',
            'cat_id' => 'Cat ID',
            'status' => 'Status',
            'name' => 'Name',
            'about' => 'About',
            'location' => 'Location',
            'money' => 'Money',
            'timeout' => 'Timeout',
            'inc_files' => 'Inc Files',
            'time_add' => 'Time Add',
            'time_close' => 'Time Close',
            'time_start' => 'Time Start',
            'time_expire' => 'Time Expire',
            'address' => 'Address',
            'lat' => 'Lat',
            'long' => 'Long',
        ];
    }
}
