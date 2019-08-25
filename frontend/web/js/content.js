// $(document).ready(function(){
 
    // $(".createContent").click(function(event){
    //     event.preventDefault();
    //     // alert;
    //     $.get("http://localhost:88/BT_Yii2/frontend/web/content/create",
    //      function(data, status){
    //         $("#form_create").html(data);
    //         $(".Mymodel").modal('show');
    //       });
       
    // })

// })
$(function(){
    $("#modelButton").click(function(){
        $("#modal").modal("show")
        .find('#modalContent')
        .load($(this).attr('value'))
    })
})