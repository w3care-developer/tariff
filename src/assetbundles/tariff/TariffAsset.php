<?php
/**
 * tariff plugin for Craft CMS 3.x
 *
 * tariff
 *
 * @link      https://w3care.com
 * @copyright Copyright (c) 2018 w3caredev
 */

namespace w3caredev\tariff\assetbundles\Tariff;

use Craft;
use craft\web\AssetBundle;
use craft\web\assets\cp\CpAsset;

/**
 * TariffAsset AssetBundle
 *
 * AssetBundle represents a collection of asset files, such as CSS, JS, images.
 *
 * Each asset bundle has a unique name that globally identifies it among all asset bundles used in an application.
 * The name is the [fully qualified class name](http://php.net/manual/en/language.namespaces.rules.php)
 * of the class representing it.
 *
 * An asset bundle can depend on other asset bundles. When registering an asset bundle
 * with a view, all its dependent asset bundles will be automatically registered.
 *
 * http://www.yiiframework.com/doc-2.0/guide-structure-assets.html
 *
 * @author    w3caredev
 * @package   Tariff
 * @since     0.0.1
 */
class TariffAsset extends AssetBundle
{
    // Public Methods
    // =========================================================================

    /**
     * Initializes the bundle.
     */
    public function init()
    {
        // define the path that your publishable resources live
        $this->sourcePath = "@w3caredev/tariff/assetbundles/tariff/dist";

        // define the dependencies
        $this->depends = [
            CpAsset::class,
        ];

        // define the relative path to CSS/JS files that should be registered with the page
        // when this asset bundle is registered
        $this->js = [
            'js/Tariff.js',
        ];

        $this->css = [
            'css/Tariff.css',
        ];

        parent::init();
    }
}
