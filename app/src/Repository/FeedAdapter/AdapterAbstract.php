<?php


namespace FeedAdapter;


use App\Entity\Feed;
use GuzzleHttp\Client;

abstract class AdapterAbstract
{

    private $client;
    protected $request_endpoint;


    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    abstract public function get(\DateTime $date);

    /**
     * @return \Psr\Http\Message\ResponseInterface
     */
    private function request()
    {
        if(!isset($this->request_endpoint)){
            throw new \BadMethodCallException('Endpoint should be set before request');
        }

        return $this->client->get($this->request_endpoint);
    }


    /**
     * @param $endpoint
     */
    public function setEndpoint($endpoint)
    {
        if(filter_var($endpoint, FILTER_VALIDATE_URL) === false) {
            throw new \InvalidArgumentException('Endpoint should be a valid url');
        }
        $this->request_endpoint = $endpoint;
    }

    /**
     * @param $content
     *
     * @return Feed
     */
    public function parse($content, $loop_element, $url, $description, $title, $publish_date)
    {
        $feeds = [];
        $xml = new \SimpleXMLElement($content);
        foreach($xml->{$loop_element} as $item) {
            array_push($feeds,
                (new Feed())
                    ->setLink($item->{$url})
                    ->setDescription($item->{$description})
                    ->setTitle($item->{$title})
                    ->setPublishDate(new \DateTime($item->{$publish_date}))
            );
        }

        return $feeds;
    }

    /**
     * @param Feed $feed
     *
     * @return Bool
     */
    protected function save(Feed $feed, \PDO $pdo) {

    }
}