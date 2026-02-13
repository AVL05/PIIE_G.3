# 🏡 SerraInnova - Inmobiliaria Sostenible

<div align="center">

[![Laravel](https://img.shields.io/badge/Laravel-12.0-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com)
[![Vue.js](https://img.shields.io/badge/Vue.js-3.0-4FC08D?style=for-the-badge&logo=vue.js&logoColor=white)](https://vuejs.org)
[![TailwindCSS](https://img.shields.io/badge/TailwindCSS-4.0-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)](https://tailwindcss.com)
[![Vite](https://img.shields.io/badge/Vite-7.0-646CFF?style=for-the-badge&logo=vite&logoColor=white)](https://vitejs.dev)

**La plataforma líder en gestión de propiedades energéticamente eficientes.**

[🌐 Demo](#instalación) · [📄 Documentación](#documentación) · [🐛 Reportar Bug](https://github.com/fardatxo/ProyectoPiieGrupo3/issues)

</div>

---

## 📖 Sobre el Proyecto

**SerraInnova** es una solución integral diseñada para modernizar el mercado inmobiliario con un enfoque en la sostenibilidad. Nuestra plataforma permite la gestión, búsqueda y análisis de propiedades basándose en su eficiencia energética, huella de carbono y características ecológicas.

### 💡 Misión

Promover un futuro más verde facilitando el acceso a viviendas sostenibles y educando sobre la eficiencia energética.

---

## 🏗️ Arquitectura del Sistema

El sistema sigue una arquitectura moderna SPA (Single Page Application) separando el backend y el frontend para máxima escalabilidad y rendimiento.

```mermaid
graph TD
    User([👤 Usuario]) -->|Navegador Web| FE[💻 Frontend (Vue.js + Vite)]

    subgraph "Cliente"
        FE -->|Estado Global| Pinia[🍍 Pinia Store]
        FE -->|Enrutamiento| Router[Vue Router]
    end

    FE -->|HTTP/JSON| API[🔙 Backend API (Laravel 12)]

    subgraph "Servidor"
        API -->|Autenticación| Sanctum[🔐 Laravel Sanctum]
        API -->|ORM| Eloquent[🗃️ Eloquent ORM]
        Eloquent -->|Consultas SQL| DB[(🛢️ MySQL / SQLite)]
    end
```

---

## ✨ Características Principales

### 🏡 Gestión de Propiedades

- **Filtrado Avanzado**: Búsqueda por certificación energética (A-G), tipo de energía renovable, y ubicación.
- **Detalles Técnicos**: Visualización clara de características como paneles solares, aislamiento y sistemas de recuperación de agua.

### 📊 Herramientas de Sostenibilidad

- **Calculadora CO2**: Algoritmo propio para estimar la huella de carbono de una vivienda.
- **Comparativas**: Análisis de ahorro energético frente a viviendas tradicionales.

### 📰 Blog Educativo

- **Gestión de Contenidos**: Sistema CMS integrado para publicar artículos sobre eficiencia y sostenibilidad.

### ⚙️ Administración

- **Dashboard**: Panel de control completo para administradores.
- **Gestión de Usuarios**: Roles y permisos para diferentes tipos de usuarios.

---

## 🛠️ Stack Tecnológico

| Capa              | Tecnología         | Descripción                                                |
| :---------------- | :----------------- | :--------------------------------------------------------- |
| **Backend**       | **Laravel 12**     | Framework PHP robusto para la API RESTful.                 |
| **Frontend**      | **Vue.js 3**       | Framework reactivo para una experiencia de usuario fluida. |
| **Estilos**       | **Tailwind CSS 4** | Diseño utility-first moderno y responsivo.                 |
| **Build Tool**    | **Vite 7**         | Empaquetado ultrarrápido y Hot Module Replacement (HMR).   |
| **Base de Datos** | **MySQL / SQLite** | Almacenamiento de datos relacional optimizado.             |

---

## 🚀 Instalación y Despliegue

Sigue estos pasos para configurar el proyecto en tu entorno local.

### Requisitos Previos

- **PHP**: 8.2 o superior
- **Composer**: 2.x
- **Node.js**: 18+ y npm

### Pasos

1.  **Clonar el repositorio**

    ```bash
    git clone https://github.com/fardatxo/ProyectoPiieGrupo3.git
    cd ProyectoPiieGrupo3
    ```

2.  **Instalar dependencias**

    ```bash
    # Instalar dependencias de Backend
    composer install

    # Instalar dependencias de Frontend
    npm install
    ```

3.  **Configuración de Entorno**

    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

    > **Nota:** Configura tus credenciales de base de datos en el archivo `.env` antes de continuar.

4.  **Base de Datos**

    ```bash
    # Ejecutar migraciones y seeders de prueba
    php artisan migrate --seed

    # Vincular almacenamiento público
    php artisan storage:link
    ```

5.  **Iniciar Servidores**

    Recomendamos usar dos terminales separadas:

    **Terminal 1 (Backend):**

    ```bash
    php artisan serve
    ```

    **Terminal 2 (Frontend):**

    ```bash
    npm run dev
    ```

🎉 **¡La aplicación estará disponible en `http://localhost:8000` (o el puerto que indique Vite)!**

---

## 📂 Estructura del Proyecto

```
SerraInnova/
├── app/               # Lógica de negocio y Controladores (API)
├── resources/
│   ├── js/            # Código fuente Vue.js
│   │   ├── components/  # Componentes reutilizables
│   │   ├── views/       # Páginas principales
│   │   └── stores/      # Estado global (Pinia)
│   └── css/           # Estilos Tailwind y configuración
├── routes/            # Definición de rutas (API y Web)
├── database/          # Migraciones, Factory y Seeders
└── public/            # Assets públicos (imágenes, etc.)
```

---

## 👥 Equipo de Desarrollo

| Desarrollador | Rol            | GitHub                                                     |
| :------------ | :------------- | :--------------------------------------------------------- |
| **Adri**      | Full Stack Dev | [@fardatxo](https://github.com/fardatxo)                   |
| **Gian**      | Full Stack Dev | [@GianCarlos25](https://github.com/GianCarlos25)           |
| **Alberto**   | Full Stack Dev | [@alarmi04](https://github.com/alarmi04)                   |
| **Ismael**    | Full Stack Dev | [@pequemaquina-ctrl](https://github.com/pequemaquina-ctrl) |
| **Alex**      | Full Stack Dev | [@AVL05](https://github.com/AVL05)                         |

---

## 📄 Licencia

Este proyecto está bajo la licencia **MIT**. Consulta el archivo `LICENSE` para más detalles.

<div align="center">
    <br>
    <sub>Desarrollado con por el <b>Grupo 3 PIIE</b> para un futuro más sostenible.</sub>
</div>
