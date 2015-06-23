@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-info">
				<div class="panel-heading">Edit Client Information</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
					<div class="flash-message">
				        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
				          @if(Session::has('alert-' . $msg))
				          <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
				          @endif
				        @endforeach
			        </div>

					{!! Form::model($client, array('route' => array('client.update', $client->id), 'method' => 'PUT', 'class' => 'form-horizontal')) !!}
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">Client Name</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="ClientName" id="ClientName" value="{{ $client->ClientName }}" readonly="readonly">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Trading Name</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="TradingName" id="TradingName" value="{{ $client->TradingName }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Registration Number</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="RegistrationNumber" id="RegistrationNumber" value="{{ $client->RegistrationNumber }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Name of Owner/Director/CEO</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="ClientOwner" id="ClientOwner" value="{{ $client->ClientOwner }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Client Code</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="ClientCode" id="ClientCode" value="{{ $client->ClientCode }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Registered Address</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="RegisteredAddress" id="RegisteredAddress" value="{{ $client->RegisteredAddress }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Client Country</label>
							<div class="col-md-6">
								{!! Form::select('ClientCountry', ['' => 'Choose One', 'UK' => 'UK', 'AU' => 'AU', 'NZ' => 'NZ'], $client->ClientCountry, array('class' => 'form-control')) !!}
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Postcode</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="Postcode" id="Postcode" value="{{ $client->Postcode }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Contact Person and Designation</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="ContactPerson" id="ContactPerson" value="{{ $client->ContactPerson }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Phone Number</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="ClientPhoneNumber" id="ClientPhoneNumber" value="{{ $client->ClientPhoneNumber }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Fax Number</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="ClientFaxNumber" id="ClientFaxNumber" value="{{ $client->ClientFaxNumber }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Website</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="ClientWebsite" id="ClientWebsite" value="{{ $client->ClientWebsite }}">
							</div>
						</div>
						
				</div>
			</div>

			<div class="panel panel-info">
				<div class="panel-heading">Sales / Account Details</div>
				<div class="panel-body">
					<div class="form-horizontal">
						<div class="form-group">
							<label class="col-md-4 control-label">Contact Person and Designation</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="SalesContactPerson" id="SalesContactPerson" value="{{ $client->SalesContactPerson }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Phone Number</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="SalesPhoneNumber" id="SalesPhoneNumber" value="{{ $client->SalesPhoneNumber }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Fax Number</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="SalesFaxNumber" id="SalesFaxNumber" value="{{ $client->SalesFaxNumber }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Email</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="SalesEmail" id="SalesEmail" value="{{ $client->SalesEmail }}">
							</div>
						</div>

					
					</div>
				</div>
			</div>

			<div class="panel panel-info">
				<div class="panel-heading">Payment Information: Invoicing / Payments</div>
				<div class="panel-body">
					<div class="form-horizontal">
						<div class="form-group">
							<label class="col-md-4 control-label">Contact Person and Designation</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="PaymentContactPerson" id="PaymentContactPerson" value="{{ $client->PaymentContactPerson }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Phone Number</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="PaymentPhoneNumber" id="PaymentPhoneNumber" value="{{ $client->PaymentPhoneNumber }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Fax Number</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="PaymentFaxNumber" id="PaymentFaxNumber" value="{{ $client->PaymentFaxNumber }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Email</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="PaymentEmail" id="PaymentEmail" value="{{ $client->PaymentEmail }}">
							</div>
						</div>
					
					</div>
				</div>
			</div>

			<div class="panel panel-info">
				<div class="panel-heading">Bank Details</div>
				<div class="panel-body">
					<div class="form-horizontal">
						<div class="form-group">
							<label class="col-md-4 control-label">Bank Name</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="BankName" id="BankName" value="{{ $client->BankName }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Bank Address</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="BankAddress" id="BankAddress" value="{{ $client->BankAddress }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Bank Account Name</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="BankAccountName" id="BankAccountName" value="{{ $client->BankAccountName }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Bank Account Number</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="BankAccountNumber" id="BankAccountNumber" value="{{ $client->BankAccountNumber }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Sort Code</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="BankSortCode" id="BankSortCode" value="{{ $client->BankSortCode }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">IBAN Number</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="BankIbanNumber" id="BankIbanNumber" value="{{ $client->BankIbanNumber }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Swift Code</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="BankSwiftCode" id="BankSwiftCode" value="{{ $client->BankSwiftCode }}">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Edit
								</button>
							</div>
						</div>
					{!! Form::close() !!}
					
					</div>
				</div>
			</div>


		</div>
	</div>
</div>
@endsection
