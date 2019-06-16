<?php


//dpm($rows);
?>
<div style="height: 600px;border: 1px solid #A5A197;border-radius: 20px; font-family: cursive;font-style: oblique;font-weight: bold;background-color: #F1E3BC;">
	<!– El individuo –>
	<div class="<?php if($rows[0]['field_sexo']=='Macho'){echo 'macho';

		}else echo 'hembra' ?>"
		style="position:absolute; top:250px; left:20px;" >
			  <?php print $rows[0]['title'] ?>
		
	</div>
	<!– Los padres –>

	<?php
	if(isset($rows[0]['field_padre'])){
		$cadena=$rows[0]['field_padre'];
		$resultado=funcionesExtra_getNodeByTitle($cadena);
		$abuelos=node_load($resultado);
		if(isset($abuelos->field_padre['und'][0]['target_id'])){
			$progenitor=node_load($abuelos->field_padre['und'][0]['target_id']);
			$top='40px';
			$left='370px';
			$sexo="macho";
			comprobar_genealogia($progenitor,$top,$left,$sexo);
		
			if(isset($progenitor->field_padre['und'][0]['target_id'])){
				$bisabuelo=node_load($progenitor->field_padre['und'][0]['target_id']);
				$top='0px';
				 $left='550px';
				 $sexo="macho";
				 comprobar_genealogia($bisabuelo,$top,$left,$sexo);
			}
			if(isset($progenitor->field_madre['und'][0]['target_id'])){
				 $bisabuela=node_load($progenitor->field_madre['und'][0]['target_id']);
			     $top='70px';
				 $left='550px';
				 $sexo="hembra";
				 //dpm($bisabuela);
				comprobar_genealogia($bisabuela,$top,$left,$sexo);
			}
		}
		if(isset($abuelos->field_madre['und'][0]['target_id'])){
		 $progenitor=node_load($abuelos->field_madre['und'][0]['target_id']);
		 $top='170px';
		 $left='370px';
		 $sexo="hembra";
		 comprobar_genealogia($progenitor,$top,$left,$sexo);
		
			if(isset($progenitor->field_padre['und'][0]['target_id'])){	
				$bisabuelo=node_load($progenitor->field_padre['und'][0]['target_id']);
				$top='135px';
				 $left='550px';
				 $sexo="macho";
				 comprobar_genealogia($bisabuelo,$top,$left,$sexo);
			}
			if(isset($progenitor->field_madre['und'][0]['target_id'])){
				 $bisabuela=node_load($progenitor->field_madre['und'][0]['target_id']);
			     $top='200px';
				 $left='550px';
				 $sexo="hembra";
				 comprobar_genealogia($bisabuela,$top,$left,$sexo);
			}
		}	
		?>
		<!– Imprimimos El Padre –>
		<div class="macho" style="position:absolute; top:150px; left:200px;">
			  <?php if(!empty($rows[0]['field_padre'])){print $rows[0]['field_padre']; } else print "Desconocido" ?>
		</div>

		<!- La Madre ->
	<?php }
	if(isset($rows[0]['field_madre'])){
		$cadena=$rows[0]['field_madre'];
		$resultado=funcionesExtra_getNodeByTitle($cadena);
	
	 	 $abuelos=node_load($resultado);
	 	 
	 	if(isset($abuelos->field_padre['und'][0]['target_id'])){
		 	 $progenitor=node_load($abuelos->field_padre['und'][0]['target_id']);
			 $top='300px';
			 $left='370px';
			 $sexo="macho";
			comprobar_genealogia($progenitor,$top,$left,$sexo);
			if(isset($progenitor->field_padre['und'][0]['target_id'])){
				$bisabuelo=node_load($progenitor->field_padre['und'][0]['target_id']);
				$top='265px';
				$left='550px';
				$sexo="macho";
			 	comprobar_genealogia($bisabuelo,$top,$left,$sexo);
			}
			if(isset($progenitor->field_madre['und'][0]['target_id'])){
				 $bisabuela=node_load($progenitor->field_madre['und'][0]['target_id']);
			     $top='330px';
				 $left='550px';
				 $sexo="hembra";
				 //dpm($bisabuela);
				 comprobar_genealogia($bisabuela,$top,$left,$sexo);
			}
		}
		 if(isset($abuelos->field_madre['und'][0]['target_id'])){
		 	$progenitor=node_load($abuelos->field_madre['und'][0]['target_id']);
			$top='440px';
			$left='370px';
			$sexo="hembra";
			comprobar_genealogia($progenitor,$top,$left,$sexo);
		 		 
			 if(isset($progenitor->field_padre['und'][0]['target_id'])){
			 	$bisabuelo=node_load($progenitor->field_padre['und'][0]['target_id']);
				$top='400px';
				 $left='550px';
				 $sexo="macho";
				 comprobar_genealogia($bisabuelo,$top,$left,$sexo);
				}
			if(isset($progenitor->field_madre['und'][0]['target_id'])){
				 $bisabuela=node_load($progenitor->field_madre['und'][0]['target_id']);
			     $top='470px';
				 $left='550px';
				 $sexo="hembra";
				 //dpm($bisabuela);
				 comprobar_genealogia($bisabuela,$top,$left,$sexo);
			}
		}
		?>
		
			
		<div class="hembra" style="position:absolute; top:400px; left:200px;">
			 <?php if(!empty($rows[0]['field_madre'])){print $rows[0]['field_madre']; } else print "Desconocida" ?>
		
		</div>

	<?php }?>
</div>
<?php 

function comprobar_genealogia($progenitor,$top,$left,$sexo){
	if(!empty($progenitor)){
						?>
			
		<div class="<?php echo $sexo ?>" style="position: absolute; margin: <?php echo $top ?> 0px 0px <?php echo $left ?>;">
			  <?php 
			  //dpm($progenitor);
			   print $progenitor->title;
			   ?>
		
		</div>
			
	<?php }
}
?>
