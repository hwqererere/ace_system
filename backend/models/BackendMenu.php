<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "backend_menu".
 *
 * @property integer $id
 * @property integer $fid
 * @property string $link
 * @property string $title
 */
class BackendMenu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'backend_menu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fid', 'link'], 'required'],
            [['fid'], 'integer'],
            [['link', 'title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fid' => 'Fid',
            'link' => 'Link',
            'title' => 'Title',
        ];
    }
}
