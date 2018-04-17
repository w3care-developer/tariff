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
    private $_searchObjects;
    // const SECTIONNAME = \w3caredev\tariff\Tariff::getInstance()->getSettings()->sectionName;
    // const SECTIONNAME = \w3caredev\tariff\Tariff::getInstance()->getSettings()->sectionName;
    // const SECTIONNAME = \w3caredev\tariff\Tariff::getInstance()->getSettings()->sectionName;
    // const SECTIONNAME = \w3caredev\tariff\Tariff::getInstance()->getSettings()->sectionName;
     

     // private $tableField = \w3caredev\tariff\Tariff::getInstance()->getSettings()->tableField;
     // private $ageColumn = \w3caredev\tariff\Tariff::getInstance()->getSettings()->ageColumn;
     // private $priceColumn = \w3caredev\tariff\Tariff::getInstance()->getSettings()->priceColumn;
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
         $sectionName = \w3caredev\tariff\Tariff::getInstance()->getSettings()->sectionName;
         $tableField = \w3caredev\tariff\Tariff::getInstance()->getSettings()->tableField;
         $ageColumn = \w3caredev\tariff\Tariff::getInstance()->getSettings()->ageColumn;
         $priceColumn = \w3caredev\tariff\Tariff::getInstance()->getSettings()->priceColumn;
       

        $item = array();
        $userAge = (date('Y') - date('Y',strtotime($criteria)));
        $query = \craft\elements\Entry::find();
        $query->section($sectionName); 
        $query->orderBy($tableField,"ASC"); 
        $tariffSections = $query->all();

        foreach ($tariffSections as $record) {
            $isUserRecord = false;
            $price = 0;
            foreach ($record->$tableField as $value) {
               if($value[$ageColumn]== $userAge){
                    $isUserRecord = true;
                    $price = $value[$priceColumn] ? $value[$priceColumn] : 0;
                }
            }
            if($isUserRecord){
                $item1 = array(
                    'title' => $record['title'],
                    'price' => $price
                );
                $item2 = $record->getFieldValues();
                $item[] = array_merge($item1, $item2);
            }
        }


        $this->_searchObjects =  $item;

        
        return $this;
    }

     /**
     * @param $string
     *
     * @return $this
     */
    public function hide($string){
        
        if(!isset($string) && $string!="noPrice"){
            return $this;
        }
        $count = 0;
        $newArray = array();
        foreach ($this->_searchObjects as  $row) {
            if($row['price']!=0){
                $newArray[] = $row;
            }
        }
        $this->_searchObjects = $newArray;
        return $this;
    }

    /**
     * @return array
     */
    public function sort($key, $sort){
        $tableField = \w3caredev\tariff\Tariff::getInstance()->getSettings()->tableField;
        $ageColumn = \w3caredev\tariff\Tariff::getInstance()->getSettings()->ageColumn;
        $priceColumn = \w3caredev\tariff\Tariff::getInstance()->getSettings()->priceColumn;
        if($sort == "DESC"){
            rsort($this->_searchObjects);
        }


        return $this;
    }

    /**
     * @return array
     */
    public function find(){
        return $this->_searchObjects;
    }

}

