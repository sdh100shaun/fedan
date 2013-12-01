<?php
/**
 * Created by PhpStorm.
 * User: shaunhare
 * Date: 30/11/2013
 * Time: 19:13
 */

class FeedbackController extends BaseController {

    public function __construct()
    {
        $this->beforeFilter('csrf', array('on'=>'post'));
    }
    public function postFeedback()
    {


        $feedback = new Feedback();
        $feedback->happened = Input::get('happened');
        $feedback->doing = Input::get('doing');
        $feedback->rating = Input::get('rating');
        $feedback->user = Input::get('user');
        $feedback->page = Input::get('page');
        $feedback->save();

    }

    public function showForm($user)
    {
        $currentDateTime = new DateTime();


        return View::make('feedback.index',array("user"=>$user,"today"=>$currentDateTime->getTimestamp()));
    }
} 