<?php

namespace FeedAdapter;


interface AdapterInterface {

    public function get(\DateTime $date);
}