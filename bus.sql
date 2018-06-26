-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 10, 2018 at 10:00 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bus`
--
CREATE DATABASE IF NOT EXISTS `bus` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bus`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `book_detail`
--

CREATE TABLE `book_detail` (
  `seat_no` int(11) NOT NULL,
  `route_id` int(11) NOT NULL,
  `journey_date` date NOT NULL,
  `booking_date` date NOT NULL,
  `rent` int(11) NOT NULL,
  `bus_type` varchar(50) NOT NULL,
  `choice` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bus_detail`
--

CREATE TABLE `bus_detail` (
  `bus_no` int(11) NOT NULL,
  `bus_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `contact_no` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `password_update`
--

CREATE TABLE `password_update` (
  `id` int(11) NOT NULL,
  `old_password` varchar(50) NOT NULL,
  `new_password` varchar(50) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `customer_id` int(11) NOT NULL,
  `owner_name` varchar(50) NOT NULL,
  `bank` varchar(50) NOT NULL,
  `trans_type` varchar(50) NOT NULL,
  `total_rent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `route_detail`
--

CREATE TABLE `route_detail` (
  `route_id` int(11) NOT NULL,
  `departure_station` varchar(50) NOT NULL,
  `arrival_station` varchar(50) NOT NULL,
  `via_station` varchar(50) NOT NULL,
  `rent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `route_detail`
--

INSERT INTO `route_detail` (`route_id`, `departure_station`, `arrival_station`, `via_station`, `rent`) VALUES
(1, 'Banepa', 'Pokhara', 'Banepa', 1000),
(2, 'Banepa', 'Chitwan', 'Banepa', 900),
(3, 'Banepa', 'Lumbini', 'Banepa', 1200),
(4, 'Kathmandu', 'Pokhara', 'Kathmandu', 1200),
(5, 'Kathmandu', 'Chitwan', 'Kathmandu', 800),
(6, 'Kathmandu', 'Lumbini', 'Kathmandu', 1000),
(7, 'Pokhara', 'Kathmandu', 'Pokhara', 1000),
(8, 'Pokhara', 'Lumbini', 'Pokhara', 500),
(9, 'Pokhara', 'Chitwan', 'Pokhara', 600),
(10, 'Chitwan', 'Kathmandu', 'Chitwan', 800),
(11, 'Chitwan', 'Pokhara', 'Chitwan', 600),
(12, 'Chitwan', 'Lumbini', 'Chitwan', 900),
(13, 'Chitwan', 'Banepa', 'Chitwan', 900),
(14, 'Lumbini', 'Banepa', 'Lumbini', 1200),
(15, 'Lumbini', 'Kathmandu', 'Lumbini', 1000),
(16, 'Lumbini', 'Pokhara', 'Lumbini', 500);

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `trans_type` varchar(30) NOT NULL,
  `departure_time` varchar(50) NOT NULL,
  `arrival_time` varchar(50) NOT NULL,
  `departure_station` varchar(50) NOT NULL,
  `arrival_station` varchar(50) NOT NULL,
  `via_station` varchar(50) NOT NULL,
  `rent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `time_table`
--

CREATE TABLE `time_table` (
  `route_id` int(11) NOT NULL,
  `departure_station` varchar(50) NOT NULL,
  `arrival_station` varchar(50) NOT NULL,
  `via_station` varchar(50) NOT NULL,
  `departure time` varchar(50) NOT NULL,
  `arrival time` varchar(50) NOT NULL,
  `rent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `book_detail`
--
ALTER TABLE `book_detail`
  ADD PRIMARY KEY (`seat_no`);

--
-- Indexes for table `bus_detail`
--
ALTER TABLE `bus_detail`
  ADD PRIMARY KEY (`bus_no`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `route_detail`
--
ALTER TABLE `route_detail`
  ADD PRIMARY KEY (`route_id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`trans_type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `route_detail`
--
ALTER TABLE `route_detail`
  MODIFY `route_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(11) NOT NULL,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_length` text COLLATE utf8_bin,
  `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
  `col_default` text COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `settings_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `template_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

--
-- Dumping data for table `pma__export_templates`
--

INSERT INTO `pma__export_templates` (`id`, `username`, `export_type`, `template_name`, `template_data`) VALUES
(1, 'root', 'database', 'bus', '{\"quick_or_custom\":\"quick\",\"what\":\"sql\",\"structure_or_data_forced\":\"0\",\"table_select[]\":[\"admin\",\"book_detail\",\"bus_detail\",\"customer\",\"password_update\",\"payment\",\"route_detail\",\"ticket\",\"time_table\"],\"table_structure[]\":[\"admin\",\"book_detail\",\"bus_detail\",\"customer\",\"password_update\",\"payment\",\"route_detail\",\"ticket\",\"time_table\"],\"table_data[]\":[\"admin\",\"book_detail\",\"bus_detail\",\"customer\",\"password_update\",\"payment\",\"route_detail\",\"ticket\",\"time_table\"],\"aliases_new\":\"\",\"output_format\":\"sendit\",\"filename_template\":\"@DATABASE@\",\"remember_template\":\"on\",\"charset\":\"utf-8\",\"compression\":\"none\",\"maxsize\":\"\",\"codegen_structure_or_data\":\"data\",\"codegen_format\":\"0\",\"csv_separator\":\",\",\"csv_enclosed\":\"\\\"\",\"csv_escaped\":\"\\\"\",\"csv_terminated\":\"AUTO\",\"csv_null\":\"NULL\",\"csv_structure_or_data\":\"data\",\"excel_null\":\"NULL\",\"excel_columns\":\"something\",\"excel_edition\":\"win\",\"excel_structure_or_data\":\"data\",\"json_structure_or_data\":\"data\",\"json_unicode\":\"something\",\"latex_caption\":\"something\",\"latex_structure_or_data\":\"structure_and_data\",\"latex_structure_caption\":\"Structure of table @TABLE@\",\"latex_structure_continued_caption\":\"Structure of table @TABLE@ (continued)\",\"latex_structure_label\":\"tab:@TABLE@-structure\",\"latex_relation\":\"something\",\"latex_comments\":\"something\",\"latex_mime\":\"something\",\"latex_columns\":\"something\",\"latex_data_caption\":\"Content of table @TABLE@\",\"latex_data_continued_caption\":\"Content of table @TABLE@ (continued)\",\"latex_data_label\":\"tab:@TABLE@-data\",\"latex_null\":\"\\\\textit{NULL}\",\"mediawiki_structure_or_data\":\"structure_and_data\",\"mediawiki_caption\":\"something\",\"mediawiki_headers\":\"something\",\"htmlword_structure_or_data\":\"structure_and_data\",\"htmlword_null\":\"NULL\",\"ods_null\":\"NULL\",\"ods_structure_or_data\":\"data\",\"odt_structure_or_data\":\"structure_and_data\",\"odt_relation\":\"something\",\"odt_comments\":\"something\",\"odt_mime\":\"something\",\"odt_columns\":\"something\",\"odt_null\":\"NULL\",\"pdf_report_title\":\"\",\"pdf_structure_or_data\":\"structure_and_data\",\"phparray_structure_or_data\":\"data\",\"sql_include_comments\":\"something\",\"sql_header_comment\":\"\",\"sql_use_transaction\":\"something\",\"sql_compatibility\":\"NONE\",\"sql_structure_or_data\":\"structure_and_data\",\"sql_create_table\":\"something\",\"sql_auto_increment\":\"something\",\"sql_create_view\":\"something\",\"sql_procedure_function\":\"something\",\"sql_create_trigger\":\"something\",\"sql_backquotes\":\"something\",\"sql_type\":\"INSERT\",\"sql_insert_syntax\":\"both\",\"sql_max_query_size\":\"50000\",\"sql_hex_for_binary\":\"something\",\"sql_utc_time\":\"something\",\"texytext_structure_or_data\":\"structure_and_data\",\"texytext_null\":\"NULL\",\"xml_structure_or_data\":\"data\",\"xml_export_events\":\"something\",\"xml_export_functions\":\"something\",\"xml_export_procedures\":\"something\",\"xml_export_tables\":\"something\",\"xml_export_triggers\":\"something\",\"xml_export_views\":\"something\",\"xml_export_contents\":\"something\",\"yaml_structure_or_data\":\"data\",\"\":null,\"lock_tables\":null,\"as_separate_files\":null,\"csv_removeCRLF\":null,\"csv_columns\":null,\"excel_removeCRLF\":null,\"json_pretty_print\":null,\"htmlword_columns\":null,\"ods_columns\":null,\"sql_dates\":null,\"sql_relation\":null,\"sql_mime\":null,\"sql_disable_fk\":null,\"sql_views_as_tables\":null,\"sql_metadata\":null,\"sql_create_database\":null,\"sql_drop_table\":null,\"sql_if_not_exists\":null,\"sql_truncate\":null,\"sql_delayed\":null,\"sql_ignore\":null,\"texytext_columns\":null}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sqlquery` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT '0',
  `x` float UNSIGNED NOT NULL DEFAULT '0',
  `y` float UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

--
-- Dumping data for table `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'bus', 'route_detail', '{\"sorted_col\":\"`route_detail`.`departure_station` ASC\"}', '2018-06-07 13:43:23');

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin,
  `data_sql` longtext COLLATE utf8_bin,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `config_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2018-06-10 08:00:30', '{\"Console\\/Mode\":\"collapse\",\"NavigationWidth\":241}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `sltb_booking`
--
CREATE DATABASE IF NOT EXISTS `sltb_booking` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sltb_booking`;

-- --------------------------------------------------------

--
-- Table structure for table `assign_bus`
--

CREATE TABLE `assign_bus` (
  `assign_bus_no` int(5) NOT NULL COMMENT 'this is primary key',
  `userName` varchar(10) NOT NULL COMMENT 'System User Name',
  `busNo` varchar(10) NOT NULL COMMENT 'Bus Route Number',
  `date` date NOT NULL COMMENT 'Route assing Date',
  `sql` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='This Transaction Table is store who is assing Route for Bus';

--
-- Dumping data for table `assign_bus`
--

INSERT INTO `assign_bus` (`assign_bus_no`, `userName`, `busNo`, `date`, `sql`) VALUES
(9, 'Nevil', 'NB6079', '2014-05-22', 'I'),
(10, 'Nevil', 'ND2345', '2014-05-22', 'I'),
(11, 'Nevil', 'JD4530', '2014-05-22', 'I'),
(12, 'Nevil', 'NA6890', '2014-05-22', 'I'),
(13, 'Nevil', 'NB1290', '2014-05-22', 'I'),
(14, 'Nevil', 'NB1290', '2014-05-22', 'U'),
(15, 'Nevil', 'NB1290', '2014-05-22', 'D'),
(16, 'Nevil', 'qwer', '2014-09-24', 'I'),
(17, 'Nevil', 'qwe', '2014-09-24', 'U'),
(18, 'Nevil', 'qwe', '2014-09-24', 'U'),
(19, 'Nevil', 'qwe', '2014-09-24', 'U'),
(20, 'Nevil', 'qw', '2014-09-24', 'U'),
(21, 'Nevil', 'qw', '2014-09-24', 'U'),
(22, 'Nevil', 'qwe', '2014-09-24', 'U'),
(23, 'Nevil', 'qwe', '2014-10-01', 'D'),
(24, 'Nevil', 'JD4530', '2014-10-01', 'U');

-- --------------------------------------------------------

--
-- Table structure for table `assign_coductor`
--

CREATE TABLE `assign_coductor` (
  `assingConductorNo` int(11) NOT NULL COMMENT 'this is primary key',
  `userName` varchar(10) NOT NULL COMMENT 'System User Name',
  `conductorNo` varchar(10) NOT NULL COMMENT 'Conductor Number',
  `date` date NOT NULL COMMENT 'Conductor assing Date'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='This Transaction Table is store who is assing conductor for Bus';

--
-- Dumping data for table `assign_coductor`
--

INSERT INTO `assign_coductor` (`assingConductorNo`, `userName`, `conductorNo`, `date`) VALUES
(3, 'Nevil', 'CB0023412', '2014-05-22'),
(4, 'Nevil', 'CB0023423', '2014-05-22'),
(5, 'Nevil', 'CB0023456', '2014-05-22');

-- --------------------------------------------------------

--
-- Table structure for table `available_seat`
--

CREATE TABLE `available_seat` (
  `seatNo` int(2) NOT NULL COMMENT 'Bus Seat Number',
  `busNo` varchar(10) NOT NULL COMMENT 'SLTB Bus Number',
  `journeyNo` varchar(10) NOT NULL,
  `status` varchar(2) NOT NULL COMMENT 'Seat Status',
  `date` date NOT NULL COMMENT 'Status Date',
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='This Transaction Table is current Stauts a Bus Seat';

--
-- Dumping data for table `available_seat`
--

INSERT INTO `available_seat` (`seatNo`, `busNo`, `journeyNo`, `status`, `date`, `time`) VALUES
(1, 'NA6890', 'BCA057002', 'B', '2014-10-01', '16:12:46'),
(2, 'NA6890', 'BCA057002', 'B', '2014-10-01', '16:12:46'),
(3, 'NA6890', 'BCA057002', 'B', '2014-10-01', '16:12:46'),
(3, 'ND2345', 'BAC057001', 'B', '2014-10-11', '21:20:57'),
(4, 'ND2345', 'BAC057001', 'B', '2014-10-11', '14:35:25'),
(5, 'ND2345', 'BAC057001', 'B', '2014-10-11', '14:35:25'),
(7, 'ND2345', 'BAC057001', 'B', '2014-10-11', '09:25:32'),
(19, 'NA6890', 'BCA057002', 'P', '2018-05-20', '14:26:26'),
(20, 'NA6890', 'BCA057002', 'P', '2018-05-20', '15:21:48'),
(23, 'NA6890', 'BCA057002', 'P', '2018-05-20', '14:26:26'),
(23, 'NB6079', 'ACJ057001', 'P', '2018-05-20', '15:21:11'),
(24, 'NB6079', 'ACJ057001', 'P', '2018-05-20', '15:21:11'),
(28, 'NA6890', 'BCA057002', 'P', '2018-05-20', '15:21:48'),
(29, 'NA6890', 'BCA057002', 'P', '2018-05-20', '14:26:26'),
(29, 'NB6079', 'ACJ057001', 'P', '2018-05-20', '15:21:11'),
(30, 'NB6079', 'ACJ057001', 'P', '2018-05-20', '15:21:11'),
(33, 'NA6890', 'BCA057002', 'P', '2018-05-20', '15:21:48'),
(36, 'JD4530', 'ACA015001', 'B', '2014-10-01', '16:14:14'),
(36, 'JD4530', 'ACA015001', 'B', '2014-10-11', '09:28:08'),
(36, 'ND2345', 'BAC057001', 'B', '2014-10-07', '12:32:41'),
(36, 'ND2345', 'BAC057001', 'B', '2014-10-11', '09:27:11'),
(37, 'JD4530', 'ACA015001', 'B', '2014-10-01', '16:14:14'),
(37, 'JD4530', 'ACA015001', 'B', '2014-10-11', '09:28:13'),
(38, 'NA6890', 'BCA057002', 'P', '2018-05-20', '15:21:48'),
(38, 'NA6890', 'BCA057002', 'P', '2018-05-27', '14:50:08'),
(38, 'ND2345', 'BAC057001', 'B', '2014-10-11', '21:17:50'),
(39, 'ND2345', 'BAC057001', 'B', '2014-10-11', '21:17:50'),
(40, 'ND2345', 'BAC057001', 'B', '2014-10-11', '21:17:50'),
(41, 'NA6890', 'BCA057002', 'P', '2018-05-20', '15:21:48'),
(45, 'NA6890', 'BCA057002', 'B', '2014-10-01', '16:11:47'),
(46, 'NA6890', 'BCA057002', 'B', '2014-10-01', '16:11:47'),
(49, 'NA6890', 'BCA057002', 'B', '2014-10-07', '16:19:04');

-- --------------------------------------------------------

--
-- Table structure for table `booker`
--

CREATE TABLE `booker` (
  `bookerNICNo` varchar(10) NOT NULL COMMENT 'Bus Booker NIC Number',
  `bookerName` varchar(20) NOT NULL COMMENT 'Booker Short Name',
  `bookerMNo` varchar(10) NOT NULL COMMENT 'Booker Mobile Number'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='This Master Table is store Bus Booker Data';

--
-- Dumping data for table `booker`
--

INSERT INTO `booker` (`bookerNICNo`, `bookerName`, `bookerMNo`) VALUES
('435672894v', 'kalam', '0112345678'),
('782423567v', 'kamal', '0784325678'),
('881239472v', 'saman', '0752234567'),
('881691035v', 'nevil', '0717226079'),
('881691036v', 'Ranathunge', '1234567890'),
('8923435638', 'sunil', '0213456789'),
('901234353v', 'saman', '0372345678'),
('903456721v', 'sanath', '0717226079'),
('987654325v', 'wimal', '0717226079');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bookingID` varchar(25) NOT NULL COMMENT 'Bus Ticket Number',
  `bookerNICNo` varchar(10) NOT NULL COMMENT 'Bus Booker NIC Number',
  `busNo` varchar(10) NOT NULL COMMENT 'Bus Number',
  `journeyNo` varchar(10) NOT NULL,
  `no_of_seat` int(2) NOT NULL,
  `entryPointNo` int(2) NOT NULL,
  `ammount` float NOT NULL COMMENT 'Total Amount of Bus ticket',
  `date` date NOT NULL COMMENT 'Ticket receive Date',
  `payment_status` varchar(2) NOT NULL DEFAULT 'P',
  `s_bookin_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='This Transaction Table is store Receive booking invoice';

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bookingID`, `bookerNICNo`, `busNo`, `journeyNo`, `no_of_seat`, `entryPointNo`, `ammount`, `date`, `payment_status`, `s_bookin_time`) VALUES
('JD4530ACA01500114100100', '881691035v', 'JD4530', 'ACA015001', 2, 1, 1800, '2014-10-01', 'Ok', '16:25:14'),
('JD4530ACA01500114101100', '881691035v', 'JD4530', 'ACA015001', 1, 8, 900, '2014-10-11', 'Ok', '09:39:13'),
('JD4530ACA01500114101101', '881691036v', 'JD4530', 'ACA015001', 1, 7, 900, '2014-10-11', 'Ok', '09:39:08'),
('NA6890BCA05700214100100', '881691035v', 'NA6890', 'BCA057002', 2, 15, 1500, '2014-10-01', 'Ok', '16:22:47'),
('NA6890BCA05700214100101', '881691036v', 'NA6890', 'BCA057002', 3, 14, 2250, '2014-10-01', 'Ok', '16:23:46'),
('NA6890BCA05700214100700', '881691035v', 'NA6890', 'BCA057002', 1, 15, 750, '2014-10-07', 'Ok', '16:30:04'),
('ND2345BAC05700114100701', '881691036v', 'ND2345', 'BAC057001', 1, 11, 750, '2014-10-07', 'Ok', '12:43:41'),
('ND2345BAC05700114101100', '881691036v', 'ND2345', 'BAC057001', 3, 1, 2250, '2014-10-11', 'Ok', '21:28:50'),
('ND2345BAC05700114101101', '881691035v', 'ND2345', 'BAC057001', 1, 9, 750, '2014-10-11', 'Ok', '21:31:57'),
('ND2345BAC05700114101102', '881691035v', 'ND2345', 'BAC057001', 1, 1, 750, '2014-10-11', 'Ok', '09:36:32'),
('ND2345BAC05700114101103', '881691036v', 'ND2345', 'BAC057001', 1, 1, 750, '2014-10-11', 'Ok', '09:38:11'),
('ND2345BAC05700114101104', '881691036v', 'ND2345', 'BAC057001', 2, 1, 1500, '2014-10-11', 'Ok', '14:46:25');

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE `bus` (
  `busNo` varchar(10) NOT NULL COMMENT 'Bus Number',
  `busModel` varchar(15) NOT NULL COMMENT 'Bus Model',
  `numberOfSeat` int(2) NOT NULL COMMENT 'Number Of Seat'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='This Master Table is store Bus Data';

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`busNo`, `busModel`, `numberOfSeat`) VALUES
('JD4530', 'TATA', 40),
('NA6890', 'TATA', 49),
('NB6079', 'TATA', 49),
('ND2345', 'TATA', 40);

-- --------------------------------------------------------

--
-- Table structure for table `conductor`
--

CREATE TABLE `conductor` (
  `conductorNo` varchar(10) NOT NULL COMMENT 'Conductor Number',
  `conductorName` varchar(20) NOT NULL COMMENT 'Conductor Name',
  `conductorMNo` varchar(10) NOT NULL COMMENT 'Conductor Mobile Number',
  `busNo` varchar(10) DEFAULT NULL COMMENT 'Assing Bus No'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='This Master Table is store Conductor Data';

--
-- Dumping data for table `conductor`
--

INSERT INTO `conductor` (`conductorNo`, `conductorName`, `conductorMNo`, `busNo`) VALUES
('CB0023412', 'Jagath', '0712776979', 'JD4530'),
('CB0023423', 'Sumith', '0712776979', 'NA6890'),
('CB0023456', 'Anil', '0712776979', 'ND2345');

-- --------------------------------------------------------

--
-- Table structure for table `entrypoint_for_journey`
--

CREATE TABLE `entrypoint_for_journey` (
  `entryPoint_for_journeyNo` int(3) NOT NULL COMMENT 'this is primary key',
  `journeyNo` varchar(10) NOT NULL COMMENT 'Bus Route Number',
  `entryPointNo` int(2) NOT NULL COMMENT 'Bus Entry Point Number'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='This Transaction Table is assing Entry Point for Bus Route';

--
-- Dumping data for table `entrypoint_for_journey`
--

INSERT INTO `entrypoint_for_journey` (`entryPoint_for_journeyNo`, `journeyNo`, `entryPointNo`) VALUES
(40, 'AAC057001', 15),
(41, 'AAC057001', 14),
(42, 'AAC057001', 12),
(43, 'AAC057001', 13),
(44, 'ACA015001', 1),
(45, 'ACA015001', 7),
(46, 'ACA015001', 8),
(47, 'ACA015001', 11),
(48, 'ACA057001', 1),
(49, 'ACA057001', 7),
(50, 'ACA057001', 8),
(51, 'ACA057002', 1),
(52, 'ACA057002', 11),
(53, 'ACA057003', 1),
(54, 'ACA057003', 8),
(55, 'ACA057003', 11),
(56, 'ACJ057001', 15),
(57, 'ACJ057001', 1),
(58, 'ACJ057001', 11),
(59, 'BAC057001', 1),
(60, 'BAC057001', 11),
(61, 'BAC057001', 9),
(62, 'BCA015001', 15),
(63, 'BCA015001', 14),
(64, 'BCA015001', 17),
(65, 'BCA015001', 11),
(66, 'BCA057001', 15),
(67, 'BCA057001', 14),
(68, 'BCA057001', 12),
(69, 'BCA057001', 13),
(70, 'BCA057002', 15),
(71, 'BCA057002', 14),
(72, 'BCA057002', 12),
(73, 'BCA057003', 15),
(74, 'BCA057003', 14),
(75, 'BCA057003', 12),
(76, 'BCA057003', 13),
(77, 'BCJ057001', 15),
(78, 'BCJ057001', 19);

-- --------------------------------------------------------

--
-- Table structure for table `entry_point`
--

CREATE TABLE `entry_point` (
  `entryPointNo` int(2) NOT NULL COMMENT 'Bus Entry Point No',
  `entryPoint` varchar(15) NOT NULL COMMENT 'Bus Entry Point Name'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='This Master Table is store Entry Point for bus Route';

--
-- Dumping data for table `entry_point`
--

INSERT INTO `entry_point` (`entryPointNo`, `entryPoint`) VALUES
(15, 'Anuradhapu'),
(1, 'Colombo'),
(17, 'Dabulla'),
(19, 'Jaffna'),
(16, 'Kakirawa'),
(7, 'Kalaniya'),
(8, 'Kiribathgoda'),
(11, 'Kurunagala'),
(18, 'Maradankadawala'),
(14, 'New Town'),
(9, 'Nittabuwa'),
(6, 'Paligoda'),
(12, 'Talawa'),
(13, 'Thabuththagama'),
(10, 'Warakapola');

-- --------------------------------------------------------

--
-- Table structure for table `journey`
--

CREATE TABLE `journey` (
  `journeyNo` varchar(10) NOT NULL,
  `routeNo` varchar(5) NOT NULL COMMENT 'Bus Route Number',
  `journeyFrom` varchar(10) NOT NULL COMMENT 'Bus Route Start Point',
  `journeyTo` varchar(10) NOT NULL COMMENT 'Bus Route End Point',
  `departureTime` time NOT NULL COMMENT 'Bus Departure Time',
  `arrivalTime` time NOT NULL COMMENT 'Bus Arrival Time',
  `price` float NOT NULL COMMENT 'Bus Ticket Price'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='This Master Table is store Bus Route Data';

--
-- Dumping data for table `journey`
--

INSERT INTO `journey` (`journeyNo`, `routeNo`, `journeyFrom`, `journeyTo`, `departureTime`, `arrivalTime`, `price`) VALUES
('AAC057001', '57', 'Anuradhapu', 'Colombo', '20:15:00', '01:00:00', 750),
('ACA015001', '15', 'Colombo', 'Anuradhapu', '14:10:00', '20:15:00', 900),
('ACA057001', '57', 'Colombo', 'Anuradhapu', '06:15:00', '12:45:00', 750),
('ACA057002', '57', 'Colombo', 'Anuradhapu', '02:05:00', '07:00:00', 750),
('ACA057003', '57', 'Colombo', 'Anuradhapu', '18:05:00', '23:30:00', 750),
('ACJ057001', '57', 'Colombo', 'Jaffna', '20:00:00', '03:45:00', 1300),
('BAC057001', '57', 'Colombo', 'Anuradhapu', '23:55:00', '05:20:00', 750),
('BCA015001', '15', 'Anuradhapu', 'Colombo', '01:00:00', '06:00:00', 900),
('BCA057001', '57', 'Anuradhapu', 'Colombo', '14:15:00', '20:15:00', 750),
('BCA057002', '57', 'Anuradhapu', 'Colombo', '20:20:00', '24:00:00', 750),
('BCA057003', '57', 'Anuradhapu', 'Colombo', '22:15:00', '04:15:00', 750),
('BCJ057001', '57', 'Jaffna', 'Colombo', '13:15:00', '20:20:00', 1300);

-- --------------------------------------------------------

--
-- Table structure for table `journey_for_bus`
--

CREATE TABLE `journey_for_bus` (
  `journey_for_bus_No` int(3) NOT NULL,
  `busNo` varchar(10) NOT NULL,
  `journeyNo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `journey_for_bus`
--

INSERT INTO `journey_for_bus` (`journey_for_bus_No`, `busNo`, `journeyNo`) VALUES
(30, 'NA6890', 'ACA057002'),
(31, 'NA6890', 'BCA057002'),
(32, 'JD4530', 'ACA015001'),
(33, 'JD4530', 'BCA015001'),
(34, 'NB6079', 'BCJ057001'),
(35, 'NB6079', 'ACJ057001'),
(36, 'ND2345', 'AAC057001'),
(37, 'ND2345', 'BAC057001');

-- --------------------------------------------------------

--
-- Table structure for table `manual_booking`
--

CREATE TABLE `manual_booking` (
  `manualBookingNo` int(11) NOT NULL COMMENT 'this is primary key',
  `userName` varchar(10) NOT NULL COMMENT 'System User Name',
  `bookingID` varchar(20) NOT NULL,
  `date` date NOT NULL COMMENT 'ManualBooking Date'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='This Transaction Table is store who is manual booking Booker';

--
-- Dumping data for table `manual_booking`
--

INSERT INTO `manual_booking` (`manualBookingNo`, `userName`, `bookingID`, `date`) VALUES
(16, 'Kasun', 'NA6890CA5714052203', '2014-05-22'),
(17, 'Kasun', 'ND2345BAC05700114100', '2014-10-07');

-- --------------------------------------------------------

--
-- Table structure for table `receive_ticke`
--

CREATE TABLE `receive_ticke` (
  `ticketNo` varchar(25) NOT NULL,
  `passengerName` varchar(25) NOT NULL COMMENT 'Passenger Name',
  `seatNo` int(2) NOT NULL COMMENT 'Bus Seat Number',
  `gender` varchar(1) NOT NULL COMMENT 'Passenger Gender',
  `bookingID` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='This Transaction Table is store booking data';

--
-- Dumping data for table `receive_ticke`
--

INSERT INTO `receive_ticke` (`ticketNo`, `passengerName`, `seatNo`, `gender`, `bookingID`) VALUES
('JD4530ACA01500114100136', 'Usre1', 36, 'M', 'JD4530ACA01500114100100'),
('JD4530ACA01500114100137', 'User2', 37, 'M', 'JD4530ACA01500114100100'),
('JD4530ACA01500114101136', 'User1', 36, 'M', 'JD4530ACA01500114101101'),
('JD4530ACA01500114101137', 'Usre1', 37, 'M', 'JD4530ACA01500114101100'),
('NA6890BCA0570021410011', 'user2', 1, 'F', 'NA6890BCA05700214100101'),
('NA6890BCA0570021410012', 'nevil', 2, 'M', 'NA6890BCA05700214100101'),
('NA6890BCA0570021410013', 'user3', 3, 'M', 'NA6890BCA05700214100101'),
('NA6890BCA05700214100145', 'nevil', 45, 'M', 'NA6890BCA05700214100100'),
('NA6890BCA05700214100146', 'user2', 46, 'M', 'NA6890BCA05700214100100'),
('NA6890BCA05700214100749', 'Usre1', 49, 'M', 'NA6890BCA05700214100700'),
('ND2345BAC05700114100736', 'Usre1', 36, 'M', 'ND2345BAC05700114100701'),
('ND2345BAC0570011410113', 'Usre1', 3, 'M', 'ND2345BAC05700114101101'),
('ND2345BAC05700114101136', 'User1', 36, 'M', 'ND2345BAC05700114101103'),
('ND2345BAC05700114101138', 'User3', 38, 'M', 'ND2345BAC05700114101100'),
('ND2345BAC05700114101139', 'User2', 39, 'M', 'ND2345BAC05700114101100'),
('ND2345BAC0570011410114', 'User1', 4, 'M', 'ND2345BAC05700114101104'),
('ND2345BAC05700114101140', 'User1', 40, 'M', 'ND2345BAC05700114101100'),
('ND2345BAC0570011410115', 'User2', 5, 'F', 'ND2345BAC05700114101104'),
('ND2345BAC0570011410117', 'Usre1', 7, 'M', 'ND2345BAC05700114101102');

-- --------------------------------------------------------

--
-- Table structure for table `seat`
--

CREATE TABLE `seat` (
  `seatNo` int(2) NOT NULL COMMENT 'Bus Seat Number'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='This Master Table is store Bus Seat Number';

--
-- Dumping data for table `seat`
--

INSERT INTO `seat` (`seatNo`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(11),
(12),
(13),
(14),
(15),
(16),
(17),
(18),
(19),
(20),
(21),
(22),
(23),
(24),
(25),
(26),
(27),
(28),
(29),
(30),
(31),
(32),
(33),
(34),
(35),
(36),
(37),
(38),
(39),
(40),
(41),
(42),
(43),
(44),
(45),
(46),
(47),
(48),
(49);

-- --------------------------------------------------------

--
-- Table structure for table `system_user`
--

CREATE TABLE `system_user` (
  `userName` varchar(10) NOT NULL COMMENT 'User Name for login to System',
  `empolyeeNo` varchar(8) NOT NULL COMMENT 'Empoyee Number of System User',
  `empolyeeName` varchar(20) NOT NULL COMMENT 'oyee Name of System User',
  `empolyeeMNo` varchar(10) NOT NULL COMMENT 'oyee Mobile Number of System User',
  `password` varchar(250) DEFAULT NULL COMMENT 'Password for login to system',
  `privilege` varchar(8) NOT NULL DEFAULT 'Not User'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='This Master Table is store System User Data and Login Data';

--
-- Dumping data for table `system_user`
--

INSERT INTO `system_user` (`userName`, `empolyeeNo`, `empolyeeName`, `empolyeeMNo`, `password`, `privilege`) VALUES
('Admin', '001', 'Ranathinge', '0717226079', '2377cfe2fbef92859e299f9272f96e82', 'Admin'),
('Kasun', '003', 'Kasun ', '0717226079', '3fdcf478e92daaf3b2616c58bf1c848a', 'Booker'),
('Nevil', '002', 'Nevil', '0717226079', 'f36792e15aa77db3929334ba62d0974b', 'Operator'),
('Sumith', '004', 'Sumith', '1234567890', '67be81b88c81b956642548553defcff8', 'Conduct');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assign_bus`
--
ALTER TABLE `assign_bus`
  ADD PRIMARY KEY (`assign_bus_no`),
  ADD KEY `userName` (`userName`,`busNo`),
  ADD KEY `routeNo` (`busNo`);

--
-- Indexes for table `assign_coductor`
--
ALTER TABLE `assign_coductor`
  ADD PRIMARY KEY (`assingConductorNo`),
  ADD KEY `userName` (`userName`,`conductorNo`),
  ADD KEY `userName_2` (`userName`),
  ADD KEY `conductorNo` (`conductorNo`);

--
-- Indexes for table `available_seat`
--
ALTER TABLE `available_seat`
  ADD PRIMARY KEY (`seatNo`,`busNo`,`journeyNo`,`date`),
  ADD KEY `seatNo` (`seatNo`,`busNo`),
  ADD KEY `busNo` (`busNo`);

--
-- Indexes for table `booker`
--
ALTER TABLE `booker`
  ADD PRIMARY KEY (`bookerNICNo`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bookingID`),
  ADD KEY `bookerNICNo` (`bookerNICNo`,`busNo`),
  ADD KEY `bookerNICNo_2` (`bookerNICNo`),
  ADD KEY `busNo` (`busNo`);

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`busNo`);

--
-- Indexes for table `conductor`
--
ALTER TABLE `conductor`
  ADD PRIMARY KEY (`conductorNo`),
  ADD KEY `busNo` (`busNo`);

--
-- Indexes for table `entrypoint_for_journey`
--
ALTER TABLE `entrypoint_for_journey`
  ADD PRIMARY KEY (`entryPoint_for_journeyNo`),
  ADD KEY `entryPointNo` (`entryPointNo`),
  ADD KEY `journeyNo` (`journeyNo`);

--
-- Indexes for table `entry_point`
--
ALTER TABLE `entry_point`
  ADD PRIMARY KEY (`entryPointNo`),
  ADD KEY `entryPoint` (`entryPoint`);

--
-- Indexes for table `journey`
--
ALTER TABLE `journey`
  ADD PRIMARY KEY (`journeyNo`);

--
-- Indexes for table `journey_for_bus`
--
ALTER TABLE `journey_for_bus`
  ADD PRIMARY KEY (`journey_for_bus_No`),
  ADD KEY `busNo` (`busNo`),
  ADD KEY `journeyNo` (`journeyNo`);

--
-- Indexes for table `manual_booking`
--
ALTER TABLE `manual_booking`
  ADD PRIMARY KEY (`manualBookingNo`),
  ADD KEY `userName` (`userName`,`bookingID`),
  ADD KEY `bookerNICNo` (`bookingID`);

--
-- Indexes for table `receive_ticke`
--
ALTER TABLE `receive_ticke`
  ADD PRIMARY KEY (`ticketNo`),
  ADD KEY `bookerNICNo` (`passengerName`),
  ADD KEY `seatNo` (`seatNo`),
  ADD KEY `ticketNo` (`ticketNo`);

--
-- Indexes for table `seat`
--
ALTER TABLE `seat`
  ADD PRIMARY KEY (`seatNo`);

--
-- Indexes for table `system_user`
--
ALTER TABLE `system_user`
  ADD PRIMARY KEY (`userName`),
  ADD KEY `empoyeeName` (`empolyeeName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assign_bus`
--
ALTER TABLE `assign_bus`
  MODIFY `assign_bus_no` int(5) NOT NULL AUTO_INCREMENT COMMENT 'this is primary key', AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `assign_coductor`
--
ALTER TABLE `assign_coductor`
  MODIFY `assingConductorNo` int(11) NOT NULL AUTO_INCREMENT COMMENT 'this is primary key', AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `entrypoint_for_journey`
--
ALTER TABLE `entrypoint_for_journey`
  MODIFY `entryPoint_for_journeyNo` int(3) NOT NULL AUTO_INCREMENT COMMENT 'this is primary key', AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `entry_point`
--
ALTER TABLE `entry_point`
  MODIFY `entryPointNo` int(2) NOT NULL AUTO_INCREMENT COMMENT 'Bus Entry Point No', AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `journey_for_bus`
--
ALTER TABLE `journey_for_bus`
  MODIFY `journey_for_bus_No` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `manual_booking`
--
ALTER TABLE `manual_booking`
  MODIFY `manualBookingNo` int(11) NOT NULL AUTO_INCREMENT COMMENT 'this is primary key', AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `seat`
--
ALTER TABLE `seat`
  MODIFY `seatNo` int(2) NOT NULL AUTO_INCREMENT COMMENT 'Bus Seat Number', AUTO_INCREMENT=50;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assign_bus`
--
ALTER TABLE `assign_bus`
  ADD CONSTRAINT `assign_bus_ibfk_1` FOREIGN KEY (`userName`) REFERENCES `system_user` (`userName`);

--
-- Constraints for table `assign_coductor`
--
ALTER TABLE `assign_coductor`
  ADD CONSTRAINT `assign_coductor_ibfk_1` FOREIGN KEY (`userName`) REFERENCES `system_user` (`userName`),
  ADD CONSTRAINT `assign_coductor_ibfk_2` FOREIGN KEY (`conductorNo`) REFERENCES `conductor` (`conductorNo`);

--
-- Constraints for table `available_seat`
--
ALTER TABLE `available_seat`
  ADD CONSTRAINT `available_seat_ibfk_1` FOREIGN KEY (`seatNo`) REFERENCES `seat` (`seatNo`),
  ADD CONSTRAINT `available_seat_ibfk_2` FOREIGN KEY (`busNo`) REFERENCES `bus` (`busNo`);

--
-- Constraints for table `conductor`
--
ALTER TABLE `conductor`
  ADD CONSTRAINT `conductor_ibfk_1` FOREIGN KEY (`busNo`) REFERENCES `bus` (`busNo`);

--
-- Constraints for table `entrypoint_for_journey`
--
ALTER TABLE `entrypoint_for_journey`
  ADD CONSTRAINT `entrypoint_for_journey_ibfk_2` FOREIGN KEY (`entryPointNo`) REFERENCES `entry_point` (`entryPointNo`),
  ADD CONSTRAINT `entrypoint_for_journey_ibfk_3` FOREIGN KEY (`journeyNo`) REFERENCES `journey` (`journeyNo`);

--
-- Constraints for table `journey_for_bus`
--
ALTER TABLE `journey_for_bus`
  ADD CONSTRAINT `journey_for_bus_ibfk_1` FOREIGN KEY (`busNo`) REFERENCES `bus` (`busNo`),
  ADD CONSTRAINT `journey_for_bus_ibfk_2` FOREIGN KEY (`journeyNo`) REFERENCES `journey` (`journeyNo`);

--
-- Constraints for table `manual_booking`
--
ALTER TABLE `manual_booking`
  ADD CONSTRAINT `manual_booking_ibfk_1` FOREIGN KEY (`userName`) REFERENCES `system_user` (`userName`);

--
-- Constraints for table `receive_ticke`
--
ALTER TABLE `receive_ticke`
  ADD CONSTRAINT `receive_ticke_ibfk_2` FOREIGN KEY (`seatNo`) REFERENCES `seat` (`seatNo`);
--
-- Database: `student`
--
CREATE DATABASE IF NOT EXISTS `student` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `student`;

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`id`, `fname`, `lname`) VALUES
(1, 'pawan', 'pattu'),
(2, 'nischal', 'shrestha'),
(3, 'uttam', 'mahat'),
(4, 'chhedub', 'syangtan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
--
-- Database: `testdb`
--
CREATE DATABASE IF NOT EXISTS `testdb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `testdb`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(8) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'uttammahat', 'uttammahat@gmail.com', '36b8d1ef000113045261277d75b72897');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `photo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `photo`) VALUES
(11, '1522734415_7224.jpg'),
(12, '1522734440_3493.jpg'),
(13, '1522734453_3778.jpg'),
(14, '1522734470_1692.jpg'),
(15, '1522734476_6487.jpg'),
(16, '1522734483_5844.jpg'),
(18, '1522736950_7492.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(8) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'uttam mahat', 'uttam@gmail.com', '36b8d1ef000113045261277d75b72897'),
(3, 'pattuu', 'pattuu@gmail.com', 'a096b8ea78b56a8f89d919aae3f2d337'),
(9, 'madan', 'madan@gmail.com', '8b3326a87926029c5996a66f0a01b18f'),
(10, 'poi', 'poiu@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
