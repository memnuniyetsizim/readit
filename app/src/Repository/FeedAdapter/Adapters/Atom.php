<?php

namespace FeedAdapter\Adapters;

use App\Entity\Feed;
use App\Repository\FeedAdapter\Exception\ParserException;
use FeedAdapter\AdapterAbstract;
use FeedAdapter\AdapterInterface;
use GuzzleHttp\Client;

class Atom extends AdapterAbstract implements AdapterInterface
{

    protected $elements = [
        'item' => 'entry',
        'title' => 'title',
        'description' => 'summary',
        'publishDate' => 'updated',
        'url' => 'link'
    ];

    public function __construct(Client $client)
    {
        parent::__construct($client);
    }

    public function get(\DateTime $date)
    {
        // TODO: Implement get() method.
    }
}
