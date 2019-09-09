<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
    <title>Gerador NUP</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script>
        function mascara(o,f){
            v_obj=o
            v_fun=f
            setTimeout("execmascara()",1)
        }

        function execmascara(){
            v_obj.value=v_fun(v_obj.value)
        }
        function soNumeros(v){
            return v.replace(/\D/g,"")
        }
        function nup(v){
    v=v.replace(/\D/g,"")                    //Remove tudo o que não é dígito
    v=v.replace(/(\d{5})(\d)/,"$1.$2")       //Coloca um ponto entre o terceiro e o quarto dígitos
    v=v.replace(/(\d{6})(\d)/,"$1/$2")       //Coloca um ponto entre o terceiro e o quarto dígitos
                                             //de novo (para o segundo bloco de números)
    return v
}

</script>
<style type="text/css">
#form{
    font-size: 1.2em;
    padding: 10% 30%;
    margin: auto;
}
#form input {
    width: auto;
    padding: 10px;
    border: nome;
}
img {
    margin-top: 0px;
}
</style>
</head>

<body>
    <div align="center" >
        <form id="form" class="form-control col-md-6" method="POST">
            <fieldset>
                <legend align="center" >Gerador de Dígito Verificador de Processo</legend>
                <img src="01.jpg" width="150px">
                <br><br>
                <label > NUP Informado</label><br>
                <input type="text" name="nupinformado" 
                onkeypress="mascara(this,nup)"
                placeholder="_____.______/___" maxlength="17" required >
                <input type="submit" value="Gerar DV">

                <?php

                if (isset($_POST["nupinformado"])) {
                    $nupinformado = $_POST["nupinformado"];

// Multiplicação de cada número pelo seu peso para o PRIMEIRO Digito Verificador
                    $somaDV1 = ((substr($nupinformado,0,1)* 16)+
                        (substr($nupinformado,1,1)* 15)+
                        (substr($nupinformado,2,1)* 14)+
                        (substr($nupinformado,3,1)* 13)+
                        (substr($nupinformado,4,1)* 12)+
                        (substr($nupinformado,5,1))+
                        (substr($nupinformado,6,1)* 11)+
                        (substr($nupinformado,7,1)* 10)+
                        (substr($nupinformado,8,1)* 9)+
                        (substr($nupinformado,9,1)* 8)+
                        (substr($nupinformado,10,1)* 7)+
                        (substr($nupinformado,11,1)* 6)+
                        (substr($nupinformado,12,1))+
                        (substr($nupinformado,13,1)* 5)+
                        (substr($nupinformado,14,1)* 4)+
                        (substr($nupinformado,15,1)* 3)+
                        (substr($nupinformado,16,1)* 2));

//Divisão da soma dos numeros por 11 e subtração do resultado da divisão por 11
                    $DV1 = (11 - ($somaDV1 % 11));

//Desconsideração da casa da dezena, caso houver
                    $DV1 = substr($DV1, 0,1);

//Atribuição do primeiro dígito verificador ao número de protocolo
                    $nupinformado = $nupinformado . $DV1;

// Multiplicação de cada número pelo seu peso para o SEGUNDO Digito Verificador
                    $somaDV2 = ((substr($nupinformado,0,1)* 17)+
                        (substr($nupinformado,1,1)* 16)+
                        (substr($nupinformado,2,1)* 15)+
                        (substr($nupinformado,3,1)* 14)+
                        (substr($nupinformado,4,1)* 13)+
                        (substr($nupinformado,5,1))+
                        (substr($nupinformado,6,1)* 12)+
                        (substr($nupinformado,7,1)* 11)+
                        (substr($nupinformado,8,1)* 10)+
                        (substr($nupinformado,9,1)* 9)+
                        (substr($nupinformado,10,1)* 8)+
                        (substr($nupinformado,11,1)* 7)+
                        (substr($nupinformado,12,1))+
                        (substr($nupinformado,13,1)* 6)+
                        (substr($nupinformado,14,1)* 5)+
                        (substr($nupinformado,15,1)* 4)+
                        (substr($nupinformado,16,1)* 3)+
                        (substr($nupinformado,17,1)* 2));

//Divisão da soma dos numeros por 11 e subtração do resultado da divisão por 11
                    $DV2 = (11 - ($somaDV2 % 11));

//Desconsideração da casa da dezena, caso houver
                    $DV2 = substr($DV2, 0,1);

//Atribuição do segundo dígito verificador ao número de protocolo
                    $nupinformado = $nupinformado . $DV2;

//Máscara para o NUP
                    function mask($val, $mask){ 
                        $maskared = '';
                        $k = 0;
                        for($i = 0; $i<=strlen($mask)-1; $i++) {
                            if($mask[$i] == '#') {
                                if(isset($val[$k]))
                                    $maskared .= $val[$k++];
                            } else {
                                if(isset($mask[$i]))
                                    $maskared .= $mask[$i];
                            }
                        }
                        return $maskared;
                    }

                    ?>
                    <input type="reset" action="#" value="Limpar" onclick="window.document.location.href=''"><br>
                    <label> NUP Gerado</label><br>
                    <?php echo mask($nupinformado, '#################-##'); 

                } // fecha if isset(_$POST)  ?> 
            </fieldset>
        </form>
    </div>
</body>
</html>

