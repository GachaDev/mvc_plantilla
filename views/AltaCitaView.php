<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/styles_formularioPlantilla.css">
    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- FLATPICKR -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <title>Alta Cita</title>
</head>

<body>

    <main class="body__main">
        <!-- IF PARA COMPROBAR ERRORES EN EL ALTA -->
        <?php if (isset($error) && $error): ?>
            <H2>CITA NO DISPONIBLE</H2>
        <?php endif; ?>

        <!-- CAMBIAR EL ACTION PARA QUE REDIRECCIONE A UNA URI EN CONCRETO -> POR EJEMPLO A /mvc_plantilla/citas/alta -->
        <form class="main__form-plantilla" action="/mvc_plantilla/citas/alta" method="post">
            <div class="form-plantilla__container">
                <div class="form-group">
                    <label for="input_id">Id</label>
                    <input type="text"
                        class="shadow form-control "
                        id="input_id" name="input_id"
                        aria-describedby="id"
                        placeholder="Introduce el id">
                </div>
                <div class="form-group">
                    <label for="input_descripcion">Descripcion</label>
                    <input type="text"
                        class="shadow form-control "
                        id="input_descripcion"
                        name="input_descripcion"
                        aria-describedby="descripcion"
                        placeholder="Introduce tu idea">
                </div>
                <div class="form-group">
                    <label for="input_fecha_cita">Fecha y hora para la cita</label>
                    <input type="text"
                        class="shadow form-control "
                        id="input_fecha_cita"
                        name="input_fecha_cita"
                        aria-describedby="fechacita"
                        placeholder="Introduce la fecha y hora">
                </div>
                <div class="form-group">
                    <label for="input_cliente">Nombre cliente</label>
                    <input type="text"
                        class="shadow form-control "
                        id="input_cliente"
                        name="input_cliente"
                        placeholder="Nombre cliente">
                </div>
                <div class="form-group">
                    <label for="input_tatuador">Nombre tatuador</label>
                    <input type="text"
                        class="shadow form-control "
                        id="input_tatuador"
                        name="input_tatuador"
                        placeholder="Nombre tatuador">
                </div>
                <div class="form-group container__btns-form">
                    <button type="submit" class="btn btn-primary btns-form__btn-enviar">Enviar</button>
                    <button type="reset" class="btn btn-danger">Borrar</button>
                </div>
            </div>
        </form>
    </main>
</body>

</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="../public/js/datepickerinitialzr.js"></script>