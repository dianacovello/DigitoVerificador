#form{
    font-size: 1.2em;
    padding: 10% 400px;
    margin: auto;
}
#form input {
    width: auto;
    padding: 10px;
    border: nome;
}
#form {
    background: 01.png;
}#form{
    font-size: 1.2em;
    padding: 10% 400px;
    margin: auto;
}
#form input {
    width: auto;
    padding: 10px;
    border: nome;
}
#form {
    background: 01.png;
}#form{
    font-size: 1.2em;
    padding: 10% 400px;
    margin: auto;
}
#form input {
    width: auto;
    padding: 10px;
    border: nome;
}
#form {
    background: 01.png;
}#form{
    font-size: 1.2em;
    padding: 10% 400px;
    margin: auto;
}
#form input {
    width: auto;
    padding: 10px;
    border: nome;
}
#form {
    background: 01.png;
}<?php

$nupinformado = $_POST["nupinformado"];


echo "O Numero de protocolo informado é: " . $nupinformado;
echo "<hr><hr>";

// Multiplicação de cada número pelo seu peso para o PRIMEIRO Digito Verificador
$somaDV1 = ((substr($nupinformado,0,1)* 16)+
            (substr($nupinformado,1,1)* 15)+
            (substr($nupinformado,2,1)* 14)+
            (substr($nupinformado,3,1)* 13)+
            (substr($nupinformado,4,1)* 12)+
            (substr($nupinformado,5,1)* 11)+
            (substr($nupinformado,6,1)* 10)+
            (substr($nupinformado,7,1)* 9)+
            (substr($nupinformado,8,1)* 8)+
            (substr($nupinformado,9,1)* 7)+
            (substr($nupinformado,10,1)* 6)+
            (substr($nupinformado,11,1)* 5)+
            (substr($nupinformado,12,1)* 4)+
            (substr($nupinformado,13,1)* 3)+
            (substr($nupinformado,14,1)* 2)
        );

//Divisão da soma dos numeros por 11 e subtração do resultado da divisão por 11
$DV1 = (11 - ($somaDV1 % 11));

//Desconsideração da casa da dezena, caso houver
$DV1 = substr($DV1, 0,1);

echo "<br> O primeiro dígito verificador é: " . $DV1;


//Atribuição do primeiro dígito verificador ao número de protocolo
$nupinformado = $nupinformado . $DV1;

// Multiplicação de cada número pelo seu peso para o SEGUNDO Digito Verificador
$somaDV2 = ((substr($nupinformado,0,1)* 17)+
            (substr($nupinformado,1,1)* 16)+
            (substr($nupinformado,2,1)* 15)+
            (substr($nupinformado,3,1)* 14)+
            (substr($nupinformado,4,1)* 13)+
            (substr($nupinformado,5,1)* 12)+
            (substr($nupinformado,6,1)* 11)+
            (substr($nupinformado,7,1)* 10)+
            (substr($nupinformado,8,1)* 9)+
            (substr($nupinformado,9,1)* 8)+
            (substr($nupinformado,10,1)* 7)+
            (substr($nupinformado,11,1)* 6)+
            (substr($nupinformado,12,1)* 5)+
            (substr($nupinformado,13,1)* 4)+
            (substr($nupinformado,14,1)* 3)+
            (substr($nupinformado,15,1)* 2)
        );

//Divisão da soma dos numeros por 11 e subtração do resultado da divisão por 11
$DV2 = (11 - ($somaDV2 % 11));

//Desconsideração da casa da dezena, caso houver
$DV2 = substr($DV2, 0,1);

echo "<br> O segundo dígito verificador é: " . $DV2;

//Atribuição do segundo dígito verificador ao número de protocolo
$nupinformado = $nupinformado . $DV2;

echo "<br> O digito verificador gerado é: " . $DV1 . $DV2;

echo "<br> O nup gerado é: " . $nupinformado . "<br>";


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

echo mask($nupinformado, '#####.######/####-##');














