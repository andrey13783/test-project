<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать файл в "wp-config.php"
 * и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки базы данных
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры базы данных: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'test11' );

/** Имя пользователя базы данных */
define( 'DB_USER', 'root' );

/** Пароль к базе данных */
define( 'DB_PASSWORD', '' );

/** Имя сервера базы данных */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу. Можно сгенерировать их с помощью
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}.
 *
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными.
 * Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'F?._qC><b5!}4ek]EHp*@KwlS?@BA+{HX#pc};nn, 2K)Bq8d*_DS1oBtW0.?a~&' );
define( 'SECURE_AUTH_KEY',  'TLa$q=mRG<?f(YJZwqn6eFP}.x:qq=CIf_P?#rv>qk+_&wsOvGNS~l*E`1!xXTI^' );
define( 'LOGGED_IN_KEY',    '5PB|z1JJglsS96_u`b%COQ:xx9O<eGv*s#vr6jMtY,{j@K8-OqQ5Is#XwPcQx#A(' );
define( 'NONCE_KEY',        'DdRYnJJd0|c*Cr?,n{o7(x>.JmPPC=[C+zw0T-9(Mly(`rY`6(XW/$pFmFcMN+um' );
define( 'AUTH_SALT',        '_nD|e%idKV/wyP<q~PICf/:;2K<AXF{KYMR1>[FeEqayB#X[,f.4nGIE%z9P@pf8' );
define( 'SECURE_AUTH_SALT', 'd:C$a9P|i>iCx:)x0oo<IisC>)/FNe>0@$n*]iRWWqa`j ow;d}nDi#5i_01mA3C' );
define( 'LOGGED_IN_SALT',   ' 5GJz>sA=y/SZV<iW<Yw(}*v!Cnh?izZ!Bv5uG3O-PA_w:on5dS0Vr}kqQBNEl{~' );
define( 'NONCE_SALT',       'QFv&Q^XU+}5O6~qLYN%[mF|fuwU^8bL0$xV^eOff@`LkO~H[!>j5*/NfwT4@1&)b' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Произвольные значения добавляйте между этой строкой и надписью "дальше не редактируем". */



/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
