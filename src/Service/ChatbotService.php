<?php

namespace App\Service;

use App\Repository\PostRepository;
use App\Repository\PostCategoryRepository;
use App\Repository\UserRepository;
use Psr\Log\LoggerInterface;

class ChatbotService
{
    private const COMMANDS = [
        '/help' => 'help',
        '/rules' => 'rules',
        '/report' => 'report',
        '/categories' => 'categories',
        '/search' => 'search_help',
        '/moderator' => 'moderator',
        '/profile' => 'profile_help',
    ];

    private const FAQ_RESPONSES = [
        'help' => "🤖 Bonjour ! Je suis votre assistant MuseHub. Je peux vous aider avec :

📋 **Commandes disponibles :**
• /help - Cette aide
• /rules - Règles de la communauté
• /report - Signaler un problème
• /categories - Liste des catégories
• /search - Comment rechercher
• /moderator - Contacter un modérateur
• /profile - Gérer votre profil

💬 **Questions fréquentes :**
• Comment publier un post ?
• Comment commenter ou réagir ?
• Comment modifier mon profil ?
• Que faire si je vois du contenu inapproprié ?

Dites-moi simplement ce dont vous avez besoin !",

        'rules' => "📜 **Règles de la communauté MuseHub**

🤝 **Respect mutuel :**
• Traitez tous les membres avec respect
• Pas d'insultes, harcèlement ou discrimination
• Respectez les opinions différentes

🚫 **Contenu interdit :**
• Contenu haineux ou violent
• Spam ou publicité non autorisée
• Contenu sexuel explicite
• Informations personnelles d'autrui

📝 **Publications :**
• Utilisez les catégories appropriées
• Pas de contenu dupliqué
• Respectez les droits d'auteur

⚠️ **Signalement :**
• Utilisez le bouton 'Signaler' pour tout contenu inapproprié
• Les modérateurs interviennent rapidement

🔍 **Modération :**
• Les posts sont automatiquement vérifiés
• Les violations peuvent entraîner des sanctions
• Les décisions des modérateurs sont finales

Pour plus d'informations, contactez un modérateur avec /moderator",

        'post' => "📝 **Comment publier un post sur MuseHub**

🖊️ **Étapes simples :**
1. **Connectez-vous** à votre compte MuseHub
2. **Allez sur la page Communauté** (/community)
3. **Cliquez sur** \"Quoi de neuf aujourd'hui ?\"
4. **Écrivez votre message** (max 500 caractères)
5. **Ajoutez une image** (optionnel - JPG, PNG, GIF, WEBP)
6. **Choisissez une catégorie** dans la liste déroulante
7. **Cliquez sur \"Publier\"**

✅ **Votre post sera :**
• Automatiquement modéré pour la sécurité
• Visible par tous les membres de la communauté
• Catégorisé pour une meilleure organisation

💡 **Conseils :**
• Choisissez le bon sujet pour votre catégorie
• Soyez clair et respectueux dans votre message
• Les images rendent vos posts plus attrayants !

❓ Besoin d'aide supplémentaire ? Dites \"/categories\" pour voir toutes les catégories disponibles.",

        'comment' => "💬 **Comment commenter et interagir**

🗣️ **Commenter un post :**
1. Cliquez sur \"Commenter\" sous un post
2. Écrivez votre commentaire (max 500 caractères)
3. Appuyez sur Entrée ou cliquez sur l'avion en papier

👍👎 **Réagir à un post :**
• Cliquez sur 👍 (J'aime) ou 👎 (Je n'aime pas)
• Vous ne pouvez réagir qu'une fois par post
• Les compteurs se mettent à jour automatiquement

↩️ **Répondre à un commentaire :**
• Cliquez sur \"Répondre\" sous un commentaire
• Votre réponse sera indentée sous le commentaire original
• Créez des discussions threadées

❤️ **Notifications :**
• Recevez des notifications pour les réponses à vos commentaires
• Soyez alerté quand quelqu'un aime vos posts

💡 **Astuce :** Restez poli et constructif dans vos commentaires !",

        'moderator' => "👨‍⚖️ **Contacter un modérateur**

🚨 **Pour signaler un problème urgent :**
• Utilisez le bouton rouge \"Signaler\" sur les posts inappropriés
• Les modérateurs sont notifiés immédiatement
• Investigation dans les plus brefs délais

💬 **Pour poser une question aux modérateurs :**
• Discutez avec moi (le chatbot) en premier
• Je peux résoudre la plupart des problèmes courants
• Si c'est complexe, je transfère automatiquement à un humain

📧 **Contact direct :**
• Envoyez un message privé aux administrateurs
• Utilisez le système de notification intégré
• Les modérateurs répondent généralement sous 24h

🆘 **Urgences :**
• Harcèlement ou menaces : Signalez immédiatement
• Contenu illégal : Contactez directement un admin
• Problèmes techniques graves : Utilisez /report

Les modérateurs sont là pour maintenir un environnement sûr et agréable pour tous ! 🎯",

        'categories' => "📂 **Catégories de posts disponibles**

Choisissez la catégorie qui correspond le mieux à votre contenu :

📰 **Actualités** - Annonces importantes et nouvelles de MuseHub
❓ **Questions** - Questions et discussions communautaires
😂 **Humour** - Memes, blagues et contenu humoristique
💡 **Inspiration** - Inspiration artistique et créative
📅 **Événements** - Discussions sur les événements à venir
💬 **Général** - Discussions générales sur l'art et la créativité

🎯 **Pourquoi categoriser ?**
• Aide les autres membres à trouver du contenu pertinent
• Organise mieux la communauté
• Améliore la découvrabilité de vos posts

✨ **Conseil :** Si vous hésitez entre plusieurs catégories, choisissez la plus spécifique !",

        'search_help' => "🔍 **Comment rechercher sur MuseHub**

📱 **Recherche simple :**
• Utilisez la barre de recherche en haut du site
• Tapez des mots-clés liés à ce que vous cherchez
• La recherche fonctionne sur les titres et contenus des posts

🎯 **Recherche avancée :**
• Filtrez par catégorie dans la section Communauté
• Utilisez les filtres \"Plus récent\", \"Plus aimé\", \"Plus commenté\"
• Combinez recherche textuelle + filtres

📂 **Rechercher par artiste :**
• Allez dans la section \"Artistes\"
• Parcourez les portfolios des créateurs
• Utilisez les filtres par style ou médium

🏷️ **Rechercher par tags :**
• Les posts peuvent avoir des tags implicites
• Recherchez par mots-clés dans les descriptions
• Les catégories aident aussi à filtrer le contenu

💡 **Astuces de recherche :**
• Utilisez des termes spécifiques plutôt que généraux
• Essayez différentes formulations si rien ne s'affiche
• Les recherches sont mises à jour en temps réel",

        'profile_help' => "👤 **Gérer votre profil MuseHub**

⚙️ **Modifier votre profil :**
1. Cliquez sur votre nom en haut à droite
2. Sélectionnez \"Mon profil\"
3. Cliquez sur \"Modifier le profil\"

📝 **Informations modifiables :**
• **Photo de profil** : JPG, PNG, GIF, WEBP (max 5MB)
• **Nom d'utilisateur** : Visible par tous
• **Biographie** : Courte description de vous
• **Prénom/Nom** : Informations personnelles (optionnel)

🔒 **Confidentialité :**
• Votre email reste privé
• Seuls les admins voient certaines informations
• Vous contrôlez la visibilité de votre contenu

📊 **Statistiques de profil :**
• Nombre d'œuvres publiées
• Nombre de posts dans la communauté
• Interactions sociales (likes, commentaires)

🎨 **Astuce :** Une belle photo de profil et biographie attirent plus l'attention de la communauté !",

        'report' => "🚨 **Signaler un problème ou du contenu inapproprié**

⚠️ **Types de signalements :**

**Contenu inapproprié :**
1. Cliquez sur les 3 points (⋯) du post
2. Sélectionnez \"Signaler\"
3. Choisissez la raison (spam, harcèlement, contenu inapproprié, etc.)
4. Les modérateurs examineront rapidement

**Problèmes techniques :**
• Bugs ou erreurs sur le site
• Problèmes de chargement d'images
• Fonctionnalités qui ne marchent pas
• Contactez-moi ou un modérateur

**Comportement utilisateur :**
• Harcèlement ou menaces
• Spam répété
• Violation des règles communautaires
• Utilisez toujours le bouton \"Signaler\"

🔔 **Que se passe-t-il après un signalement ?**
• Les modérateurs sont notifiés automatiquement
• Investigation discrète et rapide
• Actions appropriées (suppression, avertissement, bannissement)
• Vous recevez une confirmation anonyme

💬 **Pour les problèmes mineurs :**
• Essayez d'abord de résoudre avec l'utilisateur concerné
• Utilisez les commentaires pour clarifier
• Signalez seulement en cas de violation grave

🔒 **Confidentialité :** Tous les signalements sont traités de manière confidentielle.",

        'welcome' => "🎨 **Bienvenue sur MuseHub !**

Votre plateforme communautaire pour artistes, créatifs et amateurs d'art.

🌟 **Découvrez :**
• **Œuvres d'art** : Explorez des milliers de créations
• **Communauté** : Échangez avec d'autres passionnés
• **Événements** : Participez à des expositions virtuelles
• **Marketplace** : Achetez et vendez des œuvres d'art

🚀 **Pour commencer :**
1. **Complétez votre profil** (/profile)
2. **Explorez la galerie** d'œuvres
3. **Rejoignez la communauté** en publiant votre premier post
4. **Participez** aux discussions et événements

💡 **Besoin d'aide ?** Tapez \"/help\" pour voir toutes les commandes disponibles !

Bonne découverte artistique ! 🎨✨",
    ];

