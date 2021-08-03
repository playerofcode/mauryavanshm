        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">User List</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard');?>">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">All User List</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                       
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">All User List</h5>
                                 <?php if($responce = $this->session->flashdata('msg')): ?>
                     <div class="alert alert-warning"><?php echo $responce;?></div>
            <?php endif;?>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr class="bg-success text-white">
                                                <th>SNo.</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Mobile Number</th>
                                                <th>Country</th>
                                                <th>State</th>
                                                <th>District</th>
                                                <th>Tehsil</th>
                                                <th>Block</th>
                                                <th>Address</th>
                                                
                                                <th>Resume/CV</th>
                                                <th>EB Category</th>
                                                <th>EB Sub Category</th>
                                                <th>Designation</th>
                                                <th>EB Cell</th>
                                                <th>Assign Designation</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1; foreach($users as $key):?>
                                           <tr>
                                                <td><?php echo $i?></td>  
                                                <td><?php echo $key['name'];?></td>
                                                <td><?php echo $key['email'];?></td>
                                                <td><?php echo $key['mobno'];?></td>
                                                <td><?php echo $key['country'];?></td>  
                                                <td><?php echo $key['state'];?></td>  
                                                <td><?php echo $key['district'];?></td>  
                                                <td><?php echo $key['tehsil'];?></td>  
                                                <td><?php echo $key['block'];?></td>  
                                                <td><?php echo $key['address'];?></td>
                                                <td>
                                                    <?php if(!empty($key['resume'])):?>
                                                <a href="<?php echo base_url($key['resume']);?>" target="_blank">Preview</a>
                                                <?php else:echo "Not uploaded";endif;?>
                                                </td>
                                                <td><?php echo $key['eb_category'];?></td>
                                                <td><?php echo $key['eb_sub_category'];?></td>
                                                <td><?php echo $key['eb_designation']; ?></td>
                                                <td><?php echo $key['eb_cell']; ?></td>
                                                <!-- <td>
                                                    <?php if(!empty($key['designation'])):?>
                                                        <?php echo $key['designation']; ?>
                                                <?php else:echo "<span class='text-danger font-weight-bold'>Not Assigned</span>";endif;?>
                                                </td>  --> 
                                                <td>
                                                    <a href="<?php echo base_url('admin/assignEBDesignation/'.$key['id']);?>" class="btn btn-success">Assign</a>
                                                </td> 
                                                    <td><a onclick="return confirm('Are you sure want to delete?');"href="<?php echo base_url('admin/deleteUsers/');?><?php echo $key['id']; ?>">Delete</a></td>
                                           </tr>
                                           <?php $i++;endforeach;?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>