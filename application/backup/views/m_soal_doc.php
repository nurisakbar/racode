<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>M_soal List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Guru</th>
		<th>Id Mapel</th>
		<th>Bobot</th>
		<th>Gambar</th>
		<th>Soal</th>
		<th>Opsi A</th>
		<th>Opsi B</th>
		<th>Opsi C</th>
		<th>Opsi D</th>
		<th>Opsi E</th>
		<th>Jawaban</th>
		<th>Tgl Input</th>
		
            </tr><?php
            foreach ($soal_data as $soal)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $soal->id_guru ?></td>
		      <td><?php echo $soal->id_mapel ?></td>
		      <td><?php echo $soal->bobot ?></td>
		      <td><?php echo $soal->gambar ?></td>
		      <td><?php echo $soal->soal ?></td>
		      <td><?php echo $soal->opsi_a ?></td>
		      <td><?php echo $soal->opsi_b ?></td>
		      <td><?php echo $soal->opsi_c ?></td>
		      <td><?php echo $soal->opsi_d ?></td>
		      <td><?php echo $soal->opsi_e ?></td>
		      <td><?php echo $soal->jawaban ?></td>
		      <td><?php echo $soal->tgl_input ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>