<input type="hidden" id="ident" value="<?= $_GET['ident'] ?>">
<div class="row">
    <div class="col-lg-4"> </div>
    <center>
        <div class="col-lg-4" style="margin-top: 200px">
            <p>Selecione a localização: </p>
            <br>
            <?= $Etiquetas->SelectLocalizacao($localizacao) ?>
            <br> <br>
            <a type="submit" id="acessar" class="btn btn-info">Acessar</a>
            <?php if ($NovaLocalizacao) { ?>
                <br>ou<br>
                <a type="submit" id="nova" class="btn btn-primary">Nova Localização</a>
            <?php } ?>
        </div>
    </center>
</div>