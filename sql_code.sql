CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Technology'),
(2, 'Gaming'),
(3, 'Auto'),
(4, 'Entertainment'),
(5, 'Books');

CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `author` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO `posts` (`id`, `category_id`, `title`, `body`, `author`) VALUES
(1, 1, 'text 1', 'lorem 1', 'Sam Smith'),
(2, 2, ' text 2', 'lorem 2', 'Sam Smith'),
(3, 5, 'text 3 ', 'lorem 3', 'Sam Smith'),
(4, 3, 'text 4', 'lorem 4', 'Sam Smith'),
(5, 2, 'text 5','lorem 5', 'Sam Smith');