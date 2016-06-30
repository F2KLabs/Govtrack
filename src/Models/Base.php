<?php
/**
 * Created by PhpStorm.
 * User: Matthew
 * Date: 6/29/2016
 * Time: 1:42 PM
 */

namespace F2klabs\Govtrack\Models;

use Illuminate\Support\Collection;
use F2klabs\Govtrack\request\Request;
use F2klabs\Govtrack\response\Response;

class Base {

    public $attributes;
    public $request;

    public $last_search_params;


    public function __construct(){
        $this->request = $this->getRequest();
    }


    /**
     * @param $id
     * @return mixed
     */
    public function find($id){
        $response = new Response($this->request->get($this->endpoint, $id));
        return $response->getContents();
    }

    /**
     * @return Request
     */
    protected function getRequest()
    {
        return ($this->request)?: new Request();
    }

    /**
     * @param $attr
     * @return null|static
     */
    public function __get($attr)
    {
        if(is_array($this->attributes->{$attr}))
            return Collection::make($this->attributes->{$attr});

        return ($this->attributes->{$attr})?: null;
    }

    /**
     * @param array $options
     * @return mixed
     */
    public static function search($endpoint, $options = []){
        $request = new Request();
        $response = new Response($request->search($endpoint, $options));

        return $response->getContents()->objects;
    }
}