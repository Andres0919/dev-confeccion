  $(document).ready(function() {
  $('.JStableOuter table').scroll(function(e) { 
   
    $('.JStableOuter thead').css("left", -$(".JStableOuter tbody").scrollLeft()); 
    $('.JStableOuter thead th:nth-child(1)').css("left", $(".JStableOuter table").scrollLeft() -0 ); 
    $('.JStableOuter tbody td:nth-child(1)').css("left", $(".JStableOuter table").scrollLeft()); 

    $('.JStableOuter thead').css("top", -$(".JStableOuter tbody").scrollTop());
    $('.JStableOuter thead tr th').css("top", $(".JStableOuter table").scrollTop()); 

  });
});

function descargarExcel(){
    //Creamos un Elemento Temporal en forma de enlace
    var tmpElemento = document.createElement('a');
    // obtenemos la información desde el div que lo contiene en el html
    // Obtenemos la información de la tabla
    var data_type = 'data:application/vnd.ms-excel';
    var tabla_div = document.getElementById('descarga');
    var tabla_html = tabla_div.outerHTML.replace(/ /g, '%20');
    tmpElemento.href = data_type + ', ' + encodeURIComponent(tabla_html);
    //Asignamos el nombre a nuestro EXCEL
    tmpElemento.download = 'Nombre_De_Mi_Excel.xls';
    // Simulamos el click al elemento creado para descargarlo
    tmpElemento.click();
}

