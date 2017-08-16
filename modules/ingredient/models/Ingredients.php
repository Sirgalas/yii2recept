<?php

namespace app\modules\ingredient\models;

use Yii;

/**
 * This is the model class for table "ingredients".
 *
 * @property integer $id
 * @property integer $id_recept
 * @property string $name
 */
class Ingredients extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ingredients';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_recept', 'name'], 'required'],
            [['id_recept'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_recept' => 'Id Recept',
            'name' => 'Name',
        ];
    }
}
