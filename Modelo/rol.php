<?php 
class rol {
    private $idrol;
    private $rodescripccion;
    private $usuarios;
    
    
   
    public function __construct(){
        
        $this->idrol="";
        $this->rodescripccion="";
        $this->usuarios="";

    }
    public function setear($idrol,$rodescripccion)    {
        $this->idrol=$idrol;
        $this->rodescripccion=$rodescripccion;
        $this->usuarios="";

    }
    public function getIdrol(){
		return $this->idrol;
	}

	public function setIdrol($idrol){
		$this->idrol = $idrol;
	}

	public function getRodescripccion(){
		return $this->rodescripccion;
	}

	public function setRodescripccion($rodescripccion){
		$this->rodescripccion = $rodescripccion;
	}

	public function getUsuarios(){
		return $this->usuarios;
	}

	public function setUsuarios($usuarios){
		$this->usuarios = $usuarios;
	}
	public function insertar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="INSERT INTO rol(rodescripcion)  VALUES('".$this->getRodescripccion()."');";
        if ($base->Iniciar()) {
            if ($elid = $base->Ejecutar($sql)) {
                $this->setIdrol($elid);
                $resp = true;
            } else {
                $this->setmensajeoperacion("rol->insertar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("rol->insertar: ".$base->getError());
        }
        return $resp;
    }
    
    public function modificar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="UPDATE rol SET rodescripcion='".$this->getRodescripccion()."' WHERE idrol  =".$this->getIdrol();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setmensajeoperacion("rol->modificar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("rol->modificar: ".$base->getError());
        }
        return $resp;
    }
    
    public function eliminar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="DELETE FROM rol WHERE idrol =".$this->getIdrol();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                return true;
            } else {
                $this->setmensajeoperacion("rol->eliminar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("rol->eliminar: ".$base->getError());
        }
        return $resp;
    }
    
    public static function listar($parametro=""){
        $arreglo = array();
        $base=new BaseDatos();
        $sql="SELECT * FROM rol ";
        if ($parametro!="") {
            $sql.='WHERE '.$parametro;
        }
        $res = $base->Ejecutar($sql);
        if($res>-1){
            
            if($res>0){
                while ($row = $base->Registro()){
					$obj= new rol();
					$obj->setear($row['idrol '],$row['rodescripcion']);
                    array_push($arreglo, $obj);
                }
               
            }
            
        } else {
            
            //$this->setmensajeoperacion("Tabla->listar: ".$base->getError());
        }
 
        return $arreglo;
    }
}
?>