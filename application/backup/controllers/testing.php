<?php
class testing extends CI_Controller{
    
    
    function index(){
        echo cmb_dinamis('guru','m_guru','nama','id', 4);
    }
}