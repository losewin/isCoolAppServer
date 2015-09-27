<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

/**
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Phil Sturgeon, Chris Kacerguis
 * @license         MIT
 * @link            https://github.com/chriskacerguis/codeigniter-restserver
 */
class Users extends REST_Controller {

    public function __construct () {
        parent::__construct();

        $this->load->model('user_model');
    }

    public function q_get () {

        $this->response($this->user_model->get(), REST_Controller::HTTP_OK);
    }

    public function find_get ($id) {
        $this->response($this->user_model->get_id($id), REST_Controller::HTTP_OK);
    }

    public function q_post () {
        $this->set_response($this->user_model->post($this->post())
            , REST_Controller::HTTP_CREATED);
    }

    public function q_put ( $id ) {

        $this->set_response($this->put()
            , REST_Controller::HTTP_OK);
    }

    public function q_delete ( $id ) {
        print_r($id);
        print_r($this->delete());
    }

    public function q_options () {
        die();
    }

}
