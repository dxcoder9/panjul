$(document).ready(function(){

	// input tooltip    
  $("input").tooltip();

	// login
	$("#login-submit").click(function(){    
        username=$("#login-username").val();
        password=$("#login-password").val();
        $.ajax({
           type: "POST",
           url: base_url+"account/login_process",
           data: "username="+username+"&password="+password,
           success: function(html){    
        		if(html=='true'){
             		window.location = base_url;
            	}else if(html=='false'){
            		$("#login-alert").hide().html("<h4 class='alert-notif'>Ups, ada yang eror!</h4><p class=suggest>Username atau Password tidak cocok :3.</p>").fadeIn('slow');
            	}else{
            		$("#login-alert").hide().html("<h4 class='alert-notif'>Ups, ada yang eror!</h4><p class=suggest>Username dan Password harus diisi :3.</p>").fadeIn('slow');
            	}
           },
           beforeSend:function()
           {
            $("#login-alert").html("<h4 class='alert-notif'>Loading...</h4>").fadeIn('fast');
           }
          });
        return false;
    });

	// logout
	$("#logout").click(function(){
		$.ajax({
			type: "POST",
			url: base_url+"account/logout"
		})
		$("#nav-right").load(base_url+'template/aside').hide().fadeIn('slow');
	})

  // Parsedown Preview
  $('.nulis').on('keyup || keypress || focus',function(e){
    var tulisan = $('.nulis').val();
    if(tulisan!="") {
      $.post(base_url+'admin/previewpost', {inilah: tulisan} ,function(data) {
        $(".diparse").html(data).show();
      });
    }
  });

  $("#nulis-title").on("keyup || keypress",function(e){
    var datanya = $("#nulis-title").val();
    if(datanya !=""){
      $(".title").html(datanya);
    }
  })
  // Parsedown Preview end

  // Register
  $("#register-username").on('focusout',function(){
    var username = $("#register-username").val();
    if(username!="") {
      $.post(base_url+'account/check_username', {username: username} ,function(data) {
        $(".error-username").html(data).show().hide().fadeIn('slow');
      });
    }
  })
  $("#register-email").on('focusout',function(){
    var email = $("#register-email").val();
    if(email != "") {
      $.post(base_url+'account/check_email', {email: email} ,function(data) {
        $(".error-email").html(data).show().hide().fadeIn('slow');
      });
    }
  })
  $("#register-confirm-password").change(function(e){
    var pass = $("#register-password").val();
    var passcon = $("#register-confirm-password").val();
    if(pass != passcon){
      $(".error-confirm-password").hide().html("Password tidak sama").fadeIn('slow');
    }else{
      $(".error-confirm-password").hide();
    }
  })
  $("#register-submit").click(function(){    
    username=$("#register-username").val();
    email=$("#register-email").val();
    password=$("#register-password").val();
    passcon=$("#register-confirm-password").val();
    $.ajax({
      type: "POST",
      url: base_url+"account/register_process",
      data: "username="+username+"&email="+email+"&password="+password+"&confirm-password="+passcon,
      success: function(html){
        if(html == 'true'){
          window.location = base_url;
        }else{
          $("#register-alert").hide().html(html).fadeIn('slow');
        }
      },
      beforeSend:function()
      {
        $("#register-alert").html("<h4 class='alert-notif'>Loading...</h4>").fadeIn('fast');
      }
    });
    return false;
  });
  
});