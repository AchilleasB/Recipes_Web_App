-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Nov 15, 2023 at 11:44 AM
-- Server version: 11.0.3-MariaDB-1:11.0.3+maria~ubu2204
-- PHP Version: 8.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_recipes`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`, `image_path`) VALUES
(1, 'Salads', 'A collection of delicious and healthy salad recipes.', '/../images/saladsCategory.png'),
(2, 'Pasta', 'A variety of pasta dishes to suit every taste.', '/../images/pastaCategory.png'),
(3, 'Fish', 'From grilled salmon to baked cod, these fish recipes are sure to impress.', '/../images/fishCategory.png'),
(4, 'Meat', 'A collection of mouth-watering meat recipes for any occasion.', '/../images/meatCategory.png'),
(5, 'Desserts', 'Indulge in these sweet treats from classic cheesecake to decadent chocolate brownies.', '/../images/dessertsCategory.png');

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `recipe_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`id`, `user_id`, `recipe_id`) VALUES
(3, 8, 15),
(4, 8, 17),
(21, 53, 12),
(22, 53, 6),
(23, 53, 21),
(43, 4, 1),
(44, 4, 17),
(45, 4, 21);

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `ingredients` text NOT NULL,
  `instructions` text NOT NULL,
  `creator` varchar(255) NOT NULL,
  `prep_time` varchar(55) NOT NULL,
  `category_id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`id`, `title`, `ingredients`, `instructions`, `creator`, `prep_time`, `category_id`, `image_path`) VALUES
