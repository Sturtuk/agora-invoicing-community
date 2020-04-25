     $(document).ready(function(){
     	 var status = $('.checkbox').val();
         if(status ==1) {
         $('#2fa').prop('checked',true)
         } else if(status ==0) {
          $('#2fa').prop('checked',false)
         }
     	});

         $('.closeandrefresh').on('click',function(){
            location.reload();
        })
        $('#2fa').change(function () {
        if ($(this).prop("checked")) {
            // checked
            $('#2fa-modal1').modal('show');
            $('#verify_password').on('click',function(){
                $("#verify_password").attr('disabled',true);
                $("#verify_password").html("<i class='fa fa-circle-o-notch fa-spin fa-1x fa-fw'></i>Verifying...");
                var password = $('#user_password').val();
                if(password.length == 0) {
                $("#verify_password").html("<i class='fa fa-check'></i> Validate");
                $('#passerror').show();
                $('#passerror').html("Please Enter Password");
                $('#passerror').focus();
                $('#user_password').css("border-color","red");
                $('#passerror').css({"color":"red"});
                return false;
                }
                $.ajax({
                    url : "verify-password",
                    method : 'GET',
                    data : {
                        "user_password" : password,
                    },
                
                success: function (response) {
                     $('#2fa-modal1').modal('hide');
                     $.ajax({
                        url : "2fa/enable",
                        method : 'get',
                        
                success: function(response) {

                    $('#2fa-modal2').modal('show');
                     $(".bar-code").attr("hidden",false);
                     $(".secret-key").attr("hidden",true);
                     document.querySelectorAll('[id="image"]')[0].src = response.data.image;
                     $('#cantscanit').on('click',function(){
                        $(".bar-code").attr("hidden",true);
                        $("#secretkeyid").val(response.data.secret);
                        $(".secret-key").attr("hidden",false)

                     })
                     $('#scanbarcode').on('click',function(){
                        $(".bar-code").attr("hidden",false);
                        document.querySelectorAll('[id="image"]')[0].src = response.data.image;
                        $(".secret-key").attr("hidden",true)

                     })

                     $('#scan_complete').on('click',function(){
                        $('#2fa-modal2').modal('hide');
                         $('#2fa-modal3').modal('show');
                         $('#pass_btn').on('click',function(){
                            var code = $('#passcode').val();
                            if(code.length == 0) {
                                $('#passcodeerror').show();
                                $('#passcodeerror').html("Please Enter the code");
                                $('#passcodeerror').focus();
                              $('#passcode').css("border-color","red");
                              $('#passcodeerror').css({"color":"red"});
                              return false;
                            }
                            $("#pass_btn").attr('disabled',true);
                            $("#pass_btn").html("<i class='fa fa-circle-o-notch fa-spin fa-1x fa-fw'></i>Verifying...");
                            $.ajax({
                                url : "2fa/setupValidate",
                                method : 'POST',
                                data : {
                                    'totp' : code,
                                },
                            success : function(response) {
                                $("#pass_btn").attr('disabled',false);
                               $('#2fa-modal3').modal('hide');
                                $('#2fa-modal4').modal('show');
                                setTimeout(function(){
                                    location.reload();
                                },2000);
                            },
                            error: function (data) {
                                $("#pass_btn").attr('disabled',false);
                            $("#pass_btn").html("<i class='fa fa-check'></i> Verify");
                            $('#passcodeerror').show();
                            $('#passcodeerror').html("Wrong Code. Try again");
                             $('#passcodeerror').focus();
                              $('#passcode').css("border-color","red");
                             $('#passcodeerror').css({"color":"red"});
                            },
                            })
                            
                         })
                         $('#prev_button').on('click',function(){
                            $('#2fa-modal3').modal('hide');
                            $('#2fa-modal2').modal('show');
                         })
                     })
                    }

                }) 
                    
                },
                error: function (data) {
                    $("#verify_password").attr('disabled',false);
                    $("#verify_password").html("<i class='fa fa-check'></i> Validate");
                    $('#passerror').show();
                    $('#passerror').html("Incorrect Password. Try again");
                     $('#passerror').focus();
                      $('#user_password').css("border-color","red");
                     $('#passerror').css({"color":"red"});
                    },
            });
            });
        } else {
            $('#2fa-modal5').modal('show');
            $('#turnoff2fa').on('click',function(){
                $("#turnoff2fa").attr('disabled',true);
                $("#turnoff2fa").html("<i class='fa fa-circle-o-notch fa-spin fa-1x fa-fw'></i>Please Wait..");
                $.ajax({
                    url : "2fa/disable",
                    method : 'get',
                    success: function(response){
                        $("#turnoff2fa").attr('disabled',false);
                        $("#turnoff2fa").html("<i class='fa fa-power-off'></i>TURNED OFF");
                        console.log(response);
                         var result =  '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong></strong>'+response.message+'.</div>';
                            $('#alertMessage').html(result+ ".");
                            setTimeout(function(){
                                location.reload();
                            },2000);
                    },
                })
            })
        }
    })