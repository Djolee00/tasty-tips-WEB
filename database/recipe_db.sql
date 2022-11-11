-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2022 at 06:40 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `recipe_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `recipe`
--

CREATE TABLE `recipe` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prep_time` int(11) NOT NULL,
  `cook_time` int(11) NOT NULL,
  `num_of_servings` int(11) NOT NULL,
  `step_one` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `step_two` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `step_three` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `recipe`
--

INSERT INTO `recipe` (`id`, `name`, `prep_time`, `cook_time`, `num_of_servings`, `step_one`, `step_two`, `step_three`, `description`, `image`, `user_id`) VALUES
(1, 'Carne Asada', 15, 5, 4, 'Marinating the Steak', 'Preparing the Grill', 'Grilling the Steak', 'Carne asada is a type of thin steak frequently cut into small strips an served in tortilla shells, but it can also be prepared as an entrée. It is usually prepared by marinating and grilling it, but you can also sauté the steak or make it in the slow cooker. Keep reading to learn more about how to prepare this entrée at home.', 'recipe-1.jpeg', 1),
(2, 'Greek Ribs', 15, 5, 2, 'Marinate in the refrigerator, turning occasionally, 4 to 8 hours.', 'Preheat oven to 400 degrees F (200 degrees C). Line a baking sheet with aluminum foil; grease with cooking spray.\r\n\r\n', 'Arrange ribs on the prepared baking sheet, leaving space between them.', 'I love growing fresh herbs and right now the oregano in my herb pot is overgrowing! Greek Ribs is one tasty recipe using fresh oregano. Enjoy these ribs as an appetizer and serve with my homemade Tzatziki Sauce. As a main course these Greek marinated ribs are exceptional served with a tasty salad like my Santa Fe Salad. The marinade of garlic, oregano, lemon and onions pack some serious flavour! Make the marinade in the morning and let the ribs soak up the seasonings all day.', 'recipe-2.jpeg', 1),
(3, 'Vegetable Soup', 15, 5, 6, 'Chop all the veggies (carrot, cabbage, french beans, onion and garlic) into small pieces as shown in the picture.', 'Add 3 tablespoons water and mix well.', 'Stir and cook for 3-4 minutes.', 'Every sip of warm and healthy vegetable soup is a divine experience during cold winter days. This recipe uses variety of vegetables and vegetable stock to make it more healthy and tasty. This simple yet flavorful soup recipe is not just easy to follow but also customizable to bring in your favorite taste with selected veggies. It calls for using fresh vegetables for best results; however, you can also use canned ones.\r\n', 'recipe-3.jpeg', 11),
(4, 'Banana Pancakes', 15, 5, 8, 'Combine your dry ingredients (flour, sugar, salt, baking powder) in one bowl and your wet ingredients (egg, milk, vegetable oil, mashed bananas) in another bowl. ', 'Pour the batter in ¼ cup portions onto a lightly oiled pan or griddle over medium-high heat. Cook for a few minutes, flip with a spatula, and cook for another few minutes.', 'Serve your banana pancakes immediately. They\'re delicious alone or with your favorite pancake toppings.', 'Wake up on the right side of the bed with a stack of sweet, cozy, and simple banana pancakes. This top-rated banana pancake recipe is easy to make and it comes together in just 15 minutes, so you don\'t have to wake up early to enjoy a satisfying breakfast. Learn how to make, store, and serve the best banana pancakes ever.', 'recipe-4.jpeg', 11),
(12, 'Gvakamole', 10, 10, 5, 'Cook', 'Cook more', 'Serve', 'Best Dish', 'a1cc0b5d-2798-40cf-9ac3-b6116a43e072.jpg', 1),
(14, 'Potato salad', 20, 15, 3, 'Place potatoes in a large saucepan of cold water. Cover, bring to the boil over high heat. ', 'Preheat a barbecue grill on high. Drain the potatoes. Set aside to cool.', 'Barbecue potato slices for 2-3 minutes each side, until crisp and slightly charred.', 'This is potato salad, but not as you know it. We\'ve kept the best bits - soft potato, crispy bacon, tangy dressing - and added a smoky barbecue flavour. This reinvented classic will have everyone begging for more.', '842bd7b1-75c7-4a93-9907-b9ea63e79138.jpeg', 1),
(24, 'Ginger cream biscuit log', 10, 25, 8, 'Use electric beaters to beat the cream , sugar and vanilla until firm peaks form.', 'Spread a little of the ginger cream down the centre of a serving plate to help the biscuits stand up.', 'Combine the orange juice and ginger wine in a shallow bowl. Dip 1 of the remaining biscuits in the ginger wine mixture.', 'If you love ripple cake and gingerbread at Christmas time, you\'ll love this easy no-cook dessert. Super easy to make with just a handful of ingredients, it\'ll be the highlight of your festive feast.', '63beeae2-efdc-4a97-beb6-e726c5591334.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com'),
(3, 'djordje', 'djordje', 'djoksile@gmail.com'),
(11, 'djole', 'djole', 'djole@gmail.com'),
(15, 'marko', 'marko', 'marko@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `recipe`
--
ALTER TABLE `recipe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `recipe`
--
ALTER TABLE `recipe`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `recipe`
--
ALTER TABLE `recipe`
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
