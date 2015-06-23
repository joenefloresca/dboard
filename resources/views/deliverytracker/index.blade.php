@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-4">
			<div class="panel panel-primary">
				<div class="panel-heading">Sort Data</div>
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

					<form class="form-horizontal" role="form" method="POST" action="{{ url('deliverytracker') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">From</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="fromdate" id="fromdate" value="">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">To</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="todate" id="todate" value="">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Status</label>
							<div class="col-md-6">
								<select class="form-control" id="status">
									<option value="">Choose One</option>
									<option value=="Completed">Completed</option>
									<option value=="Pending">Pending</option>
									<option value=="Cancelled">Cancelled</option>
								</select>
							</div>
						</div>

						<!-- <div class="form-group">
							<label class="col-md-4 control-label">Table</label>
							<div class="col-md-6">
								<select class="form-control">
									<option value="">Choose One</option>
									<option value=="Completed">Completed</option>
									<option value=="Pending">Pending</option>
									<option value=="Cancelled">Cancelled</option>
								</select>
							</div>
						</div> -->
						

						<div class="form-group">
							<div class="col-md-4">
								<button type="button" id="btnClear" class="btn btn-warning">
									Clear Data
								</button>
							</div>
							<div class="col-md-4">
								<button type="button" id="btnSort" class="btn btn-primary">
									Submit
								</button>
							</div>
							
						</div>


					</form>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="panel panel-info">
				<div class="panel-heading">Delivery Tracking</div>
				<div class="panel-body">
					Dashboard Content
					
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="panel panel-info">
				<div class="panel-heading">Delivery Tracking</div>
				<div class="panel-body">
					Dashboard Content
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="loading-progress" id="progressbar" style="padding-left: 2px; padding-right: 2px; padding-top: 2px"></div>
			<div class="panel panel-primary">
				<div class="panel-heading">Result: Completed Deliveries</div>
				<div class="panel-body">
					<table id="myTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
					        <tr>
					            <th>Delivery Status</th>
                                <th>Ref. Number</th>
                                <th>PO #</th>
                                <th>Count</th>
                                <th>Delivery QTY</th>
                                <th>Date Delivered</th>
                                <th>Filename</th>
                                <th>Invoice #</th>
                                <th>Date Invoice</th>
					        </tr>
					    </thead>
					    <tbody>
					    
					    </tbody>
					</table>
				</div>
			</div>
			<div class="panel panel-danger">
				<div class="panel-heading">Result: Pending Deliveries</div>
				<div class="panel-body">
					<table id="myTablePending" class="table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
					        <tr>
					            <th>Delivery Status</th>
                                <th>Ref. Number</th>
                                <th>PO #</th>
                                <th>Count</th>
                                <th>Delivery QTY</th>
                                <th>Date Delivered</th>
                                <th>Filename</th>
                                <th>Invoice #</th>
                                <th>Date Invoice</th>
					        </tr>
					    </thead>
					    <tbody>
					    
					    </tbody>
					</table>
					<div class="loadingscreen"><!-- Place at bottom of page --></div>

				</div>
			</div>
		</div>
	</div>
</div>
@endsection
