<?php 
/**
 * Copyright 2017, Cake Development Corporation (http://cakedc.com)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright 2017, Cake Development Corporation (http://cakedc.com)
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

namespace App\Service;

use App\Service\Action\Comment\CommentIndexAction;
use CakeDC\Api\Routing\ApiRouter;
use CakeDC\Api\Service\FallbackService;
use Cake\ORM\TableRegistry;
use Cake\Routing\RouteBuilder;
use Cake\Utility\Inflector;

class CommentsService extends FallbackService 
{

    /**
     * Actions classes map.
     *
     * @var array
     */
    protected $_actionsClassMap = [
        'index' => '\App\Service\Action\Comment\CommentIndexAction',
        'add' => '\App\Service\Action\Comment\CommentAddAction',
        'delete' => '\App\Service\Action\Comment\CommentDeleteAction',
    ];


    /**
     * @inheritdoc
     * @return void
     */
    // public function initialize()
    // {
        // parent::initialize();
        // $this->mapAction('feed', CommentIndexAction::class, ['method' => ['GET'], 'mapCors' => true]);
    // }

    /**
     * Initialize service level routes
     *
     * @return void
     */
    public function loadRoutes()
    {
        $defaultOptions = $this->routerDefaultOptions();
        // $defaultOptions['id'] = '[a-z0-9_-]+';
        ApiRouter::scope('/', $defaultOptions, function (RouteBuilder $routes) use ($defaultOptions) {
            $routes->extensions($this->_routeExtensions);
            $options = $defaultOptions;
            $routes->resources($this->getName(), $options);
        });
    }

}