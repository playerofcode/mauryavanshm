<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {

	public function getCountry()
	{
		return $this->db->get('country')->result();
	}
	public function registerUser($data)
	{
		return $this->db->insert('users',$data);
	}
	public function login($email,$password)
	{
		return  $this->db->get_where('users', array('email' => $email,'password'=>$password));
	}
	public function getUserInfoByEmail($email)
	{
		return $this->db->get_where('users',array('email'=>$email))->result();
	}
	public function getUserInfoByID($id)
	{
		return $this->db->get_where('users',array('id'=>$id))->result();
	}
	public function updateUserProfile($data,$id)
	{
		$this->db->where('id',$id);
		return $this->db->update('users',$data);
	}
	public function getMemberName($posted_by)
	{
		return $this->db->get_where('users',array('email'=>$posted_by))->row()->name;
	}
	public function getMemberPhoto($posted_by)
	{
		return $this->db->get_where('users',array('email'=>$posted_by))->row()->photo;
	}
	public function countTopics($forum_id)
	{
		return $this->db->get_where('topics',array('forum_id'=>$forum_id))->num_rows();
	}
	public function getMemberForum()
	{
		$this->db->order_by('forum_id','desc');
		$res=$this->db->get_where('forum')->result();
		$output=array();
		foreach ($res as $key) {
			$output[]=array(
				'topics'=>$this->countTopics($key->forum_id),
				'forum_name'=>$key->forum_name,
				'short_description'=>$key->short_description,
				'name'=>$this->getMemberName($key->posted_by),
				'photo'=>$this->getMemberPhoto($key->posted_by)
			);
		}
		return $output;	
	}
}
