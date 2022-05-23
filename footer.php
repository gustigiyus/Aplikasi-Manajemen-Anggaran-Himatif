  </div>

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2020-2021 <a href="#">Awat & Gusti</a>.</strong> All rights
    reserved.
  </footer>

</div>

<!-- jQuery 3 -->
<script src="../assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="../assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- date-range-picker -->
<script src="../assets/bower_components/moment/min/moment.min.js"></script>
<script src="../assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- InputMask -->
<script src="../assets/plugins/input-mask/jquery.inputmask.js"></script>
<script src="../assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- iCheck -->
<script src="../assets/plugins/iCheck/icheck.min.js"></script>
<!-- bootstrap datepicker -->
<script src="../assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap color picker -->
<script src="../assets/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="../assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>


<!-- SlimScroll -->
<script src="../assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/dist/js/adminlte.min.js"></script>
<!-- DataTables -->
<script src="../assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="../assets/bower_components/buttons/js/buttons.print.min.js"></script>
<script src="../assets/bower_components/buttons/js/dataTables.buttons.min.js"></script>
<script src="../assets/bower_components/buttons/js/buttons.flash.min.js"></script>
<script src="../assets/bower_components/buttons/js/buttons.html5.min.js"></script>
<script src="../assets/bower_components/buttons/js/jszip.min.js"></script>
<script src="../assets/bower_components/buttons/js/pdfmake.min.js"></script>
<script src="../assets/bower_components/buttons/js/vfs_fonts.js"></script>


<!-- FITUR RINCIAN DANA -->

<script>

/* Fungsi mengubah nmominal javascript */
function number_format(amount, decimalCount = 2, decimal = ".", thousands = ",") {
  try {
    decimalCount = Math.abs(decimalCount);
    decimalCount = isNaN(decimalCount) ? 2 : decimalCount;

    const negativeSign = amount < 0 ? "-" : "";

    let i = parseInt(amount = Math.abs(Number(amount) || 0).toFixed(decimalCount)).toString();
    let j = (i.length > 3) ? i.length % 3 : 0;

    return negativeSign + (j ? i.substr(0, j) + thousands : '') + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thousands) + (decimalCount ? decimal + Math.abs(amount - i).toFixed(decimalCount).slice(2) : "");
  } catch (e) {
    console.log(e)
  }
};

