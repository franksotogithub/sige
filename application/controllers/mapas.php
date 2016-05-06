<?php 
error_reporting(0);
class Mapas extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$this->load->view('login_view');
	}
	
	
	
 function crear_mapa_giro(){
 
		$id_giro=$_POST['id_giro'];  
		$ubigeo=$_POST['ubigeo'];   
		$contador=$_POST['cont'];
		$nombre_archivo="linea 1"; //echo 1
		if(isset($_POST['persona'])) 
			{ $pers=$_POST['persona'];}
		else {$pers="A"; }
				$nombre_archivo="linea 2"; //echo 1
		if(isset($_POST['ventas'])) 
			{ $vent=$_POST['ventas']; }
		else {$vent="A"; }
			$nombre_archivo="linea 1"; //echo 1
		if((strcmp($pers,"A")!=0) || (strcmp($vent,"A")!=0)){	
			$filtro="";		
			$nombre_archivo="linea 3"; //echo 1		
			$v_personal=array(); //array("p1","p2")
			$v_ventas=array();
			if(strcmp($pers,"A")!=0){
				while ($pers){  $nombre_archivo="linea 4"; //echo 1
					$v_personal[]=substr($pers,0,2); 
					if(strlen($pers)<3) { $pers=""; } 
					else { $pers=substr($pers,3,strlen($pers)-3); }
				}//fin de while
			}//fin de if
			
			if(strcmp($vent,"A")!=0){ $nombre_archivo="linea 5"; //echo 1
				while ($vent){  
					$v_ventas[]=substr($vent,0,2); 
					if(strlen($vent)<3) { $vent="";} 
					else  $vent=substr($vent,3,strlen($vent)-3);
				}//fin de while
			}//fin de if
			
			//$indice=array("i1","i2","i3");
			if((count($v_personal)>0) && (count($v_ventas)>0))
			{ $nombre_archivo="linea 6"; //echo 1
				foreach($v_personal as $po){
					foreach($v_ventas as $ve){
						$filtro.= $po."_".$ve."+";	
					}
				}
			}
			else
			{	$nombre_archivo="linea 6"; //echo 1
				if(count($v_personal)>0) {
					foreach($v_personal as $po){ $filtro.= $po."+";	}		
				}else if (count($v_ventas)>0){
					foreach($v_ventas as $ve){ $filtro.= $ve."+";	}			
				}
			}
			
			if (strlen($filtro)>0){
				$nombre_archivo="linea 7"; //echo 1
				$filtro=substr($filtro,0,strlen($filtro)-1);
				$filtro= ",($filtro) totestab";
			}else $filtro= ",totestab";
		}
		else { $nombre_archivo="linea 8"; //echo 1
		$filtro= ",totestab";	}	
		//centroide geom,
		//GeometryFromText('POINT('||(x(centroide)+0.00015)||' '||(y(centroide)+0.00008)||')',4326) geom2, 
		//GeometryFromText('POINT('||(x(centroide)-0.00015)||' '||(y(centroide)-0.00008)||')',4326) geom3
		/*
		if($contador==1) { 		
			$color="255 53 53";
			$geom="centroide";
		}
		
		if($contador==2) {
			$color="0 0 255";
			$geom="geom1";
		}
		
		if($contador==3) {
			$color="53 170 0"; //223 149 7110 10 10";
			$geom="geom2";
		}
		*/
		if($contador==1) { 		
			$color="225 25 49";
			$geom="centroide";
		}
		
		if($contador==2) {
			$color="63 101 218";
			$geom="geom1";
		}
		
		if($contador==3) {
			$color="6 172 24"; //10 10 10";
			$geom="geom2";
		}
		$ccdd=substr($ubigeo,0,2);
                $ccpp=substr($ubigeo,2,2);
                if(($ccdd.$ccpp)=='0701' || ($ccdd.$ccpp)=='1501'){
                    $where= "where (id_giro=$id_giro) and  ((ccdd='07' and ccpp='01') or (ccdd='15' and ccpp='01'))";
                } else{
                    $where= "where id_giro=$id_giro and ccdd='". $ccdd."' and ccpp='".$ccpp."'";
                }		
		$tabla= "select $geom geom,id_dato,id_manzana,id_giro,ccdd,ccpp $filtro from datomxneg_mz $where"; 		
	 	
		$texto_map='MAP
				FONTSET "../fonts/fonts.fnt"
				SYMBOLSET "../symbols/symbset.sym"
				WEB		
					METADATA
						wms_title "Mapas Tematicos"
						wms_abstract "Capas"			
					END
				END
				PROJECTION	  
					"init=epsg:4326"
				END
				UNITS dd
				LAYER
					NAME "giro'.$id_giro.'"
					TYPE point
					CONNECTIONTYPE postgis 		
					CONNECTION "host=192.168.201.76 port=5432 dbname=signeg_bd_nac  user=usSigneg password=Signeg2605"
					DATA "geom from ('.$tabla.') AS datomxneg_mz using UNIQUE id_dato using SRID=4326"													
					STATUS on
					TRANSPARENCY 100
					TOLERANCE 7
					TOLERANCEUNITS pixels 		
					METADATA
						WMS_SRS  "epsg:4326"
						WMS_TITLE "Giros"	  
					END  
					PROJECTION
						"init=epsg:4326"
					END
					CLASSITEM "totestab"
					LABELITEM "totestab"
					CLASS
						NAME "1"
						EXPRESSION ([totestab]=1)				  	
						MAXSCALE 22550			
						STYLE
							SYMBOL circulo_fill
							SIZE 15
							COLOR '.$color.'
							OUTLINECOLOR -1 -1 -1
							#OFFSET 1 1
						END #STYLE
						STYLE
							SYMBOL circulo
							SIZE 14
							COLOR 0 0 0
							OUTLINECOLOR -1 -1 -1
						END #STYLE
						LABEL
							COLOR 255 255 240
							SIZE 6
							FONT Vera
							TYPE truetype							
							POSITION cc														
							MINSIZE 1
							FORCE TRUE							
						END #label
					END #CLASS 
					CLASS
						NAME "2 - 3"
						EXPRESSION ([totestab]>=2 AND [totestab]<=3)
						MAXSCALE 22550
						STYLE
							SYMBOL circulo_fill
							SIZE 17
							COLOR '.$color.'
							OUTLINECOLOR -1 -1 -1
							OFFSET 1 1
						END #STYLE	
						STYLE
							SYMBOL circulo
							SIZE 16
							COLOR 0 0 0
							OUTLINECOLOR -1 -1 -1
						END #STYLE
						LABEL
							COLOR 255 255 240
							SIZE 6
							FONT Vera
							TYPE truetype							
							POSITION cc														
							MINSIZE 1
							FORCE TRUE
						END #label	 
					END #CLASS		 
					CLASS
						NAME "3 - 5"
						EXPRESSION ([totestab]  > 3 AND [totestab] <= 5)
						MAXSCALE 22550
						STYLE
							SYMBOL circulo_fill
							SIZE 18
							COLOR '.$color.'
							OUTLINECOLOR -1 -1 -1
							#OFFSET 1 1
						END #STYLE		
						STYLE
							SYMBOL circulo
							SIZE 18
							COLOR 0 0 0
							OUTLINECOLOR -1 -1 -1
						END #STYLE 
						LABEL
							COLOR 255 255 240
							SIZE 6
							FONT Vera
							TYPE truetype							
							POSITION cc														
							MINSIZE 1
							FORCE TRUE
						END #label
					END #CLASS		 
					CLASS
						NAME "6 a mas"
						EXPRESSION ([totestab] >= 6)
						MAXSCALE 22550
						STYLE
							SYMBOL circulo_fill
							SIZE 21
							COLOR '.$color.'
							OUTLINECOLOR -1 -1 -1
							#OFFSET 1 1
						END #STYLE	
						STYLE
							SYMBOL circulo
							SIZE 20
							COLOR 0 0 0
							OUTLINECOLOR -1 -1 -1
						END #STYLE	 
						LABEL
							COLOR 255 255 240
							SIZE 6
							FONT Vera
							TYPE truetype							
							POSITION cc														
							MINSIZE 1
							FORCE TRUE
						END #label
					END #CLASS		
				END # LAYER 
			END # MAP';
				
		$numero=time();
		$nombre_archivo="giro_$contador$numero.map";
		$mapita = fopen("map/$nombre_archivo", "a");
		if ($mapita){
			fputs($mapita,$texto_map);
			fclose($mapita);
		} // de if

	echo $nombre_archivo;

}
//de funcion
	//***************** FUNCION ESTRATOS POBLACION
	function crear_mapa_poblacion(){
		//global $nombre_archivo,$id_giro;		
		$ubigeo=$_POST['ubigeo']; 
		
		if(isset($_POST['sexo'])) 	{ $sexo=$_POST['sexo'];} 	else {$sexo="A"; }		
		if(isset($_POST['edades'])) 	{ $edades=$_POST['edades']; }	else {$edades="A"; }
		if(isset($_POST['estudio'])) 	{ $estudio=$_POST['estudio'];} 	else {$estudio="A"; }		
		if(isset($_POST['pea'])) 	{ $pea=$_POST['pea']; }		else {$pea="A"; }
	
		if((strcmp($sexo,'A')!=0) || (strcmp($edades,'A')!=0) || (strcmp($estudio,'A')!=0) ||(strcmp($pea,'A')!=0)  ){	
			$filtro="";		
			$v_sexo=array(); //array("p1","p2")
			$v_edades=array();
			$v_estudio=array();
			$v_pea=array();
			
			if(strcmp($sexo,'A')!=0){
				while ($sexo){  
					$v_sexo[]=substr($sexo,0,2); 
					if(strlen($sexo)<3) { $sexo=""; } 
					else { $sexo=substr($sexo,3,strlen($sexo)-3); }
				}//fin de while
			}//fin de if
			
			if(strcmp($edades,'A')!=0){
				while ($edades){  
					$v_edades[]=substr($edades,0,2); 
					if(strlen($edades)<3) { $edades="";} 
					else  $edades=substr($edades,3,strlen($edades)-3);
				}//fin de while
			}//fin de if
			
			if(strcmp($estudio,'A')!=0){
				while ($estudio){  
					$v_estudio[]=substr($estudio,0,2); 
					if(strlen($estudio)<3) { $estudio="";} 
					else  $estudio=substr($estudio,3,strlen($estudio)-3);
				}//fin de while
			}//fin de if
			
			if(strcmp($pea,'A')!=0){
				while ($pea){  
					$v_pea[]=substr($pea,0,4); 
					if(strlen($pea)<5) { $pea="";} 
					else  $pea=substr($pea,5,strlen($pea)-5);
				}//fin de while
			}//fin de if
			
			//$indice=array("i1","i2","i3");
			if((count($v_sexo)>0) && (count($v_edades)>0) && (count($v_estudio)>0) && (count($v_pea)>0) )
			{
				foreach($v_sexo as $se){
					foreach($v_edades as $ed){
						foreach($v_estudio as $es){
							foreach($v_pea as $pe){
								$filtro.= $se."_".$ed."_".$es."_".$pe."+";		
							}
						}
						
					}
				}
			}
			
			if (strlen($filtro)>0){
				$filtro=substr($filtro,0,strlen($filtro)-1);
				$filtro= ",($filtro) totpob";
			}else $filtro= ",totpob";
		}
		else { $filtro= ",totestab";	}	
		//centroide geom,
		//GeometryFromText('POINT('||(x(centroide)+0.00015)||' '||(y(centroide)+0.00008)||')',4326) geom2, 
		//GeometryFromText('POINT('||(x(centroide)-0.00015)||' '||(y(centroide)-0.00008)||')',4326) geom3		
		
	
		$where= "where ccdd='".substr($ubigeo,0,2)."' and ccpp='".substr($ubigeo,2,2)."'"; 		
		$tabla= "select geom,id_dato,id_manzana,ccdd,ccpp $filtro from datomxpob_mz $where"; 	
	 	
		$texto_map='MAP
			    FONTSET "../fonts/fonts.fnt"
			    SYMBOLSET "../symbols/symbset.sym"
			    WEB		
				METADATA
					wms_title "Mapas Tematicos"
					wms_abstract "Capas"			
				END
			    END
			    PROJECTION	  
				"init=epsg:4326"
			    END
			    UNITS dd
			   
			    LAYER
				NAME "poblacion"
				TYPE polygon
				CONNECTIONTYPE postgis
				CONNECTION "host=192.168.201.76 port=5432 dbname=signeg_bd_nac  user=usSigneg password=Signeg2605"
				DATA "geom from ('.$tabla.') AS poblacion USING UNIQUE id_dato using SRID=4326"
		   		STATUS on
				TRANSPARENCY 100
				TOLERANCE 7
				TOLERANCEUNITS pixels 	
		 		METADATA
			  		WMS_SRS  "epsg:4326"
				  	WMS_TITLE "Poblacion"	  
				END 
				PROJECTION
					"init=epsg:4326"
				END
				CLASSITEM "totpob"
				CLASS
				  	NAME "1 - 100"
				  	EXPRESSION ([totpob]>=1 AND [totpob]<=100)				  	
					MAXSCALE 22550			
					STYLE
				   		COLOR 254 184 189
		   				OUTLINECOLOR 178 178 178
						WIDTH 1
				  	END #STYLE			
				 END #CLASS 
				CLASS
				       NAME "101 - 200"
				       EXPRESSION ([totpob]>=101 AND [totpob]<=200)
				       MAXSCALE 22550
				       STYLE
					       COLOR 251 210 243
					       OUTLINECOLOR 178 178 178
					       WIDTH 1
				       END #STYLE				
				END #CLASS		 
				CLASS
				       NAME "201 - 500"
				       EXPRESSION ([totpob]>=201 AND [totpob]<=500)
				       MAXSCALE 22550
				       STYLE
					       COLOR 192 197 253
					       OUTLINECOLOR 178 178 178
					       WIDTH 1
				       END #STYLE				
				END #CLASS		 
				CLASS
				       NAME "500 a mas"
				       EXPRESSION ([totpob] > 500)
				       MAXSCALE 22550
				       STYLE
					       COLOR 183 253 249
					       OUTLINECOLOR 178 178 178
					       WIDTH 1
				       END #STYLE				
				END #CLASS
			    END #END LAYER 
			END # MAP';
				
		$numero=time();
		$nombre_archivo="pob_$numero.map";
		$mapita = fopen("map/$nombre_archivo", "a");
		if ($mapita){
			fputs($mapita,$texto_map);
			fclose($mapita);
		} // de if

	echo $nombre_archivo;
	}//de funcion
	
	//*****************************************************************************************
	//*****************************************************************************************
	function exportar_mapa(){
		$factorx=0;//0.0001;
		$factory=0;//0.004;
		$minx=$_POST['minx']+$factorx;
		$maxx=$_POST['maxx']-$factorx;
		$miny=$_POST['miny']+$factory;
		$maxy=$_POST['maxy']-$factory;
		$estra=$_POST['estra'];
		$pobla=$_POST['pobla'];
		$mapapobla=$_POST['mapa_pobla'];
		if(isset($_POST['giro0'])) 	{ $giro1=$_POST['giro0']; $layerg1=$_POST['idgiro0'];}
		if(isset($_POST['giro1'])) 	{ $giro2=$_POST['giro1']; $layerg2=$_POST['idgiro1'];}
		if(isset($_POST['giro2'])) 	{ $giro3=$_POST['giro2']; $layerg3=$_POST['idgiro2'];}		
		
		if(isset($_POST['cad_influencia'])) 	{ $cad_influencia=$_POST['cad_influencia'];}	
		
		$si=$_POST['si'];
		$v_si=array();
		while ($si){  
			$v_si[]=substr($si,0,1); 
			if(strlen($si)<=1) { $si="";} 
			else  $si=substr($si,1,strlen($si)-1);
		}//fin de while
		
		if (!extension_loaded("MapScript")){ 
			dl('php_mapscript.'.PHP_SHLIB_SUFFIX);
		}

		$mapObject = ms_newMapObj("map/mapa_negocios.map");
		$mapObject->setSize(800,500);
		$mapObject->setExtent($minx,$miny,$maxx,$maxy);
		//**********Personalizando layer Poblacion y Estrato 
	 
		 $capaEstrato=$mapObject->getLayerByName("estratos_manzana");
		 if ($estra=="1") { $capaEstrato->updateFromString("LAYER STATUS ON END");}
		 else {$capaEstrato->updateFromString("LAYER STATUS OFF END"); }

	
	 
		 //**********Personalizando layer Poblacion
		 //$capaPoblacion=$mapObject->getLayerByName("poblacion");

		 if(isset($mapapobla) && $mapapobla!="A"){
			$capap1=$mapObject->getLayerByName("poblacion");
			$mapObject->removeLayer($capap1->index);
			
			$mapPobla = ms_newMapObj($mapapobla);			
			$capap=$mapPobla->getLayerByName("poblacion");			
			$mapObject->insertLayer($capap);
			
			$capaPoblacion=$mapObject->getLayerByName("poblacion");	 
			if ($pobla=="1") { $capaPoblacion->updateFromString("LAYER STATUS ON END");}
			else {$capaPoblacion->updateFromString("LAYER STATUS OFF END"); }
			$indice=$capaPoblacion->index;			
		 }
	 
		//**********
		//****CREAR POLIGONO AREA DE INFLUENCIA
			
		//**************FUNCION INFLUENCIA		

		if (isset($cad_influencia) && $cad_influencia!=""){
			$MyLayer = $mapObject->getLayerByName("areainfluencia");
			$cad_influencia=substr($cad_influencia,1,strlen($cad_influencia)-2);
			$v_influ=explode('{"type":"MultiPolygon","coordinates":',$cad_influencia);
			$n_influ=count($v_influ);
			for($i=1;$i<$n_influ;$i++) {
				$NewLine = ms_newLineObj(); //PtoInicial=PtoFinal
				if($i==($n_influ-1)) $v_influ[$i]=substr($v_influ[$i],3,strlen($v_influ[$i])-7);
				else $v_influ[$i]=substr($v_influ[$i],3,strlen($v_influ[$i])-8);
				$v_influ[$i]=substr($v_influ[$i],1,strlen($v_influ[$i])-2);
				$v_influ[$i]=explode('],[',$v_influ[$i]);
				$n_influ2=count($v_influ[$i]);
				//echo "<br> linea $i : ";		
				for($j=0;$j<$n_influ2;$j++){
					$xy_influ=explode(',',$v_influ[$i][$j]);
					//echo "<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;dato $j : x=".$xy_influ[0]." &nbsp;&nbsp;&nbsp;y=".$xy_influ[1];
					$NewLine->addXY($xy_influ[0],$xy_influ[1]);
				}
				$NewShape = ms_newShapeObj(MS_SHAPE_POLYGON);
				$NewShape->add($NewLine);
				$MyLayer->AddFeature($NewShape); 
				$NewShape->free();
				$NewLine->free();
			}
													
			$mapObject->removeLayer($MyLayer->index);
			$mapObject->insertLayer($MyLayer);
		}

		 //**************************************
		//**********
		//regenerando viatramo


		$capapn=$mapObject->getLayerByName("via_tramos");
		$mapObject->removeLayer($capapn->index);
		$mapObject->InsertLayer($capapn);



			//----
		//**********Personalizando layer Sitios de Interes 

		 $capas=$mapObject->getAllLayerNames();
		 $numcapas= count($capas);
		 $j=0;
		 for($i=0;$i<$numcapas;$i++){
		     if(substr($capas[$i],0,3)=="si_"){
			//regenerando los sitios de interes
			$capapn=$mapObject->getLayerByName($capas[$i]);
			$mapObject->removeLayer($capapn->index);
			$mapObject->InsertLayer($capapn);
			//----
			$capasi=$mapObject->getLayerByName($capas[$i]);
			if ($v_si[$j]=="1") {$capasi->updateFromString("LAYER STATUS ON END");}
			else {$capasi->updateFromString("LAYER STATUS OFF END");}			
			$j++;
		     }			     
		 }

		 //**********Personalizando layer Giros de Negocio

		 if(isset($giro1) && $giro1!="A"){
			$mapGiro = ms_newMapObj($giro1);			
			$capag1=$mapGiro->getLayerByName($layerg1);
			$mapObject->insertLayer($capag1);
		 }
		 if(isset($giro2) && $giro2!="A"){
			$mapGiro = ms_newMapObj($giro2);			
			$capag2=$mapGiro->getLayerByName($layerg2);
			$mapObject->insertLayer($capag2);
		 }
		 if(isset($giro3) && $giro3!="A"){
			$mapGiro = ms_newMapObj($giro3);			
			$capag3=$mapGiro->getLayerByName($layerg3);
			$mapObject->insertLayer($capag3);
		 }
		
	 
		$mapImage = $mapObject->draw();
		//$mapImage->imagepath="/var/www/html/SIG-NEGOCIOS/map/";
		$mapImage->imagepath="/var/www/html/test/atlas/map";
		$urlImage = $mapImage->saveWebImage();
		echo $urlImage;	
	}//fin de funcion

