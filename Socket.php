<?php
set_time_limit(0);
$host = '127.0.0.1';
$port = '10022';//PUERTO
//:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
    function contador_guias($guias_g){
        $archivo = "contador.txt"; //el archivo que contiene en numero
        $file = fopen($archivo, "r");  
        if($file){
            $contador = fread($file, filesize($archivo));  
            $contador = $contador + ((int) $guias_g);  
            fclose($file);
        }
        $file = fopen($archivo, "w+");
        if($file){
            fwrite($file, $contador);
            fclose($file);
        }
        return $contador;
    }
//:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
$sock = socket_create(AF_INET, SOCK_STREAM, getprotobyname('tcp'));
socket_bind($sock, $host, $port) or die('Error al vincular socket con ip en ese cliente');
echo socket_strerror(socket_last_error());
socket_listen($sock);

$i = 0;

while (true) {
	$cliente_socket[++$i] = socket_accept($sock);
    	$mensaje = socket_read($cliente_socket[$i], 1024);
	         $total=contador_guias($mensaje);
	          echo  $mensaje = "".$total."\n";
	socket_write($cliente_socket[$i], $mensaje. "\n\r", 1024);
	socket_close($cliente_socket[$i]);
}
socket_close($sock);
?>