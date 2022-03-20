SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE items (
  id int(11) NOT NULL,
  todostring varchar(75) NOT NULL,
  date date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


ALTER TABLE items
  ADD PRIMARY KEY (id);


ALTER TABLE items
  MODIFY id int(11) NOT NULL AUTO_INCREMENT;
