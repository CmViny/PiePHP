<?php

namespace Model;

use Core\Entity;
use Core\Models\ArticleModel;

class CommentModel extends Entity{
    static private $relation = ['has one'];

    function __construct($params = null)
    {
        parent::__construct($params);
    }

    public function article() {
        return $this->hasOne(ArticleModel::class);
    }
}
// belongTo = 1 article

// ORM (one to many ou many to many) belongTo => CommentModel (student), ArticleModel(promotion) 
// static $relation = condition pour voir si la method est one to many ou many to many 
// 80% dans l'ORM et le reste dans les models lié. (Utiliser entity a laplace de $fillable)
// belongTo ou hasMany =  $relation