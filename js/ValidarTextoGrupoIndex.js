
function ValidarCampoTextoGrupo(){
    var txtGrupo = document.getElementById('txtGrupo');
    var LongitudTxtGrupo = document.getElementById('txtGrupo').value.length;
    if(LongitudTxtGrupo < 0 || LongitudTxtGrupo == null){
        alert("Error al ingresar el grupo, verifique");
    }else{
        alert("No hay error");
    }
}