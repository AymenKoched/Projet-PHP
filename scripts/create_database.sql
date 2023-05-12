CREATE DATABASE harissahouse;
USE harissahouse;

CREATE TABLE user(
  email VARCHAR(255) NOT NULL,
  password VARCHAR(255),
  name VARCHAR(64),
  PRIMARY KEY(email)
);

CREATE TABLE recipe(
  id INT NOT NULL AUTO_INCREMENT,
  name VARCHAR(64),
  author VARCHAR(64),
  image LONGBLOB,
  ingrediants TEXT,
  steps TEXT,
  region VARCHAR(64),
  visits BIGINT DEFAULT 0,
  cooktime INT,
  PRIMARY KEY(id)
);

CREATE TABLE comment(
  id INT NOT NULL AUTO_INCREMENT,
  text TEXT,
  author VARCHAR(30),
  recipeId INT,
  likes INT,
  likers TEXT,
  PRIMARY KEY(id),
  FOREIGN KEY(recipeId) REFERENCES recipe(id)
);

CREATE TABLE bookmark(
  recipeId INT,
  userEmail VARCHAR(255),
  FOREIGN KEY(recipeId) REFERENCES recipe(id),
  FOREIGN KEY(userEmail) REFERENCES user(email)
);
