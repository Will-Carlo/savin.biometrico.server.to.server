para crear CRUD
php artisan make:model Post -mcf --resource
Lo que hace adicionalmente es crear los métodos básicos de un crud en el controllador



Post::get();-> Trae todos los registros de la base de datos Post::frist();-> Trae el primer registro de la base de datos Post::find(id); -> Busca un registro en la base de datos por medio de su id Post::latest(); -> Trae todos los registros de la base de datos, y los ordena de forma descendente

adicional, podemos utilizar el método paginate(), para realizar la paginación, solo no nos debemos de incluir en nuestras vistas la propiedad links() para que podamos visualizar los controles de paginación
Post::where('nombre_campo_base_datos', 'id')->first();


Si quieren ordenar de manera descendente, puede agregar el id
$posts = Post::latest('id')->paginate();


para modificar la base de datos hayq ue ir creand las migraciones

php artisa migrate


