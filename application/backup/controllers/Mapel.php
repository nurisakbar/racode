<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mapel extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mapel_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $mapel = $this->Mapel_model->get_all();

        $data = array(
            'mapel_data' => $mapel
        );

        $this->template->load('template','m_mapel_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Mapel_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'nama' => $row->nama,
	    );
            $this->template->load('template','m_mapel_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mapel'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('mapel/create_action'),
	    'id' => set_value('id'),
	    'nama' => set_value('nama'),
	);
        $this->template->load('template','m_mapel_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama' => $this->input->post('nama',TRUE),
	    );

            $this->Mapel_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('mapel'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Mapel_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('mapel/update_action'),
		'id' => set_value('id', $row->id),
		'nama' => set_value('nama', $row->nama),
	    );
            $this->template->load('template','m_mapel_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mapel'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'nama' => $this->input->post('nama',TRUE),
	    );

            $this->Mapel_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('mapel'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Mapel_model->get_by_id($id);

        if ($row) {
            $this->Mapel_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('mapel'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mapel'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "m_mapel.xls";
        $judul = "m_mapel";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama");

	foreach ($this->Mapel_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=m_mapel.doc");

        $data = array(
            'm_mapel_data' => $this->Mapel_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('m_mapel_doc',$data);
    }

}

/* End of file Mapel.php */
/* Location: ./application/controllers/Mapel.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-01-01 09:30:46 */
/* http://harviacode.com */