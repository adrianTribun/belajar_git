<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once(dirname(__FILE__) . "\../MasterController.php");

class Dev extends MasterController
{

    function __construct()
    {
        parent::__construct();
        $this->user = 'dev';
        $this->password = 'dev123';
    }

    public function index()
    {
        echo "<h2>File get content</h2>";
        $this->file_get("https://dev-api.tribunjualbeli.com/subcategory/list/1");

        echo "<h2>CURL</h2>";
        $this->curl_get("https://dev-api.tribunjualbeli.com/subcategory/list/1");
    }

    function set_header()
    {
        $headers = array(
            'Accept: application/json',
            'Content-Type: application/json',
            'Authorization: Basic ' . base64_encode("$this->user:$this->password"),            
            "Api-Key : 5N6P8R9SAUCVDWFYGZH3K4M5P7"
        );

        return $headers;
    }

    function file_get($url)
    {
        $headers = stream_context_create(array(
            'http' => array(
                'header' => $this->set_header()
            )
        ));

        $response = file_get_contents($url, false, $headers);
        $data = json_decode($response, true);

        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }

    function curl_get($url)
    {
        $headers = $this->set_header();

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERPWD, $this->user . ':' . $this->password);

        $response = curl_exec($ch);
        
        curl_close($ch); 

        $data = json_decode($response, true);

        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }
}
