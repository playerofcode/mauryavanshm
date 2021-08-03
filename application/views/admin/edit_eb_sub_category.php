<div class="page-wrapper">
			<div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Update EB Sub Category</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard');?>">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Update EB Sub Category</li>
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
       					Update EB Sub Category
       				</div>
       				<div class="card-body">
       					<?php foreach ($eb_sub_category as $key): ?>
       					<form action="<?php echo base_url('admin/updateEBSubCategory/'.$key->eb_scid);?>" method="post" enctype="multipart/form-data">
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
						<input type="text" name="eb_scname" class="form-control" value="<?php echo set_value('eb_scname',$key->eb_scname); ?>" placeholder="Enter State Name" required >
						<?php echo form_error('eb_scname');?>
					</div>					
					<div class="form-group">
						<input type="submit" class="btn btn-success" value="Update EB Sub Category">
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