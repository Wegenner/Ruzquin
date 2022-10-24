<?php 
    include 'shared/_header.php';
?>

<div class="container">
    <div class="container">

        <div class="row">
            <div class="col" style="text-align:center">

                <h1 style="margin-top:15px">Siniestros</h1>
                
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col">

                <button type="button" style="background-color:#687e8c; 
                                            margin-top: 10px;
                                            width: 120px;
                                            line-height: 1.5;
                                            border-radius: 3px"
                class="btn btn-secondary"> Nuevo </button>

            </div>
            
            <div class="col" style="align-content:flex-end">

                <input type="month" name="mes" class="form-control" style="margin-top:10px" />

            </div>

            <div class="col" style="text-align:end">

                <input type="submit" style="width: 120px; line-height: 1.5; border-radius: 3px;margin-top:10px" value="Buscar" class="btn btn-primary DetallesSiniestros" /> 
        
            </div>
            
        </div>

    </div>

    <hr />

    <h2 style="text-align : center">Total : @Model.Count()</h2>

    <div class="rounded container-fluid align-items-center">

        <div class="row justify-content-center rounded" style="width: 100%;">

            <div class="col-auto align-items-center columnasSiniestros" style="padding:0;width:15%;text-align:center">

                <div class="titulosEstados">
                    <p style="margin-bottom:1rem;">Recepción</p>
                </div>

                    <ul id="siniestrosIds">
                        
                        <a class="LigaSiniestros" href="#" >@sini</a>
                        <a class="LigaSiniestros" href="#" >@sini2</a>
                        <a class="LigaSiniestros" href="#" >@sini3</a>
                        <a class="LigaSiniestros" href="#" >@sini4</a>
                        <a class="LigaSiniestros" href="#" >@sini5</a>
                        <a class="LigaSiniestros" href="#" >@sini6</a>
                    
                    </ul>

            </div>
            <div class="col-auto align-items-center columnasSiniestros" style="padding:0;width:15%;text-align:center">
                <div class="titulosEstados"> 
                    <p>Visita</p>
                </div>

                <ul class="siniestrosIds">
                    
                        <a class="LigaSiniestros" href="#">@sini</a>
                
                </ul>

            </div>

            <div class="col-auto align-items-center columnasSiniestros" style="padding:0;width:15%;text-align:center">
                <div class="titulosEstados"> 
                    <p>Presupuesto</p>
                </div>

                <ul class="siniestrosIds">
                    
                    <a class="LigaSiniestros" href="#">@sini</a>

                </ul>

            </div>

            <div class="col-auto align-items-center columnasSiniestros" style="padding:0;width:15%;text-align:center">
                <div class="titulosEstados"> 
                    <p>Autorizado</p>
                </div>

                <ul class="siniestrosIds">
                    
                    <a class="LigaSiniestros" href="#">@sini</a>
                    
                </ul>

            </div>

            <div class="col-auto align-items-center columnasSiniestros" style="padding:0;width:15%;text-align:center">
                <div class="titulosEstados"> 
                    <p>Espera</p>
                </div>

                <ul class="siniestrosIds">
                    
                    <a class="LigaSiniestros" href="#">@sini</a>
                    
                </ul>

            </div>

            <div class="col-auto align-items-center columnasSiniestros" style="padding:0;width:15%;text-align:center">
                <div class="titulosEstados"> 
                    <p>E. E.</p>
                </div>

                <ul class="siniestrosIds">
                    
                    <a class="LigaSiniestros" href="#">@sini</a>
                
                </ul>

            </div>

            <div class="col-auto align-items-center columnasSiniestros" style="padding:0;width:15%;text-align:center">
                <div class="titulosEstados"> 
                    <p>Cancelado</p>
                </div>

                <ul class="siniestrosIds">
                    
                    <a class="LigaSiniestros" href="#">@sini</a>
                    
                </ul>

            </div>

            <div class="col-auto align-items-center columnasSiniestros" style="padding:0;width:15%;text-align:center">
                <div class="titulosEstados"> 
                    <p>P. D.</p>
                </div>

                <ul class="siniestrosIds">
                    
                    <a class="LigaSiniestros" href="#">@sini</a>
                    
                </ul>

            </div>

            <div class="col-auto align-items-center columnasSiniestros" style="padding:0;width:15%;text-align:center">
            
                <div class="titulosEstados"> 
                    <p>Facturación</p>
                </div>

                <ul class="siniestrosIds">
                    
                    <a class="LigaSiniestros" href="#">@sini</a>
                    
                </ul>

            </div>

        </div>

    </div>
</div>

<?php 
    include 'shared/_footer.php';
?>