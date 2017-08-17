<?php

namespace app\modules\recept\models;

use Yii;

/**
 * This is the model class for table "ing_to_recept".
 *
 * @property integer $id
 * @property integer $id_ingridients
 * @property integer $id_rec
 */
class IngToRecept extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ing_to_recept';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_ingridients', 'id_rec'], 'required'],
            [['id', 'id_ingridients', 'id_rec'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_ingridients' => 'Id Ingridients',
            'id_rec' => 'Id Rec',
        ];
    }
}
