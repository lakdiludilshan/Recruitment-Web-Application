CREATE TABLE `users` (
  `user_id` varchar(20) NOT NULL PRIMARY KEY,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_photo` varchar(255) DEFAULT NULL
)

CREATE TABLE `jobs` (
  `job_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `job_type` varchar(20) NOT NULL,
  `category` varchar(50) NOT NULL,
  `qualifications` varchar(100) NOT NULL,
  `experience` int(11) NOT NULL,
  `education` varchar(50) NOT NULL,
  `salary` varchar(50) NOT NULL,
  `posted_date` date NOT NULL,
  `posted_time` time NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `city` varchar(100) NOT NULL,
  `district` varchar(100) NOT NULL,
  PRIMARY KEY (`job_id`, `user_id`),
  FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
)

CREATE TABLE saved_jobs (
    job_id INT(11),
    user_id VARCHAR(20),
    PRIMARY KEY (job_id, user_id),
    FOREIGN KEY (job_id) REFERENCES jobs(job_id),
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

CREATE TABLE job_applicants (
    job_id INT(11),
    user_id VARCHAR(20),
    applied_date DATE,
    applied_time TIME,
    status VARCHAR(50),
    PRIMARY KEY (job_id, user_id),
    FOREIGN KEY (job_id) REFERENCES jobs(job_id),
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);