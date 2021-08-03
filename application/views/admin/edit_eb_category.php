<div class="page-wrapper">
			<div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Update EB Category</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard');?>">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Update EB Category</li>
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
       					Update EB Category
       				</div>
       				<div class="card-body">
       					<?php foreach ($eb_category as $key): ?>
       					<form action="<?php echo base_url('admin/updateEBCategory/'.$key->eb_cid);?>" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label>Title</label>
						<input type="text" name="eb_cname" class="form-control" value="<?php echo set_value('eb_cname',$key->eb_cname); ?>" placeholder="Enter Country Name" required >
						<?php echo form_error('eb_cname');?>
					</div>					
					<div class="form-group">
						<input type="submit" class="btn btn-success" value="Update EB Category">
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