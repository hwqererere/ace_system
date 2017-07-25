				<div class="sidebar-shortcuts" id="sidebar-shortcuts" style="display:none">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<button class="btn btn-small btn-success" >
							<i class="icon-signal"></i>
						</button>

						<button class="btn btn-small btn-info">
							<i class="icon-pencil"></i>
						</button>

						<button class="btn btn-small btn-warning">
							<i class="icon-group"></i>
						</button>

						<button class="btn btn-small btn-danger">
							<i class="icon-cogs"></i>
						</button>
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>
					</div>
				</div><!--#sidebar-shortcuts-->
<?php
$authority=Yii::$app->session->get("authority");
$autharr=json_decode($authority);
?>

<ul class="nav nav-list" >
<?php
	for ($i=0; $i <count($autharr) ; $i++) { 
		if($autharr[$i]->fid=="0"){
?>
		<li  <?php if($autharr[$i]->title==$this->title){echo 'class="active"';}?>>
			<a href="<?=$autharr[$i]->link?>" >		
				<i class="icon-pencil"></i>		
				<span class="menu-text"><?=\Yii::t('app',$autharr[$i]->title)?></span>
			</a>
			<ul class="submenu">
			<?php
			for ($j=0; $j < count($autharr); $j++) { 
				if($autharr[$j]->fid==$autharr[$i]->id){
			?>
				<li <?php if($autharr[$j]->title==$this->title){echo 'class="active"';}?>>
					<a href="<?=$autharr[$j]->link?>">	
						<i class="icon-pencil"></i>					
						<?=\Yii::t('app',$autharr[$j]->title)?>
					</a>
					<ul class="submenu">
					<?php 
					for ($k=0; $k < count($autharr); $k++) { 
						if($autharr[$k]->fid==$autharr[$j]->id){
					?>
						<li <?php if($autharr[$k]->title==$this->title){echo 'class="active"';}?>>
							<a href="<?=$autharr[$k]->link?>">
								<i class="icon-pencil"></i>
								<?=\Yii::t('app',$autharr[$k]->title)?>
							</a>
						</li>
					<?php
						}
					}
					?>

					</ul>
				</li>
			<?php
				}
			}
			?>
			</ul>


		</li>


<?php	}
	}
?>
				</ul><!--/.nav-list-->

