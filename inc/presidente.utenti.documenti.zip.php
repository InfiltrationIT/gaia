<?php

/*
 * ©2013 Croce Rossa Italiana
 */

paginaPresidenziale();

$zip = new Zip();

foreach ( $me->comitatiDiCompetenza() as $c ) {
    
    foreach ( $c->membriAttuali() as $v ) {
        if (!$v->documenti()) { continue; }
        $f          = $v->zipDocumenti();
        $zip->aggiungi($f);
    }
    
}

$zip->comprimi('Documenti volontari.zip');
$zip->download();