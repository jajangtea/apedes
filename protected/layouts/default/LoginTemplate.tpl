<!DOCTYPE html>
<html lang="id">
<com:THead>     
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="theme-color" content="#1C2B36" />
    <!-- Global stylesheets -->
    <link type="text/css" rel="stylesheet" href="<%=$this->Page->Theme->baseUrl%>/lib/css/bootstrap.css">
    <link type="text/css" rel="stylesheet" href="<%=$this->Page->Theme->baseUrl%>/lib/css/animate.min.css">
    <link type="text/css" rel="stylesheet" href="<%=$this->Page->Theme->baseUrl%>/lib/css/main.css">
    <link type="text/css" rel="stylesheet" href="<%=$this->Page->Theme->baseUrl%>/lib/css/apedes.css">
    <!-- /Global stylesheets -->
</com:THead>
<body>        
<com:TForm Attributes.role="form">   
<com:TOutputCache>
    <com:TClientScript PradoScripts="bootstrap,effects" />
</com:TOutputCache>
<div class="auth-container">
    <div class="center-block">
        <div class="auth-module">
            <div class="toggle"></div>            
            <com:TContentPlaceHolder ID="maincontent" />            
        </div>
        <div class="footer">
            <div class="float-left">
                Sistem Informasi Administrasi Pemerintah Desa (APEDES)
            </div>
            <div class="float-right">
                <div class="label label-info"><%=$this->Application->getID()%></div>
            </div>
        </div>
    </div>
</div>
</com:TForm>
<!-- Global scripts -->
<script src="<%=$this->Page->Theme->baseUrl%>/lib/js/hammerjs.js"></script>
<script src="<%=$this->Page->Theme->baseUrl%>/lib/js/jquery.hammer.js"></script>
<script src="<%=$this->Page->Theme->baseUrl%>/lib/js/jquery.slimscroll.js"></script>
<script src="<%=$this->Page->Theme->baseUrl%>/lib/js/uniform.min.js"></script>
<script src="<%=$this->Page->Theme->baseUrl%>/lib/js/layouts.js"></script>
<script src="<%=$this->Page->Theme->baseUrl%>/lib/js/core.js"></script>
<script src="<%=$this->Page->Theme->baseUrl%>/lib/js/pace.min.js"></script>
<script src="<%=$this->Page->Theme->baseUrl%>/lib/js/apedes.js"></script>
<!-- /Global scripts -->
</body>
</html>
