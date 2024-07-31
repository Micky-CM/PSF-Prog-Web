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
