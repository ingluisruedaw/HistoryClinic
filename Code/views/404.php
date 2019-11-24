  <!-- CORE CSS-->
  <link href="estilos/dashboard/css/page-center.css" type="text/css" rel="stylesheet" media="screen,projection">

  <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
  <link href="estilos/dashboard/css/prism.css" type="text/css" rel="stylesheet" media="screen,projection">
  
</head>

<body class="cyan">



  <div id="error-page">

    <div class="row">
      <div class="col s12">
        <div class="browser-window">
          <div class="top-bar">
            <div class="circles">
              <div id="close-circle" class="circle"></div>
              <div id="minimize-circle" class="circle"></div>
              <div id="maximize-circle" class="circle"></div>
            </div>
          </div>
          <div class="content">
            <div class="row">
              <div id="site-layout-example-top" class="col s12">
                <p class="flat-text-logo center white-text caption-uppercase">Lo sentimos, pero no se pudo encontrar esta página:(</p>
              </div>
              <div id="site-layout-example-right" class="col s12 m12 l12">
                <div class="row center">
                  <h1 class="text-long-shadow col s12">404</h1>
                </div>
                <div class="row center">
                  <p class="center white-text col s12">Parece que esta página no existe.</p>
                  <p class="center s12"><a href="?action=login" class="btn waves-effect waves-light">Home</a>
                    <p>
                    </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


<?php require('views/Dashboard/scripts/index.php');?>