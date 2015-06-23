<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dashboard</title>

	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('bootflat/css/bootflat.css') }}" rel="stylesheet">
	<link href="{{ asset('bootflat/css/bootflat.css.map') }}" rel="stylesheet">

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">

	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<!-- <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css"> -->
	<link rel="stylesheet" href="//cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.css">
	<link href="{{ asset('/css/summernote.css') }}" rel="stylesheet">
	
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Dashboard</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<!-- <li><a href="{{ url('/') }}">Home</a></li>
					<li><a href="{{ url('deliveries') }}">Deliveries</a></li>
					<li><a href="{{ url('inhouse') }}">Inhouse Campaigns</a></li> -->
					<li><a href="{{ url('deliverytracker') }}">Delivery Tracking</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Clients <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="{{ url('client') }}">Client List</a></li>
							<li><a href="{{ url('client/create') }}">Add Client</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Suppliers <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="{{ url('supplier') }}">Supplier List</a></li>
							<li><a href="{{ url('supplier/create') }}">Add Supplier</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Campaigns <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="{{ url('campaign') }}">Campaign List</a></li>
							<li><a href="{{ url('campaign/create') }}">Add Campaign</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Questions <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="{{ url('question') }}">Question List</a></li>
							<li><a href="{{ url('question/create') }}">Add Question</a></li>
						</ul>
					</li>
				</ul>

				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
						<li><a href="{{ url('/auth/login') }}">Login</a></li>
						<li><a href="{{ url('/auth/register') }}">Register</a></li>
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/auth/logout') }}">Logout</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>

	@yield('content')

	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="{{ asset('bootflat/js/icheck.min.js') }}"></script>
	<script src="{{ asset('bootflat/js/jquery.fs.selecter.min.js') }}"></script>
	<script src="{{ asset('bootflat/js/jquery.fs.stepper.min.js') }}"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
	<script src="//cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.js"></script>
	<script src="//cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.js"></script>
	<script src="{{ asset('js/jquery.progressTimer.js') }}"></script>

	<script src="{{ asset('js/summernote.js') }}"></script>

	<script>
	var progress = $(".loading-progress").progressTimer({
			  timeLimit: 10,
			  onFinish: function () {
			  alert('Data Loading Completed!');
			}
		});

	$.ajax({
		url: "api/campaign/all", 
		type: 'GET',
		success: function(result){
		var myObj = $.parseJSON(result);
	    	$.each(myObj, function(key,value) {
	    		var t = $('#campaignList').DataTable();

	    		t.row.add( [
		            value.id,
		            value.CampaignName,
		            "<a class='btn btn-small btn-info' href='http://localhost/dboard/public/campaign/"+value.id+"/edit'><span class='glyphicon glyphicon glyphicon-edit' aria-hidden='true'></span></a>",
		            "<form method='POST' action='http://localhost/dboard/public/campaign/"+value.id+"' accept-charset='UTF-8' class='pull-left' >"+
		            "<input name='_method' type='hidden' value='DELETE'>"+
		            "<button type='submit' class='btn btn-warning'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></button>"+"</form>",
	        	] ).draw();
	    		
			});
		}}).error(function(){
			  progress.progressTimer('error', {
			  errorText:'ERROR!',
			  onFinish:function(){
			    alert('There was an error processing your information!');
			  }
			});
		}).done(function(){
  			progress.progressTimer('complete');
  			$( "#progressbar" ).fadeOut( "slow" );
		});

	$.ajax({
		url: "api/supplier/all", 
		type: 'GET',
		success: function(result){
		var myObj = $.parseJSON(result);
	    	$.each(myObj, function(key,value) {
	    		var t = $('#supplierList').DataTable();

	    		t.row.add( [
		            value.id,
		            value.CompanyName,
		            value.CompanyAlias,
		            value.CompanyOwner,
		            value.Website,
		            value.Type,
		            "<a class='btn btn-small btn-info' href='http://localhost/dboard/public/supplier/"+value.id+"/edit'><span class='glyphicon glyphicon glyphicon-edit' aria-hidden='true'></span></a>",
		            "<form method='POST' action='http://localhost/dboard/public/supplier/"+value.id+"' accept-charset='UTF-8' class='pull-left' >"+
		            "<input name='_method' type='hidden' value='DELETE'>"+
		            "<button type='submit' class='btn btn-warning'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></button>"+"</form>",
	        	] ).draw();
	    		
			});
		}}).error(function(){
			  progress.progressTimer('error', {
			  errorText:'ERROR!',
			  onFinish:function(){
			    alert('There was an error processing your information!');
			  }
			});
		}).done(function(){
  			progress.progressTimer('complete');
  			$( "#progressbar" ).fadeOut( "slow" );
		});

	$.ajax({
		url: "api/client/all", 
		type: 'GET',
		success: function(result){
		var myObj = $.parseJSON(result);
	    	$.each(myObj, function(key,value) {
	    		var t = $('#clientsList').DataTable();

	    		t.row.add( [
		            value.id,
		            value.ClientName,
		            value.TradingName,
		            value.ClientCode,
		            value.ClientOwner,
		            "<a class='btn btn-small btn-info' href='http://localhost/dboard/public/client/"+value.id+"/edit'><span class='glyphicon glyphicon glyphicon-edit' aria-hidden='true'></span></a>",
		            "<form method='POST' action='http://localhost/dboard/public/client/"+value.id+"' accept-charset='UTF-8' class='pull-left' >"+
		            "<input name='_method' type='hidden' value='DELETE'>"+
		            "<button type='submit' class='btn btn-warning'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></button>"+"</form>",
	        	] ).draw();
	    		
			});
		}}).error(function(){
			  progress.progressTimer('error', {
			  errorText:'ERROR!',
			  onFinish:function(){
			    alert('There was an error processing your information!');
			  }
			});
		}).done(function(){
  			progress.progressTimer('complete');
  			$( "#progressbar" ).fadeOut( "slow" );
		});
	
	$.ajax({
		url: "api/deliverytracker/complete", 
		type: 'GET',
		success: function(result){
		var myObj = $.parseJSON(result);
    	$.each(myObj, function(key,value) {
    		var t = $('#myTable').DataTable();
    		t.row.add( [
	            value.stat,
	            value.oc,
	            value.pon,
	            value.cnt,
	            value.dq,
	            value.dd,
	            value.fn,
	            value.inum,
	            value.di,
        	] ).draw();
    		
		});
	}});

	$.ajax({
		url: "api/deliverytracker/pending", 
		type: 'GET',
		success: function(result){
		var myObj = $.parseJSON(result);
    	$.each(myObj, function(key,value) {
    		var t = $('#myTablePending').DataTable();
    		t.row.add( [
	            value.stat,
	            value.oc,
	            value.pon,
	            value.cnt,
	            value.dq,
	            value.dd,
	            value.fn,
	            value.inum,
	            value.di,
        	] ).draw();
    		
		});
	}});

	$("#btnSort").click(function(){
		$( "#progressbar" ).fadeIn( "slow" );
		var fromdate = $("#fromdate").val();
		var todate 	 = $("#todate").val();

		var progress = $(".loading-progress").progressTimer({
			  timeLimit: 10,
			  onFinish: function () {
			  alert('Completed!');
			}
		});
		
    	$.ajax({
    		url: "api/deliverytracker/sorted", 
    		type: 'GET',
    		data: { fromdate,  todate},
    		success: function(result){
			var myObj = $.parseJSON(result);
	    	$.each(myObj, function(key,value) {
	    		var t = $('#myTable').DataTable();
	    		t.row.add( [
		            // value.stat,
		            value.oc,
		            value.pon,
		            value.cnt,
		            value.dq,
		            value.dd,
		            value.fn,
		            value.inum,
		            value.di,
	        	] ).draw();
	    		
			});
		}}).error(function(){
			  progress.progressTimer('error', {
			  errorText:'ERROR!',
			  onFinish:function(){
			    alert('There was an error processing your information!');
			  }
			});
		}).done(function(){
  			progress.progressTimer('complete');
  			$( "#progressbar" ).fadeOut( "slow" );
		});
	});


	$("#btnClear").click(function(){
		var t = $('#myTable').DataTable();
	    t.clear().draw();
	});

	$(document).ready(function(){
    	$('#myTable').DataTable();
    	$('#myTablePending').DataTable();
	});

	  $(function() {
	    $( "#fromdate" ).datepicker({ dateFormat: 'yy-mm-dd' });
	    $( "#todate" ).datepicker({ dateFormat: 'yy-mm-dd' });
	  });

	$("#CampaignName").change(function() {
		var CampaignName = $("#CampaignName option:selected").text()
  		$("#QuestionCode").val(CampaignName.replace(/ /g,'_'));	
  		// .replace(/ /g,'')	
	});

	
	 

	 $("#btnGenerate").click(function() {
	     var num = parseInt($("#numGenerate").val());
	     var html = '';
	     for(var i = 0; i < num ; i++)
	     {
	     	html = '<tr><td>Script</td><td><textarea name="script'+i+'"> Content here.. </textarea></td></tr>';
	     	$('#scripts').append(html);
	     }
	     $('textarea').summernote();
	     $('#NumberOfScripts').val(i);
 		 
 		 
 		 console.log(num);
	});

	//   $body = $("body");

	// $(document).on({
	//     ajaxStart: function() { $body.addClass("loading");    },
	//     ajaxStop: function() { $body.removeClass("loading"); }    
	// });
	 
  </script>

</body>
</html>
