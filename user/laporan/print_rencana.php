<?php 
include_once('../header.php'); 
?>

<section class="content-header">
    <h1>
    Laporan Rencana & Anggaran
    </h1>
    <ol class="breadcrumb">
        <li><a href="../dashboard/index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Laporan Rencana & Anggaran</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#setting" data-toggle="tab">Laporan Rincian Anggaran</a></li>
                    <li><a href="#setinguser" data-toggle="tab">Laporan Pengajuan Rencana</a></li>
                </ul>

                <?php
                    $id = @$_GET['id'];
                    $query = "SELECT id_rencana,nama_aktivitas,tahun_anggaran,uraian_aktivitas,jenis_anggaran,pelaksanaan,tempat,status, id_rencana_pem, keterangan, jumlah, harga, total, status_pem FROM tb_rencana INNER JOIN tb_pemasukan ON tb_pemasukan.id_rencana_pem=tb_rencana.id_rencana AND tb_pemasukan.status_pem=tb_rencana.status WHERE id_rencana = '$id'";

                    $sql_rencana = mysqli_query($con, $query) or die (mysqli_error($con));
                    $data = mysqli_fetch_array($sql_rencana);
                ?>

                <div class="tab-content">
                    <div class="active tab-pane" id="setting">
                        <form class="form-horizontal" id="div1" action="proses.php" method="post">
                            <!-- title row -->
                            <div class="row">
                                <div class="col-xs-12">
                                <h2 class="page-header">
                                    <i class="fa fa-fax"></i> Laporan Rincian Anggaran <?=$data['nama_aktivitas']?>
                                    <small class="pull-right">
                                        Bandung, <?php date_default_timezone_set('Asia/Jakarta'); 
                                        echo date("Y-m-d h:i:s");?>
                                    </small>
                                </h2>
                                </div>
                                <!-- /.col -->
                            </div>
                            <br>
                            <div style="text-align: center;" class="box-header with-border">
                                <h3 class="box-title" style="font-weight: bolder;">ANGGARAN PEMASUKAN</h3>
                            </div>
                            <table class="table table-striped table-bordered">
                                <thead style="background-color: aqua;">
                                    <tr>
                                        <th style="text-align: center;">ID Rencana</th>
                                        <th style="text-align: center;">Dana Anggaran</th>
                                        <th style="text-align: center;">Jumlah</th>
                                        <th style="text-align: center;">Biaya</th>
                                        <th style="text-align: center;">Total Biaya</th>
                                        <th style="text-align: center;">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $tot = 0;
                                    $sql_pemasukan = mysqli_query($con, $query) or die (mysqli_error($con));
                                    if (mysqli_num_rows($sql_pemasukan) > 0) {
                                    while ($TESY = mysqli_fetch_array($sql_pemasukan)) { 
                                        $tot += $TESY['total'];
                                        ?>
                                    <tr>
                                        <td style="text-align: center;"><?=$TESY['id_rencana_pem']?></td>
                                        <td style="text-align: center;"><?=$TESY['keterangan']?></td>
                                        <td style="text-align: center;"><?=$TESY['jumlah']?></td>
                                        <td style="text-align: center;">Rp. <?php echo number_format($TESY['harga'])?></td>
                                        <td style="text-align: center;">Rp. <?php echo number_format($TESY['total'])?></td>
                                        <td style="text-align: center;"><?=$TESY['status_pem']?></td>
                                    </tr>
                                    <?php 
                                    } } ?>
                                </tbody>
                                <tfoot>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th style="background-color: aqua; text-align: center;">Subtotal : </th>
                                    <th style="background-color: aqua; text-align: center;">Rp. <?php echo number_format($tot)?></th>
                                    <th style="background-color: aqua;"></th>
                                </tfoot>
                            </table>
                            <br>
                            <div style="text-align: center;" class="box-header with-border">
                                <h3 class="box-title" style="font-weight: bolder;">ANGGARAN PENGELUARAN</h3>
                            </div>
                            <table class="table table-striped table-bordered">
                                <thead style="background-color: aqua;">
                                    <tr>
                                        <th style="text-align: center;">ID Rencana</th>
                                        <th style="text-align: center;">Jenis Pengeluaran</th>
                                        <th style="text-align: center;">Uraian Pengeluaran</th>
                                        <th style="text-align: center;">Jumlah/Unit</th>
                                        <th style="text-align: center;">Harga/Biaya Satuan</th>
                                        <th style="text-align: center;">Total Biaya</th>
                                        <th style="text-align: center;">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $id = @$_GET['id'];
                                    $tot_kel = 0;
                                    $query_keluar = "SELECT id_rencana, id_rencana_kel, jenis_pengeluaran, keterangan_kel, jumlah_unit, harga_satuan, total_kel, status_kel FROM tb_rencana INNER JOIN tb_pengeluaran ON tb_pengeluaran.id_rencana_kel=tb_rencana.id_rencana AND tb_pengeluaran.status_kel=tb_rencana.status WHERE id_rencana = '$id'";

                                    $sql_pengeluaran = mysqli_query($con, $query_keluar) or die (mysqli_error($con));
                                    if (mysqli_num_rows($sql_pengeluaran) > 0) {
                                    while ($PENGE = mysqli_fetch_array($sql_pengeluaran)) { 
                                        $tot_kel += $PENGE['total_kel'];
                                    ?>
                                    <tr>
                                        <td style="text-align: center;"><?=$PENGE['id_rencana_kel']?></td>
                                        <td style="text-align: center;"><?=$PENGE['jenis_pengeluaran']?></td>
                                        <td><?=$PENGE['keterangan_kel']?></td>
                                        <td style="text-align: center;"><?=$PENGE['jumlah_unit']?></td>
                                        <td style="text-align: center;">Rp. <?php echo number_format($PENGE['harga_satuan'])?></td>
                                        <td style="text-align: center;">Rp. <?php echo number_format($PENGE['total_kel'])?></td>
                                        <td style="text-align: center;"><?=$PENGE['status_kel']?></td>
                                    </tr>
                                    <?php 
                                    } } ?>
                                </tbody>
                                <tfoot>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th style="background-color: aqua; text-align: center;">Subtotal : </th>
                                    <th style="background-color: aqua; text-align: center;">Rp. <?php echo number_format($tot_kel)?></th>
                                    <th style="background-color: aqua;"></th>
                                </tfoot>
                            </table>
                            <br>
                            <div style="text-align: center;" class="box-header with-border">
                                <h3 class="box-title" style="font-weight: bolder;">TOTAL SEMUA ANGGARAN</h3>
                            </div>
                            <table class="table table-striped table-bordered">
                                <thead style="background-color: aqua;">
                                    <tr>
                                        <th style="text-align: center;">#</th>
                                        <th style="text-align: center;">Jenis Anggaran</th>
                                        <th style="text-align: center;">Total Anggaran</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="text-align: center; font-weight: bold;">1.</td>
                                        <td style="text-align: center;">Anggaran Pemasukan</td>
                                        <td style="text-align: center;">Rp. <?php echo number_format($tot)?></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: center; font-weight: bold;">2.</td>
                                        <td style="text-align: center;">Anggaran Pengeluaran</td>
                                        <td style="text-align: center;">Rp. <?php echo number_format($tot_kel)?></td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th></th>
                                        <th style="text-align: center;">TOTAL</th>
                                        <th style="text-align: center; background-color: orange;">Rp. <?php echo number_format($tot_kel+$tot)?></th>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <th style="text-align: center;">SELISIH</th>
                                        <th style="text-align: center; background-color: orange;">Rp. <?php echo number_format($tot-$tot_kel)?></th>
                                    </tr>
                                </tfoot>
                            </table>
                            <div class="row no-print">
                                <div class="col-xs-12">
                                <a onclick="printContent('div1')"target="_blank" class="btn btn-default">
                                    <i class="fa fa-print"></i> Print
                                </a>
                                <button type="button" class="btn btn-danger pull-right" style="margin-right: 5px;">
                                    <i class="fa fa-reply"></i> Kembali 
                                </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="tab-pane" id="setinguser">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-xs-12">
                            <h2 class="page-header">
                                <i class="fa fa-calendar-o"></i> Laporan Pengajuan <?=$data['nama_aktivitas']?>
                                <small class="pull-right">
                                    Bandung, <?php date_default_timezone_set('Asia/Jakarta'); 
                                    echo date("Y-m-d h:i:s");?>
                                </small>
                            </h2>
                            </div>
                            <!-- /.col -->
                        </div>

                        <!-- Table row -->
                        <div class="row">
                            <form action="proses.php" method="post" id="div2">
                                <div class="col-xs-12 table-responsive">  
                                    <table align="center" border="0" cellpadding="1" style="width: 700px;">
                                        <tbody>
                                            <tr>     
                                                <td colspan="3">
                                                    <div align="center">
                                                        <span style="font-family: Verdana; font-size: x-small;"><b>LAPORAN RENCANA PENGAJUAN</b></span>
                                                        <hr />
                                                    </div>
                                                </td>   
                                            </tr>
                                            <tr>    
                                                <td colspan="2">
                                                    <table border="0" cellpadding="1" style="width: 400px;">    
                                                        <tbody>
                                                            <tr>            
                                                                <td width="93"><span style="font-size: x-small;">No</span></td>         
                                                                <td width="8"><span style="font-size: x-small;">:</span></td>         
                                                                <td width="200"><span style="font-size: x-small;">005/ poltekpos/ yps/ IV/ 2020</span></td>       
                                                            </tr>
                                                            <tr>        
                                                                <td><span style="font-size: x-small;">Lampiran</span></td>         
                                                                <td><span style="font-size: x-small;">:</span></td>         
                                                                <td><span style="font-size: x-small;">-</span></td>       
                                                            </tr>
                                                            <tr>
                                                                <td><span style="font-size: x-small;">Perihal</span></td>         
                                                                <td><span style="font-size: x-small;">:</span></td>         
                                                                <td><span style="font-size: x-small;">Pengajuan Rencana Anggaran</span></td>       
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>  
                                                <td valign="top">
                                                    <div align="right">
                                                        <span style="font-size: x-small;">
                                                            Bandung, <?php date_default_timezone_set('Asia/Jakarta'); 
                                                            echo date("Y-m-d h:i:s");?>
                                                        </span>
                                                    </div>
                                                </td>     
                                            </tr>
                                            <tr>     
                                                <td width="302"></td>     
                                                <td width="343"></td>     
                                                <td width="339"></td>   
                                            </tr>
                                            <tr>     
                                                <td><table border="0" style="width: 239px;">
                                                        <tbody>
                                                            <tr>         
                                                                <td width="74">
                                                                    <span style="font-size: x-small;">kepada yth</span>
                                                                </td>         
                                                                <td width="11"></td>         
                                                                <td width="140"></td>       
                                                            </tr>
                                                            <tr> 
                                                                <td>
                                                                    <span style="font-size: x-small;">Prodi D3/D4 TI</span>
                                                                </td>         
                                                                <td></td>         
                                                                <td></td>       
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>     
                                                <td></td>
                                                <td></td>   
                                            </tr>
                                            <tr>     
                                                <td></td><td></td><td></td>
                                            </tr>
                                            <tr>     
                                                <td colspan="3" height="270" valign="top">
                                                    <div align="justify">
                                                        <pre><span style="font-size: x-small;"><?=$data['uraian_aktivitas']?></span>
                                                        </pre>
                                                        <table border="0" style="width: 352px;">
                                                            <tbody>
                                                                <tr>           
                                                                    <td width="80">
                                                                        <span style="font-size: x-small;">Nama Aktivitas</span>
                                                                    </td>           
                                                                    <td width="10">
                                                                        <span style="font-size: x-small;">:</span>
                                                                    </td>           
                                                                    <td width="248">
                                                                        <span style="font-size: x-small;"><?=$data['nama_aktivitas']?></span>
                                                                    </td>         
                                                                </tr>
                                                                <tr>           
                                                                    <td width="80">
                                                                        <span style="font-size: x-small;">Dana Anggaran</span>
                                                                    </td>           
                                                                    <td width="10">
                                                                        <span style="font-size: x-small;">:</span>
                                                                    </td>           
                                                                    <td width="248">
                                                                        <span style="font-size: x-small;"><?=$data['jenis_anggaran']?></span>
                                                                    </td>         
                                                                </tr>
                                                                <tr>           
                                                                    <td width="80">
                                                                        <span style="font-size: x-small;">hari/tanggal</span>
                                                                    </td>           
                                                                    <td width="10">
                                                                        <span style="font-size: x-small;">:</span>
                                                                    </td>           
                                                                    <td width="248">
                                                                        <span style="font-size: x-small;"><?=$data['pelaksanaan']?></span>
                                                                    </td>         
                                                                </tr>
                                                                <tr>           
                                                                    <td>
                                                                        <span style="font-size: x-small;">tempat</span>
                                                                    </td>           
                                                                    <td>
                                                                        <span style="font-size: x-small;">:</span>
                                                                    </td>           
                                                                    <td>
                                                                        <span style="font-size: x-small;"><?=$data['tempat']?></span>
                                                                    </td>         
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <div align="justify">
                                                            <span style="font-size: x-small;">
                                                            Demikian Laporan Pengajuan Rencana ini kami sampaikan, kami harap acara ini dapat berjalan dengan lancar. sekian dan terima kasih.</span> 
                                                        </div>
                                                    </div>
                                                    <div align="center">
                                                        <span style="font-size: x-small;">Mengetahui</span>
                                                    </div>
                                                </td>   
                                            </tr>
                                            <tr>     
                                                <td>
                                                    <div align="center">
                                                        <span style="font-size: x-small;">Bendahara,</span>
                                                    </div>
                                                    <div align="center"></div>
                                                    <div align="center">
                                                        <span style="font-size: x-small;">Awat Nasution </span>
                                                    </div>
                                                </td>     
                                                <td></td>     
                                                <td valign="top">
                                                    <div align="center">
                                                        <span style="font-size: x-small;">Kepala Prodi, </span>
                                                    </div>
                                                    <div align="center"></div>
                                                    <div align="center">
                                                        <span style="font-size: x-small;">Gusti Giustianto Dra,M.pd.</span>
                                                    </div>
                                                </td>   
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <br><br>
                                <div class="row no-print">
                                    <div class="col-xs-10 col-xs-offset-1">
                                        <a onclick="printContent('div2')"target="_blank" class="btn btn-default">
                                            <i class="fa fa-print"></i> Print
                                        </a>
                                        <button type="button" class="btn btn-danger pull-right" style="margin-right: 5px;">
                                            <i class="fa fa-reply"></i> Kembali 
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

</section>

<script>
function printContent(el){
	var restorepage = document.body.innerHTML;
	var printcontent = document.getElementById(el).innerHTML;
	document.body.innerHTML = printcontent;
	window.print();
	document.body.innerHTML = restorepage;
}
</script>

<?php include_once('../footer.php'); 
?>
