<?php

/*
 * ©2013 Croce Rossa Italiana
 */

class Trasferimento extends Entita {
    
    protected static
        $_t  = 'trasferimenti',
        $_dt = null;
    
    public function volontario() {
        return new Volontario($this->volontario);
    }
    
    public function appartenenza() {
        return new Appartenenza($this->appartenenza);
    }
    
    public function comitato() {
        return $this->appartenenza()->comitato();
    }
    
    public function presaInCarico() {
        if ( $this->protNumero && $this->protData ) {
            return true;
        } else {
            return false;
        }
    }
        
    public function rispondi($risposta = TRASF_OK, $motivo = null) {
        global $sessione;
        $this->stato = $risposta;
        $this->pConferma = $sessione->utente()->id;
        $this->tConferma = time();
        $this->negazione = $motivo;
    }
    
    public function concedi() {
        $this->rispondi(TRASF_OK);
    }
    
    public function nega($motivo) {
        $this->rispondi(TRASF_NEGATO, $motivo);
    }
    
    public function auto() {
        $this->risposta = TRASF_AUTO;
        $this->tConferma = time();
    }
        
}