<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>MAHASISWA</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>Nama <?php echo form_error('nama') ?></td>
            <td><input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
        </td>
	    <tr><td>Jenis Kelamin <?php echo form_error('jenis_kelamin') ?></td>
            <td><input type="text" class="form-control" name="jenis_kelamin" id="jenis_kelamin" placeholder="Jenis Kelamin" value="<?php echo $jenis_kelamin; ?>" />
        </td>
	    <tr><td>Id Agama <?php echo form_error('id_agama') ?></td>
            <td>
                <?php
                echo cmb_dinamis('id_agama', 'agama', 'nama_agama', 'id_agama', $id_agama)
                ?>

        </td>
	    <tr><td>Hoby <?php echo form_error('hoby') ?></td>
            <td><input type="text" class="form-control" name="hoby" id="hoby" placeholder="Hoby" value="<?php echo $hoby; ?>" />
        </td>
	    <tr><td>Alamat <?php echo form_error('alamat') ?></td>
            <td><textarea class="form-control" rows="3" name="alamat" id="alamat" placeholder="Alamat"><?php echo $alamat; ?></textarea>
        </td></tr>
	    <tr><td>Tanggal Lahir <?php echo form_error('tanggal_lahir') ?></td>
            <td><input type="text" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir" value="<?php echo $tanggal_lahir; ?>" />
        </td>
	    <input type="hidden" name="nim" value="<?php echo $nim; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('mahasiswa') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->