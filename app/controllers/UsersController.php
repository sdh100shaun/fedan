<?php
/**
 * Created by PhpStorm.
 * User: shaunhare
 * Date: 30/11/2013
 * Time: 11:28
 */




class UsersController extends \BaseController{


    protected $layout = "layouts.main";

    public function __construct() {
        $this->beforeFilter('csrf', array('on'=>'post'));


        //$this->beforeFilter('auth', array('only'=>array('getDashboard')));

    }

    public function getIndex()
    {
        return Redirect::to('users/login')->with('message', 'Please login!');
    }
    public function getLogin()
    {

        $this->layout->content = View::make('users.login');
    }

    public function getRegister() {
        $this->layout->content = View::make('users.register');
    }

    public function postCreate() {

        $validator = Validator::make(Input::all(), User::$rules);

        if ($validator->passes()) {
            $user = new User;
            $user->firstname = Input::get('firstname');
            $user->lastname = Input::get('lastname');
            $user->email = Input::get('email');
            $user->password = Hash::make(Input::get('password'));
            $user->save();

            return Redirect::to('users/login')->with('message', 'Thanks for registering!');
        } else {
            return Redirect::to('users/register')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
        }
    }


    public function postSignin() {
        if (Auth::attempt(array('email'=>Input::get('email'), 'password'=>Input::get('password')))) {
            return Redirect::to('users/dashboard')->with('message', 'You are now logged in!');
        } else {
            return Redirect::to('users/login')
                ->with('message', 'Your username/password combination was incorrect')
                ->withInput();
        }
    }


    public function getDashboard(){

        $feedback = Feedback::all();
        $pagesCount = Feedback::count();
        $statistics = new Statistics();
        $ratingAvg = $statistics->showRatings();
        $this->layout->content = View::make('users.dashboard',array('feedback' => $feedback,"pages"=>$pagesCount,"rating"=>$ratingAvg) );
    }

    public function getLogout()
    {
        Auth::logout();
        return Redirect::to('users/login')->with('message', 'Your are now logged out');
    }
} 