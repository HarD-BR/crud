$(document).ready(function(){
  		$("#camp_busca").on("keyup", function() {
    		var value = $(this).val().toLowerCase();
    	$("#tabelaResultado tr").filter(function() {
      		$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
   		});
  		});
});

var status = document.getElementById("dd_txt")
var entdt = document.getElementById("ent_dt")
var form = document.getElementById("form_perfil")

status.addEventListener('change', validarupdate)
entdt.addEventListener('blur', set_min)
entdt.addEventListener('change', limpar_saida)
form.addEventListener('submit', function(e){
	var pn = document.getElementById("pswnova_txt").value
	var rpn = document.getElementById("repswnova_txt").value
	var mes = document.getElementById("senhaerrada_txt")

	e.preventDefault()
	if (rpn !== pn) {
		mes.style.display = "block"
		document.getElementById("pswnova_txt").style.borderColor = "red"
		document.getElementById("repswnova_txt").style.borderColor = "red"
		return false
	}	
})

function validarsenhas() {
  	var pn = document.getElementById("pswnova_txt").value 
  	var rpn = document.getElementById("repswnova_txt").value 
  	var mes = document.getElementById("senhaerrada_txt")

  	if (rpn !== pn) {
		mes.style.display = "block"
  		document.getElementById("pswnova_txt").style.borderColor = "red" 
  		document.getElementById("repswnova_txt").style.borderColor = "red" 
  		return false
  	}	
}

function validarupdate(){
	var status = document.getElementById("dd_txt").value

	if(status.value == "Fechado"){
		document.getElementsByTagName("textarea").removeAttribute("required")
	}else{
		document.getElementsByTagName("textarea").setAttribute("required", "required")
	}
}

function set_min() {
 	var dte = document.getElementById("ent_dt").value 
 	document.getElementById("sai_dt").setAttribute("min", dte)
}

function limpar_saida() {
  document.getElementById("sai_dt").value = ""
}