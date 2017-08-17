<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 17.08.17
 * Time: 19:50
 */

namespace app\modules\recept\models;

use yii\base\Model;
use app\modules\ingredient\models\Ingredients;
class SearchForm extends Ingredients
{
    public $ingredients;

    public function rules(){
        return[
            ['ingredients', function ($attribute, $params) {
                if (count($this->attribute)<2) {
                    $this->addError($attribute, 'Выберите больше ингредиентов.');
                }
                if (count($this->attribute)>5) {
                    $this->addError($attribute, 'Нельзя выбрать больше 5 ингредиентов.');
                }
            }]
        ];
    }


   /* public function validateIngridients()
    {
        $this->addError('ingredients','test');
        if (count($this->ingredients)<2) {
            $this->addError('ingredients', 'Выберите больше ингредиентов.');
        }
        if (count($this->ingredients)>5) {
            $this->addError('ingredients', 'Нельзя выбрать больше 5 ингредиентов.');
        }
    }*/
}