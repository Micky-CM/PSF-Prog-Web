@extends('layouts.app')

@section('header')
    <x-shared.header-page title="Pedidos" path="sales.index" button="Actualizar pagina"
        description="Calculadora de pedidos por internet" />
@endsection

@section('contenido')
    <h1>Calculadora de Precios</h1>
    <div class="row">
        <!-- Primera columna -->
        <div class="col-md-6">
            <form id="form-calculo-precio" class="mb-2">
                <label for="precio">Precio del producto (Bs):</label>
                <input type="number" id="precio" name="precio" required >
                <br>
                <label for="costoEnvio">Costo de envío (Bs):</label>
                <input type="number" id="costoEnvio" name="costoEnvio" required >
                <br>
                <button class="btn btn-primary" type="submit">Calcular Precio</button>
            </form>

            <form id="form-resultados" class="mb-3" style="display: none;">
                <h2 class="fs-2">Cotización</h2>
                <label for="precio-result">Precio (Bs):</label>
                <input type="text" id="precio-result" name="precio-result" readonly >
                <br>
                <label for="impuestos-result">Impuestos (Bs):</label>
                <input type="text" id="impuestos-result" name="impuestos-result" readonly >
                <br>
                <label for="costos-admin-result">Costos Administrativos (Bs):</label>
                <input type="text" id="costos-admin-result" name="costos-admin-result" readonly >
                <br>
                <label for="total-result">Total a pagar (Bs):</label>
                <input type="text" id="total-result" name="total-result" readonly >
            </form>
        </div>

        <!-- Segunda columna -->
        <div class="col-md-6">
            <form id="form-calculo-saldo" style="display: none;">
                <h2>Calcular Saldo</h2>
                <label for="adelanto">Monto de adelanto (Bs):</label>
                <input type="number" id="adelanto" name="adelanto" required >
                <br>
                <button class="btn btn-primary" type="submit">Calcular Saldo</button>
            </form>

            <form id="form-saldo" style="display: none;">
                <label for="saldo-result">Saldo contra entrega (Bs):</label>
                <input type="text" id="saldo-result" name="saldo-result" readonly >
            </form>
        </div>
    </div>


    <!-- Scritp para la lógica de la calculadora con JS -->
    <script>
        const dolar = 6.96
        const cargoImpuesto = 1.1
        const cargoServicio = 1.16
        let precio, costoEnvio, total

        document.getElementById('form-calculo-precio').addEventListener('submit', function(event) {
            event.preventDefault()
            precio = parseFloat(document.getElementById('precio').value)
            costoEnvio = parseFloat(document.getElementById('costoEnvio').value)
            calcularPrecioProducto()
        })

        function calcularPrecioProducto() {
            // Convertir el precio a dólares
            let precioConvertido = precio / dolar

            // Calcular el precio con el impuesto
            let precioConImpuesto = precioConvertido * cargoImpuesto
            let impuesto = precioConImpuesto - precioConvertido

            // Calcular el total con el cargo de servicio
            total = (precioConImpuesto + (costoEnvio / dolar)) * cargoServicio
            let costosAdministrativos = total - (precioConImpuesto + (costoEnvio / dolar))

            // Mostrar los resultados en el formulario
            document.getElementById('precio-result').value = precio.toFixed(2)
            document.getElementById('impuestos-result').value = (impuesto * dolar).toFixed(2)
            document.getElementById('costos-admin-result').value = (costosAdministrativos * dolar).toFixed(2)
            document.getElementById('total-result').value = (total * dolar).toFixed(2)

            // Mostrar el formulario de resultados y habilitar el formulario de saldo
            document.getElementById('form-resultados').style.display = 'block'
            document.getElementById('form-calculo-saldo').style.display = 'block'
        }

        document.getElementById('form-calculo-saldo').addEventListener('submit', function(event) {
            event.preventDefault()
            const adelanto = parseFloat(document.getElementById('adelanto').value)
            calcularSaldo(adelanto)
        })

        function calcularSaldo(adelanto) {
            // Calcular el saldo después del adelanto y aplicar el interés
            let saldo = total - (adelanto / dolar)
            let saldoConInteres = saldo * cargoImpuesto

            // Mostrar el saldo contra entrega en el formulario
            document.getElementById('saldo-result').value = (saldoConInteres * dolar).toFixed(2)

            // Mostrar el formulario de saldo
            document.getElementById('form-saldo').style.display = 'block'
        }

    </script>
@endsection
