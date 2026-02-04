<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PropertyController extends Controller
{
    public function index(Request $request)
    {
        $query = Property::available();

        // Filters
        if ($request->filled('energy_rating')) {
            $query->byEnergyRating($request->energy_rating);
        }

        if ($request->filled('energy_type')) {
            $query->byEnergyType($request->energy_type);
        }

        if ($request->filled('min_price') || $request->filled('max_price')) {
            $query->priceRange($request->min_price, $request->max_price);
        }

        if ($request->filled('rooms')) {
            $query->byRooms($request->rooms);
        }

        if ($request->filled('location')) {
            $query->where('location', 'like', '%' . $request->location . '%');
        }

        if ($request->filled('search')) {
            $query->search($request->search);
        }

        // Sort
        $sortField = $request->get('sort', 'created_at');
        $sortDirection = $request->get('direction', 'desc');
        $query->orderBy($sortField, $sortDirection);

        return $query->paginate(12);
    }

    public function featured()
    {
        return Property::available()
            ->featured()
            ->orderBy('created_at', 'desc')
            ->limit(6)
            ->get();
    }

    public function show($id)
    {
        $property = Property::findOrFail($id);
        return $property;
    }

    // Admin methods
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'location' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'surface' => 'required|integer|min:1',
            'rooms' => 'required|integer|min:0',
            'bathrooms' => 'required|integer|min:0',
            'year_built' => 'nullable|integer|min:1800|max:' . date('Y'),
            'property_type' => 'required|in:piso,casa,chalet,adosado,atico,duplex,estudio',
            'status' => 'required|in:disponible,reservada,vendida',
            'energy_rating' => 'required|in:A,B,C,D,E,F,G',
            'co2_emissions' => 'nullable|integer|min:0',
            'co2_savings' => 'nullable|integer|min:0',
            'energy_type' => 'nullable|in:aerotermia,solar,biomasa,geotermia,gas,electrica,mixta',
            'sustainability_features' => 'nullable|array',
            'certifications' => 'nullable|array',
            'is_featured' => 'boolean',
        ]);

        $validated['slug'] = Str::slug($validated['title']);

        // Handle images upload
        if ($request->hasFile('images')) {
            $images = [];
            foreach ($request->file('images') as $image) {
                $path = $image->store('properties', 'public');
                $images[] = '/storage/' . $path;
            }
            $validated['images'] = $images;
        }

        // Handle PDF upload
        if ($request->hasFile('energy_certificate_pdf')) {
            $path = $request->file('energy_certificate_pdf')->store('certificates', 'public');
            $validated['energy_certificate_pdf'] = '/storage/' . $path;
        }

        $property = Property::create($validated);

        return response()->json($property, 201);
    }

    public function update(Request $request, $id)
    {
        $property = Property::findOrFail($id);

        $validated = $request->validate([
            'title' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'price' => 'sometimes|numeric|min:0',
            'location' => 'sometimes|string|max:255',
            'address' => 'nullable|string|max:255',
            'surface' => 'sometimes|integer|min:1',
            'rooms' => 'sometimes|integer|min:0',
            'bathrooms' => 'sometimes|integer|min:0',
            'year_built' => 'nullable|integer|min:1800|max:' . date('Y'),
            'property_type' => 'sometimes|in:piso,casa,chalet,adosado,atico,duplex,estudio',
            'status' => 'sometimes|in:disponible,reservada,vendida',
            'energy_rating' => 'sometimes|in:A,B,C,D,E,F,G',
            'co2_emissions' => 'nullable|integer|min:0',
            'co2_savings' => 'nullable|integer|min:0',
            'energy_type' => 'nullable|in:aerotermia,solar,biomasa,geotermia,gas,electrica,mixta',
            'sustainability_features' => 'nullable|array',
            'certifications' => 'nullable|array',
            'is_featured' => 'boolean',
        ]);

        if (isset($validated['title'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        // Handle new images
        if ($request->hasFile('images')) {
            $images = $property->images ?? [];
            foreach ($request->file('images') as $image) {
                $path = $image->store('properties', 'public');
                $images[] = '/storage/' . $path;
            }
            $validated['images'] = $images;
        }

        // Handle PDF upload
        if ($request->hasFile('energy_certificate_pdf')) {
            $path = $request->file('energy_certificate_pdf')->store('certificates', 'public');
            $validated['energy_certificate_pdf'] = '/storage/' . $path;
        }

        $property->update($validated);

        return $property;
    }

    public function destroy($id)
    {
        $property = Property::findOrFail($id);
        $property->delete();

        return response()->json(['message' => 'Property deleted successfully']);
    }
}
