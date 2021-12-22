<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $user_name
 * @property string|null $password
 * @property string|null $F
 * @property string|null $I
 * @property string|null $O
 * @property string|null $email
 * @property string|null $location
 * @property string|null $birhsday
 * @property string|null $about
 * @property string|null $cat_ids
 * @property string|null $tel
 * @property string|null $skype
 * @property string|null $telegram
 * @property string|null $viber
 * @property int|null $avatar
 * @property string|null $completed_works
 * @property int|null $set_noticemsg
 * @property int|null $set_noticev
 * @property int|null $set_noticenewresp
 * @property int|null $set_showcontact1
 * @property int|null $set_hideprofile
 * @property string|null $status
 * @property string|null $rating
 * @property string $dt_add
 * @property string|null $online
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_name', 'dt_add'], 'required'],
            [['id', 'avatar', 'set_noticemsg', 'set_noticev', 'set_noticenewresp', 'set_showcontact1', 'set_hideprofile'], 'integer'],
            [['birhsday'], 'safe'],
            [['about', 'completed_works'], 'string'],
            [['user_name', 'password', 'F', 'I', 'O', 'email', 'location', 'cat_ids', 'tel', 'skype', 'telegram', 'viber', 'status', 'rating', 'dt_add', 'online'], 'string', 'max' => 255],
            [['id', 'user_name'], 'unique', 'targetAttribute' => ['id', 'user_name']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_name' => 'User Name',
            'password' => 'Password',
            'F' => 'F',
            'I' => 'I',
            'O' => 'O',
            'email' => 'Email',
            'location' => 'Location',
            'birhsday' => 'Birhsday',
            'about' => 'About',
            'cat_ids' => 'Cat Ids',
            'tel' => 'Tel',
            'skype' => 'Skype',
            'telegram' => 'Telegram',
            'viber' => 'Viber',
            'avatar' => 'Avatar',
            'completed_works' => 'Completed Works',
            'set_noticemsg' => 'Set Noticemsg',
            'set_noticev' => 'Set Noticev',
            'set_noticenewresp' => 'Set Noticenewresp',
            'set_showcontact1' => 'Set Showcontact1',
            'set_hideprofile' => 'Set Hideprofile',
            'status' => 'Status',
            'rating' => 'Rating',
            'dt_add' => 'Dt Add',
            'online' => 'Online',
        ];
    }
    public function getCategories() {
        return $this->hasMany(Categories::class, ['id' => 'cat_id']);
    }
    public function getTasks() {
        return $this->hasMany(Tasks::class, ['performer_id' => 'id']);
    }
    public function getResponces() {
        return $this->hasMany(Responces::class, ['performer_id' => 'id']);
    }
}