/* Formatting function for row details - modify as you need */
function format ( d ) {
    // `d` is the original data object for the row
    return '<section class="invoice">'+
        '<div class="row">'+
            '<div class="col-xs-12">'+
              '<h2 class="page-header">'+
                '<i class="fa fa-fax"></i> Rincina Uraian Dana'+
                '<small class="pull-right">'+
                '</small>'+
              '</h2>'+
            '</div>'+
        '</div>'+

            '<div class="row">'+
              '<div class="col-xs-12 table-responsive">'+
                '<table class="table table-striped">'+
                  '<thead style="border-bottom: 2px solid red;">'+
                      '<tr>'+
                          '<th><center>#</center></th>'+
                          '<th style="size:100px;"><center>Jenis Pengeluaran</center></th>'+
                          '<th><center>Uraian Pengeluaran</center></th>'+
                          '<th><center>Total Dana</center></th>'+
                      '</tr>'+
                  '</thead>'+
                  '<tbody>'+
                      '<tr style="border-left: 2px solid #E6E6FA; border-right: 2px solid #E6E6FA; border-bottom: 2px solid #E6E6FA;">'+
                          '<td style="text-align: center; vertical-align: middle;">1.</td>'+
                          '<td style="text-align: center; vertical-align: middle;">Publikasi & Dokumentasi</td>'+
                          '<td style="text-align: center; vertical-align: middle;"><textarea class="form-control" rows="5" cols="70" disabled>'+d.UrPub+'</textarea></td>'+
                          '<td style="text-align: center; vertical-align: middle;">Rp. '+number_format(d.TotPub,"",",",".")+'</td>'+
                      '</tr>'+
                      '<tr style="border: 2px solid #dcdcdc;">'+
                          '<td style="text-align: center; vertical-align: middle;">2.</td>'+
                          '<td style="text-align: center; vertical-align: middle;">Transportasi</td>'+
                          '<td style="text-align: center; vertical-align: middle;"><textarea class="form-control" rows="5" cols="70" disabled>'+d.UrTran+'</textarea> </td>'+
                          '<td style="text-align: center; vertical-align: middle;">Rp. '+number_format(d.TotTran,"",",",".")+'</td>'+
                      '</tr>'+
                      '<tr style="border: 2px solid #E6E6FA;">'+
                          '<td style="text-align: center; vertical-align: middle;">3.</td>'+
                          '<td style="text-align: center; vertical-align: middle;">Medik</td>'+
                          '<td style="text-align: center; vertical-align: middle;"> <textarea class="form-control" rows="5" cols="70" disabled>'+d.UrMed+'</textarea></td>'+
                          '<td style="text-align: center; vertical-align: middle;">Rp. '+number_format(d.TotMed,"",",",".")+'</td>'+
                      '</tr>'+
                      '<tr style="border: 2px solid #dcdcdc;">'+
                          '<td style="text-align: center; vertical-align: middle;">4.</td>'+
                          '<td style="text-align: center; vertical-align: middle;">Konsumsi</td>'+
                          '<td style="text-align: center; vertical-align: middle;"><textarea class="form-control" rows="5" cols="70" disabled>'+d.UrKons+'</textarea> </td>'+
                          '<td style="text-align: center; vertical-align: middle;">Rp. '+number_format(d.TotKons,"",",",".")+'</td>'+
                      '</tr>'+
                      '<tr style="border-left: 2px solid #E6E6FA; border-right: 2px solid #E6E6FA; border-top: 2px solid #E6E6FA;">'+
                          '<td style="text-align: center; vertical-align: middle;">5.</td>'+
                          '<td style="text-align: center; vertical-align: middle;">Pengeluaran Lainnya</td>'+
                          '<td style="text-align: center; vertical-align: middle;"><textarea class="form-control" rows="5" cols="70" disabled>'+d.UrDll+'</textarea> </td>'+
                          '<td style="text-align: center; vertical-align: middle;">Rp. '+number_format(d.TotDll,"",",",".")+'</td>'+
                      '</tr>'+
                  '</tbody>'+
                  '<tfoot style="border-top: 2px solid black;">'+
                    '<tr>'+
                        '<th style="background-color: #E6E6FA;"><center>#</center></th>'+
                        '<th style="background-color: #E6E6FA;"><center>SUBTOTAL : </center></th>'+
                        '<th style="background-color: #E6E6FA;"></th>'+
                        '<th style="background-color: #E6E6FA;"><center>Rp. '+number_format(d.TotAll,"",",",".")+'</center></th>'+
                      '</tr>'+
                  '</tfoot>'+
                '</table>'+
              '</div>'+
            '</div>'+
      '</section>'
}
 
$(document).ready(function() {
    var table = $('#example').DataTable( {
        "ajax": "ajax.php",
        "columns": [
            {
              "className":      'details-control',
              "orderable":      false,
              "data":           null,
              "defaultContent": '',
              "render": function(){
                return '<i class="fa fa-plus-square" aria-hidden="tured" style="font-size: 19px; margin-top: 10px;"></i>'
              }
            },
            { "data": "ID" },
            { "data": "NmAkt" },
            { "data": "ThnAng" },
            { "data": "UrnAkt" },
            { "data": "JnsAng" },
            { "data": "Plks" },
            { "data": "Tmp" },
            { "data": "Sts" },
            { "data": "action" }

        ],
          columnDefs: [ 
          { className: 'text-center', targets: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9] }
        ],
        "order": [[1, 'asc']]
    } );

    // Add event listener for opening and closing details
    $('#example tbody').on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = table.row( tr );
 
        if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            // Open this row
            row.child( format(row.data()) ).show();
            tr.addClass('shown');
        }
    } );
});

    $('#num1, #num2, #num3, #num4, #num5').keyup(function(){
      var numb1 = $('#num1').val();
      var numb2 = $('#num2').val();
      var numb3 = $('#num3').val();
      var numb4 = $('#num4').val();
      var numb5 = $('#num5').val();
      var ttlhasil = parseInt(numb1) + parseInt(numb2) + parseInt(numb3) + parseInt(numb4) + parseInt(numb5);
      $('#numttl').val(ttlhasil.toFixed());
    });

