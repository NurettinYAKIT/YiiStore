CREATE  TABLE `yiimusicstore`.`tbl_room` (

  `id` INT NOT NULL AUTO_INCREMENT ,

  `name` VARCHAR(45) NULL ,

  `picture` TEXT NULL ,

  `price` INT NULL ,

  PRIMARY KEY (`id`) );


  
  
  CREATE  TABLE `yiimusicstore`.`tbl_reservation` (

  `id` INT NOT NULL AUTO_INCREMENT ,

  `user_id` VARCHAR(45) NULL ,

  `total` INT NULL ,

  PRIMARY KEY (`id`) );


  
  CREATE  TABLE `yiimusicstore`.`tbl_room_reservation` (

  `id` INT NOT NULL AUTO_INCREMENT ,

  `room_id` VARCHAR(45) NULL ,

  `reservation_id` VARCHAR(45) NULL ,

  `entrance_date` DATE NULL ,

  `exit_date` DATE NULL ,

  PRIMARY KEY (`id`) );



	INSERT INTO `yiimusicstore`.`tbl_room` (`name`, `picture`, `price`) VALUES ('The White Room', '/images/room_white.jpg', 5);
	INSERT INTO `yiimusicstore`.`tbl_room` (`name`, `picture`, `price`) VALUES ('The Pink Room', '/images/room_pink.jpg', 4);
	INSERT INTO `yiimusicstore`.`tbl_room` (`name`, `picture`, `price`) VALUES ('The Room Gray', '/images/room_white.jpg', 5);

	INSERT INTO `tbl_reservation` (`id`,`user_id`,`total`) VALUES (1,'2',3);
	
	INSERT INTO `tbl_room_reservation` (`id`,`room_id`,`reservation_id`,`entrance_date`,`exit_date`) VALUES (1,'3','1','2012-01-01','2012-02-02');
	INSERT INTO `tbl_room_reservation` (`id`,`room_id`,`reservation_id`,`entrance_date`,`exit_date`) VALUES (2,'2','1','2012-01-01','2012-02-02');




  
  
  