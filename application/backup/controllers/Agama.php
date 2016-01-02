<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Agama extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Agama_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $agama = $this->Agama_model->get_all();

        $data = array(
            'agama_data' => $agama
        );

        $this->template->load('template','agama_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Agama_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_agama' => $row->id_agama,
		'nama_agama' => $row->nama_agama,
	    );
            $this->template->load('template','agama_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('agama'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('agama/create_action'),
	    'id_agama' => set_value('id_agama'),
	    'nama_agama' => set_value('nama_agama'),
	);
        $this->template->load('template','agama_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_agama' => $this->input->post('nama_agama',TRUE),
	    );

            $this->Agama_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('agama'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Agama_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('agama/update_action'),
		'id_agama' => set_value('id_agama', $row->id_agama),
		'nama_agama' => set_value('nama_agama', $row->nama_agama),
	    );
            $this->template->load('template','agama_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('agama'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_agama', TRUE));
        } else {
            $data = array(
		'nama_agama' => $this->input->post('nama_agama',TRUE),
	    );

            $this->Agama_model->update($this->input->post('id_agama', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('agama'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Agama_model->get_by_id($id);

        if ($row) {
            $this->Agama_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('agama'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('agama'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_agama', 'nama agama', 'trim|required');

	$this->form_validation->set_rules('id_agama', 'id_agama', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "agama.xls";
        $judul = "agama";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Agama");

	foreach ($this->Agama_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_agama);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=agama.doc");

        $data = array(
            'agama_data' => $this->Agama_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('agama_doc',$data);
    }

}

/* End of file Agama.php */
/* Location: ./application/controllers/Agama.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2015-12-31 11:23:01 */
/* http://harviacode.com */