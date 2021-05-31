            <!-- Slide Nav -->
            <div class="header-wrapper d-none d-sm-none d-md-none d-lg-block">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="header-menu-list d-flex bg-white rt_nav_header horizontal-layout nav-bottom">
                                <div class="append mr-auto my-0 my-md-0 mr-auto">
                                    <ul class="list-group list-group-horizontal-md mr-auto">
                                        <li class="mr-1">
                                            <a href="{{url('admin')}}" class="btn-ctm-space text-dark header_class">
                                                <span class="lnr lnr-home pr-0 pr-lg-2"></span>
                                                <span class="d-none d-lg-inline">Dashboard</span>
                                            </a>
                                        </li>
                                        @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 3)
                                            <li class="mr-1">
                                                <a href="/admin/users" class="btn-ctm-space text-dark header_class">
                                                    <span class="lnr lnr-user pr-0 pr-lg-2"></span>
                                                    <span class="d-none d-lg-inline">User</span>
                                                </a>
                                            </li>                                                                                
                                            <li class="mr-1">
                                                <a href="/admin/services" class="btn-ctm-space text-dark header_class">
                                                    <span class="lnr lnr-cog pr-0 pr-lg-2"></span>
                                                    <span class="d-none d-lg-inline">Services</span>
                                                </a>
                                            </li>                                            
                                        @endif                            
                                        <li class="mr-1">
                                            <a href="/admin/operationals" class="btn-ctm-space text-dark header_class">
                                                <span class="lnr lnr-user pr-0 pr-lg-2"></span>
                                                <span class="d-none d-lg-inline">Jam Operasional</span>
                                            </a>
                                        </li>                                                                          
                                        <li class="mr-1">
                                            <a href="/admin/booking-request" class="btn-ctm-space text-dark header_class">
                                                <span class="lnr lnr-calendar-full pr-0 pr-lg-2"></span>
                                                <span class="d-none d-lg-inline">Booking Request</span>
                                            </a>
                                        </li>                                        
                                        <li class="mr-1">
                                            <a href="/admin/transaction-list" class="btn-ctm-space text-dark header_class">
                                                <span class="lnr lnr-book pr-0 pr-lg-2"></span><span class="d-none d-lg-inline">Transaction</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Slide Nav -->