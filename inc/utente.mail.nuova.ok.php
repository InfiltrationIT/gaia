<?php

/*
 * ©2013 Croce Rossa Italiana
 */

$v = utente::by('email', $_POST['inputMail']);
$oggetto= $_POST['inputOggetto']; 
$testo = $_POST['inputTesto'];

if (isset($_GET['unit'])) {
        $c = $_GET['id'];
        $c = Comitato::by('id', $c);
        $t = $c->membriAttuali(MEMBRO_VOLONTARIO);
        foreach($t as $_t){
            $m = new Email('mailTestolibero', ''.$oggetto);
            $m->da = $me; 
            $m->a = $_t;
            $m->_TESTO = $testo;
            $m->invia();
         }

}elseif (isset($_GET['com'])) {
$elenco = $me->comitatiApp ([ APP_SOCI, APP_PRESIDENTE ]);
        foreach($elenco as $comitato) {
            $t = $comitato->membriAttuali(MEMBRO_VOLONTARIO);
            foreach($t as $_t){
                $m = new Email('mailTestolibero', ''.$oggetto);
                $m->da = $me; 
                $m->a = $_t;
                $m->_TESTO = $testo;
                $m->invia();
         }
     }
}elseif (isset($_GET['mass'])) {
$f = $_GET['t'];
$t = TitoloPersonale::filtra([['titolo',$f]]);
if($me->presiede()){
  foreach($me->presidenziante() as $appartenenza){
             $c=$appartenenza->comitato()->id;     
  foreach ( $t as $_t ) { 
      $a=$_t->volontario()->id;
      $a = Appartenenza::filtra([['volontario',$a],['comitato',$c]]);
      if($a[0]!=''){
        if($_t->pConferma!=''){    
            
            $m = new Email('mailTestolibero', ''.$oggetto);
            $m->da = $me; 
            $m->a = $_t->volontario();
            $m->_TESTO = $testo;
            $m->invia();
                      
           
        }}}}}elseif($me->admin()){
                foreach ( $t as $_t ) {
                  if($_t->pConferma!=''){
                      
                    $m = new Email('mailTestolibero', ''.$oggetto);
                    $m->da = $me; 
                    $m->a = $_t->volontario();
                    $m->_TESTO = $testo;
                    $m->invia();
                
                  }}
            
        }
}elseif(isset($_GET['supp'])){

$m = new Email('mailTestolibero', 'Richiesta supporto: '.$oggetto);
$m->da = $me;
$m->_TESTO = $testo;
$m->invia();
redirect('utente.me&suppok');    

}elseif (isset($_GET['comgio'])) {
$elenco = $me->comitatiApp ([ APP_SOCI, APP_PRESIDENTE ]);
        foreach($elenco as $comitato) {
            $t = $comitato->membriAttuali(MEMBRO_VOLONTARIO);
            foreach($t as $_t){
                if ($_t->giovane()){
                $m = new Email('mailTestolibero', ''.$oggetto);
                $m->da = $me; 
                $m->a = $_t;
                $m->_TESTO = $testo;
                $m->invia();
                }
         }
     }
     
}elseif (isset($_GET['unitgio'])) {
        $c = $_GET['id'];
        $c = Comitato::by('id', $c);
        $t = $c->membriAttuali(MEMBRO_VOLONTARIO);
        foreach($t as $_t){
            if ($_t->giovane()){
            $m = new Email('mailTestolibero', ''.$oggetto);
            $m->da = $me; 
            $m->a = $_t;
            $m->_TESTO = $testo;
            $m->invia();
            }
         }

}elseif (isset($_GET['comquoteno'])) {
$elenco = $me->comitatiApp ([ APP_SOCI, APP_PRESIDENTE ]);
        foreach($elenco as $comitato) {
            $t = $comitato->quoteNo();
            foreach($t as $_t){
                $m = new Email('mailTestolibero', ''.$oggetto);
                $m->da = $me; 
                $m->a = $_t;
                $m->_TESTO = $testo;
                $m->invia();
         }
     }
}elseif (isset($_GET['comquotesi'])) {
$elenco = $me->comitatiApp ([ APP_SOCI, APP_PRESIDENTE ]);
        foreach($elenco as $comitato) {
            $t = $comitato->quoteSi();
            foreach($t as $_t){
                $m = new Email('mailTestolibero', ''.$oggetto);
                $m->da = $me; 
                $m->a = $_t;
                $m->_TESTO = $testo;
                $m->invia();
         }
     }
}elseif (isset($_GET['unitquoteno'])) {
        $c = $_GET['id'];
        $c = Comitato::by('id', $c);
        $t = $c->quoteNo();
        foreach($t as $_t){
            $m = new Email('mailTestolibero', ''.$oggetto);
            $m->da = $me; 
            $m->a = $_t;
            $m->_TESTO = $testo;
            $m->invia();
         }

}elseif (isset($_GET['unitquotesi'])) {
        $c = $_GET['id'];
        $c = Comitato::by('id', $c);
        $t = $c->quoteNo();
        foreach($t as $_t){
            $m = new Email('mailTestolibero', ''.$oggetto);
            $m->da = $me; 
            $m->a = $_t;
            $m->_TESTO = $testo;
            $m->invia();
         }

}elseif (isset($_GET['comeleatt'])) {
$elenco = $me->comitatiApp ([ APP_SOCI, APP_PRESIDENTE ]);
        foreach($elenco as $comitato) {
            $time = $_GET['time'];
            $time = DT::daTimestamp($time);
            $t = $comitato->elettoriAttivi($time);
            foreach($t as $_t){
                $m = new Email('mailTestolibero', ''.$oggetto);
                $m->da = $me; 
                $m->a = $_t;
                $m->_TESTO = $testo;
                $m->invia();
         }
     }
}elseif (isset($_GET['comelepass'])) {
$elenco = $me->comitatiApp ([ APP_SOCI, APP_PRESIDENTE ]);
        foreach($elenco as $comitato) {
            $time = $_GET['time'];
            $time = DT::daTimestamp($time);
            $t = $comitato->elettoriPassivi($time);
            foreach($t as $_t){
                $m = new Email('mailTestolibero', ''.$oggetto);
                $m->da = $me; 
                $m->a = $_t;
                $m->_TESTO = $testo;
                $m->invia();
         }
     }
}elseif (isset($_GET['uniteleatt'])) {
        $c = $_GET['id'];
        $c = Comitato::by('id', $c);
        $time = $_GET['time'];
        $time = DT::daTimestamp($time);
        $t = $c->elettoriAttivi($time);
        foreach($t as $_t){
            $m = new Email('mailTestolibero', ''.$oggetto);
            $m->da = $me; 
            $m->a = $_t;
            $m->_TESTO = $testo;
            $m->invia();
         }

}elseif (isset($_GET['unitelepass'])) {
        $c = $_GET['id'];
        $c = Comitato::by('id', $c);
        $time = $_GET['time'];
        $time = DT::daTimestamp($time);
        $t = $c->elettoriPassivi($time);
        foreach($t as $_t){
            $m = new Email('mailTestolibero', ''.$oggetto);
            $m->da = $me; 
            $m->a = $_t;
            $m->_TESTO = $testo;
            $m->invia();
         }

}else{

$m = new Email('mailTestolibero', ''.$oggetto);
$m->da = $me; 
$m->a = $v;
$m->_TESTO = $testo;
$m->invia();    

}  

redirect('utente.me&ok');
?>