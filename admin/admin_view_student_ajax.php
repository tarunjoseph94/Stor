<?php
include dirname($_SERVER['DOCUMENT_ROOT']).'/htdocs/Stor/db-connect.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $batch=$_POST['batch'];
        $sql1="SELECT `usn_pk` as USN,`old_password` as Password FROM `student_details` WHERE `batch`=$batch";
        $res=mysqli_query($conn, $sql1);
          while ($rowd = $res->fetch_assoc()){
            $jsond[]=$rowd;
          }
          $jsondata=json_encode($jsond);
        ?>
        <div class="spacer">
        </div>
          <div class="row">
            <div class="col-sm-3">
              <h5>USN</h5>
            </div>
            <div class="col-sm-3">
              <h5>Password</h5>
            </div>
            <a href='#' class="btn btn-color" onclick='downloadCSV({ filename: "test.csv"  });' >Download CSV</a>
          </div>
          <script type="text/javascript">
          var stockData=<?php echo $jsondata; ?>;
          function convertArrayOfObjectsToCSV(args) {
                var result, ctr, keys, columnDelimiter, lineDelimiter, data;

                data = args.data || null;
                if (data == null || !data.length) {
                    return null;
                }

                columnDelimiter = args.columnDelimiter || ',';
                lineDelimiter = args.lineDelimiter || '\n';

                keys = Object.keys(data[0]);

                result = '';
                result += keys.join(columnDelimiter);
                result += lineDelimiter;

                data.forEach(function(item) {
                    ctr = 0;
                    keys.forEach(function(key) {
                        if (ctr > 0) result += columnDelimiter;

                        result += item[key];
                        ctr++;
                    });
                    result += lineDelimiter;
                });

                return result;
            }
          function downloadCSV(args) {
            var data, filename, link;
            var csv = convertArrayOfObjectsToCSV({
                data:stockData
            });
            if (csv == null) return;

            filename = args.filename || 'export.csv';

            if (!csv.match(/^data:text\/csv/i)) {
                csv = 'data:text/csv;charset=utf-8,' + csv;
            }
            data = encodeURI(csv);

            link = document.createElement('a');
            link.setAttribute('href', data);
            link.setAttribute('download', filename);
            link.click();
            }
          </script>
          <?php
          $res=mysqli_query($conn, $sql1);
          while ($row = $res->fetch_assoc()){
            ?><div class="row">
              <div class="col-sm-3">
                <h6><?php echo $row['USN']; ?></h6>
              </div>
              <div class="col-sm-3">
                <h6><?php echo $row['Password']; ?></h6>
              </div>
            </div>

            <?php
        }
      }

?>
