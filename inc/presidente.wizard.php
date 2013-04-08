<?php

/*
 * ©2013 Croce Rossa Italiana
 */

$c = $_GET['id'];
$c = new Comitato($c);

paginaPresidenziale($c);

?>

<form action="?p=presidente.wizard.ok" method="POST">

<input type="hidden" name="id" value="<?php echo $c->id; ?>" />
    
<div class="row-fluid">
    
    <div class="span8">
        <h2><?php echo $c->nome; ?></h2>
    </div>
    
    <div class="span4">
        <button type="submit" class="btn btn-large btn-block btn-success">
            <i class="icon-save"></i>
            Salva le informazioni
        </button>
    </div>
    
</div>

<hr />

<div class="row-fluid">
    
    <div class="span7">
        
        <h3>Dettagli comitato</h3>
        
        <div class="form-horizontal">
            <div class="control-group">
              <label class="control-label" for="inputNome">Unità territoriale</label>
              <div class="controls">
                <input type="text" class="input-xlarge" name="inputNome" id="inputNome" readonly value="<?php echo $c->nome; ?>">
                <acronym title="Per modificare, contatta informatica@cricatania.it">&nbsp; <i class="icon-lock icon-large"></i></acronym>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="inputLocale">Locale</label>
              <div class="controls">
                <input type="text" class="input-xlarge" name="inputLocale" id="inputLocale" readonly value="<?php echo $c->locale()->nome; ?>">
                <acronym title="Per modificare, contatta informatica@cricatania.it">&nbsp; <i class="icon-lock icon-large"></i></acronym>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="inputProvinciale">Provinciale</label>
              <div class="controls">
                <input type="text" class="input-xlarge" name="inputProvinciale" id="inputProvinciale" readonly value="<?php echo $c->provinciale()->nome; ?>">
                <acronym title="Per modificare, contatta informatica@cricatania.it">&nbsp; <i class="icon-lock icon-large"></i></acronym>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="inputRegionale">Regionale</label>
              <div class="controls">
                <input type="text" class="input-xlarge" name="inputRegionale" id="inputRegionale" readonly value="<?php echo $c->regionale()->nome; ?>">
                <acronym title="Per modificare, contatta informatica@cricatania.it">&nbsp; <i class="icon-lock icon-large"></i></acronym>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="inputTelefono">Telefono</label>
              <div class="controls">
                <input type="text" required name="inputTelefono" id="inputTelefono" value="<?php echo $c->telefono; ?>">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="inputFax">Fax</label>
              <div class="controls">
                <input type="text" name="inputFax" id="inputFax" value="<?php echo $c->fax; ?>" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="inputEmail">Email istituzionale</label>
              <div class="controls">
                <input type="email" required name="inputEmail" id="inputEmail" value="<?php echo $c->email; ?>" />
              </div>
            </div>
            
        </div>
        
        
    </div>
    
    <div class="span5">
        
        <h3>Località</h3>
        <div class="form-horizontal">

            <div class="control-group">
              <label class="control-label" for="inputIndirizzo">Indirizzo</label>
              <div class="controls">
                <input type="text" name="inputIndirizzo" id="inputIndirizzo" required value="<?php echo $c->indirizzo; ?>" />
              </div>
            </div>
            
            <div class="control-group">
              <label class="control-label" for="inputCivico">Civico</label>
              <div class="controls">
                <input type="text" class="input-mini" name="inputCivico" id="inputCivico" required value="<?php echo $c->civico; ?>" />
              </div>
            </div>
            
            <div class="control-group">
              <label class="control-label" for="inputCAP">CAP</label>
              <div class="controls">
                <input type="text" class="input-small" name="inputCAP" id="inputCAP" required value="<?php echo $c->cap; ?>" />
              </div>
            </div>
            
                        
            <div class="control-group">
              <label class="control-label" for="inputComune">Comune</label>
              <div class="controls">
                <input type="text" name="inputComune" id="inputComune" required value="<?php echo $c->comune; ?>" />
              </div>
            </div>
            
                                    
            <div class="control-group">
              <label class="control-label" for="inputProvincia">Provincia</label>
              <div class="controls">
                <input type="text" name="inputProvincia" id="inputProvincia" required value="<?php echo $c->provincia; ?>" />
              </div>
            </div>
        
        </div>
        
    </div>
    
</div>

</form>