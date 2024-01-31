<?php

?>
<style>
  .alert {
    position: fixed;
    top: 100px;
    right: -23px;
    display: none;
    padding: 10px;
    white-space: nowrap;
    width: 0%;
    animation: slidein 5s ease-in-out;
    z-index: 9999;
  }

  @keyframes slidein {
    from {
      width: 0%;
    }

    to {
      width: 400px;
    }

    10%, 25%, 50%, 75%, 85%, 95% {
      width: 400px;
    }

    100% {
      width: 0%;
    }
  }
</style>

<p class="alert" id="alert_nome" role="alert"></p>

<script>
  function alert(alert, tipo) {
    var alert_nome = document.getElementById('alert_nome');
    alert_nome.style.display = 'inline';
    alert_nome.innerText = alert;
    alert_nome.classList.add(tipo);
  }

  var lengh_nome = document.getElementById('nome').value;
  var recarregou = sessionStorage.getItem("recarregou");
  var andar_validar = document.getElementById("endereco").value;
  var telefone_validar = document.getElementById("telefone").value;
  var ddd = telefone_validar.split(' ');

  if (recarregou) {
    if (lengh_nome.length >= 27) {
      alert("Nome foi reduzido devido seu tamanho!", "alert-warning");
    } else if (ddd[0] != '(11)'){
      alert("Indicamos que o ddd seja 11 para nosso telefones", "alert-warning");
    } else {
      alert("Assinatura criada com sucesso!", "alert-success");
    }
  }
</script>