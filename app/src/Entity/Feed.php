<?php

namespace App\Entity;


/**
 * Represents a single feed
 *
 * @package App\Entity
 */
class Feed
{

    /**
     * Url of the feed's homepage
     *
     * @var string
     */
    public $homepage;

    /**
     * Url of the feed source
     *
     * @var string
     */
    public $feedUrl;

    /**
     * Last update time of the feed
     *
     * @var \DateTime
     */
    public $updatedAt;

    /**
     * Adding time of the feed
     *
     * @var \DateTime
     */
    public $createdAt;

    /**
     * Type of the feed it can be one of atom, rss, tweet list or repo
     * @var string
     */
    public $feedType;
}