@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-primary">
				<div class="panel-heading">Deliveries</div>
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

					<form class="form-horizontal" role="form" method="POST" action="{{ url('deliveries') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">From</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="fromdate" id="fromdate" value="{{ old('fromdate') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">To</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="todate" id="todate" value="{{ old('todate') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">By</label>
							<div class="col-md-6">
								<select class="form-control" name="by" id="by">
								<option value="">Choose One</option>   
								<option value="Chris">Chris</option>   
								<option value="MIS">MIS</option>   
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
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-info">
				<div class="panel-heading">Result</div>
				<div class="panel-body">
					<div class="form-group">
							<label class="col-md-4 control-label"><p class="text-danger">Deliveries from {{isset($assigned) ? $assigned : ''}}. Dated {{isset($from) ? $from : ''}} - {{isset($to) ? $to : ''}}</p></label>
					</div>
					@if(isset($assigned) && isset($data))
						@if($assigned == "MIS")
						<table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <td>Date</td>
                                <td>Charity</td>
                                <td>Filename</td>
                                <td>Count</td>
                                <td>OrderNumber</td>
                                <td>TotalOrder</td>
                                <td>Client</td>
                               
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $key => $value)
                            <tr>
                                <td class="bg-success">{{ date('m/d/Y',strtotime($value->Date))  }}</td>
                                <td class="bg-success">{{ $value->Charity }}</td>
                                <td class="bg-success">{{ $value->Filename }}</td>
                                <td class="bg-success">{{ $value->Count }}</td>
                                <td class="bg-success">{{ $value->OrderNumber }}</td>
                                <td class="bg-success">{{ $value->TotalOrder }}</td>
                                <td class="bg-success">{{ $value->Client }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                   		 </table>
                   		 @elseif($assigned == "Chris")
                   		 <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <td>Date</td>
                                <td>Charity</td>
                                <td>Filename</td>
                                <td>Count</td>
                                <td>OrderNumber</td>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $key => $value)
                            <tr>
                                <td class="bg-success">{{ date('m/d/Y',strtotime($value->Date)) }}</td>
                                <td class="bg-success">{{ $value->Charity  }}</td>
                                <td class="bg-success">{{ $value->Filename  }}</td>
                                <td class="bg-success">{{ $value->Cnt  }}</td>
                                <td class="bg-success">{{ $value->OrderNumber  }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                   		 </table> 
						@endif
					@endif
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
