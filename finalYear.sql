CREATE TABLE `forests` (
    `name` VARCHAR(50) NOT NULL,
    `location` VARCHAR(100) NOT NULL,
    PRIMARY KEY (`name`)
);

CREATE TABLE `fire_detection_stations` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `location` VARCHAR(50) NOT NULL,
    `forest_name` VARCHAR(50) NOT NULL,
    `gps_coordinate` DECIMAL NOT NULL,
    `status` VARCHAR(20) NOT NULL,
    `last_maintenance` DATE NOT NULL,
    `temperature` DECIMAL NOT NULL,
    `humidity` DECIMAL NOT NULL,
    `smoke` BOOLEAN NOT NULL,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`forest_name`) REFERENCES `forests` (`name`)
);

CREATE TABLE `users` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `first_name` VARCHAR(50) NOT NULL,
    `last_name` VARCHAR(50) NOT NULL,
    `email` VARCHAR(50) UNIQUE NOT NULL,
    `contact_information` VARCHAR(100) NOT NULL,
    `location` VARCHAR(100) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `role_id` INT NOT NULL,
    `type` VARCHAR(20) NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);


CREATE TABLE `notification_system` (
    `id` INT NOT NULL,
    `type` VARCHAR(50) NOT NULL,
    `contact_information` VARCHAR(100) NOT NULL,
    `fire_detection_station_id` INT NOT NULL,
    `user_id` INT NOT NULL,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`fire_detection_station_id`) REFERENCES `fire_detection_stations` (`id`),
    FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
);

CREATE TABLE `rescuers` (
    `id` INT NOT NULL,
    `name` VARCHAR(50) NOT NULL,
    `contact_information` VARCHAR(100) NOT NULL,
    `expertise` VARCHAR(100) NOT NULL,
    `notification_system_id` INT NOT NULL,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`notification_system_id`) REFERENCES `notification_system` (`id`)
);

CREATE TABLE `notification_system_rescuer_association` (
    `id` INT NOT NULL,
    `notification_system_id` INT NOT NULL,
    `rescuer_id` INT NOT NULL,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`notification_system_id`) REFERENCES `notification_system` (`id`),
    FOREIGN KEY (`rescuer_id`) REFERENCES `rescuers` (`id`)
);
