DROP DATABASE IF EXISTS `jmagic`;

CREATE DATABASE IF NOT EXISTS `jmagic`;

USE `jmagic`;

-- Files

-- Here we will keep the locations of any files. If different sizes are
-- available, then each location is noted. Otherwise, just the large is stored.

DROP TABLE IF EXISTS `files`;

CREATE TABLE IF NOT EXISTS `files` (
    `id` INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    `name` VARCHAR(255),
    `description` TEXT,
    `small` VARCHAR(255),
    `medium` VARCHAR(255),
    `large` VARCHAR(255) NOT NULL,
    `created_at` DATETIME DEFAULT NOW(),
    `modified_at` DATETIME DEFAULT NOW() ON UPDATE NOW()
);

-- Users

DROP TABLE IF EXISTS `users`;

CREATE TABLE IF NOT EXISTS `users` (
    `id` INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    `username` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `file_id` INT,
    `created_at` DATETIME DEFAULT NOW(),
    `modified_at` DATETIME DEFAULT NOW() ON UPDATE NOW(),
    FOREIGN KEY (`file_id`) REFERENCES `files`(`id`)
);

-- Binders

-- Decks and binders essentially serve the same function, a way to group cards.
-- However, a user is likely going to make a difference between the two, so we
-- keep them separate. Furthermore, a deck is likely going to need a format
-- associated with it.

DROP TABLE IF EXISTS `binders`;

CREATE TABLE IF NOT EXISTS `binders` (
    `id` INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `description` TEXT,
    `user_id` INT,
    `file_id` INT,
    `created_at` DATETIME DEFAULT NOW(),
    `modified_at` DATETIME DEFAULT NOW() ON UPDATE NOW(),
    FOREIGN KEY (`user_id`) REFERENCES `users`(`id`),
    FOREIGN KEY (`file_id`) REFERENCES `files`(`id`)
);

-- Decks

DROP TABLE IF EXISTS `decks`;

CREATE TABLE IF NOT EXISTS `decks` (
    `id` INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `description` TEXT,
    `format` VARCHAR(255),
    `user_id` INT,
    `file_id` INT,
    `created_at` DATETIME DEFAULT NOW(),
    `modified_at` DATETIME DEFAULT NOW() ON UPDATE NOW(),
    FOREIGN KEY (`user_id`) REFERENCES `users`(`id`),
    FOREIGN KEY (`file_id`) REFERENCES `files`(`id`)
);

-- Cards

-- Each physical card gets its own entry here. When a user inputs a quantity,
-- that will just tell the app how many entries to input.
-- This allows us to track individual cards, rather than just the abstract
-- concept.
-- This also means there's no need for a pivot table, as a card can only belong
-- to one place at a time. If we move it from a binder to a deck, then this
-- should be reflected in the entry. i.e. either the binder_id or deck_id can
-- have an entry, but not both.
-- We can also mark it as featured if it is being used in a deck.
-- Theoretically, a deck could have any number of featured cards, though really
-- a user would only need to have one or two.

DROP TABLE IF EXISTS `cards`;

CREATE TABLE IF NOT EXISTS `cards` (
    `id` INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    `name` VARCHAR(255),
    `set_code` VARCHAR(7) NOT NULL,
    `collector_number` VARCHAR(7) NOT NULL,
    `finish` VARCHAR(255),
    `condition` VARCHAR(255),
    `lang` VARCHAR(255),
    `purchase` INT,
    `alter` BOOLEAN,
    `proxy` BOOLEAN,
    `notes` TEXT,
    `featured` BOOLEAN,
    `user_id` INT,
    `binder_id` INT,
    `deck_id` INT,
    `file_id` INT,
    `created_at` DATETIME DEFAULT NOW(),
    `modified_at` DATETIME DEFAULT NOW() ON UPDATE NOW(),
    FOREIGN KEY (`user_id`) REFERENCES `users`(`id`),
    FOREIGN KEY (`binder_id`) REFERENCES `binders`(`id`),
    FOREIGN KEY (`deck_id`) REFERENCES `decks`(`id`),
    FOREIGN KEY (`file_id`) REFERENCES `files`(`id`)
);