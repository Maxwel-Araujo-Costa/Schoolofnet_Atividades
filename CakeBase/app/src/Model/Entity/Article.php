<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Utility\Inflector;

class Article extends Entity
{

    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];

    protected function _setTitle($title)
    {
        if (!$this->properties['url']) {
            $this->set('url', Inflector::slug($title));
        }
        return $title;
    }

    protected function _getUrl($url)
    {
        return Inflector::slug($url);
    }
}
