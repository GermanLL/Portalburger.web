<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aquí es donde puedes registrar las rutas web para tu aplicación. Estas
| rutas son cargadas por el RouteServiceProvider dentro de un grupo que
| contiene el grupo de middleware "web". ¡Ahora crea algo grandioso!
|
*/

/* --------------------------------------------- */
/* RUTAS DE LA APLICACIÓN WEB (ECOMMERCE)        */
/* --------------------------------------------- */

// Rutas sin prefijo, para la parte pública de la web
Route::get('/', 'ControladorWebHome@index');
Route::post('/', 'ControladorWebHome@insertar');

Route::get('/takeaway', 'ControladorWebTakeaway@index');
Route::post('/takeaway', 'ControladorWebTakeaway@insertar');

Route::get('/nosotros', 'ControladorWebNosotros@index');
Route::post('/nosotros', 'ControladorWebNosotros@insertarPostulacion');

Route::get('/contacto', 'ControladorWebContacto@index');
Route::post('/contacto', 'ControladorWebContacto@enviar');

Route::get('/postulacion-gracias', 'ControladorWebPostulacionGracias@index');
Route::get('/contacto-gracias', 'ControladorWebContactoGracias@index');

Route::get('/carrito', 'ControladorWebCarrito@index');
Route::post('/carrito', 'ControladorWebCarrito@procesar');

Route::get('/mi-cuenta', 'ControladorWebMiCuenta@index');
Route::post('/mi-cuenta', 'ControladorWebMiCuenta@guardar');

Route::get('/cambiar-clave', 'ControladorWebCambiarClave@index');
Route::post('/cambiar-clave', 'ControladorWebCambiarClave@cambiar');

Route::get('/login', 'ControladorWebLogin@index');
Route::get('/logout', 'ControladorWebLogin@logout');
Route::post('/login', 'ControladorWebLogin@ingresar');

Route::get('/registrarse', 'ControladorWebRegistrarse@index');
Route::post('/registrarse', 'ControladorWebRegistrarse@registrarse');

Route::get('/recuperar-clave', 'ControladorWebRecuperarClave@index');
Route::post('/recuperar-clave', 'ControladorWebRecuperarClave@recuperar');

//Route::get('/mercado-pago/aprobado/{idPedido}', 'ControladorMercadoPago@aprobar');
//Route::get('/mercado-pago/pendiente/{idPedido}', 'ControladorMercadoPago@pendiente');
//Route::get('/mercado-pago/error/{idPedido}', 'ControladorMercadoPago@error');


/* --------------------------------------------- */
/* RUTAS DE ADMINISTRACIÓN                       */
/* --------------------------------------------- */

