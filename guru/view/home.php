<?php $kelkel=mysqli_query($con,"SELECT * FROM kelas order by kelas asc "); ?>
<script type="text/javascript" src="<?php echo $basegu; ?>js/jquery.min.js"></script>
<script src="<?php echo $basegu; ?>js/highcharts.js"></script>
<script type="text/javascript">
$(function () {
    var chart;
    $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'containertm', 
                type: 'column',  
                marginRight: 0,
                marginBottom: 50
            },
            title: {
                text: '',
                x: -20 
            },
            subtitle: {
                text: '',
                x: -20
            },
            xAxis: {  
                categories: [
                'Total Pelanggaran',             
                ]
            },
            yAxis: {
                title: {
                    text: ''
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: { 
                formatter: function() {
                        return '<b>'+ this.series.name +'</b><br/>'+
                        this.x +': '+ this.y ;
                }
            },
            legend: {
                layout: 'vertical',
                align: 'left',
                verticalAlign: 'top',
                x: -10,
                y: 0,
                borderWidth: 0
            },
            series: [
            <?php $kel=mysqli_query($con,"SELECT * FROM kelas order by kelas asc "); while($dkel=mysqli_fetch_array($kel)){ $jum=mysqli_query($con,"SELECT * FROM pelanggaran where c_kelas='$dkel[c_kelas]' "); $jumpel=mysqli_num_rows($jum); ?>
            {  
                name: '<?php echo $dkel['kelas']; ?>',
                data: 
                [
                  <?php  echo ''.$jumpel.','; ?>
                ],
            },
            <?php } ?>
            ]
        });
    });
    
}); 
</script>
<style type="text/css">.judul{width: 100%; background-color: #FFF; padding: 10px;margin-bottom: 10px; }</style>
<div class="judul">
  Top 4 Pelanggaran Siswa
</div>
<div class="row">
<?php $pps=mysqli_query($con,"SELECT c_siswa, sum(bobot) as jb from pelanggaran group by c_siswa order by jb desc limit 4 "); while($hpps=mysqli_fetch_array($pps)){ $sis=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM siswa where c_siswa='$hpps[c_siswa]' ")); $kel=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM kelas where c_kelas='$sis[c_kelas]' ")); ?>
  <div class="col-md-3">
    <div class="box box-primary">
      <div class="box-body box-profile">
        <h4 class="profile-username text-center" style="font-size: 16px;"><?php echo $sis['nama']; ?></h4>
        <p class="text-muted text-center"><?php echo $kel['kelas']; ?></p>
        <ul class="list-group list-group-unbordered">
          <li class="list-group-item">
          <?php if($hpps['jb']>20){ $style='style="font-size: 28px;margin-top: -10px;color:#d9534f;"'; }else{ $style='style="font-size: 28px;margin-top: -10px;"'; } ?>
            <b>Poin Pelanggaran<a class="pull-right" <?php echo $style.'>'.$hpps['jb']; ?></a></b>
          </li>
        </ul>
        <a href="<?php echo $basegu; ?>lihatpelanggaransiswa/<?php echo $hpps['c_siswa']; ?>/_" class="btn btn-primary btn-block">Lihat Pelanggaran</a>
      </div>
    </div>
  </div>
<?php } ?>
</div>
<div class="row">
  <div class="col-md-4">
    <div class="box">
      <div class="box-header">
        <p>Top 5 Pelanggaran Yang Sering Dilakukan</p>
        <div class="box-tools">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="glyphicon glyphicon-minus"></i></button>
        </div>
      </div>
      <div class="box-body">
      <table class="table table-hover">
        <thead></thead>
        <tbody>
    <?php $vr=1; $pyd=mysqli_query($con,"SELECT c_benpel, count(c_benpel) as bp from pelanggaran group by c_benpel order by bp desc limit 5 ");while($hpyd=mysqli_fetch_array($pyd)){
    $ben=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM benpel where c_benpel='$hpyd[c_benpel]' "));
    ?>                
          <tr>
            <td><?php echo $ben['benpel']; ?></td>
            <td><?php echo $hpyd['bp']; ?></td>
          </tr>
    <?php $vr++; } ?>
        </tbody>
      </table>
      </div>
    </div>
  </div>
  <div class="col-xs-12 col-md-8 col-lg-8">
    <div class="box">
      <div class="box-header">
        <h5 class="text-center"></h5>
      </div>
      <div class="box-body">
      <table>
        <div id="containertm" style="width:90%;"></div>
      </table>
      </div>
    </div>
  </div>
</div>





