# eco

### Установке через локальный сервер (xampp, composer):
- `composer install` - Установить необходимые пакеты
- `php init` - Создать локальные файлы (`0 - development`, `1 - production`) 
- Создать базу данных (в прокете задано название `eco_local`)
- Указать название базы в файле `common/config/main-local.php` 
```
<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=eco_local', //Ищменить на название созданной БД
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ],
    ],
];
```
- `php yii migrate` - Создать таблицы в БД
- Открыть страницу в браузере по адресу (`localhost/eco/frontend/web`)

#### Для входа использовать следующие данные:
- login: `redactor`
- password: `123456`