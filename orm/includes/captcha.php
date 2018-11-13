<?php $rand=substr(rand(),0,4); ?>
<style type="text/css">
.captcha
{
width:90px !important; 
background-image:url(includes/cat.png) !important; 
font-size:20px !important; 
border: 1px solid !important;
}
</style>
<div class="col-md-3"></div>
<div class="col-md-1">
                                <div class="form-group">
<input type="text" value="<?=$rand?>" id="ran" readonly="readonly" class="captcha">
</div></div><div class="col-md-3">
                                <div class="form-group">
<input type="text" name="chk" id="chk" style="background-color:white;">
</div></div><div class="col-md-3">
                                <div class="form-group">
<img src="includes/ref.png" onclick="captch()"  style="height:40px; cursor:pointer;"></div></div>
<script type="text/javascript">
function captch() {
    var x = document.getElementById("ran")
    x.value = Math.floor((Math.random() * 10000) + 1);
}
</script>



