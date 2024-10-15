<?php

$_lang['area_msimport_main'] = 'Основные';
$_lang['area_msimport_settings'] = 'Настройки импорта (данные товаров, специфичные для msProduct)';
$_lang['area_msimport_settings_category'] = 'Настройки импорта (данные категорий)';
$_lang['area_msimport_settings_all'] = 'Общие настройки';
$_lang['area_msimport_settings_resource'] = 'Настройки импорта (данные ресурсов MODX)';

$_lang['setting_import_configuration_file_path'] = 'Имя файла с настройками';
$_lang['setting_import_configuration_file_path_desc'] = 'Имя файла с настройками. Если указан, то системные настройки будут переписаны массивами из файла. Файл должен распологаться в папке assets/components/msimport/config/. Если имя файла указано, но он не создан - компонент попытается самостоятельно его сгенерировать на основе текущих настроек';
$_lang['setting_import_catalog_id'] = 'id основного каталога';
$_lang['setting_import_catalog_id_desc'] = 'В этом ресурсе будут создаваться категории, при импорте, если они не были найдены.';
$_lang['setting_import_remove_missing_products'] = 'Удалять товары, которых нет в списке импорта';
$_lang['setting_import_remove_missing_products_desc'] = '';
$_lang['setting_import_remove_missing_category'] = 'Удалять категории, которых нет в списке импорта';
$_lang['setting_import_remove_missing_category_desc'] = '';
$_lang['setting_import_remove_old_images'] = 'Удалять старые изображения товара';
$_lang['setting_import_remove_old_images_desc'] = 'Если включена эта опция и при этом в импортируемом файле указано изображение, и указанный файл будет найден (хотя-бы один, если указано несколько), то перед добавлением нового изображения будут удалены старые';

$_lang['setting_import_category_fields_relation'] = 'Соответствие полей создаваемых категори';
$_lang['setting_import_category_fields_relation_desc'] = 'JSON с соответствием полей таблицы и полей ресурса (например {"pagetitle":"A","alias":"B"})';
$_lang['setting_import_category_resource_fields'] = 'Поля по умолчанию для создаваемых категорий';
$_lang['setting_import_category_resource_fields_desc'] = 'JSON со значениями полей для создаваемых категорий (например {"published":"1","template":"4"})';
$_lang['setting_import_category_tvs_sheme'] = 'Схема соответствия полей в таблице с TV для категорий';
$_lang['setting_import_category_tvs_sheme_desc'] = 'JSON с соответствием полей таблицы и TV-параметров категорий ( например  {"myTV":"G","myTV2":"K"})';
$_lang['setting_import_fields_pretreatment'] = 'Сниппеты для предобработки';
$_lang['setting_import_fields_pretreatment_desc'] = 'JSON с соответствием полей и сниппетов для обработки значений полей таблицы перед сохранением их значений в товаре. В соответствии с єтой настройкой, перед зписью в базу данных, значения всех перечисленных в ней полей будут переданы для обработки соответствующим сниппетам. В сниппеты будут переданы параметры:
in - в котором содержится значение соответствующего столбца,
field - буква столбца из таблицы,
row - закодированный в JSON массив содержащий все данные из обрабатываемой строки.
Кроме того в сниппете доступен весь объект импорта в переменной $modx->msImport. Сниппеты должны возвращать закодированный массив с данными строки, в который внесены изменения, именно он и будет использоваться для дальнейшей обработки. (например {"A":"sanitarisString","B":"translitAlias"})';
$_lang['setting_import_path_to_images'] = 'Путь от корня до папки с картинками импортируемых товаров';
$_lang['setting_import_path_to_images_desc'] = '';
$_lang['setting_import_product_ms2_fields'] = 'Поля по умолчанию для создаваемых товаров (поля ms2_products)';
$_lang['setting_import_product_ms2_fields_desc'] = 'JSON со значениями по умолчанию для полей для создаваемых товаров (поля ms2_products, например {"weight":"null","size":"[\"\"]","color":"[\"\"]","source":"2"})';
$_lang['setting_import_product_ms2_fields_relation'] = 'Соответствие полей создаваемых товаров (поля ms2_products) полям импортируемой таблицы';
$_lang['setting_import_product_ms2_fields_relation_desc'] = 'JSON с соответствием полей (например {"price":"E","article":"F"})';
$_lang['setting_import_product_resource_fields'] = 'Поля по умолчанию для создаваемых товаров (поля site_content)';
$_lang['setting_import_product_resource_fields_desc'] = 'JSON со значениями полей для создаваемых товаров (поля site_content, например {"published":"1","template":"3"})';
$_lang['setting_import_product_resource_fields_relation'] = 'Соответствие полей создаваемых товаров (поля site_content) полям импортируемой таблицы';
$_lang['setting_import_product_resource_fields_relation_desc'] = 'JSON с соответствием полей (поля site_content, например {"pagetitle":"A","alias":"B"})';
$_lang['setting_import_product_tvs_sheme'] = 'Схема соответствия полей в таблице с TV для продуктов';
$_lang['setting_import_product_tvs_sheme_desc'] = 'JSON с соответствием полей (например {"myTV":"G","myTV2":"K"})';
$_lang['setting_import_subcategoryes_field'] = 'Поле с допкатегориями';
$_lang['setting_import_subcategoryes_field_desc'] = 'Поле с перечисленными через запятую id допкатегорий';
$_lang['setting_import_unique_field'] = 'Уникальное поле';
$_lang['setting_import_unique_field_desc'] = 'Поле, по которому будет определятся уникальность ресурсов и какие действия нужно предпринимать (создать/обновить). Можно указать: 1 (pagetitle), 2 (article, только для miniShop2), 3 (pagetitle+article, только для miniShop2), id, pagetitle, longtitle, alias, uri, tv.ИМЯ_TV-ПАРАМЕТРА';
$_lang['setting_import_ignored_columns'] = 'Поля только для новых товаров';
$_lang['setting_import_ignored_columns_desc'] = 'Поля таблицы, которые будут игнорироваться при обновлении товаров. При этом они не будут игнорироваться при создании. JSON с буквами столбцов (например ["D","E","K"])';
$_lang['setting_import_category_class'] = 'xPDO класс категорий';
$_lang['setting_import_category_class_desc'] = 'xPDO класс создаваемых и обновляемых категорий (modResource или msCategory)';
$_lang['setting_import_resource_class'] = 'xPDO класс товаров';
$_lang['setting_import_resource_class_desc'] = 'xPDO класс создаваемых и обновляемых товаров (modResource или msProduct)';
$_lang['setting_import_is_headers_set'] = 'Пропустить верхнюю строку таблицы';
$_lang['setting_import_is_headers_set_desc'] = 'Если эта опция включена будет игнорироваться верхняя строка каждога листа. Это нужно в случае когда в таблице указаны заголовки столбцов';