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

namespace App\Service\Action\Article;

use Cake\ORM\Query;
use CakeDC\Api\Service\Action\CrudAction;
use Cake\Utility\Hash;

class ArticleIndexBase extends CrudAction
{

    public $extensions = [
        'AppPaginate'
    ];

    /**
     * Execute action.
     *
     * @return mixed
     */
    public function execute()
    {
        $entities = $this->_getEntities();

        $pagination = $this->service()->getResult()->payload('pagination');
        return [
            'articles' => $entities,
            'articlesCount' => Hash::get($pagination, 'count'),
        ];
    }

    /**
     * Builds entities list
     *
     * @return \Cake\Collection\Collection
     */
    protected function _getEntities()
    {
        $query = $this->_getQuery();

        $event = $this->dispatchEvent('Action.Crud.onFindEntities', compact('query'));
        if ($event->result) {
            $query = $event->result;
        }
        $records = $query->all();
        $this->dispatchEvent('Action.Crud.afterFindEntities', compact('query', 'records'));

        return $records;
    }

}
