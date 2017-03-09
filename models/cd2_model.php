<?php 
class Cd2_model extends MY_Model {

    public function __construct() {
        parent::__construct();
    }

    /*
     * Missio frontend methods 
    */

    public function selectAllusers() {

             $sql = 'select  a.*, tmp.last_log_date from users a left join (select userid, max(updatedat) as last_log_date from sessions  group by userid ) as tmp on a.id = tmp.userid';
          

            $query = $this->db->query($sql);
            
            return $query->result();
    }

    public function selectCurrentusers() {
            $today = date("Y-m-d"); 
            $sql = "select  a.*, tmp.last_log_date from users a
                    left join

                    (select userid, max(updatedat) as last_log_date from sessions  group by userid 
                    ) as tmp
                    on a.id = tmp.userid
                    
                    where DATE(a.updatedat) = '$today' or DATE(a.createdAt) = '$today'";

            $query = $this->db->query($sql);
            
            return $query->result();
    }

    public function showprojects() {
      
            $sql = 'SELECT * FROM projects';
            $query = $this->db->query($sql);
            return $query->result();
    }
     public function showprojectsUp() {
      
            $sql = 'SELECT * FROM projects WHERE updatedAt >= CURDATE()';
            $query = $this->db->query($sql);
            return $query->result();
    }


   


    //-------------------------------------------------------------------------------------------

    public function followUsers() {
            $sql = 'SELECT * FROM follows';
            $query = $this->db->query($sql);
            return $query->result();
    }

    //-------------------------------------------------------------------------------------------

    public function giveUsers() {
            $sql = 'SELECT * FROM gives';
            $query = $this->db->query($sql);
            return $query->result();
    }

    //-------------------------------------------------------------------------------------------

    public function shareUsers() {
            $sql = 'SELECT * FROM shares';
            $query = $this->db->query($sql);
            return $query->result();
    }

    //-------------------------------------------------------------------------------------------

    public function actUsers() {
            $sql = 'SELECT * FROM acts';
            $query = $this->db->query($sql);
            return $query->result();
    }





}
