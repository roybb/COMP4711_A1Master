/* Database name: redscribeit */

DROP TABLE IF EXISTS subs;
DROP TABLE IF EXISTS users;


CREATE TABLE users (
	userid	INT(16) PRIMARY KEY,
	uname	VARCHAR(24) UNIQUE NOT NULL,
	pword	VARCHAR(24) NOT NULL,
	role	VARCHAR(8), 
	avatar	VARCHAR(64)	
);

ALTER TABLE users CHANGE userid userid INT(16) AUTO_INCREMENT;

CREATE TABLE subs (
	subid	INT(16) PRIMARY KEY, 
	userid	INT(16) NOT NULL, 
	url		VARCHAR(256) NOT NULL,
	CONSTRAINT fk_users FOREIGN KEY (userid) REFERENCES users(userid) ON DELETE CASCADE
);

ALTER TABLE subs CHANGE subid subid INT(16) AUTO_INCREMENT;

INSERT INTO users (uname, pword, role, avatar) VALUES('admin', 'admin', 'admin', 'admin.jpg');
