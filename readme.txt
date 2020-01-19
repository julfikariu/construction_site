# construction_site

1. Firsty Create a database. That name is "construction"
2. Then create A table `contacts` or simply copy bellow the code and paste in the Run sql area and press go button.  

--
-- Database: `construction`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `fullname` varchar(80) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `fullname`, `phone`, `email`, `subject`, `message`) VALUES
(1, 'julfikar', '0552', 'email@kkk.bo', 'kjok', 'pops  koivkoik'),
(2, 'nirob', 'jhdjjsioo', 'dhuh@jkjed.jjj', 'jdfe', 'ijijkre');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

3. Then run on the browser.