USE `testdb`;
DROP TABLE Customer;


USE `testdb`;
CREATE TABLE `Customer` (
                            customerId        INT             NOT NULL      AUTO_INCREMENT,
                            customerName      VARCHAR(30)     NOT NULL,
                            customerEmail     VARCHAR(30)     NOT NULL,
                            customerPhone     VARCHAR(12)     NOT NULL,
                            PRIMARY KEY(`customerId`)
);

