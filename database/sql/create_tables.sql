--
-- Database: 'beer'
--

-- --------------------------------------------------------

--
-- Table structure for table 'beers'
--

CREATE TABLE IF NOT EXISTS beers (
  beer_id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  user_id bigint(20) unsigned NOT NULL,
  brewery_id bigint(20) unsigned NOT NULL,
  style_id bigint(20) unsigned NOT NULL,
  ibu int(11) DEFAULT NULL,
  calories int(11) DEFAULT NULL,
  abv decimal(10,0) DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (beer_id),
  UNIQUE KEY beer_id (beer_id),
  UNIQUE KEY `name` (`name`),
  KEY brewery_id (brewery_id),
  KEY style_id (style_id),
  KEY user_id (user_id)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Table structure for table 'breweries'
--

CREATE TABLE IF NOT EXISTS breweries (
  brewery_id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  location text NOT NULL,
  created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at timestamp NULL DEFAULT NULL,
  PRIMARY KEY (brewery_id),
  UNIQUE KEY brewery_id (brewery_id),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

-- --------------------------------------------------------

--
-- Table structure for table 'migrations'
--

CREATE TABLE IF NOT EXISTS migrations (
  id int(10) unsigned NOT NULL AUTO_INCREMENT,
  migration varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  batch int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table 'password_resets'
--

CREATE TABLE IF NOT EXISTS password_resets (
  email varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  token varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  KEY password_resets_email_index (email(191))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table 'reviews'
--

CREATE TABLE IF NOT EXISTS reviews (
  review_id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  beer_id bigint(20) unsigned NOT NULL,
  user_id bigint(20) unsigned NOT NULL,
  aroma int(11) DEFAULT NULL,
  appearance int(11) DEFAULT NULL,
  taste int(11) DEFAULT NULL,
  overall int(11) DEFAULT NULL,
  created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at timestamp NULL DEFAULT NULL,
  PRIMARY KEY (review_id),
  UNIQUE KEY review_id (review_id),
  KEY beer_id (beer_id,user_id),
  KEY user_id (user_id)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table 'styles'
--

CREATE TABLE IF NOT EXISTS styles (
  style_id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at timestamp NULL DEFAULT NULL,
  PRIMARY KEY (style_id),
  UNIQUE KEY style_id (style_id),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

-- --------------------------------------------------------

--
-- Table structure for table 'users'
--

CREATE TABLE IF NOT EXISTS users (
  user_id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  email varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  api_token varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  remember_token varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at timestamp NULL DEFAULT NULL,
  PRIMARY KEY (user_id),
  UNIQUE KEY email (email)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=5 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table beers
--
ALTER TABLE beers
  ADD CONSTRAINT beers_ibfk_1 FOREIGN KEY (brewery_id) REFERENCES breweries (brewery_id),
  ADD CONSTRAINT beers_ibfk_2 FOREIGN KEY (style_id) REFERENCES styles (style_id),
  ADD CONSTRAINT beers_ibfk_3 FOREIGN KEY (user_id) REFERENCES `users` (user_id);

--
-- Constraints for table reviews
--
ALTER TABLE reviews
  ADD CONSTRAINT reviews_ibfk_1 FOREIGN KEY (beer_id) REFERENCES beers (beer_id),
  ADD CONSTRAINT reviews_ibfk_2 FOREIGN KEY (user_id) REFERENCES `users` (user_id);
