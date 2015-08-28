<?php
namespace FeedAdapter\Adapters;

use App\Repository\FeedAdapter\Exception\ParserException;
use FeedAdapter\AdapterAbstract;
use FeedAdapter\AdapterInterface;
use App\Entity\Feed;
use GuzzleHttp\Client;

class Rss_2_0 extends AdapterAbstract implements AdapterInterface
{

    protected $elements = [
        'item' => 'item',
        'title' => 'title',
        'description' => 'description',
        'publishDate' => 'pubDate',
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