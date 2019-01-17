# symfony-agenda
An event agenda with PHP7 and the Symfony framework

See the deployed version here. 
Please be patient as the project is hosted on a free heroku plan that needs to start dynos. It may take up to 20 seconds to load:
https://events-agenda.herokuapp.com/events

To run the project you need Composer installed. https://getcomposer.org/

Please refer to the excellent Symfony documentation: https://symfony.com/doc/current/setup.html

You need to create a database and include this in a .env file at the root directory, for example : 
```
DATABASE_URL=mysql://<user>:<password>@127.0.0.1:8889/<database_name>
```
then run in your project directory
```
composer install
php bin/console server:run
```

I coded this project my blank certification project at IMAGE Formation Training (backend web developer 2018)
I created in 4 days the working backend of a (fake) events agenda site.

The HTML/CSS template was provided. I only worked on making things work (backend)
- Complete analyse of the different classes and entities required. UML class and use case diagrams
- Conversion of the HTML files in a twig template
- making navigation work
- creation of a MySQL database to store the events
- Admin interface to manage events
- Coded the search function on the events page with different criteria
- Contact form and Newsletter registration
- deployment on Heroku


