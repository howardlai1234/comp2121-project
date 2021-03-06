DROP Table Account;
DROP Table Product; 
DROP TABLE Orders;
DROP TABLE OrderItems;
DROP TABLE Review;
DROP TABLE ShoppingCart;
DROP TABLE Reply;
DROP TABLE ProductType;
DROP TABLE ProductOrigin;

CREATE TABLE Account (
 	accountID int NOT NULL AUTO_INCREMENT,
	accountName varchar(255),
	joinDate varchar(255),
	email varchar(255),
	phoneNo int,
	address varchar(255),
	passwordHash varchar(255),
	administrator Boolean,
PRIMARY KEY (accountID)
);

CREATE TABLE Product (
 	productID int NOT NULL AUTO_INCREMENT,
	productName varchar(255),
	typeID int,
	originID int,
	description varchar(1023),
	price int,
	ingredients varchar(255),
	stock int,
	imageURL varchar(255),
	cost int,
	PRIMARY KEY (productID)
);

CREATE TABLE Orders (
 	orderID int NOT NULL,
	customerID int,
	orderDate Date,
	address varchar(255),
	competed Boolean,
	remark varchar(255),
	total int,
	PRIMARY KEY (orderID)
);

CREATE TABLE OrderItems (
	orderID int NOT NULL,
	itemNo int NOT NULL,
	productID int NOT NULL
);

CREATE TABLE Review (
	reviewID int NOT NULL AUTO_INCREMENT,
	customerID int,
	productID int,
	rating int,
	comment varchar(255),
	date Date,
PRIMARY KEY (reviewID)
);

CREATE TABLE ShoppingCart (
	accountID int NOT NULL,
	productID int NOT NULL,
	qty int NOT NULL
);

CREATE TABLE Reply (
	replyID int NOT NULL AUTO_INCREMENT,
	reviewID int,
	message varchar(255),
	PRIMARY KEY (replyID)
);

CREATE TABLE ProductType (
	typeID int NOT NULL,
	typeName varchar(255),
	PRIMARY KEY (typeID)
);

CREATE TABLE ProductOrigin (
	locationID int NOT NULL,
	locationName varchar(255),
	PRIMARY KEY (locationID)
);

INSERT INTO ProductOrigin (locationID, locationName) VALUES
	(1, 'Hong Kong'),
	(2, 'Japan'),
	(3, 'Korea'),
	(4, 'Malaysia'),
	(5, 'Thailand'),
	(6, 'Taiwan'),
	(7, 'China'),
	(8, 'United States of America');

INSERT INTO ProductType (typeID, typeName) VALUES
	(1, 'Main Course'),
	(2, 'Drinks'),
	(3, 'Dessert/Snacks');

INSERT INTO Account (accountName, passwordHash, administrator) VALUES
	('admin', '3203403b3e50a070d294654fefbb6be2d8f65ffdd584c2a6a17986f6e9f4da92', TRUE);
INSERT INTO Product (productID, productName, typeID, originID, description, price, cost, stock) VALUES
	(0,'Delivery charge',1,1,'Delivery Charge for Order less than 400', 100,100,999999);

