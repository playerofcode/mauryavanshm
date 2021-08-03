<div class="page-wrapper">
			<div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Filter User</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard');?>">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Filter User</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
       		</div>
       		<div class="container-fluid">
       			<div class="row wizard-content">
       				<div class="col-sm-12">
       					 <?php if($responce = $this->session->flashdata('msg')): ?>
                     <div class="alert alert-warning"><?php echo $responce;?></div>
            <?php endif;?>
       			<div class="card ">
       				<div class="card-header bg-success text-white">
       					Filter User
       				</div>
       				<div class="card-body">
       					<form action="<?php echo base_url('admin/setFilterUser/');?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                        <label>Country</label>
                        <select name="country_id" id="country_id" class="form-control">
                            <option disabled="" selected="">Select Country</option>
                            <?php foreach ($country as $res): ?>
                            <option value="<?php echo $res->country_id;?>"
                                ><?php echo $res->country_name; ?></option>
                            <?php endforeach ?>
                        </select>
                         </div>
					<div class="form-group">
                        <label>State</label>
                        <select name="state_id" id="state_id" class="form-control">
                            <option disabled="" selected="">Select State</option>    
                        </select>
                         </div>	
                         <div class="form-group">
                        <label>District</label>
                        <select name="district_id" id="district_id" class="form-control">
                            <option disabled="" selected="">Select District</option>
                        </select>
                         </div> 
                         <div class="form-group">
                        <label>Tehsil</label>
                        <select name="tehsil_id" id="tehsil_id" class="form-control">
                           <option disabled="" selected="">Select Tehsil</option>
                        </select>
                         </div> 
                         <div class="form-group">
                        <label>Block</label>
                        <select name="block_id" id="block_id" class="form-control">
                           <option disabled="" selected="">Select Block</option>
                        </select>
                         </div> 			
					<div class="form-group">
						<input type="submit" class="btn btn-success" value="Filter Now">
					</div>
				</form>
       				</div>
       			</div>
       			</div>
       		</div>
       		</div>
</div>
<script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
     <script>
         CKEDITOR.replace( 'ckeditor' );
    </script>