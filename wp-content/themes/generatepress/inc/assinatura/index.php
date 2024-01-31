<?php
if (isset($_POST['bnt_entrar'])) {

	include_once 'conexoes/ldap-config.php';

	$ID_Usuario = $_POST['usuario'];
	$user = $_POST['usuario'] . "@rede.sp";
	$psw = $_POST['senha'];
	$inicial = $_POST['usuario'];
	$dn = "OU=Users,OU=SMUL,DC=rede,DC=sp";

	$search = "samaccountname=" . $_POST['usuario'];  //"samaccountname=".$user; ou userprincipalname //

	$ds = ldap_connect($server);
	ldap_set_option($ds, LDAP_OPT_PROTOCOL_VERSION, 3); // Corrige problema com "ç"
    $r = @ldap_bind($ds, $user, $psw);
	$sr = @ldap_search($ds, $dn, $search);
	$data = @ldap_get_entries($ds, $sr);

	if ($r == 0 || !$data) {
		echo '<script> sessionStorage.setItem("erro", "erro_logn"); </script>';
		include_once 'formulario/templates/login.php';
	}
	
	require_once 'conexoes/conexao.php';

	mysqli_set_charset($conn, "utf8mb4");

	if ($data["count"] == 0) {
		// echo '<script> sessionStorage.setItem("erro", "erro_logn"); </script>';
		// include_once 'formulario/templates/login.php';
	} else {
		for ($i = 0; $i < $data["count"]; $i++) {
			$nomefr = mysqli_real_escape_string($conn, $data[$i]["givenname"][0]) . " " . mysqli_real_escape_string($conn, $data[$i]["sn"][0]);
			$emailfr = mysqli_real_escape_string($conn, strtolower($data[$i]["mail"][0]));
		}

		$_SESSION['SesID'] = $inicial;
		echo '<script> sessionStorage.setItem("user", "' . $_SESSION['SesID'] . '");</script>';
		$_SESSION['SesNome'] = $nomefr;
		$_SESSION['SesE-mail'] = $emailfr;

		include 'conexoes/conexao.php';
	
		$sql = "INSERT INTO tbl_telefones (cp_usuario_rede, cp_email, cp_nome)
		VALUES ('$inicial', '$emailfr', '$nomefr');";
	
		$busca = "SELECT cp_usuario_rede FROM tbl_telefones WHERE cp_usuario_rede = '$inicial';";
	
		$result = $conn->query($busca);
		if ($result) {
			if ($result->num_rows === 0) {
				if ($conn->query($sql) === TRUE) {
				} else {
					echo "Erro ao inserir registro: " . $conn->error;
				}
			}
		} else {
			echo "Erro na consulta: " . $conn->error;
		}

		include_once 'formulario/templates/formulario.php';
	}
} else if (isset($_POST['gera_assinatura'])) {
	include_once 'formulario/templates/formulario.php';
} else {
	include_once 'formulario/templates/login.php';
}
?>

<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js" type="text/javascript"></script>
</head>
<script>
	$(document).ready(function () {
		var erro_login = sessionStorage.getItem('erro');
		if (erro_login == 'erro_logn') {
			var text_erro = document.getElementById("erro_login");
			text_erro.style.color = 'red';
			text_erro.style.display = 'grid';
			var campos = document.querySelectorAll('#usuario, #senha');
			campos.forEach(element => {
				element.style.borderColor = 'red';
			});
			sessionStorage.removeItem("erro");
		}
	});
</script>