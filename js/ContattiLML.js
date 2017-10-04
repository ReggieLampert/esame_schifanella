function controllo(){
  //var nome=document.getElementById('nome').value;
  //var cognome=document.getElementById('cognome').value;
  //var email=document.getElementById('email').value;

  var dati_obbligatori={
    nome:document.getElementById('nome').value,
    cognome:document.getElementById('cognome').value,
    email:document.getElementById('email').value,
  }

  var lista_chiavi= Object.keys(dati_obbligatori);

  var avviso="";

  for(x=0; x<lista_chiavi.length; x++){
    if(dati_obbligatori[lista_chiavi[x]]==""){
      document.getElementById(lista_chiavi[x]).style.border="solid red";
      avviso=avviso + lista_chiavi[x]+ " " ;
    }
  }

  if(avviso){
    alert ("Non hai completato i seguenti campi obbligatori: "+ avviso);
  }

  if(dati_obbligatori[lista_chiavi[2]] != ""){
    var array_mail=dati_obbligatori[lista_chiavi[2]].split("");
    console.log(array_mail);
    var a= array_mail.indexOf("@");
    if(a==-1){
      alert("La e-mail non è scritta nel formato corretto");
      document.getElementById(lista_chiavi[2]).style.border="solid red";
    }
  }

  var cont=0;
  var avviso_due="";
  for(y=0; y<lista_chiavi.length-1; y++){
    if(dati_obbligatori[lista_chiavi[y]]!=""){
      var array_dati=dati_obbligatori[lista_chiavi[y]].split("");
      //alert(array_dati);
      for(m=0; m<array_dati.length; m++){
        if(isNaN(array_dati[m])==false){
          cont=1;
        }
      }
    }
    if(cont==1){
    avviso_due=avviso_due + lista_chiavi[y] +" ";
    cont=0;
    document.getElementById(lista_chiavi[y]).style.border="solid red";
    }
  }
  if(avviso_due){
    alert("I seguenti campi non sono scritti nel formato corretto: " + avviso_due);
  }

}//fine funzione controllo()

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function check(a,b){
  x=document.getElementById(a);
  if(x.checked=true){
    document.getElementById(b).style.display="block";
    t=document.getElementsByClassName("interattivo");
    for(i=0; i<t.length; i++){
      if(t[i]!=document.getElementById(b)){
        t[i].style.display="none";
      }
    }
  }
}//fine funzione check(a,b)

/////////////////////////////////////////////////////////////////////////////////////////////////////////7



/*var flag=0;//evita che l'input type=text si ricrei ogni volta che clicco su radio button
function check(){
  if(flag==0){
    flag=1;
    rimuovi();
    controllo_radiobox();
  }
}

function rimuovi(){
  alert("rimuovi");
  var elementi=document.getElementsByClassName("interattivo");
  for(cont=0; cont<elementi.length; cont++){
    elementi[cont].removeChild(elementi[cont].childNodes[0]);
  }
}


function controllo_radiobox(){
  x= document.getElementById("Torino");//Torino
  if(x.checked=true){
    alert("prova");
    y= document.getElementById("radio");//radio
    label=document.createTextNode("Il nome della tua città");
    input=document.createElement("input");
    input.setAttribute("type", "text");
    input.setAttribute("value", "");

    y.appendChild(label);
    y.appendChild(input);
  }
}

*/


/*function reset(){
  alert("ciao");
  for(cont=0; cont<z.length;cont++){
    if(z[cont]!=this){
      z[cont].removeChild(input);
      flag=0;
    }
  }
}*/



//function reset_radio(){
//  alert("CIAOOOO");
  //y.removeChild(input);
  //flag=0;
//}
