<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Coba extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Coba_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $coba = $this->Coba_model->get_all();

        $data = array(
            'coba_data' => $coba
        );

        $this->template->load('template','coba_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Coba_model->get_by_id($id);
        if ($row) {
            $data = array(
		'dsdsd' => $row->dsdsd,
		'sdsdsd' => $row->sdsdsd,
	    );
            $this->template->load('template','coba_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('coba'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('coba/create_action'),
	    'dsdsd' => set_value('dsdsd'),
	    'sdsdsd' => set_value('sdsdsd'),
	);
        $this->template->load('template','coba_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'sdsdsd' => $this->input->post('sdsdsd',TRUE),
	    );

            $this->Coba_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('coba'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Coba_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('coba/update_action'),
		'dsdsd' => set_value('dsdsd', $row->dsdsd),
		'sdsdsd' => set_value('sdsdsd', $row->sdsdsd),
	    );
            $this->template->load('template','coba_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('coba'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('dsdsd', TRUE));
        } else {
            $data = array(
		'sdsdsd' => $this->input->post('sdsdsd',TRUE),
	    );

            $this->Coba_model->update($this->input->post('dsdsd', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('coba'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Coba_model->get_by_id($id);

        if ($row) {
            $this->Coba_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('coba'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('coba'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('sdsdsd', 'sdsdsd', 'trim|required');

	$this->form_validation->set_rules('dsdsd', 'dsdsd', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "coba.xls";
        $judul = "coba";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Sdsdsd");

	foreach ($this->Coba_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->sdsdsd);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=coba.doc");

        $data = array(
            'coba_data' => $this->Coba_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('coba_doc',$data);
    }

}

/* End of file Coba.php */
/* Location: ./application/controllers/Coba.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2015-12-31 09:03:32 */
/* http://harviacode.com */