import { mockPosts } from "@/mocks/blog.js"; // Importamos mocks de blog
import { defineStore } from "pinia";

export const useBlogStore = defineStore("blog", {
  state: () => ({
    posts: [],
    latest: [],
    currentPost: null,
    categories: [],
    pagination: {
      current_page: 1,
      last_page: 1,
      per_page: 9,
      total: 0,
    },
    loading: false,
    error: null,
  }),

  actions: {
    async fetchPosts(page = 1, category = "") {
      this.loading = true;
      this.error = null;
      try {
        // Simulamos llamada a API
        await new Promise((resolve) => setTimeout(resolve, 500));

        let results = mockPosts;
        if (category) {
          results = results.filter((p) => p.category === category);
        }

        // Simulamos paginación
        this.posts = results;
        this.pagination = {
          current_page: page,
          last_page: 1,
          per_page: 9,
          total: results.length,
        };
      } catch (error) {
        this.error = "Error al cargar artículos";
        console.error("Error fetching posts:", error);
      } finally {
        this.loading = false;
      }
    },

    async fetchLatest() {
      try {
        await new Promise((resolve) => setTimeout(resolve, 300));
        // Devolvemos los 3 primeros
        this.latest = mockPosts.slice(0, 3);
      } catch (error) {
        console.error("Error fetching latest posts:", error);
      }
    },

    async fetchPost(slug) {
      this.loading = true;
      this.error = null;
      try {
        await new Promise((resolve) => setTimeout(resolve, 300));

        const post = mockPosts.find((p) => p.slug === slug);
        if (post) {
          this.currentPost = post;
        } else {
          throw new Error("Artículo no encontrado");
        }
      } catch (error) {
        this.error = error.message || "Error al cargar el artículo";
        console.error("Error fetching post:", error);
      } finally {
        this.loading = false;
      }
    },

    async fetchCategories() {
      try {
        await new Promise((resolve) => setTimeout(resolve, 200));
        // Extraemos categorías únicas
        this.categories = [...new Set(mockPosts.map((p) => p.category))];
      } catch (error) {
        console.error("Error fetching categories:", error);
      }
    },

    // Mocks para funciones de admin
    async createPost(data) {
      console.log("Simulating create post", data);
    },
    async updatePost(id, data) {
      console.log("Simulating update post", id, data);
    },
    async deletePost(id) {
      this.posts = this.posts.filter((p) => p.id !== id);
    },
  },
});
