<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\{Idea,User,Investor};

use Carbon\Carbon;

use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {   
        $this->middleware('auth:web,investor');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        //view all ideas
        $ideas = Idea::latest()->paginate(7);
        
        return view('home', compact('ideas'));
    }

    //view single idea
    public function getIdea($idea_id)
    {   
        $idea = Idea::find($idea_id);

        if($idea==null){
            return view('layouts.404');
        }
        return view('idea.single_idea', compact('idea'));
    }

    //view individual shared or invested ideas
    public function getMyIdea()
    {   
        $my_ideas = null;

        if(Auth::guard('investor')->check()){
            $my_ideas = Idea::where('investor_id', Auth::guard('investor')->user()->id)
                            ->latest()
                            ->get();
        }else{
            $my_ideas = Idea::where('user_id', Auth::user()->id)
                            ->latest()
                            ->get();

        }

        return view('idea.my_ideas', compact('my_ideas'));

    }

}
