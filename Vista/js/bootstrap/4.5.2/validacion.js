$('#formAMarchivo').bootstrapValidator({

    message: 'Este valor no es valido',

    

    fields: {

        nombreArchivo: {

            validators: {

                notEmpty: {

                    message: 'El nombre es obligatorio'

                },
                
            }

        },
        usuarioCarga:{

            validators: {

                notEmpty: {

                    message: 'El usuario es obligatorio'

                },
                
            }

        },
        
    }

})




$('#formComp').bootstrapValidator({

    message: 'Este valor no es valido',

    fields: {

        nombreArchivoACom: {

            validators: {

                notEmpty: {

                    message: 'El nombre es obligatorio'

                },
                
            }

        },
        
        usuarioCargaCom:{

            validators: {

                notEmpty: {

                    message: 'El usuario es obligatorio'

                },
                
            }

        },

        contraseñaArchivo:{
            validators: {

                notEmpty: {

                    message: 'La contraseña es obligatoria'

                },
                
                
            }

        },
        
    }

});




$('#contraseñaArchivo').change( 
    
    function() {  
        contraseña=$("#contraseñaArchivo").val();
        expresionNumeros=/^([0-9]){1,6}$/;
        expresionLetras=/^([a-zA-Z]){1,6}$/;
        expresionCompleto=/^([a-zA-Z0-9\W]){6,}$/;
        expresionCompleto=/^([a-zA-Z0-9\W]){1,6}$/;
        //expresionCompleta=/^([a-zA-Z0-9-!$%^&*()_+|~=`{}\[\]:";'<>?,.\/]){1,6}$/;
       


        if(expresionCompleto.test(contraseña)){
                document.getElementById("alertaDebil").style.display="block";
                document.getElementById("alertaNormal").style.display="none";
                document.getElementById("alertaFuerte").style.display="none";
                
        }
        
        else{
            // if(expresionNumeros.test(contraseña)){
            //     document.getElementById("alertaDebil").style.display="block";
            //     document.getElementById("alertaNormal").style.display="none";
            //     document.getElementById("alertaFuerte").style.display="none";
                
            // }
                
            // if(expresionLetras.test(contraseña)){
            
            //     document.getElementById("alertaDebil").style.display="block";
            //     document.getElementById("alertaNormal").style.display="none";
            //     document.getElementById("alertaFuerte").style.display="none";
            // }
            // else{
            //     document.getElementById("alertaDebil").style.display="block";
            //     document.getElementById("alertaNormal").style.display="none";
            //     document.getElementById("alertaFuerte").style.display="none";
     
            // }
            
            

            
        }
        // else{
        //     if(!(expresionNumeros.test(contraseña))){
        //         document.getElementById("alertaDebil").style.display="none";
        //         document.getElementById("alertaNormal").style.display="block";
        //         document.getElementById("alertaFuerte").style.display="none";
                
        //     }
        //     else{
        //         alert("entrooooo");
        //         // document.getElementById("alertaDebil").style.display="none";
        //         //     document.getElementById("alertaNormal").style.display="block";
        //         //     document.getElementById("alertaFuerte").style.display="none";
               

        //     }
            
        // }
    }



) ;



$('#formEliminar').bootstrapValidator({

    

    fields: {

        motivoEliminar: {

            validators: {

                notEmpty: {

                    message: 'El motivo es obligatorio'

                },
                
            }

        },
        
        usuarioCargaCom:{

            validators: {

                notEmpty: {

                    message: 'El usuario es obligatorio'

                },
                
            }

        },

        
        
    }

});