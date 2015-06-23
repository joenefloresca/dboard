@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-primary">
				<div class="panel-heading">Add Question</div>
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

					<form class="form-horizontal" role="form" method="POST" action="{{ url('') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">Campaign Name</label>
							<div class="col-md-6">
								{!! Form::select('CampaignName', $campaign_options, '', array('class' => 'form-control', 'id' => 'CampaignName')) !!}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Question Code</label>
							<div class="col-md-4">
								<input type="text" class="form-control" name="QuestionCode" id="QuestionCode" value="{{ old('QuestionCode') }}" readonly>
								<div class="col-md-1"></div> 
							</div>
							
							<div class="col-md-2">
								<input type="text" class="form-control" name="QuestionCode2" id="QuestionCode" value="{{ old('QuestionCode2') }}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">P.O Price</label>
							<div class="col-md-4">
								<input type="text" class="form-control" name="PoPrice" id="PoPrice" value="{{ old('PoPrice') }}"> 
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Order Reference #</label>
							<div class="col-md-4">
								<select name="" id="" class="form-control">
									<option value="">Choose One</option>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">MIS Status</label>
							<div class="col-md-4">
								<select name="" id="" class="form-control">
									<option value="">Choose One</option>
									<option value="Pending">Pending</option>
									<option value="Added">Added</option>
									<option value="Updated">Updated</option>
									<option value="Removed">Removed</option>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">QA Status</label>
							<div class="col-md-4">
								<select name="" id="" class="form-control">
									<option value="">Choose One</option>
									<option value="Pending">Pending</option>
									<option value="Added">Added</option>
									<option value="Updated">Updated</option>
									<option value="Removed">Removed</option>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Production Status</label>
							<div class="col-md-4">
								<select name="" id="" class="form-control">
									<option value="">Choose One</option>
									<option value="Pending">Pending</option>
									<option value="Added">Added</option>
									<option value="Updated">Updated</option>
									<option value="Removed">Removed</option>
								</select>
							</div>
						</div>
						
				</div>
			</div>
			<div class="panel panel-primary">
				<div class="panel-heading">Add Question | Requirements</div>
				<div class="panel-body">

					<div class="form-horizontal">

						<div class="form-group">
							<label class="col-md-4 control-label">Age</label>
							<div class="col-md-4">
								<input type="text" class="form-control" name="Age" id="Age" value="{{ old('Age') }}"> 
							</div>
						</div>

						
						<div class="form-group">
							<label class="col-md-4 control-label">Is Homeowner?</label>
							<div class="col-md-4">
								<select name="IsHomeOwner" id="IsHomeOwner" class="form-control">
									<option value="">Choose One</option>
									<option value="Yes">Yes</option>
									<option value="No">No</option>
									<option value="NA">N/A</option>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Covered Areas</label>
							<div class="col-md-4">
								<input type="text" class="form-control" name="CoveredAreas" id="CoveredAreas" value="{{ old('CoveredAreas') }}" placeholder="Indicate if England, Scotland, Wales, NI"> 
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Postcode Exclusion</label>
							<div class="col-md-4">
								<input type="text" class="form-control" name="PostcodeExclusion" id="PostcodeExclusion" value="{{ old('PostcodeExclusion') }}"> 
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Telephone</label>
							<div class="col-md-4">
								<select name="Telephone" id="Telephone" class="form-control">
									<option value="">Choose One</option>
									<option value="Landline">Landline</option>
									<option value="Mobile">Mobile</option>
									<option value="Landline/Mobile">Landline/Mobile</option>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Others</label>
							<div class="col-md-4">
								<input type="text" class="form-control" name="Others" id="Others" value="{{ old('Others') }}" placeholder="Please Specify"> 
							</div>
						</div>
						
					</div>
				</div>
			</div>
			<div class="panel panel-primary">
				<div class="panel-heading">Add Question | Scripts</div>
				<div class="panel-body">

					<div class="form-horizontal">

						<div class="form-group">
							<label class="col-md-4 control-label">Number of Questions</label>
							<div class="col-md-4">
								<input type="text" class="form-control" name="numGenerate" id="numGenerate" value="{{ old('numGenerate') }}" placeholder=""> 
							</div>
						</div> 

						<div class="form-group">
							<div class="col-md-4 control-label"></div>
							<div class="col-md-4">
								<button type="button" class="btn btn-warning" id="btnGenerate" name="btnGenerate">Go</button>
							</div>
						</div>

						

						<input type="hidden" class="form-control" name="NumberOfScripts" id="NumberOfScripts" value="{{ old('NumberOfScripts') }}" placeholder="" > 

						<table class="table" id="scripts">
							
						
						</table>

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
</div>
@endsection
