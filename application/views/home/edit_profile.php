        <div class="page--header pt--60 pb--60 text-center" data-bg-img="<?php echo base_url('assets/');?>img/page-header-img/bg.jpg" data-overlay="0.85">
            <div class="container">
                <div class="title">
                    <h2 class="h1 text-white">Update Profile</h2>
                </div>
                <ul class="breadcrumb text-gray ff--primary">
                    <li><a href="<?php echo base_url();?>" class="btn-link">Home</a></li>
                    <li class="active"><span class="text-primary">Update Profile</span></li>
                </ul>
            </div>
        </div>
        <?php foreach ($profile as $key): ?>
        <section class="page--wrapper pt--80 pb--20">
            <div class="container">
                <div class="row">
                    <form action="<?php echo base_url('home/update_user_profile/'.$key->id);?>" method="post" enctype="multipart/form-data">
                        <div class="form-group col-md-6">
                            <label>Update profile Picture</label>
                            <input type="file" name="photo" class="form-control"/>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Name</label>
                            <input type="text" name="name" value="<?php echo $key->name;?>" class="form-control" placeholder="Enter Your Name">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Skills (separed by comma ,)</label>
                            <input type="text" name="skills" value="<?php echo $key->skills;?>" class="form-control" placeholder="Enter Your Skills">
                        </div>
                          <div class="form-group col-md-6">
                            <label>Date of Birth</label>
                            <input type="date" name="dob" class="form-control" value="<?php echo $key->dob;?>">
                        </div>
                        
                        <div class="form-group">
                            <label>Short Bio</label>
                            <input type="text" name="short_bio" class="form-control" value="<?php echo $key->short_bio;?>" placeholder="Enter Short Bio">
                        </div>
                        <div class="form-group">
                        <label>Biography</label>
                        <textarea name="long_bio" class="form-control" placeholder="Enter Your Biography"><?php echo $key->long_bio; ?></textarea>
                        </div>  
                        <div class="form-group col-md-6">
                            <label>Mobile Number</label>
                            <input type="tel" name="mobno" class="form-control" value="<?php echo $key->mobno;?>" placeholder="Enter Mobile Number">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Address</label>
                            <input type="text" name="address" class="form-control" value="<?php echo $key->address;?>" placeholder="Enter Your Address">
                        </div>
                        <div class="form-group">
                            <center><input type="submit" class="btn btn-primary" value="Update Profile"></center>
                        </div>  
                    </form>
                    </div>
                </div>
        </section>
        <?php endforeach ?>