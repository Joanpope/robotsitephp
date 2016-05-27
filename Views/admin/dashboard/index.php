<section class="content-header">
    <h1>
        Panel de control
    </h1>
</section>

<!-- Main content -->
<section class="content">
	<!-- Small boxes (Stat box) -->
	<div class="row">
	    <div class="col-lg-4 col-xs-6">
	        <!-- small box -->
	        <div class="small-box bg-aqua">
	            <div class="inner">
	                <h3><?php echo $data['orders']; ?></h3>

	                <p>Ordenes</p>
	            </div>
	            <div class="icon">
	                <i class="ion ion-ios-gear"></i>
	            </div>
	            <a href="<?php echo URL; ?>admin/order" class="small-box-footer">Ver más <i class="fa fa-arrow-circle-right"></i></a>
	        </div>
	    </div>
	    <!-- ./col -->
	    <div class="col-lg-4 col-xs-6">
	        <!-- small box -->
	        <div class="small-box bg-green">
	            <div class="inner">
	                <h3><?php echo $data['robots']; ?></h3>

	                <p>Robots</p>
	            </div>
	            <div class="icon">
	                <i class="ion ion-outlet"></i>
	            </div>
	            <a href="<?php echo URL; ?>admin/robot" class="small-box-footer">Ver más <i class="fa fa-arrow-circle-right"></i></a>
	        </div>
	    </div>
	    <!-- ./col -->
	    <div class="col-lg-4 col-xs-6">
	        <!-- small box -->
	        <div class="small-box bg-yellow">
	            <div class="inner">
	                <h3><?php echo $data['tasks']; ?></h3>

	                <p>Tareas</p>
	            </div>
	            <div class="icon">
	                <i class="ion ion-ios-list"></i>
	            </div>
	            <a href="<?php echo URL; ?>admin/task" class="small-box-footer">Ver más <i class="fa fa-arrow-circle-right"></i></a>
	        </div>
	    </div>
	    <!-- ./col -->
	    <div class="col-lg-4 col-xs-6">
	        <!-- small box -->
	        <div class="small-box bg-purple">
	            <div class="inner">
	                <h3><?php echo $data['workers']; ?></h3>

	                <p>Trabajadores</p>
	            </div>
	            <div class="icon">
	                <i class="ion ion-ios-person"></i>
	            </div>
	            <a href="<?php echo URL; ?>admin/worker" class="small-box-footer">Ver más <i class="fa fa-arrow-circle-right"></i></a>
	        </div>
	    </div>
	    <!-- ./col -->
	    <div class="col-lg-4 col-xs-6">
	        <!-- small box -->
	        <div class="small-box bg-red">
	            <div class="inner">
	                <h3><?php echo $data['teams']; ?></h3>

	                <p>Equipos</p>
	            </div>
	            <div class="icon">
	                <i class="ion ion-ios-people"></i>
	            </div>
	            <a href="<?php echo URL; ?>admin/team" class="small-box-footer">Ver más <i class="fa fa-arrow-circle-right"></i></a>
	        </div>
	    </div>
	    <!-- ./col -->
	    <div class="col-lg-4 col-xs-6">
	        <!-- small box -->
	        <div class="small-box bg-blue">
	            <div class="inner">
	                <h3><?php echo $data['processes']; ?></h3>

	                <p>Procesos</p>
	            </div>
	            <div class="icon">
	                <i class="ion ion-social-buffer"></i>
	            </div>
	            <a href="<?php echo URL; ?>admin/process" class="small-box-footer">Ver más <i class="fa fa-arrow-circle-right"></i></a>
	        </div>
	    </div>
	    <!-- ./col -->
	</div>
	<!-- /.row -->
	<div class="row">
            <div class="col-md-3 hidden-xs"></div>
	    <div class="col-md-6">
	        <!-- DONUT CHART -->
	        <div class="box box-primary">
	            <div class="box-header with-border">
	                <h3 class="box-title">Estados de los robots</h3>

	                <div class="box-tools pull-right">
	                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
	                    </button>
	                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
	                </div>
	            </div>
	            <div class="box-body">
	                <div class="box-body chart-responsive">
		            	<div class="chart" id="robots-chart" style="height: 300px; position: relative;"></div>
		            </div>
	            </div>
	            <!-- /.box-body -->
	        </div>
	        <!-- /.box -->
	    </div><!-- /.col (LEFT) -->
            <div class="col-md-3 hidden-xs"></div>
	</div><!-- /.row -->
	<script>
	$(document).ready(function(){
            showRobotsByStatus('<?php echo WEBSERVICE; ?>');
	});

	
	</script>