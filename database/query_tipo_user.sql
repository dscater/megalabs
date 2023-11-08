ALTER TABLE `users` CHANGE `tipo` `tipo` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL;

UPDATE users SET tipo = 'VISITADOR MÉDICO' where tipo ='AUXILIAR';