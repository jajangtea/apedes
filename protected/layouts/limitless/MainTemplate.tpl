<!DOCTYPE html>
<html lang="id">
<com:THead>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<%=$this->Page->Theme->baseUrl%>/css/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="<%=$this->Page->Theme->baseUrl%>/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<%=$this->Page->Theme->baseUrl%>/css/core.min.css" rel="stylesheet" type="text/css">
    <link href="<%=$this->Page->Theme->baseUrl%>/css/components.min.css" rel="stylesheet" type="text/css">
	<link href="<%=$this->Page->Theme->baseUrl%>/css/colors.min.css" rel="stylesheet" type="text/css">    
    <link href="<%=$this->Page->Theme->baseUrl%>/css/apedes.css" rel="stylesheet" type="text/css">    
    <com:TContentPlaceHolder ID="csscontent" />	
</com:THead>
<body class="navbar-bottom">
<com:TForm id="mainform" Attributes.role="form">
<com:TOutputCache>
    <com:TClientScript PradoScripts="bootstrap,effects" />
</com:TOutputCache>
<!-- Page header -->
<div class="page-header page-header-inverse">
    <!-- Main navbar -->
    <div class="navbar navbar-inverse bg-brown">
        <div class="navbar-header">
            <a class="navbar-brand" href="<%=$this->Page->constructUrl('Home',true)%>"><%=$this->Application->getID()%></a>
            <ul class="nav navbar-nav pull-right visible-xs-block">
                <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-grid3"></i></a></li>
            </ul>
        </div>
        <div class="navbar-collapse collapse" id="navbar-mobile">
            <div class="navbar-right">
                <ul class="nav navbar-nav">
                    <li class="dropdown dropdown-user">
                        <a class="dropdown-toggle" data-toggle="dropdown">
                            <img src="<%=$this->Page->setup->getAddress()%>/<%=$_SESSION['photo_profile']%>" alt="<%=$this->page->Pengguna->getUsername()%>">
                            <span><%=$this->page->Pengguna->getUsername()%></span>
                            <i class="caret"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><a href="<%=$this->Page->constructUrl('settings.Profiles',true)%>"><i class="icon-user-plus"></i> My profile</a></li>                                                
                            <li class="divider"></li>
                            <li>                       
                                <com:TActiveLinkButton ID="btnLogout" OnClick="logoutUser" ClientSide.PostState="false">
                                    <i class="icon-switch2"></i> Logout
                                    <prop:ClientSide.OnPreDispatch>
                                        Pace.stop();
                                        Pace.start();
                                        $('#<%=$this->btnLogout->ClientId%>').prop('disabled',true);						
                                    </prop:ClientSide.OnPreDispatch>
                                    <prop:ClientSide.OnLoading>
                                        $('#<%=$this->btnLogout->ClientId%>').prop('disabled',true);									                            
                                    </prop:ClientSide.OnLoading>
                                    <prop:ClientSide.onComplete>
                                        $('#<%=$this->btnLogout->ClientId%>').prop('disabled',true);									                            
                                    </prop:ClientSide.OnComplete>
                                </com:TActiveLinkButton>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /main navbar -->
    <!-- Page header content -->
    <div class="page-header-content bg-orange">
        <div class="page-title">
            <h4><com:TContentPlaceHolder ID="moduleheader" /></h4>
        </div>
        <div class="heading-elements">
            <ul class="breadcrumb heading-text">
                <li><a href="<%=$this->Page->constructUrl('Home',true)%>"><i class="icon-home2 position-left"></i> HOME</a></li>
                <com:TContentPlaceHolder ID="modulebreadcrumb" />                
            </ul>
        </div>
    </div>
    <!-- /page header content -->
    <!-- Second navbar -->
    <div class="navbar navbar-inverse bg-orange" id="navbar-second">
        <ul class="nav navbar-nav visible-xs-block">
            <li><a class="text-center collapsed" data-toggle="collapse" data-target="#navbar-second-toggle"><i class="icon-paragraph-justify3"></i></a></li>
        </ul>

        <div class="navbar-collapse collapse" id="navbar-second-toggle">
            <ul class="nav navbar-nav navbar-nav-material">
                <li<%=$this->Page->showDashboard==true?' class="active"':''%>>
                   <a href="<%=$this->Page->constructUrl('Home',true)%>">
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="dropdown mega-menu mega-menu-wide">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        ADM. UMUM <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu dropdown-content">
                        <div class="dropdown-content-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <span class="menu-heading underlined">OLAH DATA #1</span>
                                    <ul class="menu-list">
                                        <li><a href="<%=$this->Page->constructUrl('umum.Perdes',true)%>"><i class="icon-width"></i> Peraturan</a></li>
                                        <li><a href="<%=$this->Page->constructUrl('umum.Kepdes',true)%>"><i class="icon-width"></i> Keputusan Kepala Desa</a></li>
                                        <li><a href="<%=$this->Page->constructUrl('umum.InventarisKekayaanDes',true)%>"><i class="icon-width"></i> Inventaris dan Kekayaan</a></li>
                                        <li><a href="<%=$this->Page->constructUrl('umum.AparatPemdes',true)%>"><i class="icon-width"></i> Aparat Pemerintah Desa</a></li>
                                        <li><a href="<%=$this->Page->constructUrl('umum.AparatPemdes',true)%>"><i class="icon-width"></i> Tanah Kas Desa</a></li>                                        
                                    </ul>
                                </div>  
                                <div class="col-md-3">
                                    <span class="menu-heading underlined">OLAH DATA #2</span>
                                    <ul class="menu-list">                                        
                                        <li><a href="<%=$this->Page->constructUrl('umum.AparatPemdes',true)%>"><i class="icon-width"></i> Tanah Desa</a></li>
                                        <li><a href="<%=$this->Page->constructUrl('umum.AparatPemdes',true)%>"><i class="icon-width"></i> Agenda</a></li>
                                        <li><a href="<%=$this->Page->constructUrl('umum.AparatPemdes',true)%>"><i class="icon-width"></i> Ekspedisi</a></li>
                                        <li><a href="<%=$this->Page->constructUrl('umum.AparatPemdes',true)%>"><i class="icon-width"></i> Lembaran Desa</a></li>
                                        <li><a href="<%=$this->Page->constructUrl('umum.AparatPemdes',true)%>"><i class="icon-width"></i> Berita Desa</a></li>
                                    </ul>
                                </div>  
                                <div class="col-md-3">
                                    <span class="menu-heading underlined">LAPORAN</span>
                                    
                                </div>  
                                <div class="col-md-3">
                                    <span class="menu-heading underlined">STATISTIK</span>
                                    <ul class="menu-list">                                        
                                        
                                    </ul>
                                </div>  
                            </div>
                        </div>
                    </div>
                </li>
                <li class="dropdown mega-menu mega-menu-wide<%=$this->Page->showMenuADMPenduduk==true?' active':''%>">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        ADM. PENDUDUK <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu dropdown-content">
                        <div class="dropdown-content-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <span class="menu-heading underlined">Olah Data #1</span>
                                    <ul class="menu-list">
                                        <li<%=$this->Page->showBukuIndukPenduduk==true?' class="active"':''%>><a href="<%=$this->Page->constructUrl('capil.IndukPenduduk',true)%>"><i class="icon-width"></i> Buku Induk Penduduk</a></li>
                                        <li><a href="<%=$this->Page->constructUrl('capil.MutasiPenduduk',true)%>"><i class="icon-width"></i> Mutasi Penduduk Desa</a></li>
                                        <li><a href="<%=$this->Page->constructUrl('capil.PendudukSementara',true)%>"><i class="icon-width"></i> Penduduk Sementara</a></li>
                                        <li><a href="<%=$this->Page->constructUrl('capil.KTP',true)%>"><i class="icon-width"></i> KTP dan Kartu Keluarga</a></li>
                                                                         
                                    </ul>
                                </div>  
                                <div class="col-md-3">
                                    <span class="menu-heading underlined">Laporan</span>
                                    <ul class="menu-list">                                        
                                        <li><a href="<%=$this->Page->constructUrl('capil.RekapJumlahPenduduk',true)%>"><i class="icon-width"></i> Rekapitulasi Jumlah Penduduk</a></li>                                        
                                    </ul>
                                </div>  
                            </div>
                        </div>
                    </div>
                </li>
                <li class="dropdown mega-menu mega-menu-wide">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        ADM. PEMBANGUNAN <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu dropdown-content">
                        <div class="dropdown-content-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <span class="menu-heading underlined">Olah Data #1</span>
                                    <ul class="menu-list">
                                        <li><a href="<%=$this->Page->constructUrl('pembangunan.RencanaKerjaPembangunan',true)%>"><i class="icon-width"></i> Rencana Kerja Pembangunan</a></li>
                                        <li><a href="<%=$this->Page->constructUrl('pembangunan.KegiatanPembangunan',true)%>"><i class="icon-width"></i> Kegiatan Pembangunan</a></li>
                                        <li><a href="<%=$this->Page->constructUrl('pembangunan.InventarisasiHasilPembangunan',true)%>"><i class="icon-width"></i> Inventarisasi Hasil Pembangunan</a></li>
                                        <li><a href="<%=$this->Page->constructUrl('pembangunan.PendampinganPemberdayaan',true)%>"><i class="icon-width"></i> Kader Pendampingan & Pemberdayaan</a></li>                                                                     
                                    </ul>
                                </div>  
                                <div class="col-md-3">
                                    <span class="menu-heading underlined">Laporan</span>
                                    <ul class="menu-list">                                        
                                        
                                    </ul>
                                </div>  
                            </div>
                        </div>
                    </div>
                </li>
                <li class="dropdown mega-menu mega-menu-wide">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        ADM. LAINNYA <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu dropdown-content">
                        <div class="dropdown-content-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <span class="menu-heading underlined">Olah Data #1</span>
                                    <ul class="menu-list">
                                        <li><a href="<%=$this->Page->constructUrl('lainnya.KegiatanBPD',true)%>"><i class="icon-width"></i> Administrasi BPD</a></li>
                                        <li><a href="<%=$this->Page->constructUrl('lainnya.Kepdes',true)%>"><i class="icon-width"></i> Musyawarah Desa</a></li>
                                        <li><a href="<%=$this->Page->constructUrl('lainnya.PendudukSementara',true)%>"><i class="icon-width"></i> Lembaga Kemasyarakatan Desa</a></li>                                                                                                            
                                    </ul>
                                </div>  
                                <div class="col-md-3">
                                    <span class="menu-heading underlined">Laporan</span>
                                    <ul class="menu-list">                                        
                                        
                                    </ul>
                                </div>  
                            </div>
                        </div>
                    </div>
                </li>
                <li class="dropdown <%=$this->Page->showMenuSetting==true?' active':''%>">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        SETTINGS <span class="caret"></span>
                    </a>                
                    <ul class="dropdown-menu width-200">
                        <li<%=$this->Page->showUsers==true?' class="active"':''%>>
                            <a href="<%=$this->Page->constructUrl('settings.Users',true)%>">
                                <i class="icon-user"></i> Pengguna
                            </a>
                        </li>
                        <li class="dropdown-header">Sistem</li>
                        <li<%=$this->Page->showCache==true?' class="active"':''%>>
                            <a href="<%=$this->Page->constructUrl('settings.Cache',true)%>">
                                <i class="icon-database2"></i> Cache
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!-- /second navbar -->
    <com:TContentPlaceHolder ID="floatingmenucontent" />    
