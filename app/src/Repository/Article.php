<?php

namespace App\Repository;


class Article extends AbstractRepository{

    public function __construct(\PDO $db){

        parent::__construct($db);
    }
}