<?php

namespace App\Repository;


class User extends AbstractRepository
{

    public function __construct(\PDO $db)
    {

        parent::__construct($db);
    }
}