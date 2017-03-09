<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class cd2 extends MY_Controller {


    public function __construct() {
        parent::__construct();
        $this->load->model('cd2_model');
    }

	//-------------------------------------------------------------------------------------------

    public function users() {
        $users = $this->cd2_model->selectAllusers();
        $users_json = json_encode($users, true);
        $actual_link = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $acess_token = "https://missio.org/cd2/users?access-token=CWku8OjaTFPWSq0w";


         $userscur = $this->cd2_model->selectCurrentusers();
         $users_jsoncur = json_encode($userscur, true);

        $acess_tokencurr = "https://missio.org/cd2/users?access-token=CWku8OjaTFPWSq0w&modified_data_only=true";

        if ($actual_link == $acess_token) {
          
            echo $users_json;
        }

        elseif ($actual_link == $acess_tokencurr){

                 echo $users_jsoncur;

        } else { 

            echo "Access denied";
        }
       

        $this->load_view('cd2/users');

    }
    //-------------------------------------------------------------------------------------------


    public function projects() {

        $prod = $this->cd2_model->showprojects();
        $prod_json = json_encode($prod, true);
       
        $actual_link = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $acess_token = "https://missio.org/cd2/projects?access-token=CWku8OjaTFPWSq0w";

        $produp = $this->cd2_model->showprojectsUp();
        $produp_json = json_encode($produp, true);
        $acess_tokenprod = "https://missio.org/cd2/projects?access-token=CWku8OjaTFPWSq0w&modified_data_only=true";


        if ($actual_link == $acess_token) {
            echo $prod_json;

        } elseif ($actual_link == $acess_tokenprod) {
          
          echo  $produp_json;

        } else {

            echo "Access denied";
        }
       

        $this->load_view('cd2/projects');

    }



	//-------------------------------------------------------------------------------------------

    public function follows() {
        $users = $this->cd2_model->followUsers();
        $users_json = json_encode($users, true);
       
        $actual_link = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $acess_token = "https://missio.org/cd2/follows?access-token=CWku8OjaTFPWSq0w";
        if ($actual_link == $acess_token) {
          
            echo $users_json;
        }
        else{

            echo "Access denied";
        }
       

        $this->load_view('cd2/follows');

    }

    //-------------------------------------------------------------------------------------------

    public function gives() {
        $users = $this->cd2_model->giveUsers();
        $users_json = json_encode($users, true);
       
        $actual_link = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $acess_token = "https://missio.org/cd2/gives?access-token=CWku8OjaTFPWSq0w";
        if ($actual_link == $acess_token) {
          
            echo $users_json;
        }
        else{

            echo "Access denied";
        }
       

        $this->load_view('cd2/gives');

    }

    //-------------------------------------------------------------------------------------------

    public function shares() {
        $users = $this->cd2_model->shareUsers();
        $users_json = json_encode($users, true);
        
        $actual_link = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $acess_token = "https://missio.org/cd2/shares?access-token=CWku8OjaTFPWSq0w";
        if ($actual_link == $acess_token) {
          
            echo $users_json;
        }
        else{

            echo "Access denied";
        }
       

        $this->load_view('cd2/shares');

    }

    //-------------------------------------------------------------------------------------------

    public function acts() {
        $users = $this->cd2_model->actUsers();
        $users_json = json_encode($users, true);
       
        $actual_link = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $acess_token = "https://missio.org/cd2/acts?access-token=CWku8OjaTFPWSq0w";
        if ($actual_link == $acess_token) {
          
            echo $users_json;
        }
        else{

            echo "Access denied";
        }
       

        $this->load_view('cd2/acts');

    }

    //-------------------------------------------------------------------------------------------
    //-------------------------------------------------------------------------------------------
    //-------------------------------------------------------------------------------------------







}