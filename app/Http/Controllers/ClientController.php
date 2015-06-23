<?php namespace App\Http\Controllers;

use Validator;
use Input;
use Redirect;
use Session;
use View;
use \App\Http\Models\Client;

class ClientController extends Controller {

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
		return view('client.index');
	}

	public function apiGetClients()
	{
		$clients = Client::orderBy('id', 'DESC')->get();
		return json_encode($clients);
	}

	public function create()
	{
		return view('client.create');
	}

	public function store()
	{
		$rules = array(
            'ClientName'     		 => 'required|unique:clients',
            'TradingName'  			 => 'required',
            'RegistrationNumber'  	 => 'required',
            'ClientOwner'  	 		 => 'required',
            'ClientCode'  	         => 'required',
            'RegisteredAddress'  	 => 'required',
            'ClientCountry'  	 	 => 'required',
            'Postcode'  	 	     => 'required',
            'ContactPerson'  	     => 'required',
            'ClientPhoneNumber'  	 => 'required',
            'ClientFaxNumber'  	     => 'required',
            'ClientWebsite'  	     => 'required',
            'SalesContactPerson'  	 => 'required',
            'SalesPhoneNumber'  	 => 'required',
            'SalesFaxNumber'  	     => 'required',
            'SalesEmail'  	         => 'required',
            'PaymentContactPerson'   => 'required',
            'PaymentPhoneNumber'  	 => 'required',
            'PaymentFaxNumber'  	 => 'required',
            'PaymentEmail'  	     => 'required',
            'BankName'  	         => 'required',
            'BankAccountName'  	     => 'required',
            'BankAccountNumber'  	 => 'required',
            'BankSortCode'  	     => 'required',
            'BankIbanNumber'  	     => 'required',
            'BankSwiftCode'  	     => 'required',
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) 
        {
            return Redirect::to('client/create')->withErrors($validator);
        }
        else
        {
        	$clients = new Client;
            $clients->ClientName 			= Input::get('ClientName');
            $clients->TradingName 			= Input::get('TradingName');
            $clients->RegistrationNumber 	= Input::get('RegistrationNumber');
            $clients->ClientOwner 			= Input::get('ClientOwner');
            $clients->ClientCode 			= Input::get('ClientCode');
            $clients->RegisteredAddress 	= Input::get('RegisteredAddress');
            $clients->ClientCountry 		= Input::get('ClientCountry');
            $clients->Postcode 				= Input::get('Postcode');
            $clients->ContactPerson 		= Input::get('ContactPerson');
            $clients->ClientPhoneNumber 	= Input::get('ClientPhoneNumber');
            $clients->ClientFaxNumber 		= Input::get('ClientFaxNumber');
            $clients->ClientWebsite 		= Input::get('ClientWebsite');
            $clients->SalesContactPerson 	= Input::get('SalesContactPerson');
            $clients->SalesPhoneNumber 		= Input::get('SalesPhoneNumber');
            $clients->SalesFaxNumber 		= Input::get('SalesFaxNumber');
            $clients->SalesEmail 			= Input::get('SalesEmail');
            $clients->PaymentContactPerson 	= Input::get('PaymentContactPerson');
            $clients->PaymentPhoneNumber 	= Input::get('PaymentPhoneNumber');
            $clients->PaymentFaxNumber 		= Input::get('PaymentFaxNumber');
            $clients->PaymentEmail 			= Input::get('PaymentEmail');
            $clients->BankName 				= Input::get('BankName');
            $clients->BankAddress 			= Input::get('BankAddress');
            $clients->BankAccountName 		= Input::get('BankAccountName');
            $clients->BankAccountNumber 	= Input::get('BankAccountNumber');
            $clients->BankSortCode 			= Input::get('BankSortCode');
            $clients->BankIbanNumber 		= Input::get('BankIbanNumber');
            $clients->BankSwiftCode 		= Input::get('BankSwiftCode');
            $clients->save();
           
            Session::flash('alert-success', 'Form Submitted Successfully.');

            return Redirect::to('client/create');
        }
	}

	public function edit($id)
	{
		$client = Client::find($id);
		return View::make('client.edit')->with('client', $client);
	}

	public function update($id)
	{
		$rules = array(
            //'ClientName'     		 => 'required|unique:clients',
            'TradingName'  			 => 'required',
            'RegistrationNumber'  	 => 'required',
            'ClientOwner'  	 		 => 'required',
            'ClientCode'  	         => 'required',
            'RegisteredAddress'  	 => 'required',
            'ClientCountry'  	 	 => 'required',
            'Postcode'  	 	     => 'required',
            'ContactPerson'  	     => 'required',
            'ClientPhoneNumber'  	 => 'required',
            'ClientFaxNumber'  	     => 'required',
            'ClientWebsite'  	     => 'required',
            'SalesContactPerson'  	 => 'required',
            'SalesPhoneNumber'  	 => 'required',
            'SalesFaxNumber'  	     => 'required',
            'SalesEmail'  	         => 'required',
            'PaymentContactPerson'   => 'required',
            'PaymentPhoneNumber'  	 => 'required',
            'PaymentFaxNumber'  	 => 'required',
            'PaymentEmail'  	     => 'required',
            'BankName'  	         => 'required',
            'BankAccountName'  	     => 'required',
            'BankAccountNumber'  	 => 'required',
            'BankSortCode'  	     => 'required',
            'BankIbanNumber'  	     => 'required',
            'BankSwiftCode'  	     => 'required',
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) 
        {
            return Redirect::to('client')->withErrors($validator);
        }
        else
        {
        	$clients = Client::find($id);
            $clients->ClientName 			= Input::get('ClientName');
            $clients->TradingName 			= Input::get('TradingName');
            $clients->RegistrationNumber 	= Input::get('RegistrationNumber');
            $clients->ClientOwner 			= Input::get('ClientOwner');
            $clients->ClientCode 			= Input::get('ClientCode');
            $clients->RegisteredAddress 	= Input::get('RegisteredAddress');
            $clients->ClientCountry 		= Input::get('ClientCountry');
            $clients->Postcode 				= Input::get('Postcode');
            $clients->ContactPerson 		= Input::get('ContactPerson');
            $clients->ClientPhoneNumber 	= Input::get('ClientPhoneNumber');
            $clients->ClientFaxNumber 		= Input::get('ClientFaxNumber');
            $clients->ClientWebsite 		= Input::get('ClientWebsite');
            $clients->SalesContactPerson 	= Input::get('SalesContactPerson');
            $clients->SalesPhoneNumber 		= Input::get('SalesPhoneNumber');
            $clients->SalesFaxNumber 		= Input::get('SalesFaxNumber');
            $clients->SalesEmail 			= Input::get('SalesEmail');
            $clients->PaymentContactPerson 	= Input::get('PaymentContactPerson');
            $clients->PaymentPhoneNumber 	= Input::get('PaymentPhoneNumber');
            $clients->PaymentFaxNumber 		= Input::get('PaymentFaxNumber');
            $clients->PaymentEmail 			= Input::get('PaymentEmail');
            $clients->BankName 				= Input::get('BankName');
            $clients->BankAddress 			= Input::get('BankAddress');
            $clients->BankAccountName 		= Input::get('BankAccountName');
            $clients->BankAccountNumber 	= Input::get('BankAccountNumber');
            $clients->BankSortCode 			= Input::get('BankSortCode');
            $clients->BankIbanNumber 		= Input::get('BankIbanNumber');
            $clients->BankSwiftCode 		= Input::get('BankSwiftCode');
            $clients->save();
           
            Session::flash('alert-success', 'Client Updated Successfully.');

            return Redirect::to('client');
        }
	}

	public function destroy($id)
    {
        
        $client = Client::find($id);
        $client->delete();
       
        Session::flash('alert-success', 'Successfully deleted the client!');
        return Redirect::to('client');
    }

	

}
