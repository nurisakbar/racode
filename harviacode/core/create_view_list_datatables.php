<?php 
$string = "";
$string .= "
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>".  strtoupper($table_name)." LIST <?php echo anchor('".$c_url."/create/','Create',array('class'=>'btn btn-danger btn-sm'));?>";
if ($export_excel == '1') {
    $string .= "\n\t\t<?php echo anchor(site_url('".$c_url."/excel'), ' <i class=\"fa fa-file-excel-o\"></i> Excel', 'class=\"btn btn-primary btn-sm\"'); ?>";
}
if ($export_word == '1') {
    $string .= "\n\t\t<?php echo anchor(site_url('".$c_url."/word'), '<i class=\"fa fa-file-word-o\"></i> Word', 'class=\"btn btn-primary btn-sm\"'); ?>";
}
$export_pdf=1;
if ($export_pdf == '1') {
    $string .= "\n\t\t<?php echo anchor(site_url('".$c_url."/pdf'), '<i class=\"fa fa-file-pdf-o\"></i> PDF', 'class=\"btn btn-primary btn-sm\"'); ?>";
}
$string .= "</h3>
                </div><!-- /.box-header -->
                <div class='box-body'>
        <table class=\"table table-bordered table-striped\" id=\"mytable\">
            <thead>
                <tr>
                    <th width=\"80px\">No</th>";
foreach ($non_pk as $row) {
    $string .= "\n\t\t    <th>" . label($row['column_name']) . "</th>";
}
$string .= "\n\t\t    <th>Action</th>
                </tr>
            </thead>";
$string .= "\n\t    <tbody>
            <?php
            \$start = 0;
            foreach ($" . $c_url . "_data as \$$c_url)
            {
                ?>
                <tr>";

$string .= "\n\t\t    <td><?php echo ++\$start ?></td>";

foreach ($non_pk as $row) {
    $string .= "\n\t\t    <td><?php echo $" . $c_url ."->". $row['column_name'] . " ?></td>";
}

$string .= "\n\t\t    <td style=\"text-align:center\" width=\"140px\">"
        . "\n\t\t\t<?php "
        . "\n\t\t\techo anchor(site_url('".$c_url."/read/'.$".$c_url."->".$pk."),'<i class=\"fa fa-eye\"></i>',array('title'=>'detail','class'=>'btn btn-danger btn-sm')); "
        . "\n\t\t\techo '  '; "
        . "\n\t\t\techo anchor(site_url('".$c_url."/update/'.$".$c_url."->".$pk."),'<i class=\"fa fa-pencil-square-o\"></i>',array('title'=>'edit','class'=>'btn btn-danger btn-sm')); "
        . "\n\t\t\techo '  '; "
        . "\n\t\t\techo anchor(site_url('".$c_url."/delete/'.$".$c_url."->".$pk."),'<i class=\"fa fa-trash-o\"></i>','title=\"delete\" class=\"btn btn-danger btn-sm\" onclick=\"javasciprt: return confirm(\\'Are You Sure ?\\')\"'); "
        . "\n\t\t\t?>"
        . "\n\t\t    </td>";

$string .=  "\n\t        </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <script src=\"<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>\"></script>
        <script src=\"<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>\"></script>
        <script src=\"<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>\"></script>
        <script type=\"text/javascript\">
            $(document).ready(function () {
                $(\"#mytable\").dataTable();
            });
        </script>
                    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->";


$hasil_view_list = createFile($string, $target."views/" . $v_list_file);

?>