<?php 
    include $_SERVER['DOCUMENT_ROOT']."/shared/_header.php";
?>

<div class="container" style="display:flex;align-items:center;flex-direction:column">

    <h1 style="margin-top:20px"> Registro de nuevo usuario</h1>
    <hr class="line">

    <form action="/backend/Database/login.php" name="Login" method="post">
        <div class="form">   
            <input class="form__input" autocomplete="Nombre de Usuario" 
            aria-required="true" type="text" data-val="true" 
            data-val-required="El nombe es requerido." 
            id="Input_Name" name="Name" value="">
                
            <label class="form__label" for="Input_Name">Nombre de usuario</label>
        </div>

        <div class="form">  
            <input class="form__input" autocomplete="Contraseña de Usuario" 
            aria-required="true" type="text" data-val="true" 
            id="telefono" name="telefono" value="">
            
            <label class="form__label" for="telefono">Telefono</label>
        </div>

        <div class="form">  
            <input class="form__input" autocomplete="Contraseña de Usuario" 
            aria-required="true" type="password" data-val="true" 
            data-val-required="La contraseña es requerido." 
            id="correo" name="correo" value="">

            <label class="form__label" for="correo">Correo</label>
        </div>

        <div class="form">  

            <select class="form__input" id="rol" name="rol">
                <option selected></option>
                <option value="1">Admin</option>
                <option value="2">Gerente</option>
                <option value="3">Supervisor</option>
                <option value="4">Oficina</option>
                <option value="5">Proveedores</option>
                <option value="6">Desarrollo</option>
            </select>
            
            <label class="form__label" for="rol">Rol</label>
        </div>

        <div class="form">  
            <input class="form__input" autocomplete="Contraseña de Usuario" 
            aria-required="true" type="password" data-val="true" 
            data-val-required="La contraseña es requerido." 
            id="Input_Password" name="Password" value="">
            
            <label class="form__label" for="Input_Password">Contraseña</label>
        </div>

        <div class="form">  
            <input class="form__input" autocomplete="Contraseña de Usuario" 
                    aria-required="true" type="password" data-val="true" 
                    data-val-required="La contraseña es requerido." 
                    id="confirmacion_contrasena" name="confirmacion" value="">

            <label class="form__label" for="confirmacion_contrasena">Confirmar contraseña</label>
        </div>

        <input id="login-submit" type="submit"  name="submit" value="Registrar" class="btn btn-lg btn-primary" style="width:100%; margin-top:10px; border-radius: 16px">
    </form>

</div>

<?php 
    include $_SERVER['DOCUMENT_ROOT']."/shared/_footer.php";
?>