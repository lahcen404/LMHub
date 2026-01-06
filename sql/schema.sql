CREATE DATABASE IF NOT EXISTS LMHubDB;
USE LMHubDB;

-- users table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fullName VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL, 
    role ENUM('AUTHOR', 'ADMIN', 'READER') DEFAULT 'READER' NOT NULL
) ;

-- articles table
CREATE TABLE articles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    author_id INT NOT NULL,
    FOREIGN KEY (author_id) REFERENCES users(id) ON DELETE CASCADE
) ;

-- comments table
CREATE TABLE comments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    content TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    article_id INT NOT NULL,
    reader_id INT NOT NULL,
    FOREIGN KEY (article_id) REFERENCES articles(id) ON DELETE CASCADE,
    FOREIGN KEY (reader_id) REFERENCES users(id) ON DELETE CASCADE
) ;

-- likes article table
CREATE TABLE likesArticle (
    id INT AUTO_INCREMENT PRIMARY KEY,
    article_id INT NOT NULL,
    reader_id INT NOT NULL,
    UNIQUE KEY(article_id, reader_id),
    FOREIGN KEY (article_id) REFERENCES articles(id) ON DELETE CASCADE,
    FOREIGN KEY (reader_id) REFERENCES users(id) ON DELETE CASCADE
) ;

-- likes comment table
CREATE TABLE likesComment (
    id INT AUTO_INCREMENT PRIMARY KEY,
    comment_id INT NOT NULL,
    reader_id INT NOT NULL,
    UNIQUE KEY(comment_id, reader_id),
    FOREIGN KEY (comment_id) REFERENCES comments(id) ON DELETE CASCADE,
    FOREIGN KEY (reader_id) REFERENCES users(id) ON DELETE CASCADE
) ;



-- categories table
CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL UNIQUE
) ;

-- reports table
CREATE TABLE reports (
    id INT AUTO_INCREMENT PRIMARY KEY,
    reason TEXT NOT NULL,
    status ENUM('PENDING', 'RESOLVED', 'DISMISSED') DEFAULT 'PENDING',
    reporter_id INT NOT NULL,
    comment_id INT NULL,
    article_id INT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (reporter_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (comment_id) REFERENCES comments(id) ON DELETE CASCADE,
    FOREIGN KEY (article_id) REFERENCES articles(id) ON DELETE CASCADE
) ;

-- article_category table
CREATE TABLE article_category (
    article_id INT NOT NULL,
    category_id INT NOT NULL,
    PRIMARY KEY (article_id, category_id),
    FOREIGN KEY (article_id) REFERENCES articles(id) ON DELETE CASCADE,
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE
) ;