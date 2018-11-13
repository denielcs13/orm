 $(document).ready(function(){
    $("body").on("click","#ques",function(){
		var complain_id=$(this).data("complain_id");
        $("#div"+complain_id).toggle(1000);
    });
});

function myFunction(x) {
    x.classList.toggle("fa-thumbs-down");
}

function myFunction(id) {	 
    var x = document.getElementById("myDIV"+id);
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
