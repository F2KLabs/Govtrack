<?php
/**
 * Created by PhpStorm.
 * User: Matthew
 * Date: 6/29/2016
 * Time: 1:43 PM
 */

namespace F2klabs\Govtrack\Models;
use Illuminate\Support\Collection;

class Bill extends Base {

    public $endpoint = 'bill';

    public function __construct($id)
    {
        parent::__construct();

        //TODO: Need to do some form of error handling here.
        $this->attributes = $this->find($id);
    }

    public function sponsor()
    {
        return new Person($this->sponsor->id);
    }

    public static function all(){
        return Collection::make(self::search('bill'));
    }



}