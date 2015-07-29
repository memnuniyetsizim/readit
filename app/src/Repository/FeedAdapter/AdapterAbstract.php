<?php


namespace FeedAdapter;


use App\Entity\Feed;

abstract class AdapterAbstract
{
    abstract public function request();

    /**
     * @param $content
     *
     * @return Feed
     */
    abstract public function parse($content);

    /**
     * @param Feed $feed
     *
     * @return Bool
     */
    protected function save(Feed $feed, \PDO $pdo) {

    }
}