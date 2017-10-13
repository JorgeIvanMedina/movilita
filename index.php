<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Movilita | Inicio</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta charset="UTF-8">
  <link rel="icon" type="img/logo.png" sizes="" href="img/logo.png">
</head>
<body>
  <header id="header" class="header">
    <div class="contenedor">
      <div class="logo-top">
        <a href="#"><img src="img/logo.png" alt="logo-top"/>
      </div>
      <h1 class="logo-style">Movilita</h1></a>    
      <div > 
        <div class="icon-menu">
          <div class="container-bar" onclick="myFunction(this)">
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
          </div>
        </div>  
      </div>
    </div>
    <nav class="nav" id="nav">

      <?php if (@$_SESSION['activo']!="SI") { ?> 
        <a href="app/login.php" class="nav-element">Inicia sesión</a>
        <a href="app/registro.php" class="nav-element">Registrate</a>
      <?php } ?>
      <?php if (@$_SESSION['activo']=="SI") { ?> 
        <a href="app/cerrar_sesion.php" class="nav-element">Cerrar sesión</a>
        <a href="app/Menu_reportes.php" class="nav-element">Generación de reportes</a>
      <?php }?>  
      <?php if (@$_SESSION['TIPO'] == 1 or @$_SESSION['TIPO'] == 3 ) { ?>
        <a href="app/asig.php" class="nav-element">Asignar dispositivo IoT</a>
        <a href="app/MT.php" class="nav-element">Medios de transporte</a>
      <?php }?>
      <?php if (@$_SESSION['TIPO'] == 3) { ?>
        <a href="app/cruduser.php" class="nav-element">Administración de usuarios</a>
      <?php }?>
      <!--<a href="about-us.html" class="nav-element">Acerca de nosotros</a>  -->
    </nav>   
  </header>
<body>
    
