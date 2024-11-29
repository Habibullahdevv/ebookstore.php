-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2023 at 01:34 PM
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
-- Database: `ebook`
--

-- --------------------------------------------------------

--
-- Table structure for table `add-books`
--

CREATE TABLE `add-books` (
  `book_id` int(11) NOT NULL,
  `book_title` varchar(255) NOT NULL,
  `category` int(11) NOT NULL,
  `book_discription` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `book_img` varchar(255) NOT NULL,
  `book_price` varchar(255) NOT NULL,
  `book_status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `add-books`
--

INSERT INTO `add-books` (`book_id`, `book_title`, `category`, `book_discription`, `author`, `book_img`, `book_price`, `book_status`) VALUES
(1, 'The Woman in White', 3, 'The Woman in White is a classic novel written by Wilkie Collins and first published in 1859. It is a Victorian-era mystery and suspense novel that is known for its intricate and suspenseful plot.', 'Wilkie Collins', 't1.jpg', '$45', 1),
(2, 'The Last Man', 3, 'The Last Man is a science fiction novel written by Mary Shelley the author of Frankenstein and was published in 1826. This novel is set in the future, primarily in the 21st century, and envisions a world ravaged by a global pandemic, leading to the near-e', 'Mary Shelley', 't2.jpg', '$50', 1),
(3, 'BOUND BY LAW', 4, '\"Bound by Law: Tales from the Public Domain\" is not a book but rather a graphic novel or comic book created by Keith Aoki, James Boyle, and Jennifer Jenkins. It is not a traditional narrative book but rather a work that combines legal scholarship with art', 'James Boyle', 'c1.jpg', '$20', 1),
(4, 'DRACULA', 3, 'Dracula is a classic Gothic horror novel written by Bram Stoker, first published in 1897. The novel tells the story of Count Dracula, a vampire from Transylvania, and the group of individuals who come together to thwart his evil plans.', 'Bram Stoker', 't3.jpg', '$55', 1),
(5, 'The Count of Monte Cristo', 3, 'The Count of Monte Cristo is a classic adventure novel written by Alexandre Dumas and first published in 1844. This sweeping tale of revenge and redemption is set in early 19th-century France and follows the life of Edmond Dantès, a young sailor who is un', 'Alexandre Dumas', 't4.jpg', '$60', 1),
(6, 'ROBINSON CRUSOE', 5, '\"Robinson Crusoe\" is a novel written by Daniel Defoe and first published in 1719. It is considered one of the earliest examples of the English novel and a classic of world literature. The book tells the story of Robinson Crusoe, a shipwrecked mariner who ', 'Daniel Defoe', 's1.jpg', '$60', 1),
(7, 'General Knowledge (For Grade 1)', 6, 'A general knowledge book is a comprehensive reference guide or textbook that covers a wide range of topics, facts, and information relevant to various aspects of the world.', 'Aynonumous', 'gk1.jpg', '$15', 1),
(8, 'The Greatest General Knowledge Quiz Book', 6, '\"The Greatest General Knowledge Quiz Book\" is a popular type of book that is designed to challenge and entertain readers with a wide range of trivia questions and answers.', 'Chris Cowlin', 'gk2.jpg', '$25', 1),
(9, 'Guliver Travels', 5, ' The novel is written in the form of a travel narrative and tells the story of Lemuel Gulliver extraordinary adventures in four fictional lands. Here is a description of Gulliver Travels', 'Jonathan Swift', 's2.jpg', '$35', 1),
(10, 'Peter Pan', 5, ' The story has become a classic of childrens literature and is known for its whimsical and timeless portrayal of the adventures of Peter Pan a boy who never grows up. Here is a description of Peter Pan', 'JM Barrie', 's3.jpg', '$40', 1),
(11, 'The Three Little Pigs', 5, 'The story is a fable with a simple yet enduring moral lesson. Here is a description of The Three Little Pigs', 'Aynonumous', 's4.jpg', '$45', 1),
(12, 'The Adventures of Pinochhion', 5, 'The novel tells the story of Pinocchio a wooden puppet who longs to become a real boy and his various adventures and misadventures. Here is a description of The Adventures of Pinocchio', 'Carlo Collodi', 's5.jpg', '$55', 1),
(13, 'The Little Prince', 5, 'The Little Prince original title Le Petit Prince is a novella written by French writer and aviator Antoine de Saint Exupéry Published in 1943 it is a timeless and beloved classic of children literature. ', 'Antoine de Saint Exupéry', 's7.jpg', '$60', 1),
(14, 'A Conversation with a Cat', 5, 'A Conversation with a Cat is a short story written by Edgar Allan Poe the renowned American writer and poet known for his works of dark and gothic fiction.', 'Edgar Allan Poe', 's10.jpg', '$55', 1),
(15, 'Professer Blue', 5, 'Professor Blue is one of Gabriel Rosenstocks nutty professors. He loves blue singing the blues a blue terrier blue car but can too much of a good thing be bad', 'Professer Blue', 's14.jpg', '$65', 1),
(16, 'Making Friends With Snakes', 4, 'Making Friends With Snakes is a book by author and herpetologist Herman R Haas The book explores the world of snakes offering insights information and guidance on understanding and interacting with these often misunderstood reptiles.', 'Herman R Haas', 'c2.jpg', '$20', 1),
(17, 'The Teeny boppers', 4, 'The adventures of 8 teenage friends. Meet Sariyah Nehru the ambitious fighter for liberty Lucy Yoshida the confident entertainer Kristin Rosen the tough mischievous athlete Denise Smith the mature sensible scholar Clair Middleton writer and lover of all t', 'Maryette Clement', 'c3.jpg', '$60', 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `cpassword` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `cpassword`) VALUES
(5, 'Talha Shehzore', 'Talha65@gmail.com', '$2y$10$MMqRRvmcPsSwG0GFOwHS7.o59VS5Jd7TG7qX9uSbCk7FG/8iIAvNy', '$2y$10$fEaZmfnUUJc7YuAIK7VKJOxIVtmNJAb.GWw5Lw92b9G4k6P7C7ala');

-- --------------------------------------------------------

--
-- Table structure for table `books_categorey`
--

CREATE TABLE `books_categorey` (
  `cid` int(11) NOT NULL,
  `categorey_name` varchar(255) NOT NULL,
  `cat_status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books_categorey`
--

INSERT INTO `books_categorey` (`cid`, `categorey_name`, `cat_status`) VALUES
(3, 'Novels', 1),
(4, 'Comics', 1),
(5, 'Story Books', 1),
(6, 'General Knowledge', 1),
(7, 'Quiz Books', 1),
(8, 'Journals', 1);

-- --------------------------------------------------------

--
-- Table structure for table `book_format`
--

CREATE TABLE `book_format` (
  `book_format_id` int(11) NOT NULL,
  `book_pdf` varchar(255) NOT NULL,
  `book_cd` varchar(255) NOT NULL,
  `book_hard_copy` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `cart_qty` int(11) NOT NULL,
  `cart_format` varchar(255) NOT NULL,
  `cart_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `book_id`, `cart_qty`, `cart_format`, `cart_time`) VALUES
