<?php
/**
 * tariff plugin for Craft CMS 3.x
 *
 * tariff
 *
 * @link      https://w3care.com
 * @copyright Copyright (c) 2018 w3caredev
 */

namespace w3caredev\tariff\variables;

use w3caredev\tariff\Tariff;
use craft\elements\Entry;

use Craft;

/**
 * tariff Variable
 *
 * Craft allows plugins to provide their own template variables, accessible from
 * the {{ craft }} global variable (e.g. {{ craft.tariff }}).
 *
 * https://craftcms.com/docs/plugins/variables
 *
 * @author    w3caredev
 * @package   Tariff
 * @since     0.0.1
 */
class TariffVariable
{
    // Public Methods
    // =========================================================================

    /**
     * Whatever you want to output to a Twig template can go into a Variable method.
     * You can have as many variable functions as you want.  From any Twig template,
     * call it like this:
     *
     *     {{ craft.tariff.exampleVariable }}
     *
     * Or, if your variable requires parameters from Twig:
     *
     *     {{ craft.tariff.exampleVariable(twigValue) }}
     *
     * @param null $optional
     * @return string
     */
    public function exampleVariable($optional = null)
    {
        $result = "And away we go to the Twig template...";
        if ($optional) {
            $result = "I'm feeling optional today...";
        }
        return $result;
    }


    /**
     * @param array|null $criteria
     *
     * @return ElementCriteriaModel|null
     */
    public function birthdate($criteria = null)
    {


        if(!isset($criteria)){
            return false;
        }
        $item = array();
        $userAge = (date('Y') - date('Y',strtotime($criteria)));
        $query = \craft\elements\Entry::find();
        $query->section('tariffSection'); 
        $tariffSections = $query->all();

        foreach ($tariffSections as $record) {
            $isUserRecord = false;
            $price = 0;
            foreach ($record->priceByAge as $value) {
               if($value['userAge']== $userAge){
                 $isUserRecord = true;
                 $price = $value['price'];
               } 
            }
            if($isUserRecord){
                 $item[] = array(
                    'title' => $price,
                    'price' => $record['title']
                );
            }
        }
        return $item;
    }
}

