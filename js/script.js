$(document).ready(function(){

// Toggle betwwen diffrent login forms
  $(".student-header").click(function(){
    $(".student-header").addClass("login-active");
    $(".teacher-header").removeClass("login-active");
    $(".student-login").removeClass("hide");
    $(".teacher-login").addClass("hide");
  });
  $(".teacher-header").click(function(){
    $(".teacher-header").addClass("login-active");
    $(".student-header").removeClass("login-active");
    $(".student-login").addClass("hide");
    $(".teacher-login").removeClass("hide");
  });
});