</script>


<!-- FITUR PENYELESAIAN PERSETUJUAN ANGGARAN -->

<script>

/* Formatting function for row details - modify as you need */
function rincian_bukti ( s ) {
    // `d` is the original data object for the row
    return '<section class="invoice">'+
        '<div class="row">'+
            '<div class="col-xs-12">'+
              '<h2 class="page-header">'+
                '<i class="glyphicon glyphicon-picture"></i> Bukti & Nota Anggaran'+
                '<small class="pull-right">'+
                '</small>'+
              '</h2>'+
            '</div>'+
        '</div>'+

            '<div class="row">'+
              '<div class="col-xs-10 col-xs-offset-1 table-responsive">'+
                '<table class="table table-bordered table-hover">'+
                  '<thead style="border-bottom: 4px solid red; background-color: #E6E6FA;">'+
                      '<tr>'+
                          '<th style="text-align: center; vertical-align: middle;">No</th>'+
                          '<th style="text-align: center; vertical-align: middle;" width="60%">Bukti/Nota Anggaran</th>'+
                          '<th style="text-align: center; vertical-align: middle;"><i class="fa fa-cog"></i> Action</th>'+
                      '</tr>'+
                  '</thead>'+
                  '<tbody>'+
                      '<tr>'+
                          '<td style="text-align: center; vertical-align: middle; font-weight: bold;">1.</td>'+
                          '<td style="text-align: center; vertical-align: middle;">'+
                            '<span class="mailbox-attachment-icon has-img" style="font-size: 4em;">'+
                              '<img src="../gambar/'+s.nt1+'" alt="kosong">'+
                            '</span>'+
                            '<div class="mailbox-attachment-info">'+
                              '<a href="../gambar/'+s.nt1+'" class="mailbox-attachment-name">'+
                                '<i class="fa fa-camera"></i> '+s.nt1+
                              '</a>'+
                            '</div>'+
                          '</td>'+
                          '<td style="text-align: center; vertical-align: middle;">'+
                            '<span style="margin-bottom: 10px;" class="mailbox-attachment-size">'+
                              'Download Disini'+
                            '</span>'+
                            '<span class="mailbox-attachment-size">'+
                              '<a href="../gambar/'+s.nt1+'" download class="btn btn-danger btn-lg">'+
                              '<i class="fa fa-cloud-download"></i></a>'+
                            '</span>'+
                          '</td>'+
                      '</tr>'+
                      '<tr>'+
                          '<td style="text-align: center; vertical-align: middle; font-weight: bold;">2.</td>'+
                          '<td style="text-align: center; vertical-align: middle;">'+
                            '<span class="mailbox-attachment-icon has-img" style="font-size: 4em;">'+
                              '<img src="../gambar/'+s.nt2+'" alt="kosong">'+
                            '</span>'+
                            '<div class="mailbox-attachment-info">'+
                              '<a href="../gambar/'+s.nt2+'" class="mailbox-attachment-name">'+
                                '<i class="fa fa-camera"></i> '+s.nt2+
                              '</a>'+
                            '</div>'+
                          '</td>'+
                          '<td style="text-align: center; vertical-align: middle;">'+
                          '<span style="margin-bottom: 10px;" class="mailbox-attachment-size">'+
                              'Download Disini'+
                            '</span>'+
                            '<span class="mailbox-attachment-size">'+
                              '<a href="../gambar/'+s.nt2+'" download class="btn btn-danger btn-lg">'+
                              '<i class="fa fa-cloud-download"></i></a>'+
                            '</span>'+
                          '</td>'+
                      '</tr>'+
                      '<tr>'+
                          '<td style="text-align: center; vertical-align: middle; font-weight: bold;">3.</td>'+
                          '<td style="text-align: center; vertical-align: middle;">'+
                            '<span class="mailbox-attachment-icon has-img" style="font-size: 4em;">'+
                              '<img src="../gambar/'+s.nt3+'" alt="kosong">'+
                            '</span>'+
                            '<div class="mailbox-attachment-info">'+
                              '<a href="../gambar/'+s.nt3+'" class="mailbox-attachment-name">'+
                                '<i class="fa fa-camera"></i> '+s.nt3+
                              '</a>'+
                            '</div>'+
                          '</td>'+
                          '<td style="text-align: center; vertical-align: middle;">'+
                            '<span style="margin-bottom: 10px;" class="mailbox-attachment-size">'+
                              'Download Disini'+
                            '</span>'+
                            '<span class="mailbox-attachment-size">'+
                              '<a href="../gambar/'+s.nt3+'" download class="btn btn-danger btn-lg">'+
                              '<i class="fa fa-cloud-download"></i></a>'+
                            '</span>'+
                          '</td>'+
                      '</tr>'+
                      '<tr>'+
                          '<td style="text-align: center; vertical-align: middle; font-weight: bold;">4.</td>'+
                          '<td style="text-align: center; vertical-align: middle;">'+
                            '<span class="mailbox-attachment-icon has-img" style="font-size: 4em;">'+
                              '<img src="../gambar/'+s.nt4+'" alt="kosong">'+
                            '</span>'+
                            '<div class="mailbox-attachment-info">'+
                              '<a href="../gambar/'+s.nt4+'" class="mailbox-attachment-name">'+
                                '<i class="fa fa-camera"></i> '+s.nt4+
                              '</a>'+
                            '</div>'+
                          '</td>'+
                          '<td style="text-align: center; vertical-align: middle;">'+
                            '<span style="margin-bottom: 10px;" class="mailbox-attachment-size">'+
                              'Download Disini'+
                            '</span>'+
                            '<span class="mailbox-attachment-size">'+
                              '<a href="../gambar/'+s.nt4+'" download class="btn btn-danger btn-lg">'+
                              '<i class="fa fa-cloud-download"></i></a>'+
                            '</span>'+
                          '</td>'+
                      '</tr>'+
                      '<tr>'+
                          '<td style="text-align: center; vertical-align: middle; font-weight: bold;">5.</td>'+
                          '<td style="text-align: center; vertical-align: middle;">'+
                            '<span class="mailbox-attachment-icon has-img" style="font-size: 4em;">'+
                              '<img src="../gambar/'+s.nt5+'" alt="kosong">'+
                            '</span>'+
                            '<div class="mailbox-attachment-info">'+
                              '<a href="../gambar/'+s.nt5+'" class="mailbox-attachment-name">'+
                                '<i class="fa fa-camera"></i> '+s.nt5+
                              '</a>'+
                            '</div>'+
                          '</td>'+
                          '<td style="text-align: center; vertical-align: middle;">'+
                            '<span style="margin-bottom: 10px;" class="mailbox-attachment-size">'+
                              'Download Disini'+
                            '</span>'+
                            '<span class="mailbox-attachment-size">'+
                              '<a href="../gambar/'+s.nt5+'" download class="btn btn-danger btn-lg">'+
                              '<i class="fa fa-cloud-download"></i></a>'+
                            '</span>'+
                          '</td>'+
                      '</tr>'+
                  '</tbody>'+
                  '<tfoot style="border-top: 5px solid red; background-color: #E6E6FA;">'+
                    '<tr>'+
                          '<th style="text-align: center; vertical-align: middle;">#</th>'+
                          '<th style="text-align: center; vertical-align: middle;">Bukti/Nota</th>'+
                          '<th style="text-align: center; vertical-align: middle;"><i class="fa fa-cog"></i> Action</th>'+
                      '</tr>'+
                  '</tfoot>'+
                '</table>'+
              '</div>'+
            '</div>'+
      '</section>'
}
 
