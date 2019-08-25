$(document).ready(function(){
    $(document).on('click','.fc-day',function(){
        var date = $(this).attr("data-date")
        $.ajax({
            url : 'create',
            data:{
                date:date,
            },
          success:function(data){
              console.log(data);
            $("#modal").modal("show")
            .find('#modalContent')
            .html(data)
          }
        })
     
 })
})