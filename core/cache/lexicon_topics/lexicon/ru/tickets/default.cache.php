<?php  return array (
  'area_tickets.main' => 'Основные',
  'area_tickets.section' => 'Раздел тикетов',
  'area_tickets.ticket' => 'Тикет',
  'area_tickets.comment' => 'Комментарий',
  'area_tickets.mail' => 'Почтовые уведомления',
  'setting_tickets.frontend_css' => 'Стили фронтенда',
  'setting_tickets.frontend_css_desc' => 'Путь к файлу со стилями магазина. Если вы хотите использовать собственные стили - укажите путь к ним здесь, или очистите параметр и загрузите их вручную через шаблон сайта.',
  'setting_tickets.frontend_js' => 'Скрипты фронтенда',
  'setting_tickets.frontend_js_desc' => 'Путь к файлу со скриптами магазина. Если вы хотите использовать собственные скрипты - укажите путь к ним здесь, или очистите параметр и загрузите их вручную через шаблон сайта.',
  'setting_tickets.date_format' => 'Формат даты',
  'setting_tickets.date_format_desc' => 'Формат вывода даты в оформлении тикетов.',
  'setting_tickets.default_template' => 'Шаблон для новых тикетов',
  'setting_tickets.default_template_desc' => 'Шаблон "по умолчанию" для новых тикетов. Используется и в административной части, и при создании тикета на фронтенде.',
  'setting_tickets.ticket_isfolder_force' => 'Все тикеты - контейнеры',
  'setting_tickets.ticket_isfolder_force_desc' => 'Обязательное указание параметра "isfolder" у тикетов',
  'setting_tickets.ticket_hidemenu_force' => 'Не показывать тикеты в меню',
  'setting_tickets.ticket_hidemenu_force_desc' => 'Обязательное указание параметра "hidemenu" у тикетов',
  'setting_tickets.ticket_show_in_tree_default' => 'Показывать в дереве по умолчанию',
  'setting_tickets.ticket_show_in_tree_default_desc' => 'Включите эту опцию, чтобы все создаваемые тикеты были видны в дереве ресурсов.',
  'setting_tickets.section_content_default' => 'Содержимое секций тикетов по умолчанию',
  'setting_tickets.section_content_default_desc' => 'Здесь вы можете указать контент вновь создаваемой секции тикетов. По умолчанию установен вывод дочерних тикетов.',
  'setting_tickets.enable_editor' => 'Редактор "markItUp"',
  'setting_tickets.enable_editor_desc' => 'Эта настройка активирует редактор "markItUp" на фронтенде, для удобной работы с тикетами и комментариями.',
  'setting_tickets.editor_config.ticket' => 'Настройки редактора тикетов',
  'setting_tickets.editor_config.ticket_desc' => 'Массив, закодированный в JSON для передачи в "markItUp". Подробности тут - http://markitup.jaysalvat.com/documentation/',
  'setting_tickets.editor_config.comment' => 'Настройки редактора комментариев',
  'setting_tickets.editor_config.comment_desc' => 'Массив, закодированный в JSON для передачи в "markItUp". Подробности тут - http://markitup.jaysalvat.com/documentation/',
  'setting_tickets.disable_jevix_default' => 'Отключать Jevix по умолчанию',
  'setting_tickets.disable_jevix_default_desc' => 'Эта настройка включает или отключает параметр "Отключить Jevix" по умолчанию у новых тикетов.',
  'setting_tickets.process_tags_default' => 'Выполнять теги по умолчанию',
  'setting_tickets.process_tags_default_desc' => 'Эта настройка включает или отключает параметр "Выполнять теги MODX" по умолчанию у новых тикетов.',
  'setting_tickets.private_ticket_page' => 'Редирект с приватных тикетов',
  'setting_tickets.private_ticket_page_desc' => 'Id существующего ресурса MODX, на который отправлять пользователя, если у него недостаточно прав для просмотра приватного тикета.',
  'setting_tickets.unpublished_ticket_page' => 'Страница неопубликованных тикетов',
  'setting_tickets.unpublished_ticket_page_desc' => 'Id существующего ресурса MODX, которая будет показана при запросе неопубликованного тикета.',
  'setting_tickets.ticket_max_cut' => 'Максимальный размер текста без сut',
  'setting_tickets.ticket_max_cut_desc' => 'Максимальное количество символов без тегов, которые можно сохранить без тега cut.',
  'setting_tickets.snippet_prepare_comment' => 'Сниппет обработки комментария',
  'setting_tickets.snippet_prepare_comment_desc' => 'Специальный сниппет, который будет обрабатывать комментарий. Перекрывает обработку по умолчанию и вызывается прямо в классе "Tickets", соответственно, ему доступны все методы и переменные этого класса.',
  'setting_tickets.comment_edit_time' => 'Время редактирования',
  'setting_tickets.comment_edit_time_desc' => 'Время в секундах, в течении которого можно редактировать свой комментарий.',
  'setting_tickets.clear_cache_on_comment_save' => 'Очищать кэш при комментировании',
  'setting_tickets.clear_cache_on_comment_save_desc' => 'Эта настройка включает очистку кэша тикета при действии с комментариями (создание\\редактирование\\удалении). Нужна только если вы вызываете сниппет "TicketComments" кэширвоанным.',
  'setting_tickets.mail_from' => 'Ящик исходящей почты',
  'setting_tickets.mail_from_desc' => 'Адрес для отправки почтовых уведомлений. Если не заполнен - будет использована настройка "emailsender".',
  'setting_tickets.mail_from_name' => 'Имя отправителя',
  'setting_tickets.mail_from_name_desc' => 'Имя, от которого будут отправлены все уведомления. Если не заполнен - будет использована настройка "site_name".',
  'setting_tickets.mail_queue' => 'Очередь сообщений',
  'setting_tickets.mail_queue_desc' => 'Нужно ли использовать очередь сообщений, или отправлять все письма сразу? Если вы активируете эту опцию, то вам нужно добавить в cron файл "/core/components/tickets/cron/mail_queue.php"',
  'setting_tickets.mail_bcc' => 'Уведомлять администраторов',
  'setting_tickets.mail_bcc_desc' => 'Укажите через запятую список <b>id</b> администраторов, которым нужно отправлять сообщения о новых тикетах и комментариях.',
  'setting_tickets.mail_bcc_level' => 'Уровень уведомления администраторов',
  'setting_tickets.mail_bcc_level_desc' => 'Возможны 3 уровня уведомлений администраторов: 0 - отключено, 1 - отправлять только сообщения о новых тикетах, 2 - тикеты + комментарии. Рекомендуемый уровень - 1.',
  'setting_tickets.count_guests' => 'Считать просмотры страниц гостями',
  'setting_tickets.count_guests_desc' => 'При включении этого параметра учитываются просмотры страниц всеми посетителями сайта, а не только авторизованными. Имейте в виду, что при таком подходе счетчик просмотров довольно легко накрутить.',
  'setting_mgr_tree_icon_ticket' => 'Иконка тикета',
  'setting_mgr_tree_icon_ticket_desc' => 'Иконка оформления тикета в дереве ресурсов.',
  'setting_mgr_tree_icon_ticketssection' => 'Иконка секции тикетов',
  'setting_mgr_tree_icon_ticketssection_desc' => 'Иконка оформления секции с тикетами в дереве ресурсов.',
  'setting_tickets.source_default' => 'Источник медиа для тикетов',
  'setting_tickets.source_default_desc' => 'Выберите источник медиа, который будет использован по умолчанию для загрузки файлов тикетов.',
  'tickets.source_thumbnail_desc' => 'Закодированный в JSON массив с параметрами генерации уменьшенной копии изображения.',
  'tickets.source_maxUploadWidth_desc' => 'Максимальная ширина изображения для загрузки. Всё, что больше, будет ужато до этого значения.',
  'tickets.source_maxUploadHeight_desc' => 'Максимальная высота изображения для загрузки. Всё, что больше, будет ужато до этого значения.',
  'tickets.source_maxUploadSize_desc' => 'Максимальный размер загружаемых изображений (в байтах).',
  'tickets.source_imageNameType_desc' => 'Этот параметр указывает, как нужно переименовать файл при загрузке. Hash - это генерация уникального имени, в зависимости от содержимого файла. Friendly - генерация имени по алгоритму дружественных url страниц сайта (они управляются системными настройками).',
  'tickets' => 'Тикеты',
  'comments' => 'Комментарии',
  'threads' => 'Ветви комментариев',
  'authors' => 'Авторы',
  'tickets_section' => 'Раздел с тикетами',
  'ticket' => 'Тикет',
  'ticket_all' => 'Все',
  'ticket_menu_desc' => 'Управление комментариями и не только.',
  'comments_all' => 'Все комментарии',
  'tickets_section_create_here' => 'Раздел с тикетами',
  'tickets_section_new' => 'Новый раздел тикетов',
  'tickets_section_management' => 'Управление тикетами',
  'tickets_section_duplicate' => 'Копировать секцию',
  'tickets_section_unpublish' => 'Снять с публикации',
  'tickets_section_publish' => 'Опубликовать секцию',
  'tickets_section_undelete' => 'Восстановить секцию',
  'tickets_section_delete' => 'Удалить секцию',
  'tickets_section_view' => 'Просмотреть на сайте',
  'tickets_section_settings' => 'Настройки раздела',
  'tickets_section_tab_main' => 'Основные',
  'tickets_section_tab_tickets' => 'Дочерние тикеты',
  'tickets_section_tab_tickets_intro' => 'Все настройки на этой странице действуют только на новые тикеты.',
  'tickets_section_settings_template' => 'Шаблон дочерних документов',
  'tickets_section_settings_template_desc' => 'Выберите шаблон, который будет присвоен всем новым тикетам, создаваемым в этой секции. Если шаблон не указан - он будет взят из системной настройки <b>tickets.default_template</b>.',
  'tickets_section_settings_uri' => 'Формирование URI',
  'tickets_section_settings_uri_desc' => 'Вы можете использовать <b>%y</b> - год двумя цифрами, <b>%m</b> - месяц, <b>%d</b> - день, <b>%alias</b> - псевдоним, <b>%id</b> - идентификатор и <b>%ext</b> - расширение документа.',
  'tickets_section_settings_show_in_tree' => 'Показывать в дереве',
  'tickets_section_settings_show_in_tree_desc' => 'По умолчанию тикеты не показываются в дереве документов, чтобы снизить нагрузку на админку, но вы можете включить это для новых документов.',
  'tickets_section_settings_hidemenu' => 'Скрыть в меню',
  'tickets_section_settings_hidemenu_desc' => 'Вы можете указать настройку отображения новых тикетов в меню.',
  'tickets_section_settings_disable_jevix' => 'Отключить Jevix',
  'tickets_section_settings_disable_jevix_desc' => 'По умолчанию, в целях безопасности, все тикеты обрабатываются сниппетом Jevix. Вы можете отключить эту обработку для новых тикетов текущего раздела.',
  'tickets_section_settings_process_tags' => 'Выполнять теги MODX',
  'tickets_section_settings_process_tags_desc' => 'По умолчанию, в целях безопасности, в тикетах не выполняются теги MODX. Вы можете включить их выполнение в новых тикетах текущего раздела.',
  'tickets_section_tab_ratings' => 'Рейтинги',
  'tickets_section_tab_ratings_intro' => 'Укажите очки рейтинга для разных действий пользователей в этом разделе.',
  'tickets_section_rating_ticket' => 'Тикеты',
  'tickets_section_rating_ticket_desc' => 'Очки рейтинга за создание тикета в этом разделе.',
  'tickets_section_rating_comment' => 'Комментарии',
  'tickets_section_rating_comment_desc' => 'Очки рейтинга за комментирование тикетов этого раздела.',
  'tickets_section_rating_view' => 'Просмотры',
  'tickets_section_rating_view_desc' => 'Очки за просмотр тикетов в этом разделе.',
  'tickets_section_rating_vote_ticket' => 'Голос за тикет',
  'tickets_section_rating_vote_ticket_desc' => 'Очки рейтинга автору тикета за каждое голосование. Отрицательные голоса отнимают рейтинг.',
  'tickets_section_rating_vote_comment' => 'Голос за комментарий',
  'tickets_section_rating_vote_comment_desc' => 'Очки рейтинга автору комментария за каждое голосование. Отрицательные голоса отнимают рейтинг.',
  'tickets_section_rating_star_ticket' => 'Тикет в избранном',
  'tickets_section_rating_star_ticket_desc' => 'Очки рейтинга автору тикета за каждое добавление в избранное.',
  'tickets_section_rating_star_comment' => 'Коммент в избранном',
  'tickets_section_rating_star_comment_desc' => 'Очки рейтинга автору комментария за каждое добавление в избранное.',
  'tickets_section_notify' => 'Уведомлять о новых тикетах',
  'tickets_section_subscribed' => 'Вы подписались на уведомления о новых тикетах в этой секции.',
  'tickets_section_unsubscribed' => 'Вы больше не будете получать уведомления о тикетах из этой секции.',
  'tickets_section_email_subscription' => 'Новый тикет в секции "[[+section.pagetitle]]"',
  'ticket_create_here' => 'Создать тикет',
  'ticket_no_comments' => 'На этой странице еще нет комментариев. Вы можете написать первый.',
  'err_no_jevix' => 'Для работы необходим сниппет Jevix. Вы должны установить его из репозитория MODX.',
  'tickets_err_unknown' => 'Произошла неизвестная ошибка.',
  'tickets_message_close_all' => 'закрыть все',
  'ticket_err_id' => 'Тикет с указанным id = [[+id]] не найден.',
  'ticket_err_wrong_user' => 'Вы пытаетесь обновить тикет, который вам не принадлежит.',
  'ticket_err_no_auth' => 'Вы должны авторизоваться, чтобы создать тикет.',
  'ticket_err_wrong_parent' => 'Указан неверный раздел для тикета.',
  'ticket_err_wrong_resource' => 'Указан неверный тикет.',
  'ticket_err_wrong_thread' => 'Указана неверная ветвь комментариев.',
  'ticket_err_wrong_section' => 'Указана неверная секция тикетов.',
  'ticket_err_access_denied' => 'Доступ запрещен.',
  'ticket_err_form' => 'В форме содержатся ошибки. Пожалуйста, исправьте их.',
  'ticket_err_deleted_comment' => 'Вы пытаетесь отредактировать удалённый комментарий.',
  'ticket_err_unpublished_comment' => 'Этот комментарий еще не был опубликован.',
  'ticket_err_ticket' => 'Указанный тикет не существует.',
  'ticket_err_vote_own' => 'Вы не можете голосовать за свой тикет.',
  'ticket_err_vote_already' => 'Вы уже голосовали за этот тикет.',
  'ticket_err_empty' => 'Вы забыли написать текст тикета.',
  'ticket_err_publish' => 'Вам запрещено публиковать тикеты.',
  'ticket_err_cut' => 'Длина текста [[+length]] символов. Вы должны указать тег &lt;cut/&gt, если текст больше [[+max_cut]] символов.',
  'ticket_unpublished_comment' => 'Ваш комментарий будет опубликован после проверки.',
  'permission_denied' => 'У вас недостаточно прав для этого действия.',
  'field_required' => 'Это поле обязательно.',
  'ticket_clear' => 'Очистить',
  'ticket_comments_intro' => 'Здесь собраны комментарии со всего сайта.',
  'ticket_comment_deleted_text' => 'Комментарий был удален.',
  'ticket_comment_remove_confirm' => 'Вы уверены, что хотите окончательно удалить <b>ветвь комментариев</b>, начиная с этого? Эта операция необратима!',
  'ticket_comment_name' => 'Автор',
  'ticket_comment_text' => 'Комментарий',
  'ticket_comment_createdon' => 'Написан',
  'ticket_comment_editedon' => 'Изменен',
  'ticket_comment_deletedon' => 'Удалён',
  'ticket_comment_parent' => 'Родитель',
  'ticket_comment_thread' => 'Ветка',
  'ticket_comment_email' => 'Email',
  'ticket_comment_view' => 'Открыть комментарий на сайте',
  'ticket_comment_reply' => 'ответить',
  'ticket_comment_edit' => 'изменить',
  'ticket_comment_create' => 'Написать комментарий',
  'ticket_comment_preview' => 'Предпросмотр',
  'ticket_comment_save' => 'Написать',
  'ticket_comment_was_edited' => 'Комментарий был изменён',
  'ticket_comment_guest' => 'Гость',
  'ticket_comment_deleted' => 'Удалён',
  'ticket_comment_captcha' => 'Введите сумму [[+a]] + [[+b]]',
  'ticket_comment_notify' => 'Уведомлять о новых комментариях',
  'ticket_comment_err_id' => 'Комментарий с указанным id = [[+id]] не найден.',
  'ticket_comment_err_no_auth' => 'Вы должны авторизоваться, чтобы оставлять комментарии.',
  'ticket_comment_err_wrong_user' => 'Вы пытаетесь обновить комментарий, который вам не принадлежит.',
  'ticket_comment_err_no_time' => 'Время для редактирования истекло.',
  'ticket_comment_err_has_replies' => 'У этого комментария уже есть ответы, поэтому, вы не можете его менять.',
  'ticket_comment_err_parent' => 'Комментарий, на который вы отвечаете не существует.',
  'ticket_comment_err_comment' => 'Указанный комментарий не существует.',
  'ticket_comment_err_vote_own' => 'Вы не можете голосовать за свой комментарий.',
  'ticket_comment_err_vote_already' => 'Вы уже голосовали за этот комментарий.',
  'ticket_comment_err_wrong_guest_ip' => 'Вы не авторизованы и ваш ip не совпадает с ip автора этого комментария.',
  'ticket_comment_err_empty' => 'Вы забыли написать комментарий.',
  'ticket_comment_err_email' => 'Вы указали неверный email.',
  'ticket_comment_err_guest_edit' => 'Вам запрещено редактировать комментарии.',
  'ticket_comment_err_captcha' => 'Указан неверный код защиты от спама.',
  'ticket_comment_err_no_email' => 'Вам нужно указать email в настройках вашего аккаунта.',
  'ticket_authors_intro' => 'В этом разделе собраны профили авторов с рейтингами. Настройки для подсчёта указываются раздельно у каждой секции.<br/>Вы видите сколько тикетов, комментариев и просмотров сделал автор, а также сколько добавили в избранное и проголосовали за них другие пользователи.',
  'ticket_authors_rebuild' => 'Обновление рейтингов',
  'ticket_authors_rebuild_confirm' => 'Вы действительно хотите перестроить рейтинги всех авторов сайта? Эта операция может занять много времени.',
  'ticket_authors_rebuild_wait' => 'Обрабатываю профили авторов...',
  'ticket_authors_rebuild_wait_ext' => 'Обработано: [[+processed]] из [[+total]].',
  'ticket_author_createdon' => 'Был создан',
  'ticket_author_visitedon' => 'Заходил',
  'ticket_author_rating' => 'Рейтинг',
  'ticket_author_tickets' => 'Тикеты',
  'ticket_author_comments' => 'Комментарии',
  'ticket_author_views' => 'Просмотры',
  'ticket_author_stars' => 'Избранное',
  'ticket_author_stars_tickets' => 'Избранные тикеты',
  'ticket_author_stars_comments' => 'Избранные комменты',
  'ticket_author_votes_tickets' => 'Рейтинг тикетов',
  'ticket_author_votes_comments' => 'Рейтинг комментариев',
  'ticket_author_votes_tickets_up' => 'Голоса за тикеты',
  'ticket_author_votes_tickets_down' => 'Голоса против тикетов',
  'ticket_author_votes_comments_up' => 'Голоса за комменты',
  'ticket_author_votes_comments_down' => 'Голоса против комментов',
  'ticket_author_rating_desc' => 'За / Против',
  'ticket_author_stars_desc' => 'Тикеты / Комментарии',
  'ticket_tickets_intro' => 'Здесь собраны тикеты со всего сайта.',
  'ticket_pagetitle' => 'Заголовок',
  'ticket_parent' => 'Секция',
  'ticket_author' => 'Автор',
  'ticket_delete' => 'Удалить тикет',
  'ticket_delete_text' => 'Вы уверены, что хотите удалить этот тикет?',
  'ticket_create' => 'Создать тикет',
  'ticket_disable_jevix' => 'Отключить Jevix',
  'ticket_disable_jevix_help' => 'Выводить контент страницы без фильтрации сниппетом Jevix. <b>Очень опасно</b>, так как любой пользователь, создающий страницу, сможет атаковать ваш сайт (XSS, LFI и т.п.)',
  'ticket_process_tags' => 'Выполнять теги MODX',
  'ticket_process_tags_help' => 'По умолчанию, теги в квадратных скобках выводятся как есть, без обработки парсером. Если включите, на этой странице будут запускаться сниппеты, чанки и т.д.',
  'ticket_private' => 'Закрытый тикет',
  'ticket_private_help' => 'Если включено, пользователю требуется разрешение "ticket_view_private" для просмотра этого тикета.',
  'ticket_show_in_tree' => 'Показывать в дереве',
  'ticket_show_in_tree_help' => 'По умолчанию, тикеты не показываются в дереве ресурсов MODX, чтобы не нагружать его.',
  'ticket_createdon' => 'Создан',
  'ticket_publishedon' => 'Опубликован',
  'ticket_content' => 'Содержимое',
  'ticket_publish' => 'Опубликовать',
  'ticket_preview' => 'Предпросмотр',
  'ticket_comments' => 'Комментарии',
  'ticket_actions' => 'Действия',
  'ticket_save' => 'Сохранить',
  'ticket_draft' => 'В черновики',
  'ticket_open' => 'Открыть',
  'ticket_read_more' => 'Читать дальше',
  'ticket_saved' => 'Сохранено!',
  'ticket_threads_intro' => 'Ветки комментариев. Как правило, одна ветка - это комментарии одной страницы.',
  'ticket_thread' => 'Ветка комментариев',
  'ticket_thread_name' => 'Имя ветки',
  'ticket_thread_createdon' => 'Создана',
  'ticket_thread_editedon' => 'Изменена',
  'ticket_thread_deletedon' => 'Удалёна',
  'ticket_thread_comments' => 'Комментарии',
  'ticket_thread_resource' => 'Id тикета',
  'ticket_thread_delete' => 'Отключить ветку',
  'ticket_thread_undelete' => 'Включить ветку',
  'ticket_thread_close' => 'Закрыть ветку',
  'ticket_thread_open' => 'Открыть ветку',
  'ticket_thread_remove' => 'Удалить с комментариями',
  'ticket_thread_remove_confirm' => 'Вы дейcтвительно хотите удалить <b>всю</b> ветвь комментариев? Эта операция необратима!',
  'ticket_thread_view' => 'Просмотреть на сайте',
  'ticket_thread_err_deleted' => 'Комментирование отключено.',
  'ticket_thread_err_closed' => 'Добавление новых комментариев запрещено.',
  'ticket_thread_manage_comments' => 'Управление комментариями',
  'ticket_thread_subscribed' => 'Вы подписались на уведомления о новых комментариях в этой теме.',
  'ticket_thread_unsubscribed' => 'Вы больше не будете получать уведомления о комментариях из этой темы.',
  'ticket_date_now' => 'Только что',
  'ticket_date_today' => 'Сегодня в',
  'ticket_date_yesterday' => 'Вчера в',
  'ticket_date_tomorrow' => 'Завтра в',
  'ticket_date_minutes_back' => '["[[+minutes]] минута назад","[[+minutes]] минуты назад","[[+minutes]] минут назад"]',
  'ticket_date_minutes_back_less' => 'меньше минуты назад',
  'ticket_date_hours_back' => '["[[+hours]] час назад","[[+hours]] часа назад","[[+hours]] часов назад"]',
  'ticket_date_hours_back_less' => 'меньше часа назад',
  'ticket_date_months' => '["января","февраля","марта","апреля","мая","июня","июля","августа","сентября","октября","ноября","декабря"]',
  'ticket_comment_email_owner' => 'Новый комментарий к вашему тикету "[[+pagetitle]]"',
  'ticket_comment_email_reply' => 'Ответ на ваш комментарий к тикету "[[+pagetitle]]"',
  'ticket_comment_email_subscription' => 'Новый комментарий в теме "[[+pagetitle]]"',
  'ticket_comment_email_bcc' => 'Новый комментарий в теме "[[+pagetitle]]"',
  'ticket_comment_email_unpublished_bcc' => 'Неопубликованный комментарий в теме "[[+pagetitle]]"',
  'ticket_email_bcc' => 'Новый тикет у вас на сайте - "[[+pagetitle]]"',
  'ticket_like' => 'Нравится',
  'ticket_dislike' => 'Не нравится',
  'ticket_refrain' => 'Посмотреть рейтинг',
  'ticket_rating_total' => 'Всего',
  'ticket_rating_and' => 'и',
  'ticket_file_select' => 'Выберите файлы',
  'ticket_file_delete' => 'Удалить',
  'ticket_file_restore' => 'Восстановить',
  'ticket_file_insert' => 'Вставить ссылку',
  'ticket_err_source_initialize' => 'Не могу инициализировать хранилище файлов',
  'ticket_err_file_ns' => 'Не могу обработать указанный файл',
  'ticket_err_file_ext' => 'Неправильно расширение файла',
  'ticket_err_file_save' => 'Не могу загрузить файл',
  'ticket_err_file_owner' => 'Этот файл вам принадлежит не вам',
  'ticket_err_file_exists' => 'Файл с таким именем или содержимым уже существует: "[[+file]]"',
  'ticket_uploaded_files' => 'Загруженные файлы',
  'tickets_action_view' => 'Просмотреть',
  'tickets_action_edit' => 'Изменить',
  'tickets_action_publish' => 'Опубликовать',
  'tickets_action_unpublish' => 'Снять с публикации',
  'tickets_action_delete' => 'Удалить',
  'tickets_action_undelete' => 'Восстановить',
  'tickets_action_remove' => 'Уничтожить',
  'tickets_action_duplicate' => 'Копировать',
  'tickets_action_open' => 'Открыть',
  'tickets_action_close' => 'Закрыть',
);