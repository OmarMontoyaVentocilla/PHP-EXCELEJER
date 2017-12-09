
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-alpha.2/css/materialize.min.css">

</head>
<body>
	<div class="container">
		<form id="form">
	 <table class=" bordered">
	 	<tbody>
	 		<tr>
	 			<td colspan="2">Titulo</td>
	 			<td align="center"><button type="button" class="btn_si waves-effect waves-light btn">SI</button></td>
	 			<td align="center"><button type="button" class="btn_no waves-effect waves-light btn">NO</button></td>
	 			

	 		</tr>
	 		<tr>
	 			<td>1</td>
	 			<td>Inquietud, incapacidad de relajarse y estar tranquilo</td>
	 			<td><p><label><input name="item1" type="radio" class="si_opc myradio conduc" value="1" id="item1_si" /><span></span></label></p></td>
	 			<td><p><label><input name="item1" type="radio" class="no_opc myradio conduc" value="0" id="item1_no" /><span></span></label></p></td>
	 		</tr>
	 		<tr>
	 			<td>2</td>
	 			<td>Pérdida de apetito</td>
	 			<td><p><label><input type="radio" name="item2" value="1" id="item2_si" class="si_opc myradio veget"><span></span></label></p></td>
	 			<td><p><label><input type="radio" name="item2" value="0" id="item2_no" class="no_opc myradio veget"><span></span></label></p></td>
	 		</tr>
	 		<tr>
	 			<td>3</td>
	 			<td>Desentenderse del problema y pensar en otra cosa</td>
	 			<td><p><label><input type="radio" name="item3" value="1" id="item3_si" class="si_opc myradio cogni"><span></span></label></p></td>
	 			<td><p><label><input type="radio" name="item3" value="0" id="item3_no" class="no_opc myradio cogni"><span></span></label></p></td>
	 		</tr>
	 		<tr>
	 			<td>4</td>
	 			<td>Ganas de suspirar, opresión en el pecho, sensación de ahogo</td>
	 			<td><p><label><input type="radio" name="item4" value="1" id="item4_si" class="si_opc myradio veget"><span></span></label></p></td>
	 			<td><p><label><input type="radio" name="item4" value="0" id="item4_no" class="no_opc myradio veget"><span></span></label></p></td>
	 		</tr>
	 		<tr>
	 			<td>5</td>
	 			<td>Palpitaciones, taquicardia</td>
	 		    <td><p><label><input type="radio" name="item5" value="1" id="item5_si" class="si_opc myradio veget"><span></span></label></p></td>
	 			<td><p><label><input type="radio" name="item5" value="0" id="item5_no" class="no_opc myradio veget"><span></span></label></p></td>
	 		</tr>
	 		<tr>
	 			<td>6</td>
	 			<td>Sentimientos de depresión y tristeza</td>
	 			<td><p><label><input type="radio" name="item6" value="1" id="item6_si" class="si_opc myradio emo"><span></span></label></p></td>
	 			<td><p><label><input type="radio" name="item6" value="0" id="item6_no" class="no_opc myradio emo"><span></span></label></p></td>
	 		</tr>
	 		<tr>
	 			<td>7</td>
	 			<td>Mayor necesidad de comer, aumento de apetito</td>
	 			<td><p><label><input type="radio" name="item7" value="1" id="item7_si" class="si_opc myradio veget"><span></span></label></p></td>
	 			<td><p><label><input type="radio" name="item7" value="0" id="item7_no" class="no_opc myradio veget"><span></span></label></p></td>
	 		</tr>
	 		<tr>
	 			<td>8</td>
	 			<td>Temblores, tics o calambres musculares</td>
	 			<td><p><label><input type="radio" name="item8" value="1" id="item8_si" class="si_opc myradio conduc"><span></span></label></p></td>
	 			<td><p><label><input type="radio" name="item8" value="0" id="item8_no" class="no_opc myradio conduc"><span></span></label></p></td>
	 		</tr>
	 		<tr>
	 			<td>9</td>
	 			<td>Aumento de actividad</td>
	 			<td><p><label><input type="radio" name="item9" value="1" id="item9_si" class="si_opc myradio conduc"><span></span></label></p></td>
	 			<td><p><label><input type="radio" name="item9" value="0" id="item9_no" class="no_opc myradio conduc"><span></span></label></p></td>
	 		</tr>
	 		<tr>
	 			<td>10</td>
	 			<td>Náuseas, mareos, inestabilidad</td>
	 			<td><p><label><input type="radio" name="item10" value="1" id="item10_si" class="si_opc myradio veget"><span></span></label></p></td>
	 			<td><p><label><input type="radio" name="item10" value="0" id="item10_no" class="no_opc myradio veget"><span></span></label></p></td>
	 		</tr>
	 		<tr>
	 			<td>11</td>
	 			<td>Esfuerzo por razonar y mantener la calma</td>
	 			<td><p><label><input type="radio" name="item11" value="1" id="item11_si" class="si_opc myradio cogni"><span></span></label></p></td>
	 			<td><p><label><input type="radio" name="item11" value="0" id="item11_no" class="no_opc myradio cogni"><span></span></label></p></td>
	 		</tr>
	 		<tr>
	 			<td>12</td>
	 			<td>Hormigueo o adormecimiento en las manos, la cara, etc</td>
	 			<td><p><label><input type="radio" name="item12" value="1" id="item12_si" class="si_opc myradio veget"><span></span></label></p></td>
	 			<td><p><label><input type="radio" name="item12" value="0" id="item12_no" class="no_opc myradio veget"><span></span></label></p></td>
	 		</tr>
	 		<tr>
	 			<td>13</td>
	 			<td>Molestias digestivas, dolor abdominal, etc</td>
	 			<td><p><label><input type="radio" name="item13" value="1" id="item13_si" class="si_opc myradio veget"><span></span></label></p></td>
	 			<td><p><label><input type="radio" name="item13" value="0" id="item13_no" class="no_opc myradio veget"><span></span></label></p></td>
	 		</tr>
	 		<tr>
	 			<td>14</td>
	 			<td>Dolores de cabeza</td>
	 			<td><p><label><input type="radio" name="item14" value="1" id="item14_si" class="si_opc myradio veget"><span></span></label></p></td>
	 			<td><p><label><input type="radio" name="item14" value="0" id="item14_no" class="no_opc myradio veget"><span></span></label></p></td>
	 		</tr>
	 		<tr>
	 			<td>15</td>
	 			<td>Entusiasmo, mayor energía o disfrutar con la situación</td>
	 			<td><p><label><input type="radio" name="item15" value="1" id="item15_si" class="si_opc myradio emo"><span></span></label></p></td>
	 			<td><p><label><input type="radio" name="item15" value="0" id="item15_no" class="no_opc myradio emo"><span></span></label></p></td>
	 		</tr>
	 		<tr>
	 			<td>16</td>
	 			<td>Disminución de actividad</td>
	 			<td><p><label><input type="radio" name="item16" value="1" id="item16_si" class="si_opc myradio conduc"><span></span></label></p></td>
	 			<td><p><label><input type="radio" name="item16" value="0" id="item16_no" class="no_opc myradio conduc"><span></span></label></p></td>
	 		</tr>
	 		<tr>
	 			<td>17</td>
	 			<td>Pérdida de apetito sexual o dificultades sexuales</td>
	 			<td><p><label><input type="radio" name="item17" value="1" id="item17_si" class="si_opc myradio veget"><span></span></label></p></td>
	 			<td><p><label><input type="radio" name="item17" value="0" id="item17_no" class="no_opc myradio veget"><span></span></label></p></td>
	 		</tr>
	 		<tr>
	 			<td>18</td>
	 			<td>Tendencia a echar la culpa a alguien o a algo</td>
	 			<td><p><label><input type="radio" name="item18" value="1" id="item18_si"  class="si_opc myradio cogni"><span></span></label></p></td>
	 			<td><p><label><input type="radio" name="item18" value="0" id="item18_no"  class="no_opc myradio cogni"><span></span></label></p></td>
	 		</tr>
	 		<tr>
	 			<td>19</td>
	 			<td>Somnolencia o mayor necesidad de dormir</td>
	 			<td><p><label><input type="radio" name="item19" value="1" id="item19_si"  class="si_opc myradio veget"><span></span></label></p></td>
	 			<td><p><label><input type="radio" name="item19" value="0" id="item19_no"  class="no_opc myradio veget"><span></span></label></p></td>
	 		</tr>
	 		<tr>
	 			<td>20</td>
	 			<td>Aprensión, sensación de estar poniéndose enfermo</td>
	 			<td><p><label><input type="radio" name="item20" value="1" id="item20_si"  class="si_opc myradio emo"><span></span></label></p></td>
	 			<td><p><label><input type="radio" name="item20" value="0" id="item20_no"  class="no_opc myradio emo"><span></span></label></p></td>
	 		</tr>
	 		<tr>
	 			<td>21</td>
	 			<td>Agotamiento o excesiva fatiga</td>
	 			<td><p><label><input type="radio" name="item21" value="1" id="item21_si" class="si_opc myradio veget"><span></span></label></p></td>
	 			<td><p><label><input type="radio" name="item21" value="0" id="item21_no" class="no_opc myradio veget"><span></span></label></p></td>
	 		</tr>
	 		<tr>
	 			<td>22</td>
	 			<td>Urinación frecuente</td>
	 			<td><p><label><input type="radio" name="item22" value="1" id="item22_si" class="si_opc myradio veget"><span></span></label></p></td>
	 			<td><p><label><input type="radio" name="item22" value="0" id="item22_no" class="no_opc myradio veget"><span></span></label></p></td>
	 		</tr>
	 		<tr>
	 			<td>23</td>
	 			<td>Rascarse, morderse las uñas, frotarse, etc</td>
	 			<td><p><label><input type="radio" name="item23" value="1" id="item23_si" class="si_opc myradio conduc"><span></span></label></p></td>
	 			<td><p><label><input type="radio" name="item23" value="0" id="item23_no" class="no_opc myradio conduc"><span></span></label></p></td>
	 		</tr>
	 		<tr>
	 			<td>24</td>
	 			<td>Sentimientos de agresividad o aumento de irritabilidad</td>
	 			<td><p><label><input type="radio" name="item24" value="1" id="item24_si" class="si_opc myradio emo"><span></span></label></p></td>
	 			<td><p><label><input type="radio" name="item24" value="0" id="item24_no" class="no_opc myradio emo"><span></span></label></p></td>
	 		</tr>
	 		<tr>
	 			<td>25</td>
	 			<td>Diarrea</td>
	 			<td><p><label><input type="radio" name="item25" value="1" id="item25_si" class="si_opc myradio veget"><span></span></label></p></td>
	 			<td><p><label><input type="radio" name="item25" value="0" id="item25_no" class="no_opc myradio veget"><span></span></label></p></td>
	 		</tr>
	 		<tr>
	 			<td>26</td>
	 			<td>Beber, fumar o tomar algo (chicle, pastillas, etc.)</td>
	 			<td><p><label><input type="radio" name="item26" value="1" id="item26_si" class="si_opc myradio conduc"><span></span></label></p></td>
	 			<td><p><label><input type="radio" name="item26" value="0" id="item26_no" class="no_opc myradio conduc"><span></span></label></p></td>
	 		</tr>
	 		<tr>
	 			<td>27</td>
	 			<td>Necesidad de estar solo sin que nadie le moleste</td>
	 			<td><p><label><input type="radio" name="item27" value="1" id="item27_si" class="si_opc myradio cogni"><span></span></label></p></td>
	 			<td><p><label><input type="radio" name="item27" value="0" id="item27_no" class="no_opc myradio cogni"><span></span></label></p></td>
	 		</tr>
	 		<tr>
	 			<td>28</td>
	 			<td>Aumento de apetito sexual</td>
	 		    <td><p><label><input type="radio" name="item28" value="1" id="item28_si" class="si_opc myradio veget"><span></span></label></p></td>
	 			<td><p><label><input type="radio" name="item28" value="0" id="item28_no" class="no_opc myradio veget"><span></span></label></p></td>
	 		</tr>
	 		<tr>
	 			<td>29</td>
	 			<td>Ansiedad, mayor predisposición a miedos, temores, etc</td>
	 			<td><p><label><input type="radio" name="item29" value="1" id="item29_si" class="si_opc myradio emo"><span></span></label></p></td>
	 			<td><p><label><input type="radio" name="item29" value="0" id="item29_no" class="no_opc myradio emo"><span></span></label></p></td>
	 		</tr>
	 		<tr>
	 			<td>30</td>
	 			<td>Tendencia a comprobar repetidamente si todo está en orden</td>
	 			<td><p><label><input type="radio" name="item30" value="1" id="item30_si" class="si_opc myradio conduc"><span></span></label></p></td>
	 			<td><p><label><input type="radio" name="item30" value="0" id="item30_no" class="no_opc myradio conduc"><span></span></label></p></td>
	 		</tr>
	 		<tr>
	 			<td>31</td>
	 			<td>Mayor dificultad en dormir</td>
	 			<td><p><label><input type="radio" name="item31" value="1" id="item31_si" class="si_opc myradio veget"><span></span></label></p></td>
	 			<td><p><label><input type="radio" name="item31" value="0" id="item31_no" class="no_opc myradio veget"><span></span></label></p></td>
	 		</tr>
	 		<tr>
	 			<td>32</td>
	 			<td>Necesidad de estar acompañado y ser aconsejado</td>
	 			<td><p><label><input type="radio" name="item32" value="1" id="item32_si" class="si_opc myradio cogni"><span></span></label></p></td>
	 			<td><p><label><input type="radio" name="item32" value="0" id="item32_no" class="no_opc myradio cogni"><span></span></label></p></td>
	 		</tr>
	 		<tr>
	 			
	 			<td colspan="2">IRE TOTAL</td>
	 			<td colspan="2"><input type="text" name="ire_total" id="ire_total"></td>
	 			
	 		</tr>
	 		<tr>
	 			
	 			<td colspan="2">Area vegetativa</td>
	 			<td colspan="2"><input type="text" name="area_vegetativa" id="area_vegetativa"></td>
	 			
	 		</tr>
	 		<tr>
	 			
	 			<td colspan="2">Area emocional</td>
	 			<td colspan="2"><input type="text" name="area_emocional" id="area_emocional"></td>
	 			
	 		</tr>
	 		<tr>
	 			
	 			<td colspan="2">Area cognitiva</td>
	 			<td colspan="2"><input type="text" name="area_cognitiva" id="area_cognitiva"></td>
	 			
	 		</tr>
	 		<tr>
	 			
	 			<td colspan="2">Area conductual</td>
	 			<td colspan="2"><input type="text" name="area_conductual" id="area_conductual"></td>
	 			
	 		</tr>
	 		<tr>
	 			
	 			<td colspan="2">Resultado</td>
	 			<td colspan="2"><input type="text" name="resultdo" id="resultdo"></td>
	 			
	 		</tr>

	 		<tr>
	 			<td colspan="3"></td>
	 			<td><button type="submit" class="waves-effect waves-light btn" >Grabar</button></td>
	 		</tr>
	 	</tbody>
	 </table>
	 </form>
	
	</div>
