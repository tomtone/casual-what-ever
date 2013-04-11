CREATE TABLE IF NOT EXISTS `gameunit_stats` (
  `id`           INT(11)          NOT NULL AUTO_INCREMENT,
  `unit_id`      INT(11)          NOT NULL,
  `stat_type_id` INT(11)          NOT NULL,
  `multiplier`   TEXT
                 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_bin;

CREATE TABLE IF NOT EXISTS `gameunit_stat_types` (
  `id`    INT(11)          NOT NULL AUTO_INCREMENT,
  `name`  VARCHAR(255)
          COLLATE utf8_bin NOT NULL,
  `value` VARCHAR(255)
          COLLATE utf8_bin NOT NULL,
  `type`  VARCHAR(255)
          COLLATE utf8_bin NOT NULL DEFAULT 'string',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_2` (`name`),
  KEY `name` (`name`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_bin;

CREATE TABLE IF NOT EXISTS `gameunit_types` (
  `id`   INT(11)          NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255)
         COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `gameunit_types_name_unique` (`name`),
  KEY `gameunit_types_name_key` (`name`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_bin;

CREATE TABLE IF NOT EXISTS `gameunit_unit` (
  `id`          INT(11)          NOT NULL AUTO_INCREMENT,
  `parent_id`   INT(11)          NOT NULL DEFAULT '0',
  `type_id`     INT(11)          NOT NULL,
  `name`        VARCHAR(255)
                COLLATE utf8_bin NOT NULL,
  `description` TEXT
                COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_bin;