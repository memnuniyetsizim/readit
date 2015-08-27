<?php
/**
 * Created by PhpStorm.
 * User: engin
 * Date: 19/08/15
 * Time: 11:27
 */

namespace FeedAdapter\Adapters;

use App\Repository\FeedAdapter\Exception\ParserException;
use FeedAdapter\AdapterAbstract;
use FeedAdapter\AdapterInterface;
use App\Entity\Feed;
use GuzzleHttp\Client;

class Atom extends AdapterAbstract implements AdapterInterface {

    const item = 'entry';
    const title = 'title';
    const description = 'summary';
    const publish_date = 'updated';
    const url = 'link';

    public function __construct(Client $client)
    {
        parent::__construct($client);
    }


    /**
     * @param $content
     * @return Feed[]
     * @throws ParserException
     */
    public function parse($content)
    {

        try{
            return parent::parse($content, self::item, self::url, self::description, self::title, self::publish_date);
        }
        catch(\Exception $e) {
            throw new ParserException($e->getMessage(), $e->getCode());
        }

    }

    public function get(\DateTime $date)
    {
        // TODO: Implement get() method.
    }
}