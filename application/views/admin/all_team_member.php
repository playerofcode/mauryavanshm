        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Blog List</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard');?>">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">All Team Member</li>
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
                                <h5 class="card-title">All Team Member</h5>
                                 <?php if($responce = $this->session->flashdata('msg')): ?>
                     <div class="alert alert-warning"><?php echo $responce;?></div>
            <?php endif;?>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr class="bg-success text-white">
                                                <th>SNo.</th>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Mobile Number</th>
                                                <th>Designation</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1; foreach($team_member as $blog):?>
                                           <tr>
                                                <td><?php echo $i?></td>  
                                                <td><img src="<?php echo base_url().$blog->image;?>" style="height:50px;width:50px;"/></td>
                                                <td><?php echo $blog->name?></td>
                                                <td><?php echo $blog->mobno?></td>
                                                <td><?php echo $blog->email?></td>
                                                <td><?php echo $blog->designation?></td>  
                                                <td><a href="<?php echo base_url('admin/edit_team_member/');?><?php echo $blog->id; ?>">Edit</a></td>
                                                <td><a onclick="return confirm('Are you sure want to delete?');"href="<?php echo base_url('admin/delete_team_member/');?><?php echo $blog->id; ?>">Delete</a></td>
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