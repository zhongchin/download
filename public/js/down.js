$(function(){

    $("#doc-list .dl tr").click(function(e){

        var docli=$(this);
         var  doc_url=$(docli).data("url");
         location.href=doc_url;

    });
});
