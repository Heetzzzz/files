<?php include 'db.php';
$datas = $con->query("Select * FROM list order by position_order");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drag & Drop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

</head>

<body>
    <div class="container">
        <h3 class="text-center">Dynamic Drag and Drop table rows</h3>
        <table class="table table-bordered" id="mytable">
            <thead>
                <th>ID</th>
                <th>Name</th>
                <th>Position</th>
            </thead>
            <tbody class="row_position">
                <?php while ($data = $datas->fetch_assoc()) { ?>
                <tr
                    id="<?php echo $data['id']?>">
                    <td><?php echo $data['id']; ?>
                    </td>
                    <td><?php echo $data['name']; ?>
                    </td>
                    <td><?php echo $data['position_order']; ?>
                    </td>
                </tr>
                <?php } ?>

            </tbody>
        </table>
    </div>


</body>
<script type="text/javascript">
    $(".row_position").sortable({
        delay: 150,
        stop: function() {
            var selectedData = new Array();
            $(".row_position>tr").each(function() {
                selectedData.push($(this).attr("id"));
            });
            updateOrder(selectedData);
        }
    });

    function updateOrder(Data) {
        $.ajax({
            url: 'update.php',
            type: 'POST',
            data: {
                allData: Data
            },
            success: function() {
                alert("Your change successfully saved");
            }
        });
    }
</script>

</html>