<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use Illuminate\Database\Seeder;

class BlogPostSeeder extends Seeder
{
    public function run(): void
    {
        $posts = [
            [
                'title' => 'Guía completa de las subvenciones Next Generation para rehabilitación energética',
                'slug' => 'guia-subvenciones-next-generation-rehabilitacion-energetica',
                'excerpt' => 'Todo lo que necesitas saber sobre los fondos europeos Next Generation para mejorar la eficiencia energética de tu vivienda. Requisitos, plazos y cómo solicitarlas.',
                'content' => '<h2>¿Qué son los fondos Next Generation?</h2>
<p>Los fondos Next Generation EU representan la mayor inyección económica de la historia de la Unión Europea, destinada a la recuperación económica y la transición ecológica. En España, una parte significativa de estos fondos se ha destinado a la rehabilitación energética de edificios.</p>

<h2>¿Quién puede solicitarlas?</h2>
<p>Pueden acceder a estas ayudas:</p>
<ul>
<li>Propietarios de viviendas unifamiliares</li>
<li>Comunidades de propietarios</li>
<li>Empresas de servicios energéticos (ESEs)</li>
<li>Administraciones públicas</li>
</ul>

<h2>Actuaciones subvencionables</h2>
<p>Las principales actuaciones que pueden recibir subvención son:</p>
<ul>
<li>Mejora de la envolvente térmica (fachadas, cubiertas, ventanas)</li>
<li>Instalación de sistemas de energías renovables</li>
<li>Sustitución de calderas por sistemas más eficientes</li>
<li>Instalación de sistemas de domótica para gestión energética</li>
</ul>

<h2>Cuantía de las ayudas</h2>
<p>Las subvenciones pueden cubrir entre el 40% y el 80% del coste de las actuaciones, dependiendo del ahorro energético conseguido y la vulnerabilidad económica de los beneficiarios.</p>',
                'image' => '/images/blog/next-generation.jpg',
                'category' => 'Subvenciones',
                'tags' => ['subvenciones', 'next generation', 'rehabilitación', 'eficiencia energética'],
                'is_published' => true,
                'published_at' => now()->subDays(5),
            ],
            [
                'title' => 'Aerotermia: La revolución en climatización sostenible',
                'slug' => 'aerotermia-revolucion-climatizacion-sostenible',
                'excerpt' => 'Descubre cómo funciona la aerotermia, sus ventajas frente a sistemas tradicionales y por qué es la mejor opción para una vivienda eficiente.',
                'content' => '<h2>¿Qué es la aerotermia?</h2>
<p>La aerotermia es una tecnología que aprovecha la energía contenida en el aire exterior para proporcionar calefacción, refrigeración y agua caliente sanitaria. Funciona mediante una bomba de calor que extrae energía del aire incluso a temperaturas bajo cero.</p>

<h2>Ventajas de la aerotermia</h2>
<ul>
<li><strong>Alta eficiencia:</strong> Por cada kWh eléctrico consumido, genera entre 3 y 5 kWh de energía térmica</li>
<li><strong>Bajo impacto ambiental:</strong> No produce emisiones directas de CO2</li>
<li><strong>Versatilidad:</strong> Proporciona calefacción, refrigeración y ACS con un solo equipo</li>
<li><strong>Ahorro económico:</strong> Reduce la factura energética hasta un 75%</li>
</ul>

<h2>¿Cuándo es recomendable?</h2>
<p>La aerotermia es especialmente recomendable en:</p>
<ul>
<li>Viviendas de nueva construcción</li>
<li>Reformas integrales</li>
<li>Zonas con clima templado</li>
<li>Combinación con suelo radiante</li>
</ul>',
                'image' => '/images/blog/aerotermia.jpg',
                'category' => 'Eficiencia Energética',
                'tags' => ['aerotermia', 'bomba de calor', 'climatización', 'ahorro energético'],
                'is_published' => true,
                'published_at' => now()->subDays(10),
            ],
            [
                'title' => '10 consejos para reducir tu factura de luz en invierno',
                'slug' => '10-consejos-reducir-factura-luz-invierno',
                'excerpt' => 'Pequeños cambios de hábitos y mejoras sencillas que pueden suponer un gran ahorro en tu consumo eléctrico durante los meses fríos.',
                'content' => '<h2>1. Aprovecha la luz natural</h2>
<p>Mantén las persianas abiertas durante el día para aprovechar el calor del sol y la luz natural.</p>

<h2>2. Ajusta la temperatura del termostato</h2>
<p>Cada grado que subimos aumenta el consumo un 7%. La temperatura ideal es 19-21°C durante el día y 15-17°C por la noche.</p>

<h2>3. Sella las infiltraciones de aire</h2>
<p>Revisa ventanas y puertas, y utiliza burletes para evitar corrientes de aire frío.</p>

<h2>4. Utiliza cortinas térmicas</h2>
<p>Las cortinas gruesas actúan como aislante adicional en las ventanas.</p>

<h2>5. Programa la calefacción</h2>
<p>Utiliza termostatos programables para que la calefacción solo funcione cuando la necesites.</p>

<h2>6. Mantén los radiadores libres</h2>
<p>No coloques muebles ni cortinas delante de los radiadores.</p>

<h2>7. Purga los radiadores</h2>
<p>Elimina el aire acumulado para que funcionen de forma óptima.</p>

<h2>8. Utiliza electrodomésticos eficientes</h2>
<p>Los electrodomésticos con etiqueta A consumen hasta un 50% menos.</p>

<h2>9. LED en toda la casa</h2>
<p>Sustituye todas las bombillas por LED, que consumen un 80% menos.</p>

<h2>10. Apaga los aparatos en stand-by</h2>
<p>El consumo fantasma puede suponer hasta un 10% de tu factura.</p>',
                'image' => '/images/blog/ahorro-invierno.jpg',
                'category' => 'Consejos de Ahorro',
                'tags' => ['ahorro', 'factura luz', 'invierno', 'consejos'],
                'is_published' => true,
                'published_at' => now()->subDays(3),
            ],
            [
                'title' => 'El certificado energético: Todo lo que debes saber',
                'slug' => 'certificado-energetico-todo-lo-que-debes-saber',
                'excerpt' => 'Qué es, cuándo es obligatorio, cómo obtenerlo y qué significan las diferentes calificaciones del certificado de eficiencia energética.',
                'content' => '<h2>¿Qué es el certificado energético?</h2>
<p>El certificado de eficiencia energética es un documento oficial que indica el nivel de eficiencia energética de un inmueble. Clasifica los edificios desde la A (más eficiente) hasta la G (menos eficiente).</p>

<h2>¿Cuándo es obligatorio?</h2>
<p>Es obligatorio disponer del certificado energético para:</p>
<ul>
<li>Vender una vivienda</li>
<li>Alquilar una vivienda</li>
<li>Anunciar un inmueble en venta o alquiler</li>
<li>Edificios de nueva construcción</li>
</ul>

<h2>¿Cómo se obtiene?</h2>
<p>Un técnico certificador (arquitecto, ingeniero o técnico competente) debe visitar el inmueble y realizar las mediciones necesarias. Posteriormente, registra el certificado en el organismo competente de cada comunidad autónoma.</p>

<h2>¿Qué significa cada letra?</h2>
<ul>
<li><strong>A:</strong> Consumo inferior a 45 kWh/m² año</li>
<li><strong>B:</strong> Consumo entre 45 y 75 kWh/m² año</li>
<li><strong>C:</strong> Consumo entre 75 y 100 kWh/m² año</li>
<li><strong>D:</strong> Consumo entre 100 y 150 kWh/m² año</li>
<li><strong>E:</strong> Consumo entre 150 y 230 kWh/m² año</li>
<li><strong>F:</strong> Consumo entre 230 y 300 kWh/m² año</li>
<li><strong>G:</strong> Consumo superior a 300 kWh/m² año</li>
</ul>',
                'image' => '/images/blog/certificado-energetico.jpg',
                'category' => 'Normativa',
                'tags' => ['certificado energético', 'normativa', 'eficiencia'],
                'is_published' => true,
                'published_at' => now()->subDays(15),
            ],
            [
                'title' => 'ODS 11: Ciudades y comunidades sostenibles',
                'slug' => 'ods-11-ciudades-comunidades-sostenibles',
                'excerpt' => 'Cómo el sector inmobiliario puede contribuir al Objetivo de Desarrollo Sostenible 11 y crear ciudades más habitables y respetuosas con el medio ambiente.',
                'content' => '<h2>¿Qué es el ODS 11?</h2>
<p>El Objetivo de Desarrollo Sostenible 11 busca lograr que las ciudades y los asentamientos humanos sean inclusivos, seguros, resilientes y sostenibles. Es uno de los 17 ODS adoptados por las Naciones Unidas en 2015.</p>

<h2>El papel del sector inmobiliario</h2>
<p>El sector de la construcción y el inmobiliario tienen un papel fundamental en la consecución de este objetivo:</p>
<ul>
<li>Reducción del consumo energético de los edificios</li>
<li>Uso de materiales sostenibles</li>
<li>Diseño de espacios que fomenten la comunidad</li>
<li>Integración de zonas verdes</li>
</ul>

<h2>Metas específicas</h2>
<p>Entre las metas del ODS 11 relacionadas con la vivienda encontramos:</p>
<ul>
<li>Acceso a viviendas adecuadas, seguras y asequibles</li>
<li>Reducción del impacto ambiental de las ciudades</li>
<li>Espacios verdes y públicos seguros e inclusivos</li>
<li>Planificación urbana participativa e integrada</li>
</ul>',
                'image' => '/images/blog/ods-11.jpg',
                'category' => 'Agenda 2030',
                'tags' => ['ODS', 'sostenibilidad', 'ciudades', 'agenda 2030'],
                'is_published' => true,
                'published_at' => now()->subDays(20),
            ],
            [
                'title' => 'Domótica verde: Tecnología al servicio del ahorro energético',
                'slug' => 'domotica-verde-tecnologia-ahorro-energetico',
                'excerpt' => 'Sistemas de automatización del hogar que te ayudarán a reducir el consumo energético de forma inteligente y sin sacrificar el confort.',
                'content' => '<h2>¿Qué es la domótica verde?</h2>
<p>La domótica verde es la aplicación de sistemas de automatización del hogar con el objetivo principal de mejorar la eficiencia energética y reducir el impacto ambiental de la vivienda.</p>

<h2>Principales aplicaciones</h2>
<h3>Control de iluminación</h3>
<p>Sensores de presencia, programación horaria y regulación automática según la luz natural.</p>

<h3>Gestión de climatización</h3>
<p>Termostatos inteligentes que aprenden tus rutinas y optimizan el consumo.</p>

<h3>Control de persianas</h3>
<p>Apertura y cierre automático según la posición del sol para aprovechar la energía solar pasiva.</p>

<h3>Gestión de electrodomésticos</h3>
<p>Programación para funcionar en horas de tarifa reducida.</p>

<h2>Ahorro estimado</h2>
<p>Un sistema de domótica bien configurado puede suponer un ahorro de entre el 25% y el 40% en la factura energética.</p>',
                'image' => '/images/blog/domotica-verde.jpg',
                'category' => 'Domótica Verde',
                'tags' => ['domótica', 'smart home', 'ahorro', 'tecnología'],
                'is_published' => true,
                'published_at' => now()->subDays(8),
            ],
            [
                'title' => 'Passivhaus: El estándar de construcción más exigente',
                'slug' => 'passivhaus-estandar-construccion-mas-exigente',
                'excerpt' => 'Conoce el estándar Passivhaus, sus principios fundamentales y por qué representa el futuro de la construcción sostenible.',
                'content' => '<h2>¿Qué es Passivhaus?</h2>
<p>Passivhaus es un estándar de construcción que permite conseguir un gran confort interior con un consumo energético muy bajo. Nació en Alemania en 1988 y se ha convertido en referencia mundial.</p>

<h2>Los 5 principios básicos</h2>
<ul>
<li><strong>Aislamiento térmico:</strong> Envolvente de alta calidad sin puentes térmicos</li>
<li><strong>Ventanas de altas prestaciones:</strong> Triple acristalamiento con marcos aislantes</li>
<li><strong>Hermeticidad:</strong> Control total de las infiltraciones de aire</li>
<li><strong>Ventilación mecánica:</strong> Con recuperador de calor de alta eficiencia</li>
<li><strong>Ausencia de puentes térmicos:</strong> Diseño cuidadoso de todos los encuentros</li>
</ul>

<h2>Beneficios</h2>
<p>Una vivienda Passivhaus consume hasta un 90% menos de energía que una convencional, manteniendo una temperatura estable todo el año.</p>',
                'image' => '/images/blog/passivhaus.jpg',
                'category' => 'Eficiencia Energética',
                'tags' => ['passivhaus', 'construcción sostenible', 'eficiencia', 'certificación'],
                'is_published' => true,
                'published_at' => now()->subDays(12),
            ],
            [
                'title' => 'Paneles solares fotovoltaicos: Guía de instalación para tu hogar',
                'slug' => 'paneles-solares-fotovoltaicos-guia-instalacion-hogar',
                'excerpt' => 'Todo lo que necesitas saber antes de instalar paneles solares en tu vivienda: tipos, costes, permisos y rentabilidad.',
                'content' => '<h2>¿Por qué instalar paneles solares?</h2>
<p>La energía solar fotovoltaica permite generar tu propia electricidad, reducir la factura de luz y contribuir a la transición energética.</p>

<h2>Tipos de instalaciones</h2>
<ul>
<li><strong>Autoconsumo sin excedentes:</strong> Consumes toda la energía que produces</li>
<li><strong>Autoconsumo con excedentes:</strong> Viertes a la red lo que no consumes</li>
<li><strong>Autoconsumo con baterías:</strong> Almacenas el excedente para usarlo después</li>
</ul>

<h2>¿Cuántos paneles necesito?</h2>
<p>Una vivienda media necesita entre 6 y 10 paneles (2-4 kWp) para cubrir el 50-70% de su consumo.</p>

<h2>Rentabilidad</h2>
<p>Con los precios actuales, una instalación se amortiza en 5-7 años y tiene una vida útil de más de 25 años.</p>',
                'image' => '/images/blog/paneles-solares.jpg',
                'category' => 'Energías Renovables',
                'tags' => ['paneles solares', 'fotovoltaica', 'autoconsumo', 'energía renovable'],
                'is_published' => true,
                'published_at' => now()->subDays(7),
            ],
            [
                'title' => 'Materiales de construcción ecológicos: Alternativas sostenibles',
                'slug' => 'materiales-construccion-ecologicos-alternativas-sostenibles',
                'excerpt' => 'Descubre los materiales de construcción más respetuosos con el medio ambiente y sus aplicaciones en la edificación moderna.',
                'content' => '<h2>¿Qué son los materiales ecológicos?</h2>
<p>Son aquellos que tienen un bajo impacto ambiental en su extracción, fabricación, transporte, uso y reciclaje. Priorizan recursos renovables y procesos eficientes.</p>

<h2>Principales materiales</h2>
<h3>Madera certificada</h3>
<p>Procedente de bosques gestionados de forma sostenible (FSC o PEFC).</p>

<h3>Corcho</h3>
<p>Excelente aislante natural, renovable y reciclable.</p>

<h3>Celulosa</h3>
<p>Aislamiento fabricado a partir de papel reciclado.</p>

<h3>Adobe y tierra comprimida</h3>
<p>Materiales tradicionales con excelentes propiedades térmicas.</p>

<h3>Bambú</h3>
<p>Crece muy rápido y tiene gran resistencia estructural.</p>

<h2>Beneficios</h2>
<p>Los materiales ecológicos mejoran la calidad del aire interior, regulan la humedad y reducen la huella de carbono del edificio.</p>',
                'image' => '/images/blog/materiales-ecologicos.jpg',
                'category' => 'Construcción Sostenible',
                'tags' => ['materiales ecológicos', 'construcción', 'sostenibilidad', 'madera'],
                'is_published' => true,
                'published_at' => now()->subDays(18),
            ],
        ];

        foreach ($posts as $post) {
            BlogPost::create($post);
        }
    }
}
