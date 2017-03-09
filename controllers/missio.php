<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Missio extends MY_Controller {
    
    public function __construct() {
        parent::__construct();

        
  }

     



    public function index() {
        $this->load->model('main_model');
          
        $data['query'] = $this->main_model->prodView(); 

        // $user = $this->session->userdata('user');
        // if ($user) {
        //     header('Location: /dashboard');
        // }
  
        $this->load_view('missio/index', $data);
    }
   


    public function faqs() {
        $this->load_view('missio/faqs');
    }

    public function contact() {
        $this->load_view('missio/contact');
    }

    public function about() {
        $this->load_view('missio/about');
    }

    public function learn_more() {
        $this->load_view('missio/learn_more');
    }
     public function create_project() {
        $this->load_view('missio/create_project');
    }
      public function my_dashboard() {
        $this->load_view('missio/my_dashboard');
    }

    public function fundraising() {
        $this->load_view('missio/fundraising');
    }

    public function choose(){    
        $this->load_view('missio/choose');
    }
    public function register(){    
        $this->load_view('missio/register');
    }

    public function explore(){    
      $this->load->model('main_model');
        $data['proj'] = $this->main_model->prodView(); 

        $this->load_view('missio/explore', $data);
    }

    public function project($projectId) {
        $this->load->model('main_model');

        
        $data['project'] = $this->main_model->getProjectDetails($projectId);

        $this->load_view('missio/project', $data);
    }


    function email_exists(){
       $this->load->model('main_model');
       $email = $this->input->post('email');
 

        $data["results"] = $this->main_model->m_email_exists($email);
        echo json_encode($data["results"]);

}



    public function resources() {
        $this->load->model('main_model');
        $filters = $this->main_model->getResourceFilters();
        $filter_list = array();
        foreach ($filters as $filter) {
            if (empty($filter_list[$filter['group']])) {
                $filter_list[$filter['group']] = array();
            }
            $filter_list[$filter['group']][] = array('id' => $filter['id'], 'title' => $filter['title']);
        }
        $data['filters'] = $filter_list;
        $data['filter_list'] = $this->main_model->getResourceFilterList();
        $this->load_view('missio/resources', $data);
    }

    public function resources_landing() {
        $this->load_view('missio/resources_landing');
    }

    public function resources_loader() {
        if (!$this->is_ajax()) {
            return false;
        }
        /* $data['list'] = array(
          array("name"=>"Reed"),
          array("name"=>"Ali"),
          array("name"=>"Guy"),
          array("name"=>"Thor"),
          array("name"=>"Hunter"),
          array("name"=>"Elton"),
          array("name"=>"Elliott"),
          array("name"=>"Jesse"),
          array("name"=>"Gary"),
          array("name"=>"Caldwell"),
          array("name"=>"Ian"),
          array("name"=>"Ashton"),
          array("name"=>"Ali"),
          array("name"=>"Hashim"),
          array("name"=>"Kelly"),
          array("name"=>"Hashim"),
          array("name"=>"Lars"),
          array("name"=>"Abdul"),
          array("name"=>"Marvin"),
          array("name"=>"Henry"),
          array("name"=>"Jackson"),
          array("name"=>"Blake"),
          array("name"=>"Slade"),
          array("name"=>"John"),
          array("name"=>"Chandler"),
          array("name"=>"Alfonso"),
          array("name"=>"Dorian"),
          array("name"=>"Alec"),
          array("name"=>"Reed"),
          array("name"=>"Bradley"),
          array("name"=>"Jesse"),
          array("name"=>"Edward"),
          array("name"=>"Aristotle"),
          array("name"=>"Thomas"),
          array("name"=>"Nathan"),
          array("name"=>"Ralph"),
          array("name"=>"Merritt"),
          array("name"=>"Judah"),
          array("name"=>"Igor"),
          array("name"=>"Nero"),
          array("name"=>"Bevis"),
          array("name"=>"Hayden"),
          array("name"=>"Vincent"),
          array("name"=>"Logan"),
          array("name"=>"Graham"),
          array("name"=>"Travis"),
          array("name"=>"Guy"),
          array("name"=>"Ira"),
          array("name"=>"Derek"),
          array("name"=>"Quinn"),
          array("name"=>"Amal"),
          array("name"=>"August"),
          array("name"=>"Leonard"),
          array("name"=>"Luke"),
          array("name"=>"Plato"),
          array("name"=>"Wing"),
          array("name"=>"Brian"),
          array("name"=>"Thaddeus"),
          array("name"=>"Dante"),
          array("name"=>"Reece"),
          array("name"=>"Fuller"),
          array("name"=>"Walker"),
          array("name"=>"Beck"),
          array("name"=>"Dale"),
          array("name"=>"Perry"),
          array("name"=>"Jackson"),
          array("name"=>"Asher"),
          array("name"=>"Basil"),
          array("name"=>"Herrod"),
          array("name"=>"Sebastian"),
          array("name"=>"Abraham"),
          array("name"=>"Chandler"),
          array("name"=>"Omar"),
          array("name"=>"Ahmed"),
          array("name"=>"Tiger"),
          array("name"=>"Armando"),
          array("name"=>"Damian"),
          array("name"=>"Lyle"),
          array("name"=>"Garrison"),
          array("name"=>"Clark"),
          array("name"=>"Brian"),
          array("name"=>"Colton"),
          array("name"=>"Chandler"),
          array("name"=>"Jin"),
          array("name"=>"Chester"),
          array("name"=>"Callum"),
          array("name"=>"Marvin"),
          array("name"=>"Eaton"),
          array("name"=>"Odysseus"),
          array("name"=>"Jesse"),
          array("name"=>"Daquan"),
          array("name"=>"Callum"),
          array("name"=>"Branden"),
          array("name"=>"Hoyt"),
          array("name"=>"Plato"),
          array("name"=>"Matthew"),
          array("name"=>"Rashad"),
          array("name"=>"Kibo"),
          array("name"=>"Leroy"),
          array("name"=>"Keaton")
          ); */
        $data['list'] = array(
            array("name" => "Reed"),
            array("name" => "Ali"),
            array("name" => "Guy"),
            array("name" => "Thor"),
            array("name" => "Hunter"),
            array("name" => "Elton"),
            array("name" => "Elliott"),
            array("name" => "Jesse"),
            array("name" => "Gary"),
            array("name" => "Caldwell"),
            array("name" => "Ian"),
            array("name" => "Ashton"),
            array("name" => "Ali"),
            array("name" => "Hashim"),
            array("name" => "Kelly"),
            array("name" => "Hashim"),
            array("name" => "Lars"),
            array("name" => "Abdul"),
            array("name" => "Marvin"),
            array("name" => "Henry"),
            array("name" => "Jackson"),
            array("name" => "Blake"),
            array("name" => "Slade"),
            array("name" => "John"),
            array("name" => "Chandler"),
            array("name" => "Alfonso"),
            array("name" => "Dorian"),
            array("name" => "Alec"),
            array("name" => "Reed"),
            array("name" => "Bradley"),
            array("name" => "Jesse"),
            array("name" => "Edward"),
            array("name" => "Aristotle"),
            array("name" => "Thomas"),
            array("name" => "Nathan"),
            array("name" => "Ralph"),
            array("name" => "Merritt"),
            array("name" => "Judah"),
            array("name" => "Igor"),
            array("name" => "Nero"),
            array("name" => "Bevis"),
            array("name" => "Hayden"),
            array("name" => "Vincent"),
            array("name" => "Logan"),
            array("name" => "Graham"),
            array("name" => "Travis"),
            array("name" => "Guy"),
            array("name" => "Ira"),
            array("name" => "Derek"),
            array("name" => "Quinn"),
            array("name" => "Amal"),
            array("name" => "August"),
            array("name" => "Leonard"),
            array("name" => "Luke"),
            array("name" => "Plato"),
            array("name" => "Wing"),
            array("name" => "Brian"),
            array("name" => "Thaddeus"),
            array("name" => "Dante"),
            array("name" => "Reece"),
            array("name" => "Fuller"),
            array("name" => "Walker"),
            array("name" => "Beck"),
            array("name" => "Dale"),
            array("name" => "Perry"),
            array("name" => "Jackson"),
            array("name" => "Asher"),
            array("name" => "Basil"),
            array("name" => "Herrod"),
            array("name" => "Sebastian"),
            array("name" => "Abraham"),
            array("name" => "Chandler"),
            array("name" => "Omar"),
            array("name" => "Ahmed"),
            array("name" => "Tiger"),
            array("name" => "Armando"),
            array("name" => "Damian"),
            array("name" => "Lyle"),
            array("name" => "Garrison"),
            array("name" => "Clark"),
            array("name" => "Brian"),
            array("name" => "Colton"),
            array("name" => "Chandler"),
            array("name" => "Jin"),
            array("name" => "Chester"),
            array("name" => "Callum"),
            array("name" => "Marvin"),
            array("name" => "Eaton"),
            array("name" => "Odysseus"),
            array("name" => "Jesse"),
            array("name" => "Daquan"),
            array("name" => "Callum"),
            array("name" => "Branden"),
            array("name" => "Hoyt"),
            array("name" => "Plato"),
            array("name" => "Matthew"),
            array("name" => "Rashad"),
            array("name" => "Kibo"),
            array("name" => "Leroy"),
            array("name" => "Keaton")
        );
        shuffle($data['list']);
        //$this->print_json( $data );
        echo $this->load->view('missio/resource_partial', $data);
    }

    public function discover() {
        $this->load_view('missio/discover');
    }
  
    public function terms() {
        $this->load_view('missio/terms');
    }

    // public function projects($projectId) {
    //     $this->load_view('missio/index', array('deeplink' => 'project/' . $projectId));
    // }

    public function err404() {
        $this->output->set_status_header('404');
        $this->load_view('/missio/err_404');
    }

    protected function load_view($template, $data = array()) {

        $data['template'] = $template;
        $this->load->view('missio/global/container', compact('data'));
    }

}
