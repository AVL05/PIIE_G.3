<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description');
            $table->decimal('price', 12, 2);
            $table->string('location');
            $table->string('address')->nullable();
            $table->integer('surface');
            $table->integer('rooms');
            $table->integer('bathrooms');
            $table->integer('year_built')->nullable();
            $table->enum('property_type', ['piso', 'casa', 'chalet', 'adosado', 'atico', 'duplex', 'estudio']);
            $table->enum('status', ['disponible', 'reservada', 'vendida'])->default('disponible');

            // Eficiencia energética
            $table->enum('energy_rating', ['A', 'B', 'C', 'D', 'E', 'F', 'G']);
            $table->integer('co2_emissions')->nullable()->comment('kg CO2/año');
            $table->integer('co2_savings')->nullable()->comment('kg CO2 ahorrados vs vivienda estándar');

            // Tipo de energía principal
            $table->enum('energy_type', ['aerotermia', 'solar', 'biomasa', 'geotermia', 'gas', 'electrica', 'mixta'])->nullable();

            // Características de sostenibilidad (JSON array)
            $table->json('sustainability_features')->nullable();

            // Certificaciones externas
            $table->json('certifications')->nullable();

            // Imágenes y documentos
            $table->json('images')->nullable();
            $table->string('energy_certificate_pdf')->nullable();

            // SEO y destacados
            $table->boolean('is_featured')->default(false);
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();

            $table->timestamps();
            $table->softDeletes();

            // Índices
            $table->index('energy_rating');
            $table->index('status');
            $table->index('is_featured');
            $table->index('price');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
