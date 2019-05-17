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
  //admin Student scripts
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
      //Admin Professor Scripts
      $('#create-professor').on('click', function (event) {
        event.preventDefault();
        $.ajax({
          url: "admin_create_professor.php",
          success:function(result){
            $("#results").html(result);
          }});

        });
        $('#view-professor').on('click', function (event) {
          event.preventDefault();
          $.ajax({
            url: "admin_view_professor.php",
            success:function(result){
              $("#results").html(result);
            }});

          });

          $('#faculty-login-submit').on('click', function (event) {
            event.preventDefault();
            var username=document.getElementById("faculty-id-login").value;
            var pwd=document.getElementById("faculty-password-login").value;
            if (username == "") {
              alert(" Please enter your username ");
              $('html, body').animate({
                scrollTop: ($('#faculty-id-login').offset().top)
              }, 500);
              return false;
            }

            if (pwd == "") {
              alert("Please Enter your password");
              $('html, body').animate({
                scrollTop: ($('#faculty-password-login').offset().top)
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
                url: "faculty/faculty_login_ajax.php",
                processData: false,
                contentType: false,
                data:formData,
                success:function(result)
                {
                  if(result=='Error')
                  {
                    alert("Username or password does not exist");
                  }
                  else if (result=="old") {
                    alert("Sucesfully logged in");
                    window.location.replace("http://localhost/Stor/faculty/faculty_old_password.php");
                  }
                  else {
                    alert("Sucesfully logged in");
                    window.location.replace("http://localhost/Stor/faculty/faculty_dashboard.php");

                  }
                }
              });
            }
          });
          $('#faculty-update-password-submit').on('click', function (event) {
            event.preventDefault();
            var pwd=document.getElementById("faculty-old-password").value;
            var conpwd=document.getElementById("faculty-new-password").value;
            var dob=window.dob;
            var pattern=/^[0-9]{2}\/[0-9]{2}\/[0-9]{4}$/;

            if (pwd == "") {
              alert(" Please enter your password ");
              $('html, body').animate({
                scrollTop: ($('#faculty-old-password').offset().top)
              }, 500);
              return false;
            }
            if (dob == "") {
              alert("Please Enter you date of Birth");
              $('html, body').animate({
                scrollTop: ($('#student-dob').offset().top)
              }, 500);
              return false;
            }
            if(!pattern.test(dob))
            {
              alert("Please Enter you date of Birth in format mm/dd/YYYY");
              $('html, body').animate({
                scrollTop: ($('#student-dob').offset().top)
              }, 500);
              return false;
            }
            if (conpwd == "") {
              alert("Please confirm your password");
              $('html, body').animate({
                scrollTop: ($('#faculty-new-password').offset().top)
              }, 500);

              return false;
            }
            if (conpwd != pwd) {
              alert("Password and confirm password do not match");
              $('html, body').animate({
                scrollTop: ($('#faculty-old-password').offset().top)
              }, 500);

              return false;
            }


            else {
              var formData=new FormData();
              formData.append('password',pwd);
              formData.append('dob',dob);
              //  for (var pair of formData.entries()) {
              //  console.log(pair[0]+ ', ' + pair[1]);
              //}
              $.ajax({
                type: "POST",
                url: "faculty_update_password_ajax.php",
                processData: false,
                contentType: false,
                data:formData,
                success:function(result)
                {
                  if(result=='Success')
                  {
                    alert("Sucesfully logged in");
                    window.location.replace("http://localhost/Stor/faculty/faculty_dashboard.php");
                  }
                  else {

                    alert("Password did not update please try again");

                  }
                }
              });
            }
          });

          $('#student-login-submit').on('click', function (event) {
            event.preventDefault();
            var username=document.getElementById("student-usn-login").value;
            var pwd=document.getElementById("student-password-login").value;
            if (username == "") {
              alert(" Please enter your username ");
              $('html, body').animate({
                scrollTop: ($('#student-id-login').offset().top)
              }, 500);
              return false;
            }

            if (pwd == "") {
              alert("Please Enter your password");
              $('html, body').animate({
                scrollTop: ($('#student-password-login').offset().top)
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
                url: "student/student_login_ajax.php",
                processData: false,
                contentType: false,
                data:formData,
                success:function(result)
                {
                  if(result=='Error')
                  {
                    alert("Username or password does not exist");
                  }
                  else if (result=="old") {
                    alert("Sucesfully logged in");
                    window.location.replace("http://localhost/Stor/student/student_old_password.php");
                  }
                  else {
                    alert("Sucesfully logged in");
                    window.location.replace("http://localhost/Stor/student/student_dashboard.php");

                  }
                }
              });
            }
          });
          $('#student-update-password-submit').on('click', function (event) {
            event.preventDefault();
            //alert(window.dob);
            var pwd=document.getElementById("student-old-password").value;
            var conpwd=document.getElementById("student-new-password").value;
            var dob=window.dob;
            var pattern=/^[0-9]{2}\/[0-9]{2}\/[0-9]{4}$/;
            if (pwd == "") {
              alert(" Please enter your password ");
              $('html, body').animate({
                scrollTop: ($('#student-old-password').offset().top)
              }, 500);
              return false;
            }

            if (conpwd == "") {
              alert("Please confirm your password");
              $('html, body').animate({
                scrollTop: ($('#student-new-password').offset().top)
              }, 500);

              return false;
            }
            if (dob == "") {
              alert("Please Enter you date of Birth");
              $('html, body').animate({
                scrollTop: ($('#student-dob').offset().top)
              }, 500);
              return false;
            }
            if(!pattern.test(dob))
            {
              alert("Please Enter you date of Birth in format mm/dd/YYYY");
              $('html, body').animate({
                scrollTop: ($('#student-dob').offset().top)
              }, 500);
              return false;
            }
            if (conpwd != pwd) {
              alert("Password and confirm password do not match");
              $('html, body').animate({
                scrollTop: ($('#student-old-password').offset().top)
              }, 500);

              return false;
            }


            else {
              var formData=new FormData();
              formData.append('password',pwd);
              formData.append('dob',dob)
              //  for (var pair of formData.entries()) {
              //  console.log(pair[0]+ ', ' + pair[1]);
              //}
              $.ajax({
                type: "POST",
                url: "student_update_password_ajax.php",
                processData: false,
                contentType: false,
                data:formData,
                success:function(result)
                {
                  if(result=='Success')
                  {
                    alert("Sucesfully logged in");
                    window.location.replace("http://localhost/Stor/student/student_dashboard.php");
                  }
                  else {

                    alert("Password did not update please try again");

                  }
                }
              });
            }
          });


          $('#faculty-forgot-submit').on('click', function (event) {
            event.preventDefault();
            //alert(window.dob);
            var id=document.getElementById("faculty-id-forgot").value;

            var dob=window.dob;
            var pattern=/^[0-9]{2}\/[0-9]{2}\/[0-9]{4}$/;
            if (id == "") {
              alert(" Please enter your password ");
              $('html, body').animate({
                scrollTop: ($('#faculty-id-forgot').offset().top)
              }, 500);
              return false;
            }

            if (dob == "") {
              alert("Please Enter you date of Birth");
              $('html, body').animate({
                scrollTop: ($('#student-dob').offset().top)
              }, 500);
              return false;
            }
            if(!pattern.test(dob))
            {
              alert("Please Enter you date of Birth in format mm/dd/YYYY");
              $('html, body').animate({
                scrollTop: ($('#faculty-dob').offset().top)
              }, 500);
              return false;
            }

            else {
              var formData=new FormData();
              formData.append('id',id);
              formData.append('dob',dob)
              //  for (var pair of formData.entries()) {
              //  console.log(pair[0]+ ', ' + pair[1]);
              //}
              $.ajax({
                type: "POST",
                url: "faculty/faculty_forgot_password_ajax.php",
                processData: false,
                contentType: false,
                data:formData,
                success:function(result)
                {
                  if(result=='Success')
                  {
                    alert("Your password has been rested to your default password.Please contact the adminstaror for more details.");
                    window.location.replace("http://localhost/Stor/index.php");
                  }
                  else {

                    alert("Password has not been reset");

                  }
                }
              });
            }
          });


          $('#student-forgot-submit').on('click', function (event) {
            event.preventDefault();
            //alert(window.dob);
            var id=document.getElementById("student-id-forgot").value;
            var dob=window.dob;
            var pattern=/^[0-9]{2}\/[0-9]{2}\/[0-9]{4}$/;
            if (id == "") {
              alert(" Please enter your password ");
              $('html, body').animate({
                scrollTop: ($('#student-id-forgot').offset().top)
              }, 500);
              return false;
            }

            if (dob == "") {
              alert("Please Enter you date of Birth");
              $('html, body').animate({
                scrollTop: ($('#student-dob').offset().top)
              }, 500);
              return false;
            }
            if(!pattern.test(dob))
            {
              alert("Please Enter you date of Birth in format mm/dd/YYYY");
              $('html, body').animate({
                scrollTop: ($('#student-dob').offset().top)
              }, 500);
              return false;
            }

            else {
              var formData=new FormData();
              formData.append('id',id);
              formData.append('dob',dob)
              //  for (var pair of formData.entries()) {
              //  console.log(pair[0]+ ', ' + pair[1]);
              //}
              $.ajax({
                type: "POST",
                url: "student/student_forgot_password_ajax.php",
                processData: false,
                contentType: false,
                data:formData,
                success:function(result)
                {
                  if(result=='Success')
                  {
                    alert("Your password has been rested to your default password.Please contact the adminstaror for more details.");
                    window.location.replace("http://localhost/Stor/index.php");
                  }
                  else {

                    alert("Password has not been reset");

                  }
                }
              });
            }
          });

          $('#subject-form-submit').on('click', function (event) {
            event.preventDefault();
            var name=document.getElementById("subject-name-add").value;
            var code=document.getElementById("subject-code-add").value;
            var batch=document.getElementById("batch").value;
            if (name == "") {
              alert(" Please enter subject name ");
              $('html, body').animate({
                scrollTop: ($('#subject-name-add').offset().top)
              }, 500);
              return false;
            }

            if (code == "") {
              alert("Please enter the subject code");
              $('html, body').animate({
                scrollTop: ($('#subject-code-add').offset().top)
              }, 500);

              return false;
            }


            else {
              var formData=new FormData();
              formData.append('name',name);
              formData.append('code',code);
              formData.append('batch',batch);
              //  for (var pair of formData.entries()) {
              //  console.log(pair[0]+ ', ' + pair[1]);
              //}
              $.ajax({
                type: "POST",
                url: "faculty_subject_add_ajax.php",
                processData: false,
                contentType: false,
                data:formData,
                success:function(result)
                {
                  if(result=='Success')
                  {
                    alert("Sucesfully created");
                    window.location.replace("http://localhost/Stor/faculty/faculty_dashboard.php");
                  }
                  else {
                    alert("Subject has not been created please try again");
                  }
                }
              });
            }
          });



        });
