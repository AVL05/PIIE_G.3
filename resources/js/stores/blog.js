import { defineStore } from 'pinia';
import axios from 'axios';

export const useBlogStore = defineStore('blog', {
    state: () => ({
        posts: [],
        latest: [],
        currentPost: null,
        categories: [],
        pagination: {
            current_page: 1,
            last_page: 1,
            per_page: 9,
            total: 0
        },
        loading: false,
        error: null
    }),

    actions: {
        async fetchPosts(page = 1, category = '') {
            this.loading = true;
            this.error = null;
            try {
                const params = { page };
                if (category) params.category = category;

                const response = await axios.get('/api/blog', { params });
                this.posts = response.data.data;
                this.pagination = {
                    current_page: response.data.current_page,
                    last_page: response.data.last_page,
                    per_page: response.data.per_page,
                    total: response.data.total
                };
            } catch (error) {
                this.error = error.response?.data?.message || 'Error al cargar artículos';
                console.error('Error fetching posts:', error);
            } finally {
                this.loading = false;
            }
        },

        async fetchLatest() {
            try {
                const response = await axios.get('/api/blog/latest');
                this.latest = response.data;
            } catch (error) {
                console.error('Error fetching latest posts:', error);
            }
        },

        async fetchPost(slug) {
            this.loading = true;
            this.error = null;
            try {
                const response = await axios.get(`/api/blog/${slug}`);
                this.currentPost = response.data;
            } catch (error) {
                this.error = error.response?.data?.message || 'Error al cargar el artículo';
                console.error('Error fetching post:', error);
            } finally {
                this.loading = false;
            }
        },

        async fetchCategories() {
            try {
                const response = await axios.get('/api/blog/categories');
                this.categories = response.data;
            } catch (error) {
                console.error('Error fetching categories:', error);
            }
        },

        async createPost(data) {
            const response = await axios.post('/api/admin/blog', data, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            });
            return response.data;
        },

        async updatePost(id, data) {
            const response = await axios.post(`/api/admin/blog/${id}`, data, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            });
            return response.data;
        },

        async deletePost(id) {
            await axios.delete(`/api/admin/blog/${id}`);
            this.posts = this.posts.filter(p => p.id !== id);
        }
    }
});
