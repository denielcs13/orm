	<textarea name="content" id="editor">
    &lt;p&gt;Here goes the initial content of the editor.&lt;/p&gt;
</textarea>
<script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>
<script>
ClassicEditor
    .create( document.querySelector( '#editor' ) )
    .then( editor => {
        console.log( editor );
    } )
    .catch( error => {
        console.error( error );
    } );</script>
<script language="JavaScript" type="text/javascript" src="cbrte/html2xhtml.min.js"></script>
	<script language="JavaScript" type="text/javascript" src="cbrte/richtext.min.js"></script>
<form name="RTEDemo" action="multi.htm" method="post" onsubmit="return submitForm();">
<script language="JavaScript" type="text/javascript">
<!--
function submitForm() {
	//make sure hidden and iframe values are in sync for all rtes before submitting form
	updateRTEs();
	
	//change the following line to true to submit form
	alert("rte1 = " + htmlDecode(document.RTEDemo.rte1.value));
	alert("rte2 = " + htmlDecode(document.RTEDemo.rte2.value));
	alert("rte3 = " + htmlDecode(document.RTEDemo.rte3.value));
	return false;
}

//Usage: initRTE(imagesPath, includesPath, cssFile, genXHTML, encHTML)
initRTE("cbrte/images/", "cbrte/", "", true);
//-->
</script>
<noscript><p><b>Javascript must be enabled to use this form.</b></p></noscript>

<h2>Standard RTE</h2>
<script language="JavaScript" type="text/javascript">
<!--
//build new richTextEditor
var rte1 = new richTextEditor('rte1');
rte1.html = 'here&#39;s the "\<em\>preloaded\<\/em\>&nbsp;\<b\>content\<\/b\>"';
rte1.build();
//-->
</script>

<h2>No Toolbars, No View Source Option</h2>
<script language="JavaScript" type="text/javascript">
<!--
var rte2 = new richTextEditor('rte2');
rte2.html = 'preloaded <b>text</b>';
rte2.width = 560;
rte2.height = 100;
rte2.toolbar1 = false;
rte2.toolbar2 = false;
rte2.toggleSrc = false;
rte2.build();
//-->
</script>

<h2>Read-Only</h2>
<script language="JavaScript" type="text/javascript">
<!--
var rte3 = new richTextEditor('rte3');
rte3.html = 'preloaded <b>text</b>';
rte3.width = 450;
rte3.height = 100;
rte3.readOnly = true;
rte3.build();
//-->
</script>
<p>Click submit to show the value of the text boxes.</p>
<p><input type="submit" name="submit" value="Submit" /></p>
</form>
<!-- END Demo Code -->
</body>
</html>
 
  <!--script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script--> <script type="text/javascript">
//<![CDATA[
        //bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
  //]]>
  </script>
  <h4>
    First Textarea
  </h4>
  <textarea name="area1" cols="40">
</textarea><br />
  <h4>
    Second Textarea
  </h4>
  <textarea name="area2" id="area2" style="width: 100%;">
       Some Initial Content was in this textarea
</textarea><br />
  <h4>
    Third Textarea
  </h4>
  <textarea name="area3" style="width: 300px; height: 100px;">
       HTML content default in textarea
</textarea>
 <textarea></textarea>
<?
include('includes/header.php'); 
include 'admin/include/function.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="bootstrapCarousel.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- <script type="text/javascript" src="http://twitter.github.io/bootstrap/assets/js/bootstrap-transition.js"></script>
    <script type="text/javascript" src="http://twitter.github.io/bootstrap/assets/js/bootstrap-carousel.js"></script> -->
  </head>
  <style>.carousel-inner .active.left { left: -25%; }
.carousel-inner .next        { left:  25%; }
.carousel-inner .prev        { left: -25%; }
.carousel-control            { width:  4%; }
.carousel-control.left,.carousel-control.right {margin-left:15px;background-image:none;}

#myCarousel .carousel-inner .item {
  background: white;
  /*transition: transform;*/
  transition: all 500ms ease-out; /* transition is added here */
}
</style>

  <body>
  <div class="col-md-12 text-center"><h3>Product Carousel</h3></div>
<?

$query="select * from product";
	$data=fetch_query($con,$query);
	
	if(!empty($data))
	{
		$count = 1;
		foreach($data as $key=>$data1){
		//echo $key%$count;
		echo "-".$key."-".$count."-".$data1["image"]."<br/>";
		if($count%3==0){
		echo "count-".$key."-".$count."-"."<br/>";
		echo $key=($key-1);
		echo "<br/>";
		//$count++;
		} 
		$count++;
		}
	}
		?>