    private const KEYWORDS = [
        'help' => ['aide', 'help', 'commande', 'commandes', 'assist', 'support'],
        'rules' => ['règle', 'rules', 'respect', 'comportement', 'conduite', 'charte'],
        'post' => ['publier', 'post', 'poster', 'créer', 'nouveau', 'écrire', 'partager'],
        'comment' => ['commenter', 'comment', 'répondre', 'réponse', 'discuter'],
        'moderator' => ['modérateur', 'moderator', 'admin', 'administration', 'contact', 'signaler', 'urgent'],
        'categories' => ['catégorie', 'categories', 'type', 'sujet', 'thème', 'section'],
        'search' => ['chercher', 'rechercher', 'search', 'trouver', 'explorer'],
        'profile' => ['profil', 'profile', 'compte', 'paramètre', 'réglage'],
        'report' => ['signaler', 'report', 'problème', 'abus', 'plainte', 'bug'],
        'delete' => ['supprimer', 'delete', 'effacer', 'retirer', 'enlever'],
    ];

    private const ESCALATION_TRIGGERS = [
        'urgent' => ['urgent', 'urgence', 'vite', 'rapide', 'immédiat', 'asap'],
        'harassment' => ['harcèlement', 'harcelement', 'menace', 'insulte', 'abus', 'violence'],
        'illegal' => ['illégal', 'illegal', 'piratage', 'hack', 'menace', 'chantage'],
        'technical' => ['bug critique', 'site cassé', 'ne marche pas', 'erreur critique'],
        'account' => ['compte hacké', 'piraté', 'volé', 'suspendu', 'banni'],
    ];

