$(function(){function passwordCheck(password){if(password.length>=8)
  strength+=1;if(password.match(/(?=.*[0-9])/))
  strength+=1;if(password.match(/(?=.*[!,%,&,@,#,$,^,*,?,_,~,<,>,])/))
  strength+=1;if(password.match(/(?=.*[a-z])/))
  strength+=1;if(password.match(/(?=.*[A-Z])/))
  strength+=1;displayBar(strength);}
  function displayBar(strength){switch(strength){case 1:$("#password-strength span").css({"width":"20%","background":"#de1616"});break;case 2:$("#password-strength span").css({"width":"40%","background":"#de1616"});break;case 3:$("#password-strength span").css({"width":"60%","background":"#FFA200"});break;case 4:$("#password-strength span").css({"width":"80%","background":"#FFA200"});break;case 5:$("#password-strength span").css({"width":"100%","background":"#06bf06"});break;default:$("#password-strength span").css({"width":"0","background":"#de1616"});}}
  $("[data-strength]").after("<div id=\"password-strength\" class=\"strength\"><span></span></div>");$("[data-strength]").keyup(function(){strength=0;var password=$(this).val();passwordCheck(password);});$('#remove-values').click(function(){$(".remove").val('');});});