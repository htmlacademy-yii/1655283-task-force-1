<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "locations".
 *
 * @property int $id
 * @property string|null $country
 * @property string|null $city
 * @property string|null $name
 * @property string|null $lat
 * @property string|null $long
 */
class Locations extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'locations';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['country', 'city', 'name', 'lat', 'long'], 'string', 'max' => 255],
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
            'country' => 'Country',
            'city' => 'City',
            'name' => 'Name',
            'lat' => 'Lat',
            'long' => 'Long',
        ];
    }
}
