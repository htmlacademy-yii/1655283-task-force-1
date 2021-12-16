<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "files".
 *
 * @property int $id
 * @property string|null $file_name
 * @property string|null $src
 * @property string|null $type
 * @property string|null $mime
 * @property float|null $filesize
 * @property string|null $wh
 * @property string|null $esc1_src
 * @property string|null $esc2_src
 * @property string|null $comment
 */
class Files extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'files';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['filesize'], 'number'],
            [['file_name', 'src', 'type', 'mime', 'wh', 'esc1_src', 'esc2_src', 'comment'], 'string', 'max' => 255],
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
            'file_name' => 'File Name',
            'src' => 'Src',
            'type' => 'Type',
            'mime' => 'Mime',
            'filesize' => 'Filesize',
            'wh' => 'Wh',
            'esc1_src' => 'Esc1 Src',
            'esc2_src' => 'Esc2 Src',
            'comment' => 'Comment',
        ];
    }
}
