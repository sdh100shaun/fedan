<?php
/**
 * Created by PhpStorm.
 * User: shaunhare
 * Date: 30/11/2013
 * Time: 19:13
 */


class FeedbackController extends BaseController
{

    public function __construct()
    {


        $this->beforeFilter('csrf', array('on' => 'post'));
    }


    public function postFeedback()
    {

        $validator = Validator::make(Input::all(), Feedback::$rules);

        if ($validator->passes()) {
            $feedback = new Feedback();
            $feedback->happened = Input::get('happened');
            $feedback->doing = Input::get('doing');
            $feedback->rating = Input::get('rating');
            $feedback->user = Input::get('user');
            $feedback->page = Input::get('page');
            $working = Input::get('work');
            $feedback->working = empty($working)? "no":$working;
            $feedback->save();

            $user = filter_var(Input::get('user'),FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $page=Input::get('page');

            return Redirect::to('feedback/thanks')->with(array('message'=>$user,'url'=>$page));

        } else {

            return Redirect::to('feedback/errors')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
        }

    }

    public function getErrors()
    {

        return View::make('feedback.errors',array("user"=>Input::old('user')));

    }

    public function getThanks()
    {

        return View::make('feedback.thanks');

    }

    public function showForm($user)
    {
        $currentDateTime = new DateTime();

        return View::make('feedback.index', array("user" => $user, "today" => $currentDateTime->getTimestamp(), "page" => Input::get('url')));
    }


} 