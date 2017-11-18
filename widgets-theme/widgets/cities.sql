/*

cities- 11082017
*/

drop table if exists mw_Cities;

CREATE TABLE mw_Cities (
  CityID int(10) unsigned NOT NULL AUTO_INCREMENT,
  Name varchar(50) DEFAULT NULL,
  Country varchar(50) DEFAULT NULL,
  Population int(10) DEFAULT NULL,
  Description text DEFAULT NULL, 
  PRIMARY KEY (CityID)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8


Insert into mw_Cities value(NULL, 'Paris', 'France', 2240000, 'Paris is cool!');
Insert into mw_Cities value(NULL, 'New York', 'USA', 850000, 'NY is cool!');
Insert into mw_Cities value(NULL, 'Tokyo', 'France', 930000, 'Tokyo is cool!');


