# Práctica 2 – Herencia y reutilización de código

## Objetivo
Aplicar el concepto de herencia en PHP utilizando una clase base y una clase derivada.

## Desarrollo
Primero se reutilizó la clase Usuario creada en la práctica anterior.
Posteriormente se creó la clase Admin, la cual extiende de Usuario
mediante la palabra clave extends.

De esta forma se reutilizan los atributos y métodos sin necesidad de
volver a escribir el mismo código.

## Diferencias entre Usuario y Admin
- Usuario es la clase base.
- Admin hereda de Usuario.
- Admin agrega un método propio llamado getRol().

## Ejecución
Para ejecutar la práctica:
1. Colocar la carpeta practica-2 dentro de parcial-1-poo.
2. Iniciar Apache en XAMPP.
3. Acceder desde el navegador a: http://localhost/desarrollo-web-avanzado-fimaz-uas/parcial-1-poo/practica-2/index.php
