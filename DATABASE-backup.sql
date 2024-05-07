CREATE TABLE `games` (
  `id` INTEGER PRIMARY KEY,
  `date_start` DATETIME,
  `date_end` DATETIME,
  `created_at` DATETIME,
  `updated_at` DATETIME
);

CREATE TABLE `questions` (
  `id` INTEGER PRIMARY KEY,
  `game_id` INTEGER,
  `number` INTEGER,
  `value` VARCHAR(255),
  `type` VARCHAR(255),
  `sheet_url` TEXT,
  `created_at` DATETIME,
  `updated_at` DATETIME,
  FOREIGN KEY (`game_id`) REFERENCES `games` (`id`)
);

CREATE TABLE `ranked_answers` (
  `id` INTEGER PRIMARY KEY,
  `question_id` INTEGER,
  `rank` INTEGER,
  `value` VARCHAR(255),
  `created_at` DATETIME,
  `updated_at` DATETIME,
  FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`)
);

CREATE TABLE `unique_answers` (
  `id` INTEGER PRIMARY KEY,
  `question_id` INTEGER,
  `percentage` DECIMAL,
  `value` VARCHAR(255),
  `created_at` DATETIME,
  `updated_at` DATETIME,
  FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`)
);

CREATE TABLE `ranked_submitted` (
  `question_id` INTEGER,
  `value` VARCHAR(255),
  `created_at` DATETIME,
  FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`)
);

CREATE TABLE `unique_submitted` (
  `question_id` INTEGER,
  `value` VARCHAR(255),
  `created_at` DATETIME,
  FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`)
);

CREATE TABLE `sheets` (
  `id` INTEGER PRIMARY KEY,
  `name` VARCHAR(255),
  `sheet_url` TEXT
);

CREATE TABLE `settings` (
  `time_interval` INTEGER
);

CREATE TABLE `games_played` (
  `id` INTEGER PRIMARY KEY,
  `game_id` INTEGER,
  `score_1` DECIMAL,
  `score_2` DECIMAL,
  `score_3` DECIMAL,
  `score_4` DECIMAL,
  `total_score` DECIMAL,
  `ip_address` VARCHAR(255),
  `created_at` DATETIME,
  `updated_at` DATETIME,
  FOREIGN KEY (`game_id`) REFERENCES `games` (`id`)
);

CREATE TABLE `colors_gradient` (
  `id` INTEGER PRIMARY KEY,
  `limit` INTEGER,
  `hex` VARCHAR(20)
);

--- php artisan make:model Game
--- php artisan make:model Question
--- php artisan make:model RankedAnswer
--- php artisan make:model UniqueAnswer
--- php artisan make:model RankedSubmitted
--- php artisan make:model UniqueSubmitted
--- php artisan make:model Sheet
--- php artisan make:model Setting
--- php artisan make:model GamePlayed
--- php artisan make:model ColorGradient

ALTER TABLE `colors_gradient` AUTO_INCREMENT=600;

-- games
ALTER TABLE games
ADD COLUMN status VARCHAR(10);
ALTER TABLE games
MODIFY COLUMN id INTEGER AUTO_INCREMENT;

