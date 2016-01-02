<!-- Main content -->
<section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
            <div class='box'>
                <div class='box-header'>

                    <h3 class='box-title'>TR_GURU_MAPEL</h3>
                    <div class='box box-primary'>
                        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
                                <tr><td>Id Guru <?php echo form_error('id_guru') ?></td>
                                    <td>
                                        <select name="id_guru" class="form-control">
                                            <?php
                                            $guru = $this->db->get('m_guru');
                                            foreach ($guru->result() as $j) {
                                                echo "<option value='$j->id'";
                                                echo $j->id == $id_guru ? "selected='selected'" : "";
                                                echo">" . strtoupper($j->nama) . "</option>";
                                            }
                                            ?>
                                        </select>

                                        <!--<input type="text" class="form-control" name="id_guru" id="id_guru" placeholder="Id Guru" value="<?php echo $id_guru; ?>" />-->
                                    </td>
                                <tr><td>Id Mapel <?php echo form_error('id_mapel') ?></td>
                                    <td>
                                        <select name="id_mapel" class="form-control">
                                            <?php
                                            $mapel = $this->db->get('m_mapel');
                                            foreach ($mapel->result() as $j) {
                                                echo "<option value='$j->id'";
                                                echo $j->id == $id_mapel ? "selected='selected'" : "";
                                                echo">" . strtoupper($j->nama) . "</option>";
                                            }
                                            ?>
                                        </select>
                                        <!--<input type="text" class="form-control" name="id_mapel" id="id_mapel" placeholder="Id Mapel" value="<?php echo $id_mapel; ?>" />-->
                                    </td>
                                <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                                <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                                        <a href="<?php echo site_url('pengajar') ?>" class="btn btn-default">Cancel</a></td></tr>

                            </table></form>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
</section><!-- /.content -->