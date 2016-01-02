<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Soal extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Soal_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $soal = $this->Soal_model->get_all();

        $data = array(
            'soal_data' => $soal
        );

        $this->template->load('template','m_soal_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Soal_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'id_guru' => $row->id_guru,
		'id_mapel' => $row->id_mapel,
		'bobot' => $row->bobot,
		'gambar' => $row->gambar,
		'soal' => $row->soal,
		'opsi_a' => $row->opsi_a,
		'opsi_b' => $row->opsi_b,
		'opsi_c' => $row->opsi_c,
		'opsi_d' => $row->opsi_d,
		'opsi_e' => $row->opsi_e,
		'jawaban' => $row->jawaban,
		'tgl_input' => $row->tgl_input,
	    );
            $this->template->load('template','m_soal_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('soal'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('soal/create_action'),
	    'id' => set_value('id'),
	    'id_guru' => set_value('id_guru'),
	    'id_mapel' => set_value('id_mapel'),
	    'bobot' => set_value('bobot'),
	    'gambar' => set_value('gambar'),
	    'soal' => set_value('soal'),
	    'opsi_a' => set_value('opsi_a'),
	    'opsi_b' => set_value('opsi_b'),
	    'opsi_c' => set_value('opsi_c'),
	    'opsi_d' => set_value('opsi_d'),
	    'opsi_e' => set_value('opsi_e'),
	    'jawaban' => set_value('jawaban'),
	    'tgl_input' => set_value('tgl_input'),
	);
        $this->template->load('template','m_soal_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_guru' => $this->input->post('id_guru',TRUE),
		'id_mapel' => $this->input->post('id_mapel',TRUE),
		'bobot' => $this->input->post('bobot',TRUE),
		'gambar' => $this->input->post('gambar',TRUE),
		'soal' => $this->input->post('soal',TRUE),
		'opsi_a' => $this->input->post('opsi_a',TRUE),
		'opsi_b' => $this->input->post('opsi_b',TRUE),
		'opsi_c' => $this->input->post('opsi_c',TRUE),
		'opsi_d' => $this->input->post('opsi_d',TRUE),
		'opsi_e' => $this->input->post('opsi_e',TRUE),
		'jawaban' => $this->input->post('jawaban',TRUE),
		'tgl_input' => $this->input->post('tgl_input',TRUE),
	    );

            $this->Soal_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('soal'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Soal_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('soal/update_action'),
		'id' => set_value('id', $row->id),
		'id_guru' => set_value('id_guru', $row->id_guru),
		'id_mapel' => set_value('id_mapel', $row->id_mapel),
		'bobot' => set_value('bobot', $row->bobot),
		'gambar' => set_value('gambar', $row->gambar),
		'soal' => set_value('soal', $row->soal),
		'opsi_a' => set_value('opsi_a', $row->opsi_a),
		'opsi_b' => set_value('opsi_b', $row->opsi_b),
		'opsi_c' => set_value('opsi_c', $row->opsi_c),
		'opsi_d' => set_value('opsi_d', $row->opsi_d),
		'opsi_e' => set_value('opsi_e', $row->opsi_e),
		'jawaban' => set_value('jawaban', $row->jawaban),
		'tgl_input' => set_value('tgl_input', $row->tgl_input),
	    );
            $this->template->load('template','m_soal_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('soal'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'id_guru' => $this->input->post('id_guru',TRUE),
		'id_mapel' => $this->input->post('id_mapel',TRUE),
		'bobot' => $this->input->post('bobot',TRUE),
		'gambar' => $this->input->post('gambar',TRUE),
		'soal' => $this->input->post('soal',TRUE),
		'opsi_a' => $this->input->post('opsi_a',TRUE),
		'opsi_b' => $this->input->post('opsi_b',TRUE),
		'opsi_c' => $this->input->post('opsi_c',TRUE),
		'opsi_d' => $this->input->post('opsi_d',TRUE),
		'opsi_e' => $this->input->post('opsi_e',TRUE),
		'jawaban' => $this->input->post('jawaban',TRUE),
		'tgl_input' => $this->input->post('tgl_input',TRUE),
	    );

            $this->Soal_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('soal'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Soal_model->get_by_id($id);

        if ($row) {
            $this->Soal_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('soal'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('soal'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_guru', 'id guru', 'trim|required');
	$this->form_validation->set_rules('id_mapel', 'id mapel', 'trim|required');
	$this->form_validation->set_rules('bobot', 'bobot', 'trim|required');
	$this->form_validation->set_rules('gambar', 'gambar', 'trim|required');
	$this->form_validation->set_rules('soal', 'soal', 'trim|required');
	$this->form_validation->set_rules('opsi_a', 'opsi a', 'trim|required');
	$this->form_validation->set_rules('opsi_b', 'opsi b', 'trim|required');
	$this->form_validation->set_rules('opsi_c', 'opsi c', 'trim|required');
	$this->form_validation->set_rules('opsi_d', 'opsi d', 'trim|required');
	$this->form_validation->set_rules('opsi_e', 'opsi e', 'trim|required');
	$this->form_validation->set_rules('jawaban', 'jawaban', 'trim|required');
	$this->form_validation->set_rules('tgl_input', 'tgl input', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "m_soal.xls";
        $judul = "m_soal";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Guru");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Mapel");
	xlsWriteLabel($tablehead, $kolomhead++, "Bobot");
	xlsWriteLabel($tablehead, $kolomhead++, "Gambar");
	xlsWriteLabel($tablehead, $kolomhead++, "Soal");
	xlsWriteLabel($tablehead, $kolomhead++, "Opsi A");
	xlsWriteLabel($tablehead, $kolomhead++, "Opsi B");
	xlsWriteLabel($tablehead, $kolomhead++, "Opsi C");
	xlsWriteLabel($tablehead, $kolomhead++, "Opsi D");
	xlsWriteLabel($tablehead, $kolomhead++, "Opsi E");
	xlsWriteLabel($tablehead, $kolomhead++, "Jawaban");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Input");

	foreach ($this->Soal_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_guru);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_mapel);
	    xlsWriteNumber($tablebody, $kolombody++, $data->bobot);
	    xlsWriteLabel($tablebody, $kolombody++, $data->gambar);
	    xlsWriteLabel($tablebody, $kolombody++, $data->soal);
	    xlsWriteLabel($tablebody, $kolombody++, $data->opsi_a);
	    xlsWriteLabel($tablebody, $kolombody++, $data->opsi_b);
	    xlsWriteLabel($tablebody, $kolombody++, $data->opsi_c);
	    xlsWriteLabel($tablebody, $kolombody++, $data->opsi_d);
	    xlsWriteLabel($tablebody, $kolombody++, $data->opsi_e);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jawaban);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_input);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=m_soal.doc");

        $data = array(
            'm_soal_data' => $this->Soal_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('m_soal_doc',$data);
    }

}

/* End of file Soal.php */
/* Location: ./application/controllers/Soal.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-01-01 09:32:12 */
/* http://harviacode.com */