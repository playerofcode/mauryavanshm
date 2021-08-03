<div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center"> 
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard'); ?>">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit Team Category</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <?php if($this->session->flashdata('msg')): ?>
                     <div class="alert alert-success"><?php echo $this->session->flashdata('msg');?></div>
                    <?php endif;?>
                     <?php foreach ($team_category as $key): ?>
                            <form class="form-horizontal"  action="<?php echo base_url('admin/updateTeamCategory/'.$key->team_id);?>" method="post" enctype="multipart/form-data">
                                <div class="card-body">
                                    <h4 class="card-title">Edit Team Category</h4>
                                        <div class="form-group row">
                                        <label for="cat_image" class="col-sm-3  control-label col-form-label">Team Category Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="team_name" class="form-control" value="<?php echo $key->team_name?>" required placeholder="Enter Team Category Name">
                                        </div>
                                        </div>
                                    <?php endforeach ?>

                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-primary">Update Team Category</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
           