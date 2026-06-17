<?php

namespace App\Service;

use Psr\Log\LoggerInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class OpenAIService
{
    private const API_URL = 'https://api.openai.com/v1/chat/completions';
    private const MODEL = 'gpt-3.5-turbo';
    private const MAX_TOKENS = 500;
    private const TEMPERATURE = 0.7;

    public function __construct(
        private HttpClientInterface $httpClient,
        private LoggerInterface $logger,
        private string $apiKey
    ) {}

    /**
     * Get AI response for a user message with MuseHub context
     */
    public function getChatResponse(string $userMessage, ?string $userId = null): array
    {
        try {
            $systemPrompt = $this->getSystemPrompt();
            
            $response = $this->httpClient->request('POST', self::API_URL, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->apiKey,
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'model' => self::MODEL,
                    'messages' => [
                        [
                            'role' => 'system',
                            'content' => $systemPrompt
                        ],
                        [
                            'role' => 'user',
                            'content' => $userMessage
                        ]
                    ],
                    'max_tokens' => self::MAX_TOKENS,
                    'temperature' => self::TEMPERATURE,
                ],
                'timeout' => 10,
            ]);

            $data = $response->toArray();

            if (isset($data['choices'][0]['message']['content'])) {
                $aiResponse = trim($data['choices'][0]['message']['content']);
                
                $this->logger->info('OpenAI response generated', [
                    'user_id' => $userId,
                    'message_length' => strlen($userMessage),
                    'response_length' => strlen($aiResponse),
                ]);

                return [
                    'success' => true,
                    'response' => $aiResponse,
                    'type' => 'ai_response',
                ];
            }

            throw new \Exception('No response content from OpenAI');

        } catch (\Exception $e) {
            $this->logger->error('OpenAI API error', [
                'error' => $e->getMessage(),
                'user_id' => $userId,
            ]);

            return [
                'success' => false,
                'error' => $e->getMessage(),
            ];
        }
    }

    /**
     * Get system prompt with MuseHub context
     */
    private function getSystemPrompt(): string
    {
        return "Tu es l'assistant virtuel de MuseHub, une plateforme communautaire pour artistes, créatifs et amateurs d'art.

**Ton rôle:**
- Aider les utilisateurs avec leurs questions sur MuseHub
- Être amical, professionnel et concis
- Répondre en français
- Fournir des informations précises sur la plateforme

**Informations sur MuseHub:**
- **Communauté**: Les utilisateurs peuvent publier des posts, commenter, réagir (likes/dislikes)
- **Œuvres d'art**: Galerie d'œuvres créées par les artistes
- **Événements**: Expositions virtuelles et événements artistiques
- **Marketplace**: Achat et vente d'œuvres d'art
- **Profils**: Chaque utilisateur a un profil personnalisable

**Catégories de posts:**
- Actualités
- Questions
- Humour
- Inspiration
- Événements
- Général

**Règles de la communauté:**
- Respect mutuel obligatoire
- Pas de contenu haineux, violent ou inapproprié
- Pas de spam ou publicité non autorisée
- Utiliser les catégories appropriées
- Respecter les droits d'auteur

**Modération:**
- Les posts sont automatiquement modérés
- Les utilisateurs peuvent signaler du contenu inapproprié
- Les modérateurs interviennent rapidement

**Commandes disponibles:**
- /help - Aide générale
- /rules - Règles de la communauté
- /categories - Liste des catégories
- /report - Signaler un problème
- /moderator - Contacter un modérateur

**Instructions:**
- Réponds de manière concise (max 300 mots)
- Si la question concerne un problème technique grave, suggère de contacter un modérateur
- Si tu ne connais pas la réponse, sois honnête et suggère des alternatives
- Utilise des emojis de manière modérée pour rendre tes réponses plus engageantes
- Ne partage jamais d'informations personnelles ou sensibles";
    }

    /**
     * Check if the service is properly configured
     */
    public function isConfigured(): bool
    {
        return !empty($this->apiKey) && $this->apiKey !== 'your_openai_api_key_here';
    }
}
