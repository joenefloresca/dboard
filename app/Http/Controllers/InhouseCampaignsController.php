<?php namespace App\Http\Controllers;

use Validator;
use Input;
use Redirect;
use Session;
use \App\Http\Models\Inhouse;
class InhouseCampaignsController extends Controller {

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
		return view('inhouse.index', array('data' => '', 'assigned' => '', 'from' => '', 'to' => ''));
	}

	public function actionPost()
	{
		$rules = array(
            'fromdate'   => 'required',
            'todate'     => 'required',
            'campaign'   => 'required',
        );

        $validator = Validator::make(Input::all(), $rules);
        
        // Check if all fields is filled
        if ($validator->fails()) 
        {
            return Redirect::to('inhouse')->withErrors($validator);
        }
        else
        {
        	$totalresultCountProduced = 0;
        	$inhouse = new Inhouse();
        	$data = $inhouse->getColumnHeader(Input::get('fromdate'),Input::get('todate'),Input::get('campaign'));

        	foreach ($data as $key => $value) 
        	{

        		$queryProduced = $inhouse->queryProduced(Input::get('fromdate'),Input::get('todate'),$value->ColumnHeaderName,Input::get('campaign'));
        		$resultCountProduced = count($queryProduced);
        		var_dump($resultCountProduced);
        		//var_dump($key);
        		//var_dump($queryProduced[$key]->costprice);
        		
        	}

        	exit;
        }


	}

	

}