<script type="text/javascript" src="jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-alpha.2/js/materialize.min.js"></script>
<script type="text/javascript">

$('.btn_no').click(function(){
   $('.no_opc').prop('checked', 'true');
    calcular();
   cal_veg();
   calc_emor();
   calc_cogni();
   calc_conduc();
   resultado();
});	

$('.btn_si').click(function(){
   $('.si_opc').prop('checked', 'true');
    calcular();
   cal_veg();
   calc_emor();
   calc_cogni();
   calc_conduc();
   resultado();
});	


$(document).ready(function(){
  $(document).on('click keyup','.myradio',function() {
   calcular();
   cal_veg();
   calc_emor();
   calc_cogni();
   calc_conduc();
   resultado();
 });

});

function calcular(){
 var tot = $('#ire_total');	
 tot.val(0);
 $('.myradio').each(function() {
    if($(this).hasClass('myradio')) {
      tot.val(($(this).is(':checked') ? parseFloat($(this).val()) : 0) + parseFloat(tot.val()));  
    }
    else {
      tot.val(parseFloat(tot.val()) + (isNaN(parseFloat($(this).val())) ? 0 : parseFloat($(this).val())));
    }
  });
}

function cal_veg(){
 var total=$('#area_vegetativa');
 total.val(0);
 $('.veget').each(function() {
    if($(this).hasClass('veget')) {
      total.val(($(this).is(':checked') ? parseFloat($(this).val()) : 0) + parseFloat(total.val()));  
    }
    else {
      total.val(parseFloat(total.val()) + (isNaN(parseFloat($(this).val())) ? 0 : parseFloat($(this).val())));
    }
  });
}

