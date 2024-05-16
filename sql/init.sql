CREATE DATABASE IF NOT EXISTS game;
USE game;

CREATE TABLE IF NOT EXISTS users (
    userID INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(50) NOT NULL,
    active TINYINT(1) DEFAULT 1
);

CREATE TABLE IF NOT EXISTS hero (
    heroID INT AUTO_INCREMENT PRIMARY KEY,
    userID INT NOT NULL,
    armorClass INT(11),
    attackBonus INT(11),
    currentHP INT(11),
    damage INT(11),
    description VARCHAR(255),
    dungeonLevel INT(11),
    imagePath VARCHAR(255),
    maxHP INT(11),
    pass TINYINT(1),
    x_position INT(11),
    y_position INT(11)
);

CREATE TABLE IF NOT EXISTS inventory (
    inventoryID INT(10),
    userID INT(10),
    itemID INT(10)
);

CREATE TABLE IF NOT EXISTS item (
    itemID INT(10) AUTO_INCREMENT PRIMARY KEY,
    action VARCHAR(25),
    armorClass INT(11),
    attackBonus INT(11),
    damage INT(11),
    description VARCHAR(250),
    health INT(11),
    itemName VARCHAR(50),
    itemType VARCHAR(15)
);

CREATE TABLE IF NOT EXISTS monster (
    monsterID INT(10) AUTO_INCREMENT PRIMARY KEY,
    armorClass INT(11) NOT NULL,
    attackBonus INT(11) NOT NULL,
    currentHP INT(11) NOT NULL,
    damage INT(11) NOT NULL,
    description VARCHAR(250) NOT NULL,
    dungeonLevel INT(11) NOT NULL,
    imagePath VARCHAR(50) NOT NULL,
    maxHP INT(11) NOT NULL,
    monsterName VARCHAR(50) NOT NULL,
    pass TINYINT(1)
);

/* Some default values for testing */
insert into users values ('test', 'test@test.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 1);
insert into hero values (1, 1, 20, 0, 20, 4, "Test hero", 1, "app/images/rogue.png", 20, 0, 0, 0);
insert into monster values (1, 10, 1, 5, 2, "A small spider moving toward you. It seems to want to attack!", 1, "apps/image/smallArachnid.pn
g", 5, "Arachnid", 0);
insert into item values (1, "bites", 0, 1, 2, "Fangs for a monster", 0, "fangs", "Weapon");
insert into item values (2, "slashes", 0, 1, 4, "A cool ass dagger", 0, "Dagger", "Weapon");

GRANT ALL PRIVILEGES ON game.* TO 'admin'@'%' WITH GRANT OPTION;
FLUSH PRIVILEGES;