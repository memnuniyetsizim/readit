<?php
/**
 * Created by PhpStorm.
 * User: engin
 * Date: 27/07/15
 * Time: 23:13
 */

namespace App\Repository;

class AbstractRepository
{
    protected $db;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }
}
