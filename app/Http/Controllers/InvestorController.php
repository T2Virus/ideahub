<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\{Idea,User,Investor};

use Carbon\Carbon;

use Auth;

class InvestorController extends Controller
{
    public function __construct()
    {   
        $this->middleware('auth:investor');
    }

    //invest idea
    public function investIdea($idea_id)
    {
    	$idea = Idea::find($idea_id);

        if($idea==null){
            return view('layouts.404');
        }
        if($idea->investor_id!=null){
        	flash('This idea is already invested.')->error();
        	return redirect(route('idea.view', ['idea_id' => $idea_id]));
        }
        $idea->investor_id = Auth::guard('investor')->user()->id;
        $idea->save();
        flash('Congratulation. Thanks for investing.')->success();
    	return redirect(route('idea.view', ['idea_id' => $idea_id]));
    }
}
