<com:TContent ID="maincontent">
    <com:TPanel Visible="<%= $this->getEditProcess(false) %>" CssClass="content">	   
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title"><i class="icon-googleplus5 position-left"></i> BUKU INDUK PENDUDUK <com:TLabel ID="lblEditKurikulum" /></h5>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li>
                            <a href="<%=$this->Page->constructUrl('KonversiMatakuliah',true);%>" data-action="closeredirect"></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="panel-body">
                <div class="form-horizontal">
                    <div class="form-group" id="divEditNomorUrut">
                        <label class="col-md-2 control-label text-right">Nomor Urut :</label>
                        <div class="col-md-10">
                            <com:TTextBox ID="txtEditNomorUrut" MaxLength="6" CssClass="form-control" Width="80px" />
                            <com:TRequiredFieldValidator ID="FieldEditNimAsalValidator" ControlToValidate="txtEditNomorUrut" Display="Dynamic" ErrorMessage="Isi NIM Asal" ValidationGroup="EditIndukPenduduk" CssClass="has-error help-block">
                                <prop:ClientSide.OnValidationError>
                                    $('divEditNomorUrut').addClassName('has-error');
                                    jQuery('#<%=$this->FieldEditNimAsalValidator->ClientID%>').removeAttr('style');
                                </prop:ClientSide.OnValidationError>
                                <prop:ClientSide.OnValidationSuccess>
                                    $('divEditNomorUrut').removeClassName('has-error');
                                </prop:ClientSide.OnValidationSuccess>
                            </com:TRequiredFieldValidator>
                        </div>
                    </div>
                    <div class="form-group" id="divEditNamaLengkap">
                        <label class="col-md-2 control-label text-right">Nama Lengkap/Panggilan :</label>
                        <div class="col-md-4">
                            <com:TTextBox ID="txtEditNamaLengkap" CssClass="form-control" />
                            <com:TRequiredFieldValidator ID="FieldEditNamaValidator" ControlToValidate="txtEditNamaLengkap" Display="Dynamic" ErrorMessage="Isi Jenis Peraturan" ValidationGroup="EditIndukPenduduk" CssClass="has-error help-block">
                                <prop:ClientSide.OnValidationError>
                                    $('divEditNamaLengkap').addClassName('has-error');
                                    jQuery('#<%=$this->FieldEditNamaValidator->ClientID%>').removeAttr('style');
                                </prop:ClientSide.OnValidationError>
                                <prop:ClientSide.OnValidationSuccess>
                                    $('divEditNamaLengkap').removeClassName('has-error');
                                </prop:ClientSide.OnValidationSuccess>
                            </com:TRequiredFieldValidator>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label text-right">Jenis Kelamin :</label>
                        <div class="col-lg-5">
                            <com:TRadioButton ID="rdEditPria" Checked="true" GroupName="rdaddJK"/>                        
                            <label>Pria</label>
                            <com:TRadioButton ID="rdEditWanita" GroupName="rdaddJK"/>                        
                            <label>Wanita</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label text-right">Status Perkawinan :</label>
                        <div class="col-lg-5">
                            <com:TRadioButton ID="rdEditSudahMenikah" Checked="true" GroupName="rdaddSdhNikah"/>                        
                            <label>Menikah</label>
                            <com:TRadioButton ID="rdEditBelumMenikah" GroupName="rdaddBlmNikah"/>                        
                            <label>Belum Menikah</label>
                        </div>
                    </div>  
                    <div class="form-group" id="divEditTempatLahir">
                        <label class="col-lg-2 control-label text-right">Tempat Lahir :</label>
                        <div class="col-lg-3">
                            <com:TTextBox ID="txtEditTempatLahir" CssClass="form-control" />
                            <com:TRequiredFieldValidator ID="FieldEditTempatLahirValidator" ControlToValidate="txtEditTempatLahir" Display="Dynamic" ErrorMessage="Isi Tempat Lahir" ValidationGroup="addIndukPenduduk" CssClass="has-error help-block">
                                <prop:ClientSide.OnValidationError>
                                    $('divEditTempatLahir').addClassName('has-error');
                                    jQuery('#<%=$this->FieldEditTempatLahirValidator->ClientID%>').removeAttr('style');
                                </prop:ClientSide.OnValidationError>
                                <prop:ClientSide.OnValidationSuccess>
                                    $('divEditTempatLahir').removeClassName('has-error');
                                </prop:ClientSide.OnValidationSuccess>
                            </com:TRequiredFieldValidator>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label text-right">Tanggal Lahir :</label>
                        <div class="col-lg-4">
                            <com:TCustomDatePicker ID="txtEditTanggalLahir" DateFormat="dd-MMMM-yyyy" Culture="id"  FromYear="1940" UpToYear="<%= @date('Y') %>" InputMode="DropDownList" />
                        </div>
                    </div>
                    <div class="form-group" id="divEditAgama">
                        <label class="col-md-2 control-label text-right">Agama :</label>
                        <div class="col-md-2">
                            <com:TDropDownList ID="cmbEditAgama" CssClass="form-control" />                                                    
                            <com:TRequiredFieldValidator ID="FieldEditAgamaValidator" InitialValue="none" ControlToValidate="cmbEditAgama" Display="Dynamic" ErrorMessage="Pilih Agama yang dianut" ValidationGroup="" FocusOnError="true" CssClass="has-error help-block">			
                                <prop:ClientSide.OnValidationError>
                                    $('divEditAgama').addClassName('has-error');
                                    jQuery('#<%=$this->FieldEditAgamaValidator->ClientID%>').removeAttr('style');
                                </prop:ClientSide.OnValidationError>
                                <prop:ClientSide.OnValidationSuccess>
                                    $('divEditAgama').removeClassName('has-error');
                                </prop:ClientSide.OnValidationSuccess>
                            </com:TRequiredFieldValidator>                  
                        </div>
                    </div>
                    <div class="form-group" id="divEditKotaPendidikanTerakhir">
                        <label class="col-lg-2 control-label text-right">Pendidikan Terakhir :</label>
                        <div class="col-lg-3">
                            <com:TTextBox ID="txtEditKotaPendidikanTerakhir" CssClass="form-control" />                            
                            <com:TRequiredFieldValidator ID="FieldEditKotaPendidikanTerakhirValidator" ControlToValidate="txtEditKotaPendidikanTerakhir" Display="Dynamic" ErrorMessage="Isi Kota saat Pendidikan Terakhir" ValidationGroup="addIndukPenduduk" CssClass="has-error help-block">
                                <prop:ClientSide.OnValidationError>
                                    $('divEditKotaPendidikanTerakhir').addClassName('has-error');
                                    jQuery('#<%=$this->FieldEditKotaPendidikanTerakhirValidator->ClientID%>').removeAttr('style');
                                </prop:ClientSide.OnValidationError>
                                <prop:ClientSide.OnValidationSuccess>
                                    $('divEditKotaPendidikanTerakhir').removeClassName('has-error');
                                </prop:ClientSide.OnValidationSuccess>
                            </com:TRequiredFieldValidator>
                        </div>
                    </div>
                    <div class="form-group" id="divEditPekerjaan">
                        <label class="col-lg-2 control-label text-right">Pekerjaan :</label>
                        <div class="col-lg-4">
                            <com:TDropDownList ID="cmbEditPekerjaan" CssClass="form-control"/>
                            <com:TRequiredFieldValidator ID="FieldEditPekerjaanValidator" InitialValue="none" ControlToValidate="cmbEditPekerjaan" Display="Dynamic" ErrorMessage="Pilih Pekerjaan Orangtua." ValidationGroup="addIndukPenduduk" CssClass="has-error help-block">
                                <prop:ClientSide.OnValidationError>
                                    $('divEditPekerjaan').addClassName('has-error');
                                    jQuery('#<%=$this->FieldEditPekerjaanValidator->ClientID%>').removeAttr('style');
                                </prop:ClientSide.OnValidationError>
                                <prop:ClientSide.OnValidationSuccess>
                                    $('divEditPekerjaan').removeClassName('has-error');
                                </prop:ClientSide.OnValidationSuccess>
                            </com:TRequiredFieldValidator>
                        </div>
                    </div> 
                    <div class="form-group">
                        <label class="col-lg-2 control-label text-right">Dapat Membaca Huruf :</label>
                        <div class="col-lg-4">
                            <com:TRadioButton ID="rdEditYa" Checked="true" GroupName="rdaddBaca"/>                        
                            <label>Ya</label>
                            <com:TRadioButton ID="rdEditTidak" GroupName="rdaddBaca"/>                        
                            <label>Tidak</label>
                        </div>
                    </div>
                    <div class="form-group" id="divEditKewarganegaraan">
                        <label class="col-md-2 control-label text-right">Kewarganegaraan :</label>
                        <div class="col-md-2">
                            <com:TDropDownList ID="cmbEditKewarganegaraan" CssClass="form-control" />                                                    
                            <com:TRequiredFieldValidator ID="FieldEditKewarganegaraanValidator" InitialValue="none" ControlToValidate="cmbEditKewarganegaraan" Display="Dynamic" ErrorMessage="Pilih Agama yang dianut" ValidationGroup="" FocusOnError="true" CssClass="has-error help-block">			
                                <prop:ClientSide.OnValidationError>
                                    $('divEditKewarganegaraan').addClassName('has-error');
                                    jQuery('#<%=$this->FieldEditKewarganegaraanValidator->ClientID%>').removeAttr('style');
                                </prop:ClientSide.OnValidationError>
                                <prop:ClientSide.OnValidationSuccess>
                                    $('divEditKewarganegaraan').removeClassName('has-error');
                                </prop:ClientSide.OnValidationSuccess>
                            </com:TRequiredFieldValidator>                  
                        </div>
                    </div>
                    <div class="form-group" id="divEditAlamatLengkap">
                        <label class="col-md-2 control-label text-right">Alamat Lengkap :</label>
                        <div class="col-md-4">
                            <com:TTextBox ID="txtEditAlamatLengkap" CssClass="form-control" />
                            <com:TRequiredFieldValidator ID="FieldEditAlamatLengkapValidator" ControlToValidate="txtEditAlamatLengkap" Display="Dynamic" ErrorMessage="Isi Alamat Tempat Tinggal" ValidationGroup="addIndukPenduduk" CssClass="has-error help-block">
                                <prop:ClientSide.OnValidationError>
                                    $('divEditAlamatLengkap').addClassName('has-error');
                                    jQuery('#<%=$this->FieldEditAlamatLengkapValidator->ClientID%>').removeAttr('style');
                                </prop:ClientSide.OnValidationError>
                                <prop:ClientSide.OnValidationSuccess>
                                    $('divEditAlamatLengkap').removeClassName('has-error');
                                </prop:ClientSide.OnValidationSuccess>
                            </com:TRequiredFieldValidator>
                        </div>
                    </div>  
                    <div class="form-group" id="divEditKedudukan">
                        <label class="col-md-2 control-label text-right">Kedudukan Dalam Keluarga :</label>
                        <div class="col-md-2">
                            <com:TDropDownList ID="cmbEditKedudukan" CssClass="form-control" />                                                    
                            <com:TRequiredFieldValidator ID="FieldEditKedudukanValidator" InitialValue="none" ControlToValidate="cmbEditKedudukan" Display="Dynamic" ErrorMessage="Pilih Agama yang dianut" ValidationGroup="" FocusOnError="true" CssClass="has-error help-block">			
                                <prop:ClientSide.OnValidationError>
                                    $('divEditKedudukan').addClassName('has-error');
                                    jQuery('#<%=$this->FieldEditKedudukanValidator->ClientID%>').removeAttr('style');
                                </prop:ClientSide.OnValidationError>
                                <prop:ClientSide.OnValidationSuccess>
                                    $('divEditKedudukan').removeClassName('has-error');
                                </prop:ClientSide.OnValidationSuccess>
                            </com:TRequiredFieldValidator>                  
                        </div>
                    </div>
                    <div class="form-group" id="divEditNIK">
                        <label class="col-md-2 control-label text-right">NIK :</label>
                        <div class="col-md-4">
                            <com:TTextBox ID="txtEditNIK" CssClass="form-control" />
                            <com:TRequiredFieldValidator ID="FieldEditNIKValidator" ControlToValidate="txtEditNIK" Display="Dynamic" ErrorMessage="Isi Alamat Tempat Tinggal" ValidationGroup="addIndukPenduduk" CssClass="has-error help-block">
                                <prop:ClientSide.OnValidationError>
                                    $('divEditNIK').addClassName('has-error');
                                    jQuery('#<%=$this->FieldEditNIKValidator->ClientID%>').removeAttr('style');
                                </prop:ClientSide.OnValidationError>
                                <prop:ClientSide.OnValidationSuccess>
                                    $('divEditNIK').removeClassName('has-error');
                                </prop:ClientSide.OnValidationSuccess>
                            </com:TRequiredFieldValidator>
                        </div>
                    </div>  
                    <div class="form-group" id="divEditNoKK">
                        <label class="col-md-2 control-label text-right">Nomor KK :</label>
                        <div class="col-md-4">
                            <com:TTextBox ID="txtEditNoKK" CssClass="form-control" />
                            <com:TRequiredFieldValidator ID="FieldEditNoKKValidator" ControlToValidate="txtEditNoKK" Display="Dynamic" ErrorMessage="Isi Alamat Tempat Tinggal" ValidationGroup="addIndukPenduduk" CssClass="has-error help-block">
                                <prop:ClientSide.OnValidationError>
                                    $('divEditNoKK').addClassName('has-error');
                                    jQuery('#<%=$this->FieldEditNoKKValidator->ClientID%>').removeAttr('style');
                                </prop:ClientSide.OnValidationError>
                                <prop:ClientSide.OnValidationSuccess>
                                    $('divEditNoKK').removeClassName('has-error');
                                </prop:ClientSide.OnValidationSuccess>
                            </com:TRequiredFieldValidator>
                        </div>
                    </div>  
                    <div class="form-group" id="divEditKeterangan">
                        <label class="col-md-2 control-label text-right">Keterangan :</label>
                        <div class="col-md-5">
                            <com:TTextBox ID="txtEditKeterangan" CssClass="form-control" />
                            <com:TRequiredFieldValidator ID="FieldEditKeterangan" ControlToValidate="txtEditKeterangan" Display="Dynamic" ErrorMessage="Isi Nama PS Asal" ValidationGroup="EditIndukPenduduk" CssClass="has-error help-block">
                                <prop:ClientSide.OnValidationError>
                                    $('divEditKeterangan').addClassName('has-error');
                                    jQuery('#<%=$this->FieldEditKeterangan->ClientID%>').removeAttr('style');
                                </prop:ClientSide.OnValidationError>
                                <prop:ClientSide.OnValidationSuccess>
                                    $('divEditKeterangan').removeClassName('has-error');
                                </prop:ClientSide.OnValidationSuccess>
                            </com:TRequiredFieldValidator>
                        </div>
                    </div> 
                </div>
            </div>
            <div class="panel-body">
                <div class="alert bg-warning alert-styled-right">
                    <button type="button" class="close"><span>&times;</span><span class="sr-only">Close</span></button>
                    <span class="text-semibold">Warning!</span> Kami blah.....
                </div>
            </div>
        </div>  
    </com:TPanel>
</com:TContent>
