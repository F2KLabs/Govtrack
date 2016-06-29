<?php
/**
 * Created by PhpStorm.
 * User: Matthew
 * Date: 6/29/2016
 * Time: 12:13 PM
 */

namespace F2klabs\Govtrack\request;


class BillRequest extends Request {


    public $endpoint = 'bill';

    public function __construct()
    {
        $this->setClient();
    }

    public function search($params)
    {

    }
}