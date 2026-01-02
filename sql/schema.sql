create database LMHubDB;
use LMHubDB;
-- users table
create table users(
	id INT AUTO_INCREMENT PRIMARY KEY,
    fullName VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL, 
    role ENUM ('AUTHOR','ADMIN','READER') DEFAULT 'READER' NOT NULL
);

-- articles table
create table articles(
id INT AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(255) NOT NULL,
content TEXT NOT NULL,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
author_id int NOT NULL,
FOREIGN KEY (author_id) REFERENCES users(id) ON DELETE CASCADE
);


-- likes table
create table likes(
id INT AUTO_INCREMENT PRIMARY KEY,
article_id int NOT NULL,
reader_id int NOT NULL,
UNIQUE KEY(article_id , reader_id),
FOREIGN KEY (article_id) REFERENCES articles(id) ON DELETE CASCADE,
FOREIGN KEY (reader_id) REFERENCES users(id) ON DELETE CASCADE
);

-- commentss table
create table comments(
id INT AUTO_INCREMENT PRIMARY KEY,
content VARCHAR(255) NOT NULL,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
article_id int NOT NULL,
reader_id int NOT NULL,
FOREIGN KEY (article_id) REFERENCES articles(id) ON DELETE CASCADE,
FOREIGN KEY (reader_id) REFERENCES users(id) ON DELETE CASCADE
);

-- categories table
create table categories(
id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(255) NOT NULL UNIQUE
);

-- drop table categories;

-- table reports
create table reports(
id INT AUTO_INCREMENT PRIMARY KEY,
reason TEXT NOT NULL,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
status ENUM('PENDING', 'RESOLVED', 'DISMISSED') DEFAULT 'PENDING',
reporter_id INT NOT NULL,
comment_id INT NOT NULL,
FOREIGN KEY (reporter_id) REFERENCES users(id) ON DELETE CASCADE,
FOREIGN KEY (comment_id) REFERENCES comments(id) ON DELETE CASCADE

 );
 
 -- table article category
 create table article_category(
 PRIMARY KEY (article_id, category_id),
 article_id INT NOT NULL,
 category_id INT NOT NULL,
 FOREIGN KEY (article_id) REFERENCES articles(id) ON DELETE CASCADE,
 FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE
 );
 
 -- drop database lmhubdb;