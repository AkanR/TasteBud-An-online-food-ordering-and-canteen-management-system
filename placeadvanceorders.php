<title>Advance Order</title>
<?php require_once 'configure.php';?>
<?php require_once 'header.php';?>
<style>
    fieldset
{
    border: solid 1px #000;
    padding:10px;
    display:block;
    clear:both;
    margin:5px 0px;
}
    input.fieldname
{
    float:left;
    clear:left;
    display:block;
    margin:5px;
    width: 40%;
}
input.fieldtype
{
    float:left;
    width: 40%;
    display:block;
    margin:5px;
}
input.remove
{
    float:left;
    display:block;
    margin:5px;
    width: 5px;
}
</style>
<script>
$(document).ready(function() {
    $("#add").click(function() {
    		var lastField = $("#buildyourform div:last");
        var intId = (lastField && lastField.length && lastField.data("idx") + 1) || 1;
        var fieldWrapper = $("<div class=\"col-lg-12 col-md-12 col-sm-4 col-12\" id=\"field" + intId + "\"/>");
        fieldWrapper.data("idx", intId);
        var fName = $("<input type=\"text\" class=\"form-control fieldname\" placeholder=\"Item Name\" name=\"myitems[]\" required=\"true\"/>");
        var fType = $("<input type=\"text\" class=\"form-control fieldtype\" placeholder=\"Qty\" name=\"myqty[]\" required=\"true\" pattern=\"[0-9]{1,3}\"/>");
        var removeButton = $("<input type=\"button\" class=\"btn btn-dark remove\" value=\"x\" /><br>");
        removeButton.click(function() {
            $(this).parent().remove();
        });
        fieldWrapper.append(fName);
        fieldWrapper.append(fType);
        fieldWrapper.append(removeButton);
        $("#buildyourform").append(fieldWrapper);
    });
});
</script>
<div class="container">
    <center>
    <p class="check">Advance Orders</p>
    </center>
    <form action="advanceordersconfirm.php" method="post" enctype="multipart/form-data">
        <center>
        <div class="row">
              <div class="col-lg-3 col-md-3 col-sm-4 col-6">
            <label><b>Event Name</b></label>
            <br>
            <input type="text" class="form-control" name="event_name" placeholder="Event Name" required="true">
              </div>
            <div class="col-lg-3 col-md-3 col-sm-4 col-6">
            <label><b>Date</b></label>
            <br>
            <input type="date" class="form-control" name="event_date" min="<?php echo date("Y-m-d"); ?>" placeholder="Event Date"  required="true">
            </div>
            <div class="col-lg-3 col-md-3 col-sm-4 col-6">
             <label><b>Time</b></label>
            <br>
            <input type="time" class="form-control" name="event_time" placeholder="Event time" required="true">
             </div>
            <div class="col-lg-3 col-md-3 col-sm-4 col-6">
             <label><b>Room no. and Floor</b></label>
            <br>
            <input type="text" class="form-control" name="event_room" placeholder="Event Room" required="true">
             </div>
        </div>
        <br>
</center>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-4 col-12">
         <fieldset id="buildyourform">
             <legend><b>Start Adding Items!</b></legend>
                </fieldset><br>
                <center><input type="button" value="Add items" class="btn btn-danger" id="add"/></center>    
        </div>
        <div class="col-lg-6 col-md-6 col-sm-4 col-12">
        <label><b>Any other Specific Information</b></label>
            <br>
            <textarea type="textarea" class="form-control" name="event_info" required="true"> </textarea> 
            <br>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-5 col-md-4 col-sm-4 col-12"></div> 
        <div class="col-lg-2 col-md-4 col-sm-4 col-12">
            <br>
            <center><input type="submit" class="btn btn-success" name="order_advance" value="Place order"></center>
        </div>
        <div class="col-lg-5 col-md-4 col-sm-4 col-12"></div>
    </div>          
    </form>
    
</div>
<?php require 'footer.php';?> 