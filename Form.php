<?php
//echo phpinfo();
$formulario=$_POST['formulario'];

if($formulario=='CAPTURAR'){ // capturaAPI
      $formulario;
 

$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api-test.envia.com/ship/generate/',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "origin": {
        "name": "oscar mx",
        "company": "oskys factory",
        "email": "osgosf8@gmail.com",
        "phone": "8116300800",
        "street": "av vasconcelos",
        "number": "1400",
        "district": "mirasierra",
        "city": "Monterrey",
        "state": "NL",
        "country": "MX",
        "postalCode": "66236",
        "reference": ""
    },
    "destination": {
        "name": "oscar",
        "company": "empresa",
        "email": "osgosf8@gmail.com",
        "phone": "8116300800",
        "street": "av vasconcelos",
        "number": "1400",
        "district": "palo blanco",
        "city": "monterrey",
        "state": "NL",
        "country": "MX",
        "postalCode": "66240",
        "reference": ""
    },
    "packages": [
        {
            "content": "camisetas rojas",
            "amount": 2,
            "type": "box",
            "dimensions": {
                "length": 2,
                "width": 5,
                "height": 5
            },
            "weight": 63,
            "insurance": 0,
            "declaredValue": 400,
            "weightUnit": "KG",
            "lengthUnit": "CM"
        },
        {
            "content": "camisetas rojas",
            "amount": 2,
            "type": "box",
            "dimensions": {
                "length": 1,
                "width": 17,
                "height": 2
            },
            "weight": 5,
            "insurance": 400,
            "declaredValue": 400,
            "weightUnit": "KG",
            "lengthUnit": "CM"
        }
    ],
    "shipment": {
        "carrier": "fedex",
        "service": "express",
        "type": 1
    },
    "settings": {
        "printFormat": "PDF",
        "printSize": "STOCK_4X6",
        "comments": "comentarios de el envío"
    }
}',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    'Authorization: Bearer 5bb80cd39cdd449ed2fa10fe25782a11f7bc42a56976412471b20f273e25b1d0',
    'Cookie: __cfduid=dea1dea89fd335ff4bfb36398a17af3c71607097697'
  ),
));

            $JSON_STR = curl_exec($curl);
            curl_close($curl);
$TOTAL_GUIAS=substr_count($JSON_STR,"trackingNumber");
if($TOTAL_GUIAS<=0){
    echo  $JSON_STR;
}
  "Total de Guias generadas :" . substr_count($JSON_STR,"trackingNumber") . "<br>"; 
$i = 0;
$host = '127.0.0.1';
$port = '10022'; //PUERTO
//:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
while ($i < 1) {
	$message = $TOTAL_GUIAS;
	$socket = socket_create(AF_INET, SOCK_STREAM, 0) or die ("No se pudo crear el socket\n");
	$result = socket_connect($socket, $host, $port) or die("No se pudo conectar al servidor\n");
	socket_write($socket, $message, strlen($message)) or die ("No se pudieron enviar datos al servidor\n");
	$result = socket_read($socket, 1024) or die("No se pudo leer la respuesta del servidor\n");
	 $result. "\n";
	socket_close($socket);
	$i++;
}
//:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
} // capturaAPI 
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/fontawesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/regular.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/solid.css">
    <title>Contador</title>
    <style>    </style>
