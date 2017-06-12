// $(document).ready(function () {
//
// /////////////////signin//////
//
//
//
//     $("body").click(function( event ) {
//         // event.preventDefault();
//         // alert(event.target.nodeName);
//         // $("#log").html(event.target.nodeName );
//
//         switch (event.target.id){
//             case "sRegistration" :
//                 event.preventDefault();
//                 $(".valid").css("display", "none");
//
//                 var  user_nameValid          = $("#erName");
//                 var  user_surnameValid       = $("#erSure_name");
//                 var  user_emailValid         = $("#erEmail");
//                 var  user_passValid          = $("#erPass");
//                 var  user_check_passValid    = $("#erRePass");
//                 var  user_countryValid       = $("#erCountry");
//                 var  user_cityValid          = $("#erCity");
//                 var  user_addressValid       = $("#erAddress");
//                 var  user_date_of_birthValid = $("#erBirth");
//                 var  user_postcodeValid      = $("#erPostcode");
//                 var  not_robotValid          = $("#erRobot");
//
//
//                 var date =  $("form#registerForm").serialize();
//
//                 $.post("register", date, function (data) {
//                     if (data.html.status == "ERR"){
//
//                         if (data.html.error_valid){
//
//                             if (data.html.error_valid.username){
//                                 user_nameValid
//                                     .show()
//                                     .html(data.html.error_valid.username);
//
//                             }
//
//                             if (data.html.error_valid.username){
//                                 user_addressValid
//                                     .show()
//                                     .html(data.html.error_valid.user_address);
//
//                             }
//
//                             if (data.html.error_valid.sure_name){
//                                 user_surnameValid
//                                     .show()
//                                     .html(data.html.error_valid.sure_name);
//                             }
//
//                             if (data.html.error_valid.user_email){
//                                 user_emailValid
//                                     .show()
//                                     .html(data.html.error_valid.user_email);
//                             }
//
//                             if (data.html.error_valid.user_city){
//                                 user_cityValid
//                                     .show()
//                                     .html(data.html.error_valid.user_city);
//                             }
//
//                             if (data.html.error_valid.user_country){
//                                 user_countryValid
//                                     .show()
//                                     .html(data.html.error_valid.user_country);
//                             }
//
//                             if (data.html.error_valid.user_password){
//                                 user_passValid
//                                     .show()
//                                     .html(data.html.error_valid.user_password);
//                             }
//
//                             if (data.html.error_valid.user_pass_check){
//                                 user_check_passValid
//                                     .show()
//                                     .html(data.html.error_valid.user_pass_check);
//                             }
//
//                             if (data.html.error_valid.user_date_of_birth){
//                                 user_date_of_birthValid
//                                     .show()
//                                     .html(data.html.error_valid.user_date_of_birth);
//                             }
//
//                             if (data.html.error_valid.not_robot){
//                                 not_robotValid
//                                     .show()
//                                     .html(data.html.error_valid.not_robot);
//                             }
//                             if (data.html.error_valid.user_postcode){
//                                 user_postcodeValid
//                                     .show()
//                                     .html(data.html.error_valid.user_postcode);
//                             }
//                         }
//                     }
//                     if (data.html.status == "OK"){
//
//                         // $("#goContentReg").html(data.html.theHTMLResponse);
//                         $("#goContentReg").html(data.html.theHTMLResponse);
//                     }
//
//                 },"json");
//
//
//                 break;
//             case "isLogout":
//                 event.preventDefault();
//                 $.post("out",{}, function (html) {
//
//                     if (html.html.status == "OK"){
//
//                         $("#headerContainer").html(html.html.theHTMLHeaderResponse);
//
//                         $("#goContentReg").html(html.html.theHTMLResponse);
//                     }
//
//                 },"json");
//                 break;
//             case "isProfile":
//
//                 $.post("profile", {})
//                     .done(function (html) {
//                         $("#goContentReg").html(html.html.theHTMLResponse);
//
//
//                     },"json");
//                 // $("#goContentReg")
//
//
//
//                 break;
//             case "push-register":
//                 $("#goContentReg").load('user/ajaxRegister');
//                 break;
//             // case "goContentReg":
//             //     $("#goContentReg").load('home/home');
//             //     break;
//             case "push-login":
//                 var errorLogin =  $("div#errorLogin");
//                 var errorPsw   =   $("div#errorPsw");
//
//                 errorLogin.css("display","none");
//                 errorPsw.css("display","none");
//
//                 $("#myModalLogin").modal();
//                 break;
//             case "goHome":
//                 $("#allContent").load("home/home #goContentReg");
//                 break;
//             case "home" :
//                 $("#allContent").load("home/home #goContentReg");
//                 break;
//
//
//         }
//
//     });
//
//
//
//     $("div").on("click","#goCaptcha",function (e) {
//         e.preventDefault();
//
//
//         $(this).load("user/update_captcha #goTo");
//
//     });
//
// //////////////////Login////
//
//     $("body").on("click", "#btnBtnLogin", function (e) {
//         e.preventDefault();
//
//
//         var form = $("form#signinForm");
//         var data = form.serialize();
//         var url = form.attr("action");
//
//         var errorLogin   =  $("div#errorLogin");
//         var errorPsw     =  $("div#errorPsw");
//         var errorCaptcha =  $("div#erRobotH");
//
//         errorLogin.css("display","none");
//         errorPsw.css("display","none");
//         errorCaptcha.css("display","none");
//
//         $.post(url, data )
//             .done(function (html) {
//                 if (html.html.status == "ERR"){
//
//
//                     if (html.html.error_valid.username){
//                         errorLogin
//                             .show(function () {
//                                 $("div#errorLogin").html(html.html.error_valid.username);
//                             });
//
//                     }
//
//                     if (html.html.error_valid.user_pass){
//                         errorPsw
//                             .show(function () {
//                                 $("div#errorPsw").html(html.html.error_valid.user_pass);
//                             });
//
//                     }
//
//                     if (html.html.error_valid.user_pass){
//                         errorCaptcha
//                             .show(function () {
//                                 errorCaptcha.html(html.html.error_valid.not_robot) ;
//                             });
//
//                     }
//
//
//                 } else if (html.html.status == "OK"){
//
//
//                     $("#myModalLogin").modal("hide");
//
//                     $("#headerContainer").html(html.html.theHTMLHeaderResponse);
//
//
//                     $("#goContentReg").html(html.html.theHTMLResponse);
//
//
//                 }
//             },"json");
//     });
//


    // $("body").on("click","#loadImg",function (e) {
    //     e.preventDefault();
    //
    //     var form = $("#loadF");
    //     var data = form.serialize();
    //
    //     $("#Test").get(0).files;
    //
    //     $.post("user/do_upload",data)
    //         .done(function (html) {
    //             alert(html);
    //         });
    //
    //
    // });





// });
