# Configuration Isso - Guide Rapide

## Option 1: Installation Complète (Recommandée si vous avez Python)

### Vérifier Python
```bash
python --version
```
Vous devez avoir Python 3.8+

### Installer Isso
```bash
pip install isso
```

### Créer le dossier de configuration
```bash
mkdir C:\isso
```

### Créer le fichier de configuration
Créez `C:\isso\isso.cfg` avec ce contenu:

```ini
[general]
dbpath = C:\isso\comments.db
host = http://localhost:8000
notify = stdout

[server]
listen = http://localhost:8080

[guard]
enabled = true
ratelimit = 2
direct-reply = 3
reply-to-self = false

[markup]
options = strikethrough, superscript, autolink
allowed-elements = 
allowed-attributes = 

[hash]
salt = Eech7co8Ohloopo9Ol6baimi
algorithm = pbkdf2
```

### Lancer Isso
```bash
isso -c C:\isso\isso.cfg run
```

Laissez cette fenêtre ouverte (Isso doit tourner en permanence).

### Configurer MuseHub
Modifiez `.env`:
```bash
ISSO_URL=http://localhost:8080
```

---

## Option 2: Alternative Simple (Sans Installation)

Si vous ne voulez pas installer Isso, vous pouvez :

1. **Laisser ISSO_URL vide** dans `.env`
   - Le système fonctionnera normalement
   - Le badge Isso n'apparaîtra pas (c'est normal)

2. **Utiliser les commentaires internes de MuseHub**
   - Déjà fonctionnels
   - Pas besoin de serveur externe

---

## Test

Après configuration, visitez:
```
http://localhost:8000/community
```

Le badge "Commentaires sécurisés" devrait apparaître si Isso est configuré.
