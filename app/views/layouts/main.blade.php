<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 	{{ HTML::style('css/main.css')}}
 	{{ HTML::style('css/bootstrap.min.css')}}
  {{ HTML::script('js/jquery.js'); }}
  {{ HTML::script('js/bootstrap.min.js'); }}
  {{ HTML::script('js/transition.js'); }}
  
  <script> 
    function changeDetails(name, value)
    {
      if (name == "order")
      {
        $('#order-nav'+value).addClass("nav-selected");
        $('#invoice-nav'+value).removeClass("nav-selected");
        $('#assessor-nav'+value).removeClass("nav-selected");
        $('#survey-nav'+value).removeClass("nav-selected");
        $('#order'+value).removeClass("hidden");
        $('#invoice'+value).addClass("hidden");
        $('#assessor'+value).addClass("hidden");
        $('#survey'+value).addClass("hidden");
      }
      else if (name == "invoice")
      {
        $('#order-nav'+value).removeClass("nav-selected");
        $('#invoice-nav'+value).addClass("nav-selected");
        $('#assessor-nav'+value).removeClass("nav-selected");
        $('#survey-nav'+value).removeClass("nav-selected");
        $('#order'+value).addClass("hidden");
        $('#invoice'+value).removeClass("hidden");
        $('#assessor'+value).addClass("hidden");
        $('#survey'+value).addClass("hidden");
      }
      else if (name == "assessor")
      {
        $('#order-nav'+value).removeClass("nav-selected");
        $('#invoice-nav'+value).removeClass("nav-selected");
        $('#assessor-nav'+value).addClass("nav-selected");
        $('#survey-nav'+value).removeClass("nav-selected");
        $('#order'+value).addClass("hidden");
        $('#invoice'+value).addClass("hidden");
        $('#assessor'+value).removeClass("hidden");
        $('#survey'+value).addClass("hidden");
      }
      else if (name == "survey")
      {
        $('#order-nav'+value).removeClass("nav-selected");
        $('#invoice-nav'+value).removeClass("nav-selected");
        $('#assessor-nav'+value).removeClass("nav-selected");
        $('#survey-nav'+value).addClass("nav-selected");
        $('#order'+value).addClass("hidden");
        $('#invoice'+value).addClass("hidden");
        $('#assessor'+value).addClass("hidden");
        $('#survey'+value).removeClass("hidden");
      }
    }
  </script>

  <script>
    $(function(){
      $(document).ready(function () {
        location.hash && $(location.hash + '.collapse').collapse('show');
      });
    });
  </script>

    <title>EPC Admin</title>
  </head>
 
  <body>
  	<div class="container">
    <nav class="navbar navbar-inverse">
      <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('users/dashboard') }}">Dashboard</a>
      </div>
      <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('orders') }}">Active Orders</a></li>
        <li><a href="{{ URL::to('orders/create') }}">Create an Order</a>
      </ul>
     <!--  <ul class="nav navbar-nav navbar-right">
        <li><a href="">name </a></li>
      </ul> -->
    </nav>
    </div>
	<div class="container">
		{{ $content }}
	</div>
 	
  </body>
</html>