    public function __construct(
        private PostRepository $postRepository,
        private PostCategoryRepository $categoryRepository,
        private UserRepository $userRepository,
        private LoggerInterface $logger
    ) {}

    /**
     * Process user message and return appropriate response
     */
    public function processMessage(string $message, ?string $userId = null): array
    {
        $originalMessage = $message;
        $message = strtolower(trim($message));

        // Log the interaction
        $this->logger->info('Chatbot interaction', [
            'user_id' => $userId,
            'message' => $message,
        ]);

        // Check for direct commands
        if (isset(self::COMMANDS[$message])) {
            $topic = self::COMMANDS[$message];
            return [
                'response' => self::FAQ_RESPONSES[$topic],
                'type' => 'command',
                'topic' => $topic,
                'escalated' => false,
                'suggestions' => [],
            ];
        }

        // Check for direct FAQ matches
        foreach (self::FAQ_RESPONSES as $key => $response) {
            if (str_contains($message, $key)) {
                return [
                    'response' => $response,
                    'type' => 'faq',
                    'topic' => $key,
                    'escalated' => false,
                    'suggestions' => [],
                ];
            }
        }

        // Check for keyword matches
        foreach (self::KEYWORDS as $topic => $keywords) {
            foreach ($keywords as $keyword) {
                if (str_contains($message, $keyword)) {
                    return [
                        'response' => self::FAQ_RESPONSES[$topic],
                        'type' => 'keyword_match',
                        'topic' => $topic,
                        'escalated' => false,
                        'suggestions' => [],
                    ];
                }
            }
        }

        // Handle dynamic queries
        if (str_contains($message, 'combien') && str_contains($message, 'post')) {
            return $this->handlePostCountQuery($message);
        }

        if (str_contains($message, 'stat') || str_contains($message, 'chiffre')) {
            return $this->handleStatsQuery();
        }

        if (str_contains($message, 'catégorie') && str_contains($message, 'liste')) {
            return $this->handleCategoryListQuery();
        }

        // Check for escalation triggers
        $escalationReason = $this->checkEscalationTriggers($originalMessage);
        if ($escalationReason) {
            return [
                'response' => "🚨 **Problème détecté !**\n\nJ'ai identifié que vous signalez un problème important qui nécessite l'attention immédiate d'un modérateur.\n\n" . self::FAQ_RESPONSES['moderator'] . "\n\n💬 **Votre message a été transmis aux modérateurs.** Un membre de l'équipe vous contactera dans les plus brefs délais pour vous aider.",
                'type' => 'escalation',
                'topic' => 'moderator',
                'escalated' => true,
                'escalation_reason' => $escalationReason,
                'suggestions' => [],
            ];
        }

        // Generic helpful responses for unknown queries
        $genericResponses = [
            "🤔 Je ne suis pas sûr d'avoir bien compris. Puis-je vous aider avec quelque chose de spécifique sur MuseHub ?\n\n💡 **Voici ce que je peux faire :**\n• Vous expliquer comment publier un post\n• Vous guider dans la recherche d'œuvres\n• Vous parler des règles de la communauté\n• Vous aider avec votre profil\n\nEssayez de dire '/help' pour voir toutes les options !",

            "Hmm, laissez-moi réfléchir... 🤔\n\nMuseHub est une plateforme pour les artistes et amateurs d'art. Vous pouvez :\n\n🎨 **Explorer des œuvres d'art**\n📝 **Publier vos propres créations**\n💬 **Discuter avec la communauté**\n🔍 **Rechercher des artistes**\n\nQue souhaitez-vous faire exactement ? Dites '/help' pour plus d'options !",

            "Désolé, je n'ai pas trouvé de réponse spécifique à votre question. 😅\n\nMais je peux vous aider avec :\n• 📝 **Publier un post** - Comment partager vos idées\n• 🔍 **Rechercher** - Trouver des œuvres ou artistes\n• 👥 **Communauté** - Règles et bonnes pratiques\n• ⚙️ **Profil** - Gérer votre compte\n\nEssayez '/categories' pour voir les types de posts disponibles !",

            "Je suis encore en train d'apprendre ! 🤖\n\nEn attendant, voici quelques choses utiles sur MuseHub :\n\n🌟 **Vous pouvez :**\n• Publier des photos, vidéos et textes\n• Interagir avec d'autres artistes\n• Découvrir de nouvelles œuvres\n• Participer à des événements\n\nTapez '/rules' pour connaître les règles, ou '/help' pour plus d'aide !"
        ];

        $randomResponse = $genericResponses[array_rand($genericResponses)];
        $suggestions = ['/help', '/rules', '/post', '/categories', '/search'];
        shuffle($suggestions);

        return [
            'response' => $randomResponse,
            'type' => 'generic_help',
            'escalated' => false,
            'suggestions' => array_slice($suggestions, 0, 3),
        ];
    }

