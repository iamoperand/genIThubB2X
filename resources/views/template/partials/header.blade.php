<header role="banner">
		<nav class="navbar navbar-default" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header"> 
				<!-- Mobile Toggle Menu Button -->
				<a class="navbar-brand" href="{{url('/')}}"><span style="color:#0E385F;font-size:1.2em;font-family: 'Ubuntu', sans-serif;"><b>Avionic</b> Solutions</span></a>
				 
				</div>
<ul class="nav navbar-nav navbar-right">
       <li><a href="#"> </a></li>
     
    </ul>
     <ul class="nav navbar-nav navbar-right">
          @if (Session::has('ee_name') && Request::is('employee'))  <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>&nbsp;{{Session::get('ee_name')}}</a>
              <ul class="dropdown-menu">
                <li><a href="{{ route('eeLogout')}}">Logout</a></li>
                
              </ul>
            </li> @endif
           @if (Session::has('er_name') && Request::is('employer')||Request::is('show-employee')||Request::is('export'))  <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>&nbsp;{{Session::get('er_name')}}</a>
              <ul class="dropdown-menu">
                <li><a href="{{ route('erLogout')}}">Logout</a></li>
                
              </ul>
            </li> @endif
          </ul>
			</div>	
		</nav>
	</header>
	<!-- END .header -->