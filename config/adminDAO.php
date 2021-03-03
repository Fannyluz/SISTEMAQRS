<?php
	require_once '../db/accesoDB.php';
	date_default_timezone_set("America/Lima");
	
	function fechaNormal($fecha){
		$nfecha = date('d/m/Y',strtotime($fecha));
		return $nfecha;
	}
	
	class adminDAO{
		
		public function allBitacora(){
			try{
				$pdo = AccesoDB::getConnectionPDO();
				
				$sql = 'SELECT * FROM oevcastcaso ORDER BY CAScodigo DESC';
				
				$stmt = $pdo->query($sql);
				$stmt->execute();
				
				$return = $stmt->fetchAll();
				return $return;
				
			} catch (Exception $e){
				throw $e;
			}	
		}
		
		public function buscarAllBitacoraFecha($desde,$hasta){
			try{
				$pdo = AccesoDB::getConnectionPDO();
				
				$sql = 'SELECT * FROM oevcastcaso WHERE CASfecha BETWEEN "'.$desde.'" AND "'.$hasta.'" ORDER BY CAScodigo DESC';
				
				$stmt = $pdo->prepare($sql);
				$stmt->execute();
				
				$return = $stmt->fetchAll();
				return $return;
				
			} catch (Exception $e){
				throw $e;
			}	
		}
		
		
		
		
		
		
	}
	
?>