<div class="create-form">
<h2>Create Students</h2>
  <?php
  $today = getdate();
  ?>
  <form method="POST">
    <div class="slidecontainer">
      <input type="range" min=<?php echo $today['year']+2; ?> max=<?php echo $today['year']+3; ?> class="slider" id="myRange">
      <p>The graduation year is: <span id="yearslider"></span></p>
    </div>
    <p>
      Enter USN Format
    </p>
    <input type="text" id="usnformat" name="usnformat" class="form-control createstudent" placeholder="1MS19MS"/>
    <div class="spacer">
    </div>
    <div class="row">
      <div class="col">
        <p>
          Enter the starting USN number
        </p>
        <input type="text" class="form-control width25" placeholder="01" id="usnstart">
      </div>
      <div class="col">
        <p>
          Enter the ending USN number
        </p>
        <input type="text" class="form-control width25" placeholder="50" id="usnend">
      </div>
    </div>
    <div class="spacer">
    </div>
    <input type="submit" class="btn btn-color" id="create-student-submit" />
  </form>
  <script type="text/javascript">
    var slider = document.getElementById("myRange");
    var output = document.getElementById("yearslider");
    output.innerHTML = slider.value;
    slider.oninput = function() {
      output.innerHTML = this.value;
    }

    $('#create-student-submit').on('click', function (event) {
      event.preventDefault();
      var batch=document.getElementById("myRange").value;
      var usnformat=document.getElementById("usnformat").value;
      var usnstart=document.getElementById("usnstart").value;
      var usnend=document.getElementById("usnend").value;
      if (usnformat== "") {
        alert(" Please enter the usn format ");
        $('html, body').animate({
          scrollTop: ($('#usnformat').offset().top)
        }, 500);
        return false;
      }

      if (usnstart == "") {
        alert("Please Enter the starting USN");
        $('html, body').animate({
          scrollTop: ($('#usnstart').offset().top)
        }, 500);
      }
        else if (isNaN(usnstart)) {
          alert("Please Enter a number as starting USN");
          $('html, body').animate({
            scrollTop: ($('#usnstart').offset().top)
          }, 500);
        return false;
      }

      if (usnend == "") {
        alert("Please Enter the starting USN");
        $('html, body').animate({
          scrollTop: ($('#usnend').offset().top)
        }, 500);
      }
        else if (isNaN(usnend)) {
          alert("Please Enter a number as starting USN");
          $('html, body').animate({
            scrollTop: ($('#usnend').offset().top)
          }, 500);

        return false;
      }

          else {
            var formData=new FormData();
            formData.append('slider',batch);
            formData.append('usnformat',usnformat);
            formData.append('usnstart',usnstart);
            formData.append('usnend',usnend);
            //  for (var pair of formData.entries()) {
            //  console.log(pair[0]+ ', ' + pair[1]);
            //}
            $.ajax({
            type: "POST",
            url: "admin_create_student_ajax.php",
            processData: false,
            contentType: false,
            data:formData,
            success:function(result)
            {
              if(result=='Error')
              {
                alert("Did not create");
              }
              else {
                alert("Sucesfully created");
                window.location.replace("http://localhost/Stor/admin/admin_student.php");
              }
            }
            });
          }
    });

    </script>
</div>
