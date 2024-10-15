<?php return array (
  'manifest-version' => '1.1',
  'manifest-attributes' => 
  array (
    'changelog' => 'Changelog file for msImport component.

msImport 0.1.0
====================================
Initial Version

msImport 0.1.1
====================================
- доработан вывод ошибок и предупреждений
- переработан метод транслитерации псевдонимов
- реализована возможность импортировать не только товары miniShop2, но и обычные ресурсы
- реализована возможность указывать в качестве уникального поля поля ресурсов и TV-параметры
- много небольших исправлений и доработок

msImport 0.1.2
====================================
- Добавлена возможность удалять отсутствующие в файле категории и соответствующая системная настройка
- Реализована возможность указывать категорию для товара через поле parent ресурса а не только через данные категории
- Реализована возможность перемещать товары между категориями

msImport 0.1.3
====================================
- Реализована возможность загрузки категорий без товаров
- Добавлена системная настройка, позволяющая установить есть ли в файле заголовки столбцов
- Исправлен баг из-за которого пропускался первый товар

msImport 0.1.4
====================================
- Реализрвана возможность удалять старые изображения товаров',
    'license' => '',
    'readme' => '--------------------
Extra: msImport
--------------------
Version: 0.1.4
Since: April 7th, 2015
Author: ssfart <service@w-come.net>

Import from xlsx MODX Revolution and MiniShop2.',
  ),
  'manifest-vehicles' => 
  array (
    0 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modNamespace',
      'guid' => '58a41d0c717ad1cf08730431a0df6b50',
      'native_key' => 'msimport',
      'filename' => 'modNamespace/a68ce8c5552d1910e2ded5033c7fcde0.vehicle',
      'namespace' => 'msimport',
    ),
    1 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => 'ee6eaa2c05c08d7680599fac2dba822d',
      'native_key' => 'import_catalog_id',
      'filename' => 'modSystemSetting/225a9673ff302b15de9cbad271d6a989.vehicle',
      'namespace' => 'msimport',
    ),
    2 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => 'a7aa274a46e67fa420f4b7e847ac5958',
      'native_key' => 'import_remove_missing_products',
      'filename' => 'modSystemSetting/9e4057173f84ba0325e4f6bdfdbb879e.vehicle',
      'namespace' => 'msimport',
    ),
    3 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '3d256d6ab23b1e0346663270f2a51d71',
      'native_key' => 'import_remove_old_images',
      'filename' => 'modSystemSetting/59f600ba9205d247afa03d8049f1dda0.vehicle',
      'namespace' => 'msimport',
    ),
    4 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '39e026814ea9665b5e114d3a140b34c0',
      'native_key' => 'import_remove_missing_category',
      'filename' => 'modSystemSetting/74f929fd7c9b2558c85b7f34ad4ffa1c.vehicle',
      'namespace' => 'msimport',
    ),
    5 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '64214e761eba3cc619b0cc291658bd24',
      'native_key' => 'import_is_headers_set',
      'filename' => 'modSystemSetting/7f0e7045c6931ea49f0add61d339f66e.vehicle',
      'namespace' => 'msimport',
    ),
    6 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '60d6fb90aa5017c6dedae97b506514a5',
      'native_key' => 'import_category_fields_relation',
      'filename' => 'modSystemSetting/55e86367ae570ac5feda45ebf5c37aa8.vehicle',
      'namespace' => 'msimport',
    ),
    7 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => 'd57916705a68f66e76661938fa74c121',
      'native_key' => 'import_category_resource_fields',
      'filename' => 'modSystemSetting/f161d163c538d28b326dc8b7a46c5f41.vehicle',
      'namespace' => 'msimport',
    ),
    8 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => 'bc3869765fb2f6443d9ea1eda52b41c2',
      'native_key' => 'import_category_tvs_sheme',
      'filename' => 'modSystemSetting/43c2264f61f391aa6d496eea585b01ac.vehicle',
      'namespace' => 'msimport',
    ),
    9 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => 'de38781d113d49f37f2f564fede74b09',
      'native_key' => 'import_fields_pretreatment',
      'filename' => 'modSystemSetting/a9d2b2ded36c8757e9dc51b0c98013d1.vehicle',
      'namespace' => 'msimport',
    ),
    10 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => 'bcd187ec06b30e97eff5a8aa42022753',
      'native_key' => 'import_configuration_file_path',
      'filename' => 'modSystemSetting/b4b03ede9059f8e6257d033757bf7858.vehicle',
      'namespace' => 'msimport',
    ),
    11 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => 'e9bcc5cfa4478340efd9d091380a02d5',
      'native_key' => 'import_ignored_columns',
      'filename' => 'modSystemSetting/6b4c0b1a750ef8ea9fafbfdc6c05c453.vehicle',
      'namespace' => 'msimport',
    ),
    12 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '29ac5f3aa3ff18ae2f82c0578ebbb1a4',
      'native_key' => 'import_path_to_images',
      'filename' => 'modSystemSetting/d79ec925e7051ce734ffec121bbab5e0.vehicle',
      'namespace' => 'msimport',
    ),
    13 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '754935fc9a75f4c59a73120ec049d55f',
      'native_key' => 'import_product_ms2_fields',
      'filename' => 'modSystemSetting/f41feeb480b975835cea36e8f7d52842.vehicle',
      'namespace' => 'msimport',
    ),
    14 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '0c4c3628980b4b212e08fa3bbbd36ee0',
      'native_key' => 'import_product_ms2_fields_relation',
      'filename' => 'modSystemSetting/c82a7a75a1487feb2c3d0e60b812a7a3.vehicle',
      'namespace' => 'msimport',
    ),
    15 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '6c4036aeaa284b66a24b9a453edb67a9',
      'native_key' => 'import_product_resource_fields',
      'filename' => 'modSystemSetting/9ef610e6e2ef96809f4b107af564a593.vehicle',
      'namespace' => 'msimport',
    ),
    16 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '724edb79cdd4eb8628a70f821b070e2f',
      'native_key' => 'import_product_resource_fields_relation',
      'filename' => 'modSystemSetting/b3c79abad8d3a458d186f84b920bd561.vehicle',
      'namespace' => 'msimport',
    ),
    17 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '36fe6cc63337cfe982ccc53d4b762347',
      'native_key' => 'import_product_tvs_sheme',
      'filename' => 'modSystemSetting/c612e9c40b014cad137ae1af03d8a2d9.vehicle',
      'namespace' => 'msimport',
    ),
    18 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '60312f9ee854e35ef08dec1a1556f346',
      'native_key' => 'import_subcategoryes_field',
      'filename' => 'modSystemSetting/140824add5dbbf79af0bbb55f5250b3a.vehicle',
      'namespace' => 'msimport',
    ),
    19 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => 'bae7949e3fff4a0194dc9d1cf682dc32',
      'native_key' => 'import_unique_field',
      'filename' => 'modSystemSetting/2f5c44c5576e176c195e8baf8ea03cd1.vehicle',
      'namespace' => 'msimport',
    ),
    20 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '9ed20a04850e65e94eeb39fdbc919f26',
      'native_key' => 'import_category_class',
      'filename' => 'modSystemSetting/644dc5e2a3d4a815bb51325305d64f3b.vehicle',
      'namespace' => 'msimport',
    ),
    21 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '8826f7863ae0020a3f3ded16ad079fe6',
      'native_key' => 'import_resource_class',
      'filename' => 'modSystemSetting/b5e6a75c7b1f64c42da4d00ec7ab469c.vehicle',
      'namespace' => 'msimport',
    ),
    22 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modMenu',
      'guid' => '8cfe5f95f0b29f8ea99f30119be2833b',
      'native_key' => 'msimport_caption',
      'filename' => 'modMenu/7d3d2d9addfff45d55183d3f9c29cb6b.vehicle',
      'namespace' => 'msimport',
    ),
    23 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modCategory',
      'guid' => 'c79043b19f2cdd8f7ed115f114b50801',
      'native_key' => NULL,
      'filename' => 'modCategory/5c9b74fa65c046312f9e0c5dd08f30ba.vehicle',
      'namespace' => 'msimport',
    ),
    24 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modCategory',
      'guid' => '7ce14ce57563419d5fac9bab3b6429d5',
      'native_key' => NULL,
      'filename' => 'modCategory/441d7df98c66c774cfc8896cf34036fa.vehicle',
      'namespace' => 'msimport',
    ),
  ),
);