<?php
/**
 * Created by PhpStorm.
 * User: engin
 * Date: 19/08/15
 * Time: 11:27
 */

namespace FeedAdapter\Adapters;

use App\Entity\Feed;
use App\Repository\FeedAdapter\Exception\ParserException;
use FeedAdapter\AdapterAbstract;
use FeedAdapter\AdapterInterface;
use GuzzleHttp\Client;

class Atom extends AdapterAbstract implements AdapterInterface
{

    const ITEM = 'entry';
    const TITLE = 'title';
    const DESCRIPTION = 'summary';
    const PUBLISH_DATE = 'updated';
    const URL = 'link';

    public function __construct(Client $client)
    {
        parent::__construct($client);
    }


    /**
     * @param $content
     *
     * @return Feed[]
     * @throws ParserException
     */
    public function parse($content)
    {

        try {
            return parent::parse($content, self::ITEM, self::URL, self::DESCRIPTION, self::TITLE, self::PUBLISH_DATE);
        } catch (\Exception $e) {
            throw new ParserException($e->getMessage(), $e->getCode());
        }

    }

    public function get(\DateTime $date)
    {
        // TODO: Implement get() method.
    }
}