INSERT INTO `gameunit_stats` (`id`, `unit_id`, `stat_type_id`, `multiplier`) VALUES
(1, 1, 1, ''),
(2, 1, 2, ''),
(3, 1, 5, ''),
(4, 1, 6, '+5'),
(5, 2, 7, '*(3*#user-level#)/0,5'),
(6, 3, 7, '+(50*#user-level#)'),
(7, 3, 8, '2'),
(8, 3, 9, '2');

INSERT INTO `gameunit_stat_types` (`id`, `name`, `value`, `type`) VALUES
(1, 'attack', '10', 'string'),
(2, 'ranged-attack', '5', 'string'),
(3, 'defense', '10', 'string'),
(4, 'ranged-defense', '5', 'string'),
(5, 'movementspeed', '10', 'string'),
(6, 'range', '100', 'string'),
(7, 'cost-gold', '10', 'string'),
(8, 'requires-building', 'building-id', 'string'),
(9, 'requires-user-level', 'user-level', 'string');

INSERT INTO `gameunit_types` (`id`, `name`) VALUES
(2, 'building'),
(1, 'forces');

INSERT INTO `gameunit_unit` (`id`, `parent_id`, `type_id`, `name`, `description`) VALUES
(1, 0, 1, 'Soldier', 'Attack and defend'),
(2, 0, 2, 'Central House', 'Base for all houses'),
(3, 2, 2, 'Military', 'build soldiers');