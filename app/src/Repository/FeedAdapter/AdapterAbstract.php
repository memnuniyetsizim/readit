<?php


namespace FeedAdapter;


use App\Entity\Feed;
use App\Repository\FeedAdapter\Exception\ParserException;
use GuzzleHttp\Client;

abstract class AdapterAbstract
{

    protected $elements = [
        'item' => 'item',
        'title' => 'title',
        'description' => 'description',
        'publishDate' => 'pubDate',
        'url' => 'link'
    ];

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
    protected function request()
    {
        if (!isset($this->request_endpoint)) {
            throw new \BadMethodCallException('Endpoint should be set before request');
        }

        return $this->client->get($this->request_endpoint);
    }


    /**
     * @param $endpoint
     */
    public function setEndpoint($endpoint)
    {
        if (filter_var($endpoint, FILTER_VALIDATE_URL) === false) {
            throw new \InvalidArgumentException('Endpoint should be a valid url');
        }
        $this->request_endpoint = $endpoint;
    }

    /**
     * @param $content
     * @return array
     * @throws ParserException
     */
    public function parse($content)
    {
        try {
            $feeds = [];
            $xml = new \SimpleXMLElement($content);
            foreach ($xml->{$this->elements['item']} as $item) {
                array_push($feeds,
                    (new Feed())
                        ->setLink($item->{$this->elements['url']})
                        ->setDescription($item->{$this->elements['description']})
                        ->setTitle($item->{$this->elements['title']})
                        ->setPublishDate(new \DateTime($item->{$this->elements['publishDate']}))
                );
            }
            return $feeds;
        } catch (\Exception $e) {
            throw new ParserException($e);
        }
    }

    /**
     * @param Feed $feed
     * @param \PDO $pdo
     */
    protected function save(Feed $feed, \PDO $pdo)
    {

    }
}
