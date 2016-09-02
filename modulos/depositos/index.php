<?php
require_once '../../Config.php';

get_head('Depósitos', 'grid');

echo mensagem();

$DepositoLista = $Deposito->ListarDeposito($OrderBy, $Search, $Paginacao);
?>

<body>
    <script src="js/index.js"></script>
    
    <input type="hidden" id="modulo" name="modulo" value="deposito">
    <fieldset class="scheduler-border" style="margin-top: 20px">
        <legend class=""> Depósitos  </legend>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-inline">
                    <div class="form-group">
                        <button class="btn btn-primary" id="btn-novo">Novo          </button>
                        <button class="btn btn-primary" id="btn-editar">Editar      </button>
                        <button class="btn btn-danger" id="btn-excluir">Excluir    </button>

                        <label for="leitura"> Liberar
                            <select name="leitura" id="leitura" class="form-control">
                                <option value="">Escolha.. </option>
                                <option value="1">Leitura 1</option>
                                <option value="2">Leitura 2</option>
                                <option value="3">Leitura 3</option>
                            </select>
                        </label>
                    </div>
                </div>

            </div>
            <div class="col-sm-6 ">
                <div class="form-inline pull-right">
                    <form class="form-group">
                        <input type="text" size="20" class="form-control" id="busca" name="busca" value="<?= $_GET['busca'] ?>">
                        <button class="btn btn-primary" id="procurar" type="submit">Procurar</button>
                    </form>
                    <a class="btn btn-primary" href="importar.php">Importar Lista</a>
                </div>
            </div>
        </div>

        <br><br>

        <div class="alert alert-info text-center"> Use os Filtros: EPS - Centro - Cidade</div>

        <br>
        <?=  count($DepositoLista) . ' resultados encontrados.'; ?>
        <br> <br> <br> 

        <div  class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th style="width: 50px">
                <center>
                    <input type="checkbox" id="check_all" value="">
                </center>
                </th>
                <th>
                    <a href="<?= GetQuery('?ordem='. $ordem . '&by=depo_empresa') ?>">EPS</a>
                </th>
                <th><a href="<?= GetQuery('?ordem='. $ordem . '&by=depo_centro') ?>">Centro  </a></th>
                <th><a href="<?= GetQuery('?ordem='. $ordem . '&by=depo_cidade') ?>">Cidade  </a></th>
                <th>Status  </th>
                <th>Segmento </th>
                <th>Livre 2 </th>
                <th>Livre 3 </th>
                <th>Leitura </th>
                </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($DepositoLista as $dep) {
                        ?>
                        <tr>
                            <td>
                    <center>
                        <input type="checkbox" id="<?php echo $dep->depo_id ?>" value="<?php echo $dep->depo_id ?>">
                    </center>
                    </td>                        
                    <td>
                        <?php echo $dep->depo_empresa ?>
                    </td>
                    <td>
                        <?php echo $dep->depo_centro ?>
                    </td>
                    <td>
                        <?php echo $dep->depo_cidade ?>
                    </td>
                    <td>
                        <?php echo $dep->depo_status ?>
                    </td>
                    <td>
                        <?php echo $dep->depo_livre1 ?>
                    </td>
                    <td>
                        <?php echo $dep->depo_livre2 ?>
                    </td>
                    <td>
                        <?php echo $dep->depo_livre3 ?>
                    </td>
                    <td id="depo_leitura<?php echo $dep->depo_id ?>">
                        <?php echo $dep->depo_leitura ?>
                    </td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>

        <?php
        get_foot('grid');        