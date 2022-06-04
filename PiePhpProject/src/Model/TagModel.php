<?php

namespace Model;

// use Core\Entity;
use Core\Models\ArticleModel;
use Core\ORM;

class TagModel extends ORM{
    static private $relation = ['has many articles'];

    function __construct($params = null)
    {
        parent::__construct($params);
    }

    public function posts() {
        return $this->belongsTo(ArticleModel::class, $this->params);
    }
}
