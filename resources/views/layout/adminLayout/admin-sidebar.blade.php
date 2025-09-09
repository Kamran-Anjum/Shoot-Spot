        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item">
                            <a class="sidebar-link  waves-effect waves-dark profile-dd" href="javascript:void(0)" aria-expanded="false">
                                <img src="{{ asset('images/backend-images/users/user-avatar.png') }}" class="rounded-circle ml-2" width="30">
                                <span class="hide-menu">BookVR</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ url('/admin/dashboard')}}" class="sidebar-link">
                                <i class="mdi mdi-av-timer"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>

                        <!-- promo code -->
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{route('promo-code.index')}}">
                                <i class="mdi mdi-folder"></i>
                                <span class="hide-menu">Promo Code</span> 
                            </a>
                        </li>
                        <!-- shoot for -->
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{route('shoot-for.index')}}">
                                <i class="mdi mdi-camera"></i>
                                <span class="hide-menu">Shoot For</span> 
                            </a>
                        </li>
                        <!-- shoot for -->
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{route('package-request.index')}}">
                                <i class="mdi mdi-folder"></i>
                                <span class="hide-menu">Package Request</span> 
                            </a>
                        </li>
                        <!-- shoot for -->
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{route('equipment.index')}}">
                                <i class="mdi mdi-camera"></i>
                                <span class="hide-menu">3D Photography Equipment</span> 
                            </a>
                        </li>
                        <!-- shoot for -->
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{route('space.index')}}">
                                <i class="mdi mdi-image"></i>
                                <span class="hide-menu">3D Spaces Photographed</span> 
                            </a>
                        </li>
                        <!-- shoot for -->
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{url('/admin/view-photographers')}}">
                                <i class="mdi mdi-camera-party-mode"></i>
                                <span class="hide-menu">Photographers</span> 
                            </a>
                        </li>
                        <!-- shoot for -->
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{url('/admin/view-customers')}}">
                                <i class="mdi mdi-account"></i>
                                <span class="hide-menu">Customers</span> 
                            </a>
                        </li>
                        <!-- shoot for -->
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{url('/admin/view-bookings')}}">
                                <i class="mdi mdi-calendar-check"></i>
                                <span class="hide-menu">Bookings</span> 
                            </a>
                        </li>
                        <!-- shoot for -->
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{url('/admin/view-messages')}}">
                                <i class="mdi mdi-message-text"></i>
                                <span class="hide-menu">Contact Messages</span> 
                            </a>
                        </li>
                      
                      
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
