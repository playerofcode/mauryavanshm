<div class="page-wrapper">
			<div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Update Video</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Update Video</li>
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
       					Update Video
       				</div>
       				<div class="card-body">
       					<?php foreach ($video as $key): ?>
       					<form action="<?php echo base_url('admin/update_video/'.$key->id);?>" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label>Title</label>
						<input type="text" name="title" class="form-control" value="<?php echo set_value('title',$key->title); ?>" placeholder="Enter Title" required >
						<?php echo form_error('title');?>
					</div>
					<div class="form-group">
						<label>Link</label>
						<input type="url" name="link" class="form-control" value="<?php echo set_value('link',$key->link); ?>" placeholder="Enter youtube Link" required>
						<?php echo form_error('link');?>
					</div>
					
					<div class="form-group">
						<input type="submit" class="btn btn-success" value="Update Video">
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