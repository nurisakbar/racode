<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>M_SISWA</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>Nama <?php echo form_error('nama') ?></td>
            <td><input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
        </td>
	    <tr><td>Nim <?php echo form_error('nim') ?></td>
            <td><input type="text" class="form-control" name="nim" id="nim" placeholder="Nim" value="<?php echo $nim; ?>" />
        </td>
	    <tr><td>Jurusan <?php  echo form_error('jurusan') ?></td>
            <td>
                <select name="jurusan" class="form-control">
                    <?php
                    $jurusan = $this->db->get('m_jurusan');
                    foreach ($jurusan->result() as $j){
                        echo "<option value='$j->jurusan'";
                        echo $j->jurusan==$jurusan?"selected='selected'":"";
                        echo">".  strtoupper($j->jurusan)."</option>";
                    }
                    ?>
                </select>
                
        </td>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('siswa') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->