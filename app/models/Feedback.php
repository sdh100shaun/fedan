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

}