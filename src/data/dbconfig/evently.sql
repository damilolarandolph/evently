CREATE TABLE `user` (
  `email` varchar(255) UNIQUE PRIMARY KEY NOT NULL COMMENT 'email of the user',
  `password` varchar(255) NOT NULL COMMENT 'password of the user',
  `phone` varchar(30) NOT NULL COMMENT 'phone number of the user',
  `is_organizer` bool DEFAULT false COMMENT 'switch to determine is a user is an organizer'
);
CREATE TABLE `organizer` (
  `user` varchar(255) PRIMARY KEY COMMENT 'foreign key to user',
  `name` varchar(255) NOT NULL
);
CREATE TABLE `person` (
  `user` varchar(255) PRIMARY KEY COMMENT 'foreign key to user',
  `first_name` varchar(255) NOT NULL COMMENT 'first name of the person',
  `last_name` varchar(255) NOT NULL COMMENT 'last name of the person'
);
CREATE TABLE `event_type` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255) UNIQUE NOT NULL
);
CREATE TABLE `event_category` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(244) UNIQUE NOT NULL
);
CREATE TABLE `event` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `tickets` int(11) DEFAULT 0,
  `image` varchar(255) NOT NULL,
  `start_time` int(11) NOT NULL COMMENT 'unix timestamp of event start time',
  `end_time` int(11) NOT NULL COMMENT 'unix timestamp of event end time',
  `speaker` varchar(255) COMMENT 'speaker at event',
  `is_online` bool DEFAULT false COMMENT 'is the event online',
  `meeting_link` varchar(255),
  `description` text NOT NULL,
  `organizer` varchar(255) NOT NULL,
  `longitude` varchar(50),
  `latitude` varchar(50),
  `location` varchar(255),
  `type` int NOT NULL,
  `category` int NOT NULL
);
CREATE TABLE `reservation` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `person` varchar(255) NOT NULL,
  `event` int NOT NULL,
  `reserved_at` int(11) DEFAULT (unix_timestamp())
);
ALTER TABLE
  `organizer`
ADD
  FOREIGN KEY (`user`) REFERENCES `user` (`email`);
ALTER TABLE
  `person`
ADD
  FOREIGN KEY (`user`) REFERENCES `user` (`email`);
ALTER TABLE
  `event`
ADD
  FOREIGN KEY (`type`) REFERENCES `event_type` (`id`);
ALTER TABLE
  `event`
ADD
  FOREIGN KEY (`category`) REFERENCES `event_category` (`id`);
ALTER TABLE
  `event`
ADD
  FOREIGN KEY (`organizer`) REFERENCES `organizer` (`user`);
ALTER TABLE
  `reservation`
ADD
  FOREIGN KEY (`event`) REFERENCES `event` (`id`);
ALTER TABLE
  `reservation`
ADD
  FOREIGN KEY (`person`) REFERENCES `person` (`user`);
INSERT INTO
  event_type (name)
VALUES
  ('Appearance or Signing'),
  ('Attraction'),
  ('Camp, Trip, or Retreat'),
  ('Class, Training, or Workshop'),
  ('Concert or Performance'),
  ('Conference'),
  ('Convention'),
  ('Dinner or Gala'),
  ('Festival or Fair'),
  ('Game or Competition'),
  ('Meeting or Networking Event'),
  ('Other'),
  ('Party or Social Gathering'),
  ('Race or Endurance Event'),
  ('Rally'),
  ('Screening'),
  ('Seminar or Talk'),
  ('Tour'),
  ('Tournament'),
  ('Tradeshow, Consumer Show, or Expo');
INSERT INTO
  event_category(name)
VALUES
  ('Auto, Boat & Air'),
  ('Business & Professional'),
  ('Charity & Causes'),
  ('Community & Culture'),
  ('Family & Education'),
  ('Fashion & Beauty'),
  ('Film, Media & Entertainment'),
  ('Food & Drink'),
  ('Government & Politics'),
  ('Health & Wellness'),
  ('Hobbies & Special Interest'),
  ('Home & Lifestyle'),
  ('Music'),
  ('Other'),
  ('Performing & Visual Arts'),
  ('Religion & Spirituality'),
  ('School Activities'),
  ('Science & Technology'),
  ('Seasonal & Holiday'),
  ('Sports & Fitness'),
  ('Travel & Outdoor');