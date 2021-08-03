<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Home_model','model');
		$config=[
		 	'upload_path'=>'./uploads/',
		 	'allowed_types'=>'gif|jpg|png|pdf|jpeg|doc'
		 ];
		 $this->load->library('upload',$config);
		 $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
	}
	public function index()
	{
		$this->load->view('home/header');
		$this->load->view('home/index');
		$this->load->view('home/footer');
	}
	public function about()
	{
		$this->load->view('home/header');
		$this->load->view('home/about');
		$this->load->view('home/footer');
	}
	public function contact()
	{
		$this->load->view('home/header');
		$this->load->view('home/contact');
		$this->load->view('home/footer');
	}
	public function blog()
	{
		$this->load->view('home/header');
		$this->load->view('home/blog');
		$this->load->view('home/footer');
	}
	public function blog_details()
	{
		$this->load->view('home/header');
		$this->load->view('home/blog_details');
		$this->load->view('home/footer');
	}
	public function faq()
	{
		$this->load->view('home/header');
		$this->load->view('home/faq');
		$this->load->view('home/footer');
	}
	public function members()
	{
		$this->load->view('home/header');
		$this->load->view('home/members');
		$this->load->view('home/footer');
	}
	public function member_profile()
	{
		$this->check_login();
		$data['profile']=$this->model->getUserInfoByEmail($this->session->userdata('email'));
		$this->load->view('home/header');
		$this->load->view('home/member_profile',$data);
		$this->load->view('home/footer');
	}
	public function groups()
	{
		$this->load->view('home/header');
		$this->load->view('home/groups');
		$this->load->view('home/footer');
	}
	public function group_home()
	{
		$this->load->view('home/header');
		$this->load->view('home/group_home');
		$this->load->view('home/footer');
	}
	public function activity()
	{
		$this->load->view('home/header');
		$this->load->view('home/activity');
		$this->load->view('home/footer');
	}
	public function forums()
	{
		$this->load->view('home/header');
		$this->load->view('home/forums');
		$this->load->view('home/footer');
	}
	public function sub_forums()
	{
		$this->load->view('home/header');
		$this->load->view('home/sub_forums');
		$this->load->view('home/footer');
	}
	public function topics()
	{
		$this->load->view('home/header');
		$this->load->view('home/topics');
		$this->load->view('home/footer');
	}
	public function topic_replies()
	{
		$this->load->view('home/header');
		$this->load->view('home/topic_replies');
		$this->load->view('home/footer');
	}
	public function register()
	{
		$data['country']=$this->model->getCountry();
		$this->load->view('home/header');
		$this->load->view('home/register',$data);
		$this->load->view('home/footer');
	}
	public function registerUser()
	{
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('mobno', 'Mobile Number', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('country_id', 'Country', 'required');
		$this->form_validation->set_rules('state_id', 'State', 'required');
		$this->form_validation->set_rules('district_id', 'District', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('block_id', 'Block', 'required');
		$this->form_validation->set_rules('address', 'Address', 'required');
		if($this->form_validation->run())
		{
		$name=$this->input->post('name');
		$mobno=$this->input->post('mobno');
		$email=$this->input->post('email');
		$country_id=$this->input->post('country_id');
		$state_id=$this->input->post('state_id');
		$district_id=$this->input->post('district_id');
		$password=$this->input->post('password');
		$block_id=$this->input->post('block_id');
		$address=$this->input->post('address');
		//$user_type=$this->input->post('user_type');
		if($this->upload->do_upload('resume'))
		{
		$img=$this->upload->data();
		$resume="uploads/".$img['raw_name'].$img['file_ext'];
		}
		else
		{
		$resume='';
		}
		$data=array(
			'name'=>$name,
			'mobno'=>$mobno,
			'email'=>$email,
			'country_id'=>$country_id,
			'state_id'=>$state_id,
			'district_id'=>$district_id,
			//'tehsil_id'=>$tehsil_id,
			'block_id'=>$block_id,
			'address'=>$address,
			'resume'=>$resume,
			'password'=>$password
		);
		if($this->model->registerUser($data)):
			$this->session->set_flashdata('msg', "Register successfully.");
  			return redirect(base_url().'home/register');
		else:
			$this->session->set_flashdata('msg', "Something went wrong.");
  			return redirect(base_url().'home/register');
		endif;
		}
		else
		{
			$this->register();
		}
	}
	public function auth()
	{
		$email=$this->input->post('email');
		$password=$this->input->post('password');
		if($this->model->login($email,$password)->num_rows()>0)
		{
			$this->session->set_userdata('email', $email);
	  	 	return redirect(base_url().'home/index');
		}
		else
		{
			$this->session->set_flashdata('msg', "Email/Password is incorrect. Try again");
				return redirect(base_url().'home/register');
		}
	}
	public function check_login()
	{
		if(empty($this->session->userdata('email')))
		{
		$this->session->set_flashdata('msg', "Please login to continue");
		redirect(base_url().'home/register');
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->set_flashdata('msg', "Logged out successfully");
		return redirect(base_url().'home/index');
	}
	public function edit_profile($id)
	{
		$data['profile']=$this->model->getUserInfoByID($id);
		$this->load->view('home/header');
		$this->load->view('home/edit_profile',$data);
		$this->load->view('home/footer');
	}
	public function update_user_profile($id)
	{
		$old=$this->model->getUserInfoByID($id);
		$old_photo=$old[0]->photo;
		if($this->upload->do_upload('photo'))
		{
		if(!empty($old_photo)):unlink($old_photo);endif;
		$img=$this->upload->data();
		$photo="uploads/".$img['raw_name'].$img['file_ext'];
		}
		else
		{
		$photo=$old_photo;
		}
		$name=$this->input->post('name');
		$skills=$this->input->post('skills');
		$dob=$this->input->post('dob');
		$short_bio=$this->input->post('short_bio');
		$long_bio=$this->input->post('long_bio');
		$mobno=$this->input->post('mobno');
		$address=$this->input->post('address');
		$data=array(
			'name'=>$name,
			'skills'=>$skills,
			'dob'=>$dob,
			'short_bio'=>$short_bio,
			'long_bio'=>$long_bio,
			'mobno'=>$mobno,
			'address'=>$address,
			'photo'=>$photo
		);
		if($this->model->updateUserProfile($data,$id)):
		$this->session->set_flashdata('msg', "Profile updated successfully.");
		return redirect(base_url().'home/member_profile');
		else:
		$this->session->set_flashdata('msg', "Something went wrong. Try again later.");
		return redirect(base_url().'home/member_profile');
		endif;
	}
	public function member_forum()
	{
		$this->check_login();
		$data['forum']=$this->model->getMemberForum();
		echo "<pre>";
		print_r($data);
		exit();
		$this->load->view('home/header');
		$this->load->view('home/member_forum',$data);
		$this->load->view('home/footer');
	}
}