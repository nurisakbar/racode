
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>M_SOAL LIST <?php echo anchor('soal/create/','Create',array('class'=>'btn btn-danger btn-sm'));?>
		<?php echo anchor(site_url('soal/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('soal/word'), '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('soal/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-primary btn-sm"'); ?></h3>
                </div><!-- /.box-header -->
                <div class='box-body'>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
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
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
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
		    <td style="text-align:center" width="140px">
			<?php 
			echo anchor(site_url('soal/read/'.$soal->id),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-danger btn-sm')); 
			echo '  '; 
			echo anchor(site_url('soal/update/'.$soal->id),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-danger btn-sm')); 
			echo '  '; 
			echo anchor(site_url('soal/delete/'.$soal->id),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
			?>
		    </td>
	        </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#mytable").dataTable();
            });
        </script>
                    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->