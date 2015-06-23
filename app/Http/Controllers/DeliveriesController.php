<?php namespace App\Http\Controllers;

use Validator;
use Input;
use Redirect;
use Session;
use \App\Http\Models\Sambora;
use \App\Http\Models\Qds;
class DeliveriesController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('deliveries.index', array('data' => '', 'assigned' => '', 'from' => '', 'to' => ''));
	}

	public function actionPost()
	{
		$rules = array(
            'fromdate'  => 'required',
            'todate'    => 'required',
            'by'    	=> 'required',
        );
        
        $validator = Validator::make(Input::all(), $rules);
        
        // Check if all fields is filled
        if ($validator->fails()) 
        {
            return Redirect::to('deliveries')->withErrors($validator);
        }
        else
        {
        	$data = '';
        	$sambora = new Sambora();
        	$qds = new Qds();
        	if(Input::get('by') == "Chris")
        	{
        		$data = $sambora->getChrisData(Input::get('fromdate'),Input::get('todate'));
				// Session::flash('alert-success', 'Form Submitted Successfully.');
				
				return view('deliveries.index')->with(array('data' => $data, 'assigned' => 'Chris', 'from' => Input::get('fromdate'), 'to' => Input::get('todate')));
        	}
        	elseif(Input::get('by') == "MIS")
        	{
        		$data = $qds->getMISData(Input::get('fromdate'),Input::get('todate'));
				// Session::flash('alert-success', 'Form Submitted Successfully.');

				return view('deliveries.index')->with(array('data' => $data, 'assigned' => 'MIS', 'from' => Input::get('fromdate'), 'to' => Input::get('todate')));

        	}
        	else
        	{
        		Session::flash('alert-success', 'No data found.');
        		return view('deliveries.index')->with(array('data' => $data, 'assigned' => '', 'from' => Input::get('fromdate'), 'to' => Input::get('todate')));
        	}
           
        }
	}

}
