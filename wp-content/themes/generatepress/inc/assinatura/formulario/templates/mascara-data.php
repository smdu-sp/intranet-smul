<div class="form-group col-md-4">
    <label for="data">Data de nacimento:</label>
    <input type="text" class="form-control" id="data" name="data" maxlength="5" value="<?php echo $_POST['data'] ?? ''; ?>" required>
</div>
<script>
    const data = document.getElementById("data");
    var dateInputMask = function dateInputMask(elm) {
        elm.addEventListener('keyup', function(e) {
            if (e.keyCode < 47 || e.keyCode > 57) {
                e.preventDefault();
            }
            var len = elm.value.length;
            if (len !== 1 || len !== 3) {
                if (e.keyCode == 47) {
                    e.preventDefault();
                }
            }
            if (len === 2) {
                elm.value = validaDia(elm.value);
                elm.value += '/';
            }
            if (len === 5) {
                elm.value = elm.value.includes("/") ? elm.value : elm.value.substring(0, 2) + "/" + elm.value.substring(2, 4);
                elm.value = validaMes(elm.value);
            }
        });
    };
    dateInputMask(data);

    function validaDia(dia) {
        dia = parseInt(dia);
        dia = (dia > 31 ? 31 : dia < 1 ? 1 : dia).toString();
        return dia.length < 2 ? `0${dia}` : dia;
    }

    function validaMes(data) {
        [dia, mes] = data.split("/");
        dia = validaDia(dia);
        mes = parseInt(mes);
        mes = mes > 12 ? 12 : mes < 1 ? 1 : mes;
        if (parseInt(dia) > 29)
            mes = mes === 2 ? "" : mes;
        mesesMenores = [2, 4, 6, 9, 11];
        if (parseInt(dia) > 30)
            mes = mesesMenores.includes(mes) ? "" : mes;
        mes = mes === "" ? "" : (mes.toString().length < 2 ? `0${mes}` : mes.toString());
        return `${dia}/${mes}`;
    }
</script>

</html>