function changeMachine(e){
  let plancha = document.getElementById('plancha'); 
  let tiempo = document.getElementById('tiempo');
  let velocidad = document.getElementById('velocidad'); 
  let caudalsup = document.getElementById('caudalsup'); 
  let plato = document.getElementById('plato'); 
  let pie = document.getElementById('pie');
  let caudalinf = document.getElementById('caudalinf');
  let aireinf = document.getElementById('aireinf');
  let airesup = document.getElementById('airesup');
  let presion = document.getElementById('presion');
  let vel_sup = document.getElementById('vel_sup');
  let vel_inf = document.getElementById('vel_inf');
  let intensidad = document.getElementById('intensidad');
  let dinamometro = document.getElementById('dinamometro');
  switch (e.value) {
      case 'at750v':
      case 'at750foa':
          plancha.style.display = 'none'; 
          tiempo.style.display = 'none';
          plancha.value = ''; 
          tiempo.value = '';
          velocidad.style.display = 'block'; 
          caudalsup.style.display = 'block'; 
          plato.style.display = 'block'; 
          pie.style.display = 'block'; 
          caudalinf.style.display = 'block'; 
          aireinf.style.display = 'block'; 
          airesup.style.display = 'block';
          presion.style.display = 'block';
          vel_sup.style.display = 'none';
          vel_inf.style.display = 'none'; 
          intensidad.style.display = 'none';
          vel_sup.value = '';
          vel_inf.value = ''; 
          intensidad.value = '';
          break;
      case 'mx204':
          plancha.style.display = 'none'; 
          tiempo.style.display = 'none'; 
          plato.style.display = 'none'; 
          pie.style.display = 'none';
          aireinf.style.display = 'none';
          caudalinf.style.display = 'none';
          plancha.value = ''; 
          tiempo.value = ''; 
          plato.value = ''; 
          pie.value = '';
          aireinf.value = '';
          caudalinf.value = '';
          velocidad.style.display = 'block'; 
          airesup.style.display = 'block';
          caudalsup.style.display = 'block';
          presion.style.display = 'block';
          vel_sup.style.display = 'none';
          vel_inf.style.display = 'none'; 
          intensidad.style.display = 'none';
          vel_sup.value = '';
          vel_inf.value = ''; 
          intensidad.value = '';
          break;
      case 'mx211':
      case 'mx210':
          plancha.style.display = 'none'; 
          tiempo.style.display = 'none'; 
          plato.style.display = 'none'; 
          pie.style.display = 'none';
          plancha.value = ''; 
          tiempo.value = ''; 
          plato.value = ''; 
          pie.value = '';
          aireinf.style.display = 'block'; 
          airesup.style.display = 'block';
          caudalinf.style.display = 'block'; 
          caudalsup.style.display = 'block'; 
          presion.style.display = 'block';
          velocidad.style.display = 'block'; 
          vel_sup.style.display = 'none';
          vel_inf.style.display = 'none'; 
          intensidad.style.display = 'none';
          vel_sup.value = '';
          vel_inf.value = ''; 
          intensidad.value = '';
          break;
      case 'prensa_doble':
      case 'prensa':
      case 'fusionadora':
          velocidad.style.display = 'none'; 
          caudalsup.style.display = 'none'; 
          plato.style.display = 'none'; 
          pie.style.display = 'none'; 
          caudalinf.style.display = 'none'; 
          aireinf.style.display = 'none'; 
          airesup.style.display = 'none';
          velocidad.value = ''; 
          caudalsup.value = ''; 
          plato.value = ''; 
          pie.value = ''; 
          caudalinf.value = ''; 
          aireinf.value = ''; 
          airesup.value = '';
          presion.style.display = 'block';
          plancha.style.display = 'block'; 
          tiempo.style.display = 'block';
          vel_sup.style.display = 'none';
          vel_inf.style.display = 'none'; 
          intensidad.style.display = 'none';
          vel_sup.value = '';
          vel_inf.value = ''; 
          intensidad.value = '';
          break;
      case 'ultra_continua':
      case 'ultra_presilla':
          velocidad.style.display = 'none'; 
          caudalsup.style.display = 'none'; 
          plato.style.display = 'none'; 
          pie.style.display = 'none'; 
          caudalinf.style.display = 'none'; 
          aireinf.style.display = 'none'; 
          airesup.style.display = 'none';
          velocidad.value = ''; 
          caudalsup.value = ''; 
          plato.value = ''; 
          pie.value = ''; 
          caudalinf.value = ''; 
          aireinf.value = ''; 
          airesup.value = '';
          presion.style.display = 'block';
          plancha.style.display = 'none'; 
          tiempo.style.display = 'none';
          plancha.value = ''; 
          tiempo.value = '';
          vel_sup.style.display = 'block';
          vel_inf.style.display = 'block'; 
          intensidad.style.display = 'block';
          break;
      case '':
          velocidad.style.display = 'none'; 
          caudalsup.style.display = 'none'; 
          plato.style.display = 'none'; 
          pie.style.display = 'none'; 
          caudalinf.style.display = 'none'; 
          aireinf.style.display = 'none'; 
          airesup.style.display = 'none';
          presion.style.display = 'none';
          plancha.style.display = 'none'; 
          tiempo.style.display = 'none';
          vel_sup.style.display = 'none';
          vel_inf.style.display = 'none'; 
          intensidad.style.display = 'none';
          velocidad.value = ''; 
          caudalsup.value = ''; 
          plato.value = ''; 
          pie.value = ''; 
          caudalinf.value = ''; 
          aireinf.value = ''; 
          airesup.value = '';
          presion.value = '';
          plancha.value = ''; 
          tiempo.value = '';
          vel_sup.value = '';
          vel_inf.value = ''; 
          intensidad.value = '';
          break;
  }
}
function onloadFormBonding() {

  let plancha = document.getElementById('plancha'); 
  let tiempo = document.getElementById('tiempo');
  let velocidad = document.getElementById('velocidad'); 
  let caudalsup = document.getElementById('caudalsup'); 
  let longitudfin = document.getElementById('longitudfin'); 
  let longitudini = document.getElementById('longitudini'); 
  let peso = document.getElementById('peso'); 
  let plato = document.getElementById('plato'); 
  let pie = document.getElementById('pie');
  let caudalinf = document.getElementById('caudalinf');
  let aireinf = document.getElementById('aireinf');
  let airesup = document.getElementById('airesup');
  let presion = document.getElementById('presion');
  let vel_sup = document.getElementById('vel_sup');
  let vel_inf = document.getElementById('vel_inf');
  
  velocidad.style.display = 'none'; 
  caudalsup.style.display = 'none'; 
  longitudfin.style.display = 'none'; 
  longitudini.style.display = 'none'; 
  peso.style.display = 'none'; 
  plato.style.display = 'none'; 
  pie.style.display = 'none'; 
  caudalinf.style.display = 'none'; 
  aireinf.style.display = 'none'; 
  airesup.style.display = 'none';
  presion.style.display = 'none';
  plancha.style.display = 'none'; 
  tiempo.style.display = 'none';
  vel_sup.style.display = 'none';
  vel_inf.style.display = 'none'; 
  intensidad.style.display = 'none';
}
function result(e) {
  switch (e.value) {
      case 'aprobado_>90%':
          document.getElementById('valor').disabled = true;
          break; 
      case 'aprobado_<90%':
          document.getElementById('valor').disabled = true;
          break;
      case 'aprobado_tela':
          document.getElementById('valor').disabled = false;
          break; 
      case 'falla_costura':
          document.getElementById('valor').disabled = false;
          break; 
      case 'fuerza_minima_esperada':
          document.getElementById('valor').disabled = false;
          break; 
      case 'aprobado_fuerza_alcanzada':
          document.getElementById('valor').disabled = false;
          break;
      case 'falla_fuerza_no_alcanzada':
          document.getElementById('valor').disabled = false;
          break;                   
  }
}
function changeProcess(e) {
  let longitudini = document.getElementById('longitudini'); 
  let peso = document.getElementById('peso');
  let longitudfin = document.getElementById('longitudfin');
  switch (e.value) {
      case 'tiras':
          longitudini.style.display = 'block'; 
          peso.style.display = 'block'; 
          longitudfin.style.display = 'block'
          break;
      default:
          longitudini.style.display = 'none';
          peso.style.display = 'none'; 
          longitudfin.style.display = 'none';
          break;
  }
}
onloadFormBonding();