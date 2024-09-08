<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veterinaria - Reclamos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>

    <!-- Hero Section -->
    <header class="hero-section">
        <div class="container">
            <img src="{{ asset('img/clinica-banner.jpg') }}" alt="Banner de la Clínica" class="img-fluid mb-4">
            <h1>Tu Compañero Ideal para el Cuidado de Mascotas</h1>
            <p>Conoce nuestros servicios y cómo podemos ayudarte a mantener a tus mascotas felices y saludables.</p>
            <a href="#reclamos-form" class="btn btn-light btn-lg">Contáctanos</a>
        </div>
    </header>

    <!-- Features Section -->
    <section class="container my-5">
        <div class="row text-center">
            <div class="col-md-4 mb-4">
                <div class="feature-item">
                    <div class="feature-icon mb-3">
                        <i class="bi bi-house-door"></i>
                    </div>
                    <h3>Atención Personalizada</h3>
                    <p>Recibe el mejor cuidado para tus mascotas con una atención personalizada y dedicada.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="feature-item">
                    <div class="feature-icon mb-3">
                        <i class="bi bi-paw"></i>
                    </div>
                    <h3>Servicios Completos</h3>
                    <p>Desde consultas hasta cirugías, ofrecemos todos los servicios necesarios para la salud de tus
                        mascotas.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="feature-item">
                    <div class="feature-icon mb-3">
                        <i class="bi bi-box"></i>
                    </div>
                    <h3>Productos Especializados</h3>
                    <p>Encuentra productos de alta calidad para el cuidado y bienestar de tus mascotas.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- About Us Section -->
    <section class="bg-light py-5">
        <div class="container">
            <h2 class="text-center">Sobre Nosotros</h2>
            <p class="text-center">Ofrecemos los mejores servicios veterinarios para que tus mascotas se mantengan
                saludables y felices. Nuestro equipo está compuesto por profesionales dedicados y apasionados por los
                animales.</p>
        </div>
    </section>

    <!-- Services Section -->
    <section class="container my-5">
        <h2 class="text-center">Nuestros Servicios</h2>
        <ul class="list-unstyled text-center">
            <li>Consultas veterinarias</li>
            <li>Vacunación y desparasitación</li>
            <li>Cirugías</li>
            <li>Estética y peluquería para mascotas</li>
            <li>Venta de productos especializados</li>
        </ul>
    </section>

    <div class="container-form" style="margin-top:180px">
    <section id="reclamos-form" class="container my-5">

        <div class="row">
            <!-- Columna de la Imagen -->
            <div class="col-md-6 d-flex align-items-center justify-content-center">
                <img src="{{ asset('img/veterinaria_image2.png') }}" alt="Imagen del Formulario de la Clínica"
                    class="img-fluid2">
            </div>

            <!-- Columna del Formulario -->
            <div class="col-md-6 mt-5">
                @if (session('success'))
                    <div id="success-message" class="alert alert-success">
                        {{ session('success') }}
                        <button id="close-success" class="close-button" aria-label="Close">&times;</button>
                    </div>
                @endif

                @if (session('error'))
                    <div id="error-message" class="alert alert-danger">
                        {{ session('error') }}
                        <button id="close-error" class="close-button" aria-label="Close">&times;</button>
                    </div>
                @endif
                <div class="form-section">
                <form action="{{ route('reclamos.store') }}" method="POST" class="needs-validation" novalidate>
                    @csrf
                    <h4><b>Datos Personales</b></h4>
                    <div class="row">
                                <!-- Nombres del Cliente -->
                                <div class="col-md-6 mb-1 custom-margin">
                                    <label for="nombres_cliente" class="form-label custom-label">Nombres</label>
                                    <input type="text" class="form-control input-gusano custom-input" id="nombres_cliente" name="nombres_cliente" placeholder="Ingresa tus nombres" required>
                                    <div class="invalid-feedback">Por favor, ingresa tus nombres.</div>
                                </div>

                                <!-- Apellidos del Cliente -->
                                <div class="col-md-6 mb-1 custom-margin">
                                    <label for="apellidos_cliente" class="form-label custom-label">Apellidos</label>
                                    <input type="text" class="form-control input-gusano custom-input" id="apellidos_cliente" name="apellidos_cliente" placeholder="Ingresa tus apellidos" required>
                                    <div class="invalid-feedback">Por favor, ingresa tus apellidos.</div>
                                </div>

                                <!-- Correo del Cliente -->
                                <div class="col-md-6 mb-1 custom-margin">
                                    <label for="correo_cliente" class="form-label custom-label">Correo Electrónico</label>
                                    <input type="email" class="form-control input-gusano custom-input" id="correo_cliente" name="correo_cliente" placeholder="Ingresa tu correo" required>
                                    <div class="invalid-feedback">Por favor, ingresa un correo válido.</div>
                                </div>

                                <!-- Teléfono del Cliente -->
                                <div class="col-md-6 mb-1 custom-margin">
                                    <label for="telefono_cliente" class="form-label custom-label">Teléfono</label>
                                    <input type="text" class="form-control input-gusano custom-input" id="telefono_cliente" name="telefono_cliente" placeholder="Ingresa tu teléfono (opcional)">
                                </div>

                                <!-- DNI del Cliente -->
                                <div class="col-md-6 mb-1 custom-margin">
                                    <label for="dni_cliente" class="form-label custom-label">DNI</label>
                                    <input type="text" class="form-control input-gusano custom-input" id="dni_cliente" name="dni_cliente" placeholder="Ingresa tu DNI (opcional)">
                                </div>

                                <!-- Sexo del Cliente (Botones de Radio) -->
                                <div class="col-md-6 mb-1 custom-margin">
                                    <label for="sexo" class="form-label custom-label">Sexo</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input custom-input" type="radio" name="sexo" id="masculino" value="M">
                                        <label class="form-check-label custom-label" for="masculino">Masculino</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input custom-input" type="radio" name="sexo" id="femenino" value="F">
                                        <label class="form-check-label custom-label" for="femenino">Femenino</label>
                                    </div>
                                    <div class="invalid-feedback">Por favor, selecciona tu sexo.</div>
                                </div>

                                <!-- Datos del Reclamo -->
                                <h4 class="mt-3">Datos del Reclamo</h4>

                                <!-- Tipo de Reclamo -->
                                <div class="col-md-6 mb-1 custom-margin">
                                    <label for="tipo_reclamo" class="form-label custom-label">Tipo de Reclamo</label>
                                    <select class="form-select input-gusano custom-input" id="tipo_reclamo" name="tipo_reclamo" required>
                                        <option value="" disabled selected>Selecciona el tipo de reclamo</option>
                                        <option value="servicio">Servicio</option>
                                        <option value="producto">Producto</option>
                                        <option value="otros">Otros</option>
                                    </select>
                                    <div class="invalid-feedback">Por favor, selecciona un tipo de reclamo.</div>
                                </div>

                                <!-- Producto -->
                                <div class="col-md-6 mb-1 custom-margin">
                                    <label for="producto" class="form-label custom-label">Producto</label>
                                    <select class="form-select input-gusano custom-input" id="producto" name="producto" required>
                                        <option value="" disabled selected>Selecciona un producto</option>
                                        @foreach ($productos as $producto)
                                            <option value="{{ $producto->productoID }}">{{ $producto->nombre }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Por favor, selecciona un producto.</div>
                                </div>

                                <!-- Descripción del Reclamo -->
                                <div class="col-12 mb-1 custom-margin">
                                    <label for="descripcion" class="form-label custom-label">Descripción del Reclamo</label>
                                    <textarea class="form-control input-gusano custom-input" id="descripcion" name="descripcion" rows="3" placeholder="Describe tu reclamo" required></textarea>
                                    <div class="invalid-feedback">Por favor, ingresa una descripción.</div>
                                </div>

                                <!-- Botón Enviar -->
                                <button type="submit" class="btn btn-light btn-gusano">Enviar Reclamo</button>
                            </div>

                   </form>
                </div>
            </div>
        </div>
    </section>
    </div>


    <!-- Footer Section -->
    <footer class="bg-light text-center py-4" style="margin-top: 280px;">
        <p>&copy; 2024 Veterinaria. Todos los derechos reservados.</p>
    </footer>

    <script>
        // Script para habilitar validación de formularios Bootstrap
        (() => {
            'use strict';

            const forms = document.querySelectorAll('.needs-validation');

            Array.prototype.slice.call(forms).forEach((form) => {
                form.addEventListener('submit', (event) => {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }

                    form.classList.add('was-validated');
                }, false);
            });
        })();

        // Script para cerrar mensajes de éxito y error
        document.addEventListener('DOMContentLoaded', function() {
            const closeSuccessButton = document.getElementById('close-success');
            const successMessage = document.getElementById('success-message');
            const closeErrorButton = document.getElementById('close-error');
            const errorMessage = document.getElementById('error-message');

            if (closeSuccessButton && successMessage) {
                closeSuccessButton.addEventListener('click', function() {
                    successMessage.style.display = 'none';
                });
            }

            if (closeErrorButton && errorMessage) {
                closeErrorButton.addEventListener('click', function() {
                    errorMessage.style.display = 'none';
                });
            }
        });
    </script>
</body>

</html>
