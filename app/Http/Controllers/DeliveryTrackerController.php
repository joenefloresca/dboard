<?php namespace App\Http\Controllers;

use \App\Http\Models\DeliveryTracking;
use Validator;
use Input;
use Redirect;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class DeliveryTrackerController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	// public function __construct()
	// {
	// 	$this->middleware('auth');
	// }

	public function deliveryIndex()
	{
		return view('deliverytracker.index');
	}


	public function deliveryIndexApiComplete()
	{
		
		$data = new DeliveryTracking();
		return json_encode($data->getAllDeliveriesCompleted());
		
	}

	public function deliveryIndexApiPending()
	{
		
		$data = new DeliveryTracking();
		return json_encode($data->getAllDeliveriesPending());
		
	}

	public function getDeliveriesSorted()
	{
		$from 	= Input::get('fromdate');
        $to 	= Input::get('todate');
		$data = new DeliveryTracking();
		return json_encode($data->getDeliveries($from, $to));
	}

	public function getDeliveries()
	{
		$rules = array(
            // 'fromdate'  => 'required',
            // 'todate'    => 'required',
        );
        
        $validator = Validator::make(Input::all(), $rules);
        
        // Check if all fields is filled
        if ($validator->fails()) 
        {
            return Redirect::to('deliverytracker')->withErrors($validator);
        }
        else
        {
        	$from 	= Input::get('fromdate');
        	$to 	= Input::get('todate');

        	$deliveries = new DeliveryTracking();
			$result = $deliveries->getDeliveries($from, $to);

			// Get the current page from the url if it's not set default to 1
			$page = Input::get('page', 1); 

			// // Number of items per page
			$perPage = 5;

			// $result->setPath('deliverytracker/');
			$data = $this->paginate($result, $perPage, 1);
			$data->appends(['fromdate' => $from, 'todate' => $to]);


			return view('deliverytracker.index')->with(array('result' => $result));
			
        }
		
	}

	public function paginate($items,$perPage,$pageStart=1)
    {  
        // Start displaying items from this number;
        $offSet = ($pageStart * $perPage) - $perPage; 
        // Get only the items you need using array_slice
        $itemsForCurrentPage = array_slice($items, $offSet, $perPage, true);
        $page = Paginator::resolveCurrentPage();
        
        return new LengthAwarePaginator(
	       	$itemsForCurrentPage, 
	       	count($items), 
	        $perPage,
	        $page,
	        [
            	'path' => Paginator::resolveCurrentPath()
        	]
        );
    }




}
