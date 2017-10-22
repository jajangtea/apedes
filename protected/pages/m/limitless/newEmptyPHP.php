<div class="form-group" id="divAddNoKK">
                    <label class="col-md-2 control-label text-right">Nomor KK :</label>
                    <div class="col-md-4">
                        <com:TTextBox ID="txtAddNoKK" CssClass="form-control" />
                        <com:TRequiredFieldValidator ID="FieldAddNoKKValidator" ControlToValidate="txtAddNoKK" Display="Dynamic" ErrorMessage="Isi Alamat Tempat Tinggal" ValidationGroup="editformulir" CssClass="has-error help-block">
                            <prop:ClientSide.OnValidationError>
                                $('divAddNoKK').addClassName('has-error');
                                jQuery('#<%=$this->FieldAddNoKKValidator->ClientID%>').removeAttr('style');
                            </prop:ClientSide.OnValidationError>
                            <prop:ClientSide.OnValidationSuccess>
                                $('divAddNoKK').removeClassName('has-error');
                            </prop:ClientSide.OnValidationSuccess>
                        </com:TRequiredFieldValidator>
                    </div>
                </div>  