// Prefijo 'admin' para todas las rutas del panel de administración
Route::prefix('admin')->group(function () {

    Route::get('/', 'ControladorHome@index');
    Route::post('/patente/nuevo', 'ControladorPatente@guardar');

    // CONTROLADOR LOGIN
    Route::get('/login', 'ControladorLogin@index');
    Route::post('/login', 'ControladorLogin@entrar');
    Route::get('/logout', 'ControladorLogin@logout');

    // CONTROLADOR RECUPERO CLAVE
    Route::get('/recupero-clave', 'ControladorRecuperoClave@index');
    Route::post('/recupero-clave', 'ControladorRecuperoClave@recuperar');

    // CONTROLADOR PERMISO
    Route::get('/permisos', 'ControladorPermiso@index');
    Route::get('/permisos/cargarGrilla', 'ControladorPermiso@cargarGrilla')->name('permiso.cargarGrilla');
    Route::get('/permiso/nuevo', 'ControladorPermiso@nuevo');
    Route::get('/permiso/cargarGrillaPatentesPorFamilia', 'ControladorPermiso@cargarGrillaPatentesPorFamilia')->name('permiso.cargarGrillaPatentesPorFamilia');
    Route::get('/permiso/cargarGrillaPatentesDisponibles', 'ControladorPermiso@cargarGrillaPatentesDisponibles')->name('permiso.cargarGrillaPatentesDisponibles');
    Route::get('/permiso/{idpermiso}', 'ControladorPermiso@editar');
    Route::post('/permiso/{idpermiso}', 'ControladorPermiso@guardar');

    // CONTROLADOR GRUPO
    Route::get('/grupos', 'ControladorGrupo@index');
    Route::get('/grupos/cargarGrilla', 'ControladorGrupo@cargarGrilla')->name('grupo.cargarGrilla');
    Route::get('/grupo/nuevo', 'ControladorGrupo@nuevo');
    Route::post('/grupo/nuevo', 'ControladorGrupo@guardar');
    Route::get('/grupo/{idgrupo}', 'ControladorGrupo@editar');
    Route::post('/grupo/{idgrupo}', 'ControladorGrupo@guardar');

    // CONTROLADOR USUARIO
    Route::get('/usuarios', 'ControladorUsuario@index');
    Route::get('/usuarios/nuevo', 'ControladorUsuario@nuevo');
    Route::post('/usuarios/nuevo', 'ControladorUsuario@guardar');
    Route::post('/usuarios/{usuario}', 'ControladorUsuario@guardar');
    Route::get('/usuarios/cargarGrilla', 'ControladorUsuario@cargarGrilla')->name('usuarios.cargarGrilla');
    Route::get('/usuarios/buscarUsuario', 'ControladorUsuario@buscarUsuario');
    Route::get('/usuarios/{usuario}', 'ControladorUsuario@editar');

    // CONTROLADOR MENU
    Route::get('/sistema/menu', 'ControladorMenu@index');
    Route::get('/sistema/menu/nuevo', 'ControladorMenu@nuevo');
    Route::post('/sistema/menu/nuevo', 'ControladorMenu@guardar');
    Route::get('/sistema/menu/cargarGrilla', 'ControladorMenu@cargarGrilla')->name('menu.cargarGrilla');
    Route::get('/sistema/menu/eliminar', 'ControladorMenu@eliminar');
    Route::get('/sistema/menu/{id}', 'ControladorMenu@editar');
    Route::post('/sistema/menu/{id}', 'ControladorMenu@guardar');

    // CONTROLADOR PATENTES
    Route::get('/patentes', 'ControladorPatente@index');
    Route::get('/patente/nuevo', 'ControladorPatente@nuevo');
    Route::post('/patente/nuevo', 'ControladorPatente@guardar');
    Route::get('/patente/cargarGrilla', 'ControladorPatente@cargarGrilla')->name('patente.cargarGrilla');
    Route::get('/patente/eliminar', 'ControladorPatente@eliminar');
    Route::get('/patente/nuevo/{id}', 'ControladorPatente@editar');
    Route::post('/patente/nuevo/{id}', 'ControladorPatente@guardar');

    // CONTROLADOR CLIENTE
    Route::get('/clientes', 'ControladorCliente@index');
    Route::get('/clientes/cargarGrilla', 'ControladorCliente@cargarGrilla')->name('cliente.cargarGrilla');
    Route::get('/cliente/nuevo', 'ControladorCliente@nuevo');
    Route::post('/cliente/nuevo', 'ControladorCliente@guardar');
    Route::get('/cliente/eliminar', 'ControladorCliente@eliminar');
    Route::get('/clientes/{idCliente}', 'ControladorCliente@editar');
    Route::post('/clientes/{idCliente}', 'ControladorCliente@guardar');

    // CONTROLADOR PRODUCTOS
    Route::get('/productos', 'ControladorProducto@index');
    Route::get('/productos/cargarGrilla', 'ControladorProducto@cargarGrilla')->name('producto.cargarGrilla');
    Route::get('/producto/nuevo', 'ControladorProducto@nuevo');
    Route::post('/producto/nuevo', 'ControladorProducto@guardar');
    Route::get('/producto/eliminar', 'ControladorProducto@eliminar');
    Route::get('/productos/{idProducto}', 'ControladorProducto@editar');
    Route::post('/productos/{idProducto}', 'ControladorProducto@guardar');

    // CONTROLADOR PEDIDOS
    Route::get('/pedidos', 'ControladorPedido@index');
    Route::get('/pedidos/cargarGrilla', 'ControladorPedido@cargarGrilla')->name('pedido.cargarGrilla');
    Route::get('/pedido/nuevo', 'ControladorPedido@nuevo');
    Route::post('/pedido/nuevo', 'ControladorPedido@guardar');
    Route::get('/pedido/eliminar', 'ControladorPedido@eliminar');
    Route::get('/pedidos/{idPedido}', 'ControladorPedido@editar');
    Route::post('/pedidos/{idPedido}', 'ControladorPedido@guardar');

    // CONTROLADOR POSTULACIONES
    Route::get('/postulaciones', 'ControladorPostulacion@index');
    Route::get('/postulaciones/cargarGrilla', 'ControladorPostulacion@cargarGrilla')->name('postulacion.cargarGrilla');
    Route::get('/postulacion/nuevo', 'ControladorPostulacion@nuevo');
    Route::post('/postulacion/nuevo', 'ControladorPostulacion@guardar');
    Route::get('/postulacion/eliminar', 'ControladorPostulacion@eliminar');
    Route::get('/postulaciones/{idPostulacion}', 'ControladorPostulacion@editar');
    Route::post('/postulaciones/{idPostulacion}', 'ControladorPostulacion@guardar');

    // CONTROLADOR SUCURSALES
    Route::get('/sucursales', 'ControladorSucursal@index');
    Route::get('/sucursales/cargarGrilla', 'ControladorSucursal@cargarGrilla')->name('sucursal.cargarGrilla');
    Route::get('/sucursal/nuevo', 'ControladorSucursal@nuevo');
    Route::post('/sucursal/nuevo', 'ControladorSucursal@guardar');
    Route::get('/sucursal/eliminar', 'ControladorSucursal@eliminar');
    Route::get('/sucursales/{idSucursal}', 'ControladorSucursal@editar');
    Route::post('/sucursales/{idSucursal}', 'ControladorSucursal@guardar');

    // CONTROLADOR CATEGORIA
    Route::get('/categorias', 'ControladorCategoria@index');
    Route::get('/categorias/cargarGrilla', 'ControladorCategoria@cargarGrilla')->name('categoria.cargarGrilla');
    Route::get('/categoria/nuevo', 'ControladorCategoria@nuevo');
    Route::post('/categoria/nuevo', 'ControladorCategoria@guardar');
    Route::get('/categoria/eliminar', 'ControladorCategoria@eliminar');
    Route::get('/categorias/{idCategoria}', 'ControladorCategoria@editar');
    Route::post('/categorias/{idCategoria}', 'ControladorCategoria@guardar');

    // CONTROLADOR PROVEEDORES
    Route::get('/proveedores', 'ControladorProveedor@index');
    Route::get('/proveedores/cargarGrilla', 'ControladorProveedor@cargarGrilla')->name('proveedor.cargarGrilla');
    Route::get('/proveedor/nuevo', 'ControladorProveedor@nuevo');
    Route::post('/proveedor/nuevo', 'ControladorProveedor@guardar');
    Route::get('/proveedor/eliminar', 'ControladorProveedor@eliminar');
    Route::get('/proveedores/{idProveedor}', 'ControladorProveedor@editar');
    Route::post('/proveedores/{idProveedor}', 'ControladorProveedor@guardar');

    // CONTROLADOR RUBRO
    Route::get('/rubros', 'ControladorRubro@index');
    Route::get('/rubros/cargarGrilla', 'ControladorRubro@cargarGrilla')->name('rubro.cargarGrilla');
    Route::get('/rubro/nuevo', 'ControladorRubro@nuevo');
    Route::post('/rubro/nuevo', 'ControladorRubro@guardar');
    Route::get('/rubro/eliminar', 'ControladorRubro@eliminar');
    Route::get('/rubros/{idRubro}', 'ControladorRubro@editar');
    Route::post('/rubros/{idRubro}', 'ControladorRubro@guardar');

});