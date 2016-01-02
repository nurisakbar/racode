
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>MENU LIST <?php echo anchor('menu/create/','Create',array('class'=>'btn btn-danger btn-sm'));?>
		<?php echo anchor(site_url('menu/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('menu/word'), '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('menu/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-primary btn-sm"'); ?></h3>
                </div><!-- /.box-header -->
                <div class='box-body'>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="10px">No</th>
		    <th>Nama Menu</th>
		    <th>Link</th>
		    <th width="30">Icon</th>
		    <th>Aktif</th>
		    <th>Parent</th>
		    <th></th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($menu_data as $menu)
            {
                $active = $menu->is_active==1?'AKTIF':'TIDAK AKTIF';
                $parent = $menu->is_parent>1?'MAINMENU':'SUBMENU'
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $menu->name ?></td>
		    <td><?php echo $menu->link ?></td>
		    <td><i class='<?php echo $menu->icon ?>'></i></td>
		    <td><?php echo $active ?></td>
		    <td><?php echo $parent ?></td>
		    <td style="text-align:center" width="140px">
			<?php 
			echo anchor(site_url('menu/read/'.$menu->id),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-danger btn-sm')); 
			echo '  '; 
			echo anchor(site_url('menu/update/'.$menu->id),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-danger btn-sm')); 
			echo '  '; 
			echo anchor(site_url('menu/delete/'.$menu->id),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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