<?php
        require_once ('app/conectar.php');
        $conexion = conectar();
        //Consulta de los dispositivos -------------------------------
        $sql1 = "SELECT * FROM DISPOSITIVO WHERE NUMSERIE = '2001'";
        $result1 = mysqli_query($conexion,$sql1);
        while($consulta1 = mysqli_fetch_array($result1))
        {
            $latitud1=$consulta1['LATITUD'];
            $longitud1=$consulta1['LONGITUD'];            
        }
        $sql2 = "SELECT * FROM DISPOSITIVO WHERE NUMSERIE = '2002'";
        $result2 = mysqli_query($conexion,$sql2);
        while($consulta2 = mysqli_fetch_array($result2))
        {
            $latitud2=$consulta2['LATITUD'];
            $longitud2=$consulta2['LONGITUD'];            
        }       $sql3 = "SELECT * FROM DISPOSITIVO WHERE NUMSERIE = '2003'";
        $result3 = mysqli_query($conexion,$sql3);
        while($consulta3 = mysqli_fetch_array($result3))
        {
            $latitud3=$consulta3['LATITUD'];
            $longitud3=$consulta3['LONGITUD'];            
        }  
        $sql4 = "SELECT * FROM DISPOSITIVO WHERE NUMSERIE = '2004'";
        $result4 = mysqli_query($conexion,$sql4);
        while($consulta4 = mysqli_fetch_array($result4))
        {
            $latitud4=$consulta4['LATITUD'];
            $longitud4=$consulta4['LONGITUD'];            
        }     
        $sql5 = "SELECT * FROM DISPOSITIVO WHERE NUMSERIE = '2005'";
        $result5 = mysqli_query($conexion,$sql5);
        while($consulta5 = mysqli_fetch_array($result5))
        {
            $latitud5=$consulta5['LATITUD'];
            $longitud5=$consulta5['LONGITUD'];            
        } 
        $sql6 = "SELECT * FROM DISPOSITIVO WHERE NUMSERIE = '2006'";
        $result6 = mysqli_query($conexion,$sql6);
        while($consulta6 = mysqli_fetch_array($result6))
        {
            $latitud6=$consulta6['LATITUD'];
            $longitud6=$consulta6['LONGITUD'];            
        }        
        //Consulta datos medidos ---
        $sqlDato1 = "SELECT * FROM MEDIDA WHERE NUMSERIE = '2001' ORDER BY NUMMEDIDA DESC LIMIT 1"; //selecciona el último registro
        $resultDato1 = mysqli_query($conexion,$sqlDato1);
        while($consultaDato1 = mysqli_fetch_array($resultDato1))
        {
            $humedad1=$consultaDato1['HUMEDAD'];
            $temperatura1=$consultaDato1['TEMPERATURA'];
            $lluvia1=$consultaDato1['LLUVIA'];              
        }  
        $sqlDato2 = "SELECT * FROM MEDIDA WHERE NUMSERIE = '2002' ORDER BY NUMMEDIDA DESC LIMIT 1"; //selecciona el último registro
        $resultDato2 = mysqli_query($conexion,$sqlDato2);
        while($consultaDato2 = mysqli_fetch_array($resultDato2))
        {
            $humedad2=$consultaDato2['HUMEDAD'];
            $temperatura2=$consultaDato2['TEMPERATURA'];
            $lluvia2=$consultaDato2['LLUVIA'];              
        }          
        $sqlDato3 = "SELECT * FROM MEDIDA WHERE NUMSERIE = '2003' ORDER BY NUMMEDIDA DESC LIMIT 1"; //selecciona el último registro
        $resultDato3 = mysqli_query($conexion,$sqlDato3);
        while($consultaDato3 = mysqli_fetch_array($resultDato3))
        {
            $humedad3=$consultaDato3['HUMEDAD'];
            $temperatura3=$consultaDato3['TEMPERATURA'];
            $lluvia3=$consultaDato3['LLUVIA'];              
        }
        $sqlDato4 = "SELECT * FROM MEDIDA WHERE NUMSERIE = '2004' ORDER BY NUMMEDIDA DESC LIMIT 1"; //selecciona el último registro
        $resultDato4 = mysqli_query($conexion,$sqlDato4);
        while($consultaDato4 = mysqli_fetch_array($resultDato4))
        {
            $humedad4=$consultaDato4['HUMEDAD'];
            $temperatura4=$consultaDato4['TEMPERATURA'];
            $lluvia4=$consultaDato4['LLUVIA'];                      
        }    
        $sqlDato5 = "SELECT * FROM MEDIDA WHERE NUMSERIE = '2005' ORDER BY NUMMEDIDA DESC LIMIT 1"; //selecciona el último registro
        $resultDato5 = mysqli_query($conexion,$sqlDato5);
        while($consultaDato5 = mysqli_fetch_array($resultDato5))
        {
            $humedad5=$consultaDato5['HUMEDAD'];
            $temperatura5=$consultaDato5['TEMPERATURA'];
            $lluvia5=$consultaDato5['LLUVIA'];                      
        }     
        $sqlDato6 = "SELECT * FROM MEDIDA WHERE NUMSERIE = '2006' ORDER BY NUMMEDIDA DESC LIMIT 1"; //selecciona el último registro
        $resultDato6 = mysqli_query($conexion,$sqlDato6);
        while($consultaDato6 = mysqli_fetch_array($resultDato6))
        {
            $humedad6=$consultaDato6['HUMEDAD'];
            $temperatura6=$consultaDato6['TEMPERATURA'];
            $lluvia6=$consultaDato6['LLUVIA'];                      
        }                
