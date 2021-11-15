CREATE TABLE `events`  (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `inc_type` varchar(255) NOT NULL,
  `inc_id` int NOT NULL,
  `time` timestamp NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `files`  (
  `id` int NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `src` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `mime` varchar(255) NOT NULL,
  `filesize` double NOT NULL,
  `wh` varchar(255) NULL,
  `esc1_src` varchar(255) NULL,
  `esc2_src` varchar(255) NULL,
  `comment` varchar(255) NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `locations`  (
  `id` int NOT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `loggs`  (
  `id` int NOT NULL,
  `session_id` char(255) NOT NULL,
  `method` varchar(255) NOT NULL,
  `uri` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `time` timestamp NULL ON UPDATE CURRENT_TIMESTAMP,
  `action` varchar(255) NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `messages`  (
  `id` int NOT NULL,
  `from` int NOT NULL,
  `to` int NOT NULL,
  `time` timestamp NOT NULL,
  `time_edit` timestamp NULL,
  `text` text NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `responces`  (
  `id` int NOT NULL,
  `task_id` int NOT NULL,
  `customer_id` int NOT NULL,
  `performer_id` int NOT NULL,
  `text` text NOT NULL,
  `time` timestamp NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `settings`  (
  `nameset` varchar(255) NOT NULL,
  `value` varchar(255) NULL,
  `value2` varchar(255) NULL,
  `value3` varchar(255) NULL,
  PRIMARY KEY (`nameset`)
);

CREATE TABLE `tasks`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `author_id` int NOT NULL,
  `performer_id` int NULL,
  `cat_id` int NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'new',
  `name` varchar(255) NOT NULL,
  `about` text NOT NULL,
  `location` varchar(255) NOT NULL,
  `money` char(11) NOT NULL,
  `timeout` timestamp NULL,
  `inc_files` varchar(255) NULL,
  `time_add` timestamp NOT NULL,
  `time_close` timestamp NULL,
  `time_start` timestamp NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `users`  (
  `id` int NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `F` varchar(255) NULL,
  `I` varchar(255) NOT NULL,
  `O` varchar(255) NULL,
  `email` varchar(255) NOT NULL,
  `location` varchar(255) NULL,
  `birhsday` date NOT NULL,
  `about` text NULL,
  `cat_ids` varchar(255) NULL,
  `tel` varchar(255) NULL,
  `skype` varchar(255) NULL,
  `telegram` varchar(255) NULL,
  `viber` varchar(255) NULL,
  `avatar` int NULL,
  `completed_works` text NULL,
  `set_noticemsg` int NULL,
  `set_noticev` int NULL,
  `set_noticenewresp` int NULL,
  `set_showcontact1` int NULL,
  `set_hideprofile` int NULL,
  `status` varchar(255) NULL DEFAULT 'offline',
  `rating` varchar(255) NULL,
  `online` varchar(255) NULL,
  PRIMARY KEY (`id`, `user_name`)
);

