<?php 
    include $_SERVER['DOCUMENT_ROOT']."/shared/_header.php";
?>

<!-- Si no hay archivos ni documentos -->

<h1 style="text-align:center; margin-top:20px"> Archivos - Siniestro: @Model.siniestroid</h1>

<hr />
<br />

<div class="container">
    <div class="row">
        <div class="col">

            <form enctype="multipart/form-data" action="Upload">

                <input value="@Model.siniestroID" readonly />
                <br /><br />
                <div>
                    <label for="formFileMultiple">Seleccione sus archivos</label>
                    <input class="form-control-file" style="background: #a2b0b8; border-radius: 5px" type="file" id="formFileMultiple" multiple required>
                </div>

                <div>
                    <br />
                    <input type="submit" value="Subir" class="btn btn-primary detalles" style="margin:2px" />
                </div>

            </form>
            <br />
            <a class="detalles" href="/backend/Siniestros/Siniestros.php">Regresar</a>
        </div>
    </div>
</div>

<!-- Si si tenemos archivos -->

<h1 style="text-align:center; margin-top:20px"> Subida de archivos - Siniestro: @Model.siniestroid</h1>
<hr />
<div class="container">
    <div class="row">
        <!-- Area de documentos -->
            <div class="container">
                
                    <h3 style="text-align:center"> Documentos</h3>
                    <hr class="hr hr-blurry" />
                    <br/>

                <!-- Elemento "documento" -->

                    <div class="row">
                        <div class="col linkdocumento">

                            <a href="~/@Model.carpeta/@archivo.Name" target="_blank"> @archivo.Name </a>

                        </div>
                        <div class="col" style="text-align: end">

                            <a class="eliminarArchivos"  href="#"> Eliminar </a>

                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col linkdocumento">

                            <a href="~/@Model.carpeta/@archivo.Name" target="_blank"> @archivo.Name </a>

                        </div>
                        <div class="col" style="text-align: end">

                            <a class="eliminarArchivos"  href="#"> Eliminar </a>

                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col linkdocumento">

                            <a href="~/@Model.carpeta/@archivo.Name" target="_blank"> @archivo.Name </a>

                        </div>
                        <div class="col" style="text-align: end">

                            <a class="eliminarArchivos"  href="#"> Eliminar </a>

                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col linkdocumento">

                            <a href="~/@Model.carpeta/@archivo.Name" target="_blank"> @archivo.Name </a>

                        </div>
                        <div class="col" style="text-align: end">

                            <a class="eliminarArchivos"  href="#"> Eliminar </a>

                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col linkdocumento">

                            <a href="~/@Model.carpeta/@archivo.Name" target="_blank"> @archivo.Name </a>

                        </div>
                        <div class="col" style="text-align: end">

                            <a class="eliminarArchivos"  href="#"> Eliminar </a>

                        </div>
                    </div>
                    <br/>
            </div>
    </div>

    <div class="container">
            <!-- Carga cuando si hay imagenes en la carpeta del siniestro -->
            <div>
                <h3 style="text-align:center"> Imagenes</h3>
                <hr class="hr hr-blurry" />
                <br/>
                <div class="container">
                    <div class="row d-flex flex-wrap align-items-center" data-toggle="modal" data-target="#lightbox">
                        
                    <!-- Cada elemento de imagen para el while -->
                        <div class="col-12 col-md-6 col-lg-3" style="text-align:center">
                            <a href="/root/Archivos/Prueba123/WhatsApp Image 2022-08-16 at 1.32.51 PM (1).jpeg" target="_blank">
                                <img src="/root/Archivos/Prueba123/WhatsApp Image 2022-08-16 at 1.32.51 PM (1).jpeg" style="width:230px; height:300px; margin: 10px 0 10px 0" data-target="#indicators" alt="" />
                            </a>
                            <a class="eliminarArchivos" href="#"> 
                                Eliminar 
                            </a>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3" style="text-align:center">
                            <a href="/root/Archivos/Prueba123/WhatsApp Image 2022-08-16 at 1.32.51 PM (1).jpeg" target="_blank">
                                <img src="/root/Archivos/Prueba123/WhatsApp Image 2022-08-16 at 1.32.51 PM (1).jpeg" style="width:230px; height:300px; margin: 10px 0 10px 0" data-target="#indicators" alt="" />
                            </a>
                            <a class="eliminarArchivos" href="#"> 
                                Eliminar 
                            </a>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3" style="text-align:center">
                            <a href="/root/Archivos/Prueba123/WhatsApp Image 2022-08-16 at 1.32.51 PM (1).jpeg" target="_blank">
                                <img src="/root/Archivos/Prueba123/WhatsApp Image 2022-08-16 at 1.32.51 PM (1).jpeg" style="width:230px; height:300px; margin: 10px 0 10px 0" data-target="#indicators" alt="" />
                            </a>
                            <a class="eliminarArchivos" href="#"> 
                                Eliminar 
                            </a>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3" style="text-align:center">
                            <a href="/root/Archivos/Prueba123/WhatsApp Image 2022-08-16 at 1.32.51 PM (1).jpeg" target="_blank">
                                <img src="/root/Archivos/Prueba123/WhatsApp Image 2022-08-16 at 1.32.51 PM (1).jpeg" style="width:230px; height:300px; margin: 10px 0 10px 0" data-target="#indicators" alt="" />
                            </a>
                            <a class="eliminarArchivos" href="#"> 
                                Eliminar 
                            </a>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3" style="text-align:center">
                            <a href="/root/Archivos/Prueba123/WhatsApp Image 2022-08-16 at 1.32.51 PM (1).jpeg" target="_blank">
                                <img src="/root/Archivos/Prueba123/WhatsApp Image 2022-08-16 at 1.32.51 PM (1).jpeg" style="width:230px; height:300px; margin: 10px 0 10px 0" data-target="#indicators" alt="" />
                            </a>
                            <a class="eliminarArchivos" href="#"> 
                                Eliminar 
                            </a>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3" style="text-align:center">
                            <a href="/root/Archivos/Prueba123/WhatsApp Image 2022-08-16 at 1.32.51 PM (1).jpeg" target="_blank">
                                <img src="/root/Archivos/Prueba123/WhatsApp Image 2022-08-16 at 1.32.51 PM (1).jpeg" style="width:230px; height:300px; margin: 10px 0 10px 0" data-target="#indicators" alt="" />
                            </a>
                            <a class="eliminarArchivos" href="#"> 
                                Eliminar 
                            </a>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
<br/>
<br/>
<div class="container">
    <div class="row">
        <div class="col">

            <form enctype="multipart/form-data" asp-action="Upload">

                <input value="@Model.siniestroID" readonly />
                <br /><br />
                <div>
                    <label for="formFileMultiple2">Seleccione sus archivos</label>
                    <input class="form-control-file" style="background: #a2b0b8; border-radius: 5px" type="file" id="formFileMultiple2" multiple required>
                </div>

                <div>
                    <br />
                    <input type="submit" value="Subir" class="btn btn-primary detalles" style="margin:2px">
                </div>

            </form>
            <a class="detalles" href="/backend/Siniestros/Siniestros.php">Regresar</a>
        </div>
    </div>
</div>

<br>

<?php 
    include $_SERVER['DOCUMENT_ROOT']."/shared/_footer.php";
?>