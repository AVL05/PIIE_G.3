import { mockProperties } from "@/mocks/properties.js"; // Importamos mocks
import { defineStore } from "pinia";

export const usePropertiesStore = defineStore("properties", {
  state: () => ({
    properties: [],
    featured: [],
    currentProperty: null,
    filters: {
      energy_rating: "",
      energy_type: "",
      min_price: "",
      max_price: "",
      location: "",
      rooms: "",
      search: "",
    },
    pagination: {
      current_page: 1,
      last_page: 1,
      per_page: 12,
      total: 0,
    },
    loading: false,
    error: null,
  }),

  getters: {
    filteredProperties: (state) => state.properties,
    hasFilters: (state) => {
      return Object.values(state.filters).some((v) => v !== "");
    },
  },

  actions: {
    async fetchProperties(page = 1) {
      this.loading = true;
      this.error = null;
      try {
        // Simulamos llamada a API con un retardo
        await new Promise((resolve) => setTimeout(resolve, 500));

        // Filtramos los datos mock
        let results = mockProperties;

        if (this.filters.search) {
          const search = this.filters.search.toLowerCase();
          results = results.filter(
            (p) =>
              p.title.toLowerCase().includes(search) ||
              p.description.toLowerCase().includes(search),
          );
        }

        // Simulamos paginación
        this.properties = results;
        this.pagination = {
          current_page: page,
          last_page: 1,
          per_page: 12,
          total: results.length,
        };
      } catch (error) {
        this.error = "Error al cargar propiedades";
        console.error("Error fetching properties:", error);
      } finally {
        this.loading = false;
      }
    },

    async fetchFeatured() {
      this.loading = true;
      try {
        // Simulamos API
        await new Promise((resolve) => setTimeout(resolve, 300));

        // Devolvemos las 3 primeras como destacadas
        this.featured = mockProperties.slice(0, 3);
      } catch (error) {
        console.error("Error fetching featured properties:", error);
      } finally {
        this.loading = false;
      }
    },

    async fetchProperty(id) {
      this.loading = true;
      this.error = null;
      try {
        await new Promise((resolve) => setTimeout(resolve, 300));

        const prop = mockProperties.find((p) => p.id == id);
        if (prop) {
          this.currentProperty = prop;
        } else {
          throw new Error("Propiedad no encontrada");
        }
      } catch (error) {
        this.error = error.message || "Error al cargar la propiedad";
        console.error("Error fetching property:", error);
      } finally {
        this.loading = false;
      }
    },

    setFilter(key, value) {
      this.filters[key] = value;
    },

    clearFilters() {
      this.filters = {
        energy_rating: "",
        energy_type: "",
        min_price: "",
        max_price: "",
        location: "",
        rooms: "",
        search: "",
      };
    },

    // Las funciones de admin no las necesitamos simular activamente por ahora
    async createProperty(data) {
      console.log("Simulating create property", data);
    },
    async updateProperty(id, data) {
      console.log("Simulating update property", id, data);
    },
    async deleteProperty(id) {
      this.properties = this.properties.filter((p) => p.id !== id);
    },
  },
});
