<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link text-center">
        <span class="brand-text font-weight-light">DCMS</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item menu-open">
                
                <li class="nav-item menu-open">
                    <ul class="nav nav-treeview">

                        @can('isAdmin')
                            <li class="nav-item">
                                <a href="{{ route('Dashboard') }}"
                                    class="nav-link {{ Route::is('Dashboard') ? 'bg-warning' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p> Dashboard -A</p>
                                </a>
                            </li>
                        @endcan
                        @can('isModerator')
                            <li class="nav-item">
                                <a href="{{ route('Dashboard_moderator_dashboard') }}"
                                    class="nav-link {{ Route::is('Dashboard_moderator_dashboard') ? 'bg-warning' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Dashboard -M</p>
                                </a>
                            </li>
                        @endcan
                        @can('isPatient')
                            <li class="nav-item">
                                <a href="{{ route('Dashboard_patitient_dashboard') }}"
                                    class="nav-link {{ Route::is('Dashboard_patitient_dashboard') ? 'bg-warning' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p> Dashboard -P</p>
                                </a>
                            </li>
                        @endcan
                        @can('isWriter')
                            <li class="nav-item">
                                <a href="{{ route('Dashboard_writer_dashboard') }}"
                                    class="nav-link {{ Route::is('Dashboard_writer_dashboard') ? 'bg-warning' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p> Writter Dashboard</p>
                                </a>
                            </li>
                        @endcan

                        <li class="nav-item">
                            <a href="#"
                                class="nav-link {{ Route::is('Dashboard_request_diet') | Route::is('Dashboard_diet_requests') | Route::is('Dashboard_diet_drafts') | Route::is('Dashboard_view_chart') ? 'bg-success bg-primary' : '' }}">
                                <i class="nav-icon fas fa-chart-pie"></i>
                                <p>
                                    Diet
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: none;">
                                @can('isPatient')
                                    <li class="nav-item">
                                        <a href="{{ route('Dashboard_request_diet') }}"
                                            class="nav-link {{ Route::is('Dashboard_request_diet') ? 'bg-success' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p> Request a Diet</p>
                                        </a>
                                    </li>
                                @endcan

                                @can('isAdmin')
                                    <li class="nav-item">
                                        <a href="{{ route('Dashboard_diet_requests') }}"
                                            class="nav-link {{ Route::is('Dashboard_diet_requests') ? 'bg-success' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p> Diet Requests</p>
                                        </a>
                                    </li>


                                    <li class="nav-item">
                                        <a href="{{ route('Dashboard_diet_drafts') }}"
                                            class="nav-link {{ Route::is('Dashboard_diet_drafts') ? 'bg-success' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Diet Drafts</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('isPatient')
                                    <li class="nav-item">
                                        <a href="{{ route('Dashboard_view_chart') }}"
                                            class="nav-link {{ Route::is('Dashboard_view_chart') ? 'bg-success' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p> Current Diet</p>
                                        </a>
                                    </li>
                                @endcan

                            </ul>
                        </li>


                        <li class="nav-item">
                            <a href="#"
                                class="nav-link 
							{{ Route::is('Dashboard_all_payment_and_transaction_records') |
       Route::is('Dashboard_diet_records') |
       Route::is('Dashboard_appointments_serials') |
       Route::is('Dashboard_payment_history') |
       Route::is('Dashboard_accounts') |
       Route::is('Dashboard_appointment')
           ? 'bg-primary'
           : '' }}">
                                <i class="nav-icon fas fa-chart-pie"></i>
                                <p>
                                    Records
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: none;">
                                @can('isAdmin')
                                    {{-- <li class="nav-item">
                                        <a href="{{ route('Dashboard_all_payment_and_transaction_records') }}"
                                            class="nav-link {{ Route::is('Dashboard_all_payment_and_transaction_records') ? 'bg-success' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p> All Records</p>
                                        </a>
                                    </li> --}}
                                    <li class="nav-item">
                                        <a href="{{ route('Dashboard_diet_records') }}"
                                            class="nav-link {{ Route::is('Dashboard_diet_records') ? 'bg-success' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p> Diet Records</p>
                                        </a>
                                    </li>
                                @endcan
                                @canany(['isAdmin', 'isModerator'])
                                    <li class="nav-item">
                                        <a href="{{ route('Dashboard_appointments_serials') }}"
                                            class="nav-link {{ Route::is('Dashboard_appointments_serials') ? 'bg-success' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p> Appointments & Serials</p>
                                        </a>
                                    </li>
                                @endcanany
                                @can('isPatient')
                                    <li class="nav-item">
                                        <a href="{{ route('Dashboard_payment_history') }}"
                                            class="nav-link {{ Route::is('Dashboard_payment_history') ? 'bg-success' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p> Payment History</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('isAdmin')
                                    <li class="nav-item">
                                        <a href="{{ route('Dashboard_accounts') }}"
                                            class="nav-link {{ Route::is('Dashboard_accounts') ? 'bg-success' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p> Accounts</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('isPatient')
                                    <li class="nav-item">
                                        <a href="{{ route('Dashboard_appointment') }}"
                                            class="nav-link {{ Route::is('Dashboard_appointment') ? 'bg-success' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p> Appointment </p>
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>















                        @canany(['isAdmin', 'isWriter'])
                            <li class="nav-item">
                                <a href="#"
                                    class="nav-link 
							{{ Route::is('Dashboard_allBlogPost') | Route::is('Dashboard_write_a_blog') | Route::is('Dashboard_categories')
           ? 'bg-primary'
           : '' }}">
                                    <i class="nav-icon fas fa-chart-pie"></i>
                                    <p>
                                        Articles
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>




                                <ul class="nav nav-treeview" style="display: none;">

                                    <li class="nav-item">
                                        <a href="{{ route('Dashboard_allBlogPost') }}"
                                            class="nav-link {{ Route::is('Dashboard_allBlogPost') ? 'bg-success' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p> All Articles</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('Dashboard_write_a_blog') }}"
                                            class="nav-link {{ Route::is('Dashboard_write_a_blog') ? 'bg-success' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p> Write Blog </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('Dashboard_categories') }}"
                                            class="nav-link {{ Route::is('Dashboard_categories') ? 'bg-success' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p> Categories </p>
                                        </a>
                                    </li>

                                </ul>


                            </li>
                        @endcanany
                        @canany('isAdmin')
                            <li class="nav-item">
                                <a href="#"
                                    class="nav-link 
							{{ Route::is('Dashboard_gallery') |
       Route::is('Dashboard_about') |
       Route::is('Dashboard_chamber_details') |
       Route::is('Dashboard_social_links') |
       Route::is('Dashboard_event')
           ? 'bg-primary'
           : '' }}">
                                    <i class="nav-icon fas fa-chart-pie"></i>
                                    <p>
                                        Pages
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>





                                <ul class="nav nav-treeview" style="display: none;">

                                    <li class="nav-item">
                                        <a href="{{ route('Dashboard_gallery') }}"
                                            class="nav-link {{ Route::is('Dashboard_gallery') ? 'bg-success' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p> Gallery</p>
                                        </a>
                                    </li>
                                    {{-- <li class="nav-item">
							<a href="{{ route('Dashboard_contact') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> Contact</p>
                                </a>
                        </li> --}}
                                    <li class="nav-item">
                                        <a href="{{ route('Dashboard_about') }}"
                                            class="nav-link {{ Route::is('Dashboard_about') ? 'bg-success' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p> About </p>
                                        </a>
                                    </li>
                  
                                    <li class="nav-item">
                                        <a href="{{ route('Dashboard_chamber_details') }}"
                                            class="nav-link {{ Route::is('Dashboard_chamber_details') ? 'bg-success' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p> Chamber Details</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('Dashboard_social_links') }}"
                                            class="nav-link {{ Route::is('Dashboard_social_links') ? 'bg-success' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p> Social Links</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('Dashboard_event') }}"
                                            class="nav-link {{ Route::is('Dashboard_event') ? 'bg-success' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p> Events </p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endcanany
                        @can('isPatient')
                            <li class="nav-item">
                                <a href="{{ route('Dashboard_mcq') }}"
                                    class="nav-link {{ Route::is('Dashboard_mcq') ? 'bg-warning' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p> Medical Form</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('Dashboard_patitient_profile') }}"
                                    class="nav-link {{ Route::is('Dashboard_patitient_profile') ? 'bg-warning' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p> Profile -P</p>
                                </a>
                            </li>
                        @endcan

                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
