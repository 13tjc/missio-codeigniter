<?php 
class cd2 extends MY_Model {

    public function __construct() {
        parent::__construct();
    }

    /*
     * Missio frontend methods 
     */



    public function selectAll(){
            $sql = 'SELECT * FROM users';
            $query = $this->db->query($sql);
            // Fetch the result array from the result object and return it
            return $query->result();
        }


}
