# Practica 3: Sistema de Usuarios con Validaciones y Excepciones

Esta práctica corresponde a la asignatura **Desarrollo Web Avanzado** y tiene como objetivo implementar un sistema de usuarios en PHP utilizando programación orientada a objetos, validaciones y manejo de excepciones.


## Estructura del proyecto

##  Descripción del sistema
El sistema permite crear diferentes tipos de usuarios:
- **Usuario**: clase base que valida el correo electrónico.
- **Admin**: hereda de Usuario y devuelve el rol "Administrador".
- **Alumno**: hereda de Usuario, añade el atributo `matricula` y devuelve el rol "Alumno".

Cada vez que se crea un objeto, se valida el correo. Si el formato es incorrecto, se lanza una excepción que es capturada en el archivo principal.

## Flujo de clases
1. `Usuario.php`  
   - Contiene los atributos básicos (`nombre`, `correo`).  
   - Valida el correo con `filter_var`.  
   - Lanza excepción si el correo no es válido.  

2. `Admin.php`  
   - Hereda de `Usuario`.  
   - Sobrescribe el método `getRol()` para devolver "Administrador".  

3. `Alumno.php`  
   - Hereda de `Usuario`.  
   - Añade el atributo `matricula`.  
   - Sobrescribe el método `getRol()` para devolver "Alumno".  

4. `index.php`  
   - Prueba la creación de usuarios válidos e inválidos.  
   - Utiliza bloques `try/catch` para capturar errores.  
   - Muestra mensajes controlados en pantalla.  

   ## Evidencia del manejo de errores

## Enlace Navegador
http://localhost/desarrollo-web-avanzado-fimaz-uas/parcial-1-poo/practica-3/index.php

Esto demuestra que:
- Los usuarios válidos se crean correctamente.  
- Los usuarios con datos inválidos generan una excepción.  
- El sistema controla los errores y muestra mensajes claros. 


