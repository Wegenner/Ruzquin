
var URLactual = window.location;


if(URLactual == "http://localhost/backend/Chat/ChatNotificaciones.php"){
    $(document).ready(function(){

        function load_unseen_notification(view = '')
        {
            $.ajax({
                url:"/backend/Sistema/SistemaNotificaciones.php",
                method:"POST",
                data:{view:view},
                dataType:"json",
                success:function(data)
                {
                    $('.dropdown-menu').html(data.notification);
                    $('.generalnot').html(data.notificaciongrande);
                    if(data.unseen_notification > 0)
                    {
                        $('.count').html(data.unseen_notification);
                    }
                }
            });
        }
        
        load_unseen_notification('yes');
        $('.count').html('');

        setInterval(function(){ 
        $('.count').html('');
        load_unseen_notification('yes');
        }, 3000);
        
        });
}else{

    $(document).ready(function(){
     
        function load_unseen_notification(view = '')
        {
        $.ajax({
        url:"/backend/Sistema/SistemaNotificaciones.php",
        method:"POST",
        data:{view:view},
        dataType:"json",
        success:function(data)
        {
            $('.dropdown-menu').html(data.notification);
            $('.generalnot').html(data.notificaciongrande);
            if(data.unseen_notification > 0)
            {
            $('.count').html(data.unseen_notification);
            }
        }
        });
        }
        
        load_unseen_notification();
    
        setInterval(function(){ 
        load_unseen_notification();
        }, 3000);
        
        });
}


