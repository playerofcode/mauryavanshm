        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Member List</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard');?>">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">All Member List</li>
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
                            <div class="card-header">
                                <a href="<?php echo base_url('admin/generate_excel');?>" class="btn btn-success" style="float:right;"><i class="fa fa-download"></i> Download Member List </a>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">All Member List</h5>
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
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1; foreach($members as $key):?>
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