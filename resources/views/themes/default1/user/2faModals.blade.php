<div class="modal fade" id="2fa-modal1">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title">Set up Authenticator</h4>
    </div>
    <div class="modal-body">
                
      <div class= "form-group {{ $errors->has('name') ? 'has-error' : '' }}">
          {!! Form::label('name',Lang::get('message.varify_password'),['class'=>'required']) !!}
          <input type="password" name="password" id="user_password" placeholder="Enter Password" class="form-control" required="required">
      </div>
      <span id="passerror"></span>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default pull-left closeandrefresh" data-dismiss="modal"><i class="fa fa-times">&nbsp;&nbsp;</i>Close</button>
      <button type="button" id="verify_password" class="btn btn-primary"><i class="fa fa-check">&nbsp;&nbsp;</i>Validate</button>
    </div>
  </div>
  <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>




<div class="modal fade" id="2fa-modal2">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title">Set up Authenticator</h4>
    </div>
    <div class="text-center">
    <div class="modal-body bar-code">
            <ul class="col-sm-offset-3 offset-sm-2 text-left">
              <li>Get the Authenticator App from the Play Store.</li>
              <li>In the App select <b>Set up account.</b></li>
              <li>Choose <b>Scan a barcode.</b></li>
            </ul>     
      <div id="barcode">
         <img id="image"/>
      </div>
      <a href="javascript:;" id="cantscanit">CAN'T SCAN IT?</a>
    </div>
    <div class="modal-body secret-key">
            <ul class="col-sm-offset-3 offset-sm-2 text-left">
              <li>Tap <b>Menu</b>, then <b>Set up account.</b></li>
              <li>Tap <b>Enter provided key.</b></li>
              <li>Enter your email address and this key :</li>
              <br>
            <div>
              <input type="text" id="secretkeyid" readonly="readonly" class="form-control" style="width: auto;">
            </div>
              
              <br><br>
              <li>Make sure <b>Time based</b> is turned on, and tap <b>Add</b> to finish.</li>
            </ul>     
      <a href="javascript:;" id="scanbarcode">SCAN BARCODE?</a>
    </div>
  </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default pull-left closeandrefresh" data-dismiss="modal"><i class="fa fa-times">&nbsp;&nbsp;</i>Close</button>
      <button type="button" id="scan_complete" class="btn btn-primary">Next&nbsp;&nbsp;<i class="fa fa-arrow-right"></i></button>
    </div>
  </div>
  <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>


<div class="modal fade" id="2fa-modal3">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title">Set up Authenticator</h4>
    </div>
    <div class="modal-body modal-body-spacing">
       <div class="row">         
    
        <div class="col-sm-8 text-left form-group form-field-template">
          {!! Form::label('name',Lang::get('message.enter_6_digit_code'),['class'=>'required']) !!}
          <div>
          <input type="text" name="password" style="margin-top: 3px;" id="passcode"  placeholder="Enter Passcode..." class="form-control" required="required">
        </div>
        <span id="passcodeerror"></span>
        </div>
          <div class="col-sm-3">
          <button type="button" id="pass_btn" style="margin-top:30px" class="btn btn-primary pull-right float-right">
            <i class="fa fa-check"></i> Verify 
          </button>
        </div>
     
    </div>
      
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default pull-left closeandrefresh" data-dismiss="modal"><i class="fa fa-times">&nbsp;&nbsp;</i>Close</button>
      <button type="button" id="prev_button" class="btn btn-primary float-right"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Previous</button>
    </div>
  </div>
  <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>


<div class="modal fade" id="2fa-modal4">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title">Set up Authenticator</h4>
    </div>
    <div class="modal-body">
                
      <div class= "form-group {{ $errors->has('name') ? 'has-error' : '' }}">
          You're all set. From now on, you'll use Authenticator to sign in to your Faveo Billing Account.
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default pull-left closeandrefresh" data-dismiss="modal"><i class="fa fa-times">&nbsp;&nbsp;</i>Close</button>
    </div>
  </div>
  <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>

<div class="modal fade" id="2fa-modal5">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title">Turn off Two-Factor-Authentication</h4>
     
    </div>
    
    <div class="modal-body">
       <div id="alertMessage"></div>
      <div class= "form-group {{ $errors->has('name') ? 'has-error' : '' }}">
          Turning off 2-Step Verification will remove the extra security on your account, and you’ll only use your password to sign in.
      </div>
    </div>
    <div class="modal-footer">
      <button class="btn btn-danger pull-right float-right" id="turnoff2fa"><i class="fa fa-power-off"></i> TURN OFF</button>
      <button type="button" class="btn btn-default pull-left closeandrefresh" data-dismiss="modal"><i class="fa fa-times">&nbsp;&nbsp;</i>Close</button>
    </div>
  </div>
  <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>

