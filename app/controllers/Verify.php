<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Verify extends CI_Controller
{
    function __construct() {
        parent::__construct();
    }

    function index() {
    	$shop_status = $this->db->get('subscription')->row()->shop_status;

        if($shop_status == 1)
            redirect('/');
        else
        	$this->load->view('error');
    }
}