$(document).ready(function() {
    var table_penye = $('#tbpenyelesaian').DataTable( {
        "ajax": "ajax_penyelesaian.php",
        "columns": [
            {
              "className":      'lihat-detail',
              "orderable":      false,
              "data":           null,
              "defaultContent": '',
              "render": function(){
                return '<i class="fa fa-plus-square" aria-hidden="tured" style="font-size: 19px; margin-top: 10px;"></i>'
              }
            },
            { "data": "idrenc" },
            { "data": "NmAkt" },
            { "data": "dn_pem" },
            { "data": "dn_kel" },
            { "data": "slsh" },
            { "data": "ket" },
            { "data": "sts" },
            { "data": "actionedit" }

        ],
          columnDefs: [ 
          { className: 'text-center', targets: [0, 1, 2, 3, 4, 5, 6, 7, 8] }
        ],
        "order": [[1, 'asc']]
    } );

    // Add event listener for opening and closing details
    $('#tbpenyelesaian tbody').on('click', 'td.lihat-detail', function () {
        var tr = $(this).closest('tr');
        var row = table_penye.row( tr );
 
        if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            // Open this row
            row.child( rincian_bukti(row.data()) ).show();
            tr.addClass('shown');
        }
    } );
});

</script>



<!-- Image Preview Bukti-->
<script>
function showPreview(event){
  if(event.target.files.length > 0){
    var src = URL.createObjectURL(event.target.files[0]);
    var preview = document.getElementById("file-ip-1-preview");
    preview.src = src;
    preview.style.display = "block";
  }
}

