<div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center"> 
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard'); ?>">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Update Gallery Image</li>
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
                     <?php foreach ($gallery as $key): ?>
                            <form class="form-horizontal"  action="<?php echo base_url('admin/updateGallery/'.$key->id);?>" method="post" enctype="multipart/form-data">
                                <div class="card-body">
                                    <h4 class="card-title">Update Gallery Image</h4>
                                   
                                        <?php 
                                        if(!empty($key->image))
                                        {
                                            echo "<center><img src='".base_url().$key->image."' style='height:100px;width:100px;border:1px solid deeppink;border-radius:5px;margin:5px;box-shadow:0 5px 10px rgba(0,0,0,0.4);'/></center>";
                                        }
                                        else
                                        {
                                            echo "<center><span class='text-center text-danger'>Gallery Image not found</span></center>";
                                        }

                                        ?>
                                        <div class="form-group row">
                                        <label for="cat_image" class="col-sm-3  control-label col-form-label">Gallery Image</label>
                                        <div class="col-sm-9">
                                            <input type="file" name="image"class="form-control" id="image" >
                                            <?php if(isset($upload_error)){echo $upload_error;} ?>
                                        </div>
                                        </div>
                                    <?php endforeach ?>

                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-primary">Update Gallery Image</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
           