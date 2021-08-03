<div class="page-wrapper">
			<div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Update State</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard');?>">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Update State</li>
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
       					Update State
       				</div>
       				<div class="card-body">
       					<?php foreach ($state as $key): ?>
       					<form action="<?php echo base_url('admin/updateState/'.$key->state_id);?>" method="post" enctype="multipart/form-data">
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
						<label>State Name</label>
						<input type="text" name="state_name" class="form-control" value="<?php echo set_value('state_name',$key->state_name); ?>" placeholder="Enter State Name" required >
						<?php echo form_error('state_name');?>
					</div>					
					<div class="form-group">
						<input type="submit" class="btn btn-success" value="Update Country">
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