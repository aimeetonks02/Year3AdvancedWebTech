CREATE TABLE `Orders` (
  `orderid` int(11) NOT NULL auto_increment PRIMARY KEY,
  `emailid` varchar(40) NOT NULL FOREIGN KEY,
  `customername` VARCHAR(40) NOT NULL,
  `phonenumber` NUMBER(11) NOT NULL,
  `itemname` varchar(40) NOT NULL,
  `itemprice` NUMBER NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=latin1;