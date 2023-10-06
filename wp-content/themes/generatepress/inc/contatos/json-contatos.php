<?php
// Inicia conexão ao banco da lista de contatos
include_once 'db-config.php';

$contatos = array();

$contatosSmul = conectarLDAP('SMUL');
$contatosSpurb = conectarLDAP('SPURBANISMO');

function conectarLDAP($company)
{
    include 'ldap-config.php';
    global $mysqli;
    $base_dn = "OU=Users,OU=$company,DC=rede,DC=sp";
    $resultado = array();

    // Resgata todos os contatos
    $pesquisa = '*';
    $filter = "(&(objectClass=user)(objectCategory=person)(|(cn=$pesquisa)(samaccountname=$pesquisa))(!(userAccountControl:1.2.840.113556.1.4.803:=2)))";

    if (($connect = @ldap_connect($ldap_server))) {
        if (($bind = @ldap_bind($connect, $auth_user, $auth_pass))) {
            if (($search = @ldap_search($connect, $base_dn, $filter))) {

                $number_returned = ldap_count_entries($connect, $search);
                $info = ldap_get_entries($connect, $search);

                $count = $info["count"];

                for ($i = 0; $i < $count; $i++) {

                    $ID_Rede = '';
                    $Email = '';
                    $Nome = '';
                    $Secretaria = '';

                    if (isset($info[$i]["samaccountname"][0])) {
                        $ID_Rede = $info[$i]["samaccountname"][0];
                    }
                    if (isset($info[$i]["mail"][0])) {
                        $Email = $info[$i]["mail"][0];
                    }
                    if (isset($info[$i]["displayname"][0])) {
                        $Nome = mb_convert_encoding($info[$i]["displayname"][0], 'UTF-8', 'ISO-8859-1');
                    }
                    if (isset($info[$i]["company"][0])) {
                        $Secretaria = $info[$i]["company"][0];
                    }

                    $busca = mysqli_query($mysqli, "select * from tbl_telefones WHERE cp_usuario_rede LIKE '$ID_Rede' ORDER BY cp_nome ASC");

                    if (mysqli_num_rows($busca) > 0) {
                        while ($dados = mysqli_fetch_array($busca)) {
                            $resultado += [
                                $ID_Rede => array(
                                    'nome' => $dados['cp_nome'],
                                    'telefone' => $dados['cp_telefone'],
                                    'cargo' => $dados['cp_cargo'],
                                    'departamento' => $dados['cp_departamento'],
                                    'secretaria' => $dados['cp_secretaria'],
                                    'andar' => $dados['cp_andar'],
                                    'cep' => $dados['cp_cep'],
                                    'Email' => $dados['cp_email'],
                                    'Dia' => $dados['cp_nasc_dia'],
                                    'Mes' => $dados['cp_nasc_mes']
                                )
                            ];
                        }
                    } else if ($company === 'SMUL' && $Nome != "" && $Email != "") {
                        $resultado += [
                            $ID_Rede => array(
                                'nome' => $Nome,
                                'telefone' => '',
                                'cargo' => '',
                                'departamento' => '',
                                'secretaria' => $Secretaria,
                                'andar' => '',
                                'cep' => '',
                                'Email' => mb_strtolower($Email),
                                'Dia' => '',
                                'Mes' => ''
                            )
                        ];
                    }
                }
            }
        }
    }

    ldap_close($connect);

    return $resultado;
}

mysqli_close($mysqli);

$contatos = array_merge($contatosSmul, $contatosSpurb);

$result = count($contatos);
sort($contatos);

$jsonContatos = json_encode($contatos);

echo $jsonContatos;

?>