/*************************************************************************************************************************/
/*************************************************************************************************************************/
/*************************************************************************************************************************/
	function exportar_mapa_otro() {
       	$factorx=0;//0.0001;
		$factory=0;//0.004;
		$minx=$_POST['minx']+$factorx;
		$maxx=$_POST['maxx']-$factorx;
		$miny=$_POST['miny']+$factory;
		$maxy=$_POST['maxy']-$factory;
		$estra=$_POST['estra'];
		$pobla=$_POST['pobla'];
		$mapapobla=$_POST['mapa_pobla'];
		if(isset($_POST['giro0'])) 	{ $giro1=$_POST['giro0']; $layerg1=$_POST['idgiro0'];}
		if(isset($_POST['giro1'])) 	{ $giro2=$_POST['giro1']; $layerg2=$_POST['idgiro1'];}
		if(isset($_POST['giro2'])) 	{ $giro3=$_POST['giro2']; $layerg3=$_POST['idgiro2'];}		
		
		if(isset($_POST['cad_influencia'])) 	{ $cad_influencia=$_POST['cad_influencia'];}	
		
		$si=$_POST['si'];
		$v_si=array();
		while ($si){  
			$v_si[]=substr($si,0,1); 
			if(strlen($si)<=1) { $si="";} 
			else  $si=substr($si,1,strlen($si)-1);

		}//fin de while
		
		if (!extension_loaded("MapScript")){ 
			dl('php_mapscript.'.PHP_SHLIB_SUFFIX);
		}

		$mapObject = ms_newMapObj("map/mapa_negocios_cp.map");
		$mapObject->setSize(800,500);
		$mapObject->setExtent($minx,$miny,$maxx,$maxy);


		//Personalizando layer Poblacion y Estrato 
		 $capaEstrato=$mapObject->getLayerByName("estratos_manzana");
		 
		// if ($estra=="1") { $capaEstrato->updateFromString("LAYER STATUS ON END");}
		// else {$capaEstrato->updateFromString("LAYER STATUS OFF END"); }

	
	 
		 //Personalizando layer Poblacion
/*
		 if(isset($mapapobla) && $mapapobla!="A"){
			$capap1=$mapObject->getLayerByName("poblacion");
			$mapObject->removeLayer($capap1->index);
			
			$mapPobla = ms_newMapObj($mapapobla);			
			$capap=$mapPobla->getLayerByName("poblacion");			
			$mapObject->insertLayer($capap);
			
			$capaPoblacion=$mapObject->getLayerByName("poblacion");	 
			if ($pobla=="1") { $capaPoblacion->updateFromString("LAYER STATUS ON END");}
			else {$capaPoblacion->updateFromString("LAYER STATUS OFF END"); }
			$indice=$capaPoblacion->index;			
		 }
*/	 

		//CREAR POLIGONO AREA DE INFLUENCIA
		//FUNCION INFLUENCIA		
/*
		if (isset($cad_influencia) && $cad_influencia!=""){
			$MyLayer = $mapObject->getLayerByName("areainfluencia");
			$cad_influencia=substr($cad_influencia,1,strlen($cad_influencia)-2);
			$v_influ=explode('{"type":"MultiPolygon","coordinates":',$cad_influencia);
			$n_influ=count($v_influ);
			for($i=1;$i<$n_influ;$i++) {
				$NewLine = ms_newLineObj(); //PtoInicial=PtoFinal
				if($i==($n_influ-1)) $v_influ[$i]=substr($v_influ[$i],3,strlen($v_influ[$i])-7);
				else $v_influ[$i]=substr($v_influ[$i],3,strlen($v_influ[$i])-8);
				$v_influ[$i]=substr($v_influ[$i],1,strlen($v_influ[$i])-2);
				$v_influ[$i]=explode('],[',$v_influ[$i]);
				$n_influ2=count($v_influ[$i]);

				for($j=0;$j<$n_influ2;$j++){
					$xy_influ=explode(',',$v_influ[$i][$j]);
					$NewLine->addXY($xy_influ[0],$xy_influ[1]);
				}
				$NewShape = ms_newShapeObj(MS_SHAPE_POLYGON);
				$NewShape->add($NewLine);
				$MyLayer->AddFeature($NewShape); 
				$NewShape->free();
				$NewLine->free();
			}
													
			$mapObject->removeLayer($MyLayer->index);
			$mapObject->insertLayer($MyLayer);
		}
*/


		//regenerando viatramo

		$capapn=$mapObject->getLayerByName("via_tramos");
		$mapObject->removeLayer($capapn->index);
		//$mapObject->InsertLayer($capapn);

		//Personalizando layer Sitios de Interes 
		 $capas=$mapObject->getAllLayerNames();
		 $numcapas= count($capas);
		 $j=0;


		 for($i=0;$i<$numcapas;$i++){
			$capapn=$mapObject->getLayerByName($capas[$i]);
			$mapObject->removeLayer($capapn->index);

		    if(substr($capas[$i],0,3)=="si_"){
				//regenerando los sitios de interes
				$capapn=$mapObject->getLayerByName($capas[$i]);
				$mapObject->removeLayer($capapn->index);
				$mapObject->InsertLayer($capapn);
				//----
				$capasi=$mapObject->getLayerByName($capas[$i]);
				if ($v_si[$j]=="1") {$capasi->updateFromString("LAYER STATUS ON END");}
				else {$capasi->updateFromString("LAYER STATUS OFF END");}			
				
				$j++;
		    }			     
		 }


		 //Personalizando layer Giros de Negocio
/*
		 if(isset($giro1) && $giro1!="A"){
			$mapGiro = ms_newMapObj($giro1);			
			$capag1=$mapGiro->getLayerByName($layerg1);
			$mapObject->insertLayer($capag1);
		 }
		 if(isset($giro2) && $giro2!="A"){
			$mapGiro = ms_newMapObj($giro2);			
			$capag2=$mapGiro->getLayerByName($layerg2);
			$mapObject->insertLayer($capag2);
		 }
		 if(isset($giro3) && $giro3!="A"){
			$mapGiro = ms_newMapObj($giro3);			
			$capag3=$mapGiro->getLayerByName($layerg3);
			$mapObject->insertLayer($capag3);
		 }
*/		
	 
		$mapImage = $mapObject->draw();
		$mapImage->imagepath="/var/www/html/test/atlas/map";
		$urlImage = $mapImage->saveWebImage();
		echo $urlImage;	
    }

}

/* End of */