    /**
     * Check if message needs moderator escalation and return reason
     */
    private function checkEscalationTriggers(string $message): ?string
    {
        $message = strtolower($message);

        foreach (self::ESCALATION_TRIGGERS as $category => $keywords) {
            foreach ($keywords as $keyword) {
                if (str_contains($message, $keyword)) {
                    return $category;
                }
            }
        }

        return null;
    }

    /**
     * Check if message needs moderator escalation (legacy method)
     */
    public function needsModeratorEscalation(string $message): bool
    {
        return $this->checkEscalationTriggers($message) !== null;
    }

    /**
     * Get welcome message for new users
     */
    public function getWelcomeMessage(): string
    {
        return "👋 Bienvenue sur MuseHub !

Je suis votre assistant virtuel. Je peux vous aider avec :
• Les règles de la communauté
• Comment publier des posts
• Signaler des problèmes
• Informations générales

Dites simplement 'help' pour en savoir plus !";
    }

    /**
     * Handle post count queries
     */
    private function handlePostCountQuery(string $message): array
    {
        try {
            $totalPosts = $this->postRepository->count([]);
            $todayPosts = $this->postRepository->createQueryBuilder('p')
                ->select('COUNT(p.id)')
                ->where('p.createdAt >= :today')
                ->setParameter('today', new \DateTime('today'))
                ->getQuery()
                ->getSingleScalarResult();

            return [
                'response' => "📊 Statistiques des posts :\n• Total : {$totalPosts} posts\n• Aujourd'hui : {$todayPosts} posts",
                'type' => 'stats',
            ];
        } catch (\Exception $e) {
            $this->logger->error('Error getting post count', ['error' => $e->getMessage()]);
            return [
                'response' => 'Désolé, je n\'arrive pas à récupérer les statistiques pour le moment.',
                'type' => 'error',
            ];
        }
    }

