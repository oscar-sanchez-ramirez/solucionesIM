<script>
    var subtotal = document.querySelector('#subtotal');
    var iva = document.querySelector('#iva');
    var total = document.querySelector('#total');

    subtotal.addEventListener('change', function() {
        var sub = parseFloat(subtotal.value);
        var iv = parseFloat(iva.value);
        total.value = (sub + iv);
    });



    function rfcValido(rfc, aceptarGenerico = true) {
        const re = /^([A-ZÑ&]{3,4}) ?(?:- ?)?(\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])) ?(?:- ?)?([A-Z\d]{2})([A\d])$/;
        var validado = rfc.match(re);

        if (!validado) //Coincide con el formato general del regex?
            return false;

        //Separar el dígito verificador del resto del RFC
        const digitoVerificador = validado.pop(),
            rfcSinDigito = validado.slice(1).join(''),
            len = rfcSinDigito.length,

            //Obtener el digito esperado
            diccionario = "0123456789ABCDEFGHIJKLMN&OPQRSTUVWXYZ Ñ",
            indice = len + 1;
        var suma,
            digitoEsperado;

        if (len == 12) suma = 0
        else suma = 481; //Ajuste para persona moral

        for (var i = 0; i < len; i++)
            suma += diccionario.indexOf(rfcSinDigito.charAt(i)) * (indice - i);
        digitoEsperado = 11 - suma % 11;
        if (digitoEsperado == 11) digitoEsperado = 0;
        else if (digitoEsperado == 10) digitoEsperado = "A";

        //El dígito verificador coincide con el esperado?
        // o es un RFC Genérico (ventas a público general)?
        if ((digitoVerificador != digitoEsperado) &&
            (!aceptarGenerico || rfcSinDigito + digitoVerificador != "XAXX010101000"))
            return false;
        else if (!aceptarGenerico && rfcSinDigito + digitoVerificador == "XEXX010101000")
            return false;
        return rfcSinDigito + digitoVerificador;
    }


    //Handler para el evento cuando cambia el input
    // -Lleva la RFC a mayúsculas para validarlo
    // -Elimina los espacios que pueda tener antes o después
    function validarInput(input) {
        var rfc = input.value.trim().toUpperCase(),
            resultado = document.getElementById("resultado"),
            valido;

        var rfcCorrecto = rfcValido(rfc); // ⬅️ Acá se comprueba

        if (rfcCorrecto) {
            valido = "Válido";
            resultado.classList.add("ok");
            error = 0;
        } else {
            valido = "No válido"
            resultado.classList.remove("ok");
            error++;
        }



        resultado.innerText = "RFC: " + rfc +
            // "\nResultado: " + rfcCorrecto +
            "\nFormato: " + valido;


    }

    var error = 0;
    var patron = /^[a-zA-Z\s]*$/;
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    var form = document.getElementById('formulario');
    var rfc_input = document.getElementById('rfc_input');
    var descripcion = document.getElementById('descripcion');

    function enviarForm() {
        if (serie.value === null || serie.value === '' || !(typeof serie.value) === 'string' || !(serie.value.length === 1)) {
            document.getElementById('errorSerie').style.display = 'block';
            serie.focus();
            serie.style.borderColor = "red";
            error++;
        } else {
            error = 0;
            document.getElementById('errorSerie').style.display = 'none';
            serie.style.borderColor = "green";
            if (folio.value === null || folio.value === '' || !(typeof folio.value) === 'number' || !(folio.value.length === 1)) {
                document.getElementById('errorFolio').style.display = 'block';
                folio.focus();
                folio.style.borderColor = "red";
                error++;
            } else {
                error = 0;
                document.getElementById('errorFolio').style.display = 'none';
                folio.style.borderColor = "green";
                if (condiciones.value === null || condiciones.value === '') {
                    document.getElementById('errorCondiciones').style.display = 'block';
                    condiciones.focus();
                    condiciones.style.borderColor = "red";
                    error++;
                } else {
                    error = 0;
                    document.getElementById('errorCondiciones').style.display = 'none';
                    condiciones.style.borderColor = "green";
                    if (forma.value === null || forma.value === '' || !(typeof forma.value) === 'number' || !(forma.value.length === 2)) {
                        document.getElementById('errorForma').style.display = 'block';
                        forma.focus();
                        forma.style.borderColor = "red";
                        error++;
                    } else {
                        error = 0;
                        document.getElementById('errorForma').style.display = 'none';
                        forma.style.borderColor = "green";
                        if (moneda.value === null || moneda.value === '' || !(moneda.value.length === 3)) {
                            document.getElementById('errorMoneda').style.display = 'block';
                            moneda.focus();
                            moneda.style.borderColor = "red";
                            error++;
                        } else {
                            error = 0;
                            document.getElementById('errorMoneda').style.display = 'none';
                            moneda.style.borderColor = "green";
                            if (subtotal.value === null || subtotal.value === '' || !(typeof subtotal.value) === 'number') {
                                document.getElementById('errorSubtotal').style.display = 'block';
                                subtotal.focus();
                                subtotal.style.borderColor = "red";
                                error++;
                            } else {
                                error = 0;
                                document.getElementById('errorSubtotal').style.display = 'none';
                                subtotal.style.borderColor = "green";
                                if (iva.value === null || iva.value === '' || !(typeof iva.value) === 'number') {
                                    document.getElementById('errorIVA').style.display = 'block';
                                    iva.focus();
                                    iva.style.borderColor = "red";
                                    error++;
                                } else {
                                    error = 0;
                                    document.getElementById('errorIVA').style.display = 'none';
                                    iva.style.borderColor = "green";
                                    if (total.value === null || total.value === '' || !(typeof total.value) === 'number') {
                                        document.getElementById('errorTotal').style.display = 'block';
                                        total.focus();
                                        total.style.borderColor = "red";
                                        error++;
                                    } else {
                                        error = 0;
                                        document.getElementById('errorTotal').style.display = 'none';
                                        total.style.borderColor = "green";
                                        if (comprobante.value === null || comprobante.value === '' || !(typeof comprobante.value) === 'string' || !(comprobante.value.length === 2)) {
                                            document.getElementById('errorComprobante').style.display = 'block';
                                            comprobante.focus();
                                            comprobante.style.borderColor = "red";
                                            error++;
                                        } else {
                                            error = 0;
                                            document.getElementById('errorComprobante').style.display = 'none';
                                            comprobante.style.borderColor = "green";
                                            if (metodo.value === null || metodo.value === '' || !(typeof metodo.value) === 'string' || !(metodo.value.length === 3)) {
                                                document.getElementById('errorMetodo').style.display = 'block';
                                                metodo.focus();
                                                metodo.style.borderColor = "red";
                                                error++;
                                            } else {
                                                error = 0;
                                                document.getElementById('errorMetodo').style.display = 'none';
                                                metodo.style.borderColor = "green";
                                                if (cp.value === null || cp.value === '' || !(typeof cp.value) === 'string' || !(cp.value.length === 5)) {
                                                    document.getElementById('errorCP').style.display = 'block';
                                                    cp.focus();
                                                    cp.style.borderColor = "red";
                                                    error++;
                                                } else {
                                                    error = 0;
                                                    document.getElementById('errorCP').style.display = 'none';
                                                    cp.style.borderColor = "green";
                                                    if (rfc_input.value === null || rfc_input.value === '' || !(rfc_input.value.length >= 12) || !(rfc_input.value.length <= 13)) {
                                                        document.getElementById('errorRFC').style.display = 'block';
                                                        rfc_input.focus();
                                                        rfc_input.style.borderColor = "red";
                                                        error++;
                                                    } else {
                                                        error = 0;
                                                        document.getElementById('errorRFC').style.display = 'none';
                                                        rfc_input.style.borderColor = "green";
                                                        if (razon.value === null || razon.value === '') {
                                                            document.getElementById('errorRazon').style.display = 'block';
                                                            razon.focus();
                                                            razon.style.borderColor = "red";
                                                            error++;
                                                        } else {
                                                            error = 0;
                                                            document.getElementById('errorRazon').style.display = 'none';
                                                            razon.style.borderColor = "green";
                                                            if (pais.value === null || pais.value === '' || !(typeof pais.value) === 'string') {
                                                                document.getElementById('errorPais').style.display = 'block';
                                                                pais.focus();
                                                                paisI.style.borderColor = "red";
                                                                error++;
                                                            } else {
                                                                error = 0;
                                                                document.getElementById('errorPais').style.display = 'none';
                                                                pais.style.borderColor = "green";
                                                                if (cfdi.value === null || cfdi.value === '' || !(cfdi.value.length === 3)) {
                                                                    document.getElementById('errorCFDI').style.display = 'block';
                                                                    cfdi.focus();
                                                                    cfdi.style.borderColor = "red";
                                                                    error++;
                                                                } else {
                                                                    error = 0;
                                                                    document.getElementById('errorCFDI').style.display = 'none';
                                                                    cfdi.style.borderColor = "green";
                                                                    if (email.value === null || email.value === '' || !re.test(email.value)) {
                                                                        document.getElementById('errorEmail').style.display = 'block';
                                                                        email.focus();
                                                                        email.style.borderColor = "red";
                                                                        error++;
                                                                    } else {
                                                                        error = 0;
                                                                        document.getElementById('errorEmail').style.display = 'none';
                                                                        email.style.borderColor = "green";
                                                                        if (impuesto.value === null || impuesto.value === '' || !(impuesto.value.length === 3)) {
                                                                            document.getElementById('errorImpuesto').style.display = 'block';
                                                                            impuesto.focus();
                                                                            impuesto.style.borderColor = "red";
                                                                            error++;
                                                                        } else {
                                                                            error = 0;
                                                                            document.getElementById('errorImpuesto').style.display = 'none';
                                                                            impuesto.style.borderColor = "green";
                                                                            if (factor.value === null || factor.value === '') {
                                                                                document.getElementById('errorFactor').style.display = 'block';
                                                                                factor.focus();
                                                                                factor.style.borderColor = "red";
                                                                                error++;
                                                                            } else {
                                                                                error = 0;
                                                                                document.getElementById('errorFactor').style.display = 'none';
                                                                                factor.style.borderColor = "green";
                                                                                if (clave.value === null || clave.value === '' || !(clave.value.length === 8) || !(typeof clave.value) === 'number') {
                                                                                    document.getElementById('errorClave').style.display = 'block';
                                                                                    clave.focus();
                                                                                    clave.style.borderColor = "red";
                                                                                    error++;
                                                                                } else {
                                                                                    error = 0;
                                                                                    document.getElementById('errorClave').style.display = 'none';
                                                                                    clave.style.borderColor = "green";
                                                                                    if (cantidad.value === null || cantidad.value === '' || !(typeof cantidad.value) === 'number') {
                                                                                        document.getElementById('errorCantidad').style.display = 'block';
                                                                                        cantidad.focus();
                                                                                        cantidad.style.borderColor = "red";
                                                                                        error++;
                                                                                    } else {
                                                                                        error = 0;
                                                                                        document.getElementById('errorCantidad').style.display = 'none';
                                                                                        cantidad.style.borderColor = "green";
                                                                                        if (descripcion.value === null || descripcion.value === '') {
                                                                                            document.getElementById('errorDes').style.display = 'block';
                                                                                            descripcion.focus();
                                                                                            descripcion.style.borderColor = "red";
                                                                                            error++;
                                                                                        } else {
                                                                                            error = 0;
                                                                                            document.getElementById('errorDes').style.display = 'none';
                                                                                            descripcion.style.borderColor = "green";
                                                                                            if (unitario.value === null || unitario.value === '' || !(typeof unitario.value) === 'number') {
                                                                                                document.getElementById('errorUnitario').style.display = 'block';
                                                                                                unitario.focus();
                                                                                                unitario.style.borderColor = "red";
                                                                                                error++;
                                                                                            } else {
                                                                                                error = 0;
                                                                                                document.getElementById('errorUnitario').style.display = 'none';
                                                                                                unitario.style.borderColor = "green";
                                                                                                I
                                                                                            }
                                                                                        }
                                                                                    }
                                                                                }
                                                                            }
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }

        }

        if (error > 0) {
            return false;
        } else {
            
            return true;
        }


    }
</script>