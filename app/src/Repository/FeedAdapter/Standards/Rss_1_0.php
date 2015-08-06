<?php
/**
 * Created by PhpStorm.
 * User: engin
 * Date: 30/07/15
 * Time: 01:46
 */

namespace FeedAdapter\Standards;


interface Rss_1_0 {

    const root = 'rdf';
    const channel = 'channel';
    const item = 'item';
    const title = 'title';
    const description = 'description';
    const publish_date = 'dc:date';
    const url = 'link';
}