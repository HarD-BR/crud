$(document).ready(function(){
  		$("#camp_busca").on("keyup", function() {
    		var value = $(this).val().toLowerCase();
    	$("#tabelaResultado tr").filter(function() {
      		$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
   		});
  		});
});


function validarsenhas() {
  	var pn = document.getElementById("pswnova_txt").value ;
  	var rpn = document.getElementById("repswnova_txt").value ;
  	var mes = document.getElementById("senhaerrada_txt");

  	if (rpn !== pn) {
  		mes.style.display = "block";
  		document.getElementById("pswnova_txt").style.borderColor = "red" ;
  		document.getElementById("repswnova_txt").style.borderColor = "red" ;
  		return false;
  	}	
}

function set_min() {
 	var dte = document.getElementById("ent_dt").value ;
 	document.getElementById("sai_dt").setAttribute("min", dte);
}

function limpar_saida() {
  document.getElementById("sai_dt").value = "";
}