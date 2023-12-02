# {
#     "usersData":[
#         {
#             "id":1,"finger":"APiBAcgq4AAAAAAAAAAAAA"
#         },
#         {
#             "id":2,"finger":"APhTAAAAAAMj3ERsAAAAA"
#         }],
#     "timeSavin":"18:56:01"
# }

{
    "userData":
     "
     {\"usersData\":[   
                        {\"id\":1,\"finger\":\"APIAAAA\"},
                        {\"id\":2,\"finger\":\"AZAHIAAA\"},
                        {\"id\":3,\"finger\":\"APhA\"}
                    ],
                        
    \"timeSavin\":\"18:59:09\"}"
}



string requestBody = @"
{
    ""userData"": ""{\""usersData\"":[   
                        {\""id\"":1,\""finger\"":\""APIAAAA\""},
                        {\""id\"":2,\""finger\"":\""AZAHIAAA\""},
                        {\""id\"":3,\""finger\"":\""APhA\""}
                    ],
                        
    \""timeSavin\"":\""18:59:09\""}""
}";


 // consulta


JObject jsonObject = JObject.Parse(requestBody);
string userDataString = (string)jsonObject["userData"];

// Deserializar la cadena userData
JObject userData = JObject.Parse(userDataString);
JArray usersDataArray = (JArray)userData["usersData"];

// Deserializar la lista de usuarios
List<Employee> users = usersDataArray.ToObject<List<Employee>>();

// Llamar a la función verify con la lista de usuarios
Program program = new Program();
program.verify(users);
}


del codigo proporcionado ahora almacena el "time savin" en una variable string
 y añadelo en este c´dogio para convertirlo en json

 var jsonData = new { idClient };
 string jsonID = JsonConvert.SerializeObject(jsonData);
                               


// consulta


Dada mis tablas

 Schema::create('rrhh_asistencia', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_turno');
            $table->unsignedBigInteger('id_personal');
            $table->time('hora_marcado');
            $table->integer('minutos_atraso');
            $table->integer('ind_tipo_movimiento');
            $table->binary('captura_imagen')->nullable(); // Campo BLOB
            $table->timestamps();

            // Claves foráneas
            // $table->foreign('id_turno')->references('id')->on('rrhh_turno');
            // $table->foreign('id_personal')->references('id')->on('rrhh_personal');
        });



Schema::create('rrhh_turno_asignado', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_turno');
            $table->unsignedBigInteger('id_personal');
            $table->integer('ind_tipo_marcado');
            $table->integer('ind_marcado_fijo_variable');
            $table->unsignedBigInteger('id_punto_asistencia')->nullable();
            $table->timestamps();

            // Claves foráneas
            // $table->foreign('id_turno')->references('id')->on('rrhh_turno');
            // $table->foreign('id_personal')->references('id')->on('rrhh_personal'); 
            // $table->foreign('id_punto_asistencia')->references('id')->on('rrhh_punto_asistencia')->nullable();
        });


  Schema::create('rrhh_punto_asistencia', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 255);
            $table->string('direccion', 255);
            $table->string('responsable', 255);
            $table->string('direccion_mac', 45);
            $table->unsignedBigInteger('id_sucursal');
            $table->unsignedBigInteger('id_almacen');
            $table->timestamps();

            // Claves foráneas
           //  $table->foreign('id_sucursal')->references('id')->on('inv_sucursal');
           //  $table->foreign('id_almacen')->references('id')->on('inv_almacen');
        });
        
        Schema::create('rrhh_turno', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 255);
            $table->time('hora_ingreso');
            $table->time('hora_salida');
            $table->timestamps();
        });
        

        Schema::create('rrhh_personal', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::create('inv_sucursal', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
        Schema::create('inv_almacen', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

y sus relaciones:

Schema::table('rrhh_asistencia', function (Blueprint $table) {
            $table->dropForeign(['id_turno']);
            $table->dropForeign(['id_personal']);
        });
        Schema::table('rrhh_turno_asignado', function (Blueprint $table) {
            $table->dropForeign(['id_turno']);
            $table->dropForeign(['id_personal']);
            $table->dropForeign(['id_punto_asistencia']);
        });
        Schema::table('rrhh_punto_asistencia', function (Blueprint $table) {
            $table->dropForeign(['id_sucursal']);
            $table->dropForeign(['id_almacen']);
        });


generame las relaciones en sus archivos de Models para mi proyecto de Laravel.



        

























