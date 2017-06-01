<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "backend_root".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $rel_name
 * @property string $email
 * @property string $mobilephone
 * @property string $authority
 * @property integer $type
 * @property string $point
 * @property integer $stat
 */
class BackendRoot extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'backend_root';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            [['authority'], 'string'],
            [['type', 'stat'], 'integer'],
            [['point'], 'number'],
            [['username'], 'string', 'max' => 11],
            [['password', 'rel_name', 'mobilephone'], 'string', 'max' => 32],
            [['email'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => Yii::t('app','Username'),
            'password' => Yii::t('app','Password'),
            'rel_name' => 'Rel Name',
            'email' => 'Email',
            'mobilephone' => 'Mobilephone',
            'authority' => 'Authority',
            'type' => 'Type',
            'point' => 'Point',
            'stat' => 'Stat',
        ];
    }
}
