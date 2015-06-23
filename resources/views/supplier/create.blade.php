@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-primary">
				<div class="panel-heading">Add Suplier</div>
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

					<form class="form-horizontal" role="form" method="POST" action="{{ url('supplier') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">Company Name</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="CompanyName" id="CompanyName" value="{{ old('CompanyName') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Company Alias</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="CompanyAlias" id="CompanyAlias" value="{{ old('CompanyAlias') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Registration Number</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="CompanyRegistrationNumber" id="CompanyRegistrationNumber" value="{{ old('CompanyRegistrationNumber') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Registered Address</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="RegisteredAddress" id="RegisteredAddress" value="{{ old('RegisteredAddress') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Country</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="Country" id="Country" value="{{ old('Country') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Name of Owner/Director/CEO</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="CompanyOwner" id="CompanyOwner" value="{{ old('CompanyOwner') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Phone Number</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="PhoneNumber" id="PhoneNumber" value="{{ old('PhoneNumber') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Fax Number</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="FaxNumber" id="FaxNumber" value="{{ old('FaxNumber') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Email</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="Email" id="Email" value="{{ old('Email') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Website</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="Website" id="Website" value="{{ old('Website') }}">
							</div>
						</div>
						

						<div class="form-group">
							<label class="col-md-4 control-label">Type</label>
							<div class="col-md-6">
								<select name="Type" id="Type" class="form-control">
									<option value="">Choose One</option>
									<option value="Outsource">Outsource</option>
									<option value="Wholesale Partners">Wholesale Partners</option>
								</select>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Submit
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
