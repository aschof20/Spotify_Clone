# Setup

## Install the following:

1. Sublime Text
2. XAMPP webserver - installer NOT vm version
3.

## XAMPP

1. Open Application
2. Make sure MySQL and Apache servers running
3. Go to:

   ```
   http://localhost:8080/dashboard/
   ```

## Create New Project

1. Create a new folder `FolderName` for the project in:

`Applications/XAMPP/hdocs`

2. Add a `index.php` file to the folder.

## Initial App

1. Go to `index.php` and enter `html` and then press tab.
2. Enter dummy text into the <Body> element
3. To view the page go to: `http://localhost/FolderName`

## Database Setup and Creation

1. Go to `localhost/phpmyadmin` - front-end for mySQL database
2. In the left-hand panel select `New`
3. Enter name of database
4. Enter `table` name and the appropriate number of attributes.
5. Enter the appropriate table attributes

- For attribute e.g. `id` use `A.I` - auto-increment and select `PRIMARY` key (Unique key)

### Debugging DB querying errors

1. Output the query via `echo`,
2. Copy the output to the query input in the SQL tab of `localhost/phpmyadmin`

### Adding further tables to the database

1. Go to: `localhost/phpmyadmin`
2. Select the appropriate database
3. Click the following tables with the associated attributes:
    1. Songs: {
        1. id
        2. title
        3. artist
        4. album
        5. genre
        6. duration
        7. path - of the mp3 file
        8. albumOrder
        9. plays
    2. Artists:
        1. id
        2. name
    3. Genres
        1. id
        2. name
    4. Albums:
        1. id
        2. title
        3. artist
        4. genre
        5. artwork/Path

### Adding data to the tables

1. Select the appropriate table and select `Insert` header.
    1. For id elements, just leave blank