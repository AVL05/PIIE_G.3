import { defineStore } from 'pinia';
import axios from 'axios';

export const usePropertiesStore = defineStore('properties', {
    state: () => ({
        properties: [],
        featured: [],
        currentProperty: null,
        filters: {
            energy_rating: '',
            energy_type: '',
            min_price: '',
            max_price: '',
            location: '',
            rooms: '',
            search: ''
        },
        pagination: {
            current_page: 1,
            last_page: 1,
            per_page: 12,
            total: 0
        },
        loading: false,
        error: null
    }),

    getters: {
        filteredProperties: (state) => state.properties,
        hasFilters: (state) => {
            return Object.values(state.filters).some(v => v !== '');
        }
    },

    actions: {
        async fetchProperties(page = 1) {
            this.loading = true;
            this.error = null;
            try {
                const params = {
                    page,
                    ...this.filters
                };
                const response = await axios.get('/api/properties', { params });
                this.properties = response.data.data;
                this.pagination = {
                    current_page: response.data.current_page,
                    last_page: response.data.last_page,
                    per_page: response.data.per_page,
                    total: response.data.total
                };
            } catch (error) {
                this.error = error.response?.data?.message || 'Error al cargar propiedades';
                console.error('Error fetching properties:', error);
            } finally {
                this.loading = false;
            }
        },

        async fetchFeatured() {
            this.loading = true;
            try {
                const response = await axios.get('/api/properties/featured');
                this.featured = response.data;
            } catch (error) {
                console.error('Error fetching featured properties:', error);
            } finally {
                this.loading = false;
            }
        },

        async fetchProperty(id) {
            this.loading = true;
            this.error = null;
            try {
                const response = await axios.get(`/api/properties/${id}`);
                this.currentProperty = response.data;
            } catch (error) {
                this.error = error.response?.data?.message || 'Error al cargar la propiedad';
                console.error('Error fetching property:', error);
            } finally {
                this.loading = false;
            }
        },

        setFilter(key, value) {
            this.filters[key] = value;
        },

        clearFilters() {
            this.filters = {
                energy_rating: '',
                energy_type: '',
                min_price: '',
                max_price: '',
                location: '',
                rooms: '',
                search: ''
            };
        },

        async createProperty(data) {
            const response = await axios.post('/api/admin/properties', data, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            });
            return response.data;
        },

        async updateProperty(id, data) {
            const response = await axios.post(`/api/admin/properties/${id}`, data, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            });
            return response.data;
        },

        async deleteProperty(id) {
            await axios.delete(`/api/admin/properties/${id}`);
            this.properties = this.properties.filter(p => p.id !== id);
        }
    }
});