INSERT INTO Product (productName, typeID, originID, description, price, cost, stock, ingredients, imageURL) VALUES
	(
		'Barbecued Pork Rice', 
		1, 
		1, 
		'Long strips of seasoned boneless pork are skewered with long forks and placed in a covered oven or over a fire.',
		85,
		45,
		100,
		'Pork tenderloins, soy sauce, honey, ketcup, brown sugar, chinese rice wine, hoisin sauce and steam bak choy.',
		'/images/dishes/BbqPorkRice.jpg'
	),
	(
		'Gyudon',
		1,
		2,
		'Gyudon is a popular quick meal in Japan. It consists of a bowl of steamed rice topped with thinly sliced beef and tender onion, simmered in a sweet and savory dashi broth seasoned with soy sauce and mirin.',
		95,
		55,
		100,
		'Sliced beef, onion, dashi broth, onion, soy sauce, mirin and white rice.',
		'/images/dishes/Gyudon.jpg'
	),
	(
		'Japcha',
		1,
		3,
		'Japchae is a very popular Korean dish. It is the number one sought after dish particularly during the Korean festive holidays but it is also enjoyed on any other common day as well.',
		53,
		30,
		100,
		'Korean glass noodles, carrot, spinach, sesame, onion, lean beef, dried mushrooms, egg, sliced beef, soy sauce and sugar.',
		'/images/dishes/Japcha.jpg'
	),
	(	'Nasi Lemak',
		1,
		4,
		'Translate nasi lemak from Malay to English, and you will get "rich rice". The ???rich??? refers not to wealth, but the coconut cream that makes it oh-so sinfully scrumptious.',
		95,
		55,
		100,
		'Rice, coconut milk, sambal, egg, anchovies, ginger and peanut.',
		'/images/dishes/NasiLemak.jpg'
	),
	(
		'Phat Kaphrao With Rice',
		1,
		5,
		'Thai basil pork, better known in Thai as pad kra pao gai, is a contender for the most popular, and the most beloved Thai street food dish of all time.',
		75,
		35,
		100,
		'Rice, holy basil, garlic, eye chillies, ginger, dark soy sauce, chilli, soy sauce, lime, fish sauce, egg and minced chicken',
		'/images/dishes/PhatKaphraoWithRice.jpg'
	),
	(
		'Egg Tart',
		3,
		1,
		'It is a custard tart found in Cantonese cuisine deriving from the English custard tart',
		30,
		15,
		100,
		'sift flour, sugar, salt, egg, yolk, evaporated milk',
		'/images/dishes/EggTart.jpg'
	),
	(
		'Lotte Yogurt Jelly',
		3,
		3,
		'Yogurt Jelly can improve your intestinal health with the yogurt.  It is also very handy.',
		21,
		12,
		100,
		'Sugar, Corn Syrup, Gelling agent, Sweetener, Acidity Regulator, Gelling agent, Flavour, Emulsifier, Colour, Thickener. Contains soybean, eggs, nuts.',
		'/images/dishes/LotteYogurtJelly.jpg'
	),
	(
		'Market O Real Browie',
		3,
		3,
		'Multiple mall delicious chocolate cakes with some nuts inside.',
		55,
		31,
		100,
		'nuts',
		'/images/dishes/MarketORealBrowie.jpg'
	),
	(
		'Tom???s Honey Butter Almond',
		3,
		3,
		'The almond can reduce cholesterol and it???s quite tasty for mixing it with honey butter ',
		84,
		48,
		100,
		'Honey, Almond, nuts',
		'/images/dishes/TomsHoneyButterAlmond.jpg'
	),
	(
		'Tom???s Honey Butter Chips',
		3,
		3,
		'A tasty and most popular snacks in Korea.  This chips is a souvenir which all the foreigners must buy for their friends.  The chips mix with the famous flavour ??? honey butter.  It???s perfect. ',
		17,
		10,
		100,
		'Honey, Almond, nuts',
		'/images/dishes/TomsHoneyButterChips.jpg'
	),
	(
		'Lotte Milkis',
		2,
		3,
		'Do you want to taste the drinks drank by Oppa?  This drink tastes like yogurt.  It???s very popular in Korea.  Try now.',
		32,
		18,
		100,
		'milk',
		'/images/dishes/LotteMilkis.jpg'
	),	
	(
		'Dim Sum',
		1,
		1,
		'Dim sum is a traditional Chinese meal made up of small plates of dumplings and other snack dishes and is usually accompanied by tea.',
		96,
		55,
		100,
		'ground pork , beef, Chinese vegetables, shrimp, translucent wrappers, mushrooms, scallions, ginger, wonton wrapper ',
		'/images/dishes/DimSum.png'
	),
	(
		'Pineapple Bun',
		3,
		1,
		'Pineapple buns are classic pastries that you can find in Hong Kong style bakeries. The bun is soft and slightly sweet and it???s topped with a golden crunchy, crumbly crust sugar.',
		9,
		5,
		100,
		'sugar, eggs, flour, and lard',
		'/images/dishes/PineappleBun.png'
	),
	(
		'Spring roll',
		3,
		1,
		'A Chinese dish consisting of a savoury mixture of vegetables and meat rolled up in a thin pancake and fried.',
		15,
		8,
		100,
		'Spring Roll Wrappers, Pork, Chinese mushrooms, Yellow chives, Beansprouts, Flour paste',
		'/images/dishes/SpringRoll.png'
	),
	(
		'Sashimi',
		1,
		2,
		'Sashimi is thinly sliced, raw food. It is one of the most famous dishes in the Japanese cuisine. Seafood is most commonly eaten as sashimi, but other types of meats (such as beef, horse and deer) and foods (such as yuba tofu skin and konnyaku) can also be served as sashimi.',
		40,
		20,
		100,
		'Salmon, Squid, Shrimp, Tuna, Mackerel, Sea urchin, Octopus',
		'/images/dishes/Samshimi.png'
	),
	(
		'Soba',
		1,
		2,
		'It usually refers to thin noodles made from buckwheat flour, or a combination of buckwheat and wheat flours (Nagano soba). They contrast to thick wheat noodles, called udon.',
		80,
		30,
		100,
		'Brown noodles (made from wheat and buckwheat) ',
		'/images/dishes/Soba.png'
	),
	(
		'Onigiri',
		3,
		2,
		'It is a Japanese comfort food made from steamed rice formed into the typical triangular, ball, or cylinder shapes and usually wrapped with nori.',
		20,
		5,
		100,
		'Rice, salmon, pickled plum, bonito flakes, canned tuna, cod roe, simmered kombu.',
		'/images/dishes/Onigiri.png'
	),
	(
		'Tempura',
		3,
		2,
		'Tempura are pieces of lightly battered, deep fried seafood and vegetables.',
		25,
		10,
		100,
		'Shrimp, Prawn, Squid, green beans, shiitake mushroom, sweet potato, pumpkin.',
		'/images/dishes/Tempura.png'
	),
	(
		'Japan Green Tea',
		2,
		2,
		'The tea is made through Matcha, which  is finely ground powder of specially grown and processed green tea leaves, traditionally consumed in East Asia.',
		10,
		3,
		100,
		'Matcha green tea power and water.',
		'/images/dishes/JapanGreenTea.png'
	),
	(
		'Americano Coffee',
		2,
		8,
		'Is a type of coffee drink prepared by diluting an espresso with hot water, giving it a similar strength to, but different flavor from traditionally brewed coffee.',
		15,
		5,
		100,
		'water and espresso.',
		'/images/dishes/AmericanoCoffee.png'
	),
	(
		'Bubble Tea',
		2,
		6,
		'Bubble Tea is the name given to the wide variety of refreshing flavoured fruit teas and milk teas served ice cold or piping hot with chewy tapioca balls that you suck up through a big straw.',
		30,
		10,
		100,
		'Water, Black Tea, milk, Sugar, Flavoured powder, Powder creamer',
		'/images/dishes/BubbleTea.png'
	),
	(
		'Teh Tarik',
		2,
		4,
		'Its name is derived from the pouring process of "pulling" the drink during preparation. It is made from a strong brew of black tea blended with condensed milk. It is the national drink of Malaysia.',
		50,
		20,
		100,
		'Black tea bags, Condensed milk, Sugar',
		'/images/dishes/TehTarik.png'
	),
	(
		'White Coffee',
		2,
		4,
		'White Coffee is simply coffee beans roasted half of the way through and at a lower temperature, giving it a whitish colour and nutty taste.',
		30,
		10,
		100,
		'Orange blossom water, Acacia honey, Water, Orange blossoms',
		'/images/dishes/WhiteCoffee.png'
	);
