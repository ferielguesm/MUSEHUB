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
        '/api/artworks' => [
            [['_route' => 'api_artworks_list', '_controller' => 'App\\Controller\\ArtworkApiController::list'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'api_artworks_create', '_controller' => 'App\\Controller\\ArtworkApiController::create'], null, ['POST' => 0], null, false, false, null],
        ],
        '/admin/artworks' => [[['_route' => 'admin_artworks_list', '_controller' => 'App\\Controller\\ArtworkDashboardController::list'], null, ['GET' => 0], null, false, false, null]],
        '/admin/artworks/statistics' => [[['_route' => 'admin_artworks_stats', '_controller' => 'App\\Controller\\ArtworkDashboardController::statistics'], null, ['GET' => 0], null, false, false, null]],
        '/admin/artworks/new' => [[['_route' => 'admin_artwork_new', '_controller' => 'App\\Controller\\ArtworkDashboardController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/my-artworks' => [[['_route' => 'my_artworks_list', '_controller' => 'App\\Controller\\ArtworkFrontController::list'], null, ['GET' => 0], null, false, false, null]],
        '/my-artworks/new' => [[['_route' => 'my_artwork_new', '_controller' => 'App\\Controller\\ArtworkFrontController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/api/auth/register' => [
            [['_route' => 'api_auth_register', '_controller' => 'App\\Controller\\AuthApiController::register'], null, ['POST' => 0], null, false, false, null],
            [['_route' => 'api_auth_register_form', '_controller' => 'App\\Controller\\RegistrationController::apiRegisterRedirect'], null, ['GET' => 0], null, false, false, null],
        ],
        '/api/auth/me' => [[['_route' => 'api_auth_me', '_controller' => 'App\\Controller\\AuthApiController::me'], null, ['GET' => 0], null, false, false, null]],
        '/admin' => [[['_route' => 'admin_dashboard', '_controller' => 'App\\Controller\\BackOfficeController::dashboard'], null, null, null, true, false, null]],
        '/admin/categories' => [[['_route' => 'admin_category_index', '_controller' => 'App\\Controller\\CategoryAdminController::index'], null, ['GET' => 0], null, false, false, null]],
        '/admin/categories/new' => [[['_route' => 'admin_category_new', '_controller' => 'App\\Controller\\CategoryAdminController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
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
        '/marketplace/offers/my-offers' => [[['_route' => 'marketplace_my_offers', '_controller' => 'App\\Controller\\OfferManagementController::myOffers'], null, ['GET' => 0], null, false, false, null]],
        '/marketplace/offers/received' => [[['_route' => 'marketplace_received_offers', '_controller' => 'App\\Controller\\OfferManagementController::receivedOffers'], null, ['GET' => 0], null, false, false, null]],
        '/offre/api/create' => [[['_route' => 'offre_api_create', '_controller' => 'App\\Controller\\OffreController::apiCreate'], null, ['POST' => 0], null, false, false, null]],
        '/offre' => [[['_route' => 'offre_index', '_controller' => 'App\\Controller\\OffreController::index'], null, ['GET' => 0], null, false, false, null]],
        '/offre/new' => [[['_route' => 'offre_new', '_controller' => 'App\\Controller\\OffreController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/admin/marketplace/offres' => [[['_route' => 'admin_offre_list', '_controller' => 'App\\Controller\\OffreDashboardController::list'], null, ['GET' => 0], null, false, false, null]],
        '/admin/marketplace/offres/new' => [[['_route' => 'admin_offre_new', '_controller' => 'App\\Controller\\OffreDashboardController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/api/auth/forgot-password' => [[['_route' => 'api_auth_forgot_password', '_controller' => 'App\\Controller\\PasswordResetController::forgotPassword'], null, ['POST' => 0], null, false, false, null]],
        '/api/auth/reset-password' => [[['_route' => 'api_auth_reset_password', '_controller' => 'App\\Controller\\PasswordResetController::resetPassword'], null, ['POST' => 0], null, false, false, null]],
        '/forgot-password' => [[['_route' => 'password_forgot', '_controller' => 'App\\Controller\\PasswordResetWebController::forgotPassword'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/payment/success' => [[['_route' => 'payment_success', '_controller' => 'App\\Controller\\PaymentController::success'], null, null, null, false, false, null]],
        '/payment/cancel' => [[['_route' => 'payment_cancel', '_controller' => 'App\\Controller\\PaymentController::cancel'], null, null, null, false, false, null]],
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
                            .'|([^/]++)/(?'
                                .'|upload\\-image(*:444)'
                                .'|react(?'
                                    .'|(*:460)'
                                    .'|ions(*:472)'
                                .')'
                            .')'
                        .')'
                        .'|event(?'
                            .'|s/([^/]++)(?'
                                .'|/(?'
                                    .'|map(*:511)'
                                    .'|join(*:523)'
                                    .'|leave(*:536)'
                                    .'|ics(*:547)'
                                .')'
                                .'|(*:556)'
                            .')'
                            .'|\\-types/([^/]++)(?'
                                .'|(*:584)'
                            .')'
                        .')'
                        .'|marketplace/(?'
                            .'|buy/([^/]++)(*:621)'
                            .'|listing/([^/]++)(?'
                                .'|(*:648)'
                            .')'
                            .'|invoice/([^/]++)(*:673)'
                        .')'
                        .'|notifications/([^/]++)/read(*:709)'
                    .')'
                    .'|dmin/(?'
                        .'|artworks/([^/]++)/(?'
                            .'|edit(*:751)'
                            .'|delete(*:765)'
                            .'|like(*:777)'
                            .'|check\\-stolen(*:798)'
                        .')'
                        .'|c(?'
                            .'|ategories/([^/]++)/(?'
                                .'|edit(*:837)'
                                .'|delete(*:851)'
                            .')'
                            .'|omm(?'
                                .'|unity/posts/([^/]++)/(?'
                                    .'|edit(*:894)'
                                    .'|delete(*:908)'
                                .')'
                                .'|ents/([^/]++)/moderate(*:939)'
                            .')'
                        .')'
                        .'|event(?'
                            .'|s/([^/]++)/(?'
                                .'|edit(*:975)'
                                .'|delete(*:989)'
                                .'|participants(?'
                                    .'|(*:1012)'
                                    .'|/([^/]++)/status(*:1037)'
                                .')'
                            .')'
                            .'|\\-types/([^/]++)/(?'
                                .'|edit(*:1072)'
                                .'|delete(*:1087)'
                                .'|toggle(*:1102)'
                            .')'
                        .')'
                        .'|marketplace/(?'
                            .'|listings/([^/]++)/(?'
                                .'|show(*:1153)'
                                .'|edit(*:1166)'
                                .'|delete(*:1181)'
                            .')'
                            .'|offres/([^/]++)/(?'
                                .'|edit(*:1214)'
                                .'|delete(*:1229)'
                                .'|accept(*:1244)'
                                .'|refuse(*:1259)'
                            .')'
                        .')'
                        .'|posts/([^/]++)/(?'
                            .'|moderate(*:1296)'
                            .'|comments(*:1313)'
                        .')'
                        .'|transactions/invoice/([^/]++)(*:1352)'
                        .'|users/([^/]++)/(?'
                            .'|edit(*:1383)'
                            .'|toggle(*:1398)'
                            .'|delete(*:1413)'
                        .')'
                    .')'
                    .'|rtworks/(\\d+)(*:1437)'
                .')'
                .'|/m(?'
                    .'|y\\-artworks/([^/]++)/(?'
                        .'|edit(*:1480)'
                        .'|delete(*:1495)'
                    .')'
                    .'|arketplace/(?'
                        .'|offers/(?'
                            .'|(\\d+)(*:1534)'
                            .'|([^/]++)/(?'
                                .'|accept(*:1561)'
                                .'|reject(*:1576)'
                            .')'
                        .')'
                        .'|checkout/([^/]++)(*:1604)'
                    .')'
                    .'|essages/(?'
                        .'|conversation/([^/]++)(*:1646)'
                        .'|send/(\\d+)(*:1665)'
                    .')'
                .')'
                .'|/community/(?'
                    .'|([^/]++)(?'
                        .'|(*:1701)'
                        .'|/(?'
                            .'|edit(*:1718)'
                            .'|delete(*:1733)'
                        .')'
                    .')'
                    .'|admin(*:1749)'
                    .'|posts(?'
                        .'|(*:1766)'
                        .'|/([^/]++)(*:1784)'
                    .')'
                .')'
                .'|/events/(\\d+)(*:1808)'
                .'|/offre/(?'
                    .'|listing/([^/]++)(*:1843)'
                    .'|([^/]++)(?'
                        .'|(*:1863)'
                        .'|/(?'
                            .'|edit(*:1880)'
                            .'|accept(*:1895)'
                            .'|refuse(*:1910)'
                            .'|delete(*:1925)'
                        .')'
                    .')'
                    .'|my\\-offres(*:1946)'
                    .'|by\\-status/([^/]++)(*:1974)'
                .')'
                .'|/reset\\-password/([^/]++)(*:2009)'
                .'|/web/(?'
                    .'|events/([^/]++)/(?'
                        .'|subscribe(*:2054)'
                        .'|unsubscribe(*:2074)'
                    .')'
                    .'|posts/([^/]++)/(?'
                        .'|update(*:2108)'
                        .'|delete(*:2123)'
                        .'|comment(?'
                            .'|(*:2142)'
                            .'|s/([^/]++)/(?'
                                .'|update(*:2171)'
                                .'|delete(*:2186)'
                            .')'
                        .')'
                    .')'
                .')'
                .'|/posts/([^/]++)(*:2214)'
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
        444 => [[['_route' => 'app_post_uploadimage', '_controller' => 'App\\Controller\\PostController::uploadImage'], ['id'], ['POST' => 0], null, false, false, null]],
        460 => [[['_route' => 'api_post_react', '_controller' => 'App\\Controller\\PostReactionController::toggleReaction'], ['id'], ['POST' => 0], null, false, false, null]],
        472 => [[['_route' => 'api_post_reactions', '_controller' => 'App\\Controller\\PostReactionController::getReactions'], ['id'], ['GET' => 0], null, false, false, null]],
        511 => [[['_route' => 'api_events_map_detail', '_controller' => 'App\\Controller\\EventApiController::mapDetail'], ['id'], ['GET' => 0], null, false, false, null]],
        523 => [[['_route' => 'api_events_join', '_controller' => 'App\\Controller\\EventApiController::join'], ['id'], ['POST' => 0], null, false, false, null]],
        536 => [[['_route' => 'api_events_leave', '_controller' => 'App\\Controller\\EventApiController::leave'], ['id'], ['DELETE' => 0], null, false, false, null]],
        547 => [[['_route' => 'api_events_ics', '_controller' => 'App\\Controller\\EventApiController::exportIcs'], ['id'], ['GET' => 0], null, false, false, null]],
        556 => [
            [['_route' => 'api_events_update', '_controller' => 'App\\Controller\\EventApiController::update'], ['id'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_events_delete', '_controller' => 'App\\Controller\\EventApiController::delete'], ['id'], ['DELETE' => 0], null, false, true, null],
        ],
        584 => [
            [['_route' => 'api_event_types_show', '_controller' => 'App\\Controller\\EventTypeApiController::show'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_event_types_update', '_controller' => 'App\\Controller\\EventTypeApiController::update'], ['id'], ['PUT' => 0, 'PATCH' => 1], null, false, true, null],
            [['_route' => 'api_event_types_delete', '_controller' => 'App\\Controller\\EventTypeApiController::delete'], ['id'], ['DELETE' => 0], null, false, true, null],
        ],
        621 => [[['_route' => 'api_marketplace_buy', '_controller' => 'App\\Controller\\MarketplaceApiController::buy'], ['id'], ['POST' => 0], null, false, true, null]],
        648 => [
            [['_route' => 'api_marketplace_update_listing', '_controller' => 'App\\Controller\\MarketplaceApiController::updateListing'], ['id'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_marketplace_delete_listing', '_controller' => 'App\\Controller\\MarketplaceApiController::deleteListing'], ['id'], ['DELETE' => 0], null, false, true, null],
        ],
        673 => [[['_route' => 'api_marketplace_invoice', '_controller' => 'App\\Controller\\MarketplaceApiController::getInvoice'], ['uuid'], ['GET' => 0], null, false, true, null]],
        709 => [[['_route' => 'api_notifications_mark_read', '_controller' => 'App\\Controller\\NotificationController::markAsRead'], ['id'], ['POST' => 0], null, false, false, null]],
        751 => [[['_route' => 'admin_artwork_edit', '_controller' => 'App\\Controller\\ArtworkDashboardController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        765 => [[['_route' => 'admin_artwork_delete', '_controller' => 'App\\Controller\\ArtworkDashboardController::delete'], ['id'], ['POST' => 0], null, false, false, null]],
        777 => [[['_route' => 'admin_artwork_like', '_controller' => 'App\\Controller\\ArtworkDashboardController::like'], ['id'], ['POST' => 0], null, false, false, null]],
        798 => [[['_route' => 'admin_artwork_check_stolen', '_controller' => 'App\\Controller\\ArtworkDashboardController::checkStolen'], ['id'], ['GET' => 0], null, false, false, null]],
        837 => [[['_route' => 'admin_category_edit', '_controller' => 'App\\Controller\\CategoryAdminController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        851 => [[['_route' => 'admin_category_delete', '_controller' => 'App\\Controller\\CategoryAdminController::delete'], ['id'], ['POST' => 0], null, false, false, null]],
        894 => [[['_route' => 'admin_community_post_edit', '_controller' => 'App\\Controller\\CommunityDashboardController::editPost'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        908 => [[['_route' => 'admin_community_post_delete', '_controller' => 'App\\Controller\\CommunityDashboardController::deletePost'], ['id'], ['POST' => 0], null, false, false, null]],
        939 => [[['_route' => 'admin_comment_moderate', '_controller' => 'App\\Controller\\PostAdminController::moderateComment'], ['id'], ['POST' => 0], null, false, false, null]],
        975 => [[['_route' => 'admin_events_edit', '_controller' => 'App\\Controller\\EventDashboardController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        989 => [[['_route' => 'admin_events_delete', '_controller' => 'App\\Controller\\EventDashboardController::delete'], ['id'], ['POST' => 0], null, false, false, null]],
        1012 => [[['_route' => 'admin_events_participants', '_controller' => 'App\\Controller\\EventDashboardController::participants'], ['id'], ['GET' => 0], null, false, false, null]],
        1037 => [[['_route' => 'admin_events_participant_status', '_controller' => 'App\\Controller\\EventDashboardController::updateParticipantStatus'], ['eventId', 'participantId'], ['POST' => 0], null, false, false, null]],
        1072 => [[['_route' => 'admin_event_types_edit', '_controller' => 'App\\Controller\\EventTypeDashboardController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        1087 => [[['_route' => 'admin_event_types_delete', '_controller' => 'App\\Controller\\EventTypeDashboardController::delete'], ['id'], ['POST' => 0], null, false, false, null]],
        1102 => [[['_route' => 'admin_event_types_toggle', '_controller' => 'App\\Controller\\EventTypeDashboardController::toggle'], ['id'], ['POST' => 0], null, false, false, null]],
        1153 => [[['_route' => 'admin_marketplace_listing_show', '_controller' => 'App\\Controller\\MarketplaceDashboardController::showListing'], ['id'], ['GET' => 0], null, false, false, null]],
        1166 => [[['_route' => 'admin_marketplace_listing_edit', '_controller' => 'App\\Controller\\MarketplaceDashboardController::editListing'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        1181 => [[['_route' => 'admin_marketplace_listing_delete', '_controller' => 'App\\Controller\\MarketplaceDashboardController::deleteListing'], ['id'], ['POST' => 0], null, false, false, null]],
        1214 => [[['_route' => 'admin_offre_edit', '_controller' => 'App\\Controller\\OffreDashboardController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        1229 => [[['_route' => 'admin_offre_delete', '_controller' => 'App\\Controller\\OffreDashboardController::delete'], ['id'], ['POST' => 0], null, false, false, null]],
        1244 => [[['_route' => 'admin_offre_accept', '_controller' => 'App\\Controller\\OffreDashboardController::accept'], ['id'], ['POST' => 0], null, false, false, null]],
        1259 => [[['_route' => 'admin_offre_refuse', '_controller' => 'App\\Controller\\OffreDashboardController::refuse'], ['id'], ['POST' => 0], null, false, false, null]],
        1296 => [[['_route' => 'admin_post_moderate', '_controller' => 'App\\Controller\\PostAdminController::moderate'], ['id'], ['POST' => 0], null, false, false, null]],
        1313 => [[['_route' => 'admin_post_comments', '_controller' => 'App\\Controller\\PostAdminController::comments'], ['id'], ['GET' => 0], null, false, false, null]],
        1352 => [[['_route' => 'admin_transactions_invoice', '_controller' => 'App\\Controller\\TransactionAdminController::invoice'], ['uuid'], ['GET' => 0], null, false, true, null]],
        1383 => [[['_route' => 'admin_users_edit', '_controller' => 'App\\Controller\\UserDashboardController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        1398 => [[['_route' => 'admin_users_toggle', '_controller' => 'App\\Controller\\UserDashboardController::toggle'], ['id'], ['POST' => 0], null, false, false, null]],
        1413 => [[['_route' => 'admin_users_delete', '_controller' => 'App\\Controller\\UserDashboardController::delete'], ['id'], ['POST' => 0], null, false, false, null]],
        1437 => [[['_route' => 'artwork_show', '_controller' => 'App\\Controller\\FrontOfficeController::artworkShow'], ['id'], null, null, false, true, null]],
        1480 => [[['_route' => 'my_artwork_edit', '_controller' => 'App\\Controller\\ArtworkFrontController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        1495 => [[['_route' => 'my_artwork_delete', '_controller' => 'App\\Controller\\ArtworkFrontController::delete'], ['id'], ['POST' => 0], null, false, false, null]],
        1534 => [[['_route' => 'marketplace_offer_show', '_controller' => 'App\\Controller\\FrontOfficeController::marketplaceOffer'], ['id'], null, null, false, true, null]],
        1561 => [[['_route' => 'marketplace_offer_accept', '_controller' => 'App\\Controller\\OfferManagementController::acceptOffer'], ['id'], ['POST' => 0], null, false, false, null]],
        1576 => [[['_route' => 'marketplace_offer_reject', '_controller' => 'App\\Controller\\OfferManagementController::rejectOffer'], ['id'], ['POST' => 0], null, false, false, null]],
        1604 => [[['_route' => 'marketplace_checkout', '_controller' => 'App\\Controller\\PaymentController::checkout'], ['id'], ['POST' => 0], null, false, true, null]],
        1646 => [[['_route' => 'app_message_show', '_controller' => 'App\\Controller\\MessageController::show'], ['id'], null, null, false, true, null]],
        1665 => [[['_route' => 'app_message_send', '_controller' => 'App\\Controller\\MessageController::send'], ['id'], ['POST' => 0], null, false, true, null]],
        1701 => [[['_route' => 'app_community_show', '_controller' => 'App\\Controller\\CommunityController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        1718 => [[['_route' => 'app_community_edit', '_controller' => 'App\\Controller\\CommunityController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        1733 => [[['_route' => 'app_community_delete', '_controller' => 'App\\Controller\\CommunityController::delete'], ['id'], ['POST' => 0], null, false, false, null]],
        1749 => [[['_route' => 'app_community_admin', '_controller' => 'App\\Controller\\CommunityController::admin'], [], ['GET' => 0], null, false, false, null]],
        1766 => [[['_route' => 'community_posts', '_controller' => 'App\\Controller\\WebPostController::index'], [], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        1784 => [[['_route' => 'community_post_show', '_controller' => 'App\\Controller\\WebPostController::show'], ['id'], ['GET' => 0, 'POST' => 1], null, false, true, null]],
        1808 => [[['_route' => 'event_show', '_controller' => 'App\\Controller\\FrontOfficeController::eventShow'], ['id'], null, null, false, true, null]],
        1843 => [[['_route' => 'offre_by_listing', '_controller' => 'App\\Controller\\OffreController::byListing'], ['id'], ['GET' => 0], null, false, true, null]],
        1863 => [[['_route' => 'offre_show', '_controller' => 'App\\Controller\\OffreController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        1880 => [[['_route' => 'offre_edit', '_controller' => 'App\\Controller\\OffreController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        1895 => [[['_route' => 'offre_accept', '_controller' => 'App\\Controller\\OffreController::accept'], ['id'], ['POST' => 0], null, false, false, null]],
        1910 => [[['_route' => 'offre_refuse', '_controller' => 'App\\Controller\\OffreController::refuse'], ['id'], ['POST' => 0], null, false, false, null]],
        1925 => [[['_route' => 'offre_delete', '_controller' => 'App\\Controller\\OffreController::delete'], ['id'], ['POST' => 0], null, false, false, null]],
        1946 => [[['_route' => 'offre_my_offres', '_controller' => 'App\\Controller\\OffreController::myOffres'], [], ['GET' => 0], null, false, false, null]],
        1974 => [[['_route' => 'offre_by_status', '_controller' => 'App\\Controller\\OffreController::byStatus'], ['statut'], ['GET' => 0], null, false, true, null]],
        2009 => [[['_route' => 'password_reset_form', '_controller' => 'App\\Controller\\PasswordResetWebController::resetPassword'], ['token'], ['GET' => 0, 'POST' => 1], null, false, true, null]],
        2054 => [[['_route' => 'web_events_subscribe', '_controller' => 'App\\Controller\\WebFormController::subscribeToEvent'], ['id'], ['POST' => 0], null, false, false, null]],
        2074 => [[['_route' => 'web_events_unsubscribe', '_controller' => 'App\\Controller\\WebFormController::unsubscribeFromEvent'], ['id'], ['POST' => 0], null, false, false, null]],
        2108 => [[['_route' => 'web_posts_update', '_controller' => 'App\\Controller\\WebFormController::updatePost'], ['id'], ['POST' => 0], null, false, false, null]],
        2123 => [[['_route' => 'web_posts_delete', '_controller' => 'App\\Controller\\WebFormController::deletePost'], ['id'], ['POST' => 0], null, false, false, null]],
        2142 => [[['_route' => 'web_posts_comment', '_controller' => 'App\\Controller\\WebFormController::commentPost'], ['id'], ['POST' => 0], null, false, false, null]],
        2171 => [[['_route' => 'web_comments_update', '_controller' => 'App\\Controller\\WebFormController::updateComment'], ['postId', 'commentId'], ['POST' => 0], null, false, false, null]],
        2186 => [[['_route' => 'web_comments_delete', '_controller' => 'App\\Controller\\WebFormController::deleteComment'], ['postId', 'commentId'], ['POST' => 0], null, false, false, null]],
        2214 => [
            [['_route' => 'post_show', '_controller' => 'App\\Controller\\WebPostController::show'], ['id'], ['GET' => 0, 'POST' => 1], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
