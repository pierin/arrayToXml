<?php
/**
 * Convert an array to XML
 *
 * @param array $array
 * @param SimpleXMLElement $xml
 */
function arrayToXml($template_info, &$xml_template_info)
{
    foreach ($template_info as $key => $value) {
        if (is_array($value)) {
            if (!is_numeric($key)) {

                $subnode = $xml_template_info->addChild("$key");

                if (count($value) > 1) {
                    $jump = false;
                    $count = 1;
                    foreach ($value as $k => $v) {
                        if (is_array($v)) {
                            if ($count++ > 1) {
                                $subnode = $xml_template_info->addChild("$key");
                            }

                            arrayToXml($v, $subnode);
                            $jump = true;
                        }
                    }
                    if (!$jump) {
                        arrayToXml($value, $subnode);
                    }
                } else {
                    arrayToXml($value, $subnode);
                }
            } else {
                arrayToXml($value, $xml_template_info);
            }
        } else {
            $xml_template_info->addChild("$key","$value");
        }
    }
}
    

// EXEMPLO
$aData = array(
  "firstName" => "Leandro",
  "lastName" => "Pierin",
  "contact" => array(
    "email" => "leandro@pierin.com",
    "phone" => "55 99999 9999",
  )
);

$xml = new SimpleXMLElement('<root/>');
arrayToXml($aData, $xml);

echo $xml->asXML();