function showPreview2(event){
  if(event.target.files.length > 0){
    var src = URL.createObjectURL(event.target.files[0]);
    var preview = document.getElementById("file-ip-2-preview");
    preview.src = src;
    preview.style.display = "block";
  }
}

function showPreview3(event){
  if(event.target.files.length > 0){
    var src = URL.createObjectURL(event.target.files[0]);
    var preview = document.getElementById("file-ip-3-preview");
    preview.src = src;
    preview.style.display = "block";
  }
}

function showPreview4(event){
  if(event.target.files.length > 0){
    var src = URL.createObjectURL(event.target.files[0]);
    var preview = document.getElementById("file-ip-4-preview");
    preview.src = src;
    preview.style.display = "block";
  }
}

function showPreview5(event){
  if(event.target.files.length > 0){
    var src = URL.createObjectURL(event.target.files[0]);
    var preview = document.getElementById("file-ip-5-preview");
    preview.src = src;
    preview.style.display = "block";
  }
}
</script>


<!-- DATATABLES CUSTOM SUM PEMASUKAN-->
<script>
$(document).ready(function(){

  var dataTablePemasukan = $('#data_pemasukan').DataTable({
    "processing": true,
    "serverSide": true,
    "order" : [],
    "ajax": {
      url: "../pengajuan_pemasukan/fetch.php", 
      type :"POST"
    },
    columnDefs: [
    { className: 'text-center', targets: [0, 1, 2, 3, 4, 5] }
  ],
    "language":{
      "url": "../indonesia.json",
      "sEmptyTable":"Tidads"
    },
    "lengthChange": true,
    "pagingType": "full_numbers",
    'paging'     : true,
    dom: 'lBfrtip',
        buttons: [
            { 
              text: '<i class="fa fa-lg fa-clipboard"></i>',
              extend: 'copyHtml5', 
              footer: true,
              exportOptions: {
                        stripHtml : false,
                        columns: [0, 1, 2, 3, 4]  
              } 
            },
            { 
              text: '<i class="fa fa-lg fa-file-excel-o"></i>',
              extend: 'excelHtml5', 
              footer: true,
              exportOptions: {
                        stripHtml : false,
                        columns: [0, 1, 2, 3, 4]  
              } 
            },
            { 
              text: '<i class="fa fa-lg fa-file-text-o"></i>',
              extend: 'csvHtml5',
              footer: true,
              exportOptions: {
                        stripHtml : false,
                        columns: [0, 1, 2, 3, 4]  
              }
            },
            { 
              text: '<i class="fa fa-lg fa-file-pdf-o"></i>',
              extend: 'pdfHtml5', 
              footer: true,
              exportOptions: {
                        stripHtml : false,
                        columns: [0, 1, 2, 3, 4] 
              } 
            },
            { 
              text: '<i class="fa fa-lg fa-print"></i> Print',
              extend: 'print',
              footer: true,
              exportOptions: {
                        stripHtml : false,
                        columns: [0, 1, 2, 3, 4]  
              }
            }
        ],
    drawCallback:function(settings)
    {
      $('#total_order').html(settings.json.total);
    }
  });

});

