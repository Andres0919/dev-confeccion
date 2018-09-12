function tiempo_p(t){
    var centesimasp = [];
    var segundosp = [];
    var minutosp = [];
    var horasp = [];
    var diasp = [];
    var Segundosp = [];
    var Minutosp = [];
    var Horasp = [];
    var Diasp = [];
    for (let i = 0; i <= t; i++) {
        centesimasp[i] = 0;
        segundosp[i] = document.getElementById('Segundosp'+i).innerHTML;
        segundosp[i] = segundosp[i].substring(1);
        minutosp[i] = document.getElementById('Minutosp'+i).innerHTML;
        minutosp[i] = minutosp[i].substring(1);
        horasp[i] = document.getElementById('Horasp'+i).innerHTML;
        diasp[i] = (document.getElementById('Diasp'+i))? document.getElementById('Diasp'+i).innerHTML : 0;
        Segundosp[i] = document.getElementById('Segundosp'+i);
        Minutosp[i] = document.getElementById('Minutosp'+i);
        Horasp[i] = document.getElementById('Horasp'+i);
        Diasp[i] = (document.getElementById('Diasp'+i))? document.getElementById('Diasp'+i) : 0;
    }
    function cronometro () {
        for (let j = 0; j <= t; j++){
            if (centesimasp[j] < 99) {
                centesimasp[j]++;
                if (centesimasp[j] < 10) { centesimasp[j] = "0"+centesimasp[j] }
            }
            if (centesimasp[j] == 99) {
                centesimasp[j] = -1;
            }
            if (centesimasp[j] == 0) {
                segundosp[j] ++;
                if (segundosp[j] < 10) { segundosp[j] = "0"+segundosp[j] }
                Segundosp[j].innerHTML = ":"+segundosp[j];
            }
            if (segundosp[j] == 59) {
                segundosp[j] = -1;
            }
            if ( (centesimasp[j] == 0)&&(segundosp[j] == 0) ) {
                minutosp[j]++;
                if (minutosp[j] < 10) { minutosp[j] = "0"+minutosp[j] }
                Minutosp[j].innerHTML = ":"+minutosp[j];
            } 
            if (minutosp[j] == 59) {
                minutosp[j] = -1;
            }
            if ( (centesimasp[j] == 0)&&(segundosp[j] == 0)&&(minutosp[j] == 0) ) {
                horasp[j] ++;
                if (horasp[j] < 10) { horasp[j] = "0"+horasp[j] }
                Horasp[j].innerHTML = horasp[j];
            }
            if (horasp[j] == 23) {
                horasp[j] = -1;
            }
            if ( (centesimasp[j] == 0)&&(segundosp[j] == 0)&&(minutosp[j] == 0)&&(horasp[j] == 0)) {
                diasp[j] ++;
                Diasp[j].innerHTML = diasp[j];
            }
        }
    }
    setInterval(cronometro,10);
}
function tiempo_a(t){
    var centesimasa = [];
    var segundosa = [];
    var minutosa = [];
    var horasa = [];
    var diasa = [];
    var Segundosa = [];
    var Minutosa = [];
    var Horasa = [];
    var Diasa = [];
    for (let i = 0; i <= t; i++) {
        centesimasa[i] = 0;
        segundosa[i] = document.getElementById('Segundosa'+i).innerHTML;
        segundosa[i] = segundosa[i].substring(1);
        minutosa[i] = document.getElementById('Minutosa'+i).innerHTML;
        minutosa[i] = minutosa[i].substring(1);
        horasa[i] = document.getElementById('Horasa'+i).innerHTML;
        diasa[i] = (document.getElementById('Diasa'+i))? document.getElementById('Diasa'+i).innerHTML : 0;
        Segundosa[i] = document.getElementById('Segundosa'+i);
        Minutosa[i] = document.getElementById('Minutosa'+i);
        Horasa[i] = document.getElementById('Horasa'+i);
        Diasa[i] = (document.getElementById('Diasa'+i))? document.getElementById('Diasa'+i) : 0;
    }
    function cronometro () {
        for (let j = 0; j <= t; j++){
            if (centesimasa[j] < 99) {
                centesimasa[j]++;
                if (centesimasa[j] < 10) { centesimasa[j] = "0"+centesimasa[j] }
            }
            if (centesimasa[j] == 99) {
                centesimasa[j] = -1;
            }
            if (centesimasa[j] == 0) {
                segundosa[j] ++;
                if (segundosa[j] < 10) { segundosa[j] = "0"+segundosa[j] }
                Segundosa[j].innerHTML = ":"+segundosa[j];
            }
            if (segundosa[j] == 59) {
                segundosa[j] = -1;
            }
            if ( (centesimasa[j] == 0)&&(segundosa[j] == 0) ) {
                minutosa[j]++;
                if (minutosa[j] < 10) { minutosa[j] = "0"+minutosa[j] }
                Minutosa[j].innerHTML = ":"+minutosa[j];
            } 
            if (minutosa[j] == 59) {
                minutosa[j] = -1;
            }
            if ( (centesimasa[j] == 0)&&(segundosa[j] == 0)&&(minutosa[j] == 0) ) {
                horasa[j] ++;
                if (horasa[j] < 10) { horasa[j] = "0"+horasa[j] }
                Horasa[j].innerHTML = horasa[j];
            }
            if (horasa[j] == 23) {
                horasa[j] = -1;
            }
            if ( (centesimasa[j] == 0)&&(segundosa[j] == 0)&&(minutosa[j] == 0)&&(horasa[j] == 0)) {
                diasa[j] ++;
                Diasa[j].innerHTML = diasa[j];
            }
        }
    }
    setInterval(cronometro,10);
}
var tp = document.getElementById("tp").innerHTML;
var ta = document.getElementById("ta").innerHTML;
tiempo_p(tp);
tiempo_a(ta);


