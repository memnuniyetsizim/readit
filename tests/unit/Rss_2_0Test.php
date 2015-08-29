<?php


class Rss_2_0Test extends \Codeception\TestCase\Test
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    public function testParser()
    {
        $data = file_get_contents(__DIR__ . '/../_data/rss20.xml');

        $parser = new \FeedAdapter\Adapters\Rss_2_0(new \GuzzleHttp\Client());
        $response = $parser->parse($data);

        foreach ($response as $r) {
            $this->assertInstanceOf('\App\Entity\Feed', $r);
        }
    }

    public function testRequest()
    {
        //$feedUrl = 'http://feeds.reuters.com/news/artsculture?format=xml';
        $this->markTestIncomplete('should be implemented');
    }
}
