<?php

namespace app\modules\recept\models;

use Yii;
use app\modules\ingredient\models\Ingredients;
/**
 * This is the model class for table "recept".
 *
 * @property integer $id
 * @property string $content
 */
class Recept extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'recept';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content'], 'required'],
            [['content'], 'string', 'max' => 45],
        ];
    }

    public function getIngredients(){
        return $this->hasMany(Ingredients::className(),['id_recept'=>'id']);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'content' => 'Content',
        ];
    }
}
