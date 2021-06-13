<?php
// Verifica se existe a variável txtnome
if (isset($_GET["descricao"])) {
    $nome = $_GET["descricao"];
  include("../Security/conexaoBanco.php");
    // Verifica se a variável está vazia
    if (empty($nome)) {
        $sql = "SELECT * FROM produto";
    } else {
        $nome .= "%";
        $sql = "SELECT * FROM produto WHERE DESCRICAO like '$nome'";
    }
    sleep(1);
    $result = mysqli_query($conexao, $sql);
    $cont = mysqli_affected_rows($conexao);
    // Verifica se a consulta retornou linhas
    if ($cont > 0) {
        // Atribui o código HTML para montar uma tabela
        $tabela = "<b>Resultado da pesquisa</b>";
        $return = "$tabela";
        // Captura os dados da consulta e inseri na tabela HTML
        while ($linha = mysqli_fetch_array($result)) {
            $return.= '<div style="border: 1px solid rgba(25,25,25,0.1); margin: 5px; padding: 5px;">';
            $return.= "<h5>" . utf8_encode($linha["ID"]) . "</h5>";
            $return.= "<h5>" . utf8_encode($linha["DESCRICAO"]) . "</h5>";
            $return.= '</div>';
        }
        echo $return.="</div>";
    } else {
        // Se a consulta não retornar nenhum valor, exibi mensagem para o usuário
        echo "Não foram encontrados registros!";
    }
}
?>