?>
<div id="map"></div>
<?php if (@$_SESSION['activo']=="SI") { ?> 
<section class="user-name">
      <p><?php echo $_SESSION['NICK'];?></p>                                 
</section>
<?php } ?>
<script>
	function initMap(){
		var locationMarker1 = {lat: <?php echo $latitud1?>, lng: <?php echo $longitud1?>};
    var locationMarker2 = {lat: <?php echo $latitud2?>, lng: <?php echo $longitud2?>};
    var locationMarker3 = {lat: <?php echo $latitud3?>, lng: <?php echo $longitud3?>}; 
    var locationMarker4 = {lat: <?php echo $latitud4?>, lng: <?php echo $longitud4?>}; 
    var locationMarker5 = {lat: <?php echo $latitud5?>, lng: <?php echo $longitud5?>}; 
    var locationMarker6 = {lat: <?php echo $latitud6?>, lng: <?php echo $longitud6?>};         
		var locationCenter = {lat: 2.444814, lng:  -76.614739}; // definimos centro 
		var map = new google.maps.Map(document.getElementById('map'), {
			zoom: 13, 
			center: locationCenter,
			mapTypeId: 'roadmap', // Tipo de mapa
			gestureHandling: 'cooperative' // gesto del mapa, con un dedo mueve pagina con 2 mapa,verificar en dispositivo movil
		});
        var image2 = 'img/nube2.png';
        var image3 = 'img/nube3.png';
        var marker1 = new google.maps.Marker({
          position: locationMarker1,
          map: map,
          icon: image3
          //: 'Click to zoom',
        }); 
        var marker2 = new google.maps.Marker({
          position: locationMarker2,
          map: map, 
          icon: image2          
        });  
        var marker3 = new google.maps.Marker({
          position: locationMarker3,
          map: map,
          icon: image3       
        }); 
        var marker4 = new google.maps.Marker({
          position: locationMarker4,
          map: map,          
          icon: image2
        });  
        var marker5 = new google.maps.Marker({
          position: locationMarker5,
          map: map,
          icon: image2      
        });  
        var marker6 = new google.maps.Marker({
          position: locationMarker6,
          map: map,
          icon: image2
        });                                 
         marker1.addListener('click', function() {
         map.setZoom(14);
         map.setCenter(marker1.getPosition());
         locationCenter=marker1.getPosition();
        });

        marker2.addListener('click', function() {
          map.setZoom(14);
          map.setCenter(marker2.getPosition());
          locationCenter=marker2.getPosition();          
        }); 

        marker3.addListener('click', function() {
          map.setZoom(14);
          map.setCenter(marker3.getPosition());
          locationCenter=marker3.getPosition();          
        });   

        marker4.addListener('click', function() {
          map.setZoom(14);
          map.setCenter(marker4.getPosition());
          locationCenter=marker4.getPosition();          
        });    

         marker5.addListener('click', function() {
         map.setZoom(14);
         map.setCenter(marker5.getPosition());
         locationCenter=marker5.getPosition();
        });      

         marker6.addListener('click', function() {
         map.setZoom(14);
         map.setCenter(marker6.getPosition());
         locationCenter=marker6.getPosition();
        });                              
      // VENTANAS DE INFORMACIÓN PARA MOSTRAR DATOS DE TEMPERATURA, LLUVIA Y HUMEDAD
      var contentString1 = '<div id="content">'+
      '<div id="siteNotice">'+
      '</div>'+
      '<h1 id="firstHeading" class="firstHeading"></h1>'+ //Para colocar Título
      '<div id="bodyContent">'+
      '<p><b>H:     '+ <?php echo $humedad1?> +'</b></p>'+
      '<p><b>T: '+ <?php echo $temperatura1?> +'°C</b></p>'+
      '<p><b>L:      '+ <?php echo $lluvia1?> +'</b></p>'+
      '</div>'+
      '</div>';

      var contentString2 = '<div id="content">'+
      '<div id="siteNotice">'+
      '</div>'+
      '<h1 id="firstHeading" class="firstHeading"></h1>'+ //Para colocar Título
      '<div id="bodyContent">'+
      '<p><b>H:     '+ <?php echo $humedad2?> +'</b></p>'+
      '<p><b>T: '+ <?php echo $temperatura2?> +'°C</b></p>'+
      '<p><b>L:      '+ <?php echo $lluvia2?> +'</b></p>'+
      '</div>'+
      '</div>';      

      var contentString3 = '<div id="content">'+
      '<div id="siteNotice">'+
      '</div>'+
      '<h1 id="firstHeading" class="firstHeading"></h1>'+ //Para colocar Título
      '<div id="bodyContent">'+
      '<p><b>H:     '+ <?php echo $humedad3?> +'</b></p>'+
      '<p><b>T: '+ <?php echo $temperatura3?> +'°C</b></p>'+
      '<p><b>L:      '+ <?php echo $lluvia3?> +'</b></p>'+
      '</div>'+
      '</div>'; 

      var contentString4 = '<div id="content">'+
      '<div id="siteNotice">'+
      '</div>'+
      '<h1 id="firstHeading" class="firstHeading"></h1>'+ //Para colocar Título
      '<div id="bodyContent">'+
      '<p><b>H:     '+ <?php echo $humedad4?> +'</b></p>'+
      '<p><b>T: '+ <?php echo $temperatura4?> +'°C</b></p>'+
      '<p><b>L:      '+ <?php echo $lluvia4?> +'</b></p>'+
      '</div>'+
      '</div>';      

      var contentString5 = '<div id="content">'+
      '<div id="siteNotice">'+
      '</div>'+
      '<h1 id="firstHeading" class="firstHeading"></h1>'+ //Para colocar Título
      '<div id="bodyContent">'+
      '<p><b>H:     '+ <?php echo $humedad5?> +'</b></p>'+
      '<p><b>T: '+ <?php echo $temperatura5?> +'°C</b></p>'+
      '<p><b>L:      '+ <?php echo $lluvia5?> +'</b></p>'+
      '</div>'+
      '</div>';

      var contentString6 = '<div id="content">'+
      '<div id="siteNotice">'+
      '</div>'+
      '<h1 id="firstHeading" class="firstHeading"></h1>'+ //Para colocar Título
      '<div id="bodyContent">'+
      '<p><b>H:     '+ <?php echo $humedad6?> +'</b></p>'+
      '<p><b>T: '+ <?php echo $temperatura6?> +'°C</b></p>'+
      '<p><b>L:      '+ <?php echo $lluvia6?> +'</b></p>'+
      '</div>'+
      '</div>';


      var infowindow1 = new google.maps.InfoWindow({
        content: contentString1
      });  

      var infowindow2 = new google.maps.InfoWindow({
        content: contentString2
      });        

      var infowindow3 = new google.maps.InfoWindow({
        content: contentString3
      });

      var infowindow4 = new google.maps.InfoWindow({
        content: contentString4
      });

      var infowindow5 = new google.maps.InfoWindow({
        content: contentString5
      }); 

      var infowindow6 = new google.maps.InfoWindow({
        content: contentString6
      });           
      marker1.addListener('click', function() {
        infowindow1.open(map, marker1);
      }); 

      marker2.addListener('click', function() {
        infowindow2.open(map, marker2);
      });  

      marker3.addListener('click', function() {
        infowindow3.open(map, marker3);
      });  

      marker4.addListener('click', function() {
        infowindow4.open(map, marker4);
      });     
      marker5.addListener('click', function() {
        infowindow5.open(map, marker5);
      }); 

      marker6.addListener('click', function() {
        infowindow6.open(map, marker6);
      });
      if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
             
           var marker = new google.maps.Marker({
           position: pos,
           map: map,
           ///title: "¡¡¡Tu localización!!!"
           }); 
            ///infoWindow.setPosition(pos);
            ///infoWindow.setContent('Here');

            map.setCenter(pos);
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }
      }

      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
}
</script>
<script src="js/app.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBFYqhjOP2B5-sCv222XdcSgzgs9tZCix4&callback=initMap" async defer></script>
</body>
</html>
<link rel="stylesheet" href="css/responsimple.css">
<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">