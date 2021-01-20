<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\{Idea,User,Investor};

use Carbon\Carbon;

use Auth;

class UserController extends Controller
{
    
	public function __construct()
    {   
        $this->middleware('auth:web');
    }

    //check idea
    public function checkIdea($idea, $action=null)
    {
    	if($idea==null){
            return 'empty';
        }

    	if($idea->user_id != Auth::user()->id){
        	flash('You have no permission to '.$action.' this idea.')->error();
    		return 'no';
        }

        //cannot do the action if invested
        if($idea->investor_id!=null){
        	flash('You cannot '.$action.' this idea as it is invested.')->error();
    		return 'no';
        }

    }

    //values of categories, idea types and durations 
    public function getValues()
    {
    	$values = [
	    	'categories' => [
	            'Engineering',
	            'Health',
	            'Medicine',
	            'Environment',
	            'Buisness',
	            'Technology',
	            'Teachhing'
	        ],

	        'idea_types' => [
	            'Buisness',
	            'Non-profit'
	        ],

	        'durations' => [
	            '01 month',
	            '02 months',
	            '03 months',
	            '04 months',
	            '05 months',
	            '06 months',
	            '07 months',
	            '08 months',
	            '09 months',
	            '10 months',
	            '11 months',
	            '12 months',
	            '12+ months'
	        ]
	    ];

	    return $values;
    }

    //view pge of creating idea
    public function createIdea()
    {	
    	$values = $this->getValues();

    	return view('idea.create_idea', compact('values'));
    }

    //save idea
    public function saveIdea(Request $request)
    {
    	//validation
    	$request->validate([
            'title' => 'required',
	        'idea' => 'required',
	        'budget' => 'required|numeric',
	        'category' => 'required',
	        'idea_type' => 'required',
	        'duration' => 'required',
	        'image' => 'required'
        ]);

        $idea = new Idea([
            'title' => $request->title,
            'idea' => $request->idea,
            'budget' => $request->budget,
            'category' => $request->category,
            'idea_type' => $request->idea_type,
            'duration' => $request->duration,
            'image' => $request->image
        ]);
        $idea->user_id = Auth::user()->id;
        $idea->save();

        flash('You have created successfully.')->success();
    	return redirect(route('idea.own'));
    }

    //view the page of editing idea
    public function editIdea($idea_id)
    {
    	$idea = Idea::find($idea_id);
        
        $check_result = $this->checkIdea($idea, 'update');
        
        if($check_result=='empty'){
        	return view('layouts.404');
        }elseif($check_result=='no'){
        	return redirect(route('idea.view', ['idea_id' => $idea->id]));
        }

        $values = $this->getValues();

    	return view('idea.edit_idea', compact('idea','values'));
    }

    //update idea
    public function updateIdea(Request $request, $idea_id)
    {	
    	$idea = Idea::find($idea_id);

    	$check_result = $this->checkIdea($idea, 'update');
        
        if($check_result=='empty'){
        	return view('layouts.404');
        }elseif($check_result=='no'){
        	return redirect(route('idea.view', ['idea_id' => $idea->id]));
        }
    	
    	//validation
    	$request->validate([
            'title' => 'required',
	        'idea' => 'required',
	        'budget' => 'required',
	        'category' => 'required',
	        'idea_type' => 'required',
	        'duration' => 'required',
	        'image' => 'required'
        ]);

        $idea->title = $request->title;
        $idea->idea = $request->idea;
        $idea->budget = $request->budget;
        $idea->category = $request->category;
        $idea->idea_type = $request->idea_type;
        $idea->duration = $request->duration;
        $idea->image = $request->image;
        $idea->save();

        flash('You have updated successfully.')->success();
    	return redirect(route('idea.view', ['idea_id' => $idea_id]));
    }

    //delete idea
    public function deleteIdea($idea_id)
    {
    	$idea = Idea::find($idea_id);
        
     	$check_result = $this->checkIdea($idea, 'delete');
        
        if($check_result=='empty'){
        	return view('layouts.404');
        }elseif($check_result=='no'){
        	return redirect(route('idea.view', ['idea_id' => $idea->id]));
        }
        
        $idea->delete();
        
        flash('You have deleted successfully.')->success();
    	return redirect(route('idea.own'));
    }
}
