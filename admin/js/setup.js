jQuery(function(a){a("#upload-file").change(function(){a("#upload-file").val()?a('#upload-widget-data input[type="submit"]').removeAttr("disabled"):a('#upload-widget-data input[type="submit"]').attr("disabled","disabled")});a("#import-widgets").click(function(){a(".import-widget-settings").closest("#wpbody-content").find(".progress").addClass("active").show().find(".bar").delay(1E3).stop().animate({width:"52.5%"},{duration:2500})});a(".import-widget-settings").closest("#wpbody-content").find(".progress").show().find(".bar").css({width:"0%"});
a('#import-upload-form input[type="submit"]').attr("disabled","disabled");a("#upload").change(function(){a("#upload").val()?a('#import-upload-form input[type="submit"]').removeAttr("disabled"):a('#import-upload-form input[type="submit"]').attr("disabled","disabled")});a("#user-wrap select").change(function(){currSelectText=a("#user-wrap select :selected").text();selectText=a("#user-wrap option:first-child").text();selectText!=currSelectText?a('#dataForm input[type="submit"]').removeAttr("disabled"):
a('#dataForm input[type="submit"]').attr("disabled","disabled")});a('#dataForm input[type="submit"]').click(function(){a(".import-data").closest("#wpbody-content").find(".progress").addClass("active").show().find(".bar").stop().css({width:"52.5%"}).animate({width:"100%"},{duration:15E4})});var b;b=window.location.href;b=b.indexOf("step=4")+1||b.indexOf("step=5")+1?!0:!1;b?(a(".import-data").closest("#wpbody-content").find(".progress").show().find(".bar").css({width:"100%"}),a(".import-data").closest("#wpbody-content").find(".progress .step1").removeClass("in-progress").addClass("success"),
a(".import-data").closest("#wpbody-content").find(".progress .step2").removeClass("in-progress").addClass("success")):(a(".import-data").closest("#wpbody-content").find(".progress").show().find(".bar").css({width:"52.5%"}),a(".import-data").closest("#wpbody-content").find(".progress .step1").removeClass("in-progress").addClass("success"),a(".import-data").closest("#wpbody-content").find(".progress .step2").addClass("in-progress"));b=window.location.href.indexOf("options-permalink.php")+1?!0:!1;b&&
a("#message").hasClass("updated")});