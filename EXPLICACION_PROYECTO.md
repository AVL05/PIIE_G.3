# Guía de Defensa del Proyecto: Memoria Técnica y Funcional

Este documento explica cómo se ha construido la aplicación web "Serra Innova", respondiendo punto por punto a los criterios de evaluación de la rúbrica. Utiliza ejemplos funcionales de toda la web para demostrar el dominio de las tecnologías empleadas.

---

## 1. Explicación de la Arquitectura y Tecnología (0,3 ptos)

**Criterio:** Explicar con claridad las decisiones técnicas y la estructura básica.

Hemos diseñado el proyecto bajo una arquitectura de **Single Page Application (SPA)**. A diferencia de las webs tradicionales que recargan toda la página al hacer clic en un enlace, nuestra aplicación carga una sola vez y simula la navegación intercambiando componentes instantáneamente V. Esto ofrece una experiencia de usuario mucho más fluida, similar a una aplicación nativa.

**Tecnologías Clave y Decisiones:**

- **Vue.js 3 (Composition API):** Elegimos la versión más moderna de Vue porque su **Composition API** nos permite organizar el código de forma lógica por "funcionalidad" (ej: todo lo relacionado con el cálculo de emisiones junto) en lugar de dispersarlo. Esto facilita enormemente el mantenimiento y la lectura del código.
- **Vite:** Usamos Vite como empaquetador porque su servidor de desarrollo es extremadamente rápido, mejorando nuestra productividad.
- **Pinia:** Implementamos Pinia para la **Gestión de Estado Global**. En una web normal, pasar datos (como el usuario logueado o la lista de casas) entre componentes es difícil. Pinia actúa como un "banco central de datos" accesible desde cualquier parte de la web.
- **Tailwind CSS:** Para el diseño, optamos por este framework de utilidades. Nos permite construir interfaces complejas y responsivas rápidamente sin escribir archivos CSS gigantes, aplicando clases directamente en el HTML.

---

## 2. Comprensión del Código JavaScript Desarrollado (0,4 ptos)

**Criterio:** Demostrar comprensión profunda del código y su organización.

Todo el desarrollo se basa en la creación de **Componentes Reutilizables**. Hemos dividido la web en piezas pequeñas (Header, Footer, Tarjeta de Propiedad) que se ensamblan para formar las vistas principales.

**Lógica Centralizada:**
En cada componente (como la `CalculatorView`), utilizamos el bloque `<script setup>` para definir la lógica. Hemos separado claramente:

1.  **Imports:** Traemos las herramientas necesarias (`ref`, `reactive`, librerías).
2.  **Estado:** Definimos las variables que guardarán la información.
3.  **Métodos:** Creamos funciones que contienen la lógica de negocio.

**Ejemplo Práctico en la Web:**
En la **Calculadora de Huella de Carbono**, no escribimos un script gigante. Definimos un objeto reactivo `form` que agrupa todos los datos de la vivienda (superficie, año, calefacción). La función `calculateImpact` toma este objeto limpio, aplica las fórmulas matemáticas necesarias y actualiza otro objeto `results`. Esta separación hace que el código sea fácil de entender y depurar.

---

## 3. Explicación del Manejo de Eventos y Formularios (0,5 ptos)

**Criterio:** Explicar correctamente eventos, validaciones y binding.

La interactividad de la web se basa en escuchar lo que hace el usuario y reaccionar a ello.

**Two-Way Data Binding (`v-model`):**
Esta es la característica más potente usada en nuestros formularios. Crea un vínculo bidireccional entre el HTML y JavaScript.

- **Ejemplo en Contacto:** Cuando el usuario escribe su nombre en el input, la variable `form.name` en JavaScript se actualiza automáticamente en tiempo real. No necesitamos leer el input manualmente con código.

**Manejo de Eventos (`@`):**
Utilizamos "escuchadores" de eventos directamente en el HTML.

- **`@submit.prevent`:** Usado en todos los formularios (Login, Contacto, Calculadora). La parte `.prevent` es vital: evita que el navegador recargue la página al enviar el formulario (comportamiento estándar antiguo), permitiéndonos procesar los datos con JavaScript sin interrupciones.
- **`@click`:** Usado botones interactivos, como cuando seleccionamos un tipo de "Asunto" en el formulario de contacto, actualizando visualmente el botón seleccionado.

**Validaciones:**
Implementamos una doble capa de seguridad:

1.  **HTML5:** Atributos como `required`, `type="email"` o `min="20"` impiden el envío de datos inválidos básicos.
2.  **Lógica JS:** Antes de realizar cálculos (como en la calculadora), verificamos que los datos tengan sentido dentro de nuestra lógica de negocio.

---

## 4. Explicación de la Manipulación del DOM y Reactividad (0,5 ptos)

**Criterio:** Explicar cómo se actualiza la vista y el renderizado.

En nuestro proyecto, **nunca manipulamos el DOM manualmente** (no usamos `document.getElementById`). Dejamos que el sistema de **Reactividad de Vue** se encargue de pintar la pantalla basándose en nuestros datos.

**Cómo funciona:**
Nosotros solo modificamos variables (el estado), y la web "reacciona" actualizándose sola.

**Estrategias Usadas en la Web:**

- **Renderizado Condicional (`v-if`):**
  - _Ejemplo:_ En la calculadora, tenemos una variable `showResults = false`. Mientras sea falsa, Vue muestra el formulario. En cuanto la cambiamos a `true` tras calcular, Vue elimina automáticamente el formulario del HTML e inserta los resultados. Es instantáneo.
- **Listas Dinámicas (`v-for`):**
  - _Ejemplo:_ En la vista de "Propiedades", no escribimos 50 tarjetas HTML a mano. Usamos un bucle `v-for="property in properties"` que recorre nuestro array de datos y genera automáticamente una tarjeta por cada casa. Si el array cambia (por un filtro), la lista en pantalla se actualiza sola.
- **Clases Dinámicas (`:class`):**
  - _Ejemplo:_ En las etiquetas energéticas (A, B, C...), cambiamos el color de fondo dinámicamente según la letra recibida, asignando clases de Tailwind (ej: `bg-green-500` si es A) mediante lógica en el template.

---

## 5. Comunicación Asíncrona y Obtención de Datos (0,3 ptos)

**Criterio:** Explicar la asincronía (AJAX/Fetch) y los tiempos de espera.

Las aplicaciones modernas no pueden congelarse mientras cargan datos. Hemos implementado un patrón de **Programación Asíncrona** robusto.

**Concepto `Async / Await`:**
Usamos estas palabras clave para manejar operaciones que tardan tiempo (como pedir la lista de casas al servidor) de manera ordenada y legible.

**Ciclo de Vida de una Petición (Ejemplo en Propiedades):**

1.  **Inicio:** Cuando el usuario entra a "Propiedades", activamos una variable `loading = true`. Esto hace que la interfaz muestre inmediatamente un "spinner" o indicador de carga.
2.  **Espera (`await`):** El código "espera" a que el servidor responda (simulado con `setTimeout` en nuestro entorno de desarrollo) sin bloquear el resto de la web. El usuario puede seguir haciendo scroll o clicando menús.
3.  **Respuesta:** Cuando llegan los datos, los guardamos en nuestra variable `properties`.
4.  **Finalización:** Desactivamos la carga (`loading = false`), lo que hace que el spinner desaparezca y se muestre la lista de casas recién llegada.
5.  **Manejo de Errores:** Todo esto está envuelto en un bloque `try/catch`. Si el servidor falla, capturamos el error y mostramos un mensaje amigable al usuario en lugar de que la web se rompa en blanco.
