<?php

namespace FeedAdapter\Adapters;


use FeedAdapter\AdapterAbstract;
use FeedAdapter\AdapterInterface;

class PlanetPhp extends AdapterAbstract implements AdapterInterface
{

    public function get(\DateTime $date)
    {
        // TODO : get days articles and return
    }

    public function request()
    {
    }

    public function parse($content)
    {
    }

}