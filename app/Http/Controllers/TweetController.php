<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use App\Tweet;
use Carbon\Carbon;
use Facebook\Facebook;
use App\FacebookUser;
class TweetController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'body' => 'required|string|max:200',
        ]);
    }
    public function index()
    {
    	return view('tweet');
    }
    public function publishTweet(Request $request)
    {
    		$this->validator($request->all())->validate();
    		$tweet = new Tweet;
    		$tweet->body = $request['body'];
    		$tweet->published_at = Carbon::now();
            $user = Auth::user();
    		$tweet->user_id = $user->id;
    		$tweet->save();
            

            
    		//return redirect('home');
    }
}
