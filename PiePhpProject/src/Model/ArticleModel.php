<?php 

namespace Model;

// use Core\Entity;
use Core\Models\TagModel;
use Core\ORM;

class ArticleModel extends ORM {
    static private $relation = ['has many tags'];
    // static private $relation = ['has many'];

    function __construct($params = null)
    {
        parent::__construct($params);
    }

    public function comments() {
        return $this->hasMany(CommentModel::class, $this->params);
    }

    public function tags() {
        echo "tag function valide";
        return $this->belongsTo(TagModel::class, $this->params);
    }
}

