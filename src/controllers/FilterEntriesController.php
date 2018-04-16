<?php
/**
 * tariff plugin for Craft CMS 3.x
 *
 * tariff
 *
 * @link      https://w3care.com
 * @copyright Copyright (c) 2018 w3caredev
 */

namespace w3caredev\tariff\controllers;

use w3caredev\tariff\Tariff;

use Craft;
use craft\web\Controller;

/**
 * FilterEntries Controller
 *
 * Generally speaking, controllers are the middlemen between the front end of
 * the CP/website and your plugin’s services. They contain action methods which
 * handle individual tasks.
 *
 * A common pattern used throughout Craft involves a controller action gathering
 * post data, saving it on a model, passing the model off to a service, and then
 * responding to the request appropriately depending on the service method’s response.
 *
 * Action methods begin with the prefix “action”, followed by a description of what
 * the method does (for example, actionSaveIngredient()).
 *
 * https://craftcms.com/docs/plugins/controllers
 *
 * @author    w3caredev
 * @package   Tariff
 * @since     0.0.1
 */
class FilterEntriesController extends Controller
{

    // Protected Properties
    // =========================================================================

    /**
     * @var    bool|array Allows anonymous access to this controller's actions.
     *         The actions must be in 'kebab-case'
     * @access protected
     */
    protected $allowAnonymous = ['index', 'do-something'];

    // Public Methods
    // =========================================================================

    /**
     * Handle a request going to our plugin's index action URL,
     * e.g.: actions/tariff/filter-entries
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $result = 'Welcome to the FilterEntriesController actionIndex() method';

        return $result;
    }

    /**
     * Handle a request going to our plugin's actionDoSomething URL,
     * e.g.: actions/tariff/filter-entries/do-something
     *
     * @return mixed
     */
    public function actionDoSomething()
    {
        $result = 'Welcome to the FilterEntriesController actionDoSomething() method';

        return $result;
    }
}
