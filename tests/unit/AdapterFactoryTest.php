<?php


class AdapterFactoryTest extends \Codeception\TestCase\Test
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

    public function testClassName()
    {
        $this->assertSame('Rss_1_0', \FeedAdapter\AdapterFactory::getClassName('RSS 1.0'));
        $this->assertSame('Atom', \FeedAdapter\AdapterFactory::getClassName('Atom'));
    }

    public function testRss10()
    {
        $this->assertInstanceOf('\FeedAdapter\Adapters\Rss_1_0', \FeedAdapter\AdapterFactory::get('RSS 1.0'));
    }

    public function testException()
    {
        $this->setExpectedException('\FeedAdapter\Exception\AdapterNotFound');
        $adapter = \FeedAdapter\AdapterFactory::get('NonExistingStandart');
    }
}