</script>

<!-- DATATABLES CUSTOM SUM PENGELUARAN -->
<script>
$(document).ready(function(){

  var dataTable = $('#data_pengeluaran').DataTable({
    "processing": true,
    "serverSide": true,
    "order" : [],
    "ajax": {
      url: "../pengajuan_pengeluaran/fetch.php", 
      type :"POST"
    },
    columnDefs: [
    { className: 'text-center', targets: [0, 1, 2, 3, 4, 5, 6] }
  ],
    "language":{
      "url": "../indonesia.json",
      "sEmptyTable":"Tidads"},
    "lengthChange": true, 
    "pagingType": "full_numbers",
    'paging'     : true,
    dom: 'lBfrtip',
        buttons: [
            { 
              text: '<i class="fa fa-lg fa-clipboard"></i>',
              extend: 'copyHtml5', 
              footer: true,
              exportOptions: {
                        stripHtml : false,
                        columns: [0, 1, 2, 3, 4, 5]  
              } 
            },
            { 
              text: '<i class="fa fa-lg fa-file-excel-o"></i>',
              extend: 'excelHtml5', 
              footer: true,
              exportOptions: {
                        stripHtml : false,
                        columns: [0, 1, 2, 3, 4, 5]  
              } 
            },
            { 
              text: '<i class="fa fa-lg fa-file-text-o"></i>',
              extend: 'csvHtml5',
              footer: true,
              exportOptions: {
                        stripHtml : false,
                        columns: [0, 1, 2, 3, 4, 5]  
              }
            },
            { 
              text: '<i class="fa fa-lg fa-file-pdf-o"></i>',
              extend: 'pdfHtml5', 
              footer: true,
              exportOptions: {
                        stripHtml : false,
                        columns: [0, 1, 2, 3, 4, 5] 
              } 
            },
            { 
              text: '<i class="fa fa-lg fa-print"></i> Print',
              extend: 'print',
              footer: true,
              exportOptions: {
                        stripHtml : false,
                        columns: [0, 1, 2, 3, 4, 5] 
              }
            }
        ],
    drawCallback:function(settings)
    {
      $('#total_pengeluaran').html(settings.json.total);
    }
  });

});
</script>



<!-- Data Tables (Default) -->
<script>
  $(function () {

    $('#unit').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true,
      "language":{
      "url": "../indonesia.json",
      "sEmptyTable":"Tidads"}
    })
  })
</script>

<!-- Pengajuan Pemasukan -->
<?php 
for ($i=1; $i<=10; $i++) {
?>  
<script>
      $('#hrg-<?=$i?>').keyup(function(){
       var textone;
       var texttwo;
       textone = parseFloat($('#jml-<?=$i?>').val());
       texttwo = parseFloat($('#hrg-<?=$i?>').val());
       var result = textone * texttwo;
       $('#ttl-<?=$i?>').val(result.toFixed());
   }),
      $('#jml-<?=$i?>').keyup(function(){
       var textone;
       var texttwo;
       textone = parseFloat($('#jml-<?=$i?>').val());
       texttwo = parseFloat($('#hrg-<?=$i?>').val());
       var result = textone * texttwo;
       $('#ttl-<?=$i?>').val(result.toFixed());
   });
</script>
<?php
}
?>

