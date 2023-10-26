<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Restaurant;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Restaurant::create([ # 1
            'name' => "Central Restaurante",
            'photo' => "https://starwinelist.com/storage/images/venue/763/1960x1082/bqrFFlzCuFY3BonzB3LFxoPNXrOW8ULRSHhz3iF4.jpeg",
            'street' => "Av. Pedro de Osma 301",
            "web" => "https://centralrestaurante.com.pe",
            "cuisine" => "Peruan",
            "tables_number" => 4,
            "telephone" => "+51 12428515",
            "city" => "Lima",
            "country" => "Peru",
            "opening_hour" => "13:00",
            "closing_hour" => "16:00",
            "user_id" => 1,
        ]);

        Restaurant::create([ # 2
            'name' => "Disfrutar",
            'photo' => "https://www.guiarepsol.com/content/dam/repsol-guia/guia-cf/restaurante/imagenes/media-filer_public-b3-3c-b33c6d46-36a5-4073-b63b-6d0e8a62d7a1-tmptmpufe611om4ace2d0b08994a019516e690ae3f599a.jpeg",
            'street' => "C. de Villarroel, 163",
            "web" => "https://www.disfrutarbarcelona.com/",
            "cuisine" => "Mediterranean",
            "tables_number" => 6,
            "telephone" => "+34 933486896",
            "city" => "Barcelona",
            "country" => "Spain",
            "opening_hour" => "10:00",
            "closing_hour" => "14:00",
            "user_id" => 1,
        ]);

        Restaurant::create([ # 3
            'name' => "DiverXO",
            'photo' => "https://imagenes.elpais.com/resizer/BUyxskiXDW89GZcwg4bJlkn1CDA=/1960x1470/cloudfront-eu-central-1.images.arcpublishing.com/prisa/5FHQMXG36JOOBE34BCYVKDRR2Q.jpg",
            'street' => "NH Eurobuilding, C. del Padre Damián, 23",
            "web" => "https://www.disfrutarbarcelona.com/",
            "cuisine" => "Vanguardia",
            "tables_number" => 3,
            "telephone" => "+34 915700766",
            "city" => "Madrid",
            "country" => "Spain",
            "opening_hour" => "17:00",
            "closing_hour" => "20:00",
            "user_id" => 1,
        ]);

        Restaurant::create([ # 4
            'name' => "Asador Etxebarri",
            'photo' => "https://elblogdeceleste.com/wp-content/webp-express/webp-images/uploads/2020/09/ASADOR-ETXEBARRI-sala.jpg.webp",
            'street' => "San Juan Plaza, 1",        
            "web" => "https://www.asadoretxebarri.com/",
            "cuisine" => "Asador",
            "tables_number" => 8,
            "telephone" => "+34 639201242",
            "city" => "Bizkaia",
            "country" => "Spain",
            "opening_hour" => "14:00",
            "closing_hour" => "17:00",
            "user_id" => 1,
        ]);

        Restaurant::create([ # 5
        'name' => "Alchemist",
        'photo' => "https://www.lavanguardia.com/uploads/2020/03/17/5e99804c45e3d.png",
        'street' => "Refshalevej 173C",        
        "web" => "https://alchemist.dk/",
        "cuisine" => "Holistic",
        "tables_number" => 7,
        "telephone" => "+45 31716161",
        "city" => "Copenhagen",
        "country" => "Denmark",
        "opening_hour" => "21:00",
        "closing_hour" => "01:00",
        "user_id" => 1,
        ]);

        Restaurant::create([ # 6
        'name' => "Maido",
        'photo' => "https://www.theworlds50best.com/filestore/jpg/W50BR22-Maido-Interior.jpg",
        'street' => "Ca. San Martín No. 399",        
        "web" => "https://www.maido.pe/",
        "cuisine" => "Japanese",
        "tables_number" => 5,
        "telephone" => "+51 13135100",
        "city" => "Lima",
        "country" => "Peru",
        "opening_hour" => "12:00",
        "closing_hour" => "16:00",
        "user_id" => 1,
    ]);
        Restaurant::create([ # 7
        'name' => "Lido 84",
        'photo' => "https://lovelakegarda.net/wp-content/uploads/2012/01/Lido-84-3.jpg",
        'street' => "Corso Giuseppe Zanardelli, 196",        
        "web" => "https://www.ristorantelido84.com/",
        "cuisine" => "Italian",
        "tables_number" => 9,
        "telephone" => "+39 036520019",
        "city" => "Milan",
        "country" => "Italy",
        "opening_hour" => "18:00",
        "closing_hour" => "22:00",
        "user_id" => 1,
    ]);
        Restaurant::create([ # 8
        'name' => "AtomiX",
        'photo' => "https://www.madridfusion.net/media/a4670c60-3577-4abc-b7dc-6bb9620625ad_Carlos%20Manzano%20-%20Cobo%20Evoluci%C3%B3n%20-%20Espacio%20(3)600.jpg",
        'street' => "104 E 30th St",        
        "web" => "https://www.atomixnyc.com/",
        "cuisine" => "Japanese",
        "tables_number" => 3,
        "telephone" => "743-6959",
        "city" => "New York",
        "country" => "United States",
        "opening_hour" => "13:00",
        "closing_hour" => "17:00",
        "user_id" => 1,
    ]);
        Restaurant::create([ # 9
        'name' => "Quintonil",
        'photo' => "https://www.theworlds50best.com/filestore/jpg/W50BR2021-150-Quintonil-3.jpg",
        'street' => "Av. Isaac Newton, 55",        
        "web" => "https://quintonil.com/",
        "cuisine" => "Mexican",
        "tables_number" => 6,
        "telephone" => "+52 5552802680",
        "city" => "Mexico City",
        "country" => "Mexico",
        "opening_hour" => "12:00",
        "closing_hour" => "18:00",
        "user_id" => 1,
    ]);
        Restaurant::create([ # 10
        'name' => "Table Bruno Verjus",
        'photo' => "https://www.7canibales.com/wp-content/uploads/sites/2/2023/06/Com_Nem_RestauTable_BD20130506-0022.jpg",
        'street' => "3 R. de Prague",
        "web" => "https://table.paris/",
        "cuisine" => "French",
        "tables_number" => 12,
        "telephone" => "+33 33145634315",
        "city" => "Paris",
        "country" => "France",
        "opening_hour" => "12:00",
        "closing_hour" => "14:00",
        "user_id" => 1,
    ]);
        Restaurant::create([ # 11
        'name' => "Trèsind Studio",
        'photo' => "https://whatson.ae/wp-content/uploads/2021/02/Tresind-Studio-5.jpg",
        'street' => "St. Regis Gardens - The Palm Jumeirah",
        "web" => "https://tresindstudio.com/",
        "cuisine" => "Indian",
        "tables_number" => 6,
        "telephone" => "+971 588951272",
        "city" => "Dubai",
        "country" => "United Arab Emirates",
        "opening_hour" => "20:00",
        "closing_hour" => "23:00",
        "user_id" => 1,
    ]);
        Restaurant::create([ # 12
        'name' => "A casa do Porco",
        'photo' => "https://www.joseanalija.com/wp-content/uploads/2019/08/Ambientes-Mauro-Holanda-14-Large-435x290.jpg",
        'street' => "R. Araújo, 124",
        "web" => "https://acasadoporco.com.br/",
        "cuisine" => "Sandwichs",
        "tables_number" => 7,
        "telephone" => "+55 1132582578",
        "city" => "São Paulo",
        "country" => "Brazil",
        "opening_hour" => "16:00",
        "closing_hour" => "22:00",
        "user_id" => 1,
    ]);
        Restaurant::create([ # 13
        'name' => "Pujol",
        'photo' => "https://images.adsttc.com/media/images/5af0/8559/f197/cce6/1700/0032/newsletter/20170305_JSA_05_0254.jpg",
        'street' => "Tennyson 133, Polanco, Polanco IV Secc, Miguel Hidalgo",
        "web" => "https://pujol.com.mx/",
        "cuisine" => "Mexican",
        "tables_number" => 6,
        "telephone" => "+52 5555454111",
        "city" => "Mexico City",
        "country" => "Mexico",
        "opening_hour" => "14:00",
        "closing_hour" => "17:00",
        "user_id" => 1,
    ]);
        Restaurant::create([ # 14
        'name' => "Odette",
        'photo' => "https://media-cdn.tripadvisor.com/media/photo-s/16/b2/55/62/quadruple-banquette.jpg",
        'street' => "1 St Andrews Road #01-04",
        "web" => "https://www.odetterestaurant.com/",
        "cuisine" => "French",
        "tables_number" => 2,
        "telephone" => "+65 63850498",
        "city" => "Singapore",
        "country" => "Singapore",
        "opening_hour" => "12:00",
        "closing_hour" => "16:00",
        "user_id" => 1,
    ]);
        Restaurant::create([ # 15
        'name' => "Le Du",
        'photo' => "https://www.theworlds50best.com/discovery/filestore/jpg/LeDu-Bangkok-Thailand-02.jpg",
        'street' => "399/3 Silom 7 Alley, Silom, Bang Rak",
        "web" => "https://www.ledubkk.com/",
        "cuisine" => "Asian",
        "tables_number" => 4,
        "telephone" => "+66 929199969",
        "city" => "Bangkok",
        "country" => "Thailand",
        "opening_hour" => "21:00",
        "closing_hour" => "02:00",
        "user_id" => 1,
    ]);
        Restaurant::create([ # 16
        'name' => "Steirereck",
        'photo' => "https://thebestindesign.net/images/articles/00403-steirereck-restaurant/steirereck_03_thumb.jpg",
        'street' => "Am Heumarkt 2A",
        "web" => "https://www.steirereck.at/steirereck.en.html",
        "cuisine" => "Austrian",
        "tables_number" => 5,
        "telephone" => "+43 17133168",
        "city" => "Wien",
        "country" => "Austria",
        "opening_hour" => "13:00",
        "closing_hour" => "17:00",
        "user_id" => 1,
    ]);
        Restaurant::create([ # 17
        'name' => "Don Julio",
        'photo' => "https://bluelapisroad.files.wordpress.com/2013/10/dsc_45921.jpg",
        'street' => "Guatemala 4699, C1425",
        "web" => "https://www.parrilladonjulio.com/",
        "cuisine" => "Argentine",
        "tables_number" => 10,
        "telephone" => "+54 1148326058",
        "city" => "Buenos Aires",
        "country" => "Argentina",
        "opening_hour" => "14:00",
        "closing_hour" => "20:00",
        "user_id" => 1,
    ]);
        Restaurant::create([ # 18
        'name' => "Quique Dacosta",
        'photo' => "https://images.hola.com/imagenes/cocina/noticiaslibros/20210615191426/mejores-restaurnates-europa-2021-premios-oad/0-964-144/quique-dacosta-comedor-t.jpg",
        'street' => "Carrer Rascassa, 1",
        "web" => "https://www.quiquedacosta.es/",
        "cuisine" => "Mediterranean",
        "tables_number" => 4,
        "telephone" => "+34 965784179",
        "city" => "Dénia",
        "country" => "Spain",
        "opening_hour" => "11:00",
        "closing_hour" => "16:00",
        "user_id" => 1,
    ]);
        Restaurant::create([ # 19
        'name' => "Kjolle",
        'photo' => "https://media-cdn.tripadvisor.com/media/photo-s/16/46/40/90/kjolle.jpg",
        'street' => "Av. Pedro de Osma, 301",
        "web" => "https://www.kjolle.com/",
        "cuisine" => "Peruan",
        "tables_number" => 11,
        "telephone" => "+51 12428575",
        "city" => "Lima",
        "country" => "Peru",
        "opening_hour" => "20:00",
        "closing_hour" => "23:00",
        "user_id" => 1,
    ]);
        Restaurant::create([ # 20
        'name' => "Boragó",
        'photo' => "https://media-cdn.tripadvisor.com/media/photo-s/1a/87/05/a9/comfortable-environment.jpg",
        'street' => "Av. San Josemaría Escrivá de Balaguer, 5970",
        "web" => "https://borago.cl/",
        "cuisine" => "Chilean",
        "tables_number" => 5,
        "telephone" => "+56 229538893",
        "city" => "Santiago de Chile",
        "country" => "Chile",
        "opening_hour" => "12:00",
        "closing_hour" => "17:00",
        "user_id" => 1,
    ]);
    }
}
