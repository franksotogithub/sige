<?php

class Login extends CI_Controller {

    function __construct() {

        parent::__construct();
        $this->load->helper(array('form'));
        $this->load->model('login_model');
    }

    function index() {


        $data2['ip'] = "";

        $val = "";
        $rs = "";
//        if (!isset($_POST['txtUsuario'])) {
//            $this->load->view('funcion_ip');
//            $this->load->view('login_view');
//        } else {
//        ip:192.168.203.11
//txtUsuario:invitado2
//txtPassword:invitado2011

        $rs = $this->login_model->login('invitado2', 'invitado2011', '192.168.203.11');
        foreach ($rs as $row) {
            $val = $row->login_sige;
        }

//            if ($val == "") {
//                //    $data2['page_alerta'] ="Verifique su Usuario y Password";
//                $this->load->view('funcion_ip');
//                $this->load->view('login_view');
//            } else {

        $data = array(
            'username' => 'invitado2',
            'logged_in' => TRUE,
            'id_session' => $val
        );
        $this->session->set_userdata($data);
        $data2['ip'] = '192.168.203.11';
        $this->load->view('begin', $data2);
//            }
//        }
        //$this->load->view('login_view');
    }

    public function cerrar_session() {
        $this->session->sess_destroy();
        $this->load->view('funcion_ip');
        $this->load->view('cerrar_view');
    }

}

?>
