<!DOCTYPE html>
<html lang="en">
  <head>
    <!DOCTYPE html>
<html lang="en">
@include('partials.backend.head')
  <body>
    <!-- Inner wrapper -->
    <div class="inner-wrapper">
		<!-- Loader -->
		<div id="loader-wrapper">
			<div class="loader">
			  <div class="dot"></div>
			  <div class="dot"></div>
			  <div class="dot"></div>
			  <div class="dot"></div>
			  <div class="dot"></div>
			</div>
		</div>
    <!-- Header -->
    <header class="header">
            <!-- Top Header Section -->
            <div class="top-header-section">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-6">
                            <div class="logo my-3 my-sm-0">                                
                                    <h1 class="text-light">PO Nusantara</h1>                                
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-9 col-6 text-right">
                            <div class="user-block d-none d-lg-block">
                                <div class="row align-items-center">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <!-- user info-->
                                        <div class="user-info align-right dropdown d-inline-block header-dropdown">
                                            <a href="" data-toggle="dropdown" class=" menu-style dropdown-toggle">
                                                <div class="user-avatar d-inline-block">
                                                    <h3 class="text-light">{{ Auth::user()->name }}</h3>
                                                </div>
                                            </a>
                                            <!-- Notifications -->
                                            <div class="dropdown-menu notification-dropdown-menu shadow-lg border-0 p-3 m-0 dropdown-menu-right">
                                                <a class="dropdown-item p-2">
                                                    <span class="media align-items-center">
                                                        <span class="lnr lnr-power-switch mr-3"></span>
                                                        <span class="media-body text-truncate">
                                                                <form method="POST" action="/admin/logout">
                                                                    {{ csrf_field() }}
                                                                    <input class="btn btn-block btn-danger" type="submit" value="Logout">
                                                                </form>
                                                            </span>
                                                        </span>
                                                    </a>
                                            </div>
                                            <!-- Notifications -->
                                        </div>
                                        <!-- /User info-->
                                    </div>
                                </div>
                            </div>                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Top Header Section -->
            <!-- Slide Nav -->
        @include('partials.backend.sidebar')
        </header>
        <!-- /Header -->   <!-- Page Wrapper -->
        @yield('content')

        @yield('script')
			<!--/Content-->		
		</div>
		<!-- Inner Wrapper -->
		
		<div class="sidebar-overlay" id="sidebar_overlay"></div>
    @include('partials.backend.scripts')
  </body>
</html>