<!-- Pengajuan Pengeluaran -->
<?php 
for ($i=1; $i<=10; $i++) {
?>  
<script>
      $('#hrgsat-<?=$i?>').keyup(function(){
       var barone;
       var bartwo;
       barone = parseFloat($('#jmlunt-<?=$i?>').val());
       bartwo = parseFloat($('#hrgsat-<?=$i?>').val());
       var result = barone * bartwo;
       $('#ttlpeng-<?=$i?>').val(result.toFixed());
   }),
      $('#jmlunt-<?=$i?>').keyup(function(){
       var barone;
       var bartwo;
       barone = parseFloat($('#jmlunt-<?=$i?>').val());
       bartwo = parseFloat($('#hrgsat-<?=$i?>').val());
       var result = barone * bartwo;
       $('#ttlpeng-<?=$i?>').val(result.toFixed());
   });
    </script>
<?php
}
?>

<!-- Selisih Penyelesaian -->
<script>
      $('#msk').keyup(function(){
       var dana1;
       var dana2;
       dana1 = parseFloat($('#msk').val());
       dana2 = parseFloat($('#klr').val());
       var slsh = dana1 - dana2;
       $('#hsl').val(slsh.toFixed());
   }),
      $('#klr').keyup(function(){
       var dana1;
       var dana2;
       dana1 = parseFloat($('#klr').val());
       dana2 = parseFloat($('#msk').val());
       var slsh = dana1 - dana2;
       $('#hsl').val(slsh.toFixed());
   });
</script>

<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>


<script>
  $(function () {
    //Enable iCheck plugin for checkboxes
    //iCheck for checkbox and radio inputs
    $('.mailbox-messages input[type="checkbox"]').iCheck({
      checkboxClass: 'icheckbox_flat-blue',
      radioClass: 'iradio_flat-blue'
    });

    //Enable check and uncheck all functionality
    $(".checkbox-toggle").click(function () {
      var clicks = $(this).data('clicks');
      if (clicks) {
        //Uncheck all checkboxes
        $(".mailbox-messages input[type='checkbox']").iCheck("uncheck");
        $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
      } else {
        //Check all checkboxes
        $(".mailbox-messages input[type='checkbox']").iCheck("check");
        $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
      }
      $(this).data("clicks", !clicks);
    });

    //Handle starring for glyphicon and font awesome
    $(".mailbox-star").click(function (e) {
      e.preventDefault();
      //detect type
      var $this = $(this).find("a > i");
      var glyph = $this.hasClass("glyphicon");
      var fa = $this.hasClass("fa");

      //Switch states
      if (glyph) {
        $this.toggleClass("glyphicon-star");
        $this.toggleClass("glyphicon-star-empty");
      }

      if (fa) {
        $this.toggleClass("fa-star");
        $this.toggleClass("fa-star-o");
      }
    });
  });
</script>

<script>
  $(function () {
    //Add text editor
    $("#compose-textarea").wysihtml5();
  });
</script>


<!-- SELECT ALL FUNCTION EDIT & DELETE -->
<script>
    $(document).ready(function() {
        $('#select_all').on('click', function() {
          if(this.checked) {
            $('.check').each(function() {
              this.checked = true;
            })  
          } else {
            $('.check').each(function() {
              this.checked = false;
            })
          }
        });

        $('.check').on('click', function() {
          if($('.check:checked').length == $('.check').length) {
            $('#select_all').prop('checked', true)
          } else {
            $('#select_all').prop('checked', false)
          }
        })
    })

    function edit() {
      document.proses.action = 'edit.php'; 
      document.proses.submit();
    }

    function hapus() {
      var conf = confirm('Yakin akan menghapus data?');
      if(conf) {
        document.proses.action = 'del.php'; 
        document.proses.submit();
      }
    }
</script>  



</body>
</html>