</head>
<body class="bg-light">
</body>
        <main role="main" class="container">
                  <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-purple rounded shadow-sm">
                    <div class="lh-100">
                      <h6 class="mb-0 lh-100"> Guias generadas hasta el momento: <?php echo $result;?> </h6>
                    </div>
                  </div>
    <form id="form-add" action="" method="post" >
        
        <div class="row"> 
            <div class="col-md-6">
                  <div class="my-3 p-3 bg-white rounded shadow-sm">
                    <h6 class="border-bottom border-gray pb-2 mb-0">ORIGEN</h6>
                    <div class="media text-muted pt-3">
                      <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                  <label for="company_orig"><span class="text-req">*</span> company</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="far fa-building"></i> </div>
                                        <input type="text" class="form-control form-control-sm" name="company_orig" value="oskys factory" readonly="readonly"> 
                                    </div>
                                </div>
                              </div>
            
                              <div class="col-12">
                                    <div class="form-group">
                                      <label for="name_orig"><span class="text-req">*</span> name</label>
                                      <div class="input-group">
                                          <div class="input-group-addon"><i class="far fa-user"></i></div>
                                          <input type="text" class="form-control form-control-sm" name="name_orig" placeholder="Nombre" value="oscar mx" readonly="readonly"> 
                                      </div>
                                </div>
                              </div>
            
                              <div class="col-6">
                                <div class="form-group">
                                    <label><span class="text-req">*</span> Email</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="far fa-envelope"></i></div>
                                        <input type="email" class="form-control form-control-sm" name="email_orig" placeholder="correo@outlook.com" value="osgosf8@gmail.com" readonly="readonly"> 
                                    </div>
                                </div>
                              </div>
            
                              <div class="col-6">
                                  <div class="form-group">
                                      <label><span class="text-req">*</span> Teléfono</label>
                                      <div class="input-group">
                                          <div class="input-group-addon"><i class="fas fa-mobile-alt"></i></div>
                                          <input type="number" class="form-control form-control-sm" name="phone_orig" placeholder="520000000000" value="8116300800" readonly="readonly"> 
                                      </div>
                                    </div>
                               </div>
            
                               <div class="col-6">
                                    <div class="form-group">
                                        <label><span class="text-req">*</span> País</label>
                                            <select class="form-control form-control-sm" name="country_orig" readonly="readonly">
                                                <option value="MX" selected>Mexico</option>                                       
                                              </select>
                                    </div>
                                </div>
            
                                <div class="col-6">
                                            <div class="form-group">
                                                <label><span class="text-req">*</span> Estado</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="fas fa-map-marker-alt"></i></div>
                                                    <select class="form-control form-control-sm" name="rem_edo" readonly="readonly">
                                                    
                                                      <option value="NL" class="NuevoLeon" selected>Nuevo León</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-12 pr-md-2">
                                            <div class="form-group">
                                                <label><span class="text-req">*</span> Ciudad</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="fas fa-map-marker-alt"></i></div>
                                                    <input type="text" class="form-control form-control-sm" name="city_orig" readonly="readonly" value="Monterrey" placeholder="Ciudad">
                                                </div>
                                            </div>
                                        </div>
            
                                        <div class="col-12 pr-md-2">
                                            <div class="form-group">
                                                <label><span class="text-req">*</span> Colonia</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="fas fa-map-marker-alt"></i></div>
                                                    <input type="text" class="form-control form-control-sm" name="district_orig" readonly="readonly" value="mirasierra" placeholder="Colonia">
                                                </div>
                                            </div>
                                        </div>
            
                                <div class="col-12">
                                    <div class="form-group">
                                        <label><span class="text-req">*</span> Calle</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fas fa-map-marker-alt"></i></div>
                                            <input type="text" class="form-control form-control-sm" name="street_orig"   placeholder="Calle" value="av vasconcelos" readonly="readonly"> 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group ">
                                        <label><span class="text-req">*</span> Número</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fas fa-map-marker-alt"></i></div>
                                            <input type="text" class="form-control form-control-sm" name="number_orig" placeholder="Número" value="1400" readonly="readonly"> 
                                        </div>
                                    </div>
                                </div>
            
                                <div class="col-6">
                                    <div class="form-group ">
                                        <label><span class="text-req">*</span> Código postal</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fas fa-map-marker-alt"></i></div>
                                            <input type="number" class="form-control form-control-sm" name="postalCode_orig" placeholder="Código postal" value="66236" readonly="readonly"> 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                        <div class="form-group">
                                            <label> Referencia</label>
                                            <textarea type="text" name="rem_ref" maxlength="30" cols="30" rows="2" class="form-control" readonly="readonly" ></textarea>
                                        </div>
                                    </div>
                                
            
                        </div> <!-- row -->
                    </div> <!-- media -->
                  </div>
                </div> <!-- col-6-->
                
                
                
                
                <div class="col-md-6">
                  <div class="my-3 p-3 bg-white rounded shadow-sm">
                    <h6 class="border-bottom border-gray pb-2 mb-0">DESTINO</h6>
                    <div class="media text-muted pt-3">
                      <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                  <label for="rem_empresa"><span class="text-req">*</span> company</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="far fa-building"></i> </div>
                                        <input type="text" class="form-control form-control-sm" name="rem_empresa" value="empresa" readonly="readonly"> 
                                    </div>
                                </div>
                              </div>
            
                              <div class="col-12">
                                    <div class="form-group">
                                      <label for="rem_nombre"><span class="text-req">*</span> name</label>
                                      <div class="input-group">
                                          <div class="input-group-addon"><i class="far fa-user"></i></div>
                                          <input type="text" class="form-control form-control-sm" name="rem_nombre" placeholder="Nombre" value="oscar" readonly="readonly"> 
                                      </div>
                                </div>
                              </div>
            
                              <div class="col-6">
                                <div class="form-group">
                                    <label><span class="text-req">*</span> Email</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="far fa-envelope"></i></div>
                                        <input type="email" class="form-control form-control-sm" name="rem_email" placeholder="correo@outlook.com" value="osgosf8@gmail.com" readonly="readonly"> 
                                    </div>
                                </div>
                              </div>
            
                              <div class="col-6">
                                  <div class="form-group">
                                      <label><span class="text-req">*</span> Teléfono</label>
                                      <div class="input-group">
                                          <div class="input-group-addon"><i class="fas fa-mobile-alt"></i></div>
                                          <input type="number" class="form-control form-control-sm" name="rem_tel" placeholder="520000000000" value="8116300800" readonly="readonly"> 
                                      </div>
                                    </div>
                               </div>
            
                               <div class="col-6">
                                    <div class="form-group">
                                        <label><span class="text-req">*</span> País</label>
                                            <select class="form-control form-control-sm" name="rem_pais" readonly="readonly">
                                                <option value="MX" selected>Mexico</option>                                       
                                              </select>
                                    </div>
                                </div>
            
                                <div class="col-6">
                                            <div class="form-group">
                                                <label><span class="text-req">*</span> Estado</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="fas fa-map-marker-alt"></i></div>
                                                    <select class="form-control form-control-sm" name="rem_edo" readonly="readonly">
                                           
                                                      <option value="NL" selected class="NuevoLeon">Nuevo León</option>
                                                     
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-12 pr-md-2">
                                            <div class="form-group">
                                                <label><span class="text-req">*</span> Ciudad</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="fas fa-map-marker-alt"></i></div>
                                                    <input type="text" class="form-control form-control-sm" name="rem_cd" readonly="readonly" value="monterrey" placeholder="Ciudad">
                                                </div>
                                            </div>
                                        </div>
            
                                        <div class="col-12 pr-md-2">
                                            <div class="form-group">
                                                <label><span class="text-req">*</span> Colonia</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="fas fa-map-marker-alt"></i></div>
                                                    <input type="text" class="form-control form-control-sm" name="rem_col" readonly="readonly" value="palo blanco" placeholder="Colonia">
                                                </div>
                                            </div>
                                        </div>
            
                                <div class="col-12">
                                    <div class="form-group">
                                        <label><span class="text-req">*</span> Calle</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fas fa-map-marker-alt"></i></div>
                                            <input type="text" class="form-control form-control-sm" name="rem_calle" value="av vasconcelos" placeholder="Calle" readonly="readonly"> 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group ">
                                        <label><span class="text-req">*</span> Número</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fas fa-map-marker-alt"></i></div>
                                            <input type="text" class="form-control form-control-sm" name="rem_num" placeholder="Número" value="1400" readonly="readonly"> 
                                        </div>
                                    </div>
                                </div>
            
                                <div class="col-6">
                                    <div class="form-group ">
                                        <label><span class="text-req">*</span> Código postal</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fas fa-map-marker-alt"></i></div>
                                            <input type="number" class="form-control form-control-sm" name="rem_cp" placeholder="Código postal" value="66240" readonly="readonly"> 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                        <div class="form-group">
                                            <label> Referencia</label>
                                            <textarea type="text" name="rem_ref" maxlength="30" cols="30" rows="2" class="form-control" readonly="readonly"></textarea>
                                        </div>
                                    </div>
                                
            
                        </div> <!-- row -->
                    </div> <!-- media -->
                  </div>
                </div> <!-- col-6-->
        
        
        
        
         
        
        <input type="hidden" value="CAPTURAR" name="formulario">
        
        <button type="submit" class="btn btn-primary" id="add">Generar Guia(s)</button>
        </div>
    </form>
</main>
</html>
 