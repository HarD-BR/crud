$(document).ready(function(){
  		$("#camp_busca").on("keyup", function() {
    		var value = $(this).val().toLowerCase();
    	$("#tabelaResultado tr").filter(function() {
      		$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
   		});
  		});
});

$("#form_perfil").submit(function(e){
	
	var pn = $("#pswnova_txt").val()
    var rpn = $("#repswnova_txt").val()
    var mes = $("#senhaerrada_txt")

    if(rpn != pn){
		mes.show()
		$("#pswnova_txt").css('border-color', 'red')
		$("#repswnova_txt").css('border-color', 'red')
		return false
    }else{
		return true
	}
})

$("#ent_dt").blur(function(){
	var dte = $("#ent_dt").val()
	$("#sai_dt").attr("min", dte)
})

$("#ent_dt").change(function(){
	$("#sai_dt").val("")
})

$("#dd_txt").change(function(){
	var status = $("#dd_txt").val()

	if (status.val == "Fechado"){
		$("textarea").removeAttr("required")
	}else{
		$("textarea").attr("required", "required")
	}
})