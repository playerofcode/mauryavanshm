<?php 
class Admin_model extends CI_model{

		public function login($email,$password)
		{
			return  $this->db->get_where('admin', array('email' => $email,'password'=>$password));
		}
		public function add_gallery($data)
		{
			return $this->db->insert('gallery',$data);
		}
		public function getGallery($id='')
		{
			if($id)
			{
				return $this->db->get_where('gallery',array('id'=>$id))->result();
			}
			else
			{
				$this->db->order_by('id','DESC');
				return $this->db->get('gallery')->result();
			}
		}
		public function deleteGallery($id)
		{
			return $this->db->delete('gallery',array('id'=>$id));
		}
		public function updateGallery($data,$id)
		{
			$this->db->where('id',$id);
			return $this->db->update('gallery',$data);
		}
		public function add_service($data)
	 	{
	 	return $this->db->insert('services',$data);
	 	}
 		public function all_service($id='')
 		{
 		if($id):
 			return $this->db->get_where('services',array('id'=>$id))->result();
 		else:
 			$this->db->order_by('id','DESC');
 			return $this->db->get('services')->result();
 		endif;
 		}
 		public function deleteservice($id)
 		{
 			return $this->db->delete('services',array('id'=>$id));
 		}
 		public function updateService($data,$id)
 		{
 			$this->db->where('id',$id);
			return $this->db->update('services',$data);
 		}
 		public function addVideo($data)
 		{
 			return $this->db->insert('video',$data);
 		}
	 	public function getVideo($id='')
	 	{
	 		if($id):
	 		return $this->db->get_where('video',array('id'=>$id))->result();
	 		else:
	 		$this->db->order_by('id',$id);
	 		return $this->db->get('video')->result();
	 		endif;
	 	}
	 	public function deleteVideo($id)
	 	{
	 		return $this->db->delete('video',array('id'=>$id));
	 	}
	 	public function updateVideo($data,$id)
	 	{
	 		$this->db->where('id',$id);
	 		return $this->db->update('video',$data);
	 	}
	 	public function addReport($data)
	 	{
	 		return $this->db->insert('report',$data);
	 	}
	 	public function getReport($id='')
	 	{
	 		if($id):
	 		return $this->db->get_where('report',array('id'=>$id))->result();
	 		else:
	 		$this->db->order_by('id','desc');
	 		return $this->db->get('report')->result();
	 		endif;
	 	}
	 	public function deleteReport($id)
	 	{
	 		return $this->db->delete('report',array('id'=>$id));
	 	}
	 	public function updateReport($data,$id)
	 	{
	 		$this->db->where('id',$id);
	 		return $this->db->update('report',$data);
	 	}
	 	public function getTeamCategory($team_id='')
	 	{
	 		if($team_id):
	 		return $this->db->get_where('team_category',array('team_id'=>$team_id))->result();
	 		else:
	 		$this->db->order_by('team_id','desc');
	 		return $this->db->get('team_category')->result();
	 		endif;
	 	}
	 	public function addTeamCategory($data)
	 	{
	 		return $this->db->insert('team_category',$data);
	 	}
	 	public function deleteTeamCategory($team_id)
	 	{
	 		return $this->db->delete('team_category',array('team_id'=>$team_id));
	 	}
	 	public function updateTeamCategory($data,$team_id)
	 	{
	 		$this->db->where('team_id',$team_id);
	 		return $this->db->update('team_category',$data);
	 	}
	 	public function addTeamMember($data)
	 	{
	 		return $this->db->insert('team',$data);
	 	}
	 	public function getTeamMember($id='')
	 	{
	 		if($id):
	 			return $this->db->get_where('team',array('id'=>$id))->result();
	 		else:
	 			$this->db->order_by('id','desc');
	 			return $this->db->get('team')->result();
	 		endif;
	 	}
	 	public function deleteTeamMember($id)
	 	{
	 		return $this->db->delete('team',array('id'=>$id));
	 	}
	 	public function updateTeamMember($data,$id)
	 	{
	 		$this->db->where('id',$id);
	 		return $this->db->update('team',$data);
	 	}
	 	public function getEnquiry()
	 	{
	 		$this->db->order_by('id','desc');
	 		return $this->db->get('contact')->result();
	 	}
	 	public function deleteEnquiry($id)
	 	{
	 		return $this->db->delete('contact',array('id'=>$id));
	 	}
	 	public function getCountry($country_id='')
	 	{
	 		if($country_id):
	 			return $this->db->get_where('country',array('country_id'=>$country_id))->result();
	 		else:	
	 			$this->db->order_by('country_id','desc');
	 			return $this->db->get('country')->result();
	 		endif;
	 	}
	 	public function addCountry($data)
	 	{
	 		return $this->db->insert('country',$data);
	 	}
	 	public function deleteCountry($country_id)
	 	{
	 		return $this->db->delete('country',array('country_id'=>$country_id));
	 	}
	 	public function updateCountry($data,$country_id)
		{
			$this->db->where('country_id',$country_id);
			return $this->db->update('country',$data);
		}
		public function getState($state_id='')
		{
			if($state_id):
			return $this->db->get_where('state',array('state_id'=>$state_id))->result();
			else:
			$this->db->order_by('state_id',$state_id);
			return $this->db->get('state')->result();
			endif;
		}
		public function updateState($data,$state_id)
		{
			$this->db->where('state_id',$state_id);
			return $this->db->update('state',$data);
		}
		public function deleteState($state_id)
		{
			return $this->db->delete('state',array('state_id'=>$state_id));
		}
		public function addState($data)
		{
			return $this->db->insert('state',$data);
		}
		public function getDistrict($district_id='')
		{
			if($district_id):
				return $this->db->get_where('district',array('district_id'=>$district_id))->result();
			else:
				$this->db->order_by('district_id','desc');
				return $this->db->get('district')->result();
			endif;
		}
		public function deleteDistrict($district_id)
		{
			return $this->db->delete('district',array('district_id'=>$district_id));
		}
		public function fetchState($country_id)
		{
			$res=$this->db->get_where('state',array('country_id'=>$country_id))->result();
			$output='';
			$output.=' <option selected="" disabled="">Choose State</option>';
			foreach($res as $key):
			$output.='<option value="'.$key->state_id.'">'.$key->state_name.'</option>';
			endforeach;
			return $output;
		}
		public function fetchDistrict($state_id)
		{
			$res=$this->db->get_where('district',array('state_id'=>$state_id))->result();
			$output='';
			$output.=' <option selected="" disabled="">Choose district</option>';
			foreach($res as $key):
			$output.='<option value="'.$key->district_id.'">'.$key->district_name.'</option>';
			endforeach;
			return $output;
		}
		public function addDistrict($data)
		{
			return $this->db->insert('district',$data);
		}
		public function updateDistrict($data,$district_id)
		{
			$this->db->where('district_id',$district_id);
			return $this->db->update('district',$data);
		}
		public function bloginsert($data)
		{
			$this->db->insert('blog',$data);
			return true;	
		}
		public function bloglist()
		{
			$this->db->select('*');
			$this->db->order_by('id','DESC');
			//$this->db->limit($limit,$offset);
			$query=$this->db->get('blog');
			return $query->result();
		}
		public function get_blog_info($id)
		{
			// $this->db->select('image');
			$query=$this->db->get_where('blog',array('id'=>$id));
			return $query->result();
		}
		public function deleteblog($id)
		{
			$img=$this->get_blog_info($id);
			if(unlink($img[0]->image)){
			return $this->db->delete('blog', array('id' => $id));}
		}
		public function UpdateBlog($data,$id)
		{
			$this->db->where('id', $id);
			$this->db->update('blog', $data);
			return true;
		}
		//19 July, 2021
		public function getTehsil($tehsil_id='')
		{
			if($tehsil_id):
			return $this->db->get_where('tehsil',array('tehsil_id'=>$tehsil_id))->result();
			else:
			$this->db->order_by('tehsil_id','desc');
			return $this->db->get('tehsil')->result();
			endif;
		}
		public function addTehsil($data)
		{
			return $this->db->insert('tehsil',$data);
		}
		public function deleteTehsil($tehsil_id)
		{
			return $this->db->delete('tehsil',array('tehsil_id'=>$tehsil_id));
		}
		public function updateTehsil($data,$tehsil_id)
		{
			$this->db->where('tehsil_id',$tehsil_id);
			return $this->db->update('tehsil',$data);
		}
		public function getBlock($block_id='')
		{
			if($block_id):
			return $this->db->get_where('block',array('block_id'=>$block_id))->result();
			else:
			$this->db->order_by('block_id','desc');
			return $this->db->get('block')->result();
			endif;
		}
		public function fetchTehsil($district_id)
		{
			$res=$this->db->get_where('tehsil',array('district_id'=>$district_id))->result();
			$output='';
			$output.=' <option selected="" disabled="">Choose Tehsil</option>';
			foreach($res as $key):
			$output.='<option value="'.$key->tehsil_id.'">'.$key->tehsil_name.'</option>';
			endforeach;
			return $output;
		}
		public function addBlock($data)
		{
			return $this->db->insert('block',$data);
		}
		public function deleteBlock($block_id)
		{
			return $this->db->delete('block',array('block_id'=>$block_id));
		}
		public function updateBlock($data,$block_id)
		{
		$this->db->where('block_id',$block_id);
		return $this->db->update('block',$data);
		}
		public function fetchBlock($district_id)
		{
			$res=$this->db->get_where('block',array('district_id'=>$district_id))->result();
			$output='';
			$output.=' <option selected="" disabled="">Choose Block</option>';
			foreach($res as $key):
			$output.='<option value="'.$key->block_id.'">'.$key->block_name.'</option>';
			endforeach;
			return $output;
		}
		public function getCountryNameByID($country_id)
		{
			return $this->db->get_where('country',array('country_id'=>$country_id))->row()->country_name;
		}
		public function getStateNameByID($state_id)
		{
			return $this->db->get_where('state',array('state_id'=>$state_id))->row()->state_name;
		}
		public function getDistrictNameByID($district_id)
		{
			return $this->db->get_where('district',array('district_id'=>$district_id))->row()->district_name;
		}
		public function getTehsilNameByID($tehsil_id)
		{
			return $this->db->get_where('tehsil',array('tehsil_id'=>$tehsil_id))->row()->tehsil_name;
		}
		public function getBlockNameByID($block_id)
		{
			return $this->db->get_where('block',array('block_id'=>$block_id))->row()->block_name;
		}
		public function getEBCategoryNameByID($eb_cid='')
		{
			if($eb_cid):
				return $this->db->get_where('executive_body_category',array('eb_cid'=>$eb_cid))->row()->eb_cname;
			else:
				$msg="Not assigned";
				return $msg;
			endif;
		}
		public function getEBSubCategoryNameByID($eb_scid='')
		{
			if($eb_scid):
				return $this->db->get_where('executive_body_sub_category',array('eb_scid'=>$eb_scid))->row()->eb_scname;
			else:
				$msg="Not assigned";
				return $msg;
			endif;
		}
		public function getEBDesignationNameByID($eb_did='')
		{
			if($eb_did):
				return $this->db->get_where('eb_designation',array('eb_did'=>$eb_did))->row()->eb_dname;
			else:
				$msg="Not assigned";
				return $msg;
			endif;
		}
		public function getEBCellNameByID($eb_cell_id='')
		{
			if($eb_cell_id):
				return $this->db->get_where('eb_cell',array('id'=>$eb_cell_id))->row()->cell_name;
			else:
				$msg="Not assigned";
				return $msg;
			endif;
		}
		public function getUser($id='')
		{
			if($id):
			return $this->db->get_where('users',array('user_type'=>1))->result();
			else:
			$this->db->order_by('id','desc');
			 //return $this->db->get('users')->result();
			$res=$this->db->get_where('users',array('user_type'=>1))->result();
			$output=array(); 
			foreach($res as $key):
			$output[]=array(
				'id'=>$key->id,
				'name'=>$key->name,
				'mobno'=>$key->mobno,
				'email'=>$key->email,
				'country'=>$this->getCountryNameByID($key->country_id),
				'state'=>$this->getStateNameByID($key->state_id),
				'district'=>$this->getDistrictNameByID($key->district_id),
				'tehsil'=>$this->getTehsilNameByID($key->tehsil_id),
				'block'=>$this->getBlockNameByID($key->block_id),
				'address'=>$key->address,
				'eb_category'=>$this->getEBCategoryNameByID($key->eb_cid),
				'eb_sub_category'=>$this->getEBSubCategoryNameByID($key->eb_scid),
				'eb_designation'=>$this->getEBDesignationNameByID($key->eb_did),
				'eb_cell'=>$this->getEBCellNameByID($key->eb_cell_id)
			);
			endforeach;
			return $output;
			endif;
		}
		public function deleteUsers($id)
		{
			return $this->db->delete('users',array('id'=>$id));
		}
		//21 July, 2021
		public function setUserDesignation($id,$data)
		{
			$this->db->where('id',$id);
			return $this->db->update('users',$data);
		}
		public function getEBCategory($eb_cid='')
		{
			if($eb_cid):
			return $this->db->get_where('executive_body_category',array('eb_cid'=>$eb_cid))->result();
			else:	
			$this->db->order_by('eb_cid','desc');
			return $this->db->get('executive_body_category')->result();
			endif;
		}
		public function addEBCategory($data)
		{
			return $this->db->insert('executive_body_category',$data);
		}
		public function deleteEBCategory($eb_cid)
		{
			return $this->db->delete('executive_body_category',array('eb_cid'=>$eb_cid));
		}
		public function updateEBCategory($eb_cid,$data)
		{
			$this->db->where('eb_cid',$eb_cid);
			return $this->db->update('executive_body_category',$data);
		}
		public function getEBSubCategory($eb_scid='')
		{
			if($eb_scid):
			return $this->db->get_where('executive_body_sub_category',array('eb_scid'=>$eb_scid))->result();
			else:
			$this->db->order_by('eb_scid','desc');
			return $this->db->get('executive_body_sub_category')->result();
			endif;
		}
		public function deleteEBSCategory($eb_scid)
		{
			return $this->db->delete('executive_body_sub_category',array('eb_scid'=>$eb_scid));
		}
		public function addEBSCategory($data)
		{
			return $this->db->insert('executive_body_sub_category',$data);
		}
		public function updateEBSubCategory($eb_scid,$data)
		{
			$this->db->where('eb_scid', $eb_scid);
			return $this->db->update('executive_body_sub_category',$data);
		}
		public function getEBDesignation($eb_did='')
		{
			if($eb_did):
			return $this->db->get_where('eb_designation',array('eb_did'=>$eb_did))->result();
			else:
			$this->db->order_by('eb_did','desc');
			return $this->db->get('eb_designation')->result();
			endif;
		}
		public function fetchEBSubCategory($eb_cid)
		{
			$res=$this->db->get_where('executive_body_sub_category',array('eb_cid'=>$eb_cid))->result();
			$output='';
			$output.=' <option selected="" disabled="">Select EB Sub Category</option>';
			foreach($res as $key):
			$output.='<option value="'.$key->eb_scid.'">'.$key->eb_scname.'</option>';
			endforeach;
			return $output;
		}
		public function addEBDesignation($data)
		{
			return $this->db->insert('eb_designation',$data);
		}
		public function deleteEBDesignation($eb_did)
		{
			return $this->db->delete('eb_designation',array('eb_did'=>$eb_did));
		}
		public function updateEBDesignation($eb_did,$data)
		{
			$this->db->where('eb_did', $eb_did);
			return $this->db->update('eb_designation', $data);
		}
		public function assignEBDesignation($id,$data)
		{
			$this->db->where('id', $id);
			return $this->db->update('users', $data);
		}
		public function fetchEBDesignation($eb_scid)
		{
			$res=$this->db->get_where('eb_designation',array('eb_scid'=>$eb_scid))->result();
			$output='';
			$output.=' <option selected="" disabled="">Select EB Designation</option>';
			foreach($res as $key):
			$output.='<option value="'.$key->eb_did.'">'.$key->eb_dname.'</option>';
			endforeach;
			return $output;
		}
		//22 July, 2021
		public function getEBCell($id='')
		{
			if($id):
			return $this->db->get_where('eb_cell',array('id'=>$id))->result();
			else:
			$this->db->order_by('id','desc');
			return $this->db->get('eb_cell')->result();
			endif;
		}
		public function deleteEBCell($id)
		{
			return $this->db->delete('eb_cell',array('id'=>$id));
		}
		public function addEBCell($data)
		{
			return $this->db->insert('eb_cell',$data);
		}
		public function updateEBCell($id,$data)
		{
			$this->db->where('id',$id);
			return $this->db->update('eb_cell',$data);
		}
		public function setFilterUser($data)
		{
			//return $this->db->get_where('users',$data)->result();
			$this->db->order_by('id','desc');
			$res=$this->db->get_where('users',$data)->result();
			$output=array(); 
			foreach($res as $key):
			$output[]=array(
				'id'=>$key->id,
				'name'=>$key->name,
				'mobno'=>$key->mobno,
				'email'=>$key->email,
				'country'=>$this->getCountryNameByID($key->country_id),
				'state'=>$this->getStateNameByID($key->state_id),
				'district'=>$this->getDistrictNameByID($key->district_id),
				'tehsil'=>$this->getTehsilNameByID($key->tehsil_id),
				'block'=>$this->getBlockNameByID($key->block_id),
				'address'=>$key->address,
				'eb_category'=>$this->getEBCategoryNameByID($key->eb_cid),
				'eb_sub_category'=>$this->getEBSubCategoryNameByID($key->eb_scid),
				'eb_designation'=>$this->getEBDesignationNameByID($key->eb_did),
				'eb_cell'=>$this->getEBCellNameByID($key->eb_cell_id)
			);
			endforeach;
			return $output;
		}
		//23 July, 2021
		public function getMembers($id='')
		{
			if($id):
			return $this->db->get_where('users',array('user_type'=>2))->result();
			else:
			$this->db->order_by('id','desc');
			 //return $this->db->get('users')->result();
			$res=$this->db->get_where('users',array('user_type'=>2))->result();
			$output=array(); 
			foreach($res as $key):
			$output[]=array(
				'id'=>$key->id,
				'name'=>$key->name,
				'mobno'=>$key->mobno,
				'email'=>$key->email,
				'country'=>$this->getCountryNameByID($key->country_id),
				'state'=>$this->getStateNameByID($key->state_id),
				'district'=>$this->getDistrictNameByID($key->district_id),
				'tehsil'=>$this->getTehsilNameByID($key->tehsil_id),
				'block'=>$this->getBlockNameByID($key->block_id),
				'address'=>$key->address
			);
			endforeach;
			return $output;
			endif;
		}
		public function getUsers()
		{
			//$this->db->order_by('id','desc');
			$res=$this->db->get_where('users',array('user_type'=>1,'status'=>'active'))->result();
			$output=array(); 
			foreach($res as $key):
			$output[]=array(
				'id'=>$key->id,
				'name'=>$key->name,
				'mobno'=>$key->mobno,
				'email'=>$key->email,
				'country'=>$this->getCountryNameByID($key->country_id),
				'state'=>$this->getStateNameByID($key->state_id),
				'district'=>$this->getDistrictNameByID($key->district_id),
				'tehsil'=>$this->getTehsilNameByID($key->tehsil_id),
				'block'=>$this->getBlockNameByID($key->block_id),
				'address'=>$key->address,
				'eb_category'=>$this->getEBCategoryNameByID($key->eb_cid),
				'eb_sub_category'=>$this->getEBSubCategoryNameByID($key->eb_scid),
				'eb_designation'=>$this->getEBDesignationNameByID($key->eb_did),
				'eb_cell'=>$this->getEBCellNameByID($key->eb_cell_id)
			);
			endforeach;
			return $output;
		}
}

?>