(1, 'Greek Salad', '1 head of lettuce, 2 large tomatoes, 1 cucumber, 1 red onion, 1 cup Kalamata olives, 1 cup feta cheese', '1. Chop the lettuce into bite-sized pieces. 2. Slice the tomatoes and cucumbers. 3. Thinly slice the red onion. 4. Mix all the ingredients together in a large bowl. 5. Top with feta cheese.', 'John Doe', '15 minutes', 1, '/../images/greekSalad.png'),
(2, 'Caprese Salad', '3 large tomatoes, 1 pound fresh mozzarella cheese, 1/4 cup fresh basil leaves, 2 tablespoons balsamic vinegar, 2 tablespoons olive oil', '1. Slice the tomatoes and mozzarella cheese. 2. Arrange them alternately on a plate. 3. Drizzle with olive oil and balsamic vinegar. 4. Top with fresh basil leaves.', 'Jane Smith', '10 minutes', 1, '/../images/capreseSalad.png'),
(3, 'Cobb Salad', '2 heads of lettuce, 2 cooked chicken breasts, 4 hard-boiled eggs, 1 avocado, 1 cup cherry tomatoes, 1/2 cup crumbled blue cheese, 6 slices of bacon, 1/4 cup red wine vinegar, 1/2 cup olive oil', '1. Chop the lettuce into bite-sized pieces. 2. Slice the chicken, eggs, and avocado. 3. Arrange them on top of the lettuce. 4. Add the cherry tomatoes and crumbled blue cheese. 5. Fry the bacon until crispy, then crumble it and add it to the salad. 6. Mix the red wine vinegar and olive oil together to make the dressing. 7. Drizzle the dressing over the salad.', 'Bob Johnson', '30 minutes', 1, '/../images/cobbSalad.png'),
(4, 'Nicoise Salad', '1 head of lettuce, 2 cans of tuna, 4 hard-boiled eggs, 1/2 cup Niçoise olives, 1/2 pound green beans, 4 small potatoes, 1/4 cup red wine vinegar, 1/2 cup olive oil', '1. Chop the lettuce into bite-sized pieces. 2. Cook the green beans until tender, then slice them in half. 3. Boil the potatoes until cooked through, then slice them into thin rounds. 4. Arrange the lettuce on a plate, then add the green beans and potatoes. 5. Top with the tuna, sliced hard-boiled eggs, and Niçoise olives. 6. Mix the red wine vinegar and olive oil together to make the dressing. 7. Drizzle the dressing over the salad.', 'Mary Williams', '45 minutes', 1, '/../images/nicoiseSalad.png'),
(5, 'Waldorf Salad', '2 Apples, 1/2 Celery, 5 Walnuts, 10gr Raisins, 5gr Mayonnaise, 10 ml Lemon juice, 1 dash Salt', '1. Dice the apples and place in a large bowl. 2. Dice the celery and add to the bowl. 3. Chop the walnuts and add to the bowl. 4. Add the raisins to the bowl. 5. In a separate bowl, mix together the mayonnaise, lemon juice, and salt. 6. Pour the mayonnaise mixture over the apple mixture and stir to mix. 7. Serve chilled.', 'Emily Davis', '15 min', 1, '/../images/waldorfSalad.png'),
(6, 'Spaghetti Carbonara', 'spaghetti, pancetta, eggs, parmesan cheese, garlic, black pepper', '1. Cook spaghetti in a pot of boiling salted water until al dente. 2. In a separate pan, cook pancetta until crispy. 3. In a bowl, whisk together eggs, parmesan cheese, garlic, and black pepper. 4. Drain spaghetti and add to the pan with pancetta. 5. Turn off the heat and add the egg mixture, stirring quickly to coat the spaghetti. 5. Serve immediately.', 'Chef John', '30 minutes', 2, '/../images/carbonaraPasta.png'),
(7, 'Pesto Pasta Salad', 'pasta, pesto sauce, cherry tomatoes, mozzarella cheese, black olives', '1. Cook pasta according to package directions. 2. In a large bowl, mix together cooked pasta, pesto sauce, cherry tomatoes, mozzarella cheese, and black olives. 3. Serve chilled or at room temperature.', 'Giada De Laurentiis', '25 minutes', 2, '/../images/pestoPasta.png'),
(8, 'Linguine with Clams', 'linguine, clams, garlic, white wine, butter, parsley', '1. Cook linguine in a pot of boiling salted water until al dente. 2. In a separate pan, sauté garlic in butter until fragrant. 3. Add clams and white wine, cover the pan, and cook until clams open. 4. Drain linguine and add to the pan with clams. 5. Toss with parsley and serve immediately.', 'Ina Garten', '35 minutes', 2, '/../images/clamsPasta.png'),
(9, 'Fettuccine Alfredo', 'fettuccine, heavy cream, parmesan cheese, butter, garlic, nutmeg', '1. Cook fettuccine in a pot of boiling salted water until al dente. 2. In a separate pan, heat heavy cream and butter until melted. 3. Add parmesan cheese, garlic, and nutmeg, and stir until the sauce is smooth. 4. Drain fettuccine and add to the pan with the sauce. 5. Serve immediately.', 'Gordon Ramsay', '20 minutes', 2, '/../images/alfredoPasta.png'),
(10, 'Pasta alla Norma', 'pasta, eggplant, tomato sauce, garlic, basil, ricotta salata', '1. Cook pasta in a pot of boiling salted water until al dente. 2. In a separate pan, sauté garlic and eggplant until golden brown. 3. Add tomato sauce and basil, and simmer until the sauce thickens. 4. Drain pasta and add to the pan with the sauce. 5. Top with crumbled ricotta salata and serve immediately.', 'Mario Batali', '40 minutes', 2, '/../images/normaPasta.png'),
(11, 'Grilled Salmon', 'salmon fillets, olive oil, salt, pepper', '1. Preheat grill. 2. Brush salmon fillets with olive oil and sprinkle with salt and pepper. 3. Grill salmon fillets for 4-6 minutes per side, or until cooked through.', 'John Smith', '20 minutes', 3, '/../images/grilledSalmonFish.png'),
(12, 'Lemon Herb Tilapia', 'tilapia fillets, lemon juice, olive oil, garlic, thyme, salt, pepper', '1. Preheat oven to 375°F. 2. In a small bowl, whisk together lemon juice, olive oil, garlic, thyme, salt, and pepper. 3. Place tilapia fillets in a baking dish and pour lemon herb mixture over them. 4. Bake for 12-15 minutes, or until fish flakes easily with a fork.', 'Mary Johnson', '30 minutes', 3, '/../images/tilapiaFish.png'),
(13, 'Soy-Ginger Glazed Salmon', 'salmon fillets, soy sauce, honey, ginger, garlic', '1. Preheat oven to 400°F. 2. In a small bowl, whisk together soy sauce, honey, ginger, and garlic. 3. Place salmon fillets in a baking dish and pour soy-ginger mixture over them. 4. Bake for 12-15 minutes, or until fish flakes easily with a fork.', 'David Lee', '25 minutes', 3, '/../images/soySalmonFish.png'),
(14, 'Spicy Tuna Roll', 'sushi rice, nori sheets, canned tuna, sriracha, mayonnaise, cucumber, avocado', '1. Cook sushi rice according to package instructions. 2. Mix canned tuna with sriracha and mayonnaise. 3. Cut cucumber and avocado into thin strips. 4. Place a nori sheet on a sushi mat, spread cooked rice on top, leaving a 1-inch border. 5. Spread tuna mixture on top of the rice, then add cucumber and avocado. 6. Roll tightly and slice into pieces.', 'Sophia Kim', '45 minutes', 3, '/../images/rollTunaFish.png'),
(15, 'Fish Tacos', 'tilapia fillets, corn tortillas, avocado, tomatoes, cilantro, lime juice, salt', '1. Heat a large skillet over medium-high heat. 2. Season tilapia fillets with salt and pepper, then cook in the skillet for 3-4 minutes per side, or until cooked through. 3. Warm corn tortillas in the microwave or on the stovetop. 4. Assemble tacos with cooked tilapia, sliced avocado, chopped tomatoes, cilantro, and a squeeze of lime juice.', 'Daniel Smith', '30 minutes', 3, '/../images/tacosFish.png'),
(16, 'Beef Stroganoff', '1 lb beef tenderloin, 1 onion, 8 oz mushrooms, 1 cup beef broth, 1/2 cup sour cream', '1. Cut beef tenderloin into thin slices. 2. Sauté onion and mushrooms in a large skillet over medium-high heat until softened, about 5 minutes. 3. Add the beef and cook for 5-7 minutes or until browned. 4. Add beef broth and simmer for 5 minutes. 5. Remove from heat and stir in sour cream. Serve over egg noodles.', 'Jane Doe', '45 minutes', 4, '/../images/stroganoffMeat.png'),
(17, 'Braised Short Ribs', '4 lbs bone-in beef short ribs, 2 cups beef broth, 1 cup red wine, 2 carrots, 2 celery stalks, 1 onion, 6 garlic cloves', '1. Preheat oven to 350°F. 2. Season short ribs with salt and pepper. 3. Heat oil in a large Dutch oven over medium-high heat. Add short ribs and cook until browned on all sides, about 8 minutes. 4. Remove the ribs and set aside. Add carrots, celery, and onion to the pot and cook until softened, about 5 minutes. 5. Add garlic and cook for 1 minute. 6. Add the short ribs back into the pot. Pour in beef broth and red wine. 7. Bring to a simmer and then cover the pot and transfer to the oven. 8. Cook for 2 1/2 to 3 hours, until the meat is tender. Serve with mashed potatoes.', 'John Smith', '3 hours', 4, '/../images/ribsMeat.png'),
(18, 'Spicy Beef Stir Fry', '1 lb flank steak, 2 tbsp vegetable oil, 1 onion, 1 red bell pepper, 1 green bell pepper, 2 garlic cloves, 1 tsp ginger, 2 tbsp soy sauce, 1 tbsp sriracha, 1 tsp honey', '1. Cut flank steak into thin slices. 2. Heat oil in a large skillet over medium-high heat. Add onion and bell peppers and cook for 5 minutes. 3. Add garlic and ginger and cook for 1 minute. 4. Add steak and cook for 3-5 minutes, until browned. 5. In a small bowl, whisk together soy sauce, sriracha, and honey. Pour the sauce over the beef and vegetables and cook for an additional 1-2 minutes. Serve over rice.', 'Emma Lee', '30 minutes', 4, '/../images/fryBeefMeat.png'),
(19, 'Grilled Pork Chops', '4 pork chops, 1 tbsp olive oil, 2 garlic cloves, 1 tsp dried thyme, 1 tsp dried rosemary, salt, pepper', '1. Preheat grill to medium-high heat. 2. In a small bowl, mix together olive oil, garlic, thyme, and rosemary. 3. Rub the mixture over both sides of the pork chops. 4. Season with salt and pepper. 5. Grill the pork chops for 6-8 minutes per side or until the internal temperature reaches 145°F. Let the pork chops rest for 3-5 minutes before serving.', 'Tom Jackson', '25 minutes', 4, '/../images/grilledPorkMeat.png'),
(20, 'Beef Stew', '2 lbs beef chuck roast, 3 cups beef broth, 1 onion, 4 carrots, 4 celery stalks, 4 potatoes, 2 garlic cloves, 2 bay leaves, 1 tsp dried thyme, 1 tsp dried rosemary, salt, pepper', '1. Preheat the oven to 350°F. 2. Heat a large Dutch oven over medium-high heat. 3. Add the beef and brown on all sides. 4. Remove the beef from the pot and set aside. 5. Add the onions, carrots, and celery to the pot and cook until the onions are translucent. 6. Add the garlic and cook for another minute. 7. Add the beef back to the pot and add the beef broth, potatoes, bay leaves, thyme, rosemary, salt, and pepper. 8. Bring to a simmer, then cover and transfer to the oven. 9. Bake for 2-3 hours, until the beef is tender. 10. Serve hot.', 'John Smith', '2 hours', 4, '/../images/stewMeat.png'),
(21, 'Classic Cheesecake', '1 1/2 cups graham cracker crumbs, 1/4 cup granulated sugar, 1/2 cup unsalted butter, 4 (8-ounce) packages cream cheese, 1 1/4 cups granulated sugar, 1 tablespoon vanilla extract, 4 large eggs', 'Preheat oven to 325 degrees F. Grease a 9-inch springform pan. Combine graham cracker crumbs, sugar, and melted butter in a bowl; mix until well combined. Press mixture into bottom of prepared pan. In a large mixing bowl, beat cream cheese until fluffy. Add sugar and vanilla extract; mix until well combined. Add eggs, one at a time, mixing well after each addition. Pour mixture into prepared crust. Bake for 60-70 minutes or until center is almost set. Allow to cool to room temperature then refrigerate for at least 3 hours or overnight before serving.', 'John Smith', '2 hours', 5, '/../images/cheesecakeDessert.png'),
(22, 'Strawberry Shortcake', '3 cups all-purpose flour, 4 teaspoons baking powder, 3/4 teaspoon salt, 1/4 cup granulated sugar, 1/2 cup unsalted butter, 1 egg, 1 cup milk, 2 cups sliced fresh strawberries, 1/4 cup granulated sugar, 2 cups heavy cream, 1/4 cup confectioners sugar', 'Preheat oven to 425 degrees F. In a large mixing bowl, combine flour, baking powder, salt, and sugar. Cut in butter using a pastry blender until mixture resembles coarse crumbs. Beat egg in a measuring cup, then add enough milk to make 1 cup. Stir into flour mixture until just moistened. Turn dough onto a floured surface; knead gently 10-12 times. Pat into a 9-inch circle. Transfer to a greased baking sheet. Bake for 15-18 minutes or until golden brown. Cool on a wire rack. In a medium mixing bowl, combine strawberries and sugar; let stand for 30 minutes. In a large mixing bowl, beat heavy cream and confectioners sugar until stiff peaks form. To assemble, split shortcake in half horizontally. Spread bottom half with whipped cream. Top with strawberries and juice. Replace shortcake top. Serve with additional whipped cream, if desired.', 'Mary Johnson', '1 hour', 5, '/../images/strawberryDessert.png'),
(23, 'Chocolate Brownies', '1 cup unsalted butter, 2 1/4 cups granulated sugar, 4 large eggs, 1 1/4 cups cocoa powder, 1 teaspoon salt, 1 teaspoon baking powder, 1 teaspoon espresso powder, 1 tablespoon vanilla extract, 1 1/2 cups all-purpose flour, 2 cups semisweet chocolate chips', 'Preheat oven to 350 degrees F. Line a 9x13 inch baking pan with parchment paper. In a large mixing bowl, melt butter in the microwave. Add sugar and whisk to combine. Add eggs, one at a time, whisking after each addition. Add cocoa powder, salt, baking powder, espresso powder, and vanilla extract; whisk to combine. Add flour and stir until just combined. Fold in chocolate chips. Pour mixture into prepared pan. Bake for 30-35 minutes or until a toothpick inserted in the center comes out with moist crumbs. Allow to cool completely in pan on a wire rack before cutting into squares.', 'David Lee', '45 minutes', 5, '/../images/browniesDessert.png'),
(24, 'Chocolate Chip Cookies', '2 1/4 cups all-purpose flour, 1 tsp baking soda, 1 tsp salt, 1 cup unsalted butter, 3/4 cup white sugar, 3/4 cup brown sugar, 2 eggs, 2 tsp vanilla extract, 2 cups semisweet chocolate chips', '1. Preheat oven to 375°F (190°C). 2. Sift together the flour, baking soda, and salt. 3. Cream together the butter, white sugar, and brown sugar until smooth. Beat in the eggs one at a time, then stir in the vanilla. Gradually blend in the sifted ingredients. Stir in the chocolate chips. 4. Drop dough by rounded tablespoonfuls onto ungreased cookie sheets. 5. Bake for 8 to 10 minutes in the preheated oven, or until golden. Allow cookies to cool on baking sheet for 5 minutes before removing to a wire rack to cool completely.', 'John Smith', '45 minutes', 5, '/../images/cookiesDessert.png'),
(25, 'Peanut Butter Cups', '1 cup creamy peanut butter, 1/2 cup unsalted butter, 1/4 cup brown sugar, 1 3/4 cups powdered sugar, 2 cups semisweet chocolate chips', '1. Line a muffin tin with 12 paper liners. 2. Melt the peanut butter and butter together in a saucepan over medium heat. 3. Stir in the brown sugar and powdered sugar until smooth. 4. Remove from heat. 5. Spoon the peanut butter mixture into the paper liners, filling each about 1/2 full. 6. Melt the chocolate chips in a double boiler or in the microwave. 7. Pour the melted chocolate over the peanut butter mixture, covering the peanut butter completely. 8. Chill in the refrigerator for at least 1 hour before serving.', 'Mike Johnson', '1 hour and 15 minutes', 5, '/../images/peanutCupsDessert.png'),
(81, 'Squirrel Man', 'squirrel, pine', 'chop the squirrel', 'Achil', '60 minutes', 4, '/../images/castorman.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`, `role`) VALUES
(3, 'Tony', '$2y$10$9Th1T6uRjCRtyyg2xb/TyO/ozGUiA/g0ngbg5VQtQkMNdsnuALtnC', 'tony@email.com', 'user'),
(4, 'Achil', '$2y$10$f5eHo/idedZ95c51zHqLZOaCZROBiyoJlQx6F0LovCmNQo41ORO.K', 'achil@email.com', 'admin'),
(5, 'Thor', '$2y$10$hJatRg9zS1uljhTnEhdIDuxnjZ7qSEfy.oTTc6bwpIWK10dJPUq7K', 'thor@email.com', 'user'),
(8, 'Hulk', '$2y$10$nLpMSBlv/j0gy74jTTN0TubZZSiOLQLW1Fk9bWxvNv6tF4BhlEBLm', 'hulk@email.com', 'user'),
(53, 'Maria', '$2y$10$kJY8LvF1m9tVOo8nn.GMSOQjkON/1H2uRcZWcY3Q4hRoqqkYUvzVe', 'maria@email.com', 'admin'),
(58, 'Ariadni-Eleni', '$2y$10$2ka8pAoqXjGACK9LKdkT8Oeo1rsExvqwjbjjNMkp.yTtuWv81Wgue', 'ariel@email.com', 'user'),
(60, 'Odin', '$2y$10$P72F534.SlwEyjplF/yOWOv6i9IHBPvKoAy.RblG21FZBu3.1I562', 'odin@email.com', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `recipe_id` (`recipe_id`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `favorites_ibfk_2` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`);

--
-- Constraints for table `recipes`
--
ALTER TABLE `recipes`
  ADD CONSTRAINT `recipes_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
