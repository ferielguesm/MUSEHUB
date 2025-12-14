<?php

namespace App\Service;

class ContentFilter
{
    private array $bannedWords = [
        // English bad words
        'asshole', 'assholes', 'bastard', 'bastards', 'bitch', 'bitches', 'bullshit', 'cocksucker', 'cocksuckers',
        'cunt', 'cunts', 'damn', 'damned', 'dick', 'dicks', 'dumbass', 'dumbasses', 'fuck', 'fucker', 'fuckers',
        'fucking', 'fucks', 'goddamn', 'goddamned', 'hell', 'horseshit', 'jackass', 'jackasses', 'motherfucker',
        'motherfuckers', 'motherfucking', 'nigga', 'niggas', 'nigger', 'niggers', 'piss', 'prick', 'pricks',
        'pussy', 'pussies', 'shit', 'shits', 'shithole', 'shitholes', 'slut', 'sluts', 'whore', 'whores',

        // French bad words
        'connard', 'connards', 'connasse', 'connasses', 'enculé', 'enculés', 'enculée', 'enculées', 'fils de pute',
        'fils de putes', 'pute', 'putes', 'putain', 'putains', 'salope', 'salopes', 'salaud', 'salauds',
        'merde', 'merdes', 'bordel', 'con', 'cons', 'couille', 'couilles', 'cul', 'culs', 'chatte', 'chattes',
        'bite', 'bites', 'queue', 'queues', 'sperme', 'sperm', 'branler', 'branlette', 'branlettes',

        // Spam and scam related
        'spam', 'scam', 'hack', 'hacker', 'hackers', 'phishing', 'virus', 'malware', 'trojan',
        'ransomware', 'bitcoin', 'crypto', 'casino', 'gambling', 'porn', 'sex', 'xxx', 'nsfw',

        // Hate speech and discrimination
        'racist', 'racism', 'nazi', 'nazis', 'kkk', 'terrorist', 'terrorism', 'isis', 'al-qaeda',
        'white supremacist', 'supremacist', 'fascist', 'fascism', 'homophobe', 'homophobia',
        'transphobe', 'transphobia', 'misogynist', 'misogyny', 'sexist', 'sexism',

        // Drug related
        'cocaine', 'heroin', 'meth', 'methamphetamine', 'weed', 'marijuana', 'ecstasy', 'lsd',
        'mushrooms', 'shrooms', 'crack', 'opium', 'opioids', 'fentanyl',

        // Violence related
        'kill', 'kills', 'killed', 'killing', 'murder', 'murders', 'murdered', 'murdering',
        'rape', 'rapes', 'raped', 'raping', 'abuse', 'abuses', 'abused', 'abusing',
        'torture', 'tortures', 'tortured', 'torturing', 'bomb', 'bombs', 'bombing', 'explosion',

        // Offensive variations and leet speak
        'f4ck', 'f4cking', 'fuc', 'fucing', 'fuk', 'fuking', 'sh1t', 'sh1thole', 'b1tch', 'b1tches',
        'c0ck', 'c0cks', 'd1ck', 'd1cks', 'p0rn', 'pr0n', 's3x', 'xxx'
    ];

    private array $suspiciousPatterns = [
        '/http[s]?:\/\/[^\s]+/', // URLs
        '/[A-Z]{15,}/', // Excessive caps (increased threshold)
        '/\b\d{10,}\b/', // Long numbers (potentially phone numbers)
        '/(.)\1{4,}/', // Character repetition (aaaaa, !!!!!)
        '/\b(?:sell|buy|purchase|cheap|free|win|winner|prize|lottery)\b/i', // Sales/spam keywords
    ];

    public function filterContent(string $content): array
    {
        $issues = [];
        $filteredContent = $content;
        $badWordCount = 0;
        $severityScore = 0;

        // Normalize content for better matching
        $normalizedContent = strtolower($content);
        $normalizedContent = preg_replace('/[^\w\s]/', '', $normalizedContent); // Remove punctuation

        // Check for banned words with variations
        foreach ($this->bannedWords as $word) {
            $wordVariations = [
                $word, // exact match
                str_replace(['a', 'e', 'i', 'o', 'u'], ['@', '3', '1', '0', '4'], $word), // leet speak
                str_replace(['a', 'e', 'i', 'o', 'u'], ['4', '€', '1', '0', 'µ'], $word), // alt leet
            ];

            foreach ($wordVariations as $variation) {
                if (stripos($content, $variation) !== false) {
                    $badWordCount++;
                    $severityScore += $this->getWordSeverity($word);
                    $issues[] = "Contenu inapproprié détecté";
                    $filteredContent = str_ireplace($variation, str_repeat('*', strlen($variation)), $filteredContent);
                    break; // Only count once per word
                }
            }
        }

        // Check for suspicious patterns
        foreach ($this->suspiciousPatterns as $pattern) {
            if (preg_match($pattern, $content)) {
                $issues[] = "Pattern suspect détecté";
                $severityScore += 10;
            }
        }

        // Check for excessive bad words
        if ($badWordCount > 2) {
            $issues[] = "Trop de contenu inapproprié détecté";
            $severityScore += 50;
        }

        // Check for repeated bad words
        $words = str_word_count($content, 1);
        $wordCounts = array_count_values($words);
        foreach ($this->bannedWords as $badWord) {
            if (isset($wordCounts[$badWord]) && $wordCounts[$badWord] > 1) {
                $issues[] = "Répétition de contenu inapproprié";
                $severityScore += 25;
                break;
            }
        }

        // Check length (too short might be spam, too long might be spam)
        $contentLength = strlen(trim($content));
        if ($contentLength < 3) {
            $issues[] = "Contenu trop court";
            $severityScore += 5;
        } elseif ($contentLength > 2000) {
            $issues[] = "Contenu trop long";
            $severityScore += 15;
        }

        // Check for all caps (shouting)
        if ($content === strtoupper($content) && $contentLength > 10) {
            $issues[] = "Contenu en majuscules (cri)";
            $severityScore += 10;
        }

        // Remove duplicate issues
        $issues = array_unique($issues);

        return [
            'isValid' => empty($issues),
            'issues' => $issues,
            'filteredContent' => $filteredContent,
            'badWordCount' => $badWordCount,
            'severityScore' => $severityScore,
            'isBlocked' => $severityScore >= 30, // Block if severity is high
        ];
    }

    private function getWordSeverity(string $word): int
    {
        // High severity words
        $highSeverity = ['nigger', 'nigga', 'cunt', 'motherfucker', 'fils de pute', 'rape', 'kill', 'murder'];
        $mediumSeverity = ['fuck', 'shit', 'bitch', 'asshole', 'bastard', 'whore', 'slut'];
        $lowSeverity = ['damn', 'hell', 'crap', 'stupid', 'idiot'];

        if (in_array(strtolower($word), $highSeverity)) {
            return 25;
        } elseif (in_array(strtolower($word), $mediumSeverity)) {
            return 15;
        } elseif (in_array(strtolower($word), $lowSeverity)) {
            return 5;
        }

        return 10; // Default severity
    }

    public function isContentValid(string $content): bool
    {
        $result = $this->filterContent($content);
        return $result['isValid'];
    }

    public function getFilteredContent(string $content): string
    {
        $result = $this->filterContent($content);
        return $result['filteredContent'];
    }
}
