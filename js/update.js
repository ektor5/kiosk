var after;
var now;
var week;
var feeds;

/*
* modifica il blocco dei ricevimenti attuali (getGiornaliero())
*/
function update_now() {
  var index = getGiornaliero();
// DEBUG
//  text = "<div id='news'>giornaliero: " + index + ", now: " + now + "</div>";
//  $("#news").replaceWith(text); 
// controllo della necessità dell'aggiornamento
  if(index != now) {
    if(index == giornaliero.length || index < 0)
       text = "<div id='d1' style='display: none;'></div>";
     else
       text = "<div id='d1' class='day_block' style='display: none;'><b>ADESSO</b><div id='day_now'>"+ giornaliero[index][2] +"</div></div>";
// Codice JQuery per la sostituzione del blocco dei ric.attuali nella pagina HTML con effetto slide
    if(now < 0) {
      $("#d1").replaceWith(text);
    }
    else
      $("#d1").fadeOut("slow", function(){$("#d1").replaceWith(text); $("#d1").fadeIn("slow"); });
    now = index;
  }

}
/*
* modifica il blocco dei ricevimenti successivi all'ora attuale (getGiornaliero())
*/
function update_after() {
  last = after;
  after = after + 1;
  var index = getGiornaliero();
  if(index<0)
    index = (index * -1)-2;
  if(after >= giornaliero.length)
    after = index + 1;
// DEBUG
//  alert(" giornaliero: " + index + " last: "+last + " after: " + after);

// controllo della necessità dell'aggiornamento
  if(last != after) {
    if(index >= giornaliero.length-1)
       text = "<div id='d2' style='display:none;'></div>";
    else
       text = "<div id='d2' class='day_block' style='display:none;' ><b>"+giornaliero[after][0]+"-"+giornaliero[after][1]+"</b><div id=day_after>" + giornaliero[after][2] + "</div></div>";

// Codice JQuery per la sostituzione del blocco dei ric.successivi nella pagina HTML con effetto fade
    $("#d2").fadeOut("slow", function(){$("#d2").replaceWith(text); $("#d2").fadeIn("slow"); });
  }

}

/*
* ritorna l'indice dell'array giornaliero a seconda dell'orario attuale
*/
function getGiornaliero(){
  var currentDate = new Date();
  var h = currentDate.getHours();
  var m = currentDate.getMinutes();
// conversione in minuti dell'orario attuale
  var t = h*60 + m;
  var tmin = 0;
  var tmax = 0;
  var last_tmax = t;
// ricerca l'elemento dell'array in cui è compreso l'orario attuale
  for(i=0;i<giornaliero.length;i++) {
    var t1 = giornaliero[i][0];
    var t2 = giornaliero[i][1];
    var a = t1.split(":");
    var b = t2.split(":");
// conversione in minuti del tempo di inizio e di fine dell'elemento esaminato
    tmin = parseInt(a[0])*60 + parseInt(a[1]);
    tmax = parseInt(b[0])*60 + parseInt(b[1]);
    if(t>=tmin && t<tmax)
      return i; 
    if(t<tmin && t>=last_tmax)
// nessun elemento per l'orario attuale resituisce valore negativo
      return -(++i);
    last_tmax = tmax;
  }
// l'orario attuale e' successivo agli intervalli esaminati e restituisce la dimensione dell'array
  if(t>tmin && t>tmax)
    return giornaliero.length;
}

function update_week(){
  week = week + 1;
  if(week == 6)        //cicla da 0=lunedi a week_count=5=sabato
    week = 0;
  if(week > 0)
    $("#week_main").animate({left: '-=350'},3000);
  else
    $("#week_main").css({left: 0}).animate({left: '-=350'},3000);
}

function update_news(){
  feeds = feeds + 1;
  if(feeds == feed.length )       
    feeds = 0;
  var text = "<div id='news'>" + feed[feeds] + "</div>";
  $("#news").replaceWith(text);
}

function getOggi(){ 
 var data = new Date();
  var set, gg, mm;
  //Crea l'array dei mesi
  var mesi = new Array();
     mesi[0] = "Gennaio";
     mesi[1] = "Febbraio";
     mesi[2] = "Marzo";
     mesi[3] = "Aprile";
     mesi[4] = "Maggio";
     mesi[5] = "Giugno";
     mesi[6] = "Luglio";
     mesi[7] = "Agosto";
     mesi[8] = "Settembre";
     mesi[9] = "Ottobre";
     mesi[10] = "Novembre";
     mesi[11] = "Dicembre";
  //Crea l'array dei giorni della settimana
  var giorni = new Array();
     giorni[0] = "DOMENICA";
     giorni[1] = "LUNEDI'";
     giorni[2] = "MARTEDI'";
     giorni[3] = "MERCOLEDI'";
     giorni[4] = "GIOVEDI'";
     giorni[5] = "VENERDI'";
     giorni[6] = "SABATO";
        //Estrae dall'array il giorno della settimana
        day = giorni[data.getDay()] + " ";
        gg = data.getDate() + " ";
        //Estrae dall'array il mese
        mm = mesi[data.getMonth()] + " ";
       
     var text ="<div id='oggi'><h3>" + day + gg + mm + "</h3></div>";
  $("#oggi").replaceWith(text);
       
}

function setTimers(tmnow,tmafter,tmweek,tmrss) {
  after = getGiornaliero();
  if(after<0)
    after = (after * -1) -1;
  now = 99;
  week = 0;
  $("#week_main").css({left: -350})
  feeds = -1;
  getOggi();
  update_news();
  setInterval("update_now()",tmnow);
  setInterval("update_after()",tmafter);
  setInterval("update_week()",tmweek);
  setInterval("update_news()",tmrss);
}
