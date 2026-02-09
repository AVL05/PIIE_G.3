# PIE - Proyecto Integrado Empresarial

Aplicación web frontend desarrollada con Vue.js 3, Vite, Pinia y Vue Router.

## 🚀 Tecnologías

- **Vue.js 3** - Framework progresivo de JavaScript
- **Vite** - Build tool y dev server ultrarrápido
- **Pinia** - State management oficial de Vue
- **Vue Router** - Enrutamiento oficial de Vue
- **Tailwind CSS 4** - Framework de CSS utility-first
- **Heroicons** - Iconos SVG de calidad

## 📦 Instalación

```bash
npm install
```

## 🛠️ Desarrollo

```bash
npm run dev
```

El servidor de desarrollo se iniciará en `http://localhost:5173`

## 🏗️ Build para producción

```bash
npm run build
```

Los archivos optimizados se generarán en la carpeta `dist/`

## 📁 Estructura del proyecto

```
PIE/
├── public/          # Archivos estáticos
│   └── images/      # Imágenes
├── src/             # Código fuente
│   ├── components/  # Componentes Vue reutilizables
│   ├── stores/      # Stores de Pinia
│   ├── views/       # Vistas/páginas de la aplicación
│   ├── App.vue      # Componente raíz
│   ├── app.js       # Punto de entrada de la aplicación
│   ├── app.css      # Estilos globales
│   └── router.js    # Configuración de rutas
├── index.html       # HTML principal
├── vite.config.js   # Configuración de Vite
└── package.json     # Dependencias y scripts
```
