import { createRouter, createWebHistory } from "vue-router";

// Views públicas
import AboutView from "./views/AboutView.vue";
import BlogPostView from "./views/BlogPostView.vue";
import BlogView from "./views/BlogView.vue";
import CalculatorView from "./views/CalculatorView.vue";
import ContactView from "./views/ContactView.vue";
import HomeView from "./views/HomeView.vue";
import PropertiesView from "./views/PropertiesView.vue";
import PropertyDetailView from "./views/PropertyDetailView.vue";
import ServicesView from "./views/ServicesView.vue";

// Views de administración (DESHABILITADAS - requieren backend)
// import AdminLayout from './views/admin/AdminLayout.vue';
// import AdminDashboard from './views/admin/AdminDashboard.vue';
// import AdminProperties from './views/admin/AdminProperties.vue';
// import AdminPropertyForm from './views/admin/AdminPropertyForm.vue';
// import AdminBlog from './views/admin/AdminBlog.vue';
// import AdminBlogForm from './views/admin/AdminBlogForm.vue';

const routes = [
  // Rutas públicas
  {
    path: "/",
    name: "home",
    component: HomeView,
  },
  {
    path: "/propiedades",
    name: "properties",
    component: PropertiesView,
  },
  {
    path: "/propiedades/:id",
    name: "property-detail",
    component: PropertyDetailView,
  },
  {
    path: "/servicios",
    name: "services",
    component: ServicesView,
  },
  {
    path: "/blog",
    name: "blog",
    component: BlogView,
  },
  {
    path: "/blog/:slug",
    name: "blog-post",
    component: BlogPostView,
  },
  {
    path: "/calculadora",
    name: "calculator",
    component: CalculatorView,
  },
  {
    path: "/quienes-somos",
    name: "about",
    component: AboutView,
  },
  {
    path: "/contacto",
    name: "contact",
    component: ContactView,
  },

  // Rutas de administración (DESHABILITADAS - requieren backend)
  // {
  //     path: '/admin',
  //     component: AdminLayout,
  //     children: [
  //         {
  //             path: '',
  //             name: 'admin-dashboard',
  //             component: AdminDashboard
  //         },
  //         {
  //             path: 'propiedades',
  //             name: 'admin-properties',
  //             component: AdminProperties
  //         },
  //         {
  //             path: 'propiedades/crear',
  //             name: 'admin-property-create',
  //             component: AdminPropertyForm
  //         },
  //         {
  //             path: 'propiedades/:id/editar',
  //             name: 'admin-property-edit',
  //             component: AdminPropertyForm
  //         },
  //         {
  //             path: 'blog',
  //             name: 'admin-blog',
  //             component: AdminBlog
  //         },
  //         {
  //             path: 'blog/crear',
  //             name: 'admin-blog-create',
  //             component: AdminBlogForm
  //         },
  //         {
  //             path: 'blog/:id/editar',
  //             name: 'admin-blog-edit',
  //             component: AdminBlogForm
  //         }
  //     ]
  // }
];

const router = createRouter({
  history: createWebHistory(),
  routes,
  scrollBehavior(to, from, savedPosition) {
    if (savedPosition) {
      return savedPosition;
    }
    return { top: 0 };
  },
});

export default router;
