
DROP TABLE IF EXISTS `ranked_answers`;
DROP TABLE IF EXISTS `unique_answers`;
DROP TABLE IF EXISTS `ranked_submitted`;
DROP TABLE IF EXISTS `unique_submitted`;
DROP TABLE IF EXISTS `sheets`;
DROP TABLE IF EXISTS `settings`;
DROP TABLE IF EXISTS `games_played`;
DROP TABLE IF EXISTS `colors_gradient`;
DROP TABLE IF EXISTS `questions`;
DROP TABLE IF EXISTS `games`;


CREATE TABLE `games` (
  `id` INTEGER AUTO_INCREMENT PRIMARY KEY,
  `date_start` DATETIME,
  `date_end` DATETIME,
  `status` VARCHAR(10),
  `created_at` DATETIME,
  `updated_at` DATETIME
) AUTO_INCREMENT=1;

CREATE TABLE `questions` (
  `id` INTEGER AUTO_INCREMENT PRIMARY KEY,
  `game_id` INTEGER,
  `number` INTEGER,
  `value` VARCHAR(255),
  `type` VARCHAR(255),
  `sheet_url` TEXT,
  `created_at` DATETIME,
  `updated_at` DATETIME,
  FOREIGN KEY (`game_id`) REFERENCES `games` (`id`)
) AUTO_INCREMENT=500;

CREATE TABLE `ranked_answers` (
  `id` INTEGER AUTO_INCREMENT PRIMARY KEY,
  `question_id` INTEGER,
  `rank` INTEGER,
  `value` VARCHAR(255),
  `created_at` DATETIME,
  `updated_at` DATETIME,
  FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`)
) AUTO_INCREMENT=3000;

CREATE TABLE `unique_answers` (
  `id` INTEGER AUTO_INCREMENT PRIMARY KEY,
  `question_id` INTEGER,
  `percentage` DECIMAL,
  `value` VARCHAR(255),
  `created_at` DATETIME,
  `updated_at` DATETIME,
  FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`)
) AUTO_INCREMENT=6000;

CREATE TABLE `ranked_submitted` (
  `id` INTEGER AUTO_INCREMENT PRIMARY KEY,
  `question_id` INTEGER,
  `value` VARCHAR(255),
  `created_at` DATETIME,
  FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`)
) AUTO_INCREMENT=20000;

CREATE TABLE `unique_submitted` (
  `id` INTEGER AUTO_INCREMENT PRIMARY KEY,
  `question_id` INTEGER,
  `value` VARCHAR(255),
  `created_at` DATETIME,
  FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`)
) AUTO_INCREMENT=40000;

CREATE TABLE `sheets` (
  `id` INTEGER AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(255),
  `sheet_url` TEXT
) AUTO_INCREMENT=900;

CREATE TABLE `settings` (
  `time_interval` INTEGER
);

CREATE TABLE `games_played` (
  `id` INTEGER AUTO_INCREMENT PRIMARY KEY,
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
) AUTO_INCREMENT=700;

CREATE TABLE `colors_gradient` (
  `id` INTEGER AUTO_INCREMENT PRIMARY KEY,
  `limit` INTEGER,
  `hex` VARCHAR(20)
) AUTO_INCREMENT=880;

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

ALTER TABLE games
ADD COLUMN name VARCHAR(255);

ALTER TABLE unique_answers
MODIFY COLUMN percentage DECIMAL(10, 1);

ALTER TABLE games_played
MODIFY COLUMN score_1 DECIMAL(10, 1);

ALTER TABLE games_played
MODIFY COLUMN score_2 DECIMAL(10, 1);

ALTER TABLE games_played
MODIFY COLUMN score_3 DECIMAL(10, 1);

ALTER TABLE games_played
MODIFY COLUMN score_4 DECIMAL(10, 1);

ALTER TABLE games_played
MODIFY COLUMN total_score DECIMAL(10, 1);

--ALTER TABLE unique_answers DROP COLUMN votes;

ALTER TABLE unique_answers
ADD COLUMN votes DECIMAL(10, 2) DEFAULT 0;


--- MAR 14 AVRIL

CREATE TABLE visits (
  id INT AUTO_INCREMENT PRIMARY KEY,
  ip_address VARCHAR(45) NOT NULL,
  country VARCHAR(255),
  date_visit DATE,
  created_at DATETIME,
  updated_at DATETIME
);

ALTER TABLE games_played
ADD COLUMN country VARCHAR(255) NULL;

--- Jeudi 
ALTER TABLE unique_answers CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
ALTER TABLE unique_submitted CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
ALTER TABLE ranked_answers CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
ALTER TABLE unique_submitted CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

--- lundi 19mai 
ALTER TABLE `unique_submitted`
ADD COLUMN `is_correct` BOOLEAN DEFAULT FALSE;

ALTER TABLE `ranked_submitted`
ADD COLUMN `is_correct` BOOLEAN DEFAULT FALSE;

