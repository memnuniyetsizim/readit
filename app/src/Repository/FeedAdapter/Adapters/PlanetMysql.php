<?php

namespace FeedAdapter\Adapters;


use App\Repository\AbstractRepository;
use FeedAdapter\AdapterInterface;

class PlanetMysql extends AbstractRepository implements AdapterInterface
{

    public function get(\DateTime $date)
    {

    }

    public function request()
    {
    }

    public function parse($content)
    {
    }
}