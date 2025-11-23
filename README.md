# Portafolio Personal con Formulario PHP + MySQL  
**Cristian Arango**  
**Ingeniería en Tecnologías de la Información**  
Cuenca, Ecuador – Noviembre 2025

## Enlace del proyecto en producción
**https://arango34.wuaze.com**

## Objetivo del proyecto
Desarrollar un portafolio personal completamente funcional desplegado en internet que incluya:
- Presentación personal con foto y descripción
- Formulario de contacto con validación
- Almacenamiento permanente de mensajes en base de datos MySQL
- Confirmación de envío exitoso

## Tecnologías utilizadas
| Tecnología         | Versión / Detalle                          | Uso                                  |
|--------------------|--------------------------------------------|--------------------------------------|
| HTML5              | –                                          | Estructura semántica                 |
| CSS3               | diseño responsive                          | Estilos y presentación visual        |
| PHP                | PDO con sentencias preparadas              | Procesamiento seguro del formulario |
| MySQL              | Base de datos `if0_40470182_mensajes`      | Almacenamiento persistente           |
| InfinityFree       | Hosting gratuito + dominio wuaze.com       | Despliegue en producción             |

## Estructura del proyecto
/
├── index.html          → Página principal (presentación)
├── contacto.php        → Formulario + lógica de envío (PHP)
├── gracias.php         → Página de confirmación
├── css/
│   └── estilo.css      → Estilos personalizados
├── img/
│   └── foto.jpg        → Foto personal
└── (base de datos MySQL remota)

text## Características técnicas implementadas
1. **Validación completa en servidor (PHP)**
   - Campos obligatorios
   - Validación de formato de correo con `filter_var(..., FILTER_VALIDATE_EMAIL)`

2. **Conexión segura a MySQL con PDO**
   - Uso de sentencias preparadas (`prepare` + `execute`) → protección contra inyecciones SQL
   - Manejo de excepciones con `try-catch`
   - Charset UTF-8mb4 para soporte completo de caracteres

3. **Base de datos creada**
   ```sql
   CREATE TABLE mensajes (
       id INT AUTO_INCREMENT PRIMARY KEY,
       nombre VARCHAR(100) NOT NULL,
       correo VARCHAR(100) NOT NULL,
       mensaje TEXT NOT NULL,
       fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP
   );

Redirección segura tras envío
header("Location: gracias.php") + exit() para evitar reenvíos

Despliegue completo en hosting real
Dominio personalizado: arango34.wuaze.com
Todo funcionando 24/7 en internet


Pruebas realizadas

Envío exitoso de mensajes → se guardan correctamente en MySQL
Validación de campos vacíos y correo inválido
Responsive en móvil y escritorio
Accesible desde cualquier parte del mundo

Capturas del proyecto funcionando

Página principal: https://arango34.wuaze.com
Formulario + mensaje guardado en base de datos (verificado en phpMyAdmin)

Autor
Cristian Arango
Estudiante comprometido con el desarrollo web 
¡Listo para nuevos retos!
