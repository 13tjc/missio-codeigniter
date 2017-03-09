<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Main_model extends MY_Model {

    public function __construct() {
        parent::__construct();
    }

    /*
     ** Missio frontend methods 
    */
    
    public function prodView() {
        $result = array();
        $this->db->select("*")->from("projects");
        $query = $this->db->get();
        if($query->num_rows() > 0){
            $result = $query->result_array();
        }
        return $result; 
    }
    function m_email_exists($email) {
        // $this->db->select('*'); 
        // $this->db->from('users');
        // $this->db->where('email', $email);
        // $query = $this->db->get();
        // $result = $query->result_array();
        // return $result;

        $this->db->select('email');   
        $this->db->where('email', $email); 
        $query = $this->db->get('users');
       
        return $query->result();
        
   }

    public function getGlobalStats() {
        return $this->db->get('global_stat')->result_array();
    }

    public function getHomepageCarousel($module) {
        $q = $this->db->order_by('order', 'asc');
        if ($module === 'missio') {
            $q->limit(4);
        }
        return $q->get('homepage_carousel')->result_array();
    }

    /* Resources */

    public function getResourceFilters() {
        return $this->db->from('filter')->where('group !=', 'featured')->order_by('`group` ASC, `title` ASC')->get()->result_array();
    }

    public function getResources($params = array()) {
        if (@$params['frontend']) {
            $params['items_per_page'] = 100;
            if (@$params['filters']) {
                $groups = $this->db->distinct()->select('group')->from('filter')->where_in('id', explode(',', $params['filters']))->get()->result_array();
                $q = $this->db->select('r.*, GROUP_CONCAT(DISTINCT fg.filter_id) AS filters', false)->from('resource r')->join('resource_filter fg', 'r.id = fg.resource_id', 'left')->join('resource_filter rf', 'r.id = rf.resource_id');
                foreach ($groups as $r) {
                    $group = $r['group'];
                    $grname = strtolower(str_replace(' ', '_', $group));
                    $q->join('filter ' . $grname, $grname . '.id = rf.filter_id AND ' . $grname . '.group = "' . $group . '" AND ' . $grname . '.id IN (' . $params['filters'] . ')', 'left');
                }
                $q->group_by('rf.resource_id');
                foreach ($groups as $r) {
                    $grname = strtolower(str_replace(' ', '_', $r['group']));
                    $q->having('COUNT(' . $grname . '.id) >', 0, false);
                }
            } else {
                $q = $this->db->select('r.*, GROUP_CONCAT(DISTINCT fg.filter_id) AS filters', false)->from('resource r')->join('resource_filter fg', 'r.id = fg.resource_id', 'left')->join('resource_filter rf', 'r.id = rf.resource_id')->join('filter f', 'f.id = rf.filter_id')->where('group', 'Featured')->group_by('r.id');
            }
        } else {
            $q = $this->db->select('r.*, GROUP_CONCAT(DISTINCT rf.filter_id) AS filters', false)->from('resource r')->join('resource_filter rf', 'r.id = rf.resource_id', 'left');
            if (!empty($params['kw'])) {
                $q->like('r.title', $params['kw']);
                $q->or_like('r.description', $params['kw']);
            }
            $q->group_by('r.id');
        }
        $map = array('date' => 'r.timestamp', 'title' => 'r.title');
        $q = $this->setOrder($q, $params, $map, 'date-desc');
        $meta = $this->getPagination($params, $q);
        $q->limit($meta['limit'], $meta['offset']);
        $list = $q->get()->result_array();
        $meta['items_on_page'] = count($list);
        return compact('list', 'meta');
    }

    /*
     * Finance dashboard methods 
     */

    public function getFdTimeSensitiveProjectStats() {
        $q = $this->db->select('p.id, p.project_name AS name, f.days_remaining AS days, f.percent_funded AS percentage, c.name AS category, o.name AS organization_name, f.goal, f.donation', false)->from('projects p');
        $q->join('view_project_finance f', 'f.project_id = p.id');
        $q->join('project_category c', 'c.id = p.category_no', 'left');
        $q->join('organizations o', 'p.twin_parish_no = o.id', 'left');
        $q->limit(4)->order_by('days', 'ASC');
        $q->where('f.status', 'open');
        return $q->get()->result_array();
    }

    public function getFdMostActiveProjects($params) {
        $q = $this->db->select('d.project_id AS id, p.project_name AS name', false)->from('donation d')->join('projects p', 'd.project_id = p.id')->group_by('d.project_id')->order_by('SUM(d.amount)', 'DESC')->limit(4);
        if (@$params['timeframe']) {
            $daterange = $this->getDateRange($params['timeframe']);
            $q->where(array('UNIX_TIMESTAMP(d.timestamp) <=' => $daterange['end'], 'UNIX_TIMESTAMP(d.timestamp) >=' => $daterange['start']));
        }
        return $q->get()->result_array();
    }

    public function getFdMostActiveProjectStats($params) {
        $q = $this->db->select('SUM(amount) AS total, DATE(`timestamp`) AS `date`, project_id AS id', false)->from('donation')->group_by('project_id, DATE(`timestamp`)')->order_by('`timestamp`');
        if (@$params['timeframe']) {
            $daterange = $this->getDateRange($params['timeframe']);
            $q->where(array('UNIX_TIMESTAMP(timestamp) <=' => $daterange['end'], 'UNIX_TIMESTAMP(timestamp) >=' => $daterange['start']));
        }
        $q->where_in('project_id', @$params['map_ids']);
        return $q->get()->result_array();
    }

    public function getFdDonationStats($params) {
        $q = $this->db->select('SUM(amount) AS amount, COUNT(DISTINCT donor_nsid) AS donors, IF(catholic="Yes","affiliated","unaffiliated") AS affiliation', false)->from('donation')->group_by('affiliation');
        if (@$params['timeframe']) {
            $daterange = $this->getDateRange($params['timeframe']);
            $q->where(array('UNIX_TIMESTAMP(timestamp) <=' => $daterange['end'], 'UNIX_TIMESTAMP(timestamp) >=' => $daterange['start']));
        }
        if (@$params['country']) {
            $q->where('country', $params['country']);
        }
        if (@$params['diocese']) {
            $q->where('diocese_id', $params['diocese']);
        }
        return $q->get()->result_array();
    }

    public function getFdTopDonors($params) {
        $q = $this->db->select('u.id AS donor, u.image AS avatar, u.fullName AS name, DATE_FORMAT(u.`createdAt`, "%b %e, %Y") AS since, COUNT(d.project_id) AS projects, FORMAT(SUM(d.amount), 0) AS donated, d.donor_nsid , dc.name AS affiliation', false)->from('donation d');
        $q->join('users u', 'd.donor_nsid = u.nsId');
        $q->join('donor dn', 'd.donor_nsid = dn.nsid');
        $q->join('dioceses dc', 'dc.id = dn.diocese_id', 'left');
        $q->group_by('d.donor_nsid');
        $q->order_by('SUM(d.amount)', 'desc');
        $q->limit(4);
        if (@$params['timeframe']) {
            $daterange = $this->getDateRange($params['timeframe']);
            $q->where(array('UNIX_TIMESTAMP(d.timestamp) <=' => $daterange['end'], 'UNIX_TIMESTAMP(d.timestamp) >=' => $daterange['start']));
        }
        if (@$params['country']) {
            $q->where('country', $params['country']);
        }
        if (@$params['diocese']) {
            $q->where('diocese_id', $params['diocese']);
        }
        return $q->get()->result_array();
    }

    public function getDonorList($params) {
        $q = $this->db->select('d.donor_id AS id, u.firstName AS first_name, u.lastName AS last_name, u.email AS email, FORMAT(SUM(d.amount), 0) AS donated, dn.catholic AS catholic, dc.name AS affiliation', false)->from('donation d');
        $q->join('users u', 'd.donor_id = u.id');
        $q->join('donor dn', 'd.donor_id = dn.user_id');
        $q->join('dioceses dc', 'dc.id = dn.diocese_id', 'left');
        $q->group_by('d.donor_id');
        if (@$params['country']) {
            $q->where('country', $params['country']);
        }
        if (@$params['diocese']) {
            $q->where('diocese_id', $params['diocese']);
        }
        $map = array('lname' => 'u.lastName', 'fname' => 'u.firstName', 'email' => 'u.email', 'catholic' => 'dn.catholic', 'affiliation' => 'dc.name', 'donated' => 'SUM(d.amount)');
        $q = $this->setOrder($q, $params, $map, 'lname-asc');
        $meta = $this->getPagination($params, $q);
        $q->limit($meta['limit'], $meta['offset']);
        $list = $q->get()->result_array();
        $meta['items_on_page'] = count($list);
        return compact('list', 'meta');
    }

    public function getDonorDetails($id) {
        return $this->db->select('u.id AS id, u.firstName AS first_name, u.lastName AS last_name')->from('users u')->where('u.id', $id)->get()->row_array();
    }

    public function getDonorDonationList($params) {
        $q = $this->db->select('d.amount AS amount, p.project_name AS project, p.country AS country, IFNULL(o.name, "N/A") AS affiliation, pc.name AS category, DATE_FORMAT(d.timestamp, "%b %e, %Y") AS date', false)->from('donation d');
        $q->join('projects p', 'p.id = d.project_id')->join('project_category pc', 'pc.id = p.category_no', 'left')->join('organizations o', 'p.twin_parish_no = o.id', 'left');
        $q->where('d.donor_id', $params['donor_id']);
        if (@$params['country']) {
            $q->where('country', $params['country']);
        }
        if (@$params['diocese']) {
            $q->where('diocese_id', $params['diocese']);
        }
        $map = array('date' => 'd.timestamp', 'project' => 'p.project_name', 'category' => 'pc.name', 'country' => 'p.country', 'affiliation' => 'o.name', 'amount' => 'd.amount');
        $q = $this->setOrder($q, $params, $map, 'date-desc');
        $meta = $this->getPagination($params, $q);
        $q->limit($meta['limit'], $meta['offset']);
        $list = $q->get()->result_array();
        $meta['items_on_page'] = count($list);
        return compact('list', 'meta');
    }

    public function getFinanceProjectList($params) {
        $q = $this->db->select('p.id AS id, p.project_name AS project, DATE_FORMAT(p.project_start_date, "%b %e, %Y") AS start_date, DATE_FORMAT(p.project_end_date, "%b %e, %Y") AS end_date, p.project_cost AS goal, IFNULL(SUM(d.amount),0) AS received, p.country AS country, IFNULL(o.name, "N/A") AS affiliation', false);
        $q->group_by('p.id');
        if (@$params['country']) {
            $q->select('(SELECT IFNULL(SUM(rd.amount),0) FROM donation rd WHERE rd.country = "' . $params['country'] . '" AND rd.project_id = p.id) AS region_total', false);
        }
        if (@$params['diocese']) {
            $q->select('(SELECT IFNULL(SUM(rd.amount),0) FROM donation rd WHERE rd.diocese_id = "' . $params['diocese'] . '" AND rd.project_id = p.id) AS region_total', false);
        }
        $q->from('projects p');
        $q->join('donation d', 'd.project_id = p.id', 'left')->join('organizations o', 'p.twin_parish_no = o.id', 'left');
        $map = array('project' => 'project', 'startdate' => 'p.project_start_date', 'enddate' => 'p.project_end_date', 'goal' => 'goal', 'received' => 'received', 'country' => 'p.country', 'affiliation' => 'affiliation', 'regiontotal' => 'region_total');
        $q = $this->setOrder($q, $params, $map, 'startdate-desc');
        $meta = $this->getPagination($params, $q);
        $q->limit($meta['limit'], $meta['offset']);
        $list = $q->get()->result_array();
        $meta['items_on_page'] = count($list);
        return compact('list', 'meta');
    }

    public function getFinanceProjectDetails($params) {
        $q = $this->db->select('p.id AS id, p.project_name AS name, ROUND(IFNULL(SUM(d.amount),0),0) AS received', false);
        if (@$params['country']) {
            $q->select('(SELECT IFNULL(SUM(rd.amount),0) FROM donation rd WHERE rd.country = "' . $params['country'] . '" AND rd.project_id = p.id) AS region_total', false);
        }
        if (@$params['diocese']) {
            $q->select('(SELECT IFNULL(SUM(rd.amount),0) FROM donation rd WHERE rd.diocese_id = "' . $params['diocese'] . '" AND rd.project_id = p.id) AS region_total', false);
        }
        $q->from('projects p')->join('donation d', 'd.project_id = p.id', 'left')->where('p.id', $params['project_id'])->group_by('p.id');
        return $q->get()->row_array();
    }

    public function getFinanceProjectDonationList($params) {
        $q = $this->db->select('u.fullName as name, d.amount AS amount, IFNULL(am.title, "N/A") AS country, IFNULL(o.name, "N/A") AS affiliation, DATE_FORMAT(d.timestamp, "%b %e, %Y") AS date, dn.catholic as catholic', false)->from('donation d');
        $q->join('donor dn', 'd.donor_id = dn.user_id')->join('users u', 'u.id = dn.user_id')->join('organizations o', 'dn.diocese_id = o.id', 'left')->join('aux_meta am', 'am.code = dn.country AND am.type = "country"', 'left');
        $q->where('d.project_id', $params['project_id']);
        $map = array('date' => 'd.timestamp', 'name' => 'name', 'country' => 'country', 'catholic' => 'catholic', 'affiliation' => 'affiliation', 'amount' => 'amount');
        $q = $this->setOrder($q, $params, $map, 'date-desc');
        $meta = $this->getPagination($params, $q);
        $q->limit($meta['limit'], $meta['offset']);
        $list = $q->get()->result_array();
        $meta['items_on_page'] = count($list);
        return compact('list', 'meta');
    }

    public function getDonationFlow($params) {
        $q = $this->db->select('am.title AS country, UPPER(am.code) AS country_code', false);
        $q_parts = array('d_q' => 'WHERE `d`.`country` = `am`.`code`', 'r_q' => 'LEFT JOIN `projects` p ON `d`.`project_id` = `p`.`id` WHERE `p`.`country_code` = `am`.`code`');
        $q = $this->getDonationFlowQuery($q, $params, $q_parts);
        $q->from('`aux_meta` am');
        $q->where('am.type', 'country');
        $q->group_by('am.code');
        $q->having('(donated + received) > 0');
        $map = array('country' => 'country', 'donated' => 'donated', 'donateddonor' => 'donated_donor', 'received' => 'received', 'receiveddonor' => 'received_donor');
        $q = $this->setOrder($q, $params, $map, 'country-asc');
        $meta = $this->getPagination($params, $q, true);
        $listall = $meta['listall_query']->result_array();
        unset($meta['listall_query']);
        $columns = array('Country', 'Total Amount');
        $chart = array('origin' => array($columns), 'destination' => array($columns));
        foreach ($listall as $item) {
            if ($item['donated'] > 0) {
                $chart['origin'][] = array($item['country_code'], $item['country'], floatval($item['donated']));
            }
            if ($item['received'] > 0) {
                $chart['destination'][] = array($item['country_code'], $item['country'], floatval($item['received']));
            }
        }
        $q->limit($meta['limit'], $meta['offset']);
        $list = $q->get()->result_array();
        $meta['items_on_page'] = count($list);
        return compact('list', 'meta', 'chart');
    }

    public function getDonationFlowUs($params) {
        $q = $this->db->select('am.title AS state, UPPER(am.code) AS state_code', false);
        $q_parts = array('d_q' => 'WHERE `d`.`state` = `am`.`code`', 'r_q' => 'LEFT JOIN `projects` p ON `d`.`project_id` = `p`.`id` WHERE `p`.`state_province` = `am`.`code`');
        $q = $this->getDonationFlowQuery($q, $params, $q_parts);
        $q->from('`aux_meta` am');
        $q->where('`am`.`type`', 'us_state');
        $q->group_by('`am`.`code`');
        $q->having('(donated + received) > 0');
        $map = array('state' => 'state', 'donated' => 'donated', 'donateddonor' => 'donated_donor', 'received' => 'received', 'receiveddonor' => 'received_donor');
        $q = $this->setOrder($q, $params, $map, 'state-asc');
        $meta = $this->getPagination($params, $q, true);
        $listall = $meta['listall_query']->result_array();
        unset($meta['listall_query']);
        $chart = array('origin' => array(), 'destination' => array());
        foreach ($listall as $item) {
            if ($item['donated'] > 0) {
                $chart['origin'][] = array($item['state_code'], $item['state'], floatval($item['donated']));
            }
            if ($item['received'] > 0) {
                $chart['destination'][] = array($item['state_code'], $item['state'], floatval($item['received']));
            }
        }
        $q->limit($meta['limit'], $meta['offset']);
        $list = $q->get()->result_array();
        //   var_dump($q->last_query());
        $meta['items_on_page'] = count($list);
        $params['country'] = 'us';
        $aggregation = $this->getCountryAggregatedStats($params);
        return compact('list', 'meta', 'chart', 'aggregation');
    }

    public function getDonationFlowState($params) {
        $q = $this->db->select('di.name AS diocese', false);
        $q_parts = array('d_q' => 'WHERE `d`.`diocese_id` = `di`.`id`', 'r_q' => 'LEFT JOIN `projects` p ON `d`.`project_id` = `p`.`id` WHERE `p`.`twin_diocese_no` = `di`.`id`');
        $q = $this->getDonationFlowQuery($q, $params, $q_parts);
        $q->from('dioceses di');
        $q->where('di.country_code = "us" AND di.name LIKE "%, ' . $params['state'] . '"');
        $q->group_by('di.id');
        $q->having('(donated + received) > 0');
        $map = array('diocese' => 'diocese', 'donated' => 'donated', 'donateddonor' => 'donated_donor', 'received' => 'received', 'receiveddonor' => 'received_donor');
        $q = $this->setOrder($q, $params, $map, 'diocese-asc');
        $meta = $this->getPagination($params, $q, true);
        $listall = $meta['listall_query']->result_array();
        unset($meta['listall_query']);
        $q->limit($meta['limit'], $meta['offset']);
        $list = $q->get()->result_array();
        $meta['items_on_page'] = count($list);
        $aggregation = $this->getStateAggregatedStats($params);
        $am = $this->getAuxMeta($params['state'], 'us_state');
        $chart = array(array('State'), array($am['title']));
        return compact('list', 'meta', 'chart', 'aggregation');
    }

    public function getDonationFlowCountry($params) {
        $q = $this->db->select('di.name AS diocese', false);
        $q_parts = array('d_q' => 'WHERE `d`.`diocese_id` = `di`.`id`', 'r_q' => 'LEFT JOIN `projects` p ON `d`.`project_id` = `p`.`id` WHERE `p`.`twin_diocese_no` = `di`.`id`');
        $q = $this->getDonationFlowQuery($q, $params, $q_parts);
        $q->from('dioceses di');
        $q->where('di.country_code = "' . $params['country'] . '"');
        $q->group_by('di.id');
        $q->having('(donated + received) > 0');
        $map = array('diocese' => 'diocese', 'donated' => 'donated', 'donateddonor' => 'donated_donor', 'received' => 'received', 'receiveddonor' => 'received_donor');
        $q = $this->setOrder($q, $params, $map, 'diocese-asc');
        $meta = $this->getPagination($params, $q, true);
        $listall = $meta['listall_query']->result_array();
        unset($meta['listall_query']);
        $q->limit($meta['limit'], $meta['offset']);
        $list = $q->get()->result_array();
        $meta['items_on_page'] = count($list);
        $aggregation = $this->getCountryAggregatedStats($params);
        return compact('list', 'meta', 'aggregation');
    }

    public function getCountryAggregatedStats($params) {
        $qts = array('da' => '', 'du' => '', 'd' => '', 'ra' => '', 'ru' => '', 'r' => '');
        if (@$params['start'] & @$params['end']) {
            $st = strtotime($params['start'] . ' 00:00:00');
            $et = strtotime($params['end'] . ' 23:59:59');
            foreach ($qts as $k => $v) {
                $qts[$k] = ' AND (UNIX_TIMESTAMP(`' . $k . '`.`timestamp`) <=' . $et . ' AND UNIX_TIMESTAMP(`' . $k . '`.`timestamp`) >=' . $st . ') ';
            }
        }
        $qstr = 'SELECT "donated" AS `direction`, "affiliated" AS `group`, ROUND(IFNULL(SUM(`da`.`amount`), 0)) AS `amount`, IFNULL(COUNT(DISTINCT `da`.`donor_id`), 0) AS `donors` FROM `donation` `da` WHERE `da`.`catholic` = "Yes" AND `da`.`country`  = "' . $params['country'] . '"' . $qts['da'];
        $qstr .= 'UNION SELECT "donated" AS `direction`, "unaffiliated" AS `group`, ROUND(IFNULL(SUM(`du`.`amount`), 0)) AS `amount`,IFNULL(COUNT(DISTINCT `du`.`donor_id`), 0) AS `donors` FROM `donation` `du` WHERE `du`.`catholic` != "Yes" AND `du`.`country`  = "' . $params['country'] . '"' . $qts['du'];
        $qstr .= 'UNION SELECT "donated" AS `direction`, "total" AS `group`, ROUND(IFNULL(SUM(d.`amount`), 0)) AS `amount`, IFNULL(COUNT(DISTINCT d.`donor_id`), 0) AS `donors` FROM `donation` `d` WHERE `d`.`country`  = "' . $params['country'] . '"' . $qts['d'];
        $qstr .= 'UNION SELECT "received" AS `direction`, "affiliated" AS `group`, ROUND(IFNULL(SUM(`ra`.`amount`), 0)) AS `amount`, IFNULL(COUNT(DISTINCT `ra`.`donor_id`), 0) AS `donors` FROM `donation` `ra` JOIN `projects` p ON `ra`.`project_id` = `p`.`id` WHERE `ra`.`catholic` = "Yes" AND `p`.`country_code`  = "' . $params['country'] . '"' . $qts['ra'];
        $qstr .= 'UNION SELECT "received" AS `direction`, "unaffiliated" AS `group`, ROUND(IFNULL(SUM(`ru`.`amount`), 0)) AS `amount`, IFNULL(COUNT(DISTINCT `ru`.`donor_id`), 0) AS `donors` FROM `donation` `ru` JOIN `projects` p ON `ru`.`project_id` = `p`.`id` WHERE `ru`.`catholic` != "Yes" AND `p`.`country_code`  = "' . $params['country'] . '"' . $qts['ru'];
        $qstr .= 'UNION SELECT "received" AS `direction`, "total" AS `group`, ROUND(IFNULL(SUM(r.`amount`), 0)) AS `amount`, IFNULL(COUNT(DISTINCT r.`donor_id`), 0) AS `donors` FROM `donation` `r` JOIN `projects` `p` ON `r`.`project_id` = `p`.`id` WHERE `p`.`country_code`  = "' . $params['country'] . '"' . $qts['r'] . ';';
        return $this->db->query($qstr)->result_array();
    }

    public function getStateAggregatedStats($params) {
        $qts = array('da' => '', 'du' => '', 'd' => '', 'ra' => '', 'ru' => '', 'r' => '');
        if (@$params['start'] & @$params['end']) {
            $st = strtotime($params['start'] . ' 00:00:00');
            $et = strtotime($params['end'] . ' 23:59:59');
            foreach ($qts as $k => $v) {
                $qts[$k] = ' AND (UNIX_TIMESTAMP(`' . $k . '`.`timestamp`) <=' . $et . ' AND UNIX_TIMESTAMP(`' . $k . '`.`timestamp`) >=' . $st . ') ';
            }
        }
        $qstr = 'SELECT "donated" AS `direction`, "affiliated" AS `group`, ROUND(IFNULL(SUM(`da`.`amount`), 0)) AS `amount`, IFNULL(COUNT(DISTINCT `da`.`donor_id`), 0) AS `donors` FROM `donation` `da` WHERE `da`.`catholic` = "Yes" AND `da`.`state`  = "' . $params['state'] . '"' . $qts['da'];
        $qstr .= 'UNION SELECT "donated" AS `direction`, "unaffiliated" AS `group`, ROUND(IFNULL(SUM(`du`.`amount`), 0)) AS `amount`,IFNULL(COUNT(DISTINCT `du`.`donor_id`), 0) AS `donors` FROM `donation` `du` WHERE `du`.`catholic` != "Yes" AND `du`.`state`  = "' . $params['state'] . '"' . $qts['du'];
        $qstr .= 'UNION SELECT "donated" AS `direction`, "total" AS `group`, ROUND(IFNULL(SUM(d.`amount`), 0)) AS `amount`, IFNULL(COUNT(DISTINCT d.`donor_id`), 0) AS `donors` FROM `donation` `d` WHERE `d`.`state`  = "' . $params['state'] . '"' . $qts['d'];
        $qstr .= 'UNION SELECT "received" AS `direction`, "affiliated" AS `group`, ROUND(IFNULL(SUM(`ra`.`amount`), 0)) AS `amount`, IFNULL(COUNT(DISTINCT `ra`.`donor_id`), 0) AS `donors` FROM `donation` `ra` JOIN `projects` p ON `ra`.`project_id` = `p`.`id` WHERE `ra`.`catholic` = "Yes" AND `p`.`state_province`  = "' . $params['state'] . '"' . $qts['ra'];
        $qstr .= 'UNION SELECT "received" AS `direction`, "unaffiliated" AS `group`, ROUND(IFNULL(SUM(`ru`.`amount`), 0)) AS `amount`, IFNULL(COUNT(DISTINCT `ru`.`donor_id`), 0) AS `donors` FROM `donation` `ru` JOIN `projects` p ON `ru`.`project_id` = `p`.`id` WHERE `ru`.`catholic` != "Yes" AND `p`.`state_province`  = "' . $params['state'] . '"' . $qts['ru'];
        $qstr .= 'UNION SELECT "received" AS `direction`, "total" AS `group`, ROUND(IFNULL(SUM(r.`amount`), 0)) AS `amount`, IFNULL(COUNT(DISTINCT r.`donor_id`), 0) AS `donors` FROM `donation` `r` JOIN `projects` `p` ON `r`.`project_id` = `p`.`id` WHERE `p`.`state_province`  = "' . $params['state'] . '"' . $qts['r'] . ';';
        return $this->db->query($qstr)->result_array();
    }

    public function getAuxMeta($code, $type) {
        return $this->db->get_where('aux_meta', compact('code', 'type'))->row_array();
    }

    /* Dashboard resources methods */

    public function addFilter($params) {
        return $this->db->insert('filter', $params);
    }

    public function editFilter($params) {
        $filter_id = $params['id'];
        unset($params['id']);
        $result = $this->db->update('filter', $params, array('id' => $filter_id));
        return $result;
    }

    public function deleteFilter($params) {
        return $this->db->delete('filter', $params);
    }

    public function addResource($params) {
        $filters = $params['filters'];
        unset($params['filters']);
        $result = $this->db->insert('resource', $params);
        if ($result) {
            $resource_id = $this->db->insert_id();
            foreach ($filters as $filter_id) {
                $result = $this->db->insert('resource_filter', compact('resource_id', 'filter_id'));
            }
        }
        return $result;
    }

    public function editResource($params) {
        $resource_id = $params['id'];
        $filters = $params['filters'];
        unset($params['id'], $params['filters']);
        $result = $this->db->update('resource', $params, array('id' => $resource_id));
        if ($result) {
            $this->db->delete('resource_filter', compact('resource_id'));
            foreach ($filters as $filter_id) {
                $this->db->insert('resource_filter', compact('resource_id', 'filter_id'));
            }
        }
        return $result;
    }

    public function deleteResource($params) {
        return $this->db->delete('resource', $params);
    }

    public function getResourceFilterList() {
        return $this->db->select('id AS value, `title` AS label', false)->from('filter')->order_by('`group` ASC, `title` ASC')->get()->result_array();
    }

    public function getFilterList($params = array()) {
        $q = $this->db->from('filter')->order_by('`group` ASC, `title` ASC');
        $meta = $this->getPagination($params, $q);
        $q->limit($meta['limit'], $meta['offset']);
        $list = $q->get()->result_array();
        $meta['items_on_page'] = count($list);
        return compact('list', 'meta');
    }

    /* Project dashboard methods */

    public function getCountries() {
        return $this->db->distinct()->from('view_countries')->get()->result_array();
    }

    public function getProjectStats($user) {
        if (!((bool) $user['admin'] || (bool) $user['leader'])) {
            $user_id = "-1";
        } elseif ((bool) $user['admin']) {
            $user_id = "0";
        } elseif ((bool) $user['leader']) {
            $user_id = $user['id'];
        }
        return $this->call('GET_PROJECT_STATS', array($user_id));
    }

    public function getProjectList($params) {
        $q = $this->db->select('`id`, `project_name`, `days_remaining`, `project_status`, TO_MILISECONDS(`project_start_date`) AS `project_start_date`, TO_MILISECONDS(`project_end_date`) AS `project_end_date`, `percent_funded`, `country`, `country_code`, `share_count`, `act_count`, `total_contributions`', false)->from('view_projects');
        if (@$params['destination']) {
            $q->where('country_code', $params['destination']);
        }
        if (@$params['daysremaining']) {
            $map = array('0-5' => array(0, 5), '5-10' => array(5, 10), '10-20' => array(10, 20), '20plus' => array(20, 30), 'cmplt' => array(30, 1000000));
            $q->where('days_remaining BETWEEN ' . implode(' AND ', $map[$params['daysremaining']]));
        }
        if (@$params['percentfunded']) {
            $map = array('0-25' => array(0, 0.25), '25-50' => array(0.25, 0.5), '50-75' => array(0.5, 0.75), '75-100' => array(0.75, 1), '100' => array(1, 1));
            $q->where('percent_funded BETWEEN ' . implode(' AND ', $map[$params['percentfunded']]));
        }
        // Check user role
        if (!($params['is_admin'] || $params['is_leader'])) {
            $q->where('project_leader', "0");
        } elseif ($params['is_admin']) {
            // Don't add any filters for admin. Bring all projects
        } elseif ($params['is_leader']) {
            $q->where('project_leader', $params['user_id']);
        }
        $map = array('name' => 'project_name', 'status' => 'project_status', 'startdate' => 'project_start_date', 'enddate' => 'project_end_date', 'country' => 'country', 'shares' => 'share_count', 'acts' => 'act_count', 'donated' => 'total_contributions');
        $q = $this->setOrder($q, $params, $map, 'name-asc');
        $meta = $this->getPagination($params, $q);
        $q->limit($meta['limit'], $meta['offset']);
//      $q->get(); print_r($q->last_query()); exit;
        $list = $q->get()->result_array();
        $meta['items_on_page'] = count($list);
        return compact('list', 'meta');
    }

    public function getProjectUpdates($params) {
        $q = $this->db->select('`up`.`id`, `up`.`projectId`, `up`.`message`, `up`.`mediaType` AS `media_type`, `up`.`mediaUrl` AS `media_url`, `vi`.`vimeo`, `vi`.`status`, `vi`.`md5`, `us`.`id` AS `user_id`, TO_MILISECONDS(`up`.`createdAt`) AS `updated`, IFNULL(`us`.`image`,"/images/avatar.png") AS `user_image`, `us`.`fullname` AS `user_fullname`, `vi`.`vimeo`, `vi`.`status`', false)->from('updates up');
        $q->join('users us', 'us.id = up.userId');
        $q->join('video vi', 'vi.md5 = up.md5', 'left');
        $q->where(array('up.projectId' => $params['id']));
        $q->order_by('up.id', 'desc');
        $meta = $this->getPagination($params, $q);
        $q->limit($meta['limit'], $meta['offset']);
        $list = $q->get()->result_array();
        $meta['items_on_page'] = count($list);
        return compact('list', 'meta');
    }

    public function getGlobalProjectUpdates() {
        $q = $this->db->select('`up`.`message`, TO_MILISECONDS(`up`.`createdAt`) AS `updated`, IFNULL(`us`.`image`,"/web/images/avatar.png") AS `avatar`', false)->from('updates up');
        $q->join('users us', 'us.id = up.userId');
        $q->order_by('up.id', 'desc')->where('type !=', 'custom')->limit(4);
        return $q->get()->result_array();
    }

    public function deleteProjectUpdate($params) {
        return $this->db->delete('updates', $params);
    }

    public function addProjectUpdate($params) {
        $data = array('userId' => $params['user_id'], 'projectId' => $params['project_id'], 'message' => $params['message'], 'md5' => $params['file']);
        if (!empty($params['file'])) {
            $data['mediaType'] = $params['type'];
            if (strpos($params['type'], 'video/') === false) {
                $data['mediaUrl'] = $this->utilities->getUrl('/media/photos/' . $params['file']);
            } else {
                $data['mediaUrl'] = $this->utilities->getUrl('/media/videos/' . $params['file']);
            }
        }
        return $this->db->insert('updates', $data);
    }

    public function getVideoData($params) {
        return $this->db->get_where('video', $params)->row_array();
    }

    public function projectComplete($params) {
        return $this->db->update('projects', array('complete' => intval($params['complete'])), array('id' => $params['id']));
    }

    public function getProjectDetails($id) {
        $q = $this->db->select('view_projects.id AS id, project_name AS name, view_projects.description AS description, featured_image_url AS image, view_projects.city, view_projects.country, days_remaining,'
                . ' project_subcategory.name AS subcategory, view_projects.complete AS complete, follows.userId AS follows, share_count AS shares, act_count AS actions, project_cost AS goal, percent_funded, '
                . 'organizations.name AS organization_name, organizations.city AS organization_city, organizations.state AS organization_state, organizations.country_code AS organization_country');
        $q->from('view_projects')->join('project_subcategory', 'project_subcategory.id = view_projects.subcategory_no', 'left')->join('follows', 'view_projects.id = follows.projectId', 'left')->join('organizations', 'view_projects.twin_parish_no = organizations.id', 'left');
        $q->where(array('view_projects.id' => $id))->group_by('view_projects.id');
        //    $q->get(); print_r($q->last_query()); exit;
        return $q->get()->row_array();
    }

    /* Hero manager methods */

    public function addHomepageHero($params) {
        $result = $this->db->select('MAX(`order`) AS `order`', false)->get('homepage_carousel')->row_array();
        $params['order'] = $result['order'] + 1;
        return $this->db->insert('homepage_carousel', $params);
    }

    public function editHomepageHero($params) {
        $id = $params['id'];
        unset($params['id']);
        return $this->db->update('homepage_carousel', $params, compact('id'));
    }

    public function deleteHomepageHero($params) {
        return $this->db->delete('homepage_carousel', $params);
    }

    public function reorderHomepageHeros($params) {
        foreach ($params AS $order => $id) {
            $this->db->update('homepage_carousel', array('order' => $order + 1), compact('id'));
        }
        return true;
    }

    /* User related methods */

    public function addEmailSignup($params) {
        return $this->db->query('INSERT IGNORE INTO email_signup SET email = "' . $params['email'] . '"');
    }

    public function getUser($params) {
        if (isset($params['password'])) {
            // In stored procedures order matters. Put the params in correct order
            return $this->call('LOGIN', array($params['email'], $params['password']));
        } else {
            return $this->db->get_where('users', $params)->row_array();
        }
    }

    public function forgotPassword($email) {
        return $this->call('FORGOT_PASSWORD', array($email));
    }

    public function resetPassword($code, $email) {
        return $this->call('RESET_PASSWORD', array($code, $email));
    }

    /* Private methods */

    private function setOrder($q, $params, $map, $default = 'name-asc') {
        $default = explode('-', $default);
        if (@$params['order']) {
            $order = explode('-', $params['order']);
            $sort = $map[$order[0]] ? $map[$order[0]] : $map[$default[0]];
            $direction = in_array($order[1], array('asc', 'desc')) ? $order[1] : $default[1];
        } else {
            $sort = $map[$default[0]];
            $direction = $default[1];
        }
        $q->order_by($sort, $direction);
        return $q;
    }

    private function getPagination($params, $q, $listall_query = false) {
        $limit = @$params['items_per_page'] ? intval($params['items_per_page']) : 10;
        $qc = clone $q;
        $qry_all = $qc->get();
        $count = $qry_all->num_rows();
        $page_count = ceil($count / $limit);
        $page = @$params['page'] ? intval($params['page'] - 1) : 0;
        $offset = $page * $limit;
        $meta = compact('offset', 'limit', 'count', 'page_count', 'all_rows_query');
        if ($listall_query) {
            $meta['listall_query'] = $qry_all;
        }
        return $meta;
    }

    private function getDateRange($timeframe) {
        $d = strtotime(date('Y-m-d 00:00:00'));
        switch ($timeframe) {
            case 'current_week':
                $period = array('start' => $d - (60 * 60 * 24 * 7 * 1), 'end' => $d);
                break;
            case 'past_week':
                $period = array('start' => $d - (60 * 60 * 24 * 7 * 2), 'end' => $d - (60 * 60 * 24 * 7 * 1));
                break;
            case 'current_month':
                $period = array('start' => $d - (60 * 60 * 24 * 30 * 1), 'end' => $d);
                break;
            case 'past_month':
                $period = array('start' => $d - (60 * 60 * 24 * 30 * 2), 'end' => $d - (60 * 60 * 24 * 30 * 1));
                break;
            default:
                $period = false;
                break;
        }
        return $period;
    }

    private function getDonationFlowQuery($q, $params, $q_parts) {
        $dntq = '(SELECT ROUND(IFNULL(SUM(d.amount), 0)) FROM `donation` d ';
        $dnrq = '(SELECT IFNULL(COUNT(DISTINCT d.donor_id), 0) FROM `donation` d ';
        $donated_q = $dntq . $q_parts['d_q'];
        $donated_donor_q = $dnrq . $q_parts['d_q'];
        $received_q = $dntq . $q_parts['r_q'];
        $received_donor_q = $dnrq . $q_parts['r_q'];
        if (@$params['start'] & @$params['end']) {
            $st = strtotime($params['start'] . ' 00:00:00');
            $et = strtotime($params['end'] . ' 23:59:59');
            $timestamp_q = ' AND UNIX_TIMESTAMP(d.timestamp) <=' . $et . ' AND UNIX_TIMESTAMP(d.timestamp) >=' . $st;
            $donated_q .= $timestamp_q;
            $donated_donor_q .= $timestamp_q;
            $received_q .= $timestamp_q;
            $received_donor_q .= $timestamp_q;
        }
        $q->select($donated_q . ') AS donated', false);
        $q->select($donated_donor_q . ') AS donated_donor', false);
        $q->select($received_q . ') AS received', false);
        $q->select($received_donor_q . ') AS received_donor', false);
        return $q;
    }

}
