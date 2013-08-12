
<div class="row-fluid">
    <div class="span3 allinea-centro">
        <h3>
            <i class="icon-group icon-2x"></i><br />
            <?php echo $_lista_attiva; ?>
        </h3>
    </div>
            
    <div class="span3">
        <h4>Elenchi dei volontari</h4>
        <a href="?p=presidente.utenti">
            <i class="icon-list"></i>
            Volontari attivi
        </a> /
        <a href="?p=presidente.utenti.dimessi">
             non attivi
        </a><br />
        <a href="?p=presidente.utenti.giovani">
            <i class="icon-list"></i>
            Volontari giovani
        </a><br />

    </div>     

    <div class="span3">
        <h4>Ufficio Soci</h4>
        <a href="<?php echo $_link_excel; ?>" data-attendere="Generazione e compressione in corso...">
            <i class="icon-download-alt"></i>
            Scarica elenco <?php echo $_lista_attiva; ?> (ZIP)
        </a><br />       
        <a href="<?php echo $_link_email; ?>">
            <i class="icon-envelope"></i>
            Email di massa a <?php echo $_lista_attiva; ?>
        </a><br />
        <a href="?p=us.elettorato">
            <i class="icon-cogs"></i>
            Genera elenchi elettorato
        </a>
    </div>
    
    <div class="span3">
        <h4>Ricerca</h4>
        <div class="input-append">
            <form action="?p=presidente.utenti" method="POST" class="allinea-centro">
                <input autofocus required name="inputQuery" placeholder="Cerca tra i volontari" type="text" />
                <button class="btn btn-primary" type="submit">
                    <i class="icon-search"></i>
                </button>

            </form>
        </div>
    </div>    
</div>
