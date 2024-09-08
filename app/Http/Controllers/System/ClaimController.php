<?php

namespace App\Http\Controllers\System;

use App\Models\v1\Reclamo;
use App\Models\v1\Producto;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Routing\Controller as BaseController;

class ClaimController extends BaseController
{
    /**
     * Muestra el formulario para crear un nuevo reclamo.
     *
     * @return \Illuminate\View\View
     */
    public function showForm()
    {
        // Obtén todos los productos para mostrarlos en el formulario
        $productos = Producto::all();
        return view('welcome', compact('productos'));
    }

    /**
     * Almacena un nuevo reclamo en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'nombres_cliente' => 'required|string',
            'apellidos_cliente' => 'required|string',
            'dni_cliente' => 'nullable|string',
            'telefono_cliente' => 'nullable|string',
            'correo_cliente' => 'required|email',
            'sexo' => 'nullable|string',
            'producto' => 'required|integer|exists:productos,productoID', // Asegúrate de usar el ID correcto
            'tipo_reclamo' => 'required|string',
            'descripcion' => 'required|string',
        ]);

        // Buscar el producto basado en su ID
        $producto = Producto::find($validatedData['producto']);
        if (!$producto) {
            return redirect()->route('reclamos.form')->with('error', 'Producto no encontrado.');
        }

        // Crear un nuevo reclamo en la base de datos
        $reclamo = Reclamo::create([
            'nombres_cliente' => $validatedData['nombres_cliente'],
            'apellidos_cliente' => $validatedData['apellidos_cliente'],
            'dni_cliente' => $validatedData['dni_cliente'],
            'telefono_cliente' => $validatedData['telefono_cliente'],
            'correo_cliente' => $validatedData['correo_cliente'],
            'sexo' => $validatedData['sexo'],
            'productoID' => $producto->productoID,
            'tipo_reclamo' => $validatedData['tipo_reclamo'],
            'descripcion' => $validatedData['descripcion'],
        ]);

        // Enviar el correo electrónico usando PHPMailer
        try {
            $this->sendMail($reclamo, $validatedData, $producto);
            return redirect()->route('reclamos.form')->with('success', 'Reclamo enviado correctamente.');
        } catch (Exception $e) {
            return redirect()->route('reclamos.form')->with('error', 'El reclamo no pudo ser enviado.')->withInput();
        }
    }

    /**
     * Envía un correo electrónico con el reclamo.
     *
     * @param  \App\Models\Reclamo  $reclamo
     * @param  array  $validatedData
     * @param  \App\Models\Producto  $producto
     * @return void
     */
    protected function sendMail($reclamo, $validatedData, $producto)
    {
        $mail = new PHPMailer(true);

        try {
            // Configuración del servidor SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'giancarlo.silva550@gmail.com'; // Usa una contraseña de aplicación segura
            $mail->Password = 'exhveejndgwvlbvq'; // Asegúrate de usar una contraseña de aplicación segura
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Configuración del correo
            $mail->setFrom('giancarlo.silva550@gmail.com', 'Veterinaria - Grupo: Aguilar, Chinchay , Silva');
            $mail->addAddress('rhuarcaya@senati.pe');
            //$mail->addAddress('1442862@senati.pe');

            // Contenido del correo
            $mail->isHTML(true);
            $mail->Subject = 'Nuevo Reclamo de Cliente';
            $mail->Body = "
                <h1>Nuevo Reclamo</h1>
                <p><strong>Nombres del Cliente:</strong> {$validatedData['nombres_cliente']}</p>
                <p><strong>Apellidos del Cliente:</strong> {$validatedData['apellidos_cliente']}</p>
                <p><strong>DNI:</strong> {$validatedData['dni_cliente']}</p>
                <p><strong>Teléfono:</strong> {$validatedData['telefono_cliente']}</p>
                <p><strong>Correo:</strong> {$validatedData['correo_cliente']}</p>
                <p><strong>Sexo:</strong> {$validatedData['sexo']}</p>
                <p><strong>Producto:</strong> {$producto->nombre}</p>
                <p><strong>Tipo Reclamo:</strong> {$validatedData['tipo_reclamo']}</p>
                <p><strong>Descripción:</strong> {$validatedData['descripcion']}</p>
            ";

            $mail->send();
        } catch (Exception $e) {
            // Maneja los errores de envío de correo aquí
            throw $e;
        }
    }
}