<div class="col-md-6 col-md-offset-3">
<div class="carousel slide row" data-ride="carousel" data-type="multi" data-interval="3000" id="myCarousel">
  <div class="carousel-inner">
    <div class="carousel-inner">
    <div class="item">
      <div class="col-xs-4">
        <a href="#">
          <img src="http://placehold.it/500/bbbbbb/fff&amp;text=1" class="img-responsive">
        </a>
      </div>
    <div class="col-xs-4">
        <a href="#">
          <img src="http://placehold.it/500/CCCCCC&amp;text=2" class="img-responsive">
        </a>
      </div>
	  <div class="col-xs-4">
        <a href="#">
          <img src="http://placehold.it/500/eeeeee&amp;text=3" class="img-responsive">
        </a>
      </div></div>
    <div class="item">
      <div class="col-xs-4">
        <a href="#">
          <img src="http://placehold.it/500/CCCCCC&amp;text=2" class="img-responsive">
        </a>
      </div>
    <div class="col-xs-4">
        <a href="#">
          <img src="http://placehold.it/500/eeeeee&amp;text=3" class="img-responsive">
        </a>
      </div><div class="col-xs-4">
        <a href="#">
          <img src="http://placehold.it/500/f4f4f4&amp;text=4" class="img-responsive">
        </a>
      </div></div>
    <div class="item">
      <div class="col-xs-4">
        <a href="#">
          <img src="http://placehold.it/500/eeeeee&amp;text=3" class="img-responsive">
        </a>
      </div>
    <div class="col-xs-4">
        <a href="#">
          <img src="http://placehold.it/500/f4f4f4&amp;text=4" class="img-responsive">
        </a>
      </div><div class="col-xs-4">
        <a href="#">
          <img src="http://placehold.it/500/fcfcfc/333&amp;text=5" class="img-responsive">
        </a>
      </div></div>
    <div class="item">
      <div class="col-xs-4">
        <a href="#">
          <img src="http://placehold.it/500/f4f4f4&amp;text=4" class="img-responsive">
        </a>
      </div>
    <div class="col-xs-4">
        <a href="#">
          <img src="http://placehold.it/500/fcfcfc/333&amp;text=5" class="img-responsive">
        </a>
      </div><div class="col-xs-4">
        <a href="#">
          <img src="http://placehold.it/500/f477f4/fff&amp;text=6" class="img-responsive">
        </a>
      </div></div>
    <div class="item active">
      <div class="col-xs-4">
        <a href="#">
          <img src="http://placehold.it/500/fcfcfc/333&amp;text=5" class="img-responsive">
        </a>
      </div>
    <div class="col-xs-4">
        <a href="#">
          <img src="http://placehold.it/500/f477f4/fff&amp;text=6" class="img-responsive">
        </a>
      </div><div class="col-xs-4">
        <a href="#">
          <img src="http://placehold.it/500/bbbbbb/fff&amp;text=1" class="img-responsive">
        </a>
      </div></div>
    <div class="item">
      <div class="col-xs-4">
        <a href="#">
          <img src="http://placehold.it/500/f477f4/fff&amp;text=6" class="img-responsive">
        </a>
      </div>
    <div class="col-xs-4">
        <a href="#">
          <img src="http://placehold.it/500/bbbbbb/fff&amp;text=1" class="img-responsive">
        </a>
      </div><div class="col-xs-4">
        <a href="#">
          <img src="http://placehold.it/500/CCCCCC&amp;text=2" class="img-responsive">
        </a>
      </div></div>
  </div>
  </div>
  <a class="left carousel-control" href="#myCarousel" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
</div>
</div>

<script src="https://code.jquery.com/jquery-2.0.2.min.js" type="text/javascript"></script>
<script>
$('#myCarousel').carousel({
  interval: 4000
})

$('.carousel .item').each(function(){
  var next = $(this).next();
  if (!next.length) {
    next = $(this).siblings(':first');
  }
  next.children(':first-child').clone().appendTo($(this));

  for (var i=0;i<2;i++) {
    next=next.next();
    if (!next.length) {
      next = $(this).siblings(':first');
    }

    next.children(':first-child').clone().appendTo($(this));
  }
});
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script type="text/javascript" src="bootstrapCarousel.js">
</script>
</body>
</html>
<?php include 'includes/footer.php';?>