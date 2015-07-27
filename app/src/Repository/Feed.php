<?php

namespace App\Repository;


class Feed extends AbstractRepository{

    public function __construct(\PDO $db){

        parent::__construct($db);
    }
}