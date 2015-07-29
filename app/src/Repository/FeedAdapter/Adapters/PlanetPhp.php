<?php

namespace FeedAdapter\Adapters;


use App\Repository\FeedAdapter\Exception\ParserException;
use FeedAdapter\Standards\Rss_1_0;
use FeedAdapter\AdapterAbstract;
use FeedAdapter\AdapterInterface;
use App\Entity\Feed;

class PlanetPhp extends AdapterAbstract implements AdapterInterface, Rss_1_0
{

    private $rss_url = 'http://www.planet-php.net/rdf/';

    public function get(\DateTime $date)
    {
        // TODO : get days articles and return


    }

    public function request()
    {
    }

    /**
     * @param $content
     * @return \App\Entity\Feed[]
     * @throws ParserException
     */
    public function parse($content)
    {
        $feeds = [];
        try{
            $xml = new \SimpleXMLElement($content);
            foreach($xml->{self::root}->{self::item} as $item) {
                array_push($feeds,
                    (new Feed())
                        ->setLink($item->{self::url})
                        ->setDescription($item->{self::description})
                        ->setTitle($item->{self::title})
                        ->setPublishDate(new \DateTime($item->{self::publish_date}))
                );
            }
        }
        catch(\Exception $e) {
            throw new ParserException();
        }

    }

}