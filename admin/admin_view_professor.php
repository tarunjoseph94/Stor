<div class="view-professor">
<h2>View Professor</h2>
  <?php
  include dirname($_SERVER['DOCUMENT_ROOT']).'/htdocs/Stor/db-connect.php';
  ?>
<?php
$sql1="SELECT `professor_id_pk` as professor_id, `old_password`as Password FROM `professor_details`";
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
      <h5>Faculty Id</h5>
    </div>
    <div class="col-sm-3">
      <h5>Password</h5>
    </div>
    <a href='#' class="btn btn-color" onclick='downloadCSV({ filename: "faculty.csv"  });' >Download CSV</a>
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
        <h6><?php echo $row['professor_id']; ?></h6>
      </div>
      <div class="col-sm-3">
        <h6><?php echo $row['Password']; ?></h6>
      </div>
    </div>

    <?php
}

?>
</div>
