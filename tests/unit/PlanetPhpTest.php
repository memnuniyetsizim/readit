<?php


class PlanetPhpTest extends \Codeception\TestCase\Test
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

    // tests
    public function testMe()
    {

    }

    public function testParser() {
        $data = file_get_contents(__DIR__.'/../../data/rss10.xml');

        $parser = new \FeedAdapter\Adapters\PlanetPhp();
        $response = $parser->parse($data);

        foreach ($response as $r) {
            $this->assertInstanceOf('\App\Entity\Feed', $r);
        }
    }
}