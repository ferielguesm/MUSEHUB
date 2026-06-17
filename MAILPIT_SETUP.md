# Mailpit Setup Guide

## Installation

### Windows
1. Download Mailpit from: https://github.com/axllent/mailpit/releases
2. Extract `mailpit.exe` to a folder (e.g., `C:\mailpit\`)
3. Run Mailpit:
   ```bash
   mailpit.exe
   ```

### Alternative: Docker
```bash
docker run -d --name=mailpit -p 8025:8025 -p 1025:1025 axllent/mailpit
```

## Configuration

Mailpit is already configured in your `.env`:
```bash
MAILER_DSN=smtp://localhost:1025
```

## Usage

1. **Start Mailpit** (if not running):
   ```bash
   mailpit.exe
   ```

2. **Access Web UI**:
   - Open browser: http://localhost:8025
   - View all emails sent by the application

3. **Test Event Emails**:
   - Go to `/admin/events`
   - Approve or reject a participant
   - Check Mailpit UI for the email

## Features

- **SMTP Server**: localhost:1025
- **Web Interface**: localhost:8025
- **Real-time**: Emails appear instantly
- **No configuration**: Works out of the box
- **Search**: Find emails by subject, recipient, etc.

## Troubleshooting

**Emails not appearing?**
- Check Mailpit is running
- Verify `.env` has `MAILER_DSN=smtp://localhost:1025`
- Check Symfony logs for errors

**Port already in use?**
- Change ports in Mailpit startup:
  ```bash
  mailpit.exe --smtp=:1026 --listen=:8026
  ```
- Update `.env` accordingly
