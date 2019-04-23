jQuery(document).ready(function ($) {

 	$(".signin").click(function(){
        $("#modal-signin").modal();      
    });
    $(".signup").click(function(){
        $("#modal-signup").modal();
    });
    $(".info").click(function(){
        $("#modal-infotk").modal();
    });
    $(".search").click(function(){
    	$("#modal-search").modal();
    });
	$("#form").submit(function(){
	 	 $("#modal-search").modal();
	});
});