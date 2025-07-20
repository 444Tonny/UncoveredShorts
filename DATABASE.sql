
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

ALTER TABLE games_played
ADD COLUMN country VARCHAR(255) NULL;

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

--- Bugs
CREATE TABLE suggestions (
  id INT AUTO_INCREMENT PRIMARY KEY,
  question_id INTEGER,
  value VARCHAR(255),
  created_at DATETIME,
  updated_at DATETIME,
  FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`)
);
ALTER TABLE suggestions CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- Email subscribers update 26-06-24

CREATE TABLE subscribers (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) UNIQUE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Email subscribers update 28-06-24

CREATE TABLE emails (
    id INT AUTO_INCREMENT PRIMARY KEY,
    subscriber_id BIGINT,
    subscriber_email VARCHAR(255),
    subject VARCHAR(255) NOT NULL,
    message LONGTEXT NOT NULL,
    sending_date DATETIME,
    status ENUM('pending', 'sent', 'failed') NOT NULL DEFAULT 'pending',
    created_at DATETIME,
    updated_at DATETIME
);
ALTER TABLE emails CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
ALTER TABLE emails CHANGE message message LONGTEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- Leaderboard update 13-07-24

CREATE TABLE leaderboard (
  `id` BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `initial` VARCHAR(50) NOT NULL,
  `unique_identifier` VARCHAR(255) NOT NULL,
  `game_id` INT,
  `total_score` DECIMAL,
  FOREIGN KEY (`game_id`) REFERENCES `games` (`id`),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Streak Leaderboard update 20-07-24

CREATE TABLE streak_leaderboard (
  `id` BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `initial` VARCHAR(50) NOT NULL,
  `unique_identifier` VARCHAR(255) NOT NULL,
  `last_game_id` INT,
  `streak` INT,
  FOREIGN KEY (`last_game_id`) REFERENCES `games` (`id`),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Personnalized Leaderboard update 24-07-24

CREATE TABLE leaderboard_category (
  `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `category_name` VARCHAR(50) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

ALTER TABLE leaderboard 
ADD COLUMN id_category INT UNSIGNED,
ADD COLUMN category_name VARCHAR(250);

-- Sheets 
CREATE TABLE google_sheets_url (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    sheet_name VARCHAR(255) NOT NULL,
    sheet_url VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
INSERT INTO google_sheets_url (id, sheet_name, sheet_url)
VALUES (100, 'Group leaderboard', NULL);

-- Error encode
ALTER DATABASE your_database_name CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

ALTER TABLE ranked_answers CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
ALTER TABLE ranked_submitted CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
ALTER TABLE unique_answers CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
ALTER TABLE unique_submitted CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;


-- Archive 18-08-2024
ALTER TABLE games
ADD COLUMN is_archiveable BOOLEAN DEFAULT 0;


ALTER TABLE games_played
ADD COLUMN is_valid_for_streak BOOLEAN DEFAULT 1;

-- Jul 25 - Block ip
ALTER TABLE leaderboard
ADD COLUMN ip_address VARCHAR(45);
