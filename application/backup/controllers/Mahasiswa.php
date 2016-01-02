<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mahasiswa_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $mahasiswa = $this->Mahasiswa_model->get_all();

        $data = array(
            'mahasiswa_data' => $mahasiswa
        );

        $this->template->load('template','mahasiswa_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Mahasiswa_model->get_by_id($id);
        if ($row) {
            $data = array(
		'nim' => $row->nim,
		'nama' => $row->nama,
		'jenis_kelamin' => $row->jenis_kelamin,
		'id_agama' => $row->id_agama,
		'hoby' => $row->hoby,
		'alamat' => $row->alamat,
		'tanggal_lahir' => $row->tanggal_lahir,
	    );
            $this->template->load('template','mahasiswa_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mahasiswa'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('mahasiswa/create_action'),
	    'nim' => set_value('nim'),
	    'nama' => set_value('nama'),
	    'jenis_kelamin' => set_value('jenis_kelamin'),
	    'id_agama' => set_value('id_agama'),
	    'hoby' => set_value('hoby'),
	    'alamat' => set_value('alamat'),
	    'tanggal_lahir' => set_value('tanggal_lahir'),
	);
        $this->template->load('template','mahasiswa_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama' => $this->input->post('nama',TRUE),
		'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
		'id_agama' => $this->input->post('id_agama',TRUE),
		'hoby' => $this->input->post('hoby',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
	    );

            $this->Mahasiswa_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('mahasiswa'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Mahasiswa_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('mahasiswa/update_action'),
		'nim' => set_value('nim', $row->nim),
		'nama' => set_value('nama', $row->nama),
		'jenis_kelamin' => set_value('jenis_kelamin', $row->jenis_kelamin),
		'id_agama' => set_value('id_agama', $row->id_agama),
		'hoby' => set_value('hoby', $row->hoby),
		'alamat' => set_value('alamat', $row->alamat),
		'tanggal_lahir' => set_value('tanggal_lahir', $row->tanggal_lahir),
	    );
            $this->template->load('template','mahasiswa_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mahasiswa'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('nim', TRUE));
        } else {
            $data = array(
		'nama' => $this->input->post('nama',TRUE),
		'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
		'id_agama' => $this->input->post('id_agama',TRUE),
		'hoby' => $this->input->post('hoby',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
	    );

            $this->Mahasiswa_model->update($this->input->post('nim', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('mahasiswa'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Mahasiswa_model->get_by_id($id);

        if ($row) {
            $this->Mahasiswa_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('mahasiswa'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mahasiswa'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'trim|required');
	$this->form_validation->set_rules('id_agama', 'id agama', 'trim|required');
	$this->form_validation->set_rules('hoby', 'hoby', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('tanggal_lahir', 'tanggal lahir', 'trim|required');

	$this->form_validation->set_rules('nim', 'nim', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "mahasiswa.xls";
        $judul = "mahasiswa";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Jenis Kelamin");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Agama");
	xlsWriteLabel($tablehead, $kolomhead++, "Hoby");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Lahir");

	foreach ($this->Mahasiswa_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jenis_kelamin);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_agama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->hoby);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_lahir);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=mahasiswa.doc");

        $data = array(
            'mahasiswa_data' => $this->Mahasiswa_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('mahasiswa_doc',$data);
    }

}

/* End of file Mahasiswa.php */
/* Location: ./application/controllers/Mahasiswa.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2015-12-31 11:22:51 */
/* http://harviacode.com */