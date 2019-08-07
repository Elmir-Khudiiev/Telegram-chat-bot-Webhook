# Description:
> Telegram chat bot, works by the method ```Webhook```

___
# Requirements:
* Telegram account
* Domain
     * SSL certificate
* Hosting
    * PHP version: 7.0+

# Instruction:

## 1. Telegram
* Створюємо бот, за допомогою ```@BotFather```.
* To install / register a webhook, you need to execute the following HTTPS request (you can simply open this URL in a browser):
```
https://api.telegram.org/botYOUR-TOKEN/setWebhook?url=https://YOUR.DOMAIN
```
* You can check the status of webhook with such a request:
```
https://api.telegram.org/botYOUR-TOKEN/getWebhookInfo
```
 * To remove the webhook, you must send the same request as for the installation, without the url parameter:
```
https://api.telegram.org/botYOUR-TOKEN/setWebhook
```
---

## 2. Autoload
You must have a package manager installed to install the class startup ```composer ```
Command:
```
composer install
```
---

## 3. Database
The example database will be described ```MySql```  
We create a database:  
> ```db_name``` - name your database.

```sql
CREATE DATABASE db_name;
```
We create a table and columns:
```sql
CREATE TABLE `db_name`.`chat` ( `id` INT(11) NOT NULL AUTO_INCREMENT , `question` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , `answer` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
```

The bot verifies the user's message with the column ```question```   and provides a response from the column ```answer```.

---
## 4. Config
Rename the file ```config-example.php``` / ```config.php```  
Fill in the file according to your details.