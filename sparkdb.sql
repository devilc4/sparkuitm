create database sparkdb;

CREATE TABLE PERMISSION
(
	PERMISSION_ID INT(10) NOT NULL PRIMARY KEY,
    PERMISSION_DETAILS VARCHAR(50) NOT NULL
)

INSERT INTO PERMISSION (PERMISSION_ID, PERMISSION_DETAILS) VALUES
(1,'ACTIVE'),
(2,'INACTIVE');


CREATE TABLE EMPLOYEE
(
	EMPLOYEE_ID INT(10) NOT NULL PRIMARY KEY,
    EMPLOYEE_ICNO VARCHAR(12) NOT NULL,
    EMPLOYEE_NAME VARCHAR(100) NOT NULL,
    PERMISSION_ID INT(10) NOT NULL,
    FOREIGN KEY (PERMISSION_ID) REFERENCES PERMISSION(PERMISSION_ID)
)
--
-- Dumping data for table `employee`
--
INSERT INTO EMPLOYEE (EMPLOYEE_ID, EMPLOYEE_ICNO,EMPLOYEE_NAME,PERMISSION_ID) VALUES
(2020877832, '020706101056', 'AISYAH RAHMAN',1),
(2020809408, '020706100882', 'AIN NABIHAH',1),
(2020457314, '021205143452', 'SITI AISYAH',1),
(2020821176, '020801048776', 'NOR TASNIM AMANI',1),
(2020883632, '020314109865', 'MUHAMMAD SYAFIQ',1);

CREATE TABLE PAYMENT
(	
	PAYMENT_ID INT(10) NOT NULL PRIMARY KEY,
    PAYMENT_PRICE INT(10) NOT NULL
)
--
-- Dumping data for table `payment`
--
INSERT INTO PAYMENT (PAYMENT_ID, PAYMENT_PRICE) VALUES
(1001, 1),
(1002, 2),
(1003, 3);

CREATE TABLE PARCEL_STATUS
(
	STATUS_ID INT(10) NOT NULL PRIMARY KEY,
    STATUS_NAME VARCHAR(50) NOT NULL
)
--
-- Dumping data for table `parcel_status`
--
INSERT INTO PARCEL_STATUS (STATUS_ID, STATUS_NAME) VALUES
(2001, 'ARRIVED'),
(2002, 'PENDING'),
(2003, 'COLLECTED');

CREATE TABLE COURIER
(
	COURIER_ID INT(10) NOT NULL PRIMARY KEY,
    COURIER_NAME VARCHAR(50) NOT NULL
)
--
-- Dumping data for table `courier`
--
INSERT INTO COURIER (COURIER_ID, COURIER_NAME) VALUES
(3001, 'POS LAJU'),
(3002, 'J&T EXPRESS'),
(3003, 'SHOPEE EXPRESS'),
(3004, 'PGEON'),
(3005, 'GDEX'),
(3006, 'DHL'),
(3007, 'PARCEL HUB'),
(3008, 'NINJA VAN'),
(3009, 'CITY-LINK EXPRESS'),
(3010, 'OTHERS');

CREATE TABLE RECEIVER_CATEGORY
(
	RECEIVER_ID INT(10) NOT NULL PRIMARY KEY,
    RECEIVER_DETAIL VARCHAR(10) NOT NULL
)
--
-- Dumping data for table 'receiver_category`
--
INSERT INTO RECEIVER_CATEGORY (RECEIVER_ID, RECEIVER_DETAIL) VALUES
(4001, 'STUDENT'),
(4002, 'STAFF');

CREATE TABLE PARCEL
(
	TRACKING_NO VARCHAR(50) NOT NULL PRIMARY KEY,
    RECEIVER_NAME VARCHAR(100) NOT NULL,
    RECEIVER_PHONO VARCHAR(20)NOT NULL,
    ARRIVED_DATE DATE NOT NULL,
    ARRIVED_TIME TIME NOT NULL,
	PIC_ARRIVED VARCHAR(100) NOT NULL,
    COLLECT_DATE DATE NULL,
    COLLECT_TIME TIME NULL,
    PIC_COLLECT VARCHAR(100) NULL,
    STATUS_ID INT(10) NOT NULL,
    RECEIVER_ID INT(10) NOT NULL,
    COURIER_ID INT(10) NOT NULL,
    EMPLOYEE_ID INT(10) NOT NULL,
    PAYMENT_ID INT(10) NOT NULL,
    FOREIGN KEY (STATUS_ID) REFERENCES PARCEL_STATUS(STATUS_ID),
    FOREIGN KEY (RECEIVER_ID) REFERENCES RECEIVER_CATEGORY(RECEIVER_ID),
    FOREIGN KEY (COURIER_ID) REFERENCES COURIER(COURIER_ID),
    FOREIGN KEY (EMPLOYEE_ID) REFERENCES EMPLOYEE(EMPLOYEE_ID),
    FOREIGN KEY (PAYMENT_ID) REFERENCES PAYMENT(PAYMENT_ID)
)
/*INSERT INTO PARCEL (TRACKING_NO, RECEIVER_NAME, RECEIVER_PHONO, ARRIVED_DATE, ARRIVED_TIME, PIC_ARRIVED, COLLECT_DATE, COLLECT_TIME,PIC_COLLECT,
 STATUS_ID, RECEIVER_ID, COURIER_ID, EMPLOYEE_ID, PAYMENT_ID) VALUES
('FE010568975MY', 'NOR TASNIM', '0118792674','2020-05-27','12:46:00','AISYAH RAHMAN', '2020-05-28', '14:30:27',null,2003,4001,3001,14352,1001 );

DROP TABLE PARCEL
*/

