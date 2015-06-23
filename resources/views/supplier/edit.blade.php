@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-info">
				<div class="panel-heading">Edit Suplier</div>
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

					{!! Form::model($supplier, array('route' => array('supplier.update', $supplier->id), 'method' => 'PUT', 'class' => 'form-horizontal')) !!}
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">Company Name</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="CompanyName" id="CompanyName" value="{{ $supplier->CompanyName }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Company Alias</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="CompanyAlias" id="CompanyAlias" value="{{ $supplier->CompanyAlias }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Buseness Registration Certificate/Company Registration Number</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="CompanyRegistrationNumber" id="CompanyRegistrationNumber" value="{{ $supplier->CompanyRegistrationNumber }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Registered Address</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="RegisteredAddress" id="RegisteredAddress" value="{{ $supplier->RegisteredAddress }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Country</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="Country" id="Country" value="{{ $supplier->Country }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Name of Owner/Director/CEO</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="CompanyOwner" id="CompanyOwner" value="{{ $supplier->CompanyOwner }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Phone Number</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="PhoneNumber" id="PhoneNumber" value="{{ $supplier->PhoneNumber }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Fax Number</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="FaxNumber" id="FaxNumber" value="{{ $supplier->FaxNumber }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Email</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="Email" id="Email" value="{{ $supplier->Email }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Website</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="Website" id="Website" value="{{ $supplier->Website }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Type</label>
							<div class="col-md-6">
								{!! Form::select('Type', ['' => 'Choose One', 'Outsource' => 'Outsource', 'Wholesale Partners' => 'Wholesale Partners'], $supplier->Type, array('class' => 'form-control')) !!}
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
@endsection
