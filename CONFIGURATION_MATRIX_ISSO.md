# Guide de Configuration - Matrix & Isso

## Option 1: Matrix Protocol (Chat Temps Réel)

### Méthode Recommandée: Utiliser matrix.org (Gratuit)

#### Étape 1: Créer un compte Matrix
1. Allez sur https://app.element.io
2. Cliquez sur "Create Account"
3. Choisissez "matrix.org" comme serveur
4. Créez un compte (ex: `@musehub-bot:matrix.org`)

#### Étape 2: Obtenir le Token d'Accès

**Via Element Web:**
1. Connectez-vous à https://app.element.io
2. Cliquez sur votre avatar (en haut à gauche)
3. Allez dans "All Settings" → "Help & About"
4. Faites défiler jusqu'à "Advanced"
5. Cliquez sur "Access Token" → Copiez le token

**Ou via curl:**
```bash
curl -X POST https://matrix.org/_matrix/client/r0/login \
  -H "Content-Type: application/json" \
  -d '{
    "type": "m.login.password",
    "user": "musehub-bot",
    "password": "votre_mot_de_passe"
  }'
```

#### Étape 3: Configurer MuseHub

Modifiez votre fichier `.env`:
```bash
MATRIX_HOMESERVER=https://matrix.org
MATRIX_ACCESS_TOKEN=syt_xxxxxxxxxxxxxxxxxxxxx
MATRIX_USER_ID=@musehub-bot:matrix.org
```

---

## Option 2: Isso (Commentaires Sécurisés)

### Installation sur Windows

#### Prérequis
- Python 3.8+ installé
- pip installé

#### Étape 1: Installer Isso
```bash
pip install isso
```

#### Étape 2: Créer le fichier de configuration

Créez `isso.cfg` dans `C:\isso\`:
```ini
[general]
dbpath = C:\isso\comments.db
host = http://localhost:8000

[server]
listen = http://localhost:8080

[guard]
enabled = true
ratelimit = 2
```

#### Étape 3: Lancer Isso
```bash
isso -c C:\isso\isso.cfg run
```

#### Étape 4: Configurer MuseHub

Modifiez votre fichier `.env`:
```bash
ISSO_URL=http://localhost:8080
```

---

## Vérification

Après configuration, visitez:
- **Page Communauté**: http://localhost:8000/community
- **Matrix**: Le widget "Salons Matrix" devrait apparaître
- **Isso**: Le badge "Commentaires sécurisés" devrait apparaître
