<?php


class Rss_1_0Test extends \Codeception\TestCase\Test
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

    public function testParser() {
        $data = file_get_contents(__DIR__.'/../_data/rss10.xml');

        $parser = new \FeedAdapter\Adapters\Rss_1_0(new \GuzzleHttp\Client());
        $response = $parser->parse($data);

        foreach ($response as $r) {
            $this->assertInstanceOf('\App\Entity\Feed', $r);
        }
    }

    public function testRequest()
    {
        $this->markTestIncomplete('should be implemented');
    }
}