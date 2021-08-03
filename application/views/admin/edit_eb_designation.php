<div class="page-wrapper">
			<div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Update EB Designation</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard');?>">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Update EB Designation</li>
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
       					Update EB Designation
       				</div>
       				<div class="card-body">
       					<?php foreach ($eb_designation as $key): ?>
       					<form action="<?php echo base_url('admin/updateEBDesignation/'.$key->eb_did);?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                        <label>EB Category Name</label>
                        <select name="eb_cid" class="form-control">
                            <?php foreach ($eb_category as $res): ?>
                            <option value="<?php echo $res->eb_cid;?>"
                                <?php 
                                if($res->eb_cid == $key->eb_cid):echo 'selected';endif;
                                ?>
                                ><?php echo $res->eb_cname; ?></option>
                            <?php endforeach ?>

                        </select>
                        </div>
    					 <div class="form-group">
                        <label>EB Sub Category Name</label>
                        <select name="eb_scid" class="form-control">
                            <?php foreach ($eb_sub_category as $res): ?>
                            <option value="<?php echo $res->eb_scid;?>"
                                <?php 
                                if($res->eb_scid == $key->eb_scid):echo 'selected';endif;
                                ?>
                                ><?php echo $res->eb_scname; ?></option>
                            <?php endforeach ?>
                        </select>
                        </div>	
                        <div class="form-group">
                            <input type="text" name="eb_dname" value="<?php echo $key->eb_dname;?>" class="form-control" placeholder="Enter EB Designation" required>
                        </div>  			
					<div class="form-group">
						<input type="submit" class="btn btn-success" value="Update EB Designation">
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