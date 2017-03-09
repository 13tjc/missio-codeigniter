<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard extends MY_Controller {

    private $emails = Array();

    public function __construct() {
        parent::__construct();
        $this->load->model('main_model');
    }

    public function index() {
        $user = $this->checkAuth();
        if ($user) {
            $data['user'] = $user;
            $data['stats'] = $this->main_model->getProjectStats($user);
            $this->load_view('dashboard/projects', $data);
        }
    }

    public function projects() {
        $user = $this->checkAuth();
        if ($user) {
            $data['user'] = $user;
            $data['stats'] = $this->main_model->getProjectStats($user);
            $this->load_view('dashboard/projects', $data);
        }
    }

    public function hero_manager() {
        $user = $this->checkAuth();
        if ($user) {
            $data['user'] = $user;
            $this->load_view('dashboard/hero_manager', $data);
        }
    }

    public function resource_manager() {
        $user = $this->checkAuth();
        if ($user) {
            $data['user'] = $user;
            $data['filters'] = $this->main_model->getResourceFilterList($user);
            $this->load_view('dashboard/resource_manager', $data);
        }
    }

    public function filter_manager() {
        $user = $this->checkAuth();
        if ($user) {
            $data['user'] = $user;
            $data['filter_groups'] = $this->main_model->getEnumValues('filter', 'group');
            $this->load_view('dashboard/filter_manager', $data);
        }
    }

    public function project_faqs() {
        $user = $this->checkAuth();
        if ($user) {
            $data['user'] = $user;
            $this->load_view('dashboard/project_faqs', $data);
        }
    }

    public function project_details($id) {
        $user = $this->checkAuth();
        if ($user) {
            $data['user'] = $user;
            $data['project'] = $this->main_model->getProjectDetails($id);
            if (empty($data['project'])) {
                return $this->err404();
            }
            $this->load_view('dashboard/project_details', $data);
        }
    }

    public function finance() {
        $user = $this->checkAuth();
        if ($user) {
            $data['user'] = $user;
            $data['stats'] = $this->getFinanceData($user);
            $this->load_view('dashboard/finance_dashboard', $data);
        }
    }

    public function finance_donors() {
        $user = $this->checkAuth();
        if ($user) {
            $data['user'] = $user;
            $this->load_view('dashboard/finance_donors', $data);
        }
    }

    public function finance_donor_details($id) {
        $user = $this->checkAuth();
        if ($user) {
            $data['user'] = $user;
            $data['donor'] = $this->main_model->getDonorDetails($id);
            $this->load_view('dashboard/finance_donor_donations', $data);
        }
    }

    public function finance_projects() {
        $user = $this->checkAuth();
        if ($user) {
            $data['user'] = $user;
            $this->load_view('dashboard/finance_projects', $data);
        }
    }

    public function finance_project_details($id) {
        $user = $this->checkAuth();
        if ($user) {
            $data['user'] = $user;
            $params['project_id'] = $id;
            $data['project'] = $this->main_model->getFinanceProjectDetails($params);
            if (empty($data['project'])) {
                return $this->err404();
            }
            $this->load_view('dashboard/finance_project_donations', $data);
        }
    }

    public function finance_flow($country = null, $state = null) {
        $user = $this->checkAuth();
        if ($user) {
            if ($state) {
                $am = $this->main_model->getAuxMeta($state, 'us_state');
                $state_name = $am['title'];
                $this->load_view('dashboard/finance_flow_state', compact('user', 'country', 'state', 'state_name'));
            } elseif ($country) {
                if ($country === 'us') {
                    $this->load_view('dashboard/finance_flow_us', compact('user', 'country'));
                } else {
                    $am = $this->main_model->getAuxMeta($country, 'country');
                    $country_name = $am['title'];
                    $this->load_view('dashboard/finance_flow_country', compact('user', 'country', 'country_name'));
                }
                $data['country'] = $country;
            } else {
                $this->load_view('dashboard/finance_flow', compact('user'));
            }
        }
    }

    public function finance_faqs() {
        $user = $this->checkAuth();
        if ($user) {
            $data['user'] = $user;
            $data['stats'] = $this->main_model->getProjectStats($user);
            $this->load_view('dashboard/finance_dashboard', $data);
        }
    }

    public function login() {
        $user = $this->session->userdata('user');
        if ($user) {
            header('Location: /dashboard');
        }
        $this->load_view('dashboard/login');
    }

    public function reset_password($code) {
        $this->load_view('dashboard/reset_password', compact('code'));
    }

    public function thankyou() {
        $data = array();
        $this->load_view('dashboard/thankyou', $data);
    }

    public function logout() {
        $this->session->sess_destroy();
        header('Location: /dashboard/login');
    }

    public function err404() {
        $this->output->set_status_header('404');
        $this->load_view('/dashboard/err_404');
    }

    protected function load_view($template, $data = array()) {
        $data['template'] = $template;
        $this->load->view('dashboard/global/container', compact('data'));
    }

    private function getFinanceData($user) {
        $donation_chart_title = array('donation', 'amount');
        $timeframes = array('past_month', 'current_month', 'past_week', 'current_week');
        // Donation and Time Sensitive Projects Chart Data
        foreach ($timeframes as $timeframe) {
            $dt = array();
            $donations[$timeframe]['data'][] = $donation_chart_title;
            foreach ($this->main_model->getFdDonationStats(compact('timeframe')) as $donation) {
                $donations[$timeframe]['data'][] = array($donation['affiliation'], floatval($donation['amount']));
                if ($donation['affiliation'] === 'affiliated') {
                    $dt['donors_affiliated'] = intval($donation['donors']);
                    @$dt['donors_total'] += intval($donation['donors']);
                    $dt['donations_affiliated'] = floatval($donation['amount']);
                    @$dt['donations_total'] += floatval($donation['amount']);
                } else {
                    $dt['donors_unaffiliated'] = intval($donation['donors']);
                    @$dt['donors_total'] += intval($donation['donors']);
                    $dt['donations_unaffiliated'] = floatval($donation['amount']);
                    @$dt['donations_total'] += floatval($donation['amount']);
                }
                $donations[$timeframe]['meta'] = $dt;
            }
        }
        $ts_projects = $this->main_model->getFdTimeSensitiveProjectStats();
        $tsp_chart = array();
        foreach ($ts_projects as $k => $tsp) {
            $tsp_chart['time_sensitive_projects'][] = array(
                'data' => array(
                    array('project', 'percent'),
                    array('unfunded', floatval($tsp['goal']) - floatval($tsp['donation'])),
                    array('funded', floatval($tsp['donation']))
                )
            );
        }
        // Most Active Projects Chart Data and Top Donors
        $timeframes = array('current_month', 'current_week');
        foreach ($timeframes as $timeframe) {
            $params = array();
            $params['timeframe'] = $timeframe;
            $ma_project_list = $this->main_model->getFdMostActiveProjects($params);
            $map_chart[$timeframe] = array();
            $map_chart_header = array(array('type' => 'date', 'id' => 'date'));
            foreach ($ma_project_list as $project) {
                $params['map_ids'][] = $project['id'];
                $map_chart_header[] = array('type' => 'number', 'id' => $project['id'], 'label' => $project['name']);
            }
            $map_chart[$timeframe][] = $map_chart_header;
            $map_chart_data = $this->main_model->getFdMostActiveProjectStats($params);
            $cumulative_vals = array();
            if (!empty($params['map_ids'])) {
                foreach ($params['map_ids'] as $id) {
                    $cumulative_vals[$id] = 0;
                }
            }
            foreach ($map_chart_data as $row) {
                $i = 0;
                $map_chart[$timeframe][$row['date']][0] = $row['date'];
                foreach ($cumulative_vals as $id => $val) {
                    $i++;
                    if ($row['id'] == $id) {
                        $v = $cumulative_vals[$id] + $row['total'];
                    } else {
                        $v = $cumulative_vals[$id] + 0;
                    }
                    $map_chart[$timeframe][$row['date']][$i] = $v;
                    $cumulative_vals[$id] = $v;
                }
            }
        }
        // Top Donors Data
        foreach ($timeframes as $timeframe) {
            $params = array();
            $params['timeframe'] = $timeframe;
            $top_donors[$timeframe] = $this->main_model->getFdTopDonors($params);
        }
        return compact('donations', 'ts_projects', 'tsp_chart', 'map_chart', 'top_donors');
    }

}
