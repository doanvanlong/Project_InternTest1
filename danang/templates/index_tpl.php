<?php
    /* Set the default timezone */
    date_default_timezone_set("Asia/Ho_Chi_Minh");

    /* Set the date */
    if($_GET['datepicker']!=''){
        $date = strtotime($_GET['datepicker']);
    } else {
        $date = strtotime(date('y-m-d'));
    } 

    $day = date('d', $date);
    $month = date('m', $date);
    $year = date('Y', $date);
    $firstDay = mktime(0,0,0,$month, 1, $year);
    $title = strftime('%B', $firstDay);
    $dayOfWeek = date('D', $firstDay);
    $daysInMonth = cal_days_in_month(0, $month, $year);
    /* Get the name of the week days */
    $timestamp = strtotime('next Sunday');
    $weekDays = array();
    for ($i = 0; $i < 7; $i++) {
        $weekDays[] = strftime('%a', $timestamp);
        $timestamp = strtotime('+1 day', $timestamp);
    }
    $blank = date('w', strtotime("{$year}-{$month}-01"));
?>

<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Thống kê truy cập tháng : <?php echo $month ?> - <?php echo $year ?> '
        },
        subtitle: {
            text: 'Devetloper by : <a href="danangweb.vn">DaNangWeb.vn</a>'
        },
        xAxis: {
            type: 'category',
            labels: {
                rotation: 0,
                style: {
                    fontSize: '13px',
                    fontFamily: 'Arial'
                }
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Số người truy cập'
            }
        },
        legend: {
            enabled: false
        },
        tooltip: {
            pointFormat: 'Tổng : <b>{point.y:.1f} Lượt truy cập</b>'
        },
        series: [{
            name: 'Population',
            data: [
            <?php for($i = 1; $i <= $daysInMonth; $i++):

                $k = $i+1;
                $begin = strtotime($year.'-'.$month.'-'.$i);
                $end =  $begin+86400;

                $query             =    "SELECT COUNT(*) AS todayrecord FROM counter WHERE tm>='$begin' and tm<'$end' "; 
                $todayrc  = mysql_fetch_assoc($d->query($query)); 
                $today_visitors     =    $todayrc['todayrecord']; 

            ?>
                ['<?=$i?>', <?=$today_visitors?>],
            <?php endfor; ?>


            ],
            dataLabels: {
                enabled: true,
                rotation: -90,
                color: '#FFFFFF',
                align: 'right',
                format: '{point.y:.1f}', // one decimal
                y: -25, // 10 pixels down from the top
                style: {
                    fontSize: '13px',
                    fontFamily: 'Arial'
                }
            }
        }]
    });
    $( "#datepicker" ).datepicker({
      dateFormat: 'yy-mm-dd'
    });
});
</script>

<div class="wrapper">
<form name="supplier" id="validate" class="form" action="index.php" method="get" enctype="multipart/form-data">

<div class="widget">
   <div class="title"><h6>Chào mừng bạn đến với Administrator - HỆ THỐNG QUẢN TRỊ NỘI DUNG WEBSITE - CÔNG TY ĐÀ NẴNG WEB</h6><div class="clear"></div></div>
  

   <div class="clear"></div>

   <div class="formRow">
        <label>Thống kê theo tháng</label>
        <div class="formRight">
                <input type="text" id="datepicker" name="datepicker" placeholder="yyyy-mm-dd">
                <input type="submit" class="blueB xemthongke" onclick="TreeFilterChanged2(); return false;" value="Xem thống kê" />
        </div>
        <div class="clear"></div>
   </div>

   <div class="clear"></div>

   <div id="container" style="width: 100%; height: 400px; margin: 0 auto"></div>
   <div class="clear"></div>
   <!-- 2 columns widgets -->
    
</div>
<div class="clear"></div>
<?php echo $today = date("F j, Y, g:i a");  ?>
</form></div>
<div class="wrapper">
    <div class="infoHD">
        <div class="infoHD_item">
            <span class="infoHD_title mr-20">Tên miền:</span>
            <span class="mr-20">Ngày bắt đầu: <span id="domain_start"><?=date('d-m-Y',$company['domain_start'])?></span> </span>
            <span class="mr-20">Ngày kết thúc: <span id="domain_end"><?=date('d-m-Y',$company['domain_end'])?></span> </span>
        </div>
        <div class="infoHD_item">
            <span class="infoHD_title mr-20">Hosting:</span>
            <span class="mr-20">Ngày bắt đầu: <span id="hosting_start"><?=date('d-m-Y',$company['hosting_start'])?></span> </span>
            <span class="mr-20">Ngày kết thúc: <span id="hosting_end"><?=date('d-m-Y',$company['hosting_end'])?></span> </span>
        </div>
        
    </div>
    <?php if($_SESSION['login']['username'] == 'danangweb'){ ?>
    <div>
        <button class="no-border button blueB" id="update">Update</button>
        <button class="no-border button " id="ok">Ok</button>
    </div>
    <?php } ?>
</div>
<style>
    .infoHD{
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        margin: 20px 0px;

    }
    .infoHD_item{
        width: 50%;
    }
    .mr-20{
        margin-right: 20px;
    }
    .infoHD_title{
        text-transform: uppercase;
        font-weight: 700;
    }
    .no-border{
        border: 0;
    }
</style>
<?php if($_SESSION['login']['username'] == 'danangweb'){ ?>
<script>
    $(document).ready(function(){
        var input_domain_start = '<input type="date" name ="domain_start" value="<?=date('Y-m-d',$company['domain_start'])?>"  />';
        var input_domain_end = '<input type="date" name ="domain_end" value="<?=date('Y-m-d',$company['domain_end'])?>" />';
        var input_hosting_start = '<input type="date" name ="hosting_start" value="<?=date('Y-m-d',$company['hosting_start'])?>" />';
        var input_hosting_end = '<input type="date" name ="hosting_end" value="<?=date('Y-m-d',$company['hosting_end'])?>" />';
        
        $('#update').on('click', function(){
            $('#domain_start').html(input_domain_start);
            $('#domain_end').html(input_domain_end);
            $('#hosting_start').html(input_hosting_start);
            $('#hosting_end').html(input_hosting_end);
        });
        $('#ok').on('click', function(){
           var domain_start = $("input[name='domain_start']").val();
           var domain_end = $("input[name='domain_end']").val();
           var hosting_start =  $("input[name='hosting_start']").val();
           var hosting_end =  $("input[name='hosting_end']").val();

                $.ajax({
                    type: "POST",
                    url: "ajax/xuly_admin_dn.php",
                    data: {
                        domain_start:domain_start,
                        domain_end:domain_end,
                        hosting_start:hosting_start,
                        hosting_end:hosting_end,
                        act:'updateHD',
                    },
                    success:function(data){
                        $(".infoHD").html(data);
                    }
                });

        });
    });
</script>
<?php } ?>
<script src="js/highcharts/highcharts.js"></script>
<script src="js/highcharts/modules/exporting.js"></script>

