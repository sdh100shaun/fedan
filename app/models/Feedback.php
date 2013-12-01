<?php
/**
 * Created by PhpStorm.
 * User: shaunhare
 * Date: 30/11/2013
 * Time: 12:19
 */


use Jenssegers\Mongodb\Model as Eloquent;

class Feedback extends Eloquent  {

    protected $collection = 'feedback';

    public static $rules = array(
        'happened'=>'required|alpha|min:2',
        'doing'=>'required|alpha|min:2',
        'rating'=>'digitsbetween:0,7',
        'page'=>"required",
        'user'=>"required"
    );
}