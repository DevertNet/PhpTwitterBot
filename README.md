# PhpTwitterBot
Automatic posts on twitter with random text.
Currently only german text ;)

### Installation
1. Clone this project in your favourite folder e.g. ```/path/to/project```
2. Fire ```composer install```
3. Copy config.sample.php to config.php and fill in your twitter account informations.
4. Add this line to your crontab file: ```* * * * * cd /path/to/project && php cron.php 1>> /dev/null 2>&1```
5. Thats it :D