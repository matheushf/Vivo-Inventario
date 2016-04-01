<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Global.php';

class FuncoesPadroes extends Geleia {

    public function Save($modulo) {

        switch ($modulo) {

            case 'usuario': {
                    $_POST['senha'] = sha1(trim($_POST['senha']));

                    break;
                }

            case 'etiquetas': {
                    global $Materiais, $Deposito;

                    $MaterialCodigo = $Materiais->GetById($_POST['mate_material']);
                    $MaterialCodigo = $MaterialCodigo->mate_codigo;

                    $DepositoCentro = $Deposito->GetById($_POST['depo_centro']);
                    $DepositoCentro = $DepositoCentro->depo_centro;

                    $_POST['cod_final'] = $DepositoCentro . '-' . $MaterialCodigo;
                    $_POST['leitura'] = 1;

                    break;
                }

            case 'deposito': {
                    $_POST['leitura'] = 1;
                }
        }


        return parent::Save($modulo);
    }

    public function Update($modulo) {

        switch ($modulo) {
            case 'usuario': {
                    $_POST['senha'] = sha1(trim($_POST['senha']));
                    break;
                }
        }

        return parent::Update($modulo);
    }

    function Delete($Id, $Modulo) {
        global $db;

        switch ($Modulo) {
            case 'materiais': {
                global $Materiais;
                
                return $Materiais->DeletarPorId($Id);
                    
                    break;
                }

            case 'etiquetas': {
                    $db->ExecSQL('DELETE FROM leitura WHERE leit_etiq_id = ' . $Id);

                    break;
                }
        }

        echo 'masoqu';
        $this->SQL_Delete = "DELETE FROM " . $Modulo . " WHERE " . substr($Modulo, 0, 4) . "_id = " . (int) $Id;

        return parent::Delete();
    }

}
