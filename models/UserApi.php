
<?php
class UserApi extends CI_Model
{
	 
	public function show_users()
	{
		header("Content-Type: application/json");
  	    $query = $this->db->get('users');
      	return json_encode($query->result());
		 
	}
 
}
 
?>