</div>
<!-- page container -->
<div class="page-container">
    <div class="page-content">
        <div class="content-wrapper">
            <com:TContentPlaceHolder ID="maincontent" />
        </div>
    </div>
</div>
<!-- /page container -->
<!-- Footer -->
<div class="navbar navbar-default navbar-fixed-bottom footer">
    <ul class="nav navbar-nav visible-xs-block">
        <li><a class="text-center collapsed" data-toggle="collapse" data-target="#footer"><i class="icon-circle-up2"></i></a></li>
    </ul>
    <div class="navbar-collapse collapse" id="footer">
        <div class="navbar-text">
            Sistem Informasi Administrasi Pemerintah Desa (APEDES) Powered By <a href="https://www.yacanet.com" class="navbar-link" target="_blank">Yacanet</a>
            <com:TJavascriptLogger ID="loggerJS" />
        </div>
        <div class="navbar-right">
            <ul class="nav navbar-nav">
                <li><a href="#">Bantuan</a></li>                
            </ul>
        </div>
    </div>
</div>
<!-- /footer -->
</com:TForm>
<script type="text/javascript" src="<%=$this->Page->Theme->baseUrl%>/js/pace.min.js"></script>
<script type="text/javascript" src="<%=$this->Page->Theme->baseUrl%>/js/nicescroll.min.js"></script>
<script type="text/javascript" src="<%=$this->Page->Theme->baseUrl%>/js/drilldown.js"></script>
<script type="text/javascript" src="<%=$this->Page->Theme->baseUrl%>/js/app.min.js"></script>
<com:TContentPlaceHolder ID="jscontent" />
<com:TContentPlaceHolder ID="jsinlinecontent" />
</body>        
</html>
