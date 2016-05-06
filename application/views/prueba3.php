<html>
    <head>
        <title>Sistema de Información Geográfica para Emprendedores</title>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
        <script type="text/javascript">
        
    jQuery(function($) {
        $.getJSON('http://localhost/sige/index.php/filtros/Consultar_ciudad', function(json) {
               
               var json = jQuery.parseJSON( json );  
               var select = $('#city-list');
               
             for (var i = 0, i=1; i<5 ; i++) {
                 $.each(json[2], function(k, v) {
                        var option = $('<option/>');
 
                        option.attr('value', k)
                              .html(v)
                           .appendTo(select);
                               }  
                 )
                 
          
             }
             
             
             
             
             
             
         }
       ) });



  </script>
    </head>
    <body>
        <div>
            <h1>PHP + jQuery Example - PhpRiot.com</h1>
 
            <select name="city" id="city-list">
                <option value="">Select a city...</option>
            </select>
        </div>
    </body>
</html>