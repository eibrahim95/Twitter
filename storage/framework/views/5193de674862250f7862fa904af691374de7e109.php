<?php $__env->startSection('content'); ?>
	<div class="row">
        <div class="col-md-3 col-md-offset-1">
            <div class="panel panel-default">
            	<div class="panel-heading"><?php echo e(Auth::user()->name); ?></div>
                <div class="panel-body">
                    <ul class="nav nav-pills nav-stacked">
                        <li class="active"><a data-toggle="tab" href="#gn">General Infromation</a></li>
                        <li><a data-toggle="tab" href="#fb">Facebook Connection</a></li>
                        <li><a data-toggle="tab" href="#tw">Twitter Connection</a></li>
                        <li><a data-toggle="tab" href="#in">Instagram Connection</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="tab-content">
            <div id="gn" class="col-md-5 panel tab-pane fade in active">
                	<div class="panel-body">
                		<table class="table">
                			<thead>
                				<tr>
                    				<th><p>Name : </p></th>
                    				<th><p><?php echo e(Auth::user()->name); ?></p></th>
                    			</tr>
                			</thead>
                			<tbody>
                    			<tr>
                    				<td><p>Email : </p></td>
                    				<td><?php echo e(Auth::user()->email); ?></td>
                    			</tr>
                    			<tr>
                    				<td><p>Joined : </p></td>
                    				<td><?php echo e(Auth::user()->created_at); ?></td>
                    			</tr>
                    		</tbody>
                  		</table>
                  	</div>
                </div>
             
                <div id="fb" class="col-md-5 panel tab-pane fade in">
                	<div class="panel-body">
                		<?php if(Auth::user()->facebook_id == NULL): ?>
                			<meta name="_token" content="<?php echo e(csrf_token()); ?>">
                			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                			<p>Not Connected to Facebook<span id="btn-login" class="pull-right"><button class="btn btn-primary" >Connect Now</button></span></p>

                			<?php if(App::environment() != 'local'): ?>
        						<script src="<?php echo e(secure_asset('js/facebook_connect.js')); ?>"></script>
    						<?php else: ?>
        						<script src="<?php echo e(asset('js/facebook_connect.js')); ?>"></script>
    						<?php endif; ?>
                		<?php else: ?>
                			<p>Connected to Facebook</p>
                		<?php endif; ?>
                	</div>
                </div>
                <div id="tw" class="col-md-5 panel tab-pane fade in">
                	<div class="panel-body">
                	<?php if(Auth::user()->twitter_id == NULL): ?>
                			<p>Not Connected to Twitter<a target="_blank" href="/twitter/connect"><span class="pull-right"><button class="btn btn-primary" >Connect Now</button></span></a></p>

                		<?php else: ?>
                			<p>Connected to Twitter</p>
                		<?php endif; ?>
                	</div>
                </div>

                <div id="in" class="col-md-5 panel tab-pane fade in">
                	<div class="panel-body">
                	</div>
                </div>
        </div>
	</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>