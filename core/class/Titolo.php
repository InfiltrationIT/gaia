<?php

/*
 * ©2012 Croce Rossa Italiana
 * 
 */

class Titolo extends Entita {
    
    protected static
        $_t     = 'titoli',
        $_dt    = null;

    use EntitaCache;
    
    public static function cerca($stringa, $tipo = -1) {
        $tipo = (int) $tipo;
        if ( $tipo == -1 ) {
            return self::cercaFulltext($stringa, ['nome'], 20);
        } else {
            return self::cercaFulltext($stringa, ['nome'], 20, "AND tipo = '$tipo'");
        }
    }

    public function cancella() {
        foreach ( TitoloPersonale::filtra([['titolo', $this->id]]) as $t ) {
            $t->cancella();
        }
        parent::cancella();
    }

}
