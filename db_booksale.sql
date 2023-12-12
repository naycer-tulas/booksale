-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 28, 2023 at 01:33 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_booksale`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_books`
--

CREATE TABLE `tbl_books` (
  `book_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `description` varchar(2555) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `user_id` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_books`
--

INSERT INTO `tbl_books` (`book_id`, `title`, `author`, `description`, `image`, `user_id`) VALUES
(1, 'A Time to Kill', 'John Grisham', 'Carl Lee Hailey (Samuel L. Jackson) is a heartbroken black father who avenges his daughter\'s brutal rape by shooting the bigoted men responsible for the crime as they are on their way to trial. He turns to Jake Brigance (Matthew McConaughey), an untested lawyer, to defend him. Brigance struggles to believe that he can get Hailey acquitted. ', 'book-2.jpg', 2),
(2, 'Eat Pray Love', 'Elizabeth Gilbert', 'Liz Gilbert (Julia Roberts) thought she had everything she wanted in life: a home, a husband and a successful career. Now newly divorced and facing a turning point, she finds that she is confused about what is important to her. Daring to step out of her comfort zone, Liz embarks on a quest of self-discovery that takes her to Italy, India and Bali. ', 'book-3.jpg', 2),
(3, 'The Martian', 'Andy Weir', 'When astronauts blast off from the planet Mars, they leave behind Mark Watney (Matt Damon), presumed dead after a fierce storm. With only a meager amount of supplies, the stranded visitor must utilize his wits and spirit to find a way to survive on the hostile planet. Meanwhile, back on Earth, members of NASA and a team of scientists work tirelessly to bring him home. ', 'book-4.jpg', 2),
(34, '1984', 'George Orwell', 'Nineteen Eighty-Four is a dystopian novel and cautionary tale by English writer George Orwell. It was published on 8 June 1949 by Secker & Warburg as Orwell\'s ninth and final book completed in his lifetime', '1984.jpg', 2),
(35, 'To Kill a Mockingbird', 'Harper Lee', 'To Kill a Mockingbird is a novel by the American author Harper Lee. It was published in 1960 and was instantly successful. In the United States, it is widely read in high schools and middle schools.', 'to-kill-a-mocking-bird.jpg', 2),
(36, 'The Great Gatsby', 'F. Scott Fitzgerald', 'The Great Gatsby is a 1925 novel by American writer F. Scott Fitzgerald. Set in the Jazz Age on Long Island, near New York City, the novel depicts first-person narrator Nick Carraway\'s interactions with mysterious millionaire Jay Gatsby and Gatsby\'s obsession to reunite with his former lover, Daisy Buchanan.', 'great-gatsby.jpg', 3),
(37, 'The Catcher in the Rye', 'J. D. Salinger', 'The Catcher in the Rye is an American novel by J. D. Salinger that was partially published in serial form 1945–46 before being novelized in 1951. Originally intended for adults, it is often read by adolescents for its themes of angst and alienation, and as a critique of superficiality in society.', 'cather-rye.jpg', 3),
(39, 'Wuthering Heights', 'Emily Brontë', 'Wuthering Heights is the first and only novel by the English author Emily Brontë, initially published in 1847 under her pen name \"Ellis Bell\".', 'wuthering-heights.jpg', 3),
(40, 'Lolita', 'Vladimir Nabokov', 'Lolita is a 1955 novel written by Russian-American novelist Vladimir Nabokov which addresses hebephilia. The protagonist is an unreliable narrator, a French literature professor who moves to New England and writes under the pseudonym Humbert Humbert.', 'lolita.jpg', 3),
(41, 'The Grapes of Wrath', 'John Steinbeck', 'The Grapes of Wrath is an American realist novel written by John Steinbeck and published in 1939. The book won the National Book Award and Pulitzer Prize for fiction, and it was cited prominently when Steinbeck was awarded the Nobel Prize in 1962.', 'grapes-wrath.jpg', 3),
(42, 'Crime and Punishment', 'Fyodor Dostoevsky', 'Crime and Punishment is a novel by the Russian author Fyodor Dostoevsky. It was first published in the literary journal The Russian Messenger in twelve monthly installments during 1866. It was later published in a single volume.', 'crime-punishment.jpg', 3),
(43, 'Anna Karenina', 'Leo Tolstoy', 'Anna Karenina is a novel by the Russian author Leo Tolstoy, first published in book form in 1878. Considered to be one of the greatest works of literature ever written, Tolstoy himself called it his first true novel.', 'ana-karenina.jpg', 3),
(47, 'Non blanditiis sunt', 'Maiores id aliquam c', 'Sunt aliquip praesen', '396470224_1778147202615293_6170287949784776322_n.jpg', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_books_categories`
--

CREATE TABLE `tbl_books_categories` (
  `bks_ctgs_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_books_categories`
--

INSERT INTO `tbl_books_categories` (`bks_ctgs_id`, `book_id`, `category_id`) VALUES
(4, 3, 1),
(5, 3, 2),
(6, 3, 3),
(18, 2, 1),
(19, 2, 2),
(68, 1, 1),
(69, 34, 3),
(70, 35, 1),
(71, 35, 2),
(72, 36, 1),
(73, 36, 2),
(74, 36, 3),
(75, 37, 2),
(76, 37, 3),
(80, 39, 1),
(81, 39, 2),
(82, 39, 3),
(83, 40, 1),
(84, 40, 2),
(85, 40, 3),
(94, 43, 2),
(95, 43, 25),
(96, 43, 26),
(97, 42, 1),
(98, 42, 25),
(99, 42, 26),
(100, 41, 1),
(101, 41, 3),
(102, 41, 25),
(103, 41, 26),
(109, 47, 2),
(110, 47, 3),
(111, 47, 26);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `description` varchar(2555) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`category_id`, `category_name`, `description`) VALUES
(1, 'Horror', 'Horror is a genre of fiction that is intended to disturb, frighten or scare. Horror is often divided into the sub-genres of psychological horror and supernatural horror, which are in the realm of speculative fiction.'),
(2, 'Romance', 'A romance novel or romantic novel generally refers to a type of genre fiction novel which places its primary focus on the relationship and romantic love between two people, and usually has an \"emotionally satisfying and optimistic ending.\"'),
(3, 'Science Fiction', 'Science fiction is a genre of speculative fiction, which typically deals with imaginative and futuristic concepts such as advanced science and technology, space exploration, time travel, parallel universes, and extraterrestrial life. Science fiction can trace its roots to ancient mythology. '),
(25, 'Fiction', 'Fiction is any creative work, chiefly any narrative work, portraying individuals, events, or places that are imaginary or in ways that are imaginary. Fictional portrayals are thus inconsistent with history, fact, or plausibility.'),
(26, 'Novel', 'A novel is an extended work of narrative fiction usually written in prose and published as a book. The English word to describe such a work derives from the Italian: novella for \"new\".');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `first_name`, `last_name`, `email`, `password`, `type`) VALUES
(1, 'Naycer', 'Tulas', 'n.tulas@bsu.edu.ph', 'password', 'administrator'),
(2, 'Plato', 'Osborne', 'kezunojam@mailinator.com', 'password', 'regular'),
(3, 'Katelyn', 'Marks', 'qazeje@mailinator.com', 'password', 'regular'),
(4, 'Cadman', 'Bell', 'sowycujyko@mailinator.com', 'password', 'regular'),
(5, 'Jillian', 'Peters', 'bytegex@mailinator.com', 'password', 'regular');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_books`
--
ALTER TABLE `tbl_books`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_books_categories`
--
ALTER TABLE `tbl_books_categories`
  ADD PRIMARY KEY (`bks_ctgs_id`),
  ADD KEY `tbl_books_categories_ibfk_1` (`book_id`),
  ADD KEY `tbl_books_categories_ibfk_2` (`category_id`);

--
-- Indexes for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_books`
--
ALTER TABLE `tbl_books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `tbl_books_categories`
--
ALTER TABLE `tbl_books_categories`
  MODIFY `bks_ctgs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_books`
--
ALTER TABLE `tbl_books`
  ADD CONSTRAINT `tbl_books_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_books_categories`
--
ALTER TABLE `tbl_books_categories`
  ADD CONSTRAINT `tbl_books_categories_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `tbl_books` (`book_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_books_categories_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `tbl_categories` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
