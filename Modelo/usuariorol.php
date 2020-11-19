<?php 
class usuariorol {
    private $usuario;
    private $rol;

    
    
   
    public function __construct(){
        
        $this->usuario="";
        $this->rol="";

    }
    public function setear($usuario, $rol)    {
        $this->usuario=$usuario;
        $this->rol=$rol;


    }
    public function getUsuario(){
		return $this->usuario;
	}

	public function setUsuario($usuario){
		$this->usuario = $usuario;
	}

	public function getRol(){
		return $this->rol;
	}

	public function setRol($rol){
		$this->rol = $rol;
    }
    public function insertar(){
        $resp = false;
        $base=new BaseDatos();
        $idUsuario=$this->getUsuario()->getIdusuario();
        $idRol=getRol()->getIdrol();
        $sql="INSERT INTO usuariorol(idusuario,idrol)  VALUES('".$idUsuario."','".$idRol."');";
        if ($base->Iniciar()) {
            if ($elid = $base->Ejecutar($sql)) {
                //la linea 45 solo tiene sentido si tuviera una variable autoincrementable propia de usuariorol
                //$this->setIdusuario($elid);
                $resp = true;
            } else {
                $this->setmensajeoperacion("usuariorol->insertar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("usuariorol->insertar: ".$base->getError());
        }
        return $resp;
    }
    
    // public function modificar(){
    //     $resp = false;
    //     $base=new BaseDatos();
    //     $idUsuario=$this->getUsuario()->getIdusuario();
    //     $idRol=getRol()->getIdrol();
    //     $sql="UPDATE usuariorol SET idusuario ='".$idUsuario."',idrol ='".$idRol."' WHERE idusuario =".$this->getIdusuario();
    //     if ($base->Iniciar()) {
    //         if ($base->Ejecutar($sql)) {
    //             $resp = true;
    //         } else {
    //             $this->setmensajeoperacion("usuario->modificar: ".$base->getError());
    //         }
    //     } else {
    //         $this->setmensajeoperacion("usuario->modificar: ".$base->getError());
    //     }
    //     return $resp;
    // }
    
    public function eliminar(){
        $resp = false;
        $base=new BaseDatos();
        $idUsuario=$this->getUsuario()->getIdusuario();
        $idRol=getRol()->getIdrol();
        $sql="DELETE FROM usuariorol WHERE idusuario =".$idUsuario."and idrol =".$idRol;
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                return true;
            } else {
                $this->setmensajeoperacion("usuariorol->eliminar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("usuariorol->eliminar: ".$base->getError());
        }
        return $resp;
    }
    
    public static function listar($parametro=""){
        $arreglo = array();
        $base=new BaseDatos();
        $sql="SELECT * FROM usuariorol ";
        if ($parametro!="") {
            $sql.='WHERE '.$parametro;
        }
        $res = $base->Ejecutar($sql);
        if($res>-1){
            
            if($res>0){
                while ($row = $base->Registro()){
                    $obj= new usuario();
                    $objRol=new rol();
                    $usuarioObtenido=$obj->buscarPorId["idusuario=".$row['idusuario']];
                    $rolObtenido=$objRol->listar("idrol=".$row['idrol']);
                    $obj->setear($usuarioObtenido[0],$rolObtenido[0]);
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