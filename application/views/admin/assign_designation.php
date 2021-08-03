<div class="page-wrapper">
			<div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Assign EB Designation</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard');?>">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Assign EB Designation</li>
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
       					Assign EB Designation
       				</div>
       				<div class="card-body">
       					<form action="<?php echo base_url('admin/assignEBDesignationFinal/');?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                <select name="eb_cid" id="eb_cid" class="form-control" required="">
                    <option disabled="" selected="">Select EB Category</option>
                    <?php foreach ($eb_category as $key): ?>
                        <option value="<?php echo $key->eb_cid;?>"><?php echo $key->eb_cname;?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="form-group">
                <select name="eb_scid" id="eb_scid" class="form-control" required="">
                    <option disabled="" selected="">Select EB Sub Category</option>
                </select>
            </div>
            <div class="form-group">
                <select name="eb_did" id="eb_did" class="form-control" required="">
                    <option disabled="" selected="">Select EB Designation</option>
                </select>
            </div> 	
            <div class="form-group">
                <select name="eb_cell_id" class="form-control" required="">
                    <option disabled="" selected="">Select EB Cell</option>
                <?php foreach ($eb_cell as $key): ?>
                    <option value="<?php echo $key->id;?>"><?php echo $key->cell_name; ?></option>
                <?php endforeach ?>
                </select>
            </div>
            <input type="hidden" name="id" value="<?php echo $id;?>">		
					<div class="form-group">
						<input type="submit" class="btn btn-success" value="Assign EB Designation">
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