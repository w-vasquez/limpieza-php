<?php
    
    class Curl    
    {
        function sentenciaAccion($method, $url, $data)
        {
            $curl = curl_init();
            switch ($method)
            {
                case "POST":
                    curl_setopt($curl, CURLOPT_POST, 1);
                    if ($data)
                        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                    break;
                case "PUT":
                    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
                    if ($data)
                        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);			 					
                    break;
                default:
                    if ($data)
                        $url = sprintf("%s?%s", $url, http_build_query($data));
                break;
            }
            
            curl_setopt($curl, CURLOPT_URL, $url);

            $result = curl_exec($curl);

            curl_close($curl);

            return $result;
        }

        function sentenciaSelect($ruta)
        {
            $json=file_get_contents($ruta);
            $datos=json_decode($json,true);
            return $datos;
        }
    }

?>