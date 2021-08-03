<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model','model');
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
	}
	public function index()
	{
		$this->load->view('admin/login');
	}
	public function login()
	{
		$email=$this->input->post('email');
		$password=$this->input->post('password');
		if($this->model->login($email,$password)->num_rows()>0)
			{
				$this->session->set_userdata('email', $email);
		  	 	return redirect(base_url().'admin/dashboard');
			}
			else
			{
				$this->session->set_flashdata('msg', "Email/Password is incorrect. Try again");
  				return redirect(base_url().'admin/index');
			}
	}
	public function check_login()
	{
		if(empty($this->session->userdata('email')))
		{
		$this->session->set_flashdata('msg', "Please login to continue");
		redirect(base_url().'admin/index');
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->set_flashdata('msg', "Logged out successfully");
		return redirect(base_url().'admin/index');
	}
	public function dashboard()
	{
		$this->check_login();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/index');
		$this->load->view('admin/footer');
	}
	public function blog()
	{
		$this->check_login();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/blog');
		$this->load->view('admin/footer');
	}
	public function checkblog()
	{
		$config=[
		 	'upload_path'=>'./uploads/',
		 	'allowed_types'=>'gif|jpg|png|pdf|jpeg'
		 ];
		 $this->load->library('upload',$config);
		$this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[5]');
		$this->form_validation->set_rules('description', 'Description', 'required');
		 if ($this->form_validation->run() && $this->upload->do_upload('image'))
		 {
		 	$title=$this->input->post('title');
			$description=$this->input->post('description');
			$image=$this->upload->data();
			$image_path="uploads/".$image['raw_name'].$image['file_ext'];
			$data=array(
					 'title'=>$title,
					 'description'=>$description,
					 'image'=>$image_path
					 );
			if($this->model->bloginsert($data))
			{
				 $this->session->set_flashdata('msg', "Blog Posted Successfully."); 
   				 redirect(base_url().'admin/blog');
			}
			else
			{
				$this->session->set_flashdata('msg', "Something went wrong.Try again!"); 
   				 redirect(base_url().'admin/blog');
			}
		 }
		 else
		 {
		 	$upload_error=$this->upload->display_errors('<p class="text-danger">', '</p>');
		 	$this->load->view('admin/header');
		 	$this->load->view('admin/sidebar');
			$this->load->view('admin/blog',compact('upload_error'));
			$this->load->view('admin/footer');
		 }
	}
	public function bloglist()
	{
		$this->check_login();
		$data['blog']=$this->model->bloglist();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/bloglist',$data);
		$this->load->view('admin/footer');	
	}
	public function deleteblog()
	{
		$id=$this->uri->segment(3);
		if($this->model->deleteblog($id))
		{
		$this->session->set_flashdata('msg', " Blog Deleted Successfully."); 
   		redirect(base_url().'admin/bloglist');
		}
		else
		{
		$this->session->set_flashdata('msg', " Something went wrong!"); 
   		redirect(base_url().'admin/bloglist');
		}

	}
	public function editblog($id)
	{
		$this->check_login();
		$data['bloginfo']=$this->model->get_blog_info($id);
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/editblog',$data);
		$this->load->view('admin/footer');
	}
	public function updateblog()
	{
		if(!$_FILES['image']['name'])
		{
			$id=$this->input->post('id');
			$title=$this->input->post('title');
			$description=$this->input->post('description');
			 $data=array(
					 'title'=>$title,
					 'description'=>$description
					 );
                 $res=$this->model->UpdateBlog($data,$id);
                 if($res)
                 {
                 	$this->session->set_flashdata('msg', " Blog Updated Successfully"); 
   					redirect(base_url().'admin/bloglist');
                 }
                 else
                 {
                 	$this->session->set_flashdata('msg', " Something went wrong!"); 
   					redirect(base_url().'admin/bloglist');
                 }
		}
		else
		{
			// echo "Image choosen";
			$id=$this->input->post('id');	
			$res=$this->model->get_blog_info($id);
			$image_path=$res[0]->image;
			unlink($image_path);
			$config=[
		 	'upload_path'=>'./uploads',
		 	'allowed_types'=>'gif|jpg|png|jpeg'
		 ];
		 $this->load->library('upload',$config);
			 if($this->upload->do_upload('image'))
			 {
			 	$title=$this->input->post('title');
				$description=$this->input->post('description');
				$image=$this->upload->data();
				$image_path="uploads/".$image['raw_name'].$image['file_ext'];
				$data=array(
						 'title'=>$title,
						 'description'=>$description,
						 'image'=>$image_path
						 );
				if($this->model->UpdateBlog($data,$id))
				{
					 $this->session->set_flashdata('msg', "Blog updated Successfully.");
	   				 redirect(base_url().'admin/bloglist');
				}
				else
				{
					$this->session->set_flashdata('msg', "Something went wrong.Try again!"); 
	   				redirect(base_url().'admin/bloglist');
				}
			}
	}
	}
	public function gallery()
	{
		$this->check_login();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/gallery');
		$this->load->view('admin/footer');
	}
	public function add_gallery()
	{
		$config=[
		 	'upload_path'=>'./uploads/',
		 	'allowed_types'=>'gif|jpg|png|pdf|jpeg'
		 ];
		 $this->load->library('upload',$config);
		if($this->upload->do_upload('cat_image'))
		{
			$img=$this->upload->data();
			$image="uploads/".$img['raw_name'].$img['file_ext'];
			$data=array(
				'image'=>$image,
			);
			if($this->model->add_gallery($data))
			{
		  	 	$this->session->set_flashdata('msg', "Gallery Image Added successfully");
  				return redirect(base_url().'admin/gallery');
			}
			else
			{
				$this->session->set_flashdata('msg', "Something went wrong. Try again");
  				return redirect(base_url().'admin/gallery');
			}	
		}
		else
		{
		$data['upload_error']=$this->upload->display_errors('<p class="text-danger">', '</p>');
		$this->check_login();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/gallery',$data);
		$this->load->view('admin/footer');
		}

	}

	public function all_gallery()
	{
		$this->check_login();
		$data['gallery']=$this->model->getGallery();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/all_gallery',$data);
		$this->load->view('admin/footer');
	}
	public function delete_gallery($id)
	{
		$data=$this->model->getGallery($id);
		$image=$data[0]->image;
		if(!empty($image))
		{
			unlink($image);
		}
		if($this->model->deleteGallery($id))
			{
		  	 	$this->session->set_flashdata('msg', "Gallery Image deleted successfully");
  				return redirect(base_url().'admin/all_gallery');
			}
			else
			{
				$this->session->set_flashdata('msg', "Something went wrong");
  				return redirect(base_url().'admin/all_gallery');
			}
	}
	public function edit_gallery($id)
	{
		$this->check_login();
		$data['gallery']=$this->model->getGallery($id);
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/edit_gallery',$data);
		$this->load->view('admin/footer');
	}
	public function updateGallery($id)
	{
		$config=[
		 	'upload_path'=>'./uploads/',
		 	'allowed_types'=>'gif|jpg|png|pdf|jpeg'
		 ];
		 $this->load->library('upload',$config);
		$data=$this->model->getGallery($id);
		$old_image=$data[0]->image;
		if($this->upload->do_upload('image'))
		{
			if(!empty($old_image))
			{
				unlink($old_image);
			}
			$img=$this->upload->data();
			$image="uploads/".$img['raw_name'].$img['file_ext'];
		}
		else
		{
			$image=$old_image;
		}
		
			
			$data=array(
				'image'=>$image
			);
			if($this->model->updateGallery($data,$id))
			{
		  	 	$this->session->set_flashdata('msg', "Gallery Image updated successfully");
  				return redirect(base_url().'admin/all_gallery');
			}
			else
			{
				$this->session->set_flashdata('msg', "Something went wrong");
  				return redirect(base_url().'admin/all_gallery');
			}
	}
	public function service()
 	{
 		$this->check_login();
 		$this->load->view('admin/header');
 		$this->load->view('admin/sidebar');
 		$this->load->view('admin/service');
 		$this->load->view('admin/footer');
 	}
 	public function add_service()
 	{
 		$config=[
		 	'upload_path'=>'./uploads/',
		 	'allowed_types'=>'gif|jpg|png|pdf|jpeg'
		 ];
		 $this->load->library('upload',$config);
		$this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[5]');
		$this->form_validation->set_rules('description', 'Description', 'required');
		 if ($this->form_validation->run() && $this->upload->do_upload('image'))
		 {
		 	$title=$this->input->post('title');
			$description=$this->input->post('description');
			$image=$this->upload->data();
			$image_path="uploads/".$image['raw_name'].$image['file_ext'];
			$data=array(
					 'title'=>$title,
					 'description'=>$description,
					 'image'=>$image_path
					 );
			if($this->model->add_service($data))
			{
				 $this->session->set_flashdata('msg', "Service added Successfully."); 
   				 redirect(base_url().'admin/service');
			}
			else
			{
				$this->session->set_flashdata('msg', "Something went wrong.Try again!"); 
   				 redirect(base_url().'admin/service');
			}
		 }
		 else
		 {
		 	$upload_error=$this->upload->display_errors('<p class="text-danger">', '</p>');
		 	$this->load->view('admin/header');
		 	$this->load->view('admin/sidebar');
			$this->load->view('admin/service',compact('upload_error'));
			$this->load->view('admin/footer');
		 }
 	}
 	public function all_service()
 	{
 		$this->check_login();
 		$data['service']=$this->model->all_service();
 		$this->load->view('admin/header');
 		$this->load->view('admin/sidebar');
 		$this->load->view('admin/all_service',$data);
 		$this->load->view('admin/footer');
 	}
 	public function deleteservice($id)
 	{
 		$data=$this->model->all_service($id);
		echo $image=$data[0]->image;
		if(!empty($image))
		{
			unlink($image);
		}
 		if($this->model->deleteservice($id))
 		{
 			$this->session->set_flashdata('msg',"Service deleted successfully");
 			return redirect(base_url().'admin/all_service');	
 		}
 		else
 		{
 			$this->session->set_flashdata('msg',"Something went wrong");
 			return redirect(base_url().'admin/all_service');
 		}
 	}
 	public function edit_service($id)
 	{
 		$this->check_login();
 		$data['service']=$this->model->all_service($id);
 		$this->load->view('admin/header');
 		$this->load->view('admin/sidebar');
 		$this->load->view('admin/edit_service',$data);
 		$this->load->view('admin/footer');
 	}
 	public function update_service() 
 	{
 		$id=$this->input->post('id');	
 		$title=$this->input->post('title');
		$description=$this->input->post('description');
		$res=$this->model->all_service($id);
		$old_image=$res[0]->image;
			$config=[
		 	'upload_path'=>'./uploads/',
		 	'allowed_types'=>'gif|jpg|png|jpeg'
		 	];
		 	$this->load->library('upload',$config);
			 if($this->upload->do_upload('image'))
			 {
			 	if(!empty($old_image))
		 		{
		 		unlink($old_image);	
		 		}
		 		$image=$this->upload->data();
				$image_path="uploads/".$image['raw_name'].$image['file_ext'];
		 	}
		 	else
		 	{
				$image_path=$old_image;
		 	}
				$data=array(
						 'title'=>$title,
						 'description'=>$description,
						 'image'=>$image_path
						 );
				if($this->model->updateService($data,$id))
				{
					 $this->session->set_flashdata('msg', "Service updated Successfully.");
	   				 redirect(base_url().'admin/all_service');
				}
				else
				{
					$this->session->set_flashdata('msg', "Something went wrong.Try again!"); 
	   				redirect(base_url().'admin/all_service');
				}
 	}
 	public function video()
 	{
 		$this->check_login();
 		$this->load->view('admin/header');
 		$this->load->view('admin/sidebar');
 		$this->load->view('admin/video');
 		$this->load->view('admin/footer');
 	}
 	public function add_video()
 	{
 		$title=$this->input->post('title');
 		$link=$this->input->post('link');
 		$data=array(
 			'title'=>$title,
 			'link'=>$link
 		);
 		if($this->model->addVideo($data)):
 		$this->session->set_flashdata('msg', "Video added successfully"); 
	   	redirect(base_url().'admin/video');
		else:
		$this->session->set_flashdata('msg', "Something went wrong.Try again!"); 
	   	redirect(base_url().'admin/video');
		endif;
 	}
 	public function all_video()
 	{
 		$this->check_login();
 		$data['video']=$this->model->getVideo();
 		$this->load->view('admin/header');
 		$this->load->view('admin/sidebar');
 		$this->load->view('admin/all_video',$data);
 		$this->load->view('admin/footer');
 	}
 	public function delete_video($id)
 	{
 		if($this->model->deleteVideo($id))
 		{
 		$this->session->set_flashdata('msg',"Video deleted successfully");
 		return redirect(base_url().'admin/all_video');
 		}
 		else
 		{
 			$this->session->set_flashdata('msg',"Something went wrong");
 			return redirect(base_url().'admin/all_video');
 		}
 	}
 	public function edit_video($id)
 	{
 		$this->check_login();
 		$data['video']=$this->model->getVideo($id);
 		$this->load->view('admin/header');
 		$this->load->view('admin/sidebar');
 		$this->load->view('admin/edit_video',$data);
 		$this->load->view('admin/footer');
 	}
 	public function update_video($id)
 	{
 		$title=$this->input->post('title');
 		$link=$this->input->post('link');
 		$data=array(
 			'title'=>$title,
 			'link'=>$link
 		);
 		if($this->model->updateVideo($data,$id))
 		{
 		$this->session->set_flashdata('msg',"Video updated successfully");
 		return redirect(base_url().'admin/all_video');
 		}
 		else
 		{
 			$this->session->set_flashdata('msg',"Something went wrong");
 			return redirect(base_url().'admin/all_video');
 		}
 	}
	public function report()
	{
		$this->check_login();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/report');
		$this->load->view('admin/footer');
	}
	public function add_report()
	{
		$config=[
		 	'upload_path'=>'./uploads/',
		 	'allowed_types'=>'gif|jpg|png|pdf|jpeg'
		 ];
		 $this->load->library('upload',$config);
		if($this->upload->do_upload('image'))
		{
		$img=$this->upload->data();
		$image="uploads/".$img['raw_name'].$img['file_ext'];
		}
		if($this->upload->do_upload('pdf'))
		 {
		 	 $img=$this->upload->data();
		 	 $pdf="uploads/".$img['raw_name'].$img['file_ext'];
		 }
			$title=$this->input->post('title');
			$description=$this->input->post('description');
			$data=array(
				'title'=>$title,
				'image'=>$image,
				'description'=>$description,
				'pdf'=>$pdf
			);
			if($this->model->addReport($data))
			{
		  	 	$this->session->set_flashdata('msg', "Report added successfully");
  				return redirect(base_url().'admin/report');
			}
			else
			{
				$this->session->set_flashdata('msg', "Something went wrong");
  				return redirect(base_url().'admin/report');
			}
		}
	public function all_report()
	{
		$this->check_login();
		$data['report']=$this->model->getReport();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/all_report',$data);
		$this->load->view('admin/footer');
	}
	public function delete_report($id)
	{
		$data=$this->model->getReport($id);
		$image=$data[0]->image;
		$pdf=$data[0]->pdf;
		if(!empty($image))
		{
			unlink($image);
		}
		if(!empty($pdf))
		{
			unlink($pdf);
		}
		if($this->model->deleteReport($id))
		{
	  	 	$this->session->set_flashdata('msg', "Report deleted successfully");
				return redirect(base_url().'admin/all_report');
		}
		else
		{
			$this->session->set_flashdata('msg', "Something went wrong");
				return redirect(base_url().'admin/all_report');
		}
	}
	public function edit_report($id)
	{
	$this->check_login();
	$data['report']=$this->model->getReport($id);
	$this->load->view('admin/header');
	$this->load->view('admin/sidebar');
	$this->load->view('admin/edit_report',$data);
	$this->load->view('admin/footer');
	}	
	public function update_report($id)
	{
		$config=[
		 	'upload_path'=>'./uploads/',
		 	'allowed_types'=>'gif|jpg|png|pdf|jpeg'
		 ];
		 $this->load->library('upload',$config);
		$data=$this->model->getReport($id);
		$old_image=$data[0]->image;
		$old_pdf=$data[0]->pdf;
		if($this->upload->do_upload('image')):
		 	if(!empty($old_image)):unlink($old_image); endif;
		 	 $img=$this->upload->data();
		 	 $image="uploads/".$img['raw_name'].$img['file_ext'];
		 else:
		 	$image=$old_image;
		 endif;
		 if($this->upload->do_upload('pdf')):
		 	if(!empty($old_image)):unlink($old_image);endif;
		 	 $img=$this->upload->data();
		 	 $pdf="uploads/".$img['raw_name'].$img['file_ext'];
		 else:
		 	$pdf=$old_image;
		 endif;
			 $title=$this->input->post('title');
			$description=$this->input->post('description');
			$data=array(
				'title'=>$title,
				'image'=>$image,
				'description'=>$description,
				'pdf'=>$pdf
			);
			if($this->model->updateReport($data,$id))
			{
		  	 	$this->session->set_flashdata('msg', "Report updated successfully");
  				return redirect(base_url().'admin/all_report');
			}
			else
			{
				$this->session->set_flashdata('msg', "Something went wrong");
  				return redirect(base_url().'admin/all_report');
			}
	}
	public function team_category()
	{
		$this->check_login();
		$data['team_category']=$this->model->getTeamCategory();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/team_category',$data);
		$this->load->view('admin/footer');
	}
	public function edit_team_category($id)
	{
		$this->check_login();
		$data['team_category']=$this->model->getTeamCategory($id);
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/edit_team_category',$data);
		$this->load->view('admin/footer');
	}
	public function addTeamCategory()
	{
		$team_name=$this->input->post('team_name');
		$data=array(
			'team_name'=>$team_name
		);
		if($this->model->addTeamCategory($data))
		{
	  	 	$this->session->set_flashdata('msg', "Team Category added successfully");
				return redirect(base_url().'admin/team_category');
		}
		else
		{
			$this->session->set_flashdata('msg', "Something went wrong");
				return redirect(base_url().'admin/team_category');
		}
	}
	public function delete_team_category($team_id)
	{
		if($this->model->deleteTeamCategory($team_id))
		{
	  	 	$this->session->set_flashdata('msg', "Team Category deleted successfully");
				return redirect(base_url().'admin/team_category');
		}
		else
		{
			$this->session->set_flashdata('msg', "Something went wrong");
				return redirect(base_url().'admin/team_category');
		}
	}
	public function updateTeamCategory($team_id)
	{
		$team_name=$this->input->post('team_name');
		$data=array(
			'team_name'=>$team_name
		);
		if($this->model->updateTeamCategory($data,$team_id))
		{
	  	 	$this->session->set_flashdata('msg', "Team Category updated successfully");
				return redirect(base_url().'admin/team_category');
		}
		else
		{
			$this->session->set_flashdata('msg', "Something went wrong");
				return redirect(base_url().'admin/team_category');
		}
	}
	public function team_member()
	{
		$this->check_login();
		$data['team_category']=$this->model->getTeamCategory();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/team_member',$data);
		$this->load->view('admin/footer');
	}
	public function add_team_member()
	{
		$config=[
		 	'upload_path'=>'./uploads/',
		 	'allowed_types'=>'gif|jpg|png|pdf|jpeg'
		 ];
		 $this->load->library('upload',$config);
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('mobno', 'Mobile Number', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('designation', 'Designation', 'required');
		 if ($this->form_validation->run() && $this->upload->do_upload('image'))
		 {
		 	$name=$this->input->post('name');
		 	$mobno=$this->input->post('mobno');
		 	$email=$this->input->post('email');
		 	$designation=$this->input->post('designation');
		 	$team_id=$this->input->post('team_id');
			$image=$this->upload->data();
			$image_path="uploads/".$image['raw_name'].$image['file_ext'];
			$data=array(
					 'name'=>$name,
					 'mobno'=>$mobno,
					 'email'=>$email,
					 'team_id'=>$team_id,
					 'designation'=>$designation,
					 'image'=>$image_path
					 );
			if($this->model->addTeamMember($data))
			{
				 $this->session->set_flashdata('msg', "Team member added Successfully."); 
   				 redirect(base_url().'admin/team_member');
			}
			else
			{
				$this->session->set_flashdata('msg', "Something went wrong.Try again!"); 
   				 redirect(base_url().'admin/team_member');
			}
		 }
		 else
		 {
		 	$data['upload_error']=$this->upload->display_errors('<p class="text-danger">', '</p>');
		 	$data['team_category']=$this->model->getTeamCategory();
		 	$this->load->view('admin/header');
		 	$this->load->view('admin/sidebar');
			$this->load->view('admin/team_member',$data);
			$this->load->view('admin/footer');
		 }
	}
	public function all_team_member()
	{
		$this->check_login();
		$data['team_member']=$this->model->getTeamMember();
		$this->load->view('admin/header');
	 	$this->load->view('admin/sidebar');
		$this->load->view('admin/all_team_member',$data);
		$this->load->view('admin/footer');
	}
	public function delete_team_member($id)
	{
		$data=$this->model->getTeamMember($id);
		$image=$data[0]->image;
		if(!empty($image)):unlink($image);endif;
		if($this->model->deleteTeamMember($id))
		{
			 $this->session->set_flashdata('msg', "Team member deleted Successfully."); 
				 redirect(base_url().'admin/all_team_member');
		}
		else
		{
			$this->session->set_flashdata('msg', "Something went wrong.Try again!"); 
				 redirect(base_url().'admin/all_team_member');
		}
	}
	public function edit_team_member($id)
	{
		$this->check_login();
		$data['team_member']=$this->model->getTeamMember($id);
		$data['team_category']=$this->model->getTeamCategory();
		$this->load->view('admin/header');
	 	$this->load->view('admin/sidebar');
		$this->load->view('admin/edit_team_member',$data);
		$this->load->view('admin/footer');
	}
	public function updateTeamMember($id)
	{
		$config=[
		 	'upload_path'=>'./uploads/',
		 	'allowed_types'=>'gif|jpg|png|pdf|jpeg'
		 ];
		 $this->load->library('upload',$config);
		$data=$this->model->getTeamMember($id);
		$old_image=$data[0]->image;
		if($this->upload->do_upload('image')):
		$img=$this->upload->data();
		$image="uploads/".$img['raw_name'].$img['file_ext'];
		else:
		$image=$old_image;
		endif;
		$name=$this->input->post('name');
	 	$mobno=$this->input->post('mobno');
	 	$email=$this->input->post('email');
	 	$designation=$this->input->post('designation');
	 	$team_id=$this->input->post('team_id');
	 	$data=array(
					 'name'=>$name,
					 'mobno'=>$mobno,
					 'email'=>$email,
					 'team_id'=>$team_id,
					 'designation'=>$designation,
					 'image'=>$image
					 );
		if($this->model->updateTeamMember($data,$id))
		{
			 $this->session->set_flashdata('msg', "Team member updated Successfully."); 
				 redirect(base_url().'admin/all_team_member');
		}
		else
		{
			$this->session->set_flashdata('msg', "Something went wrong.Try again!"); 
				 redirect(base_url().'admin/all_team_member');
		}
	}
	public function enquiry()
	{
		$this->check_login();
		$data['enquiry']=$this->model->getEnquiry();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/enquiry',$data);
		$this->load->view('admin/footer');
	}
	public function delete_enquiry($id)
	{
		if($this->model->deleteEnquiry($id)):
			$this->session->set_flashdata('msg', "Enquiry deletde Successfully."); 
		    redirect(base_url().'admin/enquiry');
		else:
			$this->session->set_flashdata('msg', "Something went wrong."); 
		    redirect(base_url().'admin/enquiry');
		endif;
	}
	// Country Management
	public function country()
	{
		$this->check_login();
		$data['country']=$this->model->getCountry();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/country',$data);
		$this->load->view('admin/footer');
	}
	public function addCountry()
	{
		$country_name=$this->input->post('country_name');
		$data=array(
			'country_name'=>$country_name
		);
		if($this->model->addCountry($data)):
			$this->session->set_flashdata('msg', "Country added successfully."); 
		    redirect(base_url().'admin/country');
		else:
			$this->session->set_flashdata('msg', "Something went wrong."); 
		    redirect(base_url().'admin/country');
		endif;
	}
	public function deleteCountry($country_id)
	{
		if($this->model->deleteCountry($country_id)):
		$this->session->set_flashdata('msg', "Country deleted successfully."); 
		    redirect(base_url().'admin/country');
		else:
			$this->session->set_flashdata('msg', "Something went wrong."); 
		    redirect(base_url().'admin/country');
		endif;
	}
	public function editCountry($country_id)
	{
		$this->check_login();
		$data['country']=$this->model->getCountry($country_id);
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/edit_country',$data);
		$this->load->view('admin/footer');
	}
	public function updateCountry($country_id)
	{
		$country_name=$this->input->post('country_name');
		$data=array(
			'country_name'=>$country_name
		);
		if($this->model->updateCountry($data,$country_id)):
		$this->session->set_flashdata('msg', "Country updated successfully."); 
		    redirect(base_url().'admin/country');
		else:
			$this->session->set_flashdata('msg', "Something went wrong."); 
		    redirect(base_url().'admin/country');
		endif;
	}
	//State Management
	public function state()
	{
		$this->check_login();
		$data['country']=$this->model->getCountry();
		$data['state']=$this->model->getState();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/state',$data);
		$this->load->view('admin/footer');
	}
	public function addState()
	{
		$country_id=$this->input->post('country_id');
		$state_name=$this->input->post('state_name');
		$data=array(
			'country_id'=>$country_id,
			'state_name'=>$state_name
		);
		if($this->model->addState($data)):
		$this->session->set_flashdata('msg', "State added successfully."); 
		    redirect(base_url().'admin/state');
		else:
			$this->session->set_flashdata('msg', "Something went wrong."); 
		    redirect(base_url().'admin/state');
		endif;
	}
	public function editState($state_id)
	{
		$this->check_login();
		$data['country']=$this->model->getCountry();
		$data['state']=$this->model->getState($state_id);
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/edit_state',$data);
		$this->load->view('admin/footer');
	}
	public function updateState($state_id)
	{
		$country_id=$this->input->post('country_id');
		$state_name=$this->input->post('state_name');
		$data=array(
			'country_id'=>$country_id,
			'state_name'=>$state_name
		);
		if($this->model->updateState($data,$state_id)):
		$this->session->set_flashdata('msg', "State updated successfully."); 
		    redirect(base_url().'admin/state');
		else:
			$this->session->set_flashdata('msg', "Something went wrong."); 
		    redirect(base_url().'admin/state');
		endif;
	}
	public function deleteState($state_id)
	{
		$this->check_login();
		if($this->model->deleteState($state_id)):
		$this->session->set_flashdata('msg', "State deleted successfully."); 
		    redirect(base_url().'admin/state');
		else:
			$this->session->set_flashdata('msg', "Something went wrong."); 
		    redirect(base_url().'admin/state');
		endif;
	}
	//District Management
	public function district()
	{
		$this->check_login();
		$data['district']=$this->model->getDistrict();
		$data['country']=$this->model->getCountry();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/district',$data);
		$this->load->view('admin/footer');
	}
	public function deleteDistrict($district_id)
	{
		if($this->model->deleteDistrict($district_id)):
		$this->session->set_flashdata('msg', "District deleted successfully."); 
		    redirect(base_url().'admin/district');
		else:
			$this->session->set_flashdata('msg', "Something went wrong."); 
		    redirect(base_url().'admin/district');
		endif;
	}

	public function fetchState()
	{
		$country_id=$this->input->post('country_id');
		echo $this->model->fetchState($country_id);
	}
	public function fetchDistrict()
	{
		$state_id=$this->input->post('state_id');
		echo $this->model->fetchDistrict($state_id);
	}
	public function fetchTehsil()
	{
		$district_id=$this->input->post('district_id');
		echo $this->model->fetchTehsil($district_id);
	}
	public function fetchBlock()
	{
		$district_id=$this->input->post('district_id');
		echo $this->model->fetchBlock($district_id);
	}
	public function addDistrict()
	{
		$country_id=$this->input->post('country_id');
		$state_id=$this->input->post('state_id');
		$district_name=$this->input->post('district_name');
		$data=array(
			'country_id'=>$country_id,
			'state_id'=>$state_id,
			'district_name'=>$district_name
		);
		if($this->model->addDistrict($data)):
		$this->session->set_flashdata('msg', "District added successfully."); 
		    redirect(base_url().'admin/district');
		else:
			$this->session->set_flashdata('msg', "Something went wrong."); 
		    redirect(base_url().'admin/district');
		endif;
	}
	public function editDistrict($district_id)
	{
		$this->check_login();
		$data['district']=$this->model->getDistrict($district_id);
		$data['state']=$this->model->getState();
		$data['country']=$this->model->getCountry();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/edit_district',$data);
		$this->load->view('admin/footer');
	}
	public function updateDistrict($district_id)
	{
		$country_id=$this->input->post('country_id');
		$state_id=$this->input->post('state_id');
		$district_name=$this->input->post('district_name');
		$data=array(
			'country_id'=>$country_id,
			'state_id'=>$state_id,
			'district_name'=>$district_name
		);
		if($this->model->updateDistrict($data,$district_id)):
		$this->session->set_flashdata('msg', "District updated successfully."); 
		    redirect(base_url().'admin/district');
		else:
			$this->session->set_flashdata('msg', "Something went wrong."); 
		    redirect(base_url().'admin/district');
		endif;
	}
	//19 July, 2021
	public function tehsil()
	{
		$this->check_login();
		$data['tehsil']=$this->model->getTehsil();
		$data['country']=$this->model->getCountry();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/tehsil',$data);
		$this->load->view('admin/footer');
	}
	public function addTehsil()
	{
		$this->check_login();
		$country_id=$this->input->post('country_id');
		$state_id=$this->input->post('state_id');
		$district_id=$this->input->post('district_id');
		$tehsil_name=$this->input->post('tehsil_name');
		$data=array(
			'country_id'=>$country_id,
			'state_id'=>$state_id,
			'district_id'=>$district_id,
			'tehsil_name'=>$tehsil_name
		);
		if($this->model->addTehsil($data)):
		$this->session->set_flashdata('msg', "Tehsil added successfully."); 
		    redirect(base_url().'admin/tehsil');
		else:
			$this->session->set_flashdata('msg', "Something went wrong."); 
		    redirect(base_url().'admin/tehsil');
		endif;
	}
	public function deleteTehsil($tehsil_id)
	{
		if($this->model->deleteTehsil($tehsil_id)):
		$this->session->set_flashdata('msg', "Tehsil deleted successfully."); 
		    redirect(base_url().'admin/tehsil');
		else:
			$this->session->set_flashdata('msg', "Something went wrong."); 
		    redirect(base_url().'admin/tehsil');
		endif;
	}
	public function editTehsil($tehsil_id)
	{
	$data['tehsil']=$this->model->getTehsil($tehsil_id);
	$data['state']=$this->model->getState();
	$data['country']=$this->model->getCountry();
	$data['district']=$this->model->getDistrict();
	$this->load->view('admin/header');
	$this->load->view('admin/sidebar');
	$this->load->view('admin/edit_tehsil',$data);
	$this->load->view('admin/footer');
	}
	public function updateTehsil($tehsil_id)
	{
		$country_id=$this->input->post('country_id');
		$state_id=$this->input->post('state_id');
		$district_id=$this->input->post('district_id');
		$tehsil_name=$this->input->post('tehsil_name');
		$data=array(
			'country_id'=>$country_id,
			'state_id'=>$state_id,
			'district_id'=>$district_id,
			'tehsil_name'=>$tehsil_name
		);
		if($this->model->updateTehsil($data,$tehsil_id)):
		$this->session->set_flashdata('msg', "Tehsil updated successfully."); 
		    redirect(base_url().'admin/tehsil');
		else:
			$this->session->set_flashdata('msg', "Something went wrong."); 
		    redirect(base_url().'admin/tehsil');
		endif;
	}
	public function block()
	{
		$this->check_login();
		$data['block']=$this->model->getBlock();
		$data['country']=$this->model->getCountry();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/block',$data);
		$this->load->view('admin/footer');
	}
	public function deleteBlock($block_id)
	{
		if($this->model->deleteBlock($block_id)):
		$this->session->set_flashdata('msg', "Block deleted successfully."); 
		    redirect(base_url().'admin/block');
		else:
			$this->session->set_flashdata('msg', "Something went wrong."); 
		    redirect(base_url().'admin/block');
		endif;
	}
	public function addBlock()
	{
		$country_id=$this->input->post('country_id');
		$state_id=$this->input->post('state_id');
		$district_id=$this->input->post('district_id');
		//$tehsil_id=$this->input->post('tehsil_id');
		$block_name=$this->input->post('block_name');
		$data=array(
			'country_id'=>$country_id,
			'state_id'=>$state_id,
			'district_id'=>$district_id,
			//'tehsil_id'=>$tehsil_id,
			'block_name'=>$block_name
		);
		if($this->model->addBlock($data)):
		$this->session->set_flashdata('msg', "Block added successfully."); 
		    redirect(base_url().'admin/block');
		else:
			$this->session->set_flashdata('msg', "Something went wrong."); 
		    redirect(base_url().'admin/block');
		endif;
	}
	public function editBlock($block_id)
	{
		$this->check_login();
		$data['block']=$this->model->getBlock($block_id);
		$data['state']=$this->model->getState();
		$data['country']=$this->model->getCountry();
		$data['district']=$this->model->getDistrict();
		$data['tehsil']=$this->model->getTehsil();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/edit_block',$data);
		$this->load->view('admin/footer');
	}
	public function updateBlock($block_id)
	{
		$country_id=$this->input->post('country_id');
		$state_id=$this->input->post('state_id');
		$district_id=$this->input->post('district_id');
		//$tehsil_id=$this->input->post('tehsil_id');
		$block_name=$this->input->post('block_name');
		$data=array(
			'country_id'=>$country_id,
			'state_id'=>$state_id,
			'district_id'=>$district_id,
			//'tehsil_id'=>$tehsil_id,
			'block_name'=>$block_name
		);
		if($this->model->updateBlock($data,$block_id)):
		$this->session->set_flashdata('msg', "Block updated successfully."); 
		    redirect(base_url().'admin/block');
		else:
			$this->session->set_flashdata('msg', "Something went wrong."); 
		    redirect(base_url().'admin/block');
		endif;
	}
	public function users()
	{
		$this->check_login();
		$data['users']=$this->model->getUser();
		// echo "<pre>";
		// print_r($data);
		// exit();
		//$data['eb_category']=$this->model->getEBCategory();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/users',$data);
		$this->load->view('admin/footer');
	}
	public function deleteUsers($id)
	{
		if($this->model->deleteUsers($id)):
		$this->session->set_flashdata('msg', "User deleted successfully."); 
		    redirect(base_url().'admin/users');
		else:
			$this->session->set_flashdata('msg', "Something went wrong."); 
		    redirect(base_url().'admin/users');
		endif;
	}
	//21 July, 2021
	public function setUserDesignation()
	{
		$designation=$this->input->post('designation');
		$id=$this->input->post('id');
		$data=array(
			'designation'=>$designation
		);
		if($this->model->setUserDesignation($id,$data)):
		$this->session->set_flashdata('msg', "User designation set successfully."); 
		    redirect(base_url().'admin/users');
		else:
			$this->session->set_flashdata('msg', "Something went wrong."); 
		    redirect(base_url().'admin/users');
		endif;
	}
	public function eb_category()
	{
		$this->check_login();
		$data['eb_category']=$this->model->getEBCategory();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/eb_category',$data);
		$this->load->view('admin/footer');
	}
	public function addEBCategory()
	{
		$eb_cname=$this->input->post('eb_cname');
		$data=array(
			'eb_cname'=>$eb_cname
		);
		if($this->model->addEBCategory($data)):
		$this->session->set_flashdata('msg', "Executive Body Category added successfully."); 
		    redirect(base_url().'admin/eb_category');
		else:
			$this->session->set_flashdata('msg', "Something went wrong."); 
		    redirect(base_url().'admin/eb_category');
		endif;
	}
	public function deleteEBCategory($eb_cid)
	{
		if($this->model->deleteEBCategory($eb_cid)):
		$this->session->set_flashdata('msg', "Executive Body Category deleted successfully."); 
		    redirect(base_url().'admin/eb_category');
		else:
			$this->session->set_flashdata('msg', "Something went wrong."); 
		    redirect(base_url().'admin/eb_category');
		endif;
	}
	public function editEBCategory($eb_cid)
	{
		$this->check_login();
		$data['eb_category']=$this->model->getEBCategory($eb_cid);
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/edit_eb_category',$data);
		$this->load->view('admin/footer');
	}
	public function updateEBCategory($eb_cid)
	{
		$eb_cname=$this->input->post('eb_cname');
		$data=array(
			'eb_cname'=>$eb_cname
		);
		if($this->model->updateEBCategory($eb_cid,$data)):
		$this->session->set_flashdata('msg', "Executive Body Category updated successfully."); 
		    redirect(base_url().'admin/eb_category');
		else:
			$this->session->set_flashdata('msg', "Something went wrong."); 
		    redirect(base_url().'admin/eb_category');
		endif;
	}
	public function eb_sub_category()
	{
		$this->check_login();
		$data['eb_category']=$this->model->getEBCategory();
		$data['eb_sub_category']=$this->model->getEBSubCategory();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/eb_sub_category',$data);
		$this->load->view('admin/footer');
	}
	public function deleteEBSCategory($eb_scid)
	{
		if($this->model->deleteEBSCategory($eb_scid)):
		$this->session->set_flashdata('msg', "Executive Body Sub Category deleted successfully."); 
		    redirect(base_url().'admin/eb_sub_category');
		else:
			$this->session->set_flashdata('msg', "Something went wrong."); 
		    redirect(base_url().'admin/eb_sub_category');
		endif;
	}
	public function addEBSCategory()
	{
		$eb_cid=$this->input->post('eb_cid');
		$eb_scname=$this->input->post('eb_scname');
		$data=array(
			'eb_cid'=>$eb_cid,
			'eb_scname'=>$eb_scname
		);
		if($this->model->addEBSCategory($data)):
		$this->session->set_flashdata('msg', "Executive Body Sub Category added successfully."); 
		    redirect(base_url().'admin/eb_sub_category');
		else:
			$this->session->set_flashdata('msg', "Something went wrong."); 
		    redirect(base_url().'admin/eb_sub_category');
		endif;
	}
	public function editEBSCategory($eb_scid)
	{
		$this->check_login();
		$data['eb_category']=$this->model->getEBCategory();
		$data['eb_sub_category']=$this->model->getEBSubCategory($eb_scid);
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/edit_eb_sub_category',$data);
		$this->load->view('admin/footer');
	}
	public function updateEBSubCategory($eb_scid)
	{
		
		$eb_cid=$this->input->post('eb_cid');
		$eb_scname=$this->input->post('eb_scname');
		$data=array(
			'eb_cid'=>$eb_cid,
			'eb_scname'=>$eb_scname
		);
		if($this->model->updateEBSubCategory($eb_scid,$data)):
		$this->session->set_flashdata('msg', "Executive Body Sub Category updated successfully."); 
		    redirect(base_url().'admin/eb_sub_category');
		else:
			$this->session->set_flashdata('msg', "Something went wrong."); 
		    redirect(base_url().'admin/eb_sub_category');
		endif;
	}
	public function eb_designation()
	{
		$this->check_login();
		$data['eb_category']=$this->model->getEBCategory();
		//$data['eb_sub_category']=$this->model->getEBSubCategory();
		$data['eb_designation']=$this->model->getEBDesignation();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/eb_designation',$data);
		$this->load->view('admin/footer');
	}
	public function fetchEBSubCategory()
	{
		$eb_cid=$this->input->post('eb_cid');
		echo $this->model->fetchEBSubCategory($eb_cid);
	}
	public function addEBDesignation()
	{
		$eb_cid=$this->input->post('eb_cid');
		$eb_scid=$this->input->post('eb_scid');
		$eb_dname=$this->input->post('eb_dname');
		$data=array(
			'eb_cid'=>$eb_cid,
			'eb_scid'=>$eb_scid,
			'eb_dname'=>$eb_dname
		);
		if($this->model->addEBDesignation($data)):
		$this->session->set_flashdata('msg', "Executive Body Designation added successfully."); 
		    redirect(base_url().'admin/eb_designation');
		else:
			$this->session->set_flashdata('msg', "Something went wrong."); 
		    redirect(base_url().'admin/eb_designation');
		endif;
	}
	public function deleteEBDesignation($eb_did)
	{
		if($this->model->deleteEBDesignation($eb_did)):
		$this->session->set_flashdata('msg', "Executive Body Designation deleted successfully."); 
		    redirect(base_url().'admin/eb_designation');
		else:
			$this->session->set_flashdata('msg', "Something went wrong."); 
		    redirect(base_url().'admin/eb_designation');
		endif;
	}
	public function editEBDesignation($eb_did)
	{
		$this->check_login();
		$data['eb_designation']=$this->model->getEBDesignation($eb_did);
		$data['eb_category']=$this->model->getEBCategory();
		$data['eb_sub_category']=$this->model->getEBSubCategory();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/edit_eb_designation',$data);
		$this->load->view('admin/footer');
	}
	public function updateEBDesignation($eb_did)
	{
		$eb_cid=$this->input->post('eb_cid');
		$eb_scid=$this->input->post('eb_scid');
		$eb_dname=$this->input->post('eb_dname');
		$data=array(
			'eb_cid'=>$eb_cid,
			'eb_scid'=>$eb_scid,
			'eb_dname'=>$eb_dname
		);
		if($this->model->updateEBDesignation($eb_did,$data)):
		$this->session->set_flashdata('msg', "Executive Body Designation updated successfully."); 
		    redirect(base_url().'admin/eb_designation');
		else:
			$this->session->set_flashdata('msg', "Something went wrong."); 
		    redirect(base_url().'admin/eb_designation');
		endif;
	}
	public function assignEBDesignation($id)
	{
		$this->check_login();
		$data['eb_category']=$this->model->getEBCategory();
		$data['eb_cell']=$this->model->getEBCell();
		$data['id']=$id;
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/assign_designation',$data);
		$this->load->view('admin/footer');
	}
	public function assignEBDesignationFinal()
	{
		$this->check_login();
		$eb_cid=$this->input->post('eb_cid');
		$eb_scid=$this->input->post('eb_scid');
		$eb_did=$this->input->post('eb_did');
		$eb_cell_id=$this->input->post('eb_cell_id');
		$id=$this->input->post('id');
		$data=array(
			'eb_cid'=>$eb_cid,
			'eb_scid'=>$eb_scid,
			'eb_did'=>$eb_did,
			'eb_cell_id'=>$eb_cell_id,
			'status'=>'active'
		);
		if($this->model->assignEBDesignation($id,$data)):
		$this->session->set_flashdata('msg', "User Designation assigned successfully."); 
		    redirect(base_url().'admin/users');
		else:
			$this->session->set_flashdata('msg', "Something went wrong."); 
		    redirect(base_url().'admin/users');
		endif;
	}
	public function fetchEBDesignation()
	{
		$eb_scid=$this->input->post('eb_scid');
		echo $this->model->fetchEBDesignation($eb_scid);
	}
	//22 July, 2021
	public function eb_cell()
	{
		$this->check_login();
		$data['eb_cell']=$this->model->getEBCell();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/eb_cell',$data);
		$this->load->view('admin/footer');
	}
	public function deleteEBCell($id)
	{
	if($this->model->deleteEBCell($id)):
		$this->session->set_flashdata('msg', "EB Cell deleted successfully."); 
		    redirect(base_url().'admin/eb_cell');
		else:
			$this->session->set_flashdata('msg', "Something went wrong."); 
		    redirect(base_url().'admin/eb_cell');
		endif;
	}
	public function addEBCell()
	{
		$cell_name=$this->input->post('cell_name');
		$data=array(
			'cell_name'=>$cell_name
		);
		if($this->model->addEBCell($data)):
		$this->session->set_flashdata('msg', "EB Cell added successfully."); 
		    redirect(base_url().'admin/eb_cell');
		else:
			$this->session->set_flashdata('msg', "Something went wrong."); 
		    redirect(base_url().'admin/eb_cell');
		endif;
	}
	public function editEBCell($id)
	{
		$this->check_login();
		$data['eb_cell']=$this->model->getEBCell($id);
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/edit_eb_cell',$data);
		$this->load->view('admin/footer');
	}
	public function updateEBCell($id)
	{
		$cell_name=$this->input->post('cell_name');
		$data=array(
			'cell_name'=>$cell_name
		);
		if($this->model->updateEBCell($id,$data)):
		$this->session->set_flashdata('msg', "EB Cell updated successfully."); 
		    redirect(base_url().'admin/eb_cell');
		else:
			$this->session->set_flashdata('msg', "Something went wrong."); 
		    redirect(base_url().'admin/eb_cell');
		endif;
	}
	public function filter_user()
	{
		$this->check_login();
		$data['country']=$this->model->getCountry();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/filter_user',$data);
		$this->load->view('admin/footer');
	}
	public function setFilterUser()
	{
		$country_id=$this->input->post('country_id');
		$state_id=$this->input->post('state_id');
		$district_id=$this->input->post('district_id');
		$tehsil_id=$this->input->post('tehsil_id');
		$block_id=$this->input->post('block_id');
		$data=array(
			'country_id'=>$country_id,
			'state_id'=>$state_id,
			'district_id'=>$district_id,
			'tehsil_id'=>$tehsil_id,
			'block_id'=>$block_id
		);
		$data['users']=$this->model->setFilterUser($data);
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/filter_users',$data);
		$this->load->view('admin/footer');
	}
	//23 July, 2021
	public function members()
	{
		$data['members']=$this->model->getMembers();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/members',$data);
		$this->load->view('admin/footer');
	}
	public function generate_excel()
		{
  $this->load->library("excel");
  $object = new PHPExcel();

  $object->setActiveSheetIndex(0);

  $table_columns = array("Name", "Mobile Number", "Email", "Country", "State","District","Tehsil","Block","Address");

  $column = 0;

  foreach($table_columns as $field)
  {
   $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
   $column++;
  }

  $res = $this->model->getUsers();

  $excel_row = 2;
  $i=1;
  foreach($res as $row)
  {
   $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row['name']);
   $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row['mobno']);
   $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row['email']);
   $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row['country']);
   $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row['state']);
   $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row['district']);
   $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row['tehsil']);
   $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row['block']);
   $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $row['address']);
   $excel_row++;$i++;
  }

  $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
  header('Content-Type: application/vnd.ms-excel');
  header('Content-Disposition: attachment;filename="Member Data.xls"');
  $object_writer->save('php://output');
		}
}//main class end

?>