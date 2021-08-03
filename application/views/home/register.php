        <div class="page--header pt--60 pb--60 text-center" data-bg-img="img/page-header-img/bg.jpg" data-overlay="0.85">
            <div class="container">
                <div class="title">
                    <h2 class="h1 text-white">Register</h2>
                </div>
                <ul class="breadcrumb text-gray ff--primary">
                    <li><a href="<?php echo base_url();?>" class="btn-link">Home</a></li>
                    <li class="active"><span class="text-primary">Register</span></li>
                </ul>
            </div>
        </div>
        <div class="contact--section pt--80 pb--20">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                     <?php if($this->session->flashdata('msg')): ?>
                     <div class="alert alert-success" style="padding:10px!important;"><?php echo $this->session->flashdata('msg');?></div>
                    <?php endif;?>
        <form action="<?php echo base_url('home/registerUser');?>" method="post" enctype="multipart/form-data">
            <div class="row">
            <div class="form-group col-md-6">
                <label>Name <b class="text-danger float-left">*</b></label>
                <input type="text" name="name" class="form-control" placeholder="Enter Your Name" value="<?php echo set_value('name');?>"/>
                <span><?php echo form_error('name'); ?></span>
            </div>
            <div class="form-group col-md-6">
                <label>Mobile Number <b class="text-danger float-left">*</b></label>
                <input type="text" name="mobno" class="form-control" placeholder="Enter Your Mobile Number" value="<?php echo set_value('mobno');?>"/>
                <span><?php echo form_error('mobno'); ?></span>
            </div>
            </div>
            <div class="row">
            <div class="form-group col-md-6">
                <label>Email <b class="text-danger float-left">*</b></label>
                <input type="text" name="email" class="form-control" placeholder="Enter Your Email" value="<?php echo set_value('email');?>"/>
                <span><?php echo form_error('email'); ?></span>
            </div>
            <div class="form-group col-md-6">
                <label>Country <b class="text-danger float-left">*</b></label>
                <select name="country_id" id="country_id" class="form-control">
                    <option disabled="" selected="">Select Country</option>
                    <?php foreach ($country as $key): ?>
                    <option value="<?php echo $key->country_id;?>"><?php echo $key->country_name; ?></option>
                    <?php endforeach ?>
                </select>
                <span><?php echo form_error('country_id'); ?></span>
            </div>
            </div>
            <div class="row">
            <div class="form-group col-md-6">
                <label>State <b class="text-danger float-left">*</b></label>
                <select name="state_id" id="state_id" class="form-control" >
                    <option disabled="" selected="">Select State</option>
                </select>
                <span><?php echo form_error('state_id'); ?></span>
            </div>
            <div class="form-group col-md-6">
                <label>District <b class="text-danger float-left">*</b></label>
                <select name="district_id" id="district_id" class="form-control">
                    <option disabled="" selected="">Select District</option>
                </select>
                <span><?php echo form_error('district_id'); ?></span>
            </div>
            </div>
            <div class="row">
            <!-- <div class="form-group col-md-6">
                <label>Tehsil <span class="text-danger">*</span></label>
                <select name="tehsil_id" id="tehsil_id" class="form-control" r>
                    <option disabled="" selected="">Select Tehsil</option>
                </select>
                <span><?php echo form_error('tehsil_id'); ?></span>
            </div> -->
            <div class="form-group col-md-6">
                <label>Block <b class="text-danger float-left">*</b></label>
                <select name="block_id" id="block_id" class="form-control">
                    <option disabled="" selected="">Select Block</option>
                </select>
                <span><?php echo form_error('block_id'); ?></span>
            </div>
            <div class="form-group col-md-6">
                <label>Address <b class="text-danger float-left">*</b></label>
                <input type="text" name="address" class="form-control" placeholder="Enter Your Address"  value="<?php echo set_value('address');?>"/>
                <span><?php echo form_error('address'); ?></span>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                <label>Upload Resume/CV </label>
                <input type="file" name="resume" class="form-control"/>
                </div>
                <div class="form-group col-md-6">
                <label>Password <b class="text-danger float-left">*</b></label>
                <input type="password" name="password" class="form-control" placeholder="Create Password"  value="<?php echo set_value('password');?>"/>
                <span><?php echo form_error('password'); ?></span>
                </div>
            </div>
            <div class="form-group text-center">
                <input type="submit" class="btn btn-primary" value="Register Now"/>
            </div>
        </form>
    </div>
                </div>
            </div>
        </div>