# arrayToXml
Biblioteca para converter dados em Array para XML no PHP

# EXEMPLO
```php
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
```

# SAIDA
```xml
<root>
	<firstName>Leandro</firstName>
	<lastName>Pierin</lastName>
	<contact>
		<email>leandro@pierin.com</email>
		<phone>55 99999 9999</phone>
	</contact>
</root>
```
