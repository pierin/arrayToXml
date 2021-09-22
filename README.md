# arrayToXml
Biblioteca para converter dados em Array para XML no PHP

# EXEMPLO
$aData = array(
  "firstName" => "Leandro",
  "lastName" => "Pierin",
  "contact" => array(
    "email" => "leandro@pierin.com",
    "phone" => "55 99999 9999",
  )
);

$xml = new SimpleXMLElement('<root/>');
funcoes::arrayToXml($aData, $xml);

echo $xml->asXML();
