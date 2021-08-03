<div class="page-wrapper">
			<div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Update District</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard');?>">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Update District</li>
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
       					Update District
       				</div>
       				<div class="card-body">
       					<?php foreach ($district as $key): ?>
       					<form action="<?php echo base_url('admin/updateDistrict/'.$key->district_id);?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                        <label>Country</label>
                        <select name="country_id" class="form-control">
                            <?php foreach ($country as $res): ?>
                            <option value="<?php echo $res->country_id;?>"
                                <?php 
                                if($res->country_id == $key->country_id):echo 'selected';endif;
                                ?>
                                ><?php echo $res->country_name; ?></option>
                            <?php endforeach ?>
                        </select>
                         </div>
					<div class="form-group">
                        <label>State</label>
                        <select name="state_id" class="form-control">
                            <?php foreach ($state as $res): ?>
                            <option value="<?php echo $res->country_id;?>"
                                <?php 
                                if($res->state_id == $key->state_id):echo 'selected';endif;
                                ?>
                                ><?php echo $res->state_name; ?></option>
                            <?php endforeach ?>
                        </select>
                         </div>	
                         <div class="form-group">
                            <label>District</label>
                            <input type="text" name="district_name" value="<?php echo $key->district_name;?>" class="form-control">
                         </div>				
					<div class="form-group">
						<input type="submit" class="btn btn-success" value="Update District">
					</div>
				</form>
				<?php endforeach ?>
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