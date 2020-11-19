<?php 
class usuario {
    private $idusuario;
    private $usnombre;
    private $uspass;
    private $usmail;
    private $usdesabilitado;
    private $colRoles;
    
    
   
    public function __construct(){
        
        $this->idusuario="";
        $this->usnombre="";
        $this->uspass="";
        $this->usmail="";
        $this->usdesabilitado="";
        $this->colRoles="";
    }
    public function setear($usnombre , $uspass , $usmail)    {
        $this->idusuario="";
        $this->usnombre=$usnombre;
        $this->uspass=$uspass;
        $this->usmail=$usmail;
        $this->usdesabilitado="";
        $this->colRoles="";

    }
    public function getIdusuario(){
		return $this->idusuario;
	}

	public function setIdusuario($idusuario){
		$this->idusuario = $idusuario;
	}

	public function getUsnombre(){
		return $this->usnombre;
	}

	public function setUsnombre($usnombre){
		$this->usnombre = $usnombre;
	}

	public function getUspass(){
		return $this->uspass;
	}

	public function setUspass($uspass){
		$this->uspass = $uspass;
	}

	public function getUsmail(){
		return $this->usmail;
	}

	public function setUsmail($usmail){
		$this->usmail = $usmail;
	}

	public function getUsdesabilitado(){
		return $this->usdesabilitado;
	}

	public function setUsdesabilitado($usdesabilitado){
		$this->usdesabilitado = $usdesabilitado;
	}

	public function getColRoles(){
		return $this->colRoles;
	}

	public function setColRoles($colRoles){
		$this->colRoles = $colRoles;
	}
	public function insertar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="INSERT INTO usuario(usnombre,uspass,usmail)  VALUES('".$this->getUsnombre()."','".$this->getUspass()."','".$this->getUsmail()."');";
        if ($base->Iniciar()) {
            if ($elid = $base->Ejecutar($sql)) {
                $this->setIdusuario($elid);
                $resp = true;
            } else {
                $this->setmensajeoperacion("usuario->insertar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("usuario->insertar: ".$base->getError());
        }
        return $resp;
    }
    
    public function modificar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="UPDATE usuario SET usnombre='".$this->getUsnombre()."',uspass='".$this->getUspass()."',usmail='".$this->getUsmail()."' WHERE idusuario =".$this->getIdusuario();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setmensajeoperacion("usuario->modificar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("usuario->modificar: ".$base->getError());
        }
        return $resp;
    }
    
    public function eliminar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="DELETE FROM usuario WHERE idusuario =".$this->getIdusuario();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                return true;
            } else {
                $this->setmensajeoperacion("usuario->eliminar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("usuario->eliminar: ".$base->getError());
        }
        return $resp;
    }
    
    public static function listar($parametro=""){
        $arreglo = array();
        $base=new BaseDatos();
        $sql="SELECT * FROM usuario ";
        if ($parametro!="") {
            $sql.='WHERE '.$parametro;
        }
        $res = $base->Ejecutar($sql);
        if($res>-1){
            
            if($res>0){
                while ($row = $base->Registro()){
                    $obj= new usuario();
                    $obj->setear($row['idusuario '], $row['usnombre'],$row['uspass'],$row['usmail'],$row['usdeshabilitado']);
                    array_push($arreglo, $obj);
                }
               
            }
            
        } else {
            
            //$this->setmensajeoperacion("Tabla->listar: ".$base->getError());
        }
 
        return $arreglo;
	}
	// public function buscarPorId($parametro=""){
	// 	$arreglo = array();
	// 	$base=new BaseDatos();
	// 	$objResultante=null;
    //     $sql="SELECT * FROM usuario ";
    //     if ($parametro!="") {
    //         $sql.='WHERE'.$parametro;
    //     }
    //     $res = $base->Ejecutar($sql);
    //     if($res>-1){
    //         if($res>0){
    //             while ($row = $base->Registro()){
    //                 $obj= new usuario();
    //                 $obj->setear($row['idusuario '], $row['usnombre'],$row['uspass'],$row['usmail'],$row['usdeshabilitado']);
    //                 array_push($arreglo, $obj);
	// 			}
	// 			$objResultante=$arreglo[0];
               
    //         }
            
    //     } else {
            
    //         //$this->setmensajeoperacion("Tabla->listar: ".$base->getError());
    //     }
		
    //     return $objResultante;
	// }

}
?>