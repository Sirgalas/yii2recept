<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 17.08.17
 * Time: 19:50
 */

namespace app\modules\recept\models;

use yii\base\Model;

class searchForm extends Model
{
    public $ingredients;

    public function rules(){
        return[
            ['ingredients','validateIngridients']
        ];
    }


    public function validateIngridients()
    {
        if (count($this->ingredients)<2) {
            $this->addError('ingredients', 'Выберите больше ингредиентов.');
        }
        if (count($this->ingredients)>5) {
            $this->addError('ingredients', 'Нельзя выбрать больше 5 ингредиентов.');
        }
    }
}