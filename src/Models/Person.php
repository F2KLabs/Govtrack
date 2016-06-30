<?php
/**
 * Created by PhpStorm.
 * User: Matthew
 * Date: 6/30/2016
 * Time: 10:40 AM
 */

namespace F2klabs\Govtrack\Models;


class Person extends Base
{

    public $endpoint = 'person';

    public function __construct($id){
        parent::__construct();

        $this->attributes = $this->find($id);
    }

    public static function all()
    {
        return parent::all('person');
    }


}