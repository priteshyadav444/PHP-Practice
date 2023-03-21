CREATE TABLE users
(
    user_id INT unsigned AUTO_INCREMENT,
    username VARCHAR(15),
    profile_picture_url varchar(60), 
	first_name VARCHAR(50) NOT NULL,
	last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
	phone_no VARCHAR(15) NOT NULL,
	gender CHAR(1)  NOT NULL, 
    dob DATE NOT NULL,
	city VARCHAR(60),
    country_code CHAR(2) CHARSET=latin1 COLLATE=latin1_swedish_ci, 
    createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(user_id),
    FOREIGN KEY (country_code) REFERENCES country(`alpha-2-code`),
    UNIQUE KEY(email),
    UNIQUE KEY(phone_no),
    UNIQUE KEY(username)
);


CREATE TABLE posts
(
    postid INT unsigned,
    user_id INT unsigned NOT NULL,
    content TEXT,
    isEdited boolean DEFAULT false,
    mageLink VARCHAR(500),
    likes_count INT(5) unsigned,
    createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (postid),
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

CREATE TABLE Likes
{
    like_id unsigned INT,
    user_id unsigned,
    createdAt
    PRIMARY KEY (like_id),
}

CREATE TABLE Comment
{
    comment_id unsigned INT,
    postid unsigned INT(10),
    message VARCHAR,
    isEdited boolean,
    createdAt,
    updatedAt,
    PRIMARY KEY (comment_id),
}


