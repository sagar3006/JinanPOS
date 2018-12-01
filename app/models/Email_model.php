<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email_model extends CI_Model {

    // constructor
    function __construct()
    {
        parent::__construct();
        //$this->load->database();
        //$this->load->library('session');
        $this->load->library('email');
    }

    // email sender
    function do_email($msg=NULL, $sub=NULL, $to=NULL, $from=NULL, $attachment_url=NULL) {
        echo '<br>' . $msg . '--' . $sub . '--' . $to;
        // set configurations
        $config = array(
            'useragent' => 'CodeIgniter',
            'protocol'  => 'mail',
            'mailtype'  => 'html',
            'charset'   => 'utf-8'
        );

        // initialize email library
        $this->email->initialize($config);
        $this->email->set_newline("\r\n");

        $this->email->from($from, 'Jinan IT');
        $this->email->to($to);
        $this->email->subject($sub);
        $this->email->message($msg);
        $this->email->send();
        // echo $this->email->print_debugger();
    }
}