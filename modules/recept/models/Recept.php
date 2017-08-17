<?php

namespace app\modules\recept\models;

use app\modules\ingredient\models\Ingredients;
use Yii;

/**
 * This is the model class for table "recept".
 *
 * @property integer $id
 * @property string $title
 * @property string $content
 */
class Recept extends \yii\db\ActiveRecord
{
    public $idIngredients;
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
            [['title', 'content'], 'required'],
            [['content'], 'string'],
            [['title'], 'string', 'max' => 255],
            
        ];
    }


    
    public function getIngredients(){
        return $this->hasMany(Ingredients::className(),['id'=>'id_ingridients'])->viaTable('ing_to_recept', ['id_rec' => 'id']);
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'content' => 'Content',
        ];
    }
}
