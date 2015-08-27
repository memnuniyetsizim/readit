<?php


class AtomTest extends \Codeception\TestCase\Test
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
    public function testParser()
    {
        $data = file_get_contents(__DIR__.'/../_data/atom.xml');

        $parser = new \FeedAdapter\Adapters\Atom(new \GuzzleHttp\Client());
        $response = $parser->parse($data);

        foreach ($response as $r) {
            $this->assertInstanceOf('\App\Entity\Feed', $r);
        }
    }
}