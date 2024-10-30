<div align="center">
  <img src="public/images/edugraph_banner.png" alt="Edugraph Banner" width="70%">
</div>

## Edugraph
This project is based on the database of 2021-2022 end-of-year exam results for the 8th grade students of Romania.
It helps users to visualize the data in a more interactive way, by providing a graphical representation of the data,
and also by providing a search functionality to find the results of a specific student, school, location, etc.

## Setting up the database
* First of all, we used an sqlite database to store the data, so the following specifications work better if
you also do the same, but overall the steps are identical.
<br><br>
First, assuming you are already in possession of an sqlite database,
you need to install Laravel Herd, which is a package that
contains nginx for serving the database and php for running the Laravel application.
<br><br>
After installing Laravel Herd, you need to ``cd`` to its directory and run the following command:
```bash
larvel new <<project_name>>
```
* This will create a new Laravel project in the directory you are currently in.
<br><br>
<strong>Important:</strong> You need to be in the directory of Laravel Herd when running this command,
otherwise it won't work because the Laravel Herd directory is the one that contains the nginx and php services.
<br><br>
After running the command, it will ask you some questions,
like if you want to install the Laravel UI package, whether you would like to initiate a git repository,
what kind of database you want to use (here, select sqlite - if working with sqlite database), etc.
<br><br>
If you have successfully created the Laravel project, you can now copy the database file to 
the database directory of the Laravel project.
```directory
/database/database.sqlite (in our case it is named partial.db, db is also
a valid extension for sqlite databases)
```
* After copying the database you will need to set up a connection to the database in the `.env` file,
if you do not have one, you can create one or modify the `.env.example` file, which
has some preset values.
```env
DB_CONNECTION=sqlite
DB_DATABASE=/database/database.sqlite
DB_USERNAME=root (if you have a username)
DB_PASSWORD= (if you have a password, otherwise leave it empty)
```
* Once you have set up the connection to the database, you can now run the following command to run any migrations:
```bash
php artisan migrate '(use --force if you are trying to run the migrations in production)'
```
* After running the migrations, you can now create a model for the database table you want to interact with.
```bash
php artisan make:model <<ModelName>>
```
* In the _ModelName.php_ file, you can specify the table name, primary key, 
fillable and guarded properties.
```php
protected $table = 'table_name';
protected $primaryKey = 'id'; - (default is 'id', but you can change it to any other column)
protected $fillable = ['column1', 'column2', 'column3']; - (columns that can be mass assigned)
protected $guarded = ['column1', 'column2', 'column3']; - (columns that cannot be mass assigned)
```

## Setting up a database manager
* After setting up the database, you can now install a database manager to interact with the database.
In our case, we used TablePlus, but you can use any other database manager you are comfortable with.
```bash
sudo apt-get install tableplus
```
* After installing TablePlus, you can now connect to the database by creating a new connection,
by click on the plus icon on the left of the search bar (on windows) or by clicking on the `Add Connection` button (on mac),
specifying the database type (in our case sqlite).
* After creating a new connection, you can now specify the connection details:
  * Name: `<<ConnectionName>>`
  * Status Color:
  * Tag:
  * SQLite File: `<<PathToDatabaseFile>>`
* After specifying the connection details, test the connection, if it fails, check the above steps to see if you have missed anything.
* If the test is successful, you can now connect to the database and start manipulating the data.

## Manipulating the database
* After creating the model, you can now create a controller for the model.
  Where you can specify any relations with other models/tables, or any other logic you want to implement.
```bash
php artisan make:controller <<ControllerName>>
```
* In the _ControllerName.php_ file, you can specify the model you want to use in the controller.
```php
use App\Models\ModelName;
```
* After specifying the model, you can now create the methods you want to use in the controller
to manipulate the data in the connected database table.
```php
public function index() {
    return <<ModelName>>::all(); # returns all the records in the table
}

public function show($id) {
    return <<ModelName>>::find($id); # returns the record with the specified id
}

public function store(Request $request) {
    return <<ModelName>>::create($request->all()); # creates a new record in the table
}

public function update(Request $request, $id) {
    $record = <<ModelName>>::find($id);
    $record->update($request->all()); # updates the record with the specified id
    return $record;
}

public function destroy($id) {
    return <<ModelName>>::destroy($id); # deletes the record with the specified id
}

public function search($query) {
    return <<ModelName>>::where('column', 'like', '%'.$query.'%')->get(); # searches for records with the specified query
}
```
* After creating the methods, you can now create the routes for the controller
in the `routes/web.php` file.
```php
Route::get('/<<route_name>>', '<<ControllerName>>@index');
Route::get('/<<route_name>>/{id}', '<<ControllerName>>@show');
Route::post('/<<route_name>>', '<<ControllerName>>@store');
Route::put('/<<route_name>>/{id}', '<<ControllerName>>@update');
Route::delete('/<<route_name>>/{id}', '<<ControllerName>>@destroy');
Route::get('/<<route_name>>/search/{query}', '<<ControllerName>>@search');
```
* After creating the routes, you can create views and other controllers to
interact with the data in your browser at the `<<ProjectName>>.test` URL.