    /**
     * Handle general stats query
     */
    private function handleStatsQuery(): array
    {
        try {
            $totalPosts = $this->postRepository->count([]);
            $totalUsers = $this->userRepository->count([]);
            $totalCategories = $this->categoryRepository->count([]);

            $mostActiveCategory = $this->postRepository->createQueryBuilder('p')
                ->select('COUNT(p.id) as postCount, cat.name as categoryName')
                ->leftJoin('p.category', 'cat')
                ->groupBy('cat.id')
                ->orderBy('postCount', 'DESC')
                ->setMaxResults(1)
                ->getQuery()
                ->getOneOrNullResult();

            $response = "📊 Statistiques MuseHub :\n";
            $response .= "• {$totalUsers} membres inscrits\n";
            $response .= "• {$totalPosts} posts publiés\n";
            $response .= "• {$totalCategories} catégories\n";

            if ($mostActiveCategory) {
                $response .= "• Catégorie la plus active : {$mostActiveCategory['categoryName']}";
            }

            return [
                'response' => $response,
                'type' => 'stats',
            ];
        } catch (\Exception $e) {
            $this->logger->error('Error getting stats', ['error' => $e->getMessage()]);
            return [
                'response' => 'Désolé, je n\'arrive pas à récupérer les statistiques pour le moment.',
                'type' => 'error',
            ];
        }
    }

    /**
     * Handle category list query
     */
    private function handleCategoryListQuery(): array
    {
        try {
            $categories = $this->categoryRepository->findAll();

            $response = "📂 Catégories disponibles :\n";
            foreach ($categories as $category) {
                $response .= "• {$category->getName()} : {$category->getDescription()}\n";
            }

            return [
                'response' => $response,
                'type' => 'categories',
            ];
        } catch (\Exception $e) {
            $this->logger->error('Error getting categories', ['error' => $e->getMessage()]);
            return [
                'response' => 'Désolé, je n\'arrive pas à récupérer la liste des catégories.',
                'type' => 'error',
            ];
        }
    }
}
