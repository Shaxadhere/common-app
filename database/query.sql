create table if not exists tbl_user_type
(
PK_ID int PRIMARY KEY AUTO_INCREMENT,
UserTypeName varchar(100)
);
create table if not exists tbl_user
(
PK_ID int PRIMARY KEY AUTO_INCREMENT,
FullName varchar(100),
FK_UserType int,
Email varchar(200),
Password varchar(1000),
Contact varchar(100),
DisplayPicture varchar(100),
LoginToken varchar(200),
CreatedAt datetime DEFAULT CURRENT_TIMESTAMP,
CreatedBy int,
Status bit default 1,
Deleted bit default 0
);
create table if not exists tbl_size
(
PK_ID int PRIMARY KEY AUTO_INCREMENT,
SizeValue varchar(100),
CreatedAt datetime DEFAULT CURRENT_TIMESTAMP,
Status bit default 1,
Deleted bit default 0
);

INSERT INTO `tbl_user` (`PK_ID`, `FullName`, `FK_UserType`, `Email`, `Password`, `Contact`, `DisplayPicture`, `LoginToken`, `CreatedAt`, `CreatedBy`, `Status`, `Deleted`) VALUES (NULL, 'admin', '1', 'admin@mail.com', '$2y$10$Af2hpJvf11gPQ0mVCJxSB.D2Mk08t5gjv1VDKuT7I67WNHdu.T4RS', '030300330', '1.jpg', NULL, current_timestamp(), NULL, b'1', b'0');