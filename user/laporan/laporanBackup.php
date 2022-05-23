<?php 
include_once('../header.php'); 
?>

<section class="content-header">
    <h1>
        LAPORAN PENGAJUAN RENCANA
        <small>Laporan Pengajuan Rencana</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="../../dashboard/index.php"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Laporan Rencana Rencana</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box box-primary">
    <div class="row">
            <div class="col-xs-12">
                <div class="box box-default">
                    <div style="text-align: center;" class="box-header with-border">
                        <h3 class="box-title">KELOLA HALAMAN</h3>
                    </div>
                    <div class="box-body">
                    <button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#modal-default">
                        Cetak Halaman
                    </button>
                    </div>
                </div>
            </div>
        </div>
                    
        <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Default Modal</h4>
              </div>
              <div class="modal-body">
                <p>One fine body&hellip;</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                <button onclick="printContent('div1')" class="btn btn-primary"><i class="fa fa-print"></i></button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <div class="box-body" id="div1" >
                <?php
                    $id = @$_GET['id'];
                    $sql_rencana = mysqli_query($con, "SELECT id_rencana,nama_aktivitas,tahun_anggaran,uraian_aktivitas,jenis_anggaran,pelaksanaan,tempat,status,uraian_pubdok,totda_pubdok,uraian_transportasi,totda_transportasi,uraian_konsumsi,totda_konsumsi,uraian_medik,totda_medik,uraian_lainnya,totda_lainnya,total_semuaBiaya FROM tb_rencana INNER JOIN tb_rincian_dana ON tb_rincian_dana.id_rencanaDana=tb_rencana.id_rencana AND id_rencana = '$id'") or die (mysqli_error($con));
                    $data = 
                    mysqli_fetch_array($sql_rencana);
                ?>

<table align="center" border="0" cellpadding="1" style="width: 700px;">
    <tbody>
        <tr>     
            <td colspan="3">
                <div align="center">
                    <span style="font-family: Verdana; font-size: x-small;"><b>LAPORAN PENGAJUAN RENCANA</b></span>
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
                            <tr>           
                                <td>
                                    <span style="font-size: x-small;">Rincian Dana</span>
                                </td>           
                                <td>
                                    <span style="font-size: x-small;">:</span>
                                </td> 
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Jenis Pengeluaran</th>
                                            <th>Uraian Pengeluaran</th>
                                            <th>Total Dana</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Publikasi & Dokumentasi</td>
                                            <td><?=$data['uraian_pubdok']?></td>
                                            <td><?=$data['totda_pubdok']?></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Transportasi</td>
                                            <td><?=$data['uraian_transportasi']?></td>
                                            <td><?=$data['totda_transportasi']?></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Konsumsi</td>
                                            <td><?=$data['uraian_konsumsi']?></td>
                                            <td><?=$data['totda_konsumsi']?></td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Medik</td>
                                            <td><?=$data['uraian_medik']?></td>
                                            <td><?=$data['totda_medik']?></td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>Pengeluaran Lainnya</td>
                                            <td><?=$data['uraian_lainnya']?></td>
                                            <td><?=$data['totda_lainnya']?></td>
                                        </tr>
                                    </tbody>
                                    </tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th></th>
                                            <th>Subtotal</th>
                                            <th>Rp. <?php echo number_format($data['total_semuaBiaya'])?></th>
                                        </tr>
                                    </tfoot>
                                </table>          
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