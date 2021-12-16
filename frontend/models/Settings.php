<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "settings".
 *
 * @property string $nameset
 * @property string|null $value
 * @property string|null $value2
 * @property string|null $value3
 */
class Settings extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'settings';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nameset'], 'required'],
            [['nameset', 'value', 'value2', 'value3'], 'string', 'max' => 255],
            [['nameset'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'nameset' => 'Nameset',
            'value' => 'Value',
            'value2' => 'Value2',
            'value3' => 'Value3',
        ];
    }
}
