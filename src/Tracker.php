<?php
/**
 * Created by PhpStorm.
 * User: Matthew
 * Date: 6/29/2016
 * Time: 12:40 PM
 */

namespace F2klabs\Govtrack;
use F2klabs\Govtrack\request\Request;
use F2klabs\Govtrack\response\Response;

class Tracker {

    public static $request;

    private static function getRequest(){
        return (self::$request)?: new Request();
    }

    public static function bill($id){
        $response = new Response(self::getRequest()->get('bill', $id));

        dd($response);
    }

    public static function bills($options = []){
        $response = new Response(self::getRequest()->search('bill', $options));

        dd($response->getContents());
    }


}