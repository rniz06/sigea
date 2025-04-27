<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Listado de paises en minuscula
        $paises = [
            "AFGANISTÁN", "ALBANIA", "ALEMANIA", "ANDORRA", "ANGOLA", "ANTIGUA Y BARBUDA",
            "ARABIA SAUDITA", "ARGELIA", "ARGENTINA", "ARMENIA", "AUSTRALIA", "AUSTRIA",
            "AZERBAIYÁN", "BAHAMAS", "BANGLADÉS", "BARBADOS", "BARÉIN", "BÉLGICA",
            "BELICE", "BENÍN", "BIELORRUSIA", "BIRMANIA", "BOLIVIA", "BOSNIA Y HERZEGOVINA",
            "BOTSUANA", "BRASIL", "BRUNÉI", "BULGARIA", "BURKINA FASO", "BURUNDI", "BUTÁN",
            "CABO VERDE", "CAMBOYA", "CAMERÚN", "CANADÁ", "CATAR", "CHAD", "CHILE", "CHINA",
            "CHIPRE", "CIUDAD DEL VATICANO", "COLOMBIA", "COMORAS", "COREA DEL NORTE",
            "COREA DEL SUR", "COSTA DE MARFIL", "COSTA RICA", "CROACIA", "CUBA", "DINAMARCA",
            "DOMINICA", "ECUADOR", "EGIPTO", "EL SALVADOR", "EMIRATOS ÁRABES UNIDOS",
            "ERITREA", "ESLOVAQUIA", "ESLOVENIA", "ESPAÑA", "ESTADOS UNIDOS", "ESTONIA",
            "ETIOPÍA", "FILIPINAS", "FINLANDIA", "FIYI", "FRANCIA", "GABÓN", "GAMBIA",
            "GEORGIA", "GHANA", "GRANADA", "GRECIA", "GUATEMALA", "GUINEA", "GUINEA-BISÁU",
            "GUINEA ECUATORIAL", "GUYANA", "HAITÍ", "HONDURAS", "HUNGRÍA", "INDIA",
            "INDONESIA", "IRAK", "IRÁN", "IRLANDA", "ISLANDIA", "ISLAS MARSHALL",
            "ISLAS SALOMÓN", "ISRAEL", "ITALIA", "JAMAICA", "JAPÓN", "JORDANIA", "KAZAJISTÁN",
            "KENIA", "KIRGUISTÁN", "KIRIBATI", "KUWAIT", "LAOS", "LESOTO", "LETONIA",
            "LÍBANO", "LIBERIA", "LIBIA", "LIECHTENSTEIN", "LITUANIA", "LUXEMBURGO",
            "MACEDONIA DEL NORTE", "MADAGASCAR", "MALASIA", "MALAUI", "MALDIVAS", "MALÍ",
            "MALTA", "MARRUECOS", "MAURICIO", "MAURITANIA", "MÉXICO", "MICRONESIA",
            "MOLDAVIA", "MÓNACO", "MONGOLIA", "MONTENEGRO", "MOZAMBIQUE", "NAMIBIA", "NAURU",
            "NEPAL", "NICARAGUA", "NÍGER", "NIGERIA", "NORUEGA", "NUEVA ZELANDA", "OMÁN",
            "PAÍSES BAJOS", "PAKISTÁN", "PALAOS", "PANAMÁ", "PAPÚA NUEVA GUINEA", "PARAGUAY",
            "PERÚ", "POLONIA", "PORTUGAL", "REINO UNIDO", "REPÚBLICA CENTROAFRICANA",
            "REPÚBLICA CHECA", "REPÚBLICA DEL CONGO", "REPÚBLICA DEMOCRÁTICA DEL CONGO",
            "REPÚBLICA DOMINICANA", "RUANDA", "RUMANÍA", "RUSIA", "SAMOA",
            "SAN CRISTÓBAL Y NIEVES", "SAN MARINO", "SAN VICENTE Y LAS GRANADINAS",
            "SANTA LUCÍA", "SANTO TOMÉ Y PRÍNCIPE", "SENEGAL", "SERBIA", "SEYCHELLES",
            "SIERRA LEONA", "SINGAPUR", "SIRIA", "SOMALIA", "SRI LANKA", "SUAZILANDIA",
            "SUDÁFRICA", "SUDÁN", "SUDÁN DEL SUR", "SUECIA", "SUIZA", "SURINAM", "TAILANDIA",
            "TAIWÁN", "TANZANIA", "TAYIKISTÁN", "TIMOR ORIENTAL", "TOGO", "TONGA",
            "TRINIDAD Y TOBAGO", "TÚNEZ", "TURKMENISTÁN", "TURQUÍA", "TUVALU", "UCRANIA",
            "UGANDA", "URUGUAY", "UZBEKISTÁN", "VANUATU", "VENEZUELA", "VIETNAM", "YEMEN",
            "YIBUTI", "ZAMBIA", "ZIMBABUE"
        ];
        
        // Iterar sobre el array de estados y insertar cada una en la base de datos
        foreach ($paises as $pais) {
            DB::table('paises')->insert([
                'pais_descripcion' => $pais,
            ]);
        }
    }
}
