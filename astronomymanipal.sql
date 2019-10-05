-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Oct 05, 2019 at 04:23 PM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `astronomymanipal`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(511) NOT NULL,
  `author` varchar(255) NOT NULL,
  `data` longtext DEFAULT NULL,
  `image_links` mediumtext DEFAULT NULL,
  `updated_on` datetime DEFAULT current_timestamp(),
  `published_on` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `title`, `description`, `author`, `data`, `image_links`, `updated_on`, `published_on`) VALUES
(1, 'Black Holes', 'A black hole is a region of spacetime exhibiting gravitational acceleration so strong that nothing no particles or even electromagnetic radiation such as light can escape from it.', 'Sanchit Arora', 'The theory of general relativity predicts that a sufficiently compact mass can deform spacetime to form a black hole.[7][8] The boundary of the region from which no escape is possible is called the event horizon. Although the event horizon has an enormous effect on the fate and circumstances of an object crossing it, no locally detectable features appear to be observed.[9] In many ways, a black hole acts like an ideal black body, as it reflects no light.[10][11] Moreover, quantum field theory in curved spacetime predicts that event horizons emit Hawking radiation, with the same spectrum as a black body of a temperature inversely proportional to its mass. This temperature is on the order of billionths of a kelvin for black holes of stellar mass, making it essentially impossible to observe.\r\n\r\nObjects whose gravitational fields are too strong for light to escape were first considered in the 18th century by John Michell and Pierre-Simon Laplace.[12] The first modern solution of general relativity that would characterize a black hole was found by Karl Schwarzschild in 1916, although its interpretation as a region of space from which nothing can escape was first published by David Finkelstein in 1958. Black holes were long considered a mathematical curiosity; it was during the 1960s that theoretical work showed they were a generic prediction of general relativity. The discovery of neutron stars by Jocelyn Bell Burnell in 1967 sparked interest in gravitationally collapsed compact objects as a possible astrophysical reality.\r\n\r\nBlack holes of stellar mass are expected to form when very massive stars collapse at the end of their life cycle. After a black hole has formed, it can continue to grow by absorbing mass from its surroundings. By absorbing other stars and merging with other black holes, supermassive black holes of millions of solar masses (M☉) may form. There is general consensus that supermassive black holes exist in the centers of most galaxies.\r\nThe presence of a black hole can be inferred through its interaction with other matter and with electromagnetic radiation such as visible light. Matter that falls onto a black hole can form an external accretion disk heated by friction, forming some of the brightest objects in the universe. If there are other stars orbiting a black hole, their orbits can be used to determine the black hole\'s mass and location. Such observations can be used to exclude possible alternatives such as neutron stars. In this way, astronomers have identified numerous stellar black hole candidates in binary systems, and established that the radio source known as Sagittarius A*, at the core of the Milky Way galaxy, contains a supermassive black hole of about 4.3 million solar masses.\r\n\r\nOn 11 February 2016, the LIGO collaboration announced the first direct detection of gravitational waves, which also represented the first observation of a black hole merger.[13] As of December 2018, eleven gravitational wave events have been observed that originated from ten merging black holes (along with one binary neutron star merger).[14][15] On 10 April 2019, the first ever direct image of a black hole and its vicinity was published, following observations made by the Event Horizon Telescope in 2017 of the supermassive black hole in Messier 87\'s galactic centre.', 'https://upload.wikimedia.org/wikipedia/commons/4/4f/Black_hole_-_Messier_87_crop_max_res.jpg;https://upload.wikimedia.org/wikipedia/commons/thumb/5/5e/BH_LMC.png/220px-BH_LMC.png;https://scx1.b-cdn.net/csz/news/800/2019/ofalltheforc.jpg;', '2019-10-02 02:54:03', '2019-10-02'),
(2, 'Exoplanets', 'All of the planets in our solar system orbit around the Sun. Planets that orbit around other stars are called exoplanets.', 'Shanananchittt', 'An exoplanet or extrasolar planet is a planet outside the Solar System. The first possible evidence of an exoplanet was noted in 1917, but was not recognized as such.[4] The first confirmation of detection occurred in 1992. This was followed by the confirmation of a planet detected in 1988. As of 1 October 2019, there are 4,118 confirmed exoplanets in 3,063 systems, with 669 systems having more than one planet.[5]\r\n\r\nThere are many methods of detecting exoplanets. Transit photometry and Doppler spectroscopy have found the most, but these methods suffer from a clear observational bias favoring the detection of planets near the star; thus, 85% of the exoplanets detected are inside the tidal locking zone.[6] In several cases, multiple planets have been observed around a star.[7] About 1 in 5 Sun-like stars[a] have an \"Earth-sized\"[b] planet in the habitable zone.[c][8][9] Assuming there are 200 billion stars in the Milky Way,[d] it can be hypothesized that there are 11 billion potentially habitable Earth-sized planets in the Milky Way, rising to 40 billion if planets orbiting the numerous red dwarfs are included.[10]\r\n\r\nThe least massive planet known is Draugr (also known as PSR B1257+12 A or PSR B1257+12 b), which is about twice the mass of the Moon. The most massive planet listed on the NASA Exoplanet Archive is HR 2562 b,[11][12] about 30 times the mass of Jupiter, although according to some definitions of a planet (based on the nuclear fusion of deuterium[13]), it is too massive to be a planet and may be a brown dwarf instead. There are planets that are so near to their star that they take only a few hours to orbit and there are others so far away that they take thousands of years to orbit. Some are so far out that it is difficult to tell whether they are gravitationally bound to the star. Almost all of the planets detected so far are within the Milky Way. Nonetheless, evidence suggests that extragalactic planets, exoplanets farther away in galaxies beyond the local Milky Way galaxy, may exist.[14][15] The nearest exoplanet is Proxima Centauri b, located 4.2 light-years (1.3 parsecs) from Earth and orbiting Proxima Centauri, the closest star to the Sun.[16]\r\n\r\nThe discovery of exoplanets has intensified interest in the search for extraterrestrial life. There is special interest in planets that orbit in a star\'s habitable zone, where it is possible for liquid water, a prerequisite for life on Earth, to exist on the surface. The study of planetary habitability also considers a wide range of other factors in determining the suitability of a planet for hosting life.[17]\r\n\r\nBesides exoplanets, there are also rogue planets, which do not orbit any star. These tend to be considered as a separate category, especially if they are gas giants, in which case they are often counted as sub-brown dwarfs, like WISE 0855−0714.[18] The rogue planets in the Milky Way possibly number in the billions (or more).', 'https://spaceplace.nasa.gov/all-about-exoplanets/en/all-about-exoplanets1.en.png;https://upload.wikimedia.org/wikipedia/commons/9/9b/Planets_everywhere_%28artist%E2%80%99s_impression%29.jpg;https://upload.wikimedia.org/wikipedia/commons/a/ad/Exoplanet_Comparison_TrES-3_b.png;https://upload.wikimedia.org/wikipedia/commons/1/14/The_unusual_exoplanet_HIP_65426b_%E2%80%94_SPHERE%27s_first.jpg;', '2019-10-02 02:54:03', '2019-10-02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
