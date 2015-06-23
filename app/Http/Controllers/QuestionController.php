<?php namespace App\Http\Controllers;

use Validator;
use Input;
use Redirect;
use Session;
use View;
use \App\Http\Models\Question;
use DB;

class QuestionController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{
		return view('question.index');
	}

	public function apiGetCampaigns()
	{
		$campaigns = Campaign::orderBy('id', 'DESC')->get();
		return json_encode($campaigns);
	}

	public function create()
	{
		$campaign_options = array('' => 'Choose One') + DB::table('campaigns')->lists('CampaignName','id');
		return view('question.create')->with(array('campaign_options' => $campaign_options));
	}

	public function store()
	{
		$rules = array(
            'CampaignName'     		 => 'required|unique:campaigns',
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) 
        {
            return Redirect::to('campaign/create')->withErrors($validator);
        }
        else
        {
        	$campaign = new Campaign;
            $campaign->CampaignName 			= Input::get('CampaignName');
            $campaign->save();
           
            Session::flash('alert-success', 'Form Submitted Successfully.');

            return Redirect::to('campaign/create');
        }
	}

	public function edit($id)
	{
		$campaign = Campaign::find($id);
		return View::make('campaign.edit')->with('campaign', $campaign);
	}

	public function update($id)
	{
		$rules = array(
            'CampaignName'           => 'required|unique:campaigns',
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) 
        {
            return Redirect::to('campaign')->withErrors($validator);
        }
        else
        {
            $campaign = Campaign::find($id);
            $campaign->CampaignName             = Input::get('CampaignName');
            $campaign->save();
           
            Session::flash('alert-success', 'Campaign Updated Successfully.');

            return Redirect::to('campaign');
        }
	}

	public function destroy($id)
    {
        
        $campaign = Campaign::find($id);
        $campaign->delete();
       
        Session::flash('alert-success', 'Successfully deleted the campaign!');
        return Redirect::to('campaign');
    }

	

}
