<?php
/**
 * Created by PhpStorm.
 * User: Matthew
 * Date: 6/29/2016
 * Time: 1:43 PM
 */

namespace F2klabs\Govtrack\Models;
use F2klabs\Govtrack\Tracker;
use Illuminate\Support\Collection;

class Bill extends Base {

    public $attributes;

    public function __construct($id)
    {
        parent::__construct();

        //TODO: Need to do some form of error handling here.
        $this->attributes = $this->find($id);
    }

    public function __get($attr)
    {
        if(is_array($this->attributes->attr))
            return Collection::make($this->attributes->attr);

        return ($this->attributes->$attr)?: null;
    }

    public static function all()
    {
        return Collection::make(self::search());
    }

}