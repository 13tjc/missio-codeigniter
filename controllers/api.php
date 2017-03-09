<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Api extends MY_Controller {

    private $emails = Array();

    public function __construct() {
        parent::__construct();
        $this->load->model('main_model');
    }

    public function login() {
        $is_ajax = $this->is_ajax();
        $user = $this->session->userdata('user');
        if ($is_ajax && empty($user)) {
            $post = $this->get_request('post');
            $user = $this->main_model->getUser($post);
            if (!empty($user) && ((bool) $user['admin'] || (bool) $user['leader'])) {
                $this->session->set_userdata(compact('user'));
                $response = array('success' => true);
            } else {
                $response = array('success' => false, 'message' => 'There is a problem with your email and password. Please try again.', 'user' => $user);
            }
            $this->print_json($response);
        }
    }

    public function forgot_password() {
        $is_ajax = $this->is_ajax();
        $user = $this->session->userdata('user');
        if ($is_ajax && empty($user)) {
            $post = $this->get_request('post');
            $code = $this->main_model->forgotPassword($post['email']);
            $user = $this->main_model->getUser($post);
            $response = array('success' => false, 'message' => 'There is a problem with your email. Please try again.');
            if ($code['token'] && $user) {
                $this->load->library('netsuite');
                $params = array(
                    'email' => $user['email'],
                    'name' => $user['fullName'],
                    'code' => $code['token']
                );
                $result = $this->netsuite->sendResetCode($params);
                if ($result) {
                    $response = array('success' => true, 'message' => 'We emailed you a reset code. Please check your email.');
                }
            }
            $this->print_json($response);
        }
    }

    public function reset_password($reset_code) {
        $is_ajax = $this->is_ajax();
        $user = $this->session->userdata('user');
        if ($is_ajax && empty($user)) {
            $post = $this->get_request('post');
            $result = $this->main_model->resetPassword($post['code'], $post['password']);
            if (intval($result['status']) > 0) {
                $response = array('success' => true, 'message' => 'Your password is successfully updated.');
            } else {
                $response = array('success' => false, 'message' => 'There is a problem with your password update.');
            }
            $this->print_json($response);
        }
    }

    public function get_project_list() {
        $is_ajax = $this->is_ajax();
        $user = $this->checkAuth($is_ajax);
        if ($user) {
            $params = $this->get_request('get');
            $params['is_admin'] = (bool) $user['admin'];
            $params['is_leader'] = (bool) $user['leader'];
            $params['user_id'] = $user['id'];
            $params['items_per_page'] = 10;
            $result = $this->main_model->getProjectList($params);
            $this->print_json($result);
        }
    }

    public function get_project_updates() {
        $is_ajax = $this->is_ajax();
        $user = $this->checkAuth($is_ajax);
        if ($user) {
            $params = $this->get_request('get');
            $params['items_per_page'] = 5;
            $result = $this->main_model->getProjectUpdates($params);
            $this->print_json($result);
        }
    }

    public function get_video_data() {
        $is_ajax = $this->is_ajax();
        $user = $this->checkAuth($is_ajax);
        if ($user) {
            $params = $this->get_request('get');
            $result = $this->main_model->getVideoData($params);
            $this->print_json($result);
        }
    }

    public function get_countries() {
        $is_ajax = $this->is_ajax();
        $user = $this->checkAuth($is_ajax);
        if ($user) {
            $countries = $this->main_model->getCountries();
            $this->print_json($countries);
        }
    }

    public function delete_project_update() {
        $is_ajax = $this->is_ajax();
        $user = $this->checkAuth($is_ajax);
        if ($user) {
            if (!empty($user)) {
                $post = $this->get_request('post');
                $this->main_model->deleteProjectUpdate($post);
                $response = array('success' => true, 'message' => 'The update succesfully deleted');
            } else {
                $response = array('success' => false, 'message' => 'Your session expired. Please login');
            }
            $this->print_json($response);
        }
    }

    public function add_project_update() {
        $is_ajax = $this->is_ajax();
        $user = $this->checkAuth($is_ajax);
        if ($user) {
            if (!empty($user)) {
                $post = $this->get_request('post');
                $result = $this->main_model->addProjectUpdate($post);
                if ($result) {
                    $message = 'Your update is succesfully posted';
                    if (strpos($post['type'], 'video/') !== false) {
                        $message .= '<br>Please note that it may take up to 2 hours to process the video';
                    }
                    $response = array('success' => true, 'message' => $message);
                } else {
                    $response = array('success' => false, 'message' => 'A problem occured with your update. Please try again');
                }
            } else {
                $response = array('success' => false, 'message' => 'Your session expired. Please login');
            }
            $this->print_json($response);
        }
    }

    public function delete_hero() {
        $is_ajax = $this->is_ajax();
        $user = $this->checkAuth($is_ajax);
        if ($user) {
            if (!empty($user)) {
                $post = $this->get_request('post');
                $this->main_model->deleteHomepageHero($post);
                $response = array('success' => true, 'message' => 'The hero succesfully deleted');
            } else {
                $response = array('success' => false, 'message' => 'Your session expired. Please login');
            }
            $this->print_json($response);
        }
    }

    public function add_edit_hero() {
        $is_ajax = $this->is_ajax();
        $user = $this->checkAuth($is_ajax);
        if ($user) {
            if (!empty($user)) {
                $post = $this->get_request('post');
                $data = array('title' => $post['title'], 'image' => $post['file']);
                $data['subtitle'] = empty($post['subtitle']) ? null : $post['subtitle'];
                $data['url'] = empty($post['url']) ? null : $post['url'];
                $data['id'] = empty($post['id']) ? null : $post['id'];
                if (empty($data['id'])) {
                    $result = $this->main_model->addHomepageHero($data);
                } else {
                    $result = $this->main_model->editHomepageHero($data);
                }
                if ($result) {
                    $response = array('success' => true, 'message' => 'Your hero is succesfully posted');
                } else {
                    $response = array('success' => false, 'message' => 'A problem occured with your update. Please try again');
                }
            } else {
                $response = array('success' => false, 'message' => 'Your session expired. Please login');
            }
            $this->print_json($response);
        }
    }

    public function reorder_heros() {
        $is_ajax = $this->is_ajax();
        $user = $this->checkAuth($is_ajax);
        if ($user) {
            if (!empty($user)) {
                $list = $this->input->post('list');
                $result = $this->main_model->reorderHomepageHeros($list);
                if ($result) {
                    $response = array('success' => true, 'message' => 'Heros have been succesfully reordered');
                } else {
                    $response = array('success' => false, 'message' => 'A problem occured with your update. Please try again');
                }
            } else {
                $response = array('success' => false, 'message' => 'Your session expired. Please login');
            }
            $this->print_json($response);
        }
    }

    public function add_edit_filter() {
        $is_ajax = $this->is_ajax();
        $user = $this->checkAuth($is_ajax);
        if ($user) {
            if (!empty($user)) {
                $post = $this->get_request('post');
                $data = array('title' => $post['title'], 'group' => $post['group']);
                $data['id'] = empty($post['id']) ? null : $post['id'];
                if (empty($data['id'])) {
                    $result = $this->main_model->addFilter($data);
                } else {
                    $result = $this->main_model->editFilter($data);
                }
                if ($result) {
                    $response = array('success' => true, 'message' => 'Your filter is succesfully added');
                } else {
                    $response = array('success' => false, 'message' => 'A problem occured with your update. Please try again');
                }
            } else {
                $response = array('success' => false, 'message' => 'Your session expired. Please login');
            }
            $this->print_json($response);
        }
    }

    public function delete_filter() {
        $is_ajax = $this->is_ajax();
        $user = $this->checkAuth($is_ajax);
        if ($user) {
            if (!empty($user)) {
                $post = $this->get_request('post');
                $this->main_model->deleteFilter($post);
                $response = array('success' => true, 'message' => 'The filter succesfully deleted');
            } else {
                $response = array('success' => false, 'message' => 'Your session expired. Please login');
            }
            $this->print_json($response);
        }
    }

    public function add_edit_resource() {
        $is_ajax = $this->is_ajax();
        $user = $this->checkAuth($is_ajax);
        if ($user) {
            if (!empty($user)) {
                $post = $this->get_request('post');
                $data = array('title' => $post['title'], 'image' => $post['file'], 'file' => $post['file_pdf'], 'filters' => @$post['filters'] ? $post['filters'] : array());
                $data['description'] = empty($post['description']) ? null : $post['description'];
                $data['id'] = empty($post['id']) ? null : $post['id'];
                if (empty($data['id'])) {
                    $result = $this->main_model->addResource($data);
                } else {
                    $result = $this->main_model->editResource($data);
                }
                if ($result) {
                    $response = array('success' => true, 'message' => 'Your resource is succesfully posted');
                } else {
                    $response = array('success' => false, 'message' => 'A problem occured with your update. Please try again');
                }
            } else {
                $response = array('success' => false, 'message' => 'Your session expired. Please login');
            }
            $this->print_json($response);
        }
    }

    public function delete_resource() {
        $is_ajax = $this->is_ajax();
        $user = $this->checkAuth($is_ajax);
        if ($user) {
            if (!empty($user)) {
                $post = $this->get_request('post');
                $this->main_model->deleteResource($post);
                $response = array('success' => true, 'message' => 'The resource succesfully deleted');
            } else {
                $response = array('success' => false, 'message' => 'Your session expired. Please login');
            }
            $this->print_json($response);
        }
    }

    public function project_complete() {
        $is_ajax = $this->is_ajax();
        $user = $this->checkAuth($is_ajax);
        if ($user) {
            if (!empty($user)) {
                $post = $this->get_request('post');
                $result = $this->main_model->projectComplete($post);
                if ($result) {
                    $response = array('success' => true, 'message' => 'Project succesfully updated');
                } else {
                    $response = array('success' => false, 'message' => 'A problem occured when updating the project status. Please try again');
                }
            } else {
                $response = array('success' => false, 'message' => 'Your session expired. Please login');
            }
            $this->print_json($response);
        }
    }

    public function add_email_signup() {
        $is_ajax = $this->is_ajax();
        if ($is_ajax) {
            $params = $this->get_request('get');
            $result = $this->main_model->addEmailSignup($params);
            if ($result) {
                $response = array('success' => true, 'message' => 'Your email has been successfully added!');
            } else {
                $response = array('success' => false, 'message' => 'A problem occured with your signup. Please try again');
            }
            $this->print_json($response);
        }
    }

    public function contact_us() {
        $is_ajax = $this->is_ajax();
        if ($is_ajax) {
            $response = array('success' => false, 'message' => 'Currently we are having technical difficulties. Please try again.');
            $this->load->library('netsuite');
            $result = $this->netsuite->sendContactUs($this->input->post());
            if ($result) {
                $response = array('success' => true, 'message' => 'You message has been succesfully submitted.');
            }
            $this->print_json($response);
        }
    }

    public function faqs() {
        $is_ajax = $this->is_ajax();
        if ($is_ajax) {
            $response = array('success' => false, 'message' => 'Currently we are having technical difficulties. Please try again.');
            $this->load->library('netsuite');
            $result = $this->netsuite->sendFaqs($this->input->post());
            if ($result) {
                $response = array('success' => true, 'message' => 'You question has been succesfully submitted.');
            }
            $this->print_json($response);
        }
    }

    public function get_global_updates() {
        $is_ajax = $this->is_ajax();
        if ($is_ajax) {
            $result = $this->main_model->getGlobalProjectUpdates();
            $this->print_json($result);
        }
    }

    public function get_homepage_carousel($module = 'missio') {
        $is_ajax = $this->is_ajax();
        if ($is_ajax) {
            $result = $this->main_model->getHomepageCarousel($module);
            $this->print_json($result);
        }
    }

    public function get_resources() {
        $is_ajax = $this->is_ajax();
        if ($is_ajax) {
            $post = $this->get_request('get');
            $result = $this->main_model->getResources($post);
            $this->print_json($result);
        }
    }

    public function get_filters() {
        $is_ajax = $this->is_ajax();
        if ($is_ajax) {
            $post = $this->get_request('get');
            $result = $this->main_model->getFilterList($post);
            $this->print_json($result);
        }
    }

    public function get_global_stats() {
        $is_ajax = $this->is_ajax();
        if ($is_ajax) {
            $result = $this->main_model->getGlobalStats();
            $response = array();
            foreach ($result as $item) {
                $response[$item['field']] = number_format(round($item['value']), 0, ".", ",");
            }
            $this->print_json($response);
        }
    }

    public function get_finance_donor_list() {
        $is_ajax = $this->is_ajax();
        $user = $this->checkAuth($is_ajax);
        if ($user) {
            $params = $this->get_request('get');
            $params['is_admin'] = (bool) $user['admin'];
//            $params['is_national_director'] = (bool) $user['national_director'];
//            $params['is_diocese_director'] = (bool) $user['diocese_director'];
            $params['user_id'] = $user['id'];
            $params['items_per_page'] = 10;
            $result = $this->main_model->getDonorList($params);
            $this->print_json($result);
        }
    }

    public function get_finance_donor_donation_list($donor_id) {
        $is_ajax = $this->is_ajax();
        $user = $this->checkAuth($is_ajax);
        if ($user) {
            $params = $this->get_request('get');
            $params['is_admin'] = (bool) $user['admin'];
//            $params['is_national_director'] = (bool) $user['national_director'];
//            $params['is_diocese_director'] = (bool) $user['diocese_director'];
            $params['user_id'] = $user['id'];
            $params['donor_id'] = $donor_id;
            $params['items_per_page'] = 10;
            $result = $this->main_model->getDonorDonationList($params);
            $this->print_json($result);
        }
    }

    public function get_finance_project_list() {
        $is_ajax = $this->is_ajax();
        $user = $this->checkAuth($is_ajax);
        if ($user) {
            $params = $this->get_request('get');
            $params['is_admin'] = (bool) $user['admin'];
//            $params['is_national_director'] = (bool) $user['national_director'];
//            $params['is_diocese_director'] = (bool) $user['diocese_director'];
            $params['user_id'] = $user['id'];
            $params['items_per_page'] = 10;
            $result = $this->main_model->getFinanceProjectList($params);
            $this->print_json($result);
        }
    }

    public function get_finance_project_donor_donation_list($project_id) {
        $is_ajax = $this->is_ajax();
        $user = $this->checkAuth($is_ajax);
        if ($user) {
            $params = $this->get_request('get');
            $params['is_admin'] = (bool) $user['admin'];
//            $params['is_national_director'] = (bool) $user['national_director'];
//            $params['is_diocese_director'] = (bool) $user['diocese_director'];
            $params['user_id'] = $user['id'];
            $params['project_id'] = $project_id;
            $params['items_per_page'] = 10;
            $result = $this->main_model->getFinanceProjectDonationList($params);
            $this->print_json($result);
        }
    }

    public function get_finance_donation_flow($country = null, $state = null) {
        $is_ajax = $this->is_ajax();
        $user = $this->checkAuth($is_ajax);
        if ($user) {
            $params = $this->get_request('get');
            $params['is_admin'] = (bool) $user['admin'];
//          $params['is_national_director'] = (bool) $user['national_director'];
//          $params['is_diocese_director'] = (bool) $user['diocese_director'];
            $params['user_id'] = $user['id'];
            $params['items_per_page'] = 10;
            if ($state) {
                $params['country'] = $country;
                $params['state'] = $state;
                $result = $this->main_model->getDonationFlowState($params);
            } elseif ($country) {
                if ($country === 'us') {
                    $result = $this->main_model->getDonationFlowUs($params);
                } else {
                    $params['country'] = $country;
                    $result = $this->main_model->getDonationFlowCountry($params);
                }
            } else {
                $result = $this->main_model->getDonationFlow($params);
            }
            $this->print_json($result);
        }
    }

    private function get_request($type) {
        $params = $this->input->$type();
        unset($params['_']);
        return $params;
    }

}
