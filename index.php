<?php 

    include 'shared/_header.php';

?>

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

                <div class="titulosEstados" style="color:white;background-color:#343F46">
                    <p>Recepción</p>
                </div>

                    <ul id="siniestrosIds">
                        
                        <a class="LigaSiniestros" >@sini</a>
                        <a class="LigaSiniestros" >@sini2</a>
                        <a class="LigaSiniestros" >@sini3</a>
                        <a class="LigaSiniestros" >@sini4</a>
                        <a class="LigaSiniestros" >@sini5</a>
                        <a class="LigaSiniestros" >@sini6</a>
                    
                    </ul>

            </div>
            <div class="col-auto align-items-center columnasSiniestros" style="padding:0;width:15%;text-align:center">
                <div class="titulosEstados" style="color:white;background-color:#343F46"> 
                    <p>Visita</p>
                </div>

                <ul class="siniestrosIds">
                    
                        <a class="LigaSiniestros" asp-action="Details" asp-route-id="@item.ID">@sini</a>
                
                </ul>

            </div>

            <div class="col-auto align-items-center columnasSiniestros" style="padding:0;width:15%;text-align:center">
                <div class="titulosEstados" style="color:white;background-color:#343F46"> 
                    <p>Presupuesto</p>
                </div>

                <ul class="siniestrosIds">
                    
                    <a class="LigaSiniestros" asp-action="Details" asp-route-id="@item.ID">@sini</a>

                </ul>

            </div>

            <div class="col-auto align-items-center columnasSiniestros" style="padding:0;width:15%;text-align:center">
                <div class="titulosEstados" style="color:white;background-color:#343F46"> 
                    <p>Autorizado</p>
                </div>

                <ul class="siniestrosIds">
                    
                    <a class="LigaSiniestros" asp-action="Details" asp-route-id="@item.ID">@sini</a>
                    
                </ul>

            </div>

            <div class="col-auto align-items-center columnasSiniestros" style="padding:0;width:15%;text-align:center">
                <div class="titulosEstados" style="color:white;background-color:#343F46"> 
                    <p>Espera</p>
                </div>

                <ul class="siniestrosIds">
                    
                    <a class="LigaSiniestros" asp-action="Details" asp-route-id="@item.ID">@sini</a>
                    
                </ul>

            </div>

            <div class="col-auto align-items-center columnasSiniestros" style="padding:0;width:15%;text-align:center">
                <div class="titulosEstados" style="color:white;background-color:#343F46"> 
                    <p>Envío de evidencia</p>
                </div>

                <ul class="siniestrosIds">
                    
                    <a class="LigaSiniestros" asp-action="Details" asp-route-id="@item.ID">@sini</a>
                
                </ul>

            </div>

            <div class="col-auto align-items-center columnasSiniestros" style="padding:0;width:15%;text-align:center">
                <div class="titulosEstados" style="color:white;background-color:#343F46"> 
                    <p>Cancelado</p>
                </div>

                <ul class="siniestrosIds">
                    
                    <a class="LigaSiniestros" asp-action="Details" asp-route-id="@item.ID">@sini</a>
                    
                </ul>

            </div>

            <div class="col-auto align-items-center columnasSiniestros" style="padding:0;width:15%;text-align:center">
                <div class="titulosEstados" style="color:white;background-color:#343F46"> 
                    <p>Pago de daños</p>
                </div>

                <ul class="siniestrosIds">
                    
                    <a class="LigaSiniestros" asp-action="Details" asp-route-id="@item.ID">@sini</a>
                    
                </ul>

            </div>

            <div class="col-auto align-items-center columnasSiniestros" style="padding:0;width:15%;text-align:center">
            
                <div class="titulosEstados" style="color:white;background-color:#343F46"> 
                    <p>Facturación</p>
                </div>

                <ul class="siniestrosIds">
                    
                    <a class="LigaSiniestros" asp-action="Details" asp-route-id="@item.ID">@sini</a>
                    
                </ul>

            </div>

        </div>

    </div>

<?php 

    include 'shared/_footer.php';

?>