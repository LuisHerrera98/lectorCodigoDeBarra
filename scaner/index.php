<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistema de Facturación - Urian Viera</title>
    <link rel="icon" href="imgs/logo-mywebsite-urian-viera.svg">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.css">
    <style type="text/css" media="screen">
        html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }
            #video{
              border: 1px dashed #E6E6E6;
            }

             hr{
              margin-bottom:50px;
            }
            #hrs{
                margin-bottom: 10px;
            }
            .col-6{
                border: 1px solid #E6E6E6;
            }
            p{
                font-weight: bold;
            }
            .delete:hover{
                cursor: pointer;
            }
    </style>
</head>
<body>
   <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
       <span class="navbar-brand">
          <img src="imgs/logo-mywebsite-urian-viera.svg" alt="Web Developer Urian Viera" width="120">
            Web Developer Urian Viera
      </span>
    </nav>

<br><br>
<br>

<div class="container text-center">
  <div class="starter-template">
    <p class="lead" style="color: #333;">
    Sistema de Facturación Con Lector Código de Barra</p>
  </div>
<hr>


<div class="row">
   <div class="col-6">
    <section class="container" id="demo-content">
        <div>
            <button class="btn btn-info" id="startButton">Comenzar</button>
            <button class="btn btn-danger" id="resetButton">Cerrar</button>
        </div>
        <hr id="hrs">
        <div>
            <video id="video" width="400" height="300"></video>
        </div>


    <form id="form-data" method="post">
        <input type="hidden" name="codproducto" id="codproducto">
        <label>Código:</label>
        <pre><code id="result"></code></pre>
    </form>

    </section>

    </div>


    <div class="col-6">
        <p style="padding: 10px 0px 0px 0px;">Facturación de Productos</p>
        <div id="resultado">
            <?php include('MisProductos.php'); ?>
        </div>
    </div>

  </div>
</div>

<div style="position: fixed;top: -60px;">
<audio controls id="sonido_codigobarra" style="width: 0px !important;height: 0px !important;">
   <source src="audio/beep.mp3" type="audio/mpeg">
</audio>
</div>




<script src="js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
<script src="js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
<script src="js/zxing.min.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
    window.addEventListener('load', function () {
      var sonido = document.querySelector('#sonido_codigobarra');

        //pongo este valor para sabber si consigio
      let selectedDeviceId=-1;
      const codeReader = new ZXing.BrowserMultiFormatReader()
      console.log('ZXing code reader initialized')
      codeReader.getVideoInputDevices()
        .then((videoInputDevices) => {
          const sourceSelect = document.getElementById('sourceSelect');
          //se cual sea la cantidad de camaras selecciona la ultima que por lo general es al trasera del dispositivo
          selectedDeviceId = videoInputDevices[videoInputDevices.length-1].deviceId
          document.getElementById('startButton').addEventListener('click', () => {
            codeReader.decodeFromVideoDevice(selectedDeviceId, 'video', (result, err) => {
             if (result) {

                sonido.setAttribute("autoplay", true);
                sonido.setAttribute("playsinline", true); // required to tell iOS safari we don't want fullscreen
                sonido.play();

                //console.log(result.text);
                var resultadocodebarra = (result.text);
                var variablevalor = $('#codproducto').val(resultadocodebarra);
                document.getElementById('result').textContent = result.text;

                var route ='recibCodigo.php';
                $.ajax({
                    type:'POST',
                    url:route,
                    data: $("#form-data").serialize(),

                    success: function(resp){
                    $("#resultado").html(resp);
                    console.log(resp);
                    }
                  });

              }
              if (err && !(err instanceof ZXing.NotFoundException)) {
                console.error(err)
                document.getElementById('result').textContent = err
              }
            })
            console.log(`Started continous decode from camera with id ${selectedDeviceId}`)
          })

          document.getElementById('resetButton').addEventListener('click', () => {
            codeReader.reset()
            document.getElementById('result').textContent = '';
            console.log('Reset.')
          })

        })
        .catch((err) => {
          console.error(err)
        })
    })
  </script>

</body>
</html>
