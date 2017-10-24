Own playing with different Symfony 3 stuff
==========

Implemented:
- CRUDs for User, Article, Comments
- login system based on GuardAuthenticator User credentials
- AsyncBundle with producer & consumer. It sends test email using RabbitMQ.
Not forget to run command `bin/console rabbitmq:consumer brother_mailer`
- Fixtures to load. Just run command `bin/console hautelook:fixtures:load `
- Grid for Users based on *APYDataGridBundle*
- Yarn package manager with webpack-encore library added. Using Yarn Bootstrap, JQuery libs added. To build assets run `arn run encore dev`. 
 To watch simple JS function in `assets/js/main.js` uncomment `require('./greet');` function.
