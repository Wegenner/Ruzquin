$(document).ready(function(){
    function siniestrosActivos(){
        $.ajax({
            url:"/backend/Siniestros/SiniestrosActivCreator.php",
            method:"POST",
            data:{view:'view'},
            dataType:"json",
            success:function(data)
            {   
                $('#totalsiniestros').html("Total: " + data.total);

                if(data.total > 0){
                    $('#sinrecepcion').html(data.rec);
                    $('#sinvisita').html(data.vis);
                    $('#sinpresupuesto').html(data.pres);
                    $('#sinautorizado').html(data.aut);
                    $('#sinespera').html(data.esp);
                    $('#sinevidencias').html(data.env);
                }
            }
        })
    }

    siniestrosActivos();

    setInterval(function(){ 
        siniestrosActivos();
    }, 3000);

})