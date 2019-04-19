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
//Admin Login
  $('#login-admin-submit').on('click', function (event) {
    event.preventDefault();
    var username=document.getElementById("username").value;
    var pwd=document.getElementById("password").value;
    if (username == "") {
      alert(" Please enter your username ");
      $('html, body').animate({
        scrollTop: ($('#username').offset().top)
      }, 500);
      return false;
    }

    if (pwd == "") {
      alert("Please Enter your password");
      $('html, body').animate({
        scrollTop: ($('#password').offset().top)
      }, 500);

      return false;
    }

        else {
          var formData=new FormData();
          formData.append('username',username);
          formData.append('password',pwd);
          //  for (var pair of formData.entries()) {
          //  console.log(pair[0]+ ', ' + pair[1]);
          //}
          $.ajax({
          type: "POST",
          url: "admin/admin_login_ajax.php",
          processData: false,
          contentType: false,
          data:formData,
          success:function(result)
          {
            if(result=='Error')
            {
              alert("Username or password does not exist");
            }
            else {
              alert("Sucesfully logged in");
              window.location.replace("http://localhost/Stor/admin/admin_dashboard.php");

            }
          }
          });
        }
  });
  //Create Student scripts
  $('#create-student').on('click', function (event) {

  event.preventDefault();
        $.ajax({
        url: "admin_create_student.php",
        success:function(result){
          $("#results").html(result);
        }});

      });
  $('#view-student').on('click', function (event) {
      event.preventDefault();
            $.ajax({
            url: "admin_view_student.php",
            success:function(result){
              $("#results").html(result);
            }});

          });


});