(3, 2, 3, 2, 'Pdf format', '2023-11-02 09:51:01'),
(4, 2, 4, 2, 'hard copy', '2023-11-02 09:53:26'),
(5, 2, 5, 2, 'hard copy', '2023-11-02 09:55:16'),
(6, 2, 6, 2, 'Pdf format', '2023-11-02 09:55:43');

-- --------------------------------------------------------

--
-- Table structure for table `competition`
--

CREATE TABLE `competition` (
  `id` int(11) NOT NULL,
  `compname` varchar(255) NOT NULL,
  `compdate` varchar(255) NOT NULL,
  `comptime` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `msg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `essaycomp`
--

CREATE TABLE `essaycomp` (
  `es_id` int(11) NOT NULL,
  `es_topic` varchar(255) NOT NULL,
  `es_email` varchar(255) NOT NULL,
  `es_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reg_mem`
--

CREATE TABLE `reg_mem` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reg_mem`
--

INSERT INTO `reg_mem` (`id`, `firstname`, `lastname`, `email`, `password`) VALUES
(1, 'rabia', '', 'rabiakanwal@gmail.com', '$2y$10$7hmwgT7ela5iIItcHuA2nO2cbAabRU/7FoG9da8ax6v0wUYeYj7lS'),
(2, 'alishba', '', 'jhhhjjh@555', '$2y$10$iiujK1DgRieYmVZrpjZ7Bu2ECsPvB/UMZzRVeq2veFvo0etpN20sW'),
(3, 'osama', 'khan', 'qwe@123', '$2y$10$neMO1ydfKKSx7XWzm3QrIOxwwiXhbjC0CGIjV.LS8uKfFy6ae7DAq'),
(4, 'hamza', 'khan', 'eret@455', '$2y$10$1oacvSNUQ9GRsLdTxcZtpO4g03gNpN7hxPS6glFNq9ZrS.vkYEkBO'),
(5, 'zxcv', 'dfghj', 'ero@123', '$2y$10$rchWNc43dra5I7kkW2mUEu4E9qy03TtxPNrhLQ.hHAzDI3ZeHpPJW'),
(6, 'wdfgnm', 'wedfghj', 'dea@gmail.com', '$2y$10$PkPegjqZp7aZQny0n7XU1usQSQtSQxEvPy5.srESvBs1Zng6F7qpq'),
(7, 'qdfghjm', 'qsdfbn', 'was@gmail.com', '$2y$10$yNz9DKa.plPiNT/MEAvydOnZ7UqgHPBLe7UsIM/vtppABH5bxJWua');

-- --------------------------------------------------------

--
-- Table structure for table `storycomp`
--

CREATE TABLE `storycomp` (
  `st_id` int(11) NOT NULL,
  `st_topic` varchar(255) NOT NULL,
  `st_email` varchar(255) NOT NULL,
  `st_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `status`) VALUES
(1, 'alishba', 'hashmi', 'alishba@gmail.com', '$2y$10$/7s5AhGTRwvFpioea/WemeCSu0JSRLOhqvxc1Lv9U7vWkOQHfqG6e', 1),
(2, 'ali', 'ahmed', 'ali@gmail.com', '$2y$10$JNKwVJ8J/L3gslW7o9lBcejfmGV33V2/8iVMLLnEvMlymny3t0hrK', 1),
(3, 'Talha', 'Shehzore', 'Talha65@gmail.com', '$2y$10$lBiZriOwV2kIZDfZLRf9w.2gt0U1HZ3RScC89JyyWe3CVieJ1ov4C', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add-books`
--
ALTER TABLE `add-books`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `add-books_ibfk_1` (`category`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books_categorey`
--
ALTER TABLE `books_categorey`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `book_format`
--
ALTER TABLE `book_format`
  ADD PRIMARY KEY (`book_format_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `userfk` (`user_id`),
  ADD KEY `bookfk` (`book_id`);

--
-- Indexes for table `competition`
--
ALTER TABLE `competition`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `essaycomp`
--
ALTER TABLE `essaycomp`
  ADD PRIMARY KEY (`es_id`);

--
-- Indexes for table `reg_mem`
--
ALTER TABLE `reg_mem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `storycomp`
--
ALTER TABLE `storycomp`
  ADD PRIMARY KEY (`st_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add-books`
--
ALTER TABLE `add-books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `books_categorey`
--
ALTER TABLE `books_categorey`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `book_format`
--
ALTER TABLE `book_format`
  MODIFY `book_format_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `competition`
--
ALTER TABLE `competition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `essaycomp`
--
ALTER TABLE `essaycomp`
  MODIFY `es_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reg_mem`
--
ALTER TABLE `reg_mem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `storycomp`
--
ALTER TABLE `storycomp`
  MODIFY `st_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `add-books`
--
ALTER TABLE `add-books`
  ADD CONSTRAINT `add-books_ibfk_1` FOREIGN KEY (`category`) REFERENCES `books_categorey` (`cid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `bookfk` FOREIGN KEY (`book_id`) REFERENCES `add-books` (`book_id`),
  ADD CONSTRAINT `userfk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
