<?php require_once 'configure.php';?>
<?php require_once 'header.php';?>
<script>  
    function exportTableToExcel(tableID, filename = ''){
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    var today = new Date();
    var dd = String(today.getDate());
    var mm = String(today.getMonth()+1);
    var yyyy = today.getFullYear();

    var day = dd + '-' + mm + '-' + yyyy;
    // Specify file name
    filename = day +'_tastebud_orders.xls';
    
    // Create download link element
    downloadLink = document.createElement("a");
    
    document.body.appendChild(downloadLink);
    
    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['\ufeff', tableHTML], {
            type: dataType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    }else{
        // Create a link to the file
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
    
        // Setting the file name
        downloadLink.download = filename;
        
        //triggering the function
        downloadLink.click();
    }
}  
</script>
<title>Served Orders</title>
<br><br>  
<div class="container">
<center>
<p class="check_out">Served Orders of Today</p>
<a class="btn btn-primary btncol text" target="_self" href="Served Orders.php">Refresh the page</a><br><br>
<h5 class="text1">Total Earning Till Now is Rs. <?php totalearning(); ?></h5>
<br>
<div>
<?php served_orders(); ?>
</div>
<div>
<button onclick="exportTableToExcel('mytable', 'members-data')" class="btn btn-success">Download The Daily Record</button>
</div>
</center>
</div>
<br><br>
<?php require 'footer.php';?>
