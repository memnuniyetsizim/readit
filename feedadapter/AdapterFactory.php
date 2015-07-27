<?php

namespace FeedAdapter;


class AdapterFactory {

    private $adapters = [];
    private $methods = [];

    public function __construct(){
        // build method mapping
        $this->methods = [
            'planetphp' => 'getPlanetPhp',
            'planetmysql' => 'getPlanetMysql'
        ];
    }
    public function get($id){
        $id = strtolower($id);
        if (isset($this->adapters[$id])) {
            return $this->adapters[$id];
        }

        if (!isset($this->methods[$id])) {
            throw new \Exception('Adapter not found');
        }

        $method = $this->methods[$id];

        return call_user_func([ $this, $method ]);
    }

    /**
     * @return Adapters\PlanetPhp
     */
    private function getPlanetPhp(){

        return $this->adapters['planetphp'] = new Adapters\PlanetPhp();
    }

    private function getPlanetMysql(){
        return $this->adapters['planetmysql'] = new Adapters\PlanetMysql();
    }
}