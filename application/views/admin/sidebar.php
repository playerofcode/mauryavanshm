  <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" class="p-t-30">
                     <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('admin/dashboard');?>" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
                     <!--    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('admin/availability');?>" aria-expanded="false"><i class="mdi mdi-chart-bubble"></i><span class="hide-menu">Availability</span></a></li> -->
                     <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Location Management</span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="<?php echo base_url('admin/country');?>" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu">Country Mgmt </span></a></li>
                                <li class="sidebar-item"><a href="<?php echo base_url('admin/state');?>" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu">State Mgmt</span></a></li>
                                <li class="sidebar-item"><a href="<?php echo base_url('admin/district');?>" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu">District Mgmt</span></a></li>
                               <!--  <li class="sidebar-item"><a href="<?php echo base_url('admin/tehsil');?>" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu">Tehsil Mgmt</span></a></li> -->
                                <li class="sidebar-item"><a href="<?php echo base_url('admin/block');?>" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu">Block Mgmt</span></a></li>
                            </ul>
                        </li>
                         <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Executive Body Mgmt</span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="<?php echo base_url('admin/eb_category');?>" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu">EB Category</span></a></li>
                                <li class="sidebar-item"><a href="<?php echo base_url('admin/eb_sub_category');?>" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu">EB Sub Category</span></a></li>
                                <li class="sidebar-item"><a href="<?php echo base_url('admin/eb_designation');?>" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu">Designation</span></a></li>
                                <li class="sidebar-item"><a href="<?php echo base_url('admin/eb_cell');?>" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu">Cell</span></a></li>
                            </ul>
                        </li>
                         <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Gallery </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="<?php echo base_url('admin/gallery');?>" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Add Gallery Image </span></a></li>
                                <li class="sidebar-item"><a href="<?php echo base_url('admin/all_gallery');?>" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> All Gallery Image </span></a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item"><a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-face"></i><span class="hide-menu">Manage Blog </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="<?php echo base_url('admin/blog');?>" class="sidebar-link"><i class="mdi mdi-emoticon"></i><span class="hide-menu"> Add Blog </span></a></li>
                                <li class="sidebar-item"><a href="<?php echo base_url('admin/bloglist');?>" class="sidebar-link"><i class="mdi mdi-emoticon"></i><span class="hide-menu"> Blog List</span></a></li>
                            </ul>
                        </li> 
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Manage Services </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="<?php echo base_url('admin/service');?>" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Add Service </span></a></li>
                                <li class="sidebar-item"><a href="<?php echo base_url('admin/all_service');?>" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> All Services </span></a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Video Mgmt </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="<?php echo base_url('admin/video');?>" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Add Video</span></a></li>
                                <li class="sidebar-item"><a href="<?php echo base_url('admin/all_video');?>" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> All Videos </span></a></li>
                            </ul>
                        </li>
                         <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Research & Report</span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="<?php echo base_url('admin/report');?>" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Add Report</span></a></li>
                                <li class="sidebar-item"><a href="<?php echo base_url('admin/all_report');?>" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> All Reports</span></a></li>
                            </ul>
                        </li>
                         <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('admin/team_category');?>" aria-expanded="false"><i class="mdi mdi-chart-bubble"></i><span class="hide-menu">Team Category Mgmt</span></a></li>
                         <!-- <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('admin/distributor_list');?>" aria-expanded="false"><i class="mdi mdi-chart-bubble"></i><span class="hide-menu">Distributor</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('admin/delivery_list');?>" aria-expanded="false"><i class="mdi mdi-chart-bubble"></i><span class="hide-menu">Delivery Partner</span></a></li>  -->
                         <li class="sidebar-item"><a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-face"></i><span class="hide-menu">Team Management </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="<?php echo base_url('admin/team_member');?>" class="sidebar-link"><i class="mdi mdi-emoticon"></i><span class="hide-menu"> Add New Member </span></a></li>
                                <li class="sidebar-item"><a href="<?php echo base_url('admin/all_team_member');?>" class="sidebar-link"><i class="mdi mdi-emoticon"></i><span class="hide-menu"> All Team Members </span></a></li>
                            </ul>
                        </li> 
                       <!--  <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('admin/profile_update_request');?>" aria-expanded="false"><i class="mdi mdi-chart-bubble"></i><span class="hide-menu">Profile Update Request</span></a></li>  -->
                         <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('admin/enquiry');?>" aria-expanded="false"><i class="mdi mdi-chart-bubble"></i><span class="hide-menu">Enquiry</span></a></li> 
                          <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('admin/users');?>" aria-expanded="false"><i class="mdi mdi-chart-bubble"></i><span class="hide-menu">Users</span></a></li> 
                          <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('admin/members');?>" aria-expanded="false"><i class="mdi mdi-chart-bubble"></i><span class="hide-menu">Members</span></a></li> 
                          <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('admin/filter_user');?>" aria-expanded="false"><i class="mdi mdi-chart-bubble"></i><span class="hide-menu">Filter Users</span></a></li> 
                         <!-- <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('admin/raise_ticket');?>" aria-expanded="false"><i class="mdi mdi-chart-bubble"></i><span class="hide-menu">Raise Ticket</span></a></li>  -->
                    </ul>
                </nav>
            </div>
        </aside>