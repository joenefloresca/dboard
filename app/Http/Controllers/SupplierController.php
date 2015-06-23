<?php namespace App\Http\Controllers;

use Validator;
use Input;
use Redirect;
use Session;
use View;
use \App\Http\Models\Supplier;

class SupplierController extends Controller {

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

	public function index()
	{
		return view('supplier.index');
	}

	public function apiGetSuppliers()
	{
		$suppliers = Supplier::orderBy('id', 'DESC')->get();
		return json_encode($suppliers);
	}

	public function create()
	{
		return view('supplier.create');
	}

	public function store()
	{
		$rules = array(
            'CompanyName'     		         => 'required|unique:suppliers',
            'CompanyAlias'  			     => 'required',
            'CompanyRegistrationNumber'  	 => 'required',
            'RegisteredAddress'  	 		 => 'required',
            'Country'  	                     => 'required',
            'CompanyOwner'  	             => 'required',
            'PhoneNumber'  	 	             => 'required',
            'FaxNumber'  	 	             => 'required',
            'Email'  	                     => 'required',
            'Website'  	                     => 'required',
            'Type'  	                     => 'required',
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) 
        {
            return Redirect::to('supplier/create')->withErrors($validator);
        }
        else
        {
        	$supplier = new Supplier;
            $supplier->CompanyName 			        = Input::get('CompanyName');
            $supplier->CompanyAlias 			    = Input::get('CompanyAlias');
            $supplier->CompanyRegistrationNumber 	= Input::get('CompanyRegistrationNumber');
            $supplier->RegisteredAddress 			= Input::get('RegisteredAddress');
            $supplier->Country 			            = Input::get('Country');
            $supplier->CompanyOwner 	            = Input::get('CompanyOwner');
            $supplier->PhoneNumber 		            = Input::get('PhoneNumber');
            $supplier->FaxNumber 				    = Input::get('FaxNumber');
            $supplier->Email 		                = Input::get('Email');
            $supplier->Website 	                    = Input::get('Website');
            $supplier->Type 		                = Input::get('Type');
            $supplier->save();
           
            Session::flash('alert-success', 'Form Submitted Successfully.');

            return Redirect::to('supplier/create');
        }
	}

	public function edit($id)
	{
		$supplier = Supplier::find($id);
		return View::make('supplier.edit')->with('supplier', $supplier);
	}

	public function update($id)
	{
		$rules = array(
            //'CompanyName'                    => 'required|unique:suppliers',
            'CompanyAlias'                   => 'required',
            'CompanyRegistrationNumber'      => 'required',
            'RegisteredAddress'              => 'required',
            'Country'                        => 'required',
            'CompanyOwner'                   => 'required',
            'PhoneNumber'                    => 'required',
            'FaxNumber'                      => 'required',
            'Email'                          => 'required',
            'Website'                        => 'required',
            'Type'                           => 'required',
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) 
        {
            return Redirect::to('supplier')->withErrors($validator);
        }
        else
        {
            $supplier = Supplier::find($id);
            $supplier->CompanyName                  = Input::get('CompanyName');
            $supplier->CompanyAlias                 = Input::get('CompanyAlias');
            $supplier->CompanyRegistrationNumber    = Input::get('CompanyRegistrationNumber');
            $supplier->RegisteredAddress            = Input::get('RegisteredAddress');
            $supplier->Country                      = Input::get('Country');
            $supplier->CompanyOwner                 = Input::get('CompanyOwner');
            $supplier->PhoneNumber                  = Input::get('PhoneNumber');
            $supplier->FaxNumber                    = Input::get('FaxNumber');
            $supplier->Email                        = Input::get('Email');
            $supplier->Website                      = Input::get('Website');
            $supplier->Type                         = Input::get('Type');
            $supplier->save();
           
            Session::flash('alert-success', 'Supplier Updated Successfully.');

            return Redirect::to('supplier');
        }
	}

	public function destroy($id)
    {
        
        $supplier = Supplier::find($id);
        $supplier->delete();
       
        Session::flash('alert-success', 'Successfully deleted the supplier!');
        return Redirect::to('supplier');
    }

	

}