function calc_emor(){
var total_emor=	$('#area_emocional');
total_emor.val(0);
 $('.emo').each(function() {
    if($(this).hasClass('emo')) {
      total_emor.val(($(this).is(':checked') ? parseFloat($(this).val()) : 0) + parseFloat(total_emor.val()));  
    }
    else {
      total_emor.val(parseFloat(total_emor.val()) + (isNaN(parseFloat($(this).val())) ? 0 : parseFloat($(this).val())));
    }
  });
}

function calc_cogni(){
 var total_cogni=$('#area_cognitiva');	
 total_cogni.val(0);
  $('.cogni').each(function() {
    if($(this).hasClass('cogni')) {
      total_cogni.val(($(this).is(':checked') ? parseFloat($(this).val()) : 0) + parseFloat(total_cogni.val()));  
    }
    else {
      total_cogni.val(parseFloat(total_cogni.val()) + (isNaN(parseFloat($(this).val())) ? 0 : parseFloat($(this).val())));
    }
  });
}

function calc_conduc(){
 var total_cond=$('#area_conductual');	
 total_cond.val(0);
  $('.conduc').each(function() {
    if($(this).hasClass('conduc')) {
      total_cond.val(($(this).is(':checked') ? parseFloat($(this).val()) : 0) + parseFloat(total_cond.val()));  
    }
    else {
      total_cond.val(parseFloat(total_cond.val()) + (isNaN(parseFloat($(this).val())) ? 0 : parseFloat($(this).val())));
    }
  });
}

function resultado(){
  var ire_t=$('#ire_total').val();
  var res_cog=$('#area_cognitiva').val();
  var res_cond=$('#area_conductual').val();
  var res_emor=$('#area_emocional').val();
  var res_veg=$('#area_vegetativa').val();
  var miLista = [res_cog,res_cond,res_emor,res_veg];
  var max=Math.max.apply(null, miLista);
  var respuesta='';
      if(ire_t>=0 && ire_t<=9){
        $('#resultdo').val('No presenta índice de reactividad al estrés.');
      }else if(ire_t>=10){
           if(res_cog==max){
           	respuesta='Area cognitiva';
           }else if(res_cond==max){
           		respuesta='Area conductual';
           }else if(res_emor==max){
           	  respuesta='Area emocional';
           }else if(res_veg==max){
             respuesta='Area vegetativa';
           }else{
           	 respuesta='';
           }

           $('#resultdo').val('Probable trastorno de estrés.'+'-'+respuesta);
      }else{
      	$('#resultdo').val('');
      }	
}



</script>
</body>
</html>

