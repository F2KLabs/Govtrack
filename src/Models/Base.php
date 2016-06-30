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

    public $params;

    public $last_search_params;
    public $request;

    public function __construct(){
        $this->request = $this->getRequest();
    }

    public function find($id){
        $response = new Response($this->request->get('bill', $id));
        return $response->getContents();
    }

    public static function search($options = []){
        $request = new Request();
        $response = new Response($request->search('bill', $options));

        return $response->getContents()->objects;
    }

    public function getRequest()
    {
        return ($this->request)?: new Request();
    }

    public function __get($attr){
        return ($this->params[$attr]) ?: null;
    }

    public function __set($key, $value){
        $this->params[$key] = $value;
    }
}