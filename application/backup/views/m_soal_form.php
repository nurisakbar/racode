<!-- Main content -->
<section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
            <div class='box'>
                <div class='box-header'>

                    <h3 class='box-title'>M_SOAL</h3>
                   
                        <form action="<?php echo $action; ?>" method="post">
                            <div class="col-lg-6">
                                 <div class='box box-primary'>
                                     <table class='table table-bordered'>
                                    <tr><td>Guru <?php echo form_error('id_guru') ?></td>
                                        <td>
                                            <?php echo cmb_dinamis('id_guru', 'm_guru', 'nama', 'id', $id_guru); ?>

                                        </td>
                                    <tr><td>Mapel <?php echo form_error('id_mapel') ?></td>
                                        <td>
                                            <?php echo cmb_dinamis('id_mapel', 'm_mapel', 'nama', 'id', $id_mapel); ?>

                                        </td>
                                    <tr><td>Bobot <?php echo form_error('bobot') ?></td>
                                        <td><input type="text" class="form-control" name="bobot" id="bobot" placeholder="Bobot" value="<?php echo $bobot; ?>" />
                                        </td>
                                    <tr><td>Gambar <?php echo form_error('gambar') ?></td>
                                        <td><input type="file" class="form-control" name="userfile" id="gambar" placeholder="Gambar" value="<?php echo $gambar; ?>" />
                                        </td>

                                    <tr><td>Tgl Input <?php echo form_error('tgl_input') ?></td>
                                        <td><input type="date" class="form-control" name="tgl_input" id="tgl_input" placeholder="Tgl Input" value="<?php echo $tgl_input; ?>" />
                                        </td>
                                    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                                    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                                            <a href="<?php echo site_url('soal') ?>" class="btn btn-default">Cancel</a></td></tr>

                                     </table></div></div>
                            <div class="col-lg-6">
                                 <div class='box box-primary'>
                                <table class="table table-bordered">
                                    <tr><td>Soal <?php echo form_error('soal') ?></td>
                                        <td>
                                            <textarea name="soal" class="form-control"><?php echo $soal; ?></textarea>
                                            
                                        </td>
                                    <tr><td>Opsi A <?php echo form_error('opsi_a') ?></td>
                                        <td><input type="text" class="form-control" name="opsi_a" id="opsi_a" placeholder="Opsi A" value="<?php echo $opsi_a; ?>" />
                                        </td>
                                    <tr><td>Opsi B <?php echo form_error('opsi_b') ?></td>
                                        <td><input type="text" class="form-control" name="opsi_b" id="opsi_b" placeholder="Opsi B" value="<?php echo $opsi_b; ?>" />
                                        </td>
                                    <tr><td>Opsi C <?php echo form_error('opsi_c') ?></td>
                                        <td><input type="text" class="form-control" name="opsi_c" id="opsi_c" placeholder="Opsi C" value="<?php echo $opsi_c; ?>" />
                                        </td>
                                    <tr><td>Opsi D <?php echo form_error('opsi_d') ?></td>
                                        <td><input type="text" class="form-control" name="opsi_d" id="opsi_d" placeholder="Opsi D" value="<?php echo $opsi_d; ?>" />
                                        </td>
                                    <tr><td>Opsi E <?php echo form_error('opsi_e') ?></td>
                                        <td><input type="text" class="form-control" name="opsi_e" id="opsi_e" placeholder="Opsi E" value="<?php echo $opsi_e; ?>" />
                                        </td>
                                    <tr><td>Jawaban <?php echo form_error('jawaban') ?></td>
                                        <td>
                                            <?php
                                            echo form_dropdown('jawaban', array('A' => 'A', 'B' => 'B', 'C' => 'C', 'D' => 'D', 'E' => 'E'), $jawaban, "class='form-control'");
                                            ?>

                                        </td>
                                </table>
                                 </div></div>
                        </form>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
</section><!-- /.content -->