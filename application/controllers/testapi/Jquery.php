<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once(dirname(__FILE__) . "\../MasterController.php");

class Jquery extends MasterController
{

    function __construct()
    {
        parent::__construct();

    }

    public function index()
    {
        $data = array();

        $this->load->view('testapi/jquery', $data);
    }

}
