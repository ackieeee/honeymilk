CREATE TABLE IF NOT EXISTS `users` (
    `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `name` varchar(255) NOT NULL,
    `email` varchar(255) NOT NULL UNIQUE,
    `password` varchar(255) NOT NULL,
    `auth_key` varchar(255) DEFAULT NULL,
    `access_token` varchar(255) DEFAULT NULL,
    `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
    `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY(`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `users` (`email`, `name`, `password`) VALUES
    ('test1@test.email.com', 'testuser1', '$2y$13$1bO6/ikK5l6A8AFYdO4DhuYZLmvAkyFwJP1GT38OXu5PegQbs3gey'),
    ('test2@test.email.com', 'testuser2', '$2y$13$1bO6/ikK5l6A8AFYdO4DhuYZLmvAkyFwJP1GT38OXu5PegQbs3gey'),
    ('test3@test.email.com', 'testuser3', '$2y$13$1bO6/ikK5l6A8AFYdO4DhuYZLmvAkyFwJP1GT38OXu5PegQbs3gey'),
    ('test4@test.email.com', 'testuser4', '$2y$13$1bO6/ikK5l6A8AFYdO4DhuYZLmvAkyFwJP1GT38OXu5PegQbs3gey'),
    ('test5@test.email.com', 'testuser5', '$2y$13$1bO6/ikK5l6A8AFYdO4DhuYZLmvAkyFwJP1GT38OXu5PegQbs3gey');