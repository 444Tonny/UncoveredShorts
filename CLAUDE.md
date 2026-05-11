# CLAUDE.md — Uncovered Shorts

## Project Overview

**Uncovered Shorts** is a daily finance & economics trivia game platform built with Laravel 10. Players answer 4 questions per day (no login required) and compete on leaderboards. The admin panel allows full management of games, questions, answers, leaderboards, subscribers, and email campaigns.

Live URL: `https://phplaravel-1258294-4520213.cloudwaysapps.com` (Cloudways hosting)

---

## Tech Stack

| Layer | Technology |
|-------|-----------|
| Backend | Laravel 10.10, PHP 8.1+ |
| Database | MySQL (UTF8MB4) |
| ORM | Eloquent |
| Auth | Laravel UI + Sanctum |
| Frontend | Vanilla JS (ES6+), Bootstrap 5.2.3, SASS |
| Build | Vite 4.0.0 |
| Email | SMTP / O365 (samluvanda/o365-sendmail) |
| Geolocation | stevebauman/location (IP → country) |
| External API | Google Sheets API v4 (google/apiclient ^2.16) |
| Analytics | Google Analytics (G-P5M59RPS65) |
| Cookie consent | spatie/laravel-cookie-consent |

---

## Architecture

Standard Laravel MVC with a thin service layer:

- `app/Http/Controllers/` — request handling
- `app/Http/Controllers/Admin/` — admin panel controllers (auth-gated)
- `app/Models/` — Eloquent models with static query helpers
- `app/Services/EmailService.php`, `app/Services/LeaderboardService.php` — business logic
- `resources/views/` — Blade templates
- `public/js/game.js` — all client-side game logic (AJAX, scoring, modals)
- `public/css/` — hand-written CSS (no Tailwind, no compiled framework CSS on public side)

---

## Game Mechanics

### Question Types

1. **Unique Answer** (`type = 'unique'`): Player guesses a percentage value. Score = `100 - |player% - consensus%|`. Points decrease as the guess diverges from consensus.
2. **Ranked Answer** (`type = 'ranked'`): Player ranks 10 items. Each correct rank position = 1 point (max 10).

### Game Flow

- Each `Game` has 4 `Question` rows (number 1–4).
- No login required — player identity uses a client-generated `unique_identifier` stored in cookies.
- Game session stored in `games_played`; answers stored in `unique_submitted` / `ranked_submitted`.
- Score displayed as percentile vs. all players for that game.
- Game status: `ready → current → finished`. Managed by `date_start` / `date_end` (America/New_York timezone).

### Leaderboards (3 types)

| Type | Table | Key fields |
|------|-------|-----------|
| Global score | `leaderboard` | `initial`, `unique_identifier`, `game_id`, `total_score`, `category_name` |
| Win streak | `streak_leaderboard` | `initial`, `unique_identifier`, `last_game_id`, `streak` |
| Category group | `leaderboard` filtered by `category_name` | `LeaderboardCategory` defines group names |

Duplicate submission protection: IP + initial match within 5-minute window.

---

## Key Models

```
Game            → hasMany Questions, GamePlayed, Leaderboard, StreakLeaderboard
Question        → hasMany UniqueAnswer, RankedAnswer, UniqueSubmitted, RankedSubmitted, Suggestion
Leaderboard     → belongsTo Game
StreakLeaderboard → belongsTo Game (as last_game_id)
GamePlayed      → belongsTo Game
Subscriber      → hasMany Email
```

Static helpers frequently used:
- `Game::getCurrentGame()` — active/recently finished game
- `Leaderboard::getTodaysTop()` — top 10 for current game

---

## Routes Summary

**Public (no auth):**
```
GET  /                           GameController@index
GET  /play/{game_id}             GameController@index (archive)
POST /add-vote
POST /add-score-leaderboard
POST /add-streak-leaderboard
POST /change-score-group
POST /store-game-session
POST /get-game-already-played
POST /get-statistics
POST /store-player-unique        UniqueAnswerController
POST /store-player-ranked        RankedAnswerController
POST /record-visit               VisitsController
POST /send-feedback              FeedbackController
POST /subscribe                  FeedbackController
```

**Admin (auth required, prefix `/admin`):**
```
GET/POST  /admin/               Dashboard
CRUD      /admin/games
CRUD      /admin/questions
CRUD      /admin/ranked-answers
CRUD      /admin/unique-answers
GET       /admin/subscribers     + writeEmail + sendEmail
GET       /admin/leaderboard     + synchronizeGroups
GET       /admin/statistics
GET/PUT   /admin/credentials
```

---

## Google Sheets Integration

- Used to pull question answers and autocomplete suggestions.
- API key is hard-coded in `app/Models/Game.php` (known issue).
- Service account credentials in `secret.json` (git-ignored, do not commit).
- `synchronize` endpoints in admin pull fresh data from Sheets into the DB.

---

## Frontend

- **`public/js/game.js`** — all game logic: modal management, score calculation, AJAX calls, local storage.
- **`resources/views/game.blade.php`** — single-page game UI; 4 question blocks, leaderboard modals, archive selector.
- No JS framework — pure ES6 with Bootstrap 5 for UI components.
- CSS lives in `public/css/` (not compiled by Vite); admin CSS in `public/css/admin/`.
- Typography: Switzer (headers), Rubik (body), Inknut Antiqua (accent).

---

## Scheduled Commands

| Command | Purpose |
|---------|---------|
| `emails:send-scheduled` | Send queued newsletter emails |
| `reset-streak` | Reset streak leaderboard on schedule |

---

## Security Notes

- Google Sheets API key is hard-coded in `Game.php` — should be moved to `.env`.
- `secret.json` contains Google service account credentials — never commit.
- Leaderboard submissions use IP + initials for abuse prevention.
- Forbidden initials blacklist exists (profanity filter).
- All POST routes use CSRF tokens.

---

## Conventions

- Controllers: Singular (`GameController`)
- Models: Singular (`Game`)
- DB tables: Plural (except `leaderboard`, `streak_leaderboard`)
- PHP: camelCase methods, snake_case columns
- Routes: RESTful, nested for relationships
- No comments unless the WHY is non-obvious
- Admin panel features are self-contained under `Admin/` namespace and `admin/` view directory

---

## Local Dev

```bash
php artisan migrate          # Run migrations
npm run dev                  # Vite dev server (hot reload)
npm run build                # Production build
php artisan tinker           # REPL
```

Email testing via Mailpit (`MAIL_HOST=mailpit`, port 1025).
