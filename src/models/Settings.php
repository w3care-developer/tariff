<?php

namespace w3caredev\tariff\models;

use craft\base\Model;

class Settings extends Model
{
    public $tableField = 'priceByAge';
    public $ageColumn = 'age';
    public $priceColumn = 'price';

    public function rules()
    {
        return [
            [['priceByAge', 'age', 'price'], 'required'],
        ];
    }
}