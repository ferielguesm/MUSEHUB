<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/xdebug' => [[['_route' => '_profiler_xdebug', '_controller' => 'web_profiler.controller.profiler::xdebugAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/admin/dashboard' => [[['_route' => 'app_admin_dashboard', '_controller' => 'App\\Controller\\AdminController::dashboard'], null, null, null, false, false, null]],
        '/admin/stats' => [[['_route' => 'admin_stats', '_controller' => 'App\\Controller\\AdminController::stats'], null, null, null, false, false, null]],
        '/admin/artworks' => [
            [['_route' => 'admin_artwork_index', '_controller' => 'App\\Controller\\ArtworkAdminController::index'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'admin_artworks_list', '_controller' => 'App\\Controller\\ArtworkDashboardController::list'], null, ['GET' => 0], null, false, false, null],
        ],
        '/api/artworks' => [
            [['_route' => 'api_artworks_list', '_controller' => 'App\\Controller\\ArtworkApiController::list'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'api_artworks_create', '_controller' => 'App\\Controller\\ArtworkApiController::create'], null, ['POST' => 0], null, false, false, null],
        ],
        '/admin/artworks/statistics' => [[['_route' => 'admin_artworks_stats', '_controller' => 'App\\Controller\\ArtworkDashboardController::statistics'], null, ['GET' => 0], null, false, false, null]],
        '/admin/artworks/new' => [[['_route' => 'admin_artwork_new', '_controller' => 'App\\Controller\\ArtworkDashboardController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/admin/artworks/categories' => [[['_route' => 'admin_category_index', '_controller' => 'App\\Controller\\ArtworkDashboardController::categories'], null, ['GET' => 0], null, false, false, null]],
        '/admin/artworks/categories/new' => [[['_route' => 'admin_category_new', '_controller' => 'App\\Controller\\ArtworkDashboardController::categoryNew'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/api/auth/register' => [
            [['_route' => 'api_auth_register', '_controller' => 'App\\Controller\\AuthApiController::register'], null, ['POST' => 0], null, false, false, null],
            [['_route' => 'api_auth_register_form', '_controller' => 'App\\Controller\\RegistrationController::apiRegisterRedirect'], null, ['GET' => 0], null, false, false, null],
        ],
        '/api/auth/me' => [[['_route' => 'api_auth_me', '_controller' => 'App\\Controller\\AuthApiController::me'], null, ['GET' => 0], null, false, false, null]],
        '/admin' => [[['_route' => 'admin_dashboard', '_controller' => 'App\\Controller\\BackOfficeController::dashboard'], null, null, null, true, false, null]],
        '/api/chatbot/message' => [[['_route' => 'api_chatbot_message', '_controller' => 'App\\Controller\\ChatbotController::message'], null, ['POST' => 0], null, false, false, null]],
        '/api/chatbot/welcome' => [[['_route' => 'api_chatbot_welcome', '_controller' => 'App\\Controller\\ChatbotController::welcome'], null, ['GET' => 0], null, false, false, null]],
        '/chatbot' => [[['_route' => 'chatbot_interface', '_controller' => 'App\\Controller\\ChatbotController::interface'], null, ['GET' => 0], null, false, false, null]],
        '/api/posts' => [
            [['_route' => 'api_posts_list', '_controller' => 'App\\Controller\\CommunityApiController::list'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'api_posts_create', '_controller' => 'App\\Controller\\CommunityApiController::create'], null, ['POST' => 0], null, false, false, null],
            [['_route' => 'app_post_list', '_controller' => 'App\\Controller\\PostController::list'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'app_post_create', '_controller' => 'App\\Controller\\PostController::create'], null, ['POST' => 0], null, false, false, null],
        ],
        '/community/new' => [[['_route' => 'app_community_new', '_controller' => 'App\\Controller\\CommunityController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/admin/community' => [[['_route' => 'admin_community_list', '_controller' => 'App\\Controller\\CommunityDashboardController::list'], null, ['GET' => 0], null, false, false, null]],
        '/admin/community/posts/new' => [[['_route' => 'admin_community_post_new', '_controller' => 'App\\Controller\\CommunityDashboardController::newPost'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/api/events/search' => [[['_route' => 'api_events_search', '_controller' => 'App\\Controller\\EventApiController::search'], null, ['GET' => 0], null, false, false, null]],
        '/api/events/map' => [[['_route' => 'api_events_map', '_controller' => 'App\\Controller\\EventApiController::map'], null, ['GET' => 0], null, false, false, null]],
        '/api/events' => [[['_route' => 'api_events_create', '_controller' => 'App\\Controller\\EventApiController::create'], null, ['POST' => 0], null, false, false, null]],
        '/admin/events' => [[['_route' => 'admin_events_list', '_controller' => 'App\\Controller\\EventDashboardController::list'], null, ['GET' => 0], null, false, false, null]],
        '/admin/events/new' => [[['_route' => 'admin_events_new', '_controller' => 'App\\Controller\\EventDashboardController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/api/event-types' => [
            [['_route' => 'api_event_types_list', '_controller' => 'App\\Controller\\EventTypeApiController::list'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'api_event_types_create', '_controller' => 'App\\Controller\\EventTypeApiController::create'], null, ['POST' => 0], null, false, false, null],
        ],
        '/api/event-types/stats/summary' => [[['_route' => 'api_event_types_stats', '_controller' => 'App\\Controller\\EventTypeApiController::stats'], null, ['GET' => 0], null, false, false, null]],
        '/admin/event-types' => [[['_route' => 'admin_event_types_list', '_controller' => 'App\\Controller\\EventTypeDashboardController::list'], null, ['GET' => 0], null, false, false, null]],
        '/admin/event-types/new' => [[['_route' => 'admin_event_types_new', '_controller' => 'App\\Controller\\EventTypeDashboardController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/' => [[['_route' => 'home', '_controller' => 'App\\Controller\\FrontOfficeController::index'], null, null, null, false, false, null]],
        '/artworks' => [[['_route' => 'artworks', '_controller' => 'App\\Controller\\FrontOfficeController::artworks'], null, null, null, false, false, null]],
        '/artists' => [[['_route' => 'artists', '_controller' => 'App\\Controller\\FrontOfficeController::artists'], null, null, null, false, false, null]],
        '/events' => [[['_route' => 'events', '_controller' => 'App\\Controller\\FrontOfficeController::events'], null, null, null, false, false, null]],
        '/marketplace' => [[['_route' => 'marketplace', '_controller' => 'App\\Controller\\FrontOfficeController::marketplace'], null, null, null, false, false, null]],
        '/community' => [[['_route' => 'community', '_controller' => 'App\\Controller\\FrontOfficeController::community'], null, null, null, false, false, null]],
        '/harvard-collection' => [[['_route' => 'harvard_collection', '_controller' => 'App\\Controller\\HarvardArtController::index'], null, null, null, false, false, null]],
        '/api/auth/login' => [[['_route' => 'api_auth_login', '_controller' => 'App\\Controller\\JWTAuthenticationController::login'], null, ['POST' => 0], null, false, false, null]],
        '/api/marketplace' => [[['_route' => 'api_marketplace_list', '_controller' => 'App\\Controller\\MarketplaceApiController::list'], null, ['GET' => 0], null, false, false, null]],
        '/api/marketplace/listing' => [[['_route' => 'api_marketplace_create_listing', '_controller' => 'App\\Controller\\MarketplaceApiController::createListing'], null, ['POST' => 0], null, false, false, null]],
        '/admin/marketplace' => [[['_route' => 'admin_marketplace_list', '_controller' => 'App\\Controller\\MarketplaceDashboardController::list'], null, ['GET' => 0], null, false, false, null]],
        '/admin/marketplace/listings/new' => [[['_route' => 'admin_marketplace_listing_new', '_controller' => 'App\\Controller\\MarketplaceDashboardController::newListing'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/messages' => [[['_route' => 'app_messages', '_controller' => 'App\\Controller\\MessageController::index'], null, null, null, false, false, null]],
        '/messages/send/admin' => [[['_route' => 'app_message_send_admin', '_controller' => 'App\\Controller\\MessageController::sendToAdmin'], null, ['POST' => 0], null, false, false, null]],
        '/api/notifications' => [[['_route' => 'api_notifications_list', '_controller' => 'App\\Controller\\NotificationController::list'], null, ['GET' => 0], null, false, false, null]],
        '/api/notifications/unread-count' => [[['_route' => 'api_notifications_unread_count', '_controller' => 'App\\Controller\\NotificationController::unreadCount'], null, ['GET' => 0], null, false, false, null]],
        '/api/notifications/mark-all-read' => [[['_route' => 'api_notifications_mark_all_read', '_controller' => 'App\\Controller\\NotificationController::markAllAsRead'], null, ['POST' => 0], null, false, false, null]],
        '/offre/api/create' => [[['_route' => 'offre_api_create', '_controller' => 'App\\Controller\\OffreController::apiCreate'], null, ['POST' => 0], null, false, false, null]],
        '/offre' => [[['_route' => 'offre_index', '_controller' => 'App\\Controller\\OffreController::index'], null, ['GET' => 0], null, false, false, null]],
        '/offre/new' => [[['_route' => 'offre_new', '_controller' => 'App\\Controller\\OffreController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/admin/marketplace/offres' => [[['_route' => 'admin_offre_list', '_controller' => 'App\\Controller\\OffreDashboardController::list'], null, ['GET' => 0], null, false, false, null]],
        '/admin/marketplace/offres/new' => [[['_route' => 'admin_offre_new', '_controller' => 'App\\Controller\\OffreDashboardController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/api/auth/forgot-password' => [[['_route' => 'api_auth_forgot_password', '_controller' => 'App\\Controller\\PasswordResetController::forgotPassword'], null, ['POST' => 0], null, false, false, null]],
        '/api/auth/reset-password' => [[['_route' => 'api_auth_reset_password', '_controller' => 'App\\Controller\\PasswordResetController::resetPassword'], null, ['POST' => 0], null, false, false, null]],
        '/forgot-password' => [[['_route' => 'password_forgot', '_controller' => 'App\\Controller\\PasswordResetWebController::forgotPassword'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/admin/posts' => [[['_route' => 'admin_post_index', '_controller' => 'App\\Controller\\PostAdminController::index'], null, ['GET' => 0], null, false, false, null]],
        '/profile' => [[['_route' => 'user_profile', '_controller' => 'App\\Controller\\ProfileController::profile'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/register' => [[['_route' => 'register', '_controller' => 'App\\Controller\\RegistrationController::register'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/login' => [[['_route' => 'login', '_controller' => 'App\\Controller\\SecurityController::login'], null, null, null, false, false, null]],
        '/logout' => [[['_route' => 'logout', '_controller' => 'App\\Controller\\SecurityController::logout'], null, null, null, false, false, null]],
        '/admin/transactions' => [[['_route' => 'admin_transactions_list', '_controller' => 'App\\Controller\\TransactionAdminController::index'], null, ['GET' => 0], null, false, false, null]],
        '/admin/users' => [[['_route' => 'admin_users_list', '_controller' => 'App\\Controller\\UserDashboardController::list'], null, ['GET' => 0], null, false, false, null]],
        '/admin/users/new' => [[['_route' => 'admin_users_new', '_controller' => 'App\\Controller\\UserDashboardController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/web/artworks/create' => [[['_route' => 'web_artworks_create', '_controller' => 'App\\Controller\\WebFormController::createArtwork'], null, ['POST' => 0], null, false, false, null]],
        '/web/marketplace/listing/create' => [[['_route' => 'web_marketplace_listing_create', '_controller' => 'App\\Controller\\WebFormController::createListing'], null, ['POST' => 0], null, false, false, null]],
        '/web/posts/create' => [[['_route' => 'web_posts_create', '_controller' => 'App\\Controller\\WebFormController::createPost'], null, ['POST' => 0], null, false, false, null]],
        '/web/marketplace/offre/create' => [[['_route' => 'web_marketplace_offre_create', '_controller' => 'App\\Controller\\WebFormController::createOffre'], null, ['POST' => 0], null, false, false, null]],
        '/posts' => [[['_route' => 'post_index', '_controller' => 'App\\Controller\\WebPostController::index'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/api/webhooks/stripe' => [[['_route' => 'stripe_webhook', '_controller' => 'App\\Controller\\WebhookController::handleStripeWebhook'], null, ['POST' => 0], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:38)'
                    .'|wdt/([^/]++)(*:57)'
                    .'|profiler/(?'
                        .'|font/([^/\\.]++)\\.woff2(*:98)'
                        .'|([^/]++)(?'
                            .'|/(?'
                                .'|search/results(*:134)'
                                .'|router(*:148)'
                                .'|exception(?'
                                    .'|(*:168)'
                                    .'|\\.css(*:181)'
                                .')'
                            .')'
                            .'|(*:191)'
                        .')'
                    .')'
                .')'
                .'|/a(?'
                    .'|pi/(?'
                        .'|artworks/([^/]++)(?'
                            .'|/like(*:238)'
                            .'|(*:246)'
                        .')'
                        .'|posts/(?'
                            .'|([^/]++)(?'
                                .'|/(?'
                                    .'|comments(?'
                                        .'|(*:290)'
                                        .'|/([^/]++)(?'
                                            .'|(*:310)'
                                            .'|/replies(*:326)'
                                            .'|(*:334)'
                                        .')'
                                        .'|(*:343)'
                                    .')'
                                    .'|like(*:356)'
                                    .'|dislike(*:371)'
                                    .'|reaction(*:387)'
                                .')'
                                .'|(*:396)'
                            .')'
                            .'|search(*:411)'
                            .'|([^/]++)/upload\\-image(*:441)'
                        .')'
                        .'|event(?'
                            .'|s/([^/]++)(?'
                                .'|/(?'
                                    .'|map(*:478)'
                                    .'|join(*:490)'
                                    .'|leave(*:503)'
                                    .'|ics(*:514)'
                                .')'
                                .'|(*:523)'
                            .')'
                            .'|\\-types/([^/]++)(?'
                                .'|(*:551)'
                            .')'
                        .')'
                        .'|marketplace/(?'
                            .'|buy/([^/]++)(*:588)'
                            .'|listing/([^/]++)(?'
                                .'|(*:615)'
                            .')'
                            .'|invoice/([^/]++)(*:640)'
                        .')'
                        .'|notifications/([^/]++)/read(*:676)'
                    .')'
                    .'|dmin/(?'
                        .'|artworks/(?'
                            .'|([^/]++)/(?'
                                .'|edit(*:721)'
                                .'|delete(*:735)'
                            .')'
                            .'|categories/([^/]++)/(?'
                                .'|edit(*:771)'
                                .'|delete(*:785)'
                            .')'
                            .'|([^/]++)/check\\-stolen(*:816)'
                        .')'
                        .'|comm(?'
                            .'|unity/posts/([^/]++)/(?'
                                .'|edit(*:860)'
                                .'|delete(*:874)'
                            .')'
                            .'|ents/([^/]++)/moderate(*:905)'
                        .')'
                        .'|event(?'
                            .'|s/([^/]++)/(?'
                                .'|edit(*:940)'
                                .'|delete(*:954)'
                                .'|participants(?'
                                    .'|(*:977)'
                                    .'|/([^/]++)/status(*:1001)'
                                .')'
                            .')'
                            .'|\\-types/([^/]++)/(?'
                                .'|edit(*:1036)'
                                .'|delete(*:1051)'
                                .'|toggle(*:1066)'
                            .')'
                        .')'
                        .'|marketplace/(?'
                            .'|listings/([^/]++)/(?'
                                .'|show(*:1117)'
                                .'|edit(*:1130)'
                                .'|delete(*:1145)'
                            .')'
                            .'|offres/([^/]++)/(?'
                                .'|edit(*:1178)'
                                .'|delete(*:1193)'
                                .'|accept(*:1208)'
                                .'|refuse(*:1223)'
                            .')'
                        .')'
                        .'|posts/([^/]++)/(?'
                            .'|moderate(*:1260)'
                            .'|comments(*:1277)'
                        .')'
                        .'|transactions/invoice/([^/]++)(*:1316)'
                        .'|users/([^/]++)/(?'
                            .'|edit(*:1347)'
                            .'|toggle(*:1362)'
                            .'|delete(*:1377)'
                        .')'
                    .')'
                    .'|rtworks/(\\d+)(*:1401)'
                .')'
                .'|/community/(?'
                    .'|([^/]++)(?'
                        .'|(*:1436)'
                        .'|/(?'
                            .'|edit(*:1453)'
                            .'|delete(*:1468)'
                        .')'
                    .')'
                    .'|admin(*:1484)'
                    .'|posts(?'
                        .'|(*:1501)'
                        .'|/([^/]++)(*:1519)'
                    .')'
                .')'
                .'|/m(?'
                    .'|arketplace/offers/(\\d+)(*:1558)'
                    .'|essages/(?'
                        .'|conversation/([^/]++)(*:1599)'
                        .'|send/(\\d+)(*:1618)'
                    .')'
                .')'
                .'|/offre/(?'
                    .'|listing/([^/]++)(*:1655)'
                    .'|([^/]++)(?'
                        .'|(*:1675)'
                        .'|/(?'
                            .'|edit(*:1692)'
                            .'|accept(*:1707)'
                            .'|refuse(*:1722)'
                            .'|delete(*:1737)'
                        .')'
                    .')'
                    .'|my\\-offres(*:1758)'
                    .'|by\\-status/([^/]++)(*:1786)'
                .')'
                .'|/reset\\-password/([^/]++)(*:1821)'
                .'|/web/(?'
                    .'|events/([^/]++)/(?'
                        .'|subscribe(*:1866)'
                        .'|unsubscribe(*:1886)'
                    .')'
                    .'|posts/([^/]++)/(?'
                        .'|update(*:1920)'
                        .'|delete(*:1935)'
                        .'|comment(?'
                            .'|(*:1954)'
                            .'|s/([^/]++)/(?'
                                .'|update(*:1983)'
                                .'|delete(*:1998)'
                            .')'
                        .')'
                    .')'
                .')'
                .'|/posts/([^/]++)(*:2026)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        38 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        57 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        98 => [[['_route' => '_profiler_font', '_controller' => 'web_profiler.controller.profiler::fontAction'], ['fontName'], null, null, false, false, null]],
        134 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        148 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        168 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        181 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        191 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        238 => [[['_route' => 'api_artworks_like', '_controller' => 'App\\Controller\\ArtworkApiController::like'], ['id'], ['POST' => 0], null, false, false, null]],
        246 => [
            [['_route' => 'api_artworks_update', '_controller' => 'App\\Controller\\ArtworkApiController::update'], ['id'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_artworks_delete', '_controller' => 'App\\Controller\\ArtworkApiController::delete'], ['id'], ['DELETE' => 0], null, false, true, null],
        ],
        290 => [[['_route' => 'create_comment', '_controller' => 'App\\Controller\\CommentController::create'], ['postId'], ['POST' => 0], null, false, false, null]],
        310 => [[['_route' => 'update_comment', '_controller' => 'App\\Controller\\CommentController::update'], ['postId', 'id'], ['PUT' => 0], null, false, true, null]],
        326 => [[['_route' => 'api_posts_comments_reply', '_controller' => 'App\\Controller\\CommentController::createReply'], ['postId', 'id'], ['POST' => 0], null, false, false, null]],
        334 => [[['_route' => 'delete_comment', '_controller' => 'App\\Controller\\CommentController::delete'], ['postId', 'id'], ['DELETE' => 0], null, false, true, null]],
        343 => [
            [['_route' => 'api_posts_comments', '_controller' => 'App\\Controller\\CommunityApiController::getComments'], ['id'], ['GET' => 0], null, false, false, null],
            [['_route' => 'api_posts_comment', '_controller' => 'App\\Controller\\CommunityApiController::comment'], ['id'], ['POST' => 0], null, false, false, null],
            [['_route' => 'app_post_comment', '_controller' => 'App\\Controller\\PostController::comment'], ['id'], ['POST' => 0], null, false, false, null],
        ],
        356 => [[['_route' => 'api_posts_like', '_controller' => 'App\\Controller\\CommunityApiController::like'], ['id'], ['POST' => 0], null, false, false, null]],
        371 => [[['_route' => 'api_posts_dislike', '_controller' => 'App\\Controller\\CommunityApiController::dislike'], ['id'], ['POST' => 0], null, false, false, null]],
        387 => [[['_route' => 'api_posts_reaction', '_controller' => 'App\\Controller\\CommunityApiController::react'], ['id'], ['POST' => 0], null, false, false, null]],
        396 => [
            [['_route' => 'api_posts_update', '_controller' => 'App\\Controller\\PostController::update'], ['id'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_posts_delete', '_controller' => 'App\\Controller\\PostController::delete'], ['id'], ['DELETE' => 0], null, false, true, null],
        ],
        411 => [[['_route' => 'app_post_search', '_controller' => 'App\\Controller\\PostController::search'], [], ['GET' => 0], null, false, false, null]],
        441 => [[['_route' => 'app_post_uploadimage', '_controller' => 'App\\Controller\\PostController::uploadImage'], ['id'], ['POST' => 0], null, false, false, null]],
        478 => [[['_route' => 'api_events_map_detail', '_controller' => 'App\\Controller\\EventApiController::mapDetail'], ['id'], ['GET' => 0], null, false, false, null]],
        490 => [[['_route' => 'api_events_join', '_controller' => 'App\\Controller\\EventApiController::join'], ['id'], ['POST' => 0], null, false, false, null]],
        503 => [[['_route' => 'api_events_leave', '_controller' => 'App\\Controller\\EventApiController::leave'], ['id'], ['DELETE' => 0], null, false, false, null]],
        514 => [[['_route' => 'api_events_ics', '_controller' => 'App\\Controller\\EventApiController::exportIcs'], ['id'], ['GET' => 0], null, false, false, null]],
        523 => [
            [['_route' => 'api_events_update', '_controller' => 'App\\Controller\\EventApiController::update'], ['id'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_events_delete', '_controller' => 'App\\Controller\\EventApiController::delete'], ['id'], ['DELETE' => 0], null, false, true, null],
        ],
        551 => [
            [['_route' => 'api_event_types_show', '_controller' => 'App\\Controller\\EventTypeApiController::show'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_event_types_update', '_controller' => 'App\\Controller\\EventTypeApiController::update'], ['id'], ['PUT' => 0, 'PATCH' => 1], null, false, true, null],
            [['_route' => 'api_event_types_delete', '_controller' => 'App\\Controller\\EventTypeApiController::delete'], ['id'], ['DELETE' => 0], null, false, true, null],
        ],
        588 => [[['_route' => 'api_marketplace_buy', '_controller' => 'App\\Controller\\MarketplaceApiController::buy'], ['id'], ['POST' => 0], null, false, true, null]],
        615 => [
            [['_route' => 'api_marketplace_update_listing', '_controller' => 'App\\Controller\\MarketplaceApiController::updateListing'], ['id'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_marketplace_delete_listing', '_controller' => 'App\\Controller\\MarketplaceApiController::deleteListing'], ['id'], ['DELETE' => 0], null, false, true, null],
        ],
        640 => [[['_route' => 'api_marketplace_invoice', '_controller' => 'App\\Controller\\MarketplaceApiController::getInvoice'], ['uuid'], ['GET' => 0], null, false, true, null]],
        676 => [[['_route' => 'api_notifications_mark_read', '_controller' => 'App\\Controller\\NotificationController::markAsRead'], ['id'], ['POST' => 0], null, false, false, null]],
        721 => [[['_route' => 'admin_artwork_edit', '_controller' => 'App\\Controller\\ArtworkDashboardController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        735 => [[['_route' => 'admin_artwork_delete', '_controller' => 'App\\Controller\\ArtworkDashboardController::delete'], ['id'], ['POST' => 0], null, false, false, null]],
        771 => [[['_route' => 'admin_category_edit', '_controller' => 'App\\Controller\\ArtworkDashboardController::categoryEdit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        785 => [[['_route' => 'admin_category_delete', '_controller' => 'App\\Controller\\ArtworkDashboardController::categoryDelete'], ['id'], ['POST' => 0], null, false, false, null]],
        816 => [[['_route' => 'admin_artwork_check_stolen', '_controller' => 'App\\Controller\\ArtworkDashboardController::checkStolen'], ['id'], ['GET' => 0], null, false, false, null]],
        860 => [[['_route' => 'admin_community_post_edit', '_controller' => 'App\\Controller\\CommunityDashboardController::editPost'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        874 => [[['_route' => 'admin_community_post_delete', '_controller' => 'App\\Controller\\CommunityDashboardController::deletePost'], ['id'], ['POST' => 0], null, false, false, null]],
        905 => [[['_route' => 'admin_comment_moderate', '_controller' => 'App\\Controller\\PostAdminController::moderateComment'], ['id'], ['POST' => 0], null, false, false, null]],
        940 => [[['_route' => 'admin_events_edit', '_controller' => 'App\\Controller\\EventDashboardController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        954 => [[['_route' => 'admin_events_delete', '_controller' => 'App\\Controller\\EventDashboardController::delete'], ['id'], ['POST' => 0], null, false, false, null]],
        977 => [[['_route' => 'admin_events_participants', '_controller' => 'App\\Controller\\EventDashboardController::participants'], ['id'], ['GET' => 0], null, false, false, null]],
        1001 => [[['_route' => 'admin_events_participant_status', '_controller' => 'App\\Controller\\EventDashboardController::updateParticipantStatus'], ['eventId', 'participantId'], ['POST' => 0], null, false, false, null]],
        1036 => [[['_route' => 'admin_event_types_edit', '_controller' => 'App\\Controller\\EventTypeDashboardController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        1051 => [[['_route' => 'admin_event_types_delete', '_controller' => 'App\\Controller\\EventTypeDashboardController::delete'], ['id'], ['POST' => 0], null, false, false, null]],
        1066 => [[['_route' => 'admin_event_types_toggle', '_controller' => 'App\\Controller\\EventTypeDashboardController::toggle'], ['id'], ['POST' => 0], null, false, false, null]],
        1117 => [[['_route' => 'admin_marketplace_listing_show', '_controller' => 'App\\Controller\\MarketplaceDashboardController::showListing'], ['id'], ['GET' => 0], null, false, false, null]],
        1130 => [[['_route' => 'admin_marketplace_listing_edit', '_controller' => 'App\\Controller\\MarketplaceDashboardController::editListing'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        1145 => [[['_route' => 'admin_marketplace_listing_delete', '_controller' => 'App\\Controller\\MarketplaceDashboardController::deleteListing'], ['id'], ['POST' => 0], null, false, false, null]],
        1178 => [[['_route' => 'admin_offre_edit', '_controller' => 'App\\Controller\\OffreDashboardController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        1193 => [[['_route' => 'admin_offre_delete', '_controller' => 'App\\Controller\\OffreDashboardController::delete'], ['id'], ['POST' => 0], null, false, false, null]],
        1208 => [[['_route' => 'admin_offre_accept', '_controller' => 'App\\Controller\\OffreDashboardController::accept'], ['id'], ['POST' => 0], null, false, false, null]],
        1223 => [[['_route' => 'admin_offre_refuse', '_controller' => 'App\\Controller\\OffreDashboardController::refuse'], ['id'], ['POST' => 0], null, false, false, null]],
        1260 => [[['_route' => 'admin_post_moderate', '_controller' => 'App\\Controller\\PostAdminController::moderate'], ['id'], ['POST' => 0], null, false, false, null]],
        1277 => [[['_route' => 'admin_post_comments', '_controller' => 'App\\Controller\\PostAdminController::comments'], ['id'], ['GET' => 0], null, false, false, null]],
        1316 => [[['_route' => 'admin_transactions_invoice', '_controller' => 'App\\Controller\\TransactionAdminController::invoice'], ['uuid'], ['GET' => 0], null, false, true, null]],
        1347 => [[['_route' => 'admin_users_edit', '_controller' => 'App\\Controller\\UserDashboardController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        1362 => [[['_route' => 'admin_users_toggle', '_controller' => 'App\\Controller\\UserDashboardController::toggle'], ['id'], ['POST' => 0], null, false, false, null]],
        1377 => [[['_route' => 'admin_users_delete', '_controller' => 'App\\Controller\\UserDashboardController::delete'], ['id'], ['POST' => 0], null, false, false, null]],
        1401 => [[['_route' => 'artwork_show', '_controller' => 'App\\Controller\\FrontOfficeController::artworkShow'], ['id'], null, null, false, true, null]],
        1436 => [[['_route' => 'app_community_show', '_controller' => 'App\\Controller\\CommunityController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        1453 => [[['_route' => 'app_community_edit', '_controller' => 'App\\Controller\\CommunityController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        1468 => [[['_route' => 'app_community_delete', '_controller' => 'App\\Controller\\CommunityController::delete'], ['id'], ['POST' => 0], null, false, false, null]],
        1484 => [[['_route' => 'app_community_admin', '_controller' => 'App\\Controller\\CommunityController::admin'], [], ['GET' => 0], null, false, false, null]],
        1501 => [[['_route' => 'community_posts', '_controller' => 'App\\Controller\\WebPostController::index'], [], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        1519 => [[['_route' => 'community_post_show', '_controller' => 'App\\Controller\\WebPostController::show'], ['id'], ['GET' => 0, 'POST' => 1], null, false, true, null]],
        1558 => [[['_route' => 'marketplace_offer_show', '_controller' => 'App\\Controller\\FrontOfficeController::marketplaceOffer'], ['id'], null, null, false, true, null]],
        1599 => [[['_route' => 'app_message_show', '_controller' => 'App\\Controller\\MessageController::show'], ['id'], null, null, false, true, null]],
        1618 => [[['_route' => 'app_message_send', '_controller' => 'App\\Controller\\MessageController::send'], ['id'], ['POST' => 0], null, false, true, null]],
        1655 => [[['_route' => 'offre_by_listing', '_controller' => 'App\\Controller\\OffreController::byListing'], ['id'], ['GET' => 0], null, false, true, null]],
        1675 => [[['_route' => 'offre_show', '_controller' => 'App\\Controller\\OffreController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        1692 => [[['_route' => 'offre_edit', '_controller' => 'App\\Controller\\OffreController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        1707 => [[['_route' => 'offre_accept', '_controller' => 'App\\Controller\\OffreController::accept'], ['id'], ['POST' => 0], null, false, false, null]],
        1722 => [[['_route' => 'offre_refuse', '_controller' => 'App\\Controller\\OffreController::refuse'], ['id'], ['POST' => 0], null, false, false, null]],
        1737 => [[['_route' => 'offre_delete', '_controller' => 'App\\Controller\\OffreController::delete'], ['id'], ['POST' => 0], null, false, false, null]],
        1758 => [[['_route' => 'offre_my_offres', '_controller' => 'App\\Controller\\OffreController::myOffres'], [], ['GET' => 0], null, false, false, null]],
        1786 => [[['_route' => 'offre_by_status', '_controller' => 'App\\Controller\\OffreController::byStatus'], ['statut'], ['GET' => 0], null, false, true, null]],
        1821 => [[['_route' => 'password_reset_form', '_controller' => 'App\\Controller\\PasswordResetWebController::resetPassword'], ['token'], ['GET' => 0, 'POST' => 1], null, false, true, null]],
        1866 => [[['_route' => 'web_events_subscribe', '_controller' => 'App\\Controller\\WebFormController::subscribeToEvent'], ['id'], ['POST' => 0], null, false, false, null]],
        1886 => [[['_route' => 'web_events_unsubscribe', '_controller' => 'App\\Controller\\WebFormController::unsubscribeFromEvent'], ['id'], ['POST' => 0], null, false, false, null]],
        1920 => [[['_route' => 'web_posts_update', '_controller' => 'App\\Controller\\WebFormController::updatePost'], ['id'], ['POST' => 0], null, false, false, null]],
        1935 => [[['_route' => 'web_posts_delete', '_controller' => 'App\\Controller\\WebFormController::deletePost'], ['id'], ['POST' => 0], null, false, false, null]],
        1954 => [[['_route' => 'web_posts_comment', '_controller' => 'App\\Controller\\WebFormController::commentPost'], ['id'], ['POST' => 0], null, false, false, null]],
        1983 => [[['_route' => 'web_comments_update', '_controller' => 'App\\Controller\\WebFormController::updateComment'], ['postId', 'commentId'], ['POST' => 0], null, false, false, null]],
        1998 => [[['_route' => 'web_comments_delete', '_controller' => 'App\\Controller\\WebFormController::deleteComment'], ['postId', 'commentId'], ['POST' => 0], null, false, false, null]],
        2026 => [
            [['_route' => 'post_show', '_controller' => 'App\\Controller\\WebPostController::show'], ['id'], ['GET' => 0, 'POST' => 1], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
