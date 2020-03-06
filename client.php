<?php
session_start();

$operation = $_GET["operacao"];
$n1 = $_POST["n1"];
$n2 = $_POST["n2"];

$client = new SoapClient("http://localhost:8000/calcws?wsdl");

if($operation === "somar") {
    $params = [
        "getSoma" => [
            "n1" => $n1,
            "n2" => $n2
        ]
    ];

    $result = $client->__soapCall("getSoma", $params);
} elseif($operation === "subtrair") {
    $params = [
        "getSub" => [
            "n1" => $n1,
            "n2" => $n2
        ]
    ];

    $result = $client->__soapCall("getSub", $params);
} elseif($operation === "dividir") {
    $params = [
        "getDiv" => [
            "n1" => $n1,
            "n2" => $n2
        ]
    ];

    $result = $client->__soapCall("getDiv", $params);
} elseif($operation === "multiplicar") {
    $params = [
        "getMul" => [
            "n1" => $n1,
            "n2" => $n2
        ]
    ];

    $result = $client->__soapCall("getMul", $params);
}

$_SESSION["result"] = $result->return